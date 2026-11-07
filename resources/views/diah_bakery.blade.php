<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
  <title>DH Bakery – Manisnya Kue, Bahagia di Setiap Momen</title>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
  
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;1,700&family=Inter:wght@400;700;900&display=swap" rel="stylesheet">
  <style>
    /* Reset & Dasar */
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body {
      background-color: #ffffff;
      font-family: 'Inter', system-ui, -apple-system, sans-serif;
      overflow-x: hidden;
    }
    

    .font-elegant {
      font-family: 'Playfair Display', serif;
    }

    #Profile {
      background-image: linear-gradient(135deg, #fde4ec 0%, #f9cfe0 100%);
      background-repeat: no-repeat;
      background-size: cover;
      background-position: center;
      min-height: 100vh;
      width: 100%;
      position: relative;
      display: flex;
      flex-direction: column;
      
   }


    /* HERO: Full Background */
    .hero-container {
      background-image: linear-gradient(135deg, #fde4ec 0%, #f9cfe0 100%);
      background-repeat: no-repeat;
      background-size: cover;
      background-position: center;
      min-height: 100vh;
      width: 100%;
      position: relative;
      display: flex;
      flex-direction: column;
    }

    .hero-overlay {
      position: absolute;
      inset: 0;
      background: linear-gradient(to right, rgba(255,255,255,0.15) 0%, rgba(255,255,255,0) 100%);
      z-index: 1;
    }

    .content-wrapper {
      max-width: 1280px;
      margin: 0 auto;
      padding: 0 2rem;
      width: 100%;
      position: relative;
      z-index: 10;
    }

    /* Animasi Teks */
    @keyframes fadeUp {
      from { opacity: 0; transform: translateY(30px); }
      to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade { animation: fadeUp 0.8s ease-out forwards; }
    
    /* Animasi Kue Melayang di BG Pink */
    @keyframes floatCake {
      0% { transform: translateY(0) rotate(0deg); opacity: 0; }
      15% { opacity: 0.6; }
      85% { opacity: 0.6; }
      100% { transform: translateY(-100vh) rotate(360deg); opacity: 0; }
    }
    .floating-cake {
      position: absolute;
      font-size: 24px;
      z-index: 1;
      pointer-events: none;
    }

    /* Fitur Transparan */
    .feature-transparent {
      background: transparent;
      border: 1px solid rgba(255, 255, 255, 0.3);
      border-radius: 2.5rem;
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .feature-transparent:hover {
      background: rgba(255, 255, 255, 0.1);
      transform: translateY(-8px);
    }

    /* SECTION PINK (Slide 2) */
    .pink-section {
      background-image: url('/foto/bg8.png');
      padding: 140px 0;
      width: 100%;
      position: relative;
      overflow: hidden;
    }

    .menu-card {
      background: white;
      border-radius: 3rem;
      overflow: hidden;
      transition: all 0.4s ease;
      box-shadow: 0 15px 35px rgba(0,0,0,0.04);
    }

    /* Notifikasi Selamat Datang */
    @keyframes slideInRight {
      from { transform: translateX(120%); }
      to { transform: translateX(0); }
    }
    .welcome-notif {
      position: fixed;
      bottom: 30px;
      right: 30px;
      background: white;
      padding: 1.5rem 2rem;
      border-radius: 2rem;
      box-shadow: 0 20px 40px rgba(0,0,0,0.1);
      z-index: 100;
      display: flex;
      align-items: center;
      gap: 1rem;
      border-left: 6px solid #f43f5e;
      animation: slideInRight 0.8s cubic-bezier(0.68, -0.55, 0.27, 1.55) forwards;
    }

    @keyframes pulseEmoji {
      0%, 100% { transform: scale(1); }
      50% { transform: scale(1.3); }
    }
    .living-emoji {
      font-size: 2rem;
      animation: pulseEmoji 2s infinite ease-in-out;
    }

    /* --- KODE BARU: STYLE UNTUK PROFILE --- */
    .section-hidden {
      opacity: 0;
      transform: translateY(50px);
      transition: all 0.8s ease-out;
    }
    .image-float {
      animation: float 6s ease-in-out infinite;
    }
    @keyframes float {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-20px); }
    }
    .slide-in-right-profile {
      opacity: 0;
      transform: translateX(50px);
    }
    .animation-delay-300 { animation-delay: 300ms; }
    .animation-delay-500 { animation-delay: 500ms; }
  
    /* Glow berdenyut */
    @keyframes softGlow {
      0%, 100% { opacity: 0.4; transform: scale(1); }
      50% { opacity: 0.8; transform: scale(1.1); }
    }

    /* Float lebih smooth */
    @keyframes floatSmooth {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-15px); }
    }

    .image-float {
      animation: floatSmooth 5s ease-in-out infinite;
    }
    
    /* Tambahan untuk teks profile agar lebih terbaca */
    .profile-text-gelap {
      color: #4a0e2e; /* rose-900 */
      text-shadow: none;
    }
    .profile-text-gelap .border-rose-400 {
      border-color: #be185d;
    }
    .profile-quote {
      background: rgba(255,255,240,0.4);
      backdrop-filter: blur(2px);
    }

     :root {
            --soft-pink: #fce4ec;
            --main-pink: #f06292;
            --dark-pink: #c2185b;
            --text-color: #5d4037;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Quicksand', sans-serif;
            background-color: var(--soft-pink);
            color: var(--text-color);
            line-height: 1.6;
        }

        .contact-section {
            padding: 80px 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .section-header {
            text-align: center;
            margin-bottom: 50px;
        }

        .section-header h2 {
            font-family: 'Dancing Script', cursive;
            font-size: 3.5rem;
            color: var(--dark-pink);
            margin-bottom: 10px;
        }

        .section-header p {
            font-size: 1.1rem;
            color: var(--main-pink);
        }

        .contact-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            background: white;
            padding: 40px;
            border-radius: 30px;
            box-shadow: 0 10px 30px rgba(240, 98, 146, 0.2);
        }

        /* Detail Kontak */
        .contact-info h3 {
            font-size: 1.8rem;
            color: var(--dark-pink);
            margin-bottom: 25px;
        }

        .info-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 20px;
        }

        .info-item i {
            font-size: 1.5rem;
            color: var(--main-pink);
            margin-right: 15px;
            margin-top: 5px;
        }

        .info-text h4 {
            font-weight: 600;
            color: var(--dark-pink);
        }

        /* Form Kontak */
        .contact-form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .form-group input, .form-group textarea {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid var(--soft-pink);
            border-radius: 15px;
            font-family: inherit;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-group input:focus, .form-group textarea:focus {
            outline: none;
            border-color: var(--main-pink);
            background-color: #fff9fa;
        }

        .btn-send {
            background-color: var(--main-pink);
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 15px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .btn-send:hover {
            background-color: var(--dark-pink);
        }

        /* Google Maps */
        .map-section {
            margin-top: 40px;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            height: 350px;
        }

        .map-section iframe {
            width: 100%;
            height: 100%;
            border: none;
        }

        /* Responsive */
        @media (max-width: 992px) {
            .contact-container {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 600px) {
            .section-header h2 { font-size: 2.5rem; }
            .contact-container { padding: 20px; }
        }

      
    .cart-badge {
        position: absolute;
        top: -8px;
        right: -8px;
        background: #ff6b6b;
        color: white;
        border-radius: 50%;
        width: 18px;
        height: 18px;
        font-size: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
    }
    
    .dropdown-menu {
        border-radius: 12px;
        border: none;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    }
    
    .dropdown-item {
        padding: 10px 20px;
        transition: 0.3s;
    }
    
    .dropdown-item:hover {
        background: #f8b0c5;
        color: white;
    }
    
    .dropdown-item i {
        width: 20px;
        margin-right: 8px;
    }
    
    .nav-link {
        font-size: 18px;
        transition: 0.3s;
    }
    
    .nav-link:hover {
        transform: translateY(-2px);
        opacity: 0.8;
    }

    
</style>
  </style>
</head>
<body class="text-gray-800 antialiased">

  <div id="welcomeNotif" class="welcome-notif">
    <div class="living-emoji">😊</div>
    <div>
      <h5 class="font-black text-gray-800 text-sm">Selamat Datang!</h5>
      <p class="text-xs text-gray-500 font-medium">Di Toko Kue Diah Bakery</p>
    </div>
    <button onclick="document.getElementById('welcomeNotif').style.display='none'" class="ml-4 text-gray-300 hover:text-rose-500">
      <i class="fas fa-times"></i>
    </button>
  </div>

  <section class="hero-container" id="hero">
    <div class="hero-overlay"></div>
    
<header class="fixed top-4 left-1/2 transform -translate-x-1/2 w-[90%] lg:w-[80%] z-50 transition-all duration-300 bg-[#FFF5F0] shadow-lg rounded-full border border-rose-100">
  <div class="px-10 py-4 flex justify-center items-center gap-16">
    
    <!-- Menu Kiri: Home, Menu, About Us -->
    <nav class="hidden lg:flex gap-6 text-rose-800 text-base font-bold tracking-wide">
      <a href="#hero" class="hover:text-rose-400 transition-colors">Home</a>
      <a href="/products" class="hover:text-rose-400 transition-colors">Menu</a>
      <a href="/about" class="hover:text-rose-400 transition-colors">About Us</a>
    </nav>
    
    <!-- Logo di Tengah -->
    <div class="flex items-center">
      <div class="w-16 h-16 rounded-full flex items-center justify-center overflow-hidden bg-white shadow-md">
        <img src="/foto/logo.png" alt="Logo DH Bakery" class="w-full h-full object-contain">
      </div>
    </div>
    
    <!-- Menu Kanan: Social, FAQ, Contact -->
    <nav class="hidden lg:flex gap-6 text-rose-800 text-base font-bold tracking-wide">
      <a href="{{ route('social') }}" class="hover:text-rose-400 transition-colors">Social</a>
      <a href="{{ route('faq') }}" class="hover:text-rose-400 transition-colors">FAQ</a>
      <a href="#contact" class="hover:text-rose-400 transition-colors">Contact</a>
    </nav>
    
    <!-- Mobile Menu Button -->
    <button class="lg:hidden text-rose-700 text-2xl">
      <i class="fas fa-bars"></i>
    </button>
    
  </div>
</header>

    <div class="content-wrapper flex-grow flex flex-col justify-center pb-24">
      <div class="max-w-4xl mb-20">
        <div class="inline-flex items-center gap-3 bg-white/80 backdrop-blur-md text-rose-500 px-6 py-3 rounded-full text-xs font-black mb-16 animate-fade shadow-sm border border-rose-50">
          <i class="fas fa-certificate text-rose-500"></i> Nimati Rasanya, Nikmati Bahagianya! ..
        </div>
        
        <h2 class="text-6xl md:text-7xl font-elegant text-gray-800 animate-fade italic"style="animation-delay: 0.2s; line-height: 1.5;">
          Manisnya Kue, <br>
          <span class="text-rose-500 drop-shadow-sm font-bold not-italic">Bahagia di Setiap Momen</span>
        </h2>
        
        <p class="text-gray-500 text-lg mt-12 max-w-xl leading-relaxed animate-fade" style="animation-delay: 0.4s">
          Diah Bakery menyediakan berbagai kue berkualitas dengan bahan pilihan dan dibuat dengan penuh cinta untuk Anda.
        </p>
        
        <div class="flex flex-wrap items-center gap-8 mt-12 animate-fade" style="animation-delay: 0.6s">
          
           <a href="/products" class="text-sm font-bold text-rose-500 hover:text-rose-600 transition-colors">
            Lihat Product <i class="fas fa-chevron-right text-xs"></i>
          </a>
          
          

          <a href="#contact" class="text-sm font-bold text-rose-500 hover:text-rose-600 transition-colors">
            HUBUNGI KAMI <i class="fas fa-phone-alt text-xs"></i>
          </a>
        </div>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-10 mt-50 animate-fade">
        <div class="feature-transparent p-10 flex items-center gap-8">
          <div class="bg-rose-50/20 text-rose-500 w-20 h-20 rounded-3xl flex items-center justify-center text-3xl shadow-inner border border-white/20 backdrop-blur-sm">
            <i class="fas fa-seedling"></i>
          </div>
          <div>
            <h4 class="font-black text-gray-800 text-xl">100% Organik</h4>
            <p class="text-sm text-gray-400 mt-2 font-medium tracking-wide">Bahan pilihan terbaik</p>
          </div>
        </div>

        <div class="feature-transparent p-10 flex items-center gap-8">
          <div class="bg-rose-50/20 text-rose-500 w-20 h-20 rounded-3xl flex items-center justify-center text-3xl shadow-inner border border-white/20 backdrop-blur-sm">
            <i class="fas fa-clock"></i>
          </div>
          <div>
            <h4 class="font-black text-gray-800 text-xl">Selalu Segar</h4>
            <p class="text-sm text-gray-400 mt-2 font-medium tracking-wide">Dibuat setiap pagi</p>
          </div>
        </div>

        <div class="feature-transparent p-10 flex items-center gap-8">
          <div class="bg-rose-50/20 text-rose-500 w-20 h-20 rounded-3xl flex items-center justify-center text-3xl shadow-inner border border-white/20 backdrop-blur-sm">
            <i class="fas fa-truck-moving"></i>
          </div>
          <div>
            <h4 class="font-black text-gray-800 text-xl">Kurir Kilat</h4>
            <p class="text-sm text-gray-400 mt-2 font-medium tracking-wide">Sampai tepat waktu</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="pink-section bg-product" id="product">
    <div class="content-wrapper relative z-10">
      <div class="text-center mb-24">
        <span class="bg-white/80 text-rose-500 px-8 py-3 rounded-full text-xs font-black uppercase tracking-[0.4em] shadow-sm border border-rose-100">Favorit Pelanggan</span>
        <h3 class="text-6xl font-elegant font-bold text-gray-800 mt-8 italic">Menu <span class="text-rose-500 not-italic">Terlaris</span></h3>
        <div class="w-24 h-2 bg-rose-500 mx-auto mt-6 rounded-full opacity-30"></div>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-14">

        <div class="menu-card group relative">
          <div class="absolute top-8 left-8 bg-rose-500 text-white text-[10px] font-black px-4 py-2 rounded-full z-20 shadow-lg">__BEST SELLER__</div>
          <div class="h-80 overflow-hidden">
            <img src="/uploads/1780025584_crombolonicklt.jpg" alt="Cromboloni" class="w-full h-full object-cover transition-transform group-hover:scale-110 duration-1000">
          </div>
          <div class="p-12 text-center border-t border-rose-50">
            <h4 class="text-2xl font-black text-gray-800">Donut's</h4>
            <p class="text-gray-400 text-sm mt-4 leading-relaxed">Lelehan coklat murni yang memanjakan lidah.</p>
            <div class="text-3xl font-black text-rose-500 mt-8 tracking-tighter">Rp5.000</div>
           <a href="#" class="block mt-8">
                <button class="text-[10px] font-black tracking-widest text-rose-400 hover:text-rose-600 uppercase">
                    Detail Menu <i class="fas fa-arrow-right ml-1"></i>
                </button>
            </a>
          </div>
        </div>

        <div class="menu-card group relative">
          <div class="absolute top-8 left-8 bg-rose-500 text-white text-[10px] font-black px-4 py-2 rounded-full z-20 shadow-lg">__BEST SELLER__</div>
          <div class="h-80 overflow-hidden">
            <img src="/uploads/1780025831_crombolonimtch.jpg" alt="Cromboloni" class="w-full h-full object-cover transition-transform group-hover:scale-110 duration-1000">
          </div>
          <div class="p-12 text-center border-t border-rose-50">
            <h4 class="text-2xl font-black text-gray-800">Cromboloni Viral</h4>
            <p class="text-gray-400 text-sm mt-4 leading-relaxed">Kombinasi renyah dan krim melimpah di dalamnya.</p>
            <div class="text-3xl font-black text-rose-500 mt-8 tracking-tighter">Rp35.000</div>
            <button class="mt-8 text-[10px] font-black tracking-widest text-rose-400 hover:text-rose-600 uppercase">Detail Menu <i class="fas fa-arrow-right ml-1"></i></button>
          </div>
        </div>

        <div class="menu-card group relative">
          <div class="absolute top-8 left-8 bg-rose-500 text-white text-[10px] font-black px-4 py-2 rounded-full z-20 shadow-lg">__BEST SELLER__</div>
          <div class="h-80 overflow-hidden">
            <img src="/uploads/1778209867_cromboloni.png" alt="Cromboloni" class="w-full h-full object-cover transition-transform group-hover:scale-110 duration-1000">
          </div>
          <div class="p-12 text-center border-t border-rose-50">
            <h4 class="text-2xl font-black text-gray-800">Berry Cake</h4>
            <p class="text-gray-400 text-sm mt-4 leading-relaxed">Segarnya buah beri dengan krim vanilla lembut.</p>
            <div class="text-3xl font-black text-rose-500 mt-8 tracking-tighter">Rp25.000</div>
            <button class="mt-8 text-[10px] font-black tracking-widest text-rose-400 hover:text-rose-600 uppercase">Detail Menu <i class="fas fa-arrow-right ml-1"></i></button>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- SECTION PROFILE PINK + ANIMASI (sudah dipertegas tengah, warna font, animasi lengkap) -->
  <section id="Profile" class="section-hidden py-40 min-h-screen flex items-center justify-center" class="reveal">
    <div class="w-full max-w-7xl mx-auto px-6 md:px-12">
      
      <!-- Judul (tetap di tengah) -->
      

      <div class="flex flex-col md:flex-row items-center justify-center gap-16">
        
        <!-- FOTO + ANIMASI (float, pulse, hover scale) -->
        <div class="relative group flex-shrink-0">
          <!-- glow belakang -->
          <div class="absolute inset-0 bg-rose-400/40 blur-3xl rounded-full scale-110 animate-pulse"></div>
          <!-- gambar -->
          <img src="/uploads/1780115887_kueultah.jpg" alt="Foto Profil DH Bakery"
               class="w-72 h-72 object-cover rounded-full shadow-2xl border-4 border-rose-600 
                      image-float transition-all duration-700 
                      group-hover:scale-110 group-hover:rotate-3 group-hover:shadow-rose-500/50" />
          <!-- ring animasi ping -->
          <div class="absolute -inset-4 border-2 border-rose-500/60 rounded-full animate-ping"></div>
        </div>
        
        <!-- TEKS (warna gelap agar kontras, animasi slide-in) -->
        <div class="md:w-2/3 space-y-8">
          <div class="slide-in-right-profile animation-delay-300">
            <p class="text-lg md:text-xl text-rose-900 leading-relaxed font-medium">
              <span class="block mb-4 text-2xl font-black text-rose-800">✨ Cerita Manis Kami ✨</span>
              Berawal dari dapur sederhana, DH Bakery hadir dengan satu tujuan: menghadirkan kebahagiaan melalui setiap gigitan kue. Kami percaya bahwa setiap resep bukan hanya tentang rasa, tetapi juga tentang cerita dan kehangatan yang ingin kami bagikan.
            </p>
          </div>
          
          <div class="slide-in-right-profile animation-delay-500">
            <p class="text-lg md:text-xl text-rose-900 leading-relaxed font-medium">
              Dengan bahan pilihan terbaik dan proses yang penuh ketelitian, setiap produk kami dibuat dengan sepenuh hati.
              <span class="block italic mt-6 text-rose-800 text-xl text-center border-l-4 border-rose-600 pl-5 py-3 bg-white/40 rounded-r-2xl backdrop-blur-sm shadow-sm">
                💖 "Kue bukan sekadar makanan, tapi cara sederhana untuk menciptakan kebahagiaan." 💖
              </span>
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="contact-section" id="contact">
        <div class="section-header">
            <h2>Hubungi Kami</h2>
            <p>Ada pertanyaan atau ingin pesan custom? Kami siap membantu!</p>
        </div>

        <div class="contact-container">
            <!-- Informasi Kontak -->
            <div class="contact-info">
                <h3>Diah Bakery</h3>
                <div class="info-item">
                    <i class="fa-solid fa-location-dot"></i>
                    <div class="info-text">
                        <h4>Alamat</h4>
                        <p>Jl. Prof. Dr. Sri Sudewi Sh No.75, Rengas Condong, Kec. Muara Bulian, Kabupaten Batang Hari, Jambi 36612, Indonesia</p>
                    </div>
                </div>
               <div class="info-item">
    <i class="fa-solid fa-phone"></i>
    <div class="info-text">
        <h4>Telepon / WA</h4>
        <p>
            <a href="tel:+6282277214344" style="text-decoration: none; color: inherit; font-weight: bold;">
                +62 822-7721-4344
            </a>
            <br>
            <a href="https://wa.me/6282277214344" target="_blank" style="color: #25D366; text-decoration: none; font-size: 0.9em;">
                <i class="fa-brands fa-whatsapp"></i> Chat WhatsApp
            </a>
        </p>

        <p>
            <a href="tel:+6282373333216" style="text-decoration: none; color: inherit; font-weight: bold;">
                +62 823-7333-3216
            </a>
            <br>
            <a href="https://wa.me/6282373333216" target="_blank" style="color: #25D366; text-decoration: none; font-size: 0.9em;">
                <i class="fa-brands fa-whatsapp"></i> Chat WhatsApp
            </a>
        </p>
    </div>
</div>
                <div class="info-item">
                    <i class="fa-solid fa-envelope"></i>
                    <div class="info-text">
                        <h4>Email</h4>
                        <p>halo@diahbakery.com</p>
                    </div>
                </div>
                <div class="info-item">
                    <i class="fa-solid fa-clock"></i>
                    <div class="info-text">
                        <h4>Jam Operasional</h4>
                        <p>Senin - minggu: 06.00 - 20.00</p>
                    </div>
                </div>
            </div>

            
        <!-- Google Maps Section -->
        <div class="map-section">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d1994.0276858752381!2d103.26552283938452!3d-1.703322515535665!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1smaps%20diah%20bakery%20muara%20bulian!5e0!3m2!1sen!2ssg!4v1777425431124!5m2!1sen!2ssg" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                allowfullscreen="" 
                loading="lazy">
            </iframe>
        </div>
    </section>

  <footer class="bg-[#FDF5E6] py-16 border-t border-rose-50 text-[#5D4037]">
  <div class="content-wrapper max-w-7xl mx-auto px-6">
    
    <!-- BAGIAN ATAS: Konten Utama Footer (Sesuai image_047ef0.png) -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-6 gap-8 items-start pb-12 border-b border-[#5D4037]/10">
      
      <!-- Kolom 1: Navigasi Kiri -->
      <div class="flex flex-col gap-3 font-medium text-sm">
        <a href="#" class="hover:opacity-70 transition-opacity">Store Location</a>
        <a href="#" class="hover:opacity-70 transition-opacity">Disclaimer</a>
        <a href="#" class="hover:opacity-70 transition-opacity">Privacy Policy</a>
      </div>

      <!-- Kolom 2: Navigasi Tengah -->
      <div class="flex flex-col gap-3 font-medium text-sm">
        <a href="#" class="hover:opacity-70 transition-opacity">Terms of Use</a>
        <a href="#" class="hover:opacity-70 transition-opacity">Contact Us</a>
        <a href="#" class="hover:opacity-70 transition-opacity">Setting Cookies</a>
      </div>

      <!-- Kolom 3: Navigasi Kanan -->
      <div class="flex flex-col gap-3 font-medium text-sm">
        <a href="#" class="hover:opacity-70 transition-opacity">About Us</a>
        <a href="#" class="hover:opacity-70 transition-opacity">FAQ</a>
      </div>

      <!-- Kolom 4: Sosial Media -->
      <div class="flex justify-start lg:justify-center items-center gap-6 text-3xl">
        <a href="#" class="hover:opacity-70 transition-opacity">
          <i class="fab fa-instagram"></i>
        </a>
        <a href="#" class="hover:opacity-70 transition-opacity">
          <i class="fab fa-facebook"></i>
        </a>
      </div>

      <!-- Kolom 5: Download Apps -->
      <div class="flex flex-col gap-3 items-start lg:items-center">
        <a href="#" class="hover:opacity-80 transition-opacity">
          <img src="https://upload.wikimedia.org/wikipedia/commons/7/78/Google_Play_Store_badge_EN.svg" alt="Get it on Google Play" class="h-8">
        </a>
        <a href="#" class="hover:opacity-80 transition-opacity">
          <img src="https://upload.wikimedia.org/wikipedia/commons/3/3c/Download_on_the_App_Store_Badge.svg" alt="Download on the App Store" class="h-8">
        </a>
      </div>

      <!-- Kolom 6: Logo & Info Brand Utama -->
      <div class="flex items-center justify-start lg:justify-end gap-4 lg:col-span-1 md:col-span-2">
        <!-- Icon Topi Koki / Logo (Bisa diganti image logo aslimu) -->
        <div class="text-5xl text-[#5D4037]">
          <i class="fas fa-chef-hat"></i> <!-- Atau gunakan tag <img> -->
        </div>
        <div class="flex flex-col select-none">
          <span class="text-2xl font-bold tracking-tight leading-none">Diah bakery</span>
          <span class="text-base mt-1 font-medium text-[#5D4037]/80">021-6918181</span>
        </div>
      </div>

    </div>

    <!-- BAGIAN BAWAH: Copyright Bar (Modifikasi dari kode bawaanmu) -->
    <div class="pt-8 flex flex-col sm:flex-row justify-between items-center gap-4">
      <p class="text-[#5D4037]/60 text-[11px] font-bold tracking-[0.4em] uppercase text-center sm:text-left">
        © 2026 DIAH BAKERY • MADE WITH LOVE IN INDONESIA
      </p>
      
      <!-- Sosmed Tambahan dari kodemu (Opsional: dipertahankan dengan warna tema baru) -->
      <div class="flex gap-6 text-[#5D4037]/60 text-lg">
        <i class="fab fa-whatsapp hover:text-[#5D4037] cursor-pointer transition-colors"></i>
        <i class="fab fa-tiktok hover:text-[#5D4037] cursor-pointer transition-colors"></i>
      </div>
    </div>

  </div>
</footer>

  <script>
    const container = document.getElementById('animation-container');
    const cakeEmojis = ['🍰', '🧁', '🍩', '🥐', '🍪', '🎂'];

    function createFloatingCake() {
      if (!container) return;
      const cake = document.createElement('div');
      cake.classList.add('floating-cake');
      cake.innerText = cakeEmojis[Math.floor(Math.random() * cakeEmojis.length)];
      cake.style.left = Math.random() * 100 + 'vw';
      cake.style.bottom = '-50px';
      const duration = Math.random() * 6 + 6 + 's';
      cake.style.animation = `floatCake ${duration} linear forwards`;
      container.appendChild(cake);
      setTimeout(() => { cake.remove(); }, parseFloat(duration) * 1000);
    }

    setInterval(createFloatingCake, 600);

    setTimeout(() => {
      const notif = document.getElementById('welcomeNotif');
      if(notif) notif.style.transform = 'translateX(120%)';
    }, 8000);

    /* Animasi GSAP untuk Profile */
    gsap.registerPlugin(ScrollTrigger);

    // Munculkan section profile
    gsap.to("#Profile", {
      opacity: 1,
      y: 0,
      duration: 1.2,
      ease: "power3.out",
      scrollTrigger: {
        trigger: "#Profile",
        start: "top 75%",
        toggleActions: "play none none reverse"
      }
    });

    // Animasi slide-in untuk teks (class .slide-in-right-profile)
    gsap.to(".slide-in-right-profile", {
      opacity: 1,
      x: 0,
      duration: 1,
      stagger: 0.3,
      ease: "back.out(1.7)",
      scrollTrigger: {
        trigger: "#Profile",
        start: "top 60%",
      }
    });
    
    // Pastikan initial state untuk .slide-in-right-profile
    document.querySelectorAll('.slide-in-right-profile').forEach(el => {
      el.style.opacity = '0';
      el.style.transform = 'translateX(50px)';
    });
  </script>
</body>
</html>