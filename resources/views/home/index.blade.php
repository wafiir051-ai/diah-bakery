@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="row">
    @foreach($products as $product)
    <div class="col-md-4 mb-4">
        <div class="card card-produk p-3 h-100">
            <img src="https://via.placeholder.com/300x200?text={{ urlencode($product->nama) }}" 
                 class="card-img-top" style="height: 200px; object-fit: cover; border-radius: 15px;">
            <div class="card-body">
                <h5 class="card-title">{{ $product->nama }}</h5>
                <p class="card-text text-muted">🍰 {{ $product->rasa_kategori }}</p>
                <p class="price">Rp {{ number_format($product->harga, 0, ',', '.') }}</p>
                <p class="card-text small">{{ Str::limit($product->deskripsi, 60) }}</p>
                <p>📦 Stok: 
                    <span class="badge bg-{{ $product->stock <= 0 ? 'danger' : 'success' }}">
                        {{ $product->stock }}
                    </span>
                </p>
                
                @if($product->stock > 0)
                <form action="{{ url('/cart/add/'.$product->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-pink w-100">➕ Tambah ke Keranjang</button>
                </form>
                @else
                <button class="btn btn-secondary w-100" disabled>❌ Stok Habis</button>
                @endif
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
