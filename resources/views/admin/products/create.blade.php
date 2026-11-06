@extends('layouts.app')

@section('title', 'Tambah Produk')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header bg-pink text-white">
                    <h4 class="mb-0"><i class="fas fa-plus"></i> Tambah Produk Baru</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label>Nama Kue</label>
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" required>
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label>Rasa / Kategori</label>
                            <input type="text" name="rasa_kategori" class="form-control @error('rasa_kategori') is-invalid @enderror" placeholder="Contoh: Coklat, Strawberry, Keju" required>
                            @error('rasa_kategori')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Harga (Rp)</label>
                                    <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror" required>
                                    @error('harga')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Stok</label>
                                    <input type="number" name="stock" class="form-control @error('stock') is-invalid @enderror" required>
                                    @error('stock')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label>Deskripsi</label>
                            <textarea name="deskripsi" rows="3" class="form-control @error('deskripsi') is-invalid @enderror"></textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label>Foto Produk</label>
                            <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" accept="image/*">
                            <small class="text-muted">Format: JPG, PNG. Maksimal 2MB</small>
                            @error('foto')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="text-end">
                            <a href="{{ route('admin.products') }}" class="btn btn-secondary">Batal</a>
                            <button type="submit" class="btn btn-pink">Simpan Produk</button>
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
