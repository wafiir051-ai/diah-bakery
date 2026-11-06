@extends('layouts.app')

@section('title', 'Edit Produk')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header bg-pink text-white">
                    <h4 class="mb-0"><i class="fas fa-edit"></i> Edit Produk</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label>Nama Kue</label>
                            <input type="text" name="nama" class="form-control" value="{{ $product->nama }}" required>
                        </div>

                        <div class="mb-3">
                            <label>Rasa / Kategori</label>
                            <input type="text" name="rasa_kategori" class="form-control" value="{{ $product->rasa_kategori }}" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Harga (Rp)</label>
                                    <input type="number" name="harga" class="form-control" value="{{ $product->harga }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Stok</label>
                                    <input type="number" name="stock" class="form-control" value="{{ $product->stock }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label>Deskripsi</label>
                            <textarea name="deskripsi" rows="3" class="form-control">{{ $product->deskripsi }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label>Foto Saat Ini</label><br>
                            @if($product->foto && file_exists(public_path('uploads/'.$product->foto)))
                                <img src="{{ asset('uploads/'.$product->foto) }}" width="100" class="mb-2">
                            @else
                                <img src="https://via.placeholder.com/100" width="100" class="mb-2">
                            @endif
                            <input type="file" name="foto" class="form-control" accept="image/*">
                            <small class="text-muted">Kosongkan jika tidak ingin mengganti foto</small>
                        </div>

                        <div class="text-end">
                            <a href="{{ route('admin.products') }}" class="btn btn-secondary">Batal</a>
                            <button type="submit" class="btn btn-pink">Update Produk</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .bg-pink { background: linear-gradient(135deg, #f8b0c5, #f28bae); }
    .btn-pink {
        background: linear-gradient(135deg, #f8b0c5, #f28bae);
        border: none;
        color: white;
    }
</style>
@endsection
