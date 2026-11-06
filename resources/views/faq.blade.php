<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Diah Bakery - FAQ | Pusat Bantuan</title>
    <!-- Google Fonts + Font Awesome -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700&family=Playfair+Display:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #fff5f7;  /* pink lembut background dasar */
            font-family: 'Inter', sans-serif;
            color: #4a2e38;
        }

         /* --- MODERN NAVBAR (GLASSMORPHISM) --- */
         header {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        z-index: 1000;
        background: rgba(255, 255, 255, 0.4);
        backdrop-filter: blur(12px);
        border-bottom: 1px solid rgba(255, 255, 255, 0.3);
    }

    .nav-container {
        width: 90%;
        margin: 0 auto;
        display: flex;
        align-items: center; /* Menyejajarkan vertikal */
        padding: 10px 0;
    }

    .logo-wrapper {
        flex: 0 0 auto; /* Logo tidak melebar */
    }

    .logo-wrapper img {
        height: 60px; /* Atur sesuai kebutuhan */
        width: auto;
    }

    /* Ini yang membuat navigasi ke tengah */
    .nav-main {
        flex: 1; /* Mengambil ruang kosong */
        display: flex;
        justify-content: center; /* Mengetengahkan konten di dalamnya */
    }

    .nav-links {
        display: flex;
        gap: 40px;
        list-style: none;
    }

    .nav-links a {
        text-decoration: none;
        color: #fb7185; /* text-rose-400 */
        font-size: 14px;
        font-weight: 900;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        transition: color 0.3s;
    }

    .nav-links a:hover {
        color: #e11d48; /* text-rose-600 */
    }
        /* container utama */
        .container {
            max-width: 1024px;
            margin: 0 auto;
            padding: 2rem 1.5rem 3rem;
        }

        /* header FAQ dengan motif kue */
        .faq-header {
            text-align: center;
            margin-bottom: 2.5rem;
        }

        .faq-header h1 {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            color: #bc4668;
            margin-bottom: 0.5rem;
        }

        .faq-header p {
            color: #815e6b;
            background: #fff0f5;
            display: inline-block;
            padding: 0.4rem 1.5rem;
            border-radius: 60px;
            font-size: 0.9rem;
        }

        .decor-line {
            width: 80px;
            height: 3px;
            background: #f2a7bb;
            margin: 1rem auto 0;
            border-radius: 4px;
        }

        /* kategori FAQ grid dengan gaya bakery pink */
        .faq-category {
            background: #ffffffdd;
            background: #fffcfd;
            border-radius: 2rem;
            margin-bottom: 2rem;
            overflow: hidden;
            border: 1px solid #ffdae4;
            box-shadow: 0 6px 14px rgba(201, 96, 120, 0.08);
        }

        .category-title {
            background: #ffeef3;
            padding: 1rem 1.8rem;
            font-size: 1.3rem;
            font-weight: 700;
            color: #b94466;
            border-bottom: 1px solid #ffd5e2;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .category-title i {
            font-size: 1.4rem;
        }

        /* accordion item */
        .accordion-item {
            border-bottom: 1px solid #ffe0ea;
            background: white;
        }

        .accordion-question {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.2rem 1.8rem;
            font-weight: 600;
            color: #633e4b;
            cursor: pointer;
            transition: 0.2s;
            background: #fffafc;
        }

        .accordion-question:hover {
            background: #fff2f7;
        }

        .accordion-question span:first-child {
            display: flex;
            gap: 12px;
            align-items: center;
        }

        .accordion-question i {
            color: #dc7c9a;
            font-size: 1.1rem;
        }

        .accordion-icon {
            color: #de8aa6;
            transition: transform 0.2s;
        }

        .accordion-answer {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.35s ease-out;
            padding: 0 1.8rem;
            background: #fffef9;
            border-top: 0px solid #ffdae2;
        }

        .accordion-answer p {
            padding: 0 0 1.2rem 0;
            color: #5f4350;
            line-height: 1.55;
            font-size: 0.95rem;
        }

        .active-answer {
            max-height: 280px;   /* cukup untuk konten jawaban */
            padding: 0.2rem 1.8rem 0.8rem 1.8rem;
            border-top: 1px solid #ffecf2;
        }

        /* tombol hubungi kami */
        .contact-card {
            background: linear-gradient(125deg, #fff0f5, #ffe6ee);
            border-radius: 2rem;
            padding: 1.8rem;
            text-align: center;
            margin-top: 2.5rem;
            border: 1px solid #ffbfd0;
        }

        .contact-card h3 {
            font-size: 1.4rem;
            font-weight: 700;
            color: #b94163;
        }

        .btn-pink {
            background: #db7d9b;
            border: none;
            padding: 0.8rem 2rem;
            border-radius: 40px;
            color: white;
            font-weight: 600;
            margin-top: 1rem;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
            transition: 0.2s;
            box-shadow: 0 4px 10px rgba(209, 86, 116, 0.3);
        }

        .btn-pink:hover {
            background: #c45c7e;
            transform: scale(1.02);
        }

        /* footer */
        footer {
            background: #ffecf1;
            border-radius: 2rem 2rem 0 0;
            padding: 1.8rem 2rem 1rem;
            margin-top: 3rem;
            text-align: center;
            color: #8a5e6b;
            font-size: 0.85rem;
        }

        @media (max-width: 700px) {
            .navbar {
                flex-direction: column;
                align-items: stretch;
                text-align: center;
            }
            .nav-links {
                justify-content: center;
            }
            .container {
                padding: 1.2rem;
            }
            .accordion-question {
                padding: 1rem;
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>

<header>
    <div class="nav-container">
        <div class="logo-wrapper">
            <img src="storage/foto/logoa.png" alt="Diah Bakery Logo">
        </div>
        
        <nav class="nav-main">
            <ul class="nav-links">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('/products') }}">Menu</a></li>
                <li><a href="{{ url('/about') }}">About Us</a></li>
                <li><a href="{{ url('/social') }}#social">Social</a></li>
                <li><a href="{{ route('faq') }}">FAQ</a></li>
                <li><a href="{{ url('/') }}#contact">Contact</a></li>
            </ul>
        </nav>

        <div style="flex: 0 0 70px;"></div> 
    </div>
</header>


<div class="container">
    <div class="faq-header">
        <h1><i class="fas fa-comments"></i> Ada yang bisa kami bantu?</h1>
        <p>Pertanyaan yang sering diajukan seputar Diah Bakery 🍰</p>
        <div class="decor-line"></div>
    </div>

    <!-- Kategori: Pesanan & Pengiriman -->
    <div class="faq-category">
        <div class="category-title">
            <i class="fas fa-truck"></i> Pesanan & Pengiriman
        </div>
        <div class="accordion-item">
            <div class="accordion-question">
                <span><i class="fas fa-clock"></i> Berapa lama waktu pemesanan untuk kue ulang tahun?</span>
                <i class="fas fa-chevron-down accordion-icon"></i>
            </div>
            <div class="accordion-answer">
                <p>Untuk kue ulang tahun dan kustom, kami memerlukan minimal 1x24 jam sebelum pengiriman atau pengambilan. Namun untuk kue yang tersedia di outlet, Anda bisa langsung datang atau memesan online dengan sistem siap dalam 2-3 jam.</p>
            </div>
        </div>
        <div class="accordion-item">
            <div class="accordion-question">
                <span><i class="fas fa-map-marker-alt"></i> Apakah Diah Bakery melayani pengiriman ke seluruh Indonesia?</span>
                <i class="fas fa-chevron-down accordion-icon"></i>
            </div>
            <div class="accordion-answer">
                <p>Saat ini pengiriman tersedia untuk area Jabodetabek, Surabaya, Bandung, Medan, dan kota besar lainnya melalui layanan kurir mitra. Untuk luar pulau, silakan hubungi customer service kami untuk opsi pengiriman khusus.</p>
            </div>
        </div>
        <div class="accordion-item">
            <div class="accordion-question">
                <span><i class="fas fa-receipt"></i> Bagaimana cara melacak pesanan saya?</span>
                <i class="fas fa-chevron-down accordion-icon"></i>
            </div>
            <div class="accordion-answer">
                <p>Setelah checkout, Anda akan menerima email & WhatsApp berisi nomor resi. Anda bisa melacak melalui halaman Lacak Pesanan di website kami atau langsung ke link yang dikirim via kurir.</p>
            </div>
        </div>
    </div>

    <!-- Kategori: Produk & Bahan -->
    <div class="faq-category">
        <div class="category-title">
            <i class="fas fa-bread-slice"></i> Produk & Bahan
        </div>
        <div class="accordion-item">
            <div class="accordion-question">
                <span><i class="fas fa-seedling"></i> Apakah Diah Bakery menyediakan roti/ kue bebas gluten?</span>
                <i class="fas fa-chevron-down accordion-icon"></i>
            </div>
            <div class="accordion-answer">
                <p>Saat ini kami belum memiliki varian bebas gluten secara massal. Namun beberapa outlet menyediakan kue dengan label khusus rendah gluten. Kami sarankan menghubungi cabang terdekat untuk informasi lebih detail.</p>
            </div>
        </div>
        <div class="accordion-item">
            <div class="accordion-question">
                <span><i class="fas fa-egg"></i> Apakah semua produk menggunakan bahan alami?</span>
                <i class="fas fa-chevron-down accordion-icon"></i>
            </div>
            <div class="accordion-answer">
                <p>Kami mengutamakan kualitas. Roti dan kue Diah Bakery menggunakan bahan pilihan, tanpa pengawet buatan untuk varian tertentu. Selalu cek label kemasan atau tanyakan langsung ke outlet kami.</p>
            </div>
        </div>
        <div class="accordion-item">
            <div class="accordion-question">
                <span><i class="fas fa-cake"></i> Bisakah meminta desain kue khusus untuk acara pernikahan?</span>
                <i class="fas fa-chevron-down accordion-icon"></i>
            </div>
            <div class="accordion-answer">
                <p>Tentu! Diah Bakery menerima pesanan kue custom untuk pernikahan, ulang tahun, dan acara spesial lainnya. Hubungi tim custom cake kami di 1500-789 atau email ke custom@diahbakery.com (minimal H-7).</p>
            </div>
        </div>
    </div>

    <!-- Kategori: Outlet & Loyalty -->
    <div class="faq-category">
        <div class="category-title">
            <i class="fas fa-store"></i> Outlet & Program Member
        </div>
        <div class="accordion-item">
            <div class="accordion-question">
                <span><i class="fas fa-map-pin"></i> Berapa jumlah outlet Diah Bakery saat ini?</span>
                <i class="fas fa-chevron-down accordion-icon"></i>
            </div>
            <div class="accordion-answer">
                <p>Diah Bakery memiliki lebih dari 470 outlet dan 25 cabang besar yang tersebar di seluruh Indonesia, menjadi salah satu pelopor bakery modern sejak 1978.</p>
            </div>
        </div>
        <div class="accordion-item">
            <div class="accordion-question">
                <span><i class="fas fa-id-card"></i> Bagaimana cara mendaftar member Diah Bakery?</span>
                <i class="fas fa-chevron-down accordion-icon"></i>
            </div>
            <div class="accordion-answer">
                <p>Kamu bisa mendaftar gratis melalui aplikasi Diah Bakery atau langsung di outlet terdekat. Dengan member, kamu berhak mendapatkan poin setiap pembelian dan diskon spesial di hari ulang tahun.</p>
            </div>
        </div>
        <div class="accordion-item">
            <div class="accordion-question">
                <span><i class="fas fa-gift"></i> Apakah ada program hadiah untuk #DiahMoment?</span>
                <i class="fas fa-chevron-down accordion-icon"></i>
            </div>
            <div class="accordion-answer">
                <p>Ya! Setiap bulan kami memilih 3 momen terbaik dengan tagar #DiahMoment di Instagram. Pemenang mendapatkan voucher Rp100.000 dan goodie bag eksklusif. Jangan lupa tag @diahbakeryindonesia ya!</p>
            </div>
        </div>
    </div>

    <!-- Kategori: Lainnya -->
    <div class="faq-category">
        <div class="category-title">
            <i class="fas fa-phone-alt"></i> Layanan & Bantuan
        </div>
        <div class="accordion-item">
            <div class="accordion-question">
                <span><i class="fas fa-undo-alt"></i> Apakah produk bisa dikembalikan jika ada kerusakan?</span>
                <i class="fas fa-chevron-down accordion-icon"></i>
            </div>
            <div class="accordion-answer">
                <p>Jika produk yang diterima rusak atau tidak sesuai, kami memberikan garansi penggantian. Harap foto produk dan hubungi layanan pelanggan maksimal 2x24 jam setelah menerima pesanan.</p>
            </div>
        </div>
        <div class="accordion-item">
            <div class="accordion-question">
                <span><i class="fas fa-building"></i> Apakah Diah Bakery menerima kerjasama franchise?</span>
                <i class="fas fa-chevron-down accordion-icon"></i>
            </div>
            <div class="accordion-answer">
                <p>Kami membuka peluang kemitraan untuk wilayah tertentu. Silakan kunjungi halaman Kerjasama atau hubungi tim pengembangan bisnis di franchise@diahbakery.com.</p>
            </div>
        </div>
        <div class="accordion-item">
            <div class="accordion-question">
                <span><i class="fas fa-calendar-alt"></i> Apakah buka di hari libur nasional?</span>
                <i class="fas fa-chevron-down accordion-icon"></i>
            </div>
            <div class="accordion-answer">
                <p>Sebagian besar outlet tetap buka di hari libur nasional dengan jam operasional khusus (biasanya pukul 09.00 - 18.00). Untuk kepastian, cek daftar outlet favoritmu di aplikasi atau hubungi langsung.</p>
            </div>
        </div>
    </div>

    <!-- Block hubungi kami -->
    <div class="contact-card">
        <h3><i class="fas fa-headset"></i> Tidak menemukan jawaban?</h3>
        <p>Tim customer service kami siap membantu Senin-Minggu, pukul 08.00 - 21.00</p>
        <button class="btn-pink" id="contactBtn"><i class="fab fa-whatsapp"></i> Hubungi Kami</button>
    </div>
</div>

<footer>
    <div style="display: flex; justify-content: center; gap: 1.8rem; flex-wrap: wrap; margin-bottom: 1rem;">
        <a href="#" style="color:#b15372; text-decoration: none;">Kebijakan Privasi</a>
        <a href="#" style="color:#b15372; text-decoration: none;">Syarat & Ketentuan</a>
        <a href="#" style="color:#b15372; text-decoration: none;">Kontak</a>
    </div>
    <div><i class="fab fa-instagram"></i> @diahbakeryindonesia &nbsp;|&nbsp; <i class="fab fa-facebook"></i> DiahBakeryOfficial</div>
    <div style="margin-top: 0.8rem;">&copy; 2026 Diah Bakery – Setiap jawaban manis untukmu 🍞💕</div>
</footer>

<script>
    // Membuat accordion FAQ interaktif
    const questions = document.querySelectorAll('.accordion-question');
    questions.forEach(question => {
        question.addEventListener('click', () => {
            const answer = question.nextElementSibling;
            const icon = question.querySelector('.accordion-icon');
            
            // Tutup semua jawaban lain (opsional, biar lebih rapi)
            const allAnswers = document.querySelectorAll('.accordion-answer');
            const allIcons = document.querySelectorAll('.accordion-icon');
            
            if(answer.classList.contains('active-answer')) {
                answer.classList.remove('active-answer');
                if(icon) icon.classList.remove('fa-chevron-up');
                if(icon) icon.classList.add('fa-chevron-down');
            } else {
                // Tutup yang lain
                allAnswers.forEach(ans => ans.classList.remove('active-answer'));
                allIcons.forEach(ic => {
                    ic.classList.remove('fa-chevron-up');
                    ic.classList.add('fa-chevron-down');
                });
                // Buka current
                answer.classList.add('active-answer');
                if(icon) {
                    icon.classList.remove('fa-chevron-down');
                    icon.classList.add('fa-chevron-up');
                }
            }
        });
    });

    // Tombol hubungi kami (simulasi ke whatsapp/route kontak)
    const contactBtn = document.getElementById('contactBtn');
    if(contactBtn) {
        contactBtn.addEventListener('click', () => {
            // bisa diarahkan ke halaman kontak atau link whatsapp
            window.location.href = "https://wa.me/6282277214344?text=Halo%20Diah%20Bakery,%20saya%20mau%20tanya%20seputar%20FAQ";
        });
    }

    // Untuk halaman yang akan diintegrasikan dengan Laravel (atau framework lainnya)
    // Semua href pada navbar bisa diarahkan ke route sesuai kebutuhan. 
    // Contoh untuk blade: href="{{ route('faq') }}" sudah di handle.
    // Fitur active class pada navbar (penanda halaman FAQ)
    const currentLocation = window.location.pathname;
    const navItems = document.querySelectorAll('.nav-links a');
    navItems.forEach(link => {
        if(link.getAttribute('href') === '#' && window.location.href.includes('faq')) {
            link.classList.add('active');
        } else if(link.getAttribute('href') !== '#' && currentLocation.includes(link.getAttribute('href'))) {
            link.classList.add('active');
        }
    });
</script>
</body>
</html>