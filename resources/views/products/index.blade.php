@extends('layouts.app')

@section('title', 'Produk - Diah Bakery')

@push('styles')
<style>
    /* Hero Carousel */
    .hero-carousel {
        max-width: 1280px;
        margin: 5px auto 30px;
        position: relative;
    }

    .carousel-container {
        position: relative;
        overflow: hidden;
        border-radius: 24px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .carousel-wrapper {
        display: flex;
        transition: transform 0.5s ease-in-out;
    }

    .carousel-slide {
        min-width: 100%;
        position: relative;
        height: 400px;
    }

    .carousel-slide img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* Konten di atas slide */
    .slide-content {
        position: absolute;
        bottom: 20%;
        left: 10%;
        background: rgba(255, 255, 255, 0.9);
        padding: 20px 30px;
        border-radius: 20px;
        max-width: 400px;
        backdrop-filter: blur(10px);
    }

    .promo-badge {
        background: linear-gradient(135deg, #ff6b6b, #ee5a24);
        padding: 5px 15px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: bold;
        color: white;
        display: inline-block;
        margin-bottom: 10px;
    }

    .slide-content h2 {
        font-size: 24px;
        margin-bottom: 10px;
        color: #333;
    }

    .slide-content h2 .highlight {
        color: #ee4d2d;
    }

    .slide-content p {
        font-size: 14px;
        color: #666;
        margin-bottom: 15px;
    }

    .promo-btn {
        background: #ee4d2d;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 30px;
        font-weight: bold;
        cursor: pointer;
        transition: 0.3s;
    }

    .promo-btn:hover {
        background: #d73c1a;
        transform: translateY(-2px);
    }

    /* Tombol navigasi */
    .carousel-btn {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background: rgba(0, 0, 0, 0.5);
        color: white;
        border: none;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        cursor: pointer;
        font-size: 18px;
        transition: 0.3s;
        z-index: 10;
    }

    .carousel-btn:hover {
        background: rgba(0, 0, 0, 0.8);
    }

    .prev-btn {
        left: 20px;
    }

    .next-btn {
        right: 20px;
    }

    /* Indikator dots */
    .carousel-dots {
        position: absolute;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        gap: 10px;
    }

    .dot {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.5);
        cursor: pointer;
        transition: 0.3s;
    }

    .dot.active {
        background: #ee4d2d;
        width: 25px;
        border-radius: 10px;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .carousel-slide {
            height: 300px;
        }
        .slide-content {
            bottom: 10%;
            left: 5%;
            padding: 15px 20px;
            max-width: 280px;
        }
        .slide-content h2 {
            font-size: 18px;
        }
        .slide-content p {
            font-size: 12px;
        }
        .promo-btn {
            padding: 6px 15px;
            font-size: 12px;
        }
    }
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        background: #f5f5f5;
        font-family: 'Poppins', 'Inter', system-ui, sans-serif;
    }

    /* Container utama */
    .products-container {
        max-width: 1280px;
        margin: 0 auto;
        padding: 100px 20px 60px;
    }

    /* Header Section */
    .products-header {
        text-align: center;
        margin-bottom: 40px;
    }

    .products-header h1 {
        font-size: 2.5rem;
        font-weight: 800;
        background: linear-gradient(135deg, #1e1e2a, #2d2d3a);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 8px;
    }

    .products-header p {
        color: #666;
        font-size: 0.9rem;
    }

    .divider {
        width: 60px;
        height: 3px;
        background: linear-gradient(90deg, #ff6b6b, #ff8e8e);
        margin: 15px auto 0;
        border-radius: 10px;
    }

    /* Grid Produk */
    .product-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
        gap: 24px;
    }

    /* Card Produk */
    .product-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        transition: all 0.3s ease;
        cursor: pointer;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        position: relative;
    }

    .product-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 30px -12px rgba(0, 0, 0, 0.15);
    }

    /* Gambar */
    .product-image {
        position: relative;
        padding-top: 100%;
        background: #fafafa;
        overflow: hidden;
    }

    .product-image img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s ease;
    }

    .product-card:hover .product-image img {
        transform: scale(1.05);
    }

    /* Badge Diskon */
    .discount-badge {
        position: absolute;
        top: 12px;
        left: 12px;
        background: #ee4d2d;
        color: white;
        font-size: 11px;
        font-weight: 700;
        padding: 4px 10px;
        border-radius: 20px;
        z-index: 2;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    /* Badge Stok */
    .stock-badge {
        position: absolute;
        bottom: 12px;
        right: 12px;
        background: rgba(0, 0, 0, 0.7);
        backdrop-filter: blur(4px);
        color: white;
        font-size: 10px;
        font-weight: 500;
        padding: 4px 10px;
        border-radius: 20px;
        z-index: 2;
    }

    /* Informasi Produk */
    .product-info {
        padding: 16px;
    }

    .product-name {
        font-size: 15px;
        font-weight: 600;
        color: #1a1a1a;
        margin-bottom: 6px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        min-height: 42px;
    }

    /* Harga */
    .price-wrapper {
        display: flex;
        align-items: baseline;
        gap: 8px;
        margin-bottom: 8px;
        flex-wrap: wrap;
    }

    .price-original {
        font-size: 13px;
        color: #999;
        text-decoration: line-through;
    }

    .price-discount {
        font-size: 18px;
        font-weight: 800;
        color: #ee4d2d;
    }

    .price-discount small {
        font-size: 11px;
        font-weight: normal;
    }

    /* Rating */
    .rating-wrapper {
        display: flex;
        align-items: center;
        gap: 6px;
        margin-bottom: 12px;
    }

    .stars {
        display: flex;
        align-items: center;
        gap: 2px;
    }

    .stars i {
        font-size: 12px;
        color: #ffc107;
    }

    .stars i.far {
        color: #e0e0e0;
    }

    .rating-count {
        font-size: 11px;
        color: #666;
    }

    /* Tombol Add to Cart */
    .btn-add-cart {
        width: 100%;
        background: linear-gradient(135deg, #ee4d2d, #ff6b4a);
        border: none;
        color: white;
        padding: 10px;
        border-radius: 40px;
        font-size: 13px;
        font-weight: 700;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        cursor: pointer;
    }

    .btn-add-cart:hover {
        background: linear-gradient(135deg, #d73c1a, #ee4d2d);
        transform: scale(1.02);
    }

    .btn-add-cart:disabled {
        background: #ccc;
        cursor: not-allowed;
        transform: none;
    }

    /* Empty State */
    .empty-state {
        grid-column: 1 / -1;
        text-align: center;
        padding: 60px 20px;
        background: white;
        border-radius: 24px;
    }

    .empty-state i {
        font-size: 64px;
        color: #ddd;
        margin-bottom: 16px;
    }

    .empty-state h4 {
        font-size: 18px;
        color: #666;
        margin-bottom: 8px;
    }

    .empty-state p {
        color: #999;
        margin-bottom: 20px;
    }

    .btn-login {
        background: #ee4d2d;
        color: white;
        padding: 10px 30px;
        border-radius: 30px;
        text-decoration: none;
        font-weight: 600;
        display: inline-block;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .products-container {
            padding: 90px 16px 40px;
        }
        
        .product-grid {
            grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
            gap: 12px;
        }
        
        .product-name {
            font-size: 13px;
            min-height: 36px;
        }
        
        .price-discount {
            font-size: 14px;
        }
        
        .price-original {
            font-size: 11px;
        }
        
        .btn-add-cart {
            padding: 8px;
            font-size: 11px;
        }
        
        .products-header h1 {
            font-size: 1.8rem;
        }
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .product-card {
        animation: fadeInUp 0.4s ease forwards;
        opacity: 0;
    }

    .product-card:nth-child(1) { animation-delay: 0s; }
    .product-card:nth-child(2) { animation-delay: 0.05s; }
    .product-card:nth-child(3) { animation-delay: 0.1s; }
    .product-card:nth-child(4) { animation-delay: 0.15s; }
    .product-card:nth-child(5) { animation-delay: 0.2s; }
    .product-card:nth-child(6) { animation-delay: 0.25s; }
</style>
@endpush

@section('content')
<div class="products-container">


    
    
        <!-- Hero Carousel Section -->
    <!-- Hero Carousel Section -->
    <section class="hero-carousel">
        <div class="carousel-container">
            <div class="carousel-wrapper" id="carouselWrapper">
                
                <!-- Slide 1 -->
                <div class="carousel-slide">
                    <img src="/uploads/1779506688_berrycake.jpg" alt="Promo Member Baru">
                    
                </div>
                
                <!-- Slide 2 -->
                <div class="carousel-slide">
                    <img src="https://images.unsplash.com/photo-1558961363-fa8fdf82db35?w=1200&h=400&fit=crop" alt="Promo Kue Spesial">
                    
                </div>
                
                <!-- Slide 3 -->
                <div class="carousel-slide">
                    <img src="https://images.unsplash.com/photo-1578985545062-69928b1d9587?w=1200&h=400&fit=crop" alt="Promo Free Ongkir">
                    <div class="slide-content">
                        <span class="promo-badge">🚚 GRATIS ONGKIR 🚚</span>
                        <h2>Minimal Belanja <span class="highlight">Rp50.000</span></h2>
                        <p>Nikmati gratis ongkir untuk seluruh Indonesia!</p>
                       
                    </div>
                </div>
                
                <!-- Slide 4 -->
                <div class="carousel-slide">
                    <img src="/uploads/1780115800_donat%20salju.jpg" alt="Promo Member Baru">
                   <div class="slide-content">
                        <span class="promo-badge">✨ MEMBER BARU ✨</span>
                        <h2>Dapatkan Diskon <span class="highlight">20%</span> untuk Pembelian Pertama!</h2>
                        <p>Daftar sekarang dan nikmati berbagai keuntungan lainnya!</p>
                        
                    </div>
                </div>
                
            </div>
            
            <!-- Tombol Navigasi -->
            <button class="carousel-btn prev-btn" id="prevBtn">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button class="carousel-btn next-btn" id="nextBtn">
                <i class="fas fa-chevron-right"></i>
            </button>
            
            <!-- Indikator/Dots -->
            <div class="carousel-dots" id="carouselDots">
                <span class="dot active"></span>
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
            </div>
            
        </div>
    </section>

    <!-- Grid Produk -->
    <div class="product-grid">
        @forelse($products as $product)
        @php
            // Hitung diskon random (simulasi, bisa diambil dari database)
            $discount = $product->diskon ?? rand(10, 30);
            $priceAfterDiscount = $product->harga - ($product->harga * $discount / 100);
            $hasDiscount = $discount > 0;
            $rating = 4.5 + (rand(0, 50) / 100);
            $rating = min(5, $rating);
            $ratingCount = rand(50, 999);
            
            // Foto produk
            $fotoFile = $product->foto ?: 'default.jpg';
            $fotoUrl = file_exists(public_path('uploads/' . $fotoFile)) 
                ? asset('uploads/' . $fotoFile) 
                : 'https://placehold.co/300x300/f8f8f8/999?text=' . urlencode(substr($product->nama, 0, 2));
        @endphp
        
        <div class="product-card">
            <div class="product-image">
                <img src="{{ $fotoUrl }}" alt="{{ $product->nama }}" loading="lazy">
                
                @if($hasDiscount)
                    <div class="discount-badge">
                        -{{ $discount }}%
                    </div>
                @endif
                
                <div class="stock-badge">
                    @if($product->stock > 0)
                        ✓ Stok {{ $product->stock }}
                    @else
                        ✗ Habis
                    @endif
                </div>
            </div>
            
            <div class="product-info">
                <div class="product-name">{{ $product->nama }}</div>
                
                <div class="price-wrapper">
                    @if($hasDiscount)
                        <span class="price-original">Rp {{ number_format($product->harga, 0, ',', '.') }}</span>
                        <span class="price-discount">
                            Rp {{ number_format($priceAfterDiscount, 0, ',', '.') }}
                            <small>/pcs</small>
                        </span>
                    @else
                        <span class="price-discount">
                            Rp {{ number_format($product->harga, 0, ',', '.') }}
                            <small>/pcs</small>
                        </span>
                    @endif
                </div>
                
                <div class="rating-wrapper">
                    <div class="stars">
                        @for($i = 1; $i <= 5; $i++)
                            @if($i <= floor($rating))
                                <i class="fas fa-star"></i>
                            @elseif($i - $rating <= 0.5 && $rating - floor($rating) > 0)
                                <i class="fas fa-star-half-alt"></i>
                            @else
                                <i class="far fa-star"></i>
                            @endif
                        @endfor
                    </div>
                    <span class="rating-count">{{ number_format($rating, 1) }} ({{ $ratingCount }}+)</span>
                </div>
                
                @if($product->stock > 0)
                    <form action="{{ url('/cart/add/'.$product->id) }}" method="POST" class="add-to-cart-form">
                        @csrf
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit" class="btn-add-cart">
                             add to cart>
                        </button>
                    </form>
                @else
                    <button class="btn-add-cart" disabled>
                        ⚡ out of stock
                    </button>
                @endif
            </div>
        </div>
        @empty
        <div class="empty-state">
            <i class="fas fa-cake"></i>
            <h4>Belum ada produk</h4>
            <p>Login sebagai admin untuk menambah produk</p>
            <a href="{{ url('/login') }}" class="btn-login">Login Admin 👤</a>
        </div>
        @endforelse
    </div>
</div>
@endsection

@push('scripts')
<script>
        // Carousel Function
    const carouselWrapper = document.getElementById('carouselWrapper');
    const slides = document.querySelectorAll('.carousel-slide');
    const dots = document.querySelectorAll('.dot');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');

    let currentIndex = 0;
    const totalSlides = slides.length;
    let autoPlayInterval;

    // Fungsi untuk update slide
    function updateSlide(index) {
        if (index < 0) {
            currentIndex = totalSlides - 1;
        } else if (index >= totalSlides) {
            currentIndex = 0;
        } else {
            currentIndex = index;
        }
        
        const offset = -currentIndex * 100;
        carouselWrapper.style.transform = `translateX(${offset}%)`;
        
        // Update active dot
        dots.forEach((dot, i) => {
            dot.classList.toggle('active', i === currentIndex);
        });
    }

    // Event listener tombol
    prevBtn.addEventListener('click', () => {
        updateSlide(currentIndex - 1);
        resetAutoPlay();
    });

    nextBtn.addEventListener('click', () => {
        updateSlide(currentIndex + 1);
        resetAutoPlay();
    });

    // Event listener dots
    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => {
            updateSlide(index);
            resetAutoPlay();
        });
    });

    // Auto play
    function startAutoPlay() {
        autoPlayInterval = setInterval(() => {
            updateSlide(currentIndex + 1);
        }, 5000);
    }

    function resetAutoPlay() {
        clearInterval(autoPlayInterval);
        startAutoPlay();
    }

    // Start auto play
    startAutoPlay();

    // Pause auto play saat hover
    const carouselContainer = document.querySelector('.carousel-container');
    carouselContainer.addEventListener('mouseenter', () => {
        clearInterval(autoPlayInterval);
    });
    carouselContainer.addEventListener('mouseleave', () => {
        startAutoPlay();
    });
    // Smooth animation for product cards
    document.addEventListener('DOMContentLoaded', function() {
        const cards = document.querySelectorAll('.product-card');
        cards.forEach((card, index) => {
            card.style.animationDelay = `${index * 0.05}s`;
        });
    });
</script>
@endpush