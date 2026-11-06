@extends('layouts.app')

@section('title', 'Dashboard Admin')

@push('styles')
<style>
    .stat-card {
        background: white;
        border-radius: 20px;
        padding: 20px;
        text-align: center;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        transition: 0.3s;
    }
    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(242, 139, 174, 0.2);
    }
    .stat-icon {
        font-size: 40px;
        margin-bottom: 10px;
    }
    .stat-number {
        font-size: 28px;
        font-weight: bold;
        color: #f28bae;
    }
    .btn-logout {
        background: #ff6b6b;
        color: white;
        border: none;
        padding: 10px 24px;
        border-radius: 25px;
        font-weight: 600;
    }
    .btn-logout:hover {
        background: #ff5252;
    }
    .btn-pink {
        background: #f28bae;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 25px;
        font-weight: 600;
        transition: 0.3s;
    }
    .btn-pink:hover {
        background: #e06e94;
        color: white;
    }
    .nav-tabs .nav-link {
        color: #666;
        font-weight: 500;
    }
    .nav-tabs .nav-link.active {
        color: #f28bae;
        border-bottom: 2px solid #f28bae;
    }
    .status-badge {
        padding: 5px 10px;
        border-radius: 15px;
        font-size: 12px;
        font-weight: 600;
    }
    .status-diproses {
        background: #ffeaa7;
        color: #fdcb6e;
    }
    .status-selesai {
        background: #b2ffda;
        color: #00b894;
    }
    .btn-complete {
        background: #00b894;
        color: white;
        border: none;
        padding: 5px 10px;
        border-radius: 15px;
        font-size: 12px;
    }
    .btn-complete:hover {
        background: #009379;
        color: white;
    }
    .btn-success {
        background: #25D366;
        color: white;
        border: none;
        padding: 5px 10px;
        border-radius: 15px;
        font-size: 12px;
    }
    .btn-success:hover {
        background: #1da851;
    }
</style>
@endpush

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>📊 Dashboard Admin</h2>
    <form action="{{ url('/logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn-logout">
            <i class="fas fa-sign-out-alt"></i> Logout
        </button>
    </form>
</div>

<div class="row mb-4">
    <div class="col-md-3 mb-3">
        <div class="stat-card">
            <div class="stat-icon">🍰</div>
            <div class="stat-number">{{ $totalProduk }}</div>
            <div>Total Produk</div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="stat-card">
            <div class="stat-icon">📦</div>
            <div class="stat-number">{{ $totalStok }}</div>
            <div>Total Stok</div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="stat-card">
            <div class="stat-icon">💰</div>
            <div class="stat-number">Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</div>
            <div>Pendapatan</div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="stat-card">
            <div class="stat-icon">🛒</div>
            <div class="stat-number">{{ $totalPesanan }}</div>
            <div>Total Pesanan</div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h5>📝 Tambah Produk Baru</h5>
                <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <input type="text" name="nama" class="form-control mb-2" placeholder="Nama Kue" required>
                        </div>
                        <div class="col-6">
                            <input type="text" name="rasa_kategori" class="form-control mb-2" placeholder="Kategori" required>
                        </div>
                        <div class="col-4">
                            <input type="number" name="harga" class="form-control mb-2" placeholder="Harga" required>
                        </div>
                        <div class="col-4">
                            <input type="number" name="stock" class="form-control mb-2" placeholder="Stok" required>
                        </div>
                        <div class="col-4">
                            <input type="file" name="foto" class="form-control mb-2" accept="image/*">
                        </div>
                        <div class="col-12">
                            <textarea name="deskripsi" class="form-control mb-2" rows="2" placeholder="Deskripsi"></textarea>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn-pink w-100">+ Tambah Produk</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="col-md-6 mb-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h5>📋 Ringkasan Pesanan</h5>
                <div class="row text-center">
                    <div class="col-6">
                        <div class="stat-number">{{ $pesananDiproses }}</div>
                        <div>Pesanan Diproses</div>
                    </div>
                    <div class="col-6">
                        <div class="stat-number">{{ $pesananSelesai }}</div>
                        <div>Pesanan Selesai</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tabs untuk Pesanan -->
<div class="card border-0 shadow-sm">
    <div class="card-body">
        <ul class="nav nav-tabs mb-3" id="orderTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="proses-tab" data-bs-toggle="tab" data-bs-target="#proses" type="button" role="tab">
                    🕐 Pesanan Diproses ({{ $pesananDiproses }})
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="selesai-tab" data-bs-toggle="tab" data-bs-target="#selesai" type="button" role="tab">
                    ✅ Pesanan Selesai ({{ $pesananSelesai }})
                </button>
            </li>
        </ul>
        
        <div class="tab-content" id="orderTabContent">
            <!-- Tab Pesanan Diproses -->
            <div class="tab-pane fade show active" id="proses" role="tabpanel">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Pembeli</th>
                                <th>Total Harga</th>
                                <th>Tanggal Pesan</th>
                                <th>Detail Pesanan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($pesananDiprosesList as $p)
                            <tr>
                                <td>#{{ $p->id }}</td>
                                <td>{{ $p->nama_pembeli }}</td>
                                <td>Rp {{ number_format($p->total_harga, 0, ',', '.') }}</td>
                                <td>{{ \Carbon\Carbon::parse($p->created_at)->format('d/m/Y H:i') }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#detailModal{{ $p->id }}">
                                        Lihat Detail
                                    </button>
                                </td>
                                <td>
                                    <button onclick="sendWA({{ $p->id }})" class="btn btn-sm btn-success">
                                        <i class="fab fa-whatsapp"></i> Kirim Struk
                                    </button>
                                    <form action="{{ route('admin.orders.complete', $p->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn-complete" onclick="return confirm('Tandai pesanan ini sebagai selesai?')">
                                            ✅ Ambil / Selesai
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center">Tidak ada pesanan yang diproses</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            
            <!-- Tab Pesanan Selesai -->
            <div class="tab-pane fade" id="selesai" role="tabpanel">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Pembeli</th>
                                <th>Total Harga</th>
                                <th>Tanggal Pesan</th>
                                <th>Tanggal Selesai</th>
                                <th>Detail Pesanan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($pesananSelesaiList as $p)
                            <tr>
                                <td>#{{ $p->id }}</td>
                                <td>{{ $p->nama_pembeli }}</td>
                                <td>Rp {{ number_format($p->total_harga, 0, ',', '.') }}</td>
                                <td>{{ \Carbon\Carbon::parse($p->created_at)->format('d/m/Y H:i') }}</td>
                                <td>{{ $p->completed_at ? \Carbon\Carbon::parse($p->completed_at)->format('d/m/Y H:i') : '-' }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#detailModalSelesai{{ $p->id }}">
                                        Lihat Detail
                                    </button>
                                 </td>
                                 <td>
                                    <button onclick="sendWA({{ $p->id }})" class="btn btn-sm btn-success">
                                        <i class="fab fa-whatsapp"></i> Kirim Struk
                                    </button>
                                 </td>
                             </tr>
                            @empty
                             <tr>
                                <td colspan="7" class="text-center">Belum ada pesanan yang selesai</td>
                             </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Detail Pesanan Diproses -->
@foreach($pesananDiprosesList as $p)
<div class="modal fade" id="detailModal{{ $p->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Pesanan #{{ $p->id }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p><strong>Nama Pembeli:</strong> {{ $p->nama_pembeli }}</p>
                <p><strong>Total Harga:</strong> Rp {{ number_format($p->total_harga, 0, ',', '.') }}</p>
                <p><strong>Tanggal Pesan:</strong> {{ \Carbon\Carbon::parse($p->created_at)->format('d/m/Y H:i') }}</p>
                <hr>
                <h6>Detail Item:</h6>
                @php $details = is_string($p->detail_pesanan) ? json_decode($p->detail_pesanan, true) : $p->detail_pesanan; @endphp
                @if($details)
                    <ul>
                        @foreach($details as $item)
                            <li>{{ $item['nama'] ?? $item['product_name'] ?? 'Produk' }} - {{ $item['quantity'] ?? $item['qty'] ?? 0 }} x Rp {{ number_format($item['harga'] ?? $item['price'] ?? 0, 0, ',', '.') }}</li>
                        @endforeach
                    </ul>
                @else
                    <p>Tidak ada detail item</p>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
@endforeach

<!-- Modal Detail Pesanan Selesai -->
@foreach($pesananSelesaiList as $p)
<div class="modal fade" id="detailModalSelesai{{ $p->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Pesanan #{{ $p->id }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p><strong>Nama Pembeli:</strong> {{ $p->nama_pembeli }}</p>
                <p><strong>Total Harga:</strong> Rp {{ number_format($p->total_harga, 0, ',', '.') }}</p>
                <p><strong>Tanggal Pesan:</strong> {{ \Carbon\Carbon::parse($p->created_at)->format('d/m/Y H:i') }}</p>
                <p><strong>Tanggal Selesai:</strong> {{ $p->completed_at ? \Carbon\Carbon::parse($p->completed_at)->format('d/m/Y H:i') : '-' }}</p>
                <hr>
                <h6>Detail Item:</h6>
                @php $details = is_string($p->detail_pesanan) ? json_decode($p->detail_pesanan, true) : $p->detail_pesanan; @endphp
                @if($details)
                    <ul>
                        @foreach($details as $item)
                            <li>{{ $item['nama'] ?? $item['product_name'] ?? 'Produk' }} - {{ $item['quantity'] ?? $item['qty'] ?? 0 }} x Rp {{ number_format($item['harga'] ?? $item['price'] ?? 0, 0, ',', '.') }}</li>
                        @endforeach
                    </ul>
                @else
                    <p>Tidak ada detail item</p>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
@endforeach

<div class="card border-0 shadow-sm mt-4">
    <div class="card-body">
        <h5>🍰 Semua Produk</h5>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                    <tr>
                        <td>
                            <img src="{{ asset('uploads/'.($product->foto ?: 'default.jpg')) }}" width="40" height="40" style="object-fit:cover; border-radius:10px;">
                         </td>
                         <td>{{ $product->nama }}</td>
                         <td>Rp {{ number_format($product->harga, 0, ',', '.') }}</td>
                         <td>{{ $product->stock }}</td>
                         <td>
                            <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus?')">Hapus</button>
                            </form>
                         </td>
                     </tr>
                    @empty
                     <tr><td colspan="5">Belum ada produk</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function sendWA(id) {
    // Redirect ke route sendWA
    window.open('/admin/order/' + id + '/send-wa', '_blank');
}
</script>
@endpush