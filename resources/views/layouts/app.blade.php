<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Diah Bakery - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, #ffe4ec 0%, #ffd0db 100%);
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            min-height: 100vh;
        }

        /* Navbar Baru dengan Logo di Tengah */
        .navbar-new {
            background: #f28bae;
            padding: 12px 0;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 15px rgba(242, 139, 174, 0.3);
        }

        .navbar-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        /* Menu Kiri - lebih rapat ke tengah */
        .nav-menu-left {
            display: flex;
            gap: 20px;
            align-items: center;
            position: absolute;
            right: 50%;
            margin-right: 100px;
        }

        /* Menu Kanan - lebih rapat ke tengah */
        .nav-menu-right {
            display: flex;
            gap: 20px;
            align-items: center;
            position: absolute;
            left: 50%;
            margin-left: 100px;
        }

        .nav-menu-left a, 
        .nav-menu-right a {
            color: white;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            letter-spacing: 0.3px;
            transition: all 0.3s ease;
            white-space: nowrap;
        }

        .nav-menu-left a:hover, 
        .nav-menu-right a:hover {
            color: #ffe0e7;
            transform: translateY(-2px);
        }

        /* Logo Tengah */
        .nav-logo {
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 10;
        }

        .nav-logo img {
            width: 55px;
            height: 55px;
            border-radius: 50%;
            object-fit: cover;
            background: white;
            padding: 5px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            transition: transform 0.3s ease;
        }

        .nav-logo img:hover {
            transform: scale(1.05);
        }

        /* Ikon Kanan (Home, Cart, Login) */
        .nav-icons {
            display: flex;
            align-items: center;
            gap: 15px;
            position: absolute;
            right: 20px;
        }

        .nav-icon {
            font-size: 1.4rem;
            transition: all 0.3s ease;
            text-decoration: none;
            color: white !important;
            display: inline-block;
            position: relative;
        }

        .nav-icon:hover {
            transform: translateY(-3px) scale(1.1);
        }

        .cart-count {
            position: absolute;
            top: -8px;
            right: -12px;
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

        /* Sembunyikan menu kiri/kanan di mobile */
        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            color: white;
            font-size: 1.6rem;
            cursor: pointer;
            position: absolute;
            right: 20px;
        }

        .mobile-menu {
            display: none;
            position: fixed;
            top: 74px;
            left: 0;
            right: 0;
            background: #f28bae;
            padding: 20px;
            flex-direction: column;
            gap: 12px;
            z-index: 999;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }

        .mobile-menu a {
            color: white;
            text-decoration: none;
            font-weight: 600;
            padding: 10px;
            text-align: center;
            border-radius: 12px;
            transition: background 0.3s;
        }

        .mobile-menu a:hover {
            background: rgba(255,255,255,0.2);
        }

        /* Responsive */
        @media (max-width: 992px) {
            .nav-menu-left, .nav-menu-right {
                display: none;
            }
            
            .mobile-menu-btn {
                display: block;
            }
            
            .mobile-menu.active {
                display: flex;
            }
            
            .navbar-container {
                justify-content: space-between;
            }
            
            .nav-icons {
                position: relative;
                right: auto;
            }
            
            .nav-logo img {
                width: 48px;
                height: 48px;
            }
        }

        @media (max-width: 576px) {
            .navbar-container {
                padding: 0 15px;
            }
            
            .nav-icon {
                font-size: 1.2rem;
            }
            
            .nav-logo img {
                width: 42px;
                height: 42px;
            }
        }

        /* Toast Notification */
        .toast-notification {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background: white;
            padding: 12px 24px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.15);
            z-index: 1100;
            animation: slideIn 0.3s ease;
        }

        @keyframes slideIn {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }

        /* Tombol Umum */
        .btn-pink {
            background: #f28bae;
            border: none;
            color: white;
            padding: 10px 24px;
            border-radius: 25px;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn-pink:hover {
            background: #f8b0c5;
            transform: translateY(-2px);
            color: white;
        }

        .btn-outline-pink {
            border: 2px solid #f28bae;
            background: transparent;
            color: #f28bae;
            padding: 8px 20px;
            border-radius: 25px;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn-outline-pink:hover {
            background: #f28bae;
            color: white;
        }
    </style>
    @stack('styles')
</head>
<body>

<!-- NAVBAR: Teks RAPAT ke Tengah -->
<nav class="navbar-new">
    <div class="navbar-container">
        <!-- Menu Kiri - rapat ke tengah -->
        <div class="nav-menu-left">
            <a href="{{ url('/') }}#hero">Home</a>
            <a href="{{ url('/products') }}">Menu</a>
            <a href="{{ url('/about') }}">About Us</a>
        </div>

        <!-- Logo di Tengah -->
        <a href="{{ url('/') }}" class="nav-logo">
            <img src="/foto/logo.svg" alt="Logo DH Bakery">
        </a>

        <!-- Menu Kanan - rapat ke tengah -->
        <div class="nav-menu-right">
            <a href="{{ url('/social') }}#Profile">Social</a>
            <a href="{{ url('/faq') }}">FAQ</a>
            <a href="{{ url('/') }}#contact">Contact</a>
        </div>

        <!-- Ikon tambahan (Home, Keranjang, Login) -->
        <div class="nav-icons">
            <a href="{{ url('/cart') }}" class="nav-icon" title="Keranjang" style="position: relative;">
                🛒
                @php
                    $cartCount = session()->get('cart') ? array_sum(array_column(session()->get('cart'), 'quantity')) : 0;
                @endphp
                @if($cartCount > 0)
                    <span class="cart-count">{{ $cartCount }}</span>
                @endif
            </a>
            <a href="{{ url('/login') }}" class="nav-icon" title="Login Admin">👤</a>
        </div>

        <!-- Mobile Menu Button -->
        <button class="mobile-menu-btn" id="mobileMenuBtn">
            <i class="fas fa-bars"></i>
        </button>
    </div>

    <!-- Mobile Menu Dropdown -->
    <div class="mobile-menu" id="mobileMenu">
        <a href="{{ url('/') }}#hero">🏠 Home</a>
        <a href="{{ url('/products') }}">🍰 Menu</a>
        <a href="{{ url('/') }}#about">📖 About Us</a>
        <a href="{{ url('/social') }}">📱 Social</a>
        <a href="{{ url('/faq') }}">❓ FAQ</a>
        <a href="{{ url('/') }}#contact">📞 Contact</a>
    </div>
</nav>

<!-- Content -->
<main style="min-height: calc(100vh - 150px); padding-bottom: 40px;">
    <div class="container mt-4">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="background: #d4edda; border: none; border-radius: 12px;">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert" style="background: #f8d7da; border: none; border-radius: 12px;">
                <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @yield('content')
    </div>
</main>

<!-- Footer -->
<footer class="text-center py-3" style="background: #f28bae; color: white; margin-top: auto;">
    <div class="container">
        <small>© 2026 Diah Bakery | Fresh & Delicious Every Day</small>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Auto close alert after 3 seconds
    setTimeout(function() {
        let alerts = document.querySelectorAll('.alert');
        alerts.forEach(function(alert) {
            let bsAlert = new bootstrap.Alert(alert);
            bsAlert.close();
        });
    }, 3000);

    // Mobile menu toggle
    const mobileBtn = document.getElementById('mobileMenuBtn');
    const mobileMenu = document.getElementById('mobileMenu');

    if (mobileBtn) {
        mobileBtn.addEventListener('click', function() {
            mobileMenu.classList.toggle('active');
        });
    }
</script>
@stack('scripts')
</body>
</html>