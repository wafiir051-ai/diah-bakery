@extends('layouts.app')

@section('title', 'Keranjang')

@push('styles')
<style>
    .cart-card {
        background: white;
        border-radius: 20px;
        padding: 20px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }
    .cart-item {
        display: flex;
        align-items: center;
        padding: 15px 0;
        border-bottom: 1px solid #eee;
    }
    .cart-item-img {
        width: 70px;
        height: 70px;
        border-radius: 12px;
        object-fit: cover;
        margin-right: 15px;
    }
    .cart-item-info {
        flex: 1;
    }
    .cart-item-name {
        font-weight: 600;
        margin-bottom: 5px;
    }
    .cart-item-price {
        color: #f28bae;
        font-weight: 700;
    }
    .cart-item-subtotal {
        font-weight: 700;
        color: #f28bae;
        min-width: 100px;
        text-align: right;
    }
    .btn-remove {
        background: none;
        border: none;
        color: #ff6b6b;
        font-size: 20px;
        cursor: pointer;
        margin-left: 10px;
    }
    .cart-total {
        background: #ffe4ec;
        padding: 15px 20px;
        border-radius: 15px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 20px;
    }
</style>
@endpush

@section('content')
<div class="cart-card">
    <h4 class="mb-3">🛒 Keranjang Belanja</h4>
    
    @if(empty($products))
        <div class="text-center py-5">
            <i class="fas fa-shopping-cart" style="font-size: 64px; color: #ccc;"></i>
            <h5 class="mt-3">Keranjang kosong</h5>
            <a href="{{ url('/products') }}" class="btn-pink mt-3 d-inline-block">🛍️ Belanja Sekarang</a>
        </div>
    @else
        @foreach($products as $item)
        <div class="cart-item">
            <img src="{{ asset('uploads/'.($item['foto'] ?? 'default.jpg')) }}" class="cart-item-img" onerror="this.src='https://placehold.co/70x70/f8b0c5/white?text=Kue'">
            <div class="cart-item-info">
                <div class="cart-item-name">{{ $item['nama'] }}</div>
                <div class="cart-item-price">Rp {{ number_format($item['harga'], 0, ',', '.') }}</div>
                <small>Jumlah: {{ $item['quantity'] }}</small>
            </div>
            <div class="cart-item-subtotal">
                Rp {{ number_format($item['subtotal'], 0, ',', '.') }}
            </div>
            <form action="{{ url('/cart/remove/'.$item['id']) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-remove" onclick="return confirm('Hapus produk ini?')">🗑️</button>
            </form>
        </div>
        @endforeach
        
        <div class="cart-total">
            <span><strong>Total Belanja</strong></span>
            <span style="font-size: 24px; font-weight: 700; color: #f28bae;">Rp {{ number_format($total, 0, ',', '.') }}</span>
        </div>
        
        <div class="text-end mt-3">
            <a href="{{ url('/products') }}" class="btn-outline-pink me-2">← Lanjut Belanja</a>
            <a href="{{ url('/checkout') }}" class="btn-pink">✅ Checkout</a>
        </div>
    @endif
</div>
@endsection