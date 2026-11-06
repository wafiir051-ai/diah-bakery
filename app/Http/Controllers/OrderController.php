<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    /**
     * Menampilkan daftar pesanan (pending dan completed)
     */
    public function index()
    {
        // Ambil data pesanan dari session (simulasi database)
        $pendingOrders = Session::get('pending_orders', []);
        $completedOrders = Session::get('completed_orders', []);
        
        return view('admin.orders', compact('pendingOrders', 'completedOrders'));
    }
    
    /**
     * Menandai pesanan sebagai selesai (sudah diambil)
     */
    public function complete($id)
    {
        // Ambil pending orders
        $pendingOrders = Session::get('pending_orders', []);
        $completedOrders = Session::get('completed_orders', []);
        
        // Cari pesanan yang akan diselesaikan
        foreach ($pendingOrders as $key => $order) {
            if ($order['id'] == $id) {
                // Tambahkan status completed dan timestamp
                $order['completed_at'] = now()->format('d/m/Y H:i');
                $order['status'] = 'completed';
                
                // Pindahkan ke completed orders
                array_unshift($completedOrders, $order);
                
                // Hapus dari pending orders
                unset($pendingOrders[$key]);
                break;
            }
        }
        
        // Reindex array
        $pendingOrders = array_values($pendingOrders);
        
        // Simpan kembali ke session
        Session::put('pending_orders', $pendingOrders);
        Session::put('completed_orders', $completedOrders);
        
        return redirect()->route('admin.orders')->with('success', 'Pesanan telah ditandai selesai!');
    }
    
    /**
     * Menghapus pesanan (jika diperlukan)
     */
    public function destroy($id)
    {
        $pendingOrders = Session::get('pending_orders', []);
        
        foreach ($pendingOrders as $key => $order) {
            if ($order['id'] == $id) {
                unset($pendingOrders[$key]);
                break;
            }
        }
        
        Session::put('pending_orders', array_values($pendingOrders));
        
        return redirect()->route('admin.orders')->with('success', 'Pesanan telah dihapus!');
    }
}