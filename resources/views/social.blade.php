<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social Media - Diah Bakery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Playfair+Display:ital,wght@0,700;1,700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: linear-gradient(135deg, #fff5f7 0%, #ffe4ec 50%, #fff0f3 100%);
            min-height: 100vh;
        }
        /* Navbar Custom */
                /* Navbar */
        .navbar-header {
            position: fixed;
            top: 1rem;
            left: 50%;
            transform: translateX(-50%);
            width: 90%;
            z-index: 50;
            transition: all 0.3s;
            background: #FFF5F0;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05);
            border-radius: 9999px;
            border: 1px solid #fce7f0;
        }

        @media (min-width: 1024px) {
            .navbar-header {
                width: 80%;
            }
        }

        .navbar-container {
            padding: 1rem 2.5rem;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 4rem;
        }

        /* Menu Kiri & Kanan */
        .nav-menu {
            display: flex;
            gap: 1.5rem;
        }

        .nav-menu a {
            color: #9f1239;
            font-size: 1rem;
            font-weight: 700;
            letter-spacing: 0.025em;
            text-decoration: none;
            transition: color 0.3s;
        }

        .nav-menu a:hover {
            color: #fb7185;
        }

        /* Logo */
        .nav-logo {
            display: flex;
            align-items: center;
        }

        .nav-logo img {
            width: 4rem;
            height: 4rem;
            border-radius: 9999px;
            object-fit: cover;
            background: white;
            padding: 0.25rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        /* Mobile Menu Button */
        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            color: #be185d;
            font-size: 1.5rem;
            cursor: pointer;
        }

        @media (max-width: 1024px) {
            .nav-menu {
                display: none;
            }
            .mobile-menu-btn {
                display: block;
            }
            .navbar-container {
                justify-content: space-between;
            }
        }
        /* Hero Section */
        .social-hero {
            text-align: center;
            padding: 80px 20px 60px;
            background: linear-gradient(145deg, #fff0f3, #ffe4ec);
            border-radius: 0 0 50px 50px;
            margin-bottom: 50px;
        }

        .social-hero h1 {
            font-family: 'Playfair Display', serif;
            font-size: 3rem;
            font-weight: 700;
            color: #2d1e24;
            margin-bottom: 15px;
        }

        .social-hero h1 span {
            color: #f28bae;
        }

        .social-hero p {
            color: #7a5c68;
            font-size: 1.1rem;
            max-width: 600px;
            margin: 0 auto;
        }

        .divider {
            width: 80px;
            height: 3px;
            background: linear-gradient(90deg, #f28bae, #f5a5c1);
            margin: 20px auto 0;
            border-radius: 10px;
        }

        /* Social Links Grid */
        .social-grid {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
        }

        .social-card {
            background: white;
            border-radius: 30px;
            padding: 40px 25px;
            text-align: center;
            transition: all 0.3s ease;
            cursor: pointer;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            border: 1px solid rgba(242, 139, 174, 0.2);
        }

        .social-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(242, 139, 174, 0.25);
        }

        .social-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            font-size: 40px;
            transition: all 0.3s ease;
        }

        .social-card:hover .social-icon {
            transform: scale(1.1);
        }

        .social-card h3 {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .social-card p {
            color: #8e6e7a;
            font-size: 0.9rem;
            margin-bottom: 20px;
        }

        .social-btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 10px 25px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        .social-btn:hover {
            gap: 15px;
            transform: translateY(-2px);
        }

        /* Instagram */
        .instagram .social-icon {
            background: linear-gradient(135deg, #833ab4, #fd1d1d, #fcb045);
            color: white;
        }
        .instagram .social-btn {
            background: #d62976;
            color: white;
        }
        .instagram .social-btn:hover {
            background: #c21e66;
        }

        /* WhatsApp */
        .whatsapp .social-icon {
            background: #25D366;
            color: white;
        }
        .whatsapp .social-btn {
            background: #25D366;
            color: white;
        }
        .whatsapp .social-btn:hover {
            background: #1da851;
        }

        /* TikTok */
        .tiktok .social-icon {
            background: #000000;
            color: white;
        }
        .tiktok .social-btn {
            background: #000000;
            color: white;
        }
        .tiktok .social-btn:hover {
            background: #1a1a1a;
        }

        /* Facebook */
        .facebook .social-icon {
            background: #1877f2;
            color: white;
        }
        .facebook .social-btn {
            background: #1877f2;
            color: white;
        }
        .facebook .social-btn:hover {
            background: #0e5bcf;
        }

        /* Twitter/X */
        .twitter .social-icon {
            background: #1da1f2;
            color: white;
        }
        .twitter .social-btn {
            background: #1da1f2;
            color: white;
        }
        .twitter .social-btn:hover {
            background: #0c85d0;
        }

        /* YouTube */
        .youtube .social-icon {
            background: #ff0000;
            color: white;
        }
        .youtube .social-btn {
            background: #ff0000;
            color: white;
        }
        .youtube .social-btn:hover {
            background: #cc0000;
        }

        /* Footer */
        .footer-social {
            background: #f28bae;
            color: white;
            text-align: center;
            padding: 25px;
            margin-top: 60px;
        }

        /* Animasi */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .social-card {
            animation: fadeInUp 0.5s ease forwards;
            opacity: 0;
        }

        .social-card:nth-child(1) { animation-delay: 0.05s; }
        .social-card:nth-child(2) { animation-delay: 0.1s; }
        .social-card:nth-child(3) { animation-delay: 0.15s; }
        .social-card:nth-child(4) { animation-delay: 0.2s; }
        .social-card:nth-child(5) { animation-delay: 0.25s; }
        .social-card:nth-child(6) { animation-delay: 0.3s; }

        @media (max-width: 768px) {
            .social-hero h1 {
                font-size: 2rem;
            }
            .social-grid {
                gap: 20px;
                padding: 15px;
            }
            .social-card {
                padding: 30px 20px;
            }
        }
    </style>
</head>
<body>

<header class="navbar-header">
  <div class="navbar-container">
    
    <!-- Menu Kiri -->
    <div class="nav-menu">
      <a href="{{ url('/') }}#hero">Home</a>
      <a href="/products">Menu</a>
      <a href="/about">About Us</a>
    </div>
    
    <!-- Logo -->
    <div class="nav-logo">
      <img src="/foto/logo.svg" alt="Logo DH Bakery">
    </div>
    
    <!-- Menu Kanan -->
    <div class="nav-menu">
      <a href="{{ route('social') }}">Social</a>
      <a href="{{ route('faq') }}">FAQ</a>
      <a href="{{ url('/') }}#contact">Contact</a>
    </div>
    
    <!-- Mobile Menu Button -->
    <button class="mobile-menu-btn">
      <i class="fas fa-bars"></i>
    </button>
    
  </div>
</header>

<!-- Hero Section -->
<section class="social-hero">
    <h1>Connect With <span>Diah Bakery</span></h1>
    <p>Ikuti kami di media sosial untuk mendapatkan update terbaru tentang promo, produk baru, dan berbagai kelezatan lainnya!</p>
    <div class="divider"></div>
</section>

<!-- Social Media Grid -->
<div class="social-grid">
    
    <!-- Instagram -->
    <div class="social-card instagram" onclick="window.open('https://instagram.com/diahbakery', '_blank')">
        <div class="social-icon">
            <i class="fab fa-instagram"></i>
        </div>
        <h3>Instagram</h3>
        <p>Lihat foto-foto menarik produk kami, behind the scene, dan promo harian!</p>
        <a href="https://instagram.com/diahbakery" target="_blank" class="social-btn">
            <i class="fab fa-instagram"></i> Follow @diahbakery
            <i class="fas fa-arrow-right"></i>
        </a>
    </div>

    <!-- WhatsApp -->
    <div class="social-card whatsapp" onclick="window.open('https://wa.me/6282277214344', '_blank')">
        <div class="social-icon">
            <i class="fab fa-whatsapp"></i>
        </div>
        <h3>WhatsApp</h3>
        <p>Pesan langsung, konsultasi menu, atau tanyakan apapun tentang produk kami!</p>
        <a href="https://wa.me/6282277214344" target="_blank" class="social-btn">
            <i class="fab fa-whatsapp"></i> Chat Now
            <i class="fas fa-arrow-right"></i>
        </a>
    </div>

    <!-- TikTok -->
    <div class="social-card tiktok" onclick="window.open('https://tiktok.com/@diahbakery', '_blank')">
        <div class="social-icon">
            <i class="fab fa-tiktok"></i>
        </div>
        <h3>TikTok</h3>
        <p>Tonton video seru, tutorial kue, dan konten menarik lainnya!</p>
        <a href="https://tiktok.com/@diahbakery" target="_blank" class="social-btn">
            <i class="fab fa-tiktok"></i> Follow @diahbakery
            <i class="fas fa-arrow-right"></i>
        </a>
    </div>

    <!-- Facebook -->
    <div class="social-card facebook" onclick="window.open('https://facebook.com/diahbakery', '_blank')">
        <div class="social-icon">
            <i class="fab fa-facebook-f"></i>
        </div>
        <h3>Facebook</h3>
        <p>Dapatkan informasi terbaru dan bergabung dengan komunitas pecinta kue!</p>
        <a href="https://facebook.com/diahbakery" target="_blank" class="social-btn">
            <i class="fab fa-facebook-f"></i> Like Diah Bakery
            <i class="fas fa-arrow-right"></i>
        </a>
    </div>

    <!-- Twitter/X -->
    <div class="social-card twitter" onclick="window.open('https://twitter.com/diahbakery', '_blank')">
        <div class="social-icon">
            <i class="fab fa-twitter"></i>
        </div>
        <h3>Twitter / X</h3>
        <p>Update cepat seputar promo dan produk terbaru!</p>
        <a href="https://twitter.com/diahbakery" target="_blank" class="social-btn">
            <i class="fab fa-twitter"></i> Follow @diahbakery
            <i class="fas fa-arrow-right"></i>
        </a>
    </div>

    <!-- YouTube -->
    <div class="social-card youtube" onclick="window.open('https://youtube.com/@diahbakery', '_blank')">
        <div class="social-icon">
            <i class="fab fa-youtube"></i>
        </div>
        <h3>YouTube</h3>
        <p>Tonton video tutorial, resep, dan konten inspiratif dari Diah Bakery!</p>
        <a href="https://youtube.com/@diahbakery" target="_blank" class="social-btn">
            <i class="fab fa-youtube"></i> Subscribe
            <i class="fas fa-arrow-right"></i>
        </a>
    </div>

</div>

<!-- Footer -->
<footer class="footer-social">
    <div class="container">
        <small>© 2026 Diah Bakery | Fresh & Delicious Every Day</small>
        <div class="mt-2">
            <i class="fab fa-instagram mx-1 opacity-75"></i>
            <i class="fab fa-whatsapp mx-1 opacity-75"></i>
            <i class="fab fa-tiktok mx-1 opacity-75"></i>
            <i class="fab fa-facebook-f mx-1 opacity-75"></i>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>