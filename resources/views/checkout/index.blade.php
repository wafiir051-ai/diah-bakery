@extends('layouts.app')

@section('title', 'Checkout')

@push('styles')
<style>
    .checkout-card {
        background: white;
        border-radius: 20px;
        padding: 25px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }
    .return-time {
        background: #ffe4ec;
        border-radius: 15px;
        padding: 15px;
        text-align: center;
        margin-top: 20px;
    }
    .return-time span {
        font-size: 24px;
        font-weight: bold;
        color: #f28bae;
    }
</style>
@endpush

@section('content')
<div class="row">
    <div class="col-md-7 mx-auto">
        <div class="checkout-card">
            <h4 class="text-center mb-4">📝 Form Pemesanan</h4>
            
            <form action="{{ url('/checkout/process') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label>Nama Pembeli</label>
                    <input type="text" name="nama_pembeli" class="form-control" style="border-radius: 25px; padding: 12px;" required>
                </div>
                <div class="mb-3">
                    <label>No Telepon</label>
                    <input type="text" name="no_telepon" class="form-control" style="border-radius: 25px; padding: 12px;" required>
                </div>
                
                <h5 class="mt-4">Detail Pesanan:</h5>
                @foreach($products as $item)
                <div class="d-flex justify-content-between mb-2">
                    <span>{{ $item['nama'] }} x{{ $item['quantity'] }}</span>
                    <span>Rp {{ number_format($item['subtotal'], 0, ',', '.') }}</span>
                </div>
                @endforeach
                <hr>
                <div class="d-flex justify-content-between fw-bold">
                    <span>Total</span>
                    <span style="color: #f28bae;">Rp {{ number_format($total, 0, ',', '.') }}</span>
                </div>
                
                <!-- Waktu Pengembalian 30 Menit -->
                <div class="return-time">
                    <i class="fas fa-clock"></i> Waktu Pengembalian
                    <br>
                    <span>30 Menit</span>
                    <br>
                    <small>Setelah pesanan selesai, Anda bisa mengembalikan dalam 30 menit</small>
                </div>
                
                <button type="submit" class="btn-pink w-100 mt-4">✅ Konfirmasi Pesanan</button>
            </form>
        </div>
    </div>
</div>
@endsection
