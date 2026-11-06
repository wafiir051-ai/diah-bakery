<?php

namespace App\Http\Controllers;

use App\Models\Kue;
use App\Models\Pesanan;
use Illuminate\Support\Facades\DB;
use App\Models\DetailPesanan;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        
        // HAPUS atau KOMENTAR baris dd($cart) ini!
        // dd($cart);
        
        if (empty($cart)) {
            return redirect()->route('products')->with('error', 'Keranjang kosong!');
        }

        $products = [];
        $total = 0;

        foreach ($cart as $id => $details) {
            $product = Kue::find($id);
            if ($product) {
                $subtotal = $product->harga * $details['quantity'];
                $total += $subtotal;
                $products[] = [
                    'id' => $product->id,
                    'nama' => $product->nama,
                    'harga' => $product->harga,
                    'quantity' => $details['quantity'],
                    'subtotal' => $subtotal
                ];
            }
        }

        return view('checkout.index', compact('products', 'total'));
    }

    public function process(Request $request)
    {
        $request->validate([
            'nama_pembeli' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:20',
        ]);

        // Ambil keranjang dari session
        $cart = session()->get('cart', []);
        
        if (empty($cart)) {
            return redirect()->back()->with('error', 'Keranjang kosong!');
        }
        
        // Hitung total dan siapkan detail pesanan
        $total = 0;
        $detailPesanan = [];
        
        foreach ($cart as $id => $details) {
            $product = Kue::find($id);
            if ($product) {
                $subtotal = $product->harga * $details['quantity'];
                $total += $subtotal;
                $detailPesanan[] = [
                    'nama' => $product->nama,
                    'harga' => $product->harga,
                    'quantity' => $details['quantity'],
                    'subtotal' => $subtotal
                ];
            }
        }
        
        // Simpan pesanan ke database (jika ada tabel pesanans)
        try {
            $pesanan = DB::table('pesanans')->insertGetId([
                'nama_pembeli' => $request->nama_pembeli,
                'no_telepon' => $request->no_telepon,
                'total_harga' => $total,
                'detail_pesanan' => json_encode($detailPesanan),
                'status' => 'diproses',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        } catch (\Exception $e) {
            // Jika gagal simpan, lanjutkan saja (opsional)
        }
        
        // Siapkan pesan WhatsApp
        $phone = "6282277214344";
        $message = "*🍰 STRUK PEMESANAN DIAH BAKERY 🍰*\n";
        $message .= "----------------------------------\n";
        $message .= "Nama: {$request->nama_pembeli}\n";
        $message .= "Telepon: {$request->no_telepon}\n";
        $message .= "Tanggal: " . date('d/m/Y H:i') . "\n";
        $message .= "----------------------------------\n";
        $message .= "*Detail Pesanan:*\n";
        
        foreach ($detailPesanan as $item) {
            $message .= "• {$item['nama']} (x{$item['quantity']}) = Rp " . number_format($item['subtotal'], 0, ',', '.') . "\n";
        }
        
        $message .= "----------------------------------\n";
        $message .= "*Total: Rp " . number_format($total, 0, ',', '.') . "*\n";
        $message .= "----------------------------------\n";
        $message .= "Terima kasih sudah berbelanja! 🙏\n";
        $message .= "Pesanan akan segera diproses.";
        
        // Redirect ke WhatsApp
        $waUrl = "https://api.whatsapp.com/send?phone={$phone}&text=" . urlencode($message);
        
        // Hapus keranjang setelah checkout
        session()->forget('cart');
        
        // Redirect ke WhatsApp
        return redirect($waUrl);
    }
}