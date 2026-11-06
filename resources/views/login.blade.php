<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Diah Bakery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, #ffe4ec 0%, #ffd0db 100%);
            font-family: 'Segoe UI', 'Inter', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-container {
            display: flex;
            max-width: 1000px;
            width: 100%;
            background: white;
            border-radius: 40px;
            overflow: hidden;
            box-shadow: 0 25px 55px rgba(242, 139, 174, 0.25);
            transition: transform 0.3s ease;
        }

        /* Bagian Kiri - Form Login */
        .login-form {
            flex: 1;
            padding: 48px 40px;
            background: white;
        }

        .bakery-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #f28bae, #f5a5c1);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 24px;
        }

        .bakery-icon i {
            font-size: 32px;
            color: white;
        }

        .login-form h1 {
            font-size: 28px;
            font-weight: 700;
            color: #2d1e24;
            margin-bottom: 8px;
        }

        .login-form .welcome-text {
            color: #8e6e7a;
            font-size: 14px;
            margin-bottom: 32px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #5a3d48;
            margin-bottom: 6px;
        }

        .input-icon {
            position: relative;
        }

        .input-icon i {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #f28bae;
            font-size: 16px;
        }

        .login-form input {
            width: 100%;
            padding: 14px 16px 14px 45px;
            border: 2px solid #f0ced8;
            border-radius: 30px;
            font-size: 14px;
            outline: none;
            transition: all 0.3s ease;
            background: #fffbfd;
        }

        .login-form input:focus {
            border-color: #f28bae;
            box-shadow: 0 0 0 3px rgba(242, 139, 174, 0.2);
        }

        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 16px 0 24px;
            font-size: 13px;
        }

        .checkbox {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #5a3d48;
        }

        .checkbox input {
            width: 16px;
            height: 16px;
            margin: 0;
            accent-color: #f28bae;
        }

        .forgot-link {
            color: #f28bae;
            text-decoration: none;
            font-weight: 500;
        }

        .forgot-link:hover {
            text-decoration: underline;
        }

        .btn-login {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #f28bae, #f5a5c1);
            color: white;
            border: none;
            border-radius: 30px;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-bottom: 24px;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(242, 139, 174, 0.4);
        }

        .register-link {
            text-align: center;
            font-size: 14px;
            color: #6e4e5a;
        }

        .register-link a {
            color: #f28bae;
            text-decoration: none;
            font-weight: 600;
        }

        .register-link a:hover {
            text-decoration: underline;
        }

        .demo-info {
            margin-top: 24px;
            padding-top: 20px;
            border-top: 1px solid #f0ced8;
            font-size: 12px;
            color: #b28a99;
            text-align: center;
        }

        /* Bagian Kanan - Promo / Hero */
        .login-hero {
            flex: 1;
            background: linear-gradient(145deg, #fef3f6, #ffeef3);
            padding: 48px 32px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .croissant-icon {
            font-size: 80px;
            margin-bottom: 24px;
        }

        .login-hero h2 {
            font-size: 32px;
            font-weight: 800;
            color: #3d2931;
            line-height: 1.2;
            margin-bottom: 16px;
        }

        .login-hero h2 span {
            color: #f28bae;
            display: inline-block;
        }

        .login-hero p {
            color: #7a5c68;
            font-size: 14px;
            line-height: 1.6;
            margin-bottom: 32px;
        }

        .back-home {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            color: #f28bae;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            transition: gap 0.3s;
        }

        .back-home:hover {
            gap: 14px;
            color: #d4688a;
        }

        /* Dekorasi */
        .login-hero::before {
            content: "🍰";
            position: absolute;
            bottom: -20px;
            right: -20px;
            font-size: 180px;
            opacity: 0.1;
            pointer-events: none;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .login-container {
                flex-direction: column;
                max-width: 450px;
            }
            .login-hero {
                text-align: center;
                padding: 32px 24px;
            }
            .login-form {
                padding: 32px 24px;
            }
            .login-hero h2 {
                font-size: 26px;
            }
        }

        /* Alert styling */
        .alert-danger {
            background: #ffe0e8;
            border: none;
            border-radius: 20px;
            color: #c75377;
            font-size: 13px;
            padding: 10px 16px;
            margin-bottom: 20px;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="login-container">
        <!-- Bagian Kiri: Form Login -->
        <div class="login-form">
            <div class="bakery-icon">
                <i class="fas fa-birthday-cake"></i>
            </div>
            <h1>Welcome Back</h1>
            <p class="welcome-text">Enter your email and password to access your account.</p>

            @if(session('error'))
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label>Email</label>
                    <div class="input-icon">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="email" placeholder="Enter your email" value="{{ old('email') }}" required>
                    </div>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <div class="input-icon">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" placeholder="Enter your password" required>
                    </div>
                </div>

                <div class="form-options">
                    <label class="checkbox">
                        <input type="checkbox" name="remember"> Remember me
                    </label>
                    <a href="#" class="forgot-link">Forgot Password?</a>
                </div>

                <button type="submit" class="btn-login">
                    <i class="fas fa-arrow-right-to-bracket"></i> Sign In
                </button>

                <div class="register-link">
                    Don't have an account? <a href="#">Register</a>
                </div>

                <div class="demo-info">
                    <i class="fas fa-info-circle"></i> Demo: admin@diahbakery.com / admin123
                </div>
            </form>
        </div>

        <!-- Bagian Kanan: Promo Morning Rise / Croissant -->
        <div class="login-hero">
            <div class="croissant-icon">
                🥐
            </div>
            <h2>Morning <span>Rise</span></h2>
            <h3 style="font-size: 18px; color: #b85c7a; margin-bottom: 12px;">Try Our New Chocolate Almond Croissant!</h3>
            <p>Indulge in the perfect harmony of rich chocolate, almond croissants, and toasted almonds, wrapped in our buttery flaky croissant. A treat you won’t forget!</p>
            <a href="{{ route('home') }}" class="back-home">
                <i class="fas fa-arrow-left"></i> Back to Home
            </a>
        </div>
    </div>

    <!-- Optional: Bootstrap JS (untuk interaksi kecil) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>