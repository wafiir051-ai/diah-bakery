<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kue;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    // ================ DASHBOARD ================
    public function dashboard()
    {
        // Ambil data dari database
        $totalProduk = Kue::count();
        $totalStok = Kue::sum('stock');
        
        // Data pesanan (pakai DB::table karena tabel pesanans)
        $totalPendapatan = DB::table('pesanans')->where('status', 'selesai')->sum('total_harga');
        $totalPesanan = DB::table('pesanans')->count();
        
        // Pesanan berdasarkan status
        $pesananDiproses = DB::table('pesanans')->where('status', 'diproses')->count();
        $pesananSelesai = DB::table('pesanans')->where('status', 'selesai')->count();
        
        // List pesanan
        $pesananDiprosesList = DB::table('pesanans')->where('status', 'diproses')->latest()->take(10)->get();
        $pesananSelesaiList = DB::table('pesanans')->where('status', 'selesai')->latest()->take(10)->get();
        $pesanan = DB::table('pesanans')->latest()->take(20)->get();
        
        // List produk
        $products = Kue::latest()->get();
        
        // Data untuk card dashboard
        $pesananBaru = DB::table('pesanans')->where('status', 'diproses')->count();
        
        return view('admin.dashboard', [
            'totalProduk' => $totalProduk,
            'totalStok' => $totalStok,
            'totalPendapatan' => $totalPendapatan,
            'totalPesanan' => $totalPesanan,
            'pesanan' => $pesanan,
            'products' => $products,
            'pesananDiproses' => $pesananDiproses,
            'pesananSelesai' => $pesananSelesai,
            'pesananDiprosesList' => $pesananDiprosesList,
            'pesananSelesaiList' => $pesananSelesaiList,
            'pesananBaru' => $pesananBaru
        ]);
    }

    // ================ LIST PRODUK ================
    public function products()
    {
        $products = Kue::latest()->get();
        return view('admin.products.index', compact('products'));
    }

    // ================ FORM EDIT PRODUK ================
    public function editProduct($id)
    {
        $product = Kue::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

    // ================ FORM TAMBAH PRODUK ================
    public function createProduct()
    {
        return view('admin.products.create');
    }

    // ================ TAMBAH PRODUK ================
    public function storeProduct(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'rasa_kategori' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'deskripsi' => 'nullable|string',
        ]);
        
        $product = new Kue();
        $product->nama = $request->nama;
        $product->rasa_kategori = $request->rasa_kategori;
        $product->harga = $request->harga;
        $product->stock = $request->stock;
        $product->deskripsi = $request->deskripsi;
        
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $product->foto = $filename;
        }
        
        $product->save();
        
        return redirect()->route('admin.dashboard')->with('success', 'Produk berhasil ditambahkan');
    }

    // ================ UPDATE PRODUK ================
    public function updateProduct(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'rasa_kategori' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'deskripsi' => 'nullable|string',
        ]);
        
        $product = Kue::findOrFail($id);
        $product->nama = $request->nama;
        $product->rasa_kategori = $request->rasa_kategori;
        $product->harga = $request->harga;
        $product->stock = $request->stock;
        $product->deskripsi = $request->deskripsi;
        
        if ($request->hasFile('foto')) {
            if ($product->foto && file_exists(public_path('uploads/' . $product->foto))) {
                unlink(public_path('uploads/' . $product->foto));
            }
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $product->foto = $filename;
        }
        
        $product->save();
        
        return redirect()->route('admin.dashboard')->with('success', 'Produk berhasil diupdate');
    }

    // ================ HAPUS PRODUK ================
    public function destroyProduct($id)
    {
        $product = Kue::findOrFail($id);
        
        if ($product->foto && file_exists(public_path('uploads/' . $product->foto))) {
            unlink(public_path('uploads/' . $product->foto));
        }
        
        $product->delete();
        
        return redirect()->route('admin.dashboard')->with('success', 'Produk berhasil dihapus');
    }

    // ================ KIRIM STRUK KE WHATSAPP ================
    
    public function sendWA($id)
    {
        // Ambil data pesanan dari tabel pesanans
        $order = DB::table('pesanans')->where('id', $id)->first();
        
        if (!$order) {
            return response()->json(['message' => 'Pesanan tidak ditemukan'], 404);
        }
        
        // Decode detail pesanan
        $details = json_decode($order->detail_pesanan, true);
        
        // Format pesan WhatsApp
        $message = "*🍰 STRUK PEMESANAN DIAH BAKERY 🍰*\n";
        $message .= "----------------------------------\n";
        $message .= "*No. Order:* #{$order->id}\n";
        $message .= "*Nama:* {$order->nama_pembeli}\n";
        $message .= "*Telepon:* {$order->no_telepon}\n";
        $message .= "*Tanggal:* " . date('d/m/Y H:i', strtotime($order->created_at)) . "\n";
        $message .= "----------------------------------\n";
        $message .= "*Detail Pesanan:*\n";
        
        if ($details) {
            foreach ($details as $item) {
                $nama = $item['nama'] ?? $item['product_name'] ?? 'Produk';
                $qty = $item['quantity'] ?? $item['qty'] ?? 0;
                $subtotal = $item['subtotal'] ?? ($item['harga'] * $qty);
                $message .= "• {$nama} (x{$qty}) = Rp " . number_format($subtotal, 0, ',', '.') . "\n";
            }
        } else {
            $message .= "Tidak ada detail item\n";
        }
        
        $message .= "----------------------------------\n";
        $message .= "*Total: Rp " . number_format($order->total_harga, 0, ',', '.') . "*\n";
        $message .= "----------------------------------\n";
        $message .= "Terima kasih sudah berbelanja! 🙏\n";
        $message .= "Pesanan akan segera diproses.";
        
        // Redirect ke WhatsApp
        $phone = "6282277214344";
        $waUrl = "https://api.whatsapp.com/send?phone={$phone}&text=" . urlencode($message);
        
        return redirect($waUrl);
    }
}