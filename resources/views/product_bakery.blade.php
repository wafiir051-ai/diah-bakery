<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DH Bakery - Katalog Pilihan Manis</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:italic,wght@700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #fff5f7;
            scroll-behavior: smooth;
        }
        .font-elegant { font-family: 'Playfair Display', serif; }
        input[type=number]::-webkit-inner-spin-button, 
        input[type=number]::-webkit-outer-spin-button { -webkit-appearance: none; margin: 0; }
        
        .glass-nav {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(251, 113, 133, 0.1);
        }
        
        .hidden-view { display: none; }
        
        .receipt-paper {
            background: #ffffff;
            position: relative;
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
            border-radius: 1rem 1rem 0 0;
        }
        .receipt-paper::after {
            content: "";
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 100%;
            height: 10px;
            background: linear-gradient(-45deg, transparent 5px, #ffffff 5px), linear-gradient(45deg, transparent 5px, #ffffff 5px);
            background-size: 10px 10px;
        }

        .product-card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .product-card:hover {
            transform: translateY(-5px);
        }
        .product-card:hover img { transform: scale(1.1); }
        
        .fab-button {
            position: fixed;
            bottom: 30px;
            right: 30px;
            z-index: 99;
            box-shadow: 0 15px 30px rgba(244, 63, 94, 0.3);
            text-decoration: none;
        }

        .nav-link {
            position: relative;
            transition: color 0.3s;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -4px;
            left: 0;
            background-color: #f43f5e;
            transition: width 0.3s;
        }
        .nav-link:hover::after {
            width: 100%;
        }

        /* Hero Carousel */
.hero-carousel {
    max-width: 1280px;
    margin: 100px auto 40px;
    padding: 0 20px;
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

    </style>
</head>
<body class="pb-20">

    <!-- Navbar -->
    <header class="fixed top-0 left-0 w-full z-50 glass-nav">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <!-- Logo Area -->
            <div class="flex items-center gap-4 cursor-pointer" onclick="showView('katalog')">
                <div class="w-10 h-10 bg-rose-500 rounded-xl flex items-center justify-center text-white shadow-lg shadow-rose-200">
                    <i class="fas fa-bread-slice"></i>
                </div>
                <h1 class="text-xl font-black text-gray-800 tracking-tighter">DH <span class="text-rose-500">BAKERY</span></h1>
            </div>
            
            <!-- Desktop Nav -->
            <nav class="hidden lg:flex gap-10 text-[12px] font-black text-rose-400 uppercase tracking-widest items-center">
                <a href="/home" class="nav-link hover:text-rose-600">Beranda</a>
                <a href="/home#product" onclick="showView('katalog')" class="nav-link hover:text-rose-600">Produk</a>
                <a href="/home#Profile" class="nav-link hover:text-rose-600">Tentang</a>
                <a href="/home#contact" class="nav-link hover:text-rose-600">Kontak</a>
            </nav>

            <!-- Cart Trigger -->
            <div onclick="showView('keranjang')" class="relative group cursor-pointer bg-rose-500 text-white px-6 py-2.5 rounded-full flex items-center gap-3 shadow-xl shadow-rose-200 transition-all hover:scale-105 active:scale-95">
                <i class="fas fa-shopping-cart"></i>
                <span class="font-bold text-sm tracking-wide hidden md:inline">KERANJANG</span>
                <span id="cart-count" class="bg-white text-rose-500 text-[10px] w-5 h-5 rounded-full flex items-center justify-center font-black">0</span>
            </div>
        </div>
    </header>

    <!-- Hero Carousel Section -->
<section class="hero-carousel">
    <div class="carousel-container">
        <div class="carousel-wrapper" id="carouselWrapper">
            
            <!-- Slide 1 -->
            <div class="carousel-slide">
                <img src="https://images.unsplash.com/photo-1603532648955-039310d9a75b?w=1200&h=400&fit=crop" alt="Promo Guncang 6.6">
                <div class="slide-content">
                    <span class="promo-badge">🔥 PROMO GUNCANG 6.6 🔥</span>
                    <h2>Diskon hingga <span class="highlight">66%</span></h2>
                    <p>Belanjaanmu dibayarin hingga ratusan ribu rupiah!</p>
                    <button class="promo-btn">Lihat Promo →</button>
                </div>
            </div>
            
            <!-- Slide 2 -->
            <div class="carousel-slide">
                <img src="https://images.unsplash.com/photo-1558961363-fa8fdf82db35?w=1200&h=400&fit=crop" alt="Promo Kue Spesial">
                <div class="slide-content">
                    <span class="promo-badge">🎂 SPESIAL HARI RAYA 🎂</span>
                    <h2>Beli 2 Gratis <span class="highlight">1 Kue</span></h2>
                    <p>Untuk setiap pembelian 2 kue, dapatkan 1 kue gratis!</p>
                    <button class="promo-btn">Lihat Promo →</button>
                </div>
            </div>
            
            <!-- Slide 3 -->
            <div class="carousel-slide">
                <img src="https://images.unsplash.com/photo-1578985545062-69928b1d9587?w=1200&h=400&fit=crop" alt="Promo Free Ongkir">
                <div class="slide-content">
                    <span class="promo-badge">🚚 GRATIS ONGKIR 🚚</span>
                    <h2>Minimal Belanja <span class="highlight">Rp50.000</span></h2>
                    <p>Nikmati gratis ongkir untuk seluruh Indonesia!</p>
                    <button class="promo-btn">Lihat Promo →</button>
                </div>
            </div>
            
            <!-- Slide 4 -->
            <div class="carousel-slide">
                <img src="https://images.unsplash.com/photo-1509440159596-0249088772ff?w=1200&h=400&fit=crop" alt="Promo Member Baru">
                <div class="slide-content">
                    <span class="promo-badge">✨ MEMBER BARU ✨</span>
                    <h2>Diskon <span class="highlight">20%</span> Pertama Belanja</h2>
                    <p>Bergabung sekarang dan dapatkan potongan harga!</p>
                    <button class="promo-btn">Daftar Sekarang →</button>
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

    <!-- VIEW 1: KATALOG PRODUK -->
    <main id="view-katalog" class="pt-32 px-6 max-w-7xl mx-auto">
        <div class="text-center mb-16">
            <span class="text-rose-400 font-extrabold uppercase tracking-[0.3em] text-xs">Menu Unggulan</span>
            <h2 class="text-4xl md:text-5xl font-elegant text-gray-800 mt-4 italic">Produk Unggulan</h2>
            <div class="w-20 h-1.5 bg-rose-300 mx-auto mt-6 rounded-full"></div>
        </div>

        <div id="product-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
            <!-- Loading via JS... -->
        </div>
    </main>
    <!-- VIEW 2: KERANJANG -->
    <main id="view-keranjang" class="hidden-view pt-32 px-6 max-w-5xl mx-auto">
        <div class="flex items-center gap-4 mb-8">
            <button onclick="showView('katalog')" class="w-10 h-10 rounded-full bg-white flex items-center justify-center text-rose-500 shadow-sm border border-rose-100">
                <i class="fas fa-arrow-left"></i>
            </button>
            <h2 class="text-2xl font-black text-gray-800 italic font-elegant">Keranjang Belanja</h2>
        </div>
        
        <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-rose-100">
            <div id="cart-items-list" class="divide-y divide-gray-50"></div>
        </div>

        <div class="mt-10 bg-white p-8 rounded-3xl shadow-xl border border-rose-100 flex flex-col md:flex-row justify-between items-center gap-6">
            <div class="text-left">
                <p class="text-xs text-gray-400 font-bold uppercase tracking-wider">Total Pesanan:</p>
                <p id="total-price-display" class="text-3xl font-black text-rose-500">Rp 0</p>
            </div>
            <button onclick="showView('checkout')" class="w-full md:w-auto bg-rose-500 text-white px-12 py-5 rounded-2xl font-black text-sm tracking-widest hover:bg-rose-600 shadow-lg shadow-rose-200 transition-all active:scale-95">LANJUT CHECKOUT</button>
        </div>
    </main>

    <!-- VIEW 3: CHECKOUT -->
    <main id="view-checkout" class="hidden-view pt-32 px-6 max-w-4xl mx-auto">
        <div class="mb-10 flex items-center gap-4">
            <button onclick="showView('keranjang')" class="w-10 h-10 rounded-full bg-white flex items-center justify-center text-rose-500 shadow-sm border border-rose-100">
                <i class="fas fa-arrow-left"></i>
            </button>
            <h2 class="text-2xl font-black text-gray-800 italic font-elegant">Informasi Pengambilan</h2>
        </div>

        <div class="space-y-6">
            <div class="bg-white p-10 rounded-[2.5rem] shadow-xl border border-rose-100">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div class="md:col-span-2">
                        <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2">Nama Pemesan</label>
                        <input type="text" id="customer-name" placeholder="Masukkan nama Anda" class="w-full bg-gray-50 border border-gray-100 rounded-2xl px-6 py-4 outline-none focus:border-rose-300 font-bold text-gray-700">
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2">Tanggal Pengambilan</label>
                        <input type="date" id="pickup-date" class="w-full bg-gray-50 border border-gray-100 rounded-2xl px-6 py-4 outline-none focus:border-rose-300 font-bold text-gray-700">
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2">Jam Pengambilan</label>
                        <input type="time" id="pickup-time" class="w-full bg-gray-50 border border-gray-100 rounded-2xl px-6 py-4 outline-none focus:border-rose-300 font-bold text-gray-700">
                    </div>
                </div>
            </div>

            <div class="bg-white p-10 rounded-[2.5rem] shadow-xl border border-rose-100">
                <div class="space-y-4 text-sm font-bold text-gray-500">
                    <div class="flex justify-between"><span>Subtotal Produk</span><span id="subtotal-produk" class="text-gray-800">Rp 0</span></div>
                    <div class="flex justify-between"><span>Biaya Layanan Toko</span><span class="text-gray-800">Rp 2.000</span></div>
                    <div class="pt-6 border-t border-dashed border-gray-100 flex justify-between items-center">
                        <span class="text-gray-800 text-lg">Total Akhir</span>
                        <span id="final-total" class="text-3xl font-black text-rose-500">Rp 0</span>
                    </div>
                </div>
            </div>
            <button onclick="processOrder()" class="w-full bg-rose-500 text-white py-6 rounded-[2rem] font-black text-sm tracking-[0.3em] shadow-xl shadow-rose-200 hover:bg-rose-600 transition-all uppercase">BUAT PESANAN SEKARANG</button>
        </div>
    </main>

    <!-- VIEW 4: STRUK -->
    <main id="view-struk" class="hidden-view pt-32 px-6 pb-10 max-w-lg mx-auto">
        <div class="receipt-paper p-10 border-x border-t border-rose-50">
            <div class="text-center mb-10">
                <div class="w-16 h-16 bg-rose-500 rounded-2xl flex items-center justify-center text-white mx-auto mb-4 shadow-lg">
                    <i class="fas fa-check text-2xl"></i>
                </div>
                <h2 class="text-2xl font-black text-gray-800 italic font-elegant tracking-tighter">STRUK PESANAN</h2>
                <p class="text-[10px] text-gray-400 font-black tracking-widest mt-1 uppercase">DH Bakery - Jember</p>
            </div>
            <div id="struk-content" class="space-y-4 text-xs font-mono border-t border-b border-dashed border-gray-200 py-6">
                <!-- Diisi via JS -->
            </div>
            <div class="mt-8 text-center">
                <p class="text-[10px] text-gray-400 font-bold uppercase mb-4">Pesanan telah dicatat!</p>
                <button onclick="sendToWhatsApp()" class="w-full bg-emerald-500 text-white py-5 rounded-2xl font-black text-xs tracking-widest flex items-center justify-center gap-3 shadow-lg shadow-emerald-100 hover:bg-emerald-600 transition-all active:scale-95">
                    <i class="fab fa-whatsapp text-xl"></i> KONFIRMASI VIA WHATSAPP
                </button>
                <button onclick="showView('katalog')" class="mt-6 text-rose-400 font-bold text-xs uppercase hover:underline block mx-auto">BELANJA LAGI</button>
            </div>
        </div>
    </main>

    <!-- TOMBOL TAMBAH PRODUK (Tautan/Link) -->
    <!-- Ganti href dengan link tujuan Anda (contoh: dashboard admin atau form) -->
    <a href="/login" target="_blank" class="fab-button bg-rose-600 text-white px-6 py-4 rounded-2xl flex items-center gap-3 font-black text-xs tracking-widest hover:bg-rose-700 transition-all active:scale-90 shadow-2xl">
        <i class="fas fa-plus"></i>
        <span>TAMBAH PRODUCT</span>
    </a>

    <!-- Toast Notification -->
    <div id="toast" class="fixed bottom-10 right-10 transform translate-y-20 opacity-0 transition-all duration-500 bg-rose-600 text-white px-8 py-4 rounded-2xl shadow-2xl z-[100] flex items-center gap-4 font-bold text-sm">
        <i class="fas fa-check-circle text-white text-xl"></i>
        <span>Ditambahkan ke keranjang!</span>
    </div>

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
        const products = [
            { id: 1, name: "Triple Choco Lava", price: 55000, img: "https://images.unsplash.com/photo-1578985545062-69928b1d9587?w=400" },
            { id: 2, name: "Berry Delight Cake", price: 48000, img: "https://images.unsplash.com/photo-1563729784474-d77dbb933a9e?w=400" },
            { id: 3, name: "Cromboloni Pistachio", price: 35000, img: "https://images.unsplash.com/photo-1627834377411-8da5f4f09de8?w=400" },
            { id: 4, name: "Red Velvet Supreme", price: 52000, img: "https://images.unsplash.com/photo-1616541823729-00fe0aacd32c?w=400" },
            { id: 5, name: "Lotus Cheesecake", price: 58000, img: "https://images.unsplash.com/photo-1533134242443-d4fd215305ad?w=400" },
            { id: 6, name: "Matcha Croissant", price: 28000, img: "https://images.unsplash.com/photo-1555507036-ab1f4038808a?w=400" },
            { id: 7, name: "Almond Danis", price: 25000, img: "https://images.unsplash.com/photo-1509440159596-0249088772ff?w=400" },
            { id: 8, name: "Classic Baguette", price: 18000, img: "https://images.unsplash.com/photo-1597079910443-60c43fc4f729?w=400" },
            { id: 9, name: "Double Cheese Bread", price: 22000, img: "https://images.unsplash.com/photo-1509440159596-0249088772ff?w=400" },
            { id: 10, name: "Blueberry Muffin", price: 15000, img: "https://images.unsplash.com/photo-1558401391-7899b4bd5bbf?w=400" },
            { id: 11, name: "Tiramisu Box", price: 45000, img: "https://images.unsplash.com/photo-1571877227200-a0d98ea607e9?w=400" },
            { id: 12, name: "Banana Split Cake", price: 40000, img: "https://images.unsplash.com/photo-1516054144839-6511ca386407?w=400" },
            { id: 13, name: "Pain au Chocolat", price: 27000, img: "https://images.unsplash.com/photo-1530610476181-d83430b64dcd?w=400" },
            { id: 14, name: "Garlic Cheese Bread", price: 24000, img: "https://images.unsplash.com/photo-1573140247632-f8fd74997d5c?w=400" },
            { id: 15, name: "Choco Chip Cookies", price: 12000, img: "https://images.unsplash.com/photo-1499636136210-6f4ee915583e?w=400" },
            { id: 16, name: "Rainbow Macarons", price: 10000, img: "https://images.unsplash.com/photo-1569864358642-9d161976282a?w=400" },
            { id: 17, name: "Strawberry Tart", price: 32000, img: "https://images.unsplash.com/photo-1519915028121-7d3463d20b13?w=400" },
            { id: 18, name: "Salted Caramel Brownie", price: 20000, img: "https://images.unsplash.com/photo-1606313564200-e75d5e30476c?w=400" },
            { id: 19, name: "Pandan Roll Cake", price: 38000, img: "https://images.unsplash.com/photo-1550617931-e17a7b70dce2?w=400" },
            { id: 20, name: "Eclair Vanilla", price: 15000, img: "https://images.unsplash.com/photo-1511081692775-05d0f180a065?w=400" }
        ];

        let cart = [];
        let totalQty = 0;
        let activeOrder = null;

        function renderKatalog() {
            const grid = document.getElementById('product-grid');
            grid.innerHTML = products.map(p => `
                <div class="product-card bg-white rounded-[2rem] overflow-hidden shadow-xl shadow-rose-100/50 border border-rose-50 group">
                    <div class="relative h-56 overflow-hidden">
                        <img src="${p.img}" class="w-full h-full object-cover transition-transform duration-500">
                    </div>
                    <div class="p-6">
                        <h3 class="text-md font-extrabold text-gray-800 line-clamp-1">${p.name}</h3>
                        <p class="text-rose-500 font-black text-sm mt-1">Rp ${p.price.toLocaleString()}</p>
                        <div class="mt-4 flex items-center gap-3">
                            <div class="flex items-center bg-gray-50 rounded-lg px-2 py-1 border">
                                <button onclick="decrementLocal(this)" class="w-6 h-6 flex items-center justify-center text-gray-400 text-xs"><i class="fas fa-minus"></i></button>
                                <input type="number" value="1" class="w-6 text-center font-bold bg-transparent text-xs outline-none" readonly>
                                <button onclick="incrementLocal(this)" class="w-6 h-6 flex items-center justify-center text-gray-400 text-xs"><i class="fas fa-plus"></i></button>
                            </div>
                            <button onclick="addToCart('${p.name}', ${p.price}, this)" class="flex-grow bg-rose-400 text-white py-2 rounded-lg font-bold text-[10px] uppercase tracking-widest hover:bg-rose-500 transition-all">Beli</button>
                        </div>
                    </div>
                </div>
            `).join('');
        }

        function incrementLocal(btn) { btn.parentNode.querySelector('input').value++; }
        function decrementLocal(btn) { 
            let input = btn.parentNode.querySelector('input');
            if(input.value > 1) input.value--;
        }

        function addToCart(name, price, btn) {
            const qty = parseInt(btn.parentNode.querySelector('input').value);
            const existing = cart.find(i => i.name === name);
            existing ? existing.qty += qty : cart.push({ name, price, qty });
            totalQty += qty;
            document.getElementById('cart-count').innerText = totalQty;
            
            const toast = document.getElementById('toast');
            toast.classList.remove('translate-y-20', 'opacity-0');
            setTimeout(() => toast.classList.add('translate-y-20', 'opacity-0'), 2000);
            btn.parentNode.querySelector('input').value = 1;
        }

        function showView(v) {
            ['katalog', 'keranjang', 'checkout', 'struk'].forEach(id => {
                const element = document.getElementById('view-'+id);
                if(element) element.classList.add('hidden-view');
            });
            const activeElement = document.getElementById('view-'+v);
            if(activeElement) activeElement.classList.remove('hidden-view');
            
            if(v === 'keranjang') renderCart();
            if(v === 'checkout') renderCheckout();
            window.scrollTo(0,0);
        }

        function renderCart() {
            const list = document.getElementById('cart-items-list');
            let total = 0;
            if(cart.length === 0) {
                list.innerHTML = `<div class="p-20 text-center text-gray-400 font-bold italic">Keranjang kosong...</div>`;
                document.getElementById('total-price-display').innerText = "Rp 0";
                return;
            }
            list.innerHTML = cart.map((item, index) => {
                total += (item.price * item.qty);
                return `
                    <div class="flex flex-col md:flex-row p-6 items-center justify-between gap-4">
                        <div class="flex items-center gap-4 flex-1">
                            <div class="w-12 h-12 bg-rose-50 rounded-lg flex items-center justify-center text-rose-300 font-bold text-xs">DH</div>
                            <h4 class="font-bold text-gray-800 text-sm">${item.name}</h4>
                        </div>
                        <div class="flex items-center gap-8">
                            <span class="font-bold text-rose-500 text-sm">Rp ${(item.price * item.qty).toLocaleString()}</span>
                            <div class="flex items-center bg-gray-50 rounded-lg px-2 border">
                                <button onclick="updateQty(${index}, -1)" class="p-2 text-gray-400 text-xs"><i class="fas fa-minus"></i></button>
                                <span class="w-8 text-center font-bold text-gray-800 text-xs">${item.qty}</span>
                                <button onclick="updateQty(${index}, 1)" class="p-2 text-gray-400 text-xs"><i class="fas fa-plus"></i></button>
                            </div>
                            <button onclick="removeProduct(${index})" class="text-rose-300 hover:text-rose-500"><i class="fas fa-trash-alt"></i></button>
                        </div>
                    </div>
                `;
            }).join('');
            document.getElementById('total-price-display').innerText = "Rp " + total.toLocaleString();
        }

        function updateQty(i, d) {
            cart[i].qty += d;
            if(cart[i].qty < 1) cart.splice(i, 1);
            totalQty = cart.reduce((a, b) => a + b.qty, 0);
            document.getElementById('cart-count').innerText = totalQty;
            renderCart();
        }

        function removeProduct(i) {
            totalQty -= cart[i].qty;
            cart.splice(i, 1);
            document.getElementById('cart-count').innerText = totalQty;
            renderCart();
        }

        function renderCheckout() {
            const sub = cart.reduce((a, b) => a + (b.price * b.qty), 0);
            document.getElementById('subtotal-produk').innerText = "Rp " + sub.toLocaleString();
            document.getElementById('final-total').innerText = "Rp " + (sub + 2000).toLocaleString();
        }

        function processOrder() {
            const name = document.getElementById('customer-name').value.trim();
            const d = document.getElementById('pickup-date').value;
            const t = document.getElementById('pickup-time').value;
            
            if(!name) return alert("Harap isi nama pemesan!");
            if(!d || !t) return alert("Harap isi jadwal pengambilan!");
            if(cart.length === 0) return alert("Keranjang kosong!");

            const sub = cart.reduce((a, b) => a + (b.price * b.qty), 0);
            
            activeOrder = {
                id: Math.floor(100000 + Math.random() * 900000),
                customer: name,
                items: [...cart],
                date: d,
                time: t,
                subtotal: sub,
                service: 2000,
                total: sub + 2000
            };

            document.getElementById('struk-content').innerHTML = `
                <div class="flex justify-between"><span>PEMESAN:</span><span class="font-bold">${activeOrder.customer.toUpperCase()}</span></div>
                <div class="flex justify-between"><span>NO. ORDER:</span><span class="font-bold">#${activeOrder.id}</span></div>
                <div class="flex justify-between"><span>TANGGAL:</span><span>${activeOrder.date}</span></div>
                <div class="flex justify-between"><span>JAM AMBIL:</span><span>${activeOrder.time}</span></div>
                <div class="py-4 border-t border-b border-dashed border-gray-200">
                    <p class="text-[10px] text-gray-400 mb-2 font-bold uppercase">Rincian:</p>
                    ${activeOrder.items.map(i => `
                        <div class="flex justify-between mb-1">
                            <span>${i.name} x${i.qty}</span>
                            <span>Rp ${(i.price*i.qty).toLocaleString()}</span>
                        </div>
                    `).join('')}
                </div>
                <div class="space-y-1">
                    <div class="flex justify-between"><span>Subtotal:</span><span>Rp ${activeOrder.subtotal.toLocaleString()}</span></div>
                    <div class="flex justify-between"><span>Layanan:</span><span>Rp ${activeOrder.service.toLocaleString()}</span></div>
                    <div class="flex justify-between font-black text-sm pt-2 text-rose-500">
                        <span>TOTAL AKHIR:</span>
                        <span>Rp ${activeOrder.total.toLocaleString()}</span>
                    </div>
                </div>
            `;

            cart = [];
            totalQty = 0;
            document.getElementById('cart-count').innerText = "0";
            document.getElementById('customer-name').value = "";
            
            showView('struk');
        }

        function sendToWhatsApp() {
            if(!activeOrder) return alert("Data pesanan tidak ditemukan.");
            const phone = "6282277214344";
            let msg = `*STRUK PESANAN DH BAKERY*\n------------------------------\n*Nama:* ${activeOrder.customer}\n*Order ID:* #${activeOrder.id}\n*Ambil:* ${activeOrder.date} | ${activeOrder.time}\n------------------------------\n*Rincian Belanja:*\n`;
            activeOrder.items.forEach(i => msg += `• ${i.name} (x${i.qty}) - Rp ${(i.price * i.qty).toLocaleString()}\n`);
            msg += `------------------------------\n*Subtotal:* Rp ${activeOrder.subtotal.toLocaleString()}\n*Biaya Layanan:* Rp ${activeOrder.service.toLocaleString()}\n*TOTAL BAYAR: Rp ${activeOrder.total.toLocaleString()}*\n\n_Mohon segera diproses, terima kasih!_`;
            window.open(`https://api.whatsapp.com/send?phone=${phone}&text=${encodeURIComponent(msg)}`, '_blank');
        }

        window.onload = () => {
            renderKatalog();
            const now = new Date();
            const dateStr = now.toISOString().split('T')[0];
            const dateInput = document.getElementById('pickup-date');
            if(dateInput) {
                dateInput.value = dateStr;
                dateInput.min = dateStr;
            }
            const timeInput = document.getElementById('pickup-time');
            if(timeInput) {
                now.setHours(now.getHours() + 1);
                timeInput.value = now.toTimeString().slice(0,5);
            }
        };
    </script>
</body>
</html>