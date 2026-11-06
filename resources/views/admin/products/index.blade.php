@extends('layouts.app')

@section('title', 'Produk Kami')

@section('content')
<div class="container">
    <div class="text-center mb-5">
        <h2 class="display-4 fw-bold text-danger">🍰 Produk Kami</h2>
        <p class="lead">Pilihan kue terbaik untuk Anda</p>
    </div>

    <div class="row">
        @forelse($products as $product)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body text-center">
                    <div class="mb-3">
                        @php
                            $fotoPath = public_path('uploads/' . $product->foto);
                            $hasFoto = ($product->foto && file_exists($fotoPath));
                        @endphp

                        @if($hasFoto)
                            <img src="{{ asset('uploads/'.$product->foto) }}" class="img-fluid" style="height: 150px; object-fit: cover; border-radius: 15px;">
                        @else
                            <img src="{{ asset('uploads/default.jpg') }}" class="img-fluid" style="height: 150px; object-fit: cover; border-radius: 15px;" onerror="this.src='https://via.placeholder.com/150'">
                        @endif
                    </div>
                    <h5 class="card-title fw-bold">{{ $product->nama }}</h5>
                    <p class="text-muted">
                        <i class="fas fa-tag"></i> {{ $product->rasa_kategori }}
                    </p>
                    <p class="card-text small">{{ Str::limit($product->deskripsi, 80) }}</p>
                    <h4 class="text-danger fw-bold">Rp {{ number_format($product->harga, 0, ',', '.') }}</h4>
                    <p class="text-muted">
                        <i class="fas fa-box"></i> Stok: {{ $product->stock }}
                    </p>
                    
                    @if($product->stock > 0)
                    <form action="{{ url('/cart/add/'.$product->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-pink w-100">
                            <i class="fas fa-cart-plus"></i> Tambah ke Keranjang
                        </button>
                    </form>
                    @else
                    <button class="btn btn-secondary w-100" disabled>
                        <i class="fas fa-times"></i> Stok Habis
                    </button>
                    @endif
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center">
            <p>Belum ada produk. <a href="{{ url('/login') }}">Login sebagai admin</a> untuk menambah produk.</p>
        </div>
        @endforelse
    </div>
</div>

<style>
    .btn-pink {
        background: linear-gradient(135deg, #f8b0c5, #f28bae);
        border: none;
        color: white;
        transition: 0.3s;
    }
    .btn-pink:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(242, 139, 174, 0.3);
    }
</style>
@endsection