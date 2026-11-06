<?php

namespace App\Http\Controllers;

use App\Models\Kue;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
{
    $cart = session()->get('cart', []);
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
                'subtotal' => $subtotal,
                'foto' => $product->foto
            ];
        }
    }

    return view('cart.index', compact('products', 'total'));
}

    public function add(Request $request, $id)
{
    $product = Kue::find($id);
    
    if (!$product) {
        return redirect()->back()->with('error', 'Produk tidak ditemukan!');
    }

    $cart = session()->get('cart', []);

    if (isset($cart[$id])) {
        $cart[$id]['quantity']++;
    } else {
        $cart[$id] = [
            'id' => $product->id,
            'nama' => $product->nama,
            'harga' => $product->harga,
            'quantity' => 1,
            'foto' => $product->foto,
            'subtotal' => $product->harga
        ];
    }
    
    $cart[$id]['subtotal'] = $cart[$id]['harga'] * $cart[$id]['quantity'];
    session()->put('cart', $cart);

    return redirect()->back()->with('success', '✓ ' . $product->nama . ' ditambahkan ke keranjang!');
}
    public function remove($id)
    {
        $cart = session()->get('cart', []);
        
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Produk dihapus dari keranjang!');
    }
}

