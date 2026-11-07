<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Diah Bakery</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* Global Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
        }

        body {
            background-color: #fff0f3; /* Pink Lembut */
            color: #444;
            line-height: 1.6;
            padding-top: 100px; /* Memberi ruang agar konten tidak tertutup navbar fixed */
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

        /* Breadcrumb */
        .breadcrumb {
            width: 80%;
            margin: 20px auto;
            font-size: 13px;
            color: #888;
        }

        /* Main Content */
        .container {
            width: 80%;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
            padding-bottom: 80px;
        }

        .content-section h2 {
            font-size: 32px;
            margin-bottom: 25px;
            color: #333;
            position: relative;
            padding-bottom: 10px;
        }

        .content-section h2::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 60px;
            height: 4px;
            background: #ffb3c1;
        }

        .content-section p {
            margin-bottom: 20px;
            text-align: justify;
            font-size: 16px;
            color: #555;
        }

        .image-box {
            width: 100%;
            border: 10px solid white;
            box-shadow: 0 15px 35px rgba(0,0,0,0.08);
            border-radius: 4px;
            overflow: hidden;
        }

        .image-box img {
            width: 100%;
            display: block;
            transition: transform 0.5s;
        }

        .image-box img:hover {
            transform: scale(1.08);
        }

        .vision-mission ul {
            list-style: none;
            margin-top: 20px;
        }

        .vision-mission ul li {
            margin-bottom: 12px;
            padding-left: 25px;
            position: relative;
        }

        .vision-mission ul li::before {
            content: "\f105"; /* Ikon arrow fontawesome */
            font-family: "Font Awesome 5 Free";
            font-weight: 900;
            color: #d63384;
            position: absolute;
            left: 0;
        }

        footer {
            background: #ff85a2;
            color: white;
            padding: 30px 10%;
            display: flex;
            justify-content: space-between;
            font-size: 13px;
        }

        /* Responsive Mobile */
        @media (max-width: 992px) {
            .nav-links { display: none; } /* Sembunyikan menu di mobile (perlu hamburger menu jika ingin muncul) */
            .container { grid-template-columns: 1fr; }
            .image-box { width: 100% !important; }
        }
    </style>
</head>
<body>

    <header>
    <div class="nav-container">
        <div class="logo-wrapper">
            <img src="/foto/logo.svg" alt="Diah Bakery Logo">
        </div>
        
        <nav class="nav-main">
            <ul class="nav-links">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('/products') }}">Menu</a></li>
                <li><a href="{{ url('/about') }}">About Us</a></li>
                <li><a href="{{ url('/') }}#Profile">Social</a></li>
                <li><a href="{{ route('faq') }}">FAQ</a></li>
                <li><a href="{{ url('/') }}#contact">Contact</a></li>
            </ul>
        </nav>

        <div style="flex: 0 0 70px;"></div> 
    </div>
</header>

    <div class="breadcrumb">Home / About Us</div>

    <div class="container">
        <div class="content-section">
            <h2>One Stop Bakery Store</h2>
            <p>
                <strong>Diah Bakery</strong> adalah salah satu jaringan toko roti terkemuka di Indonesia yang terus berkomitmen memberikan kualitas terbaik melalui bahan-bahan pilihan.
            </p>
            <p>
                Didirikan dengan cinta dan resep tradisional, kami menjadi pionir dalam industri roti modern yang tetap menjaga cita rasa lokal yang autentik. Produk kami sehat, bergizi, dan terjangkau untuk semua.
            </p>
            
            <div class="image-box" style="margin-top: 40px; width: 85%;">
                <img src="https://images.unsplash.com/photo-1509440159596-0249088772ff?auto=format&fit=crop&w=600&q=80" alt="Produk Roti">
            </div>
        </div>

        <div class="content-section">
            <div class="image-box" style="margin-bottom: 40px;">
                <img src="https://images.unsplash.com/photo-1517433670267-08bbd4be890f?auto=format&fit=crop&w=800&q=80" alt="Toko Kami">
            </div>

            <div class="vision-mission">
                <h2>Visi dan Misi</h2>
                <p>Visi kami adalah menjadikan produk Diah Bakery sebagai pilihan utama masyarakat Indonesia yang menginginkan kelezatan dan kualitas tinggi.</p>
                
                <ul>
                    <li>Mengembangkan produk berkualitas tinggi, bergizi, dan sehat.</li>
                    <li>Membuka gerai-gerai baru untuk kemudahan akses nasional.</li>
                    <li>Meningkatkan kualitas SDM demi pelayanan pelanggan yang prima.</li>
                </ul>
            </div>
        </div>
    </div>

    <footer>
        <div>&copy; 2026 Diah Bakery. All Rights Reserved.</div>
        <div>
            <span style="margin-left: 20px;">Privacy Policy</span>
            <span style="margin-left: 20px;">Terms of Use</span>
            <span style="margin-left: 20px;">Contact Us</span>
        </div>
    </footer>

</body>
</html>