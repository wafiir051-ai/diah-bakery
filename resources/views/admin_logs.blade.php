<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - DH Bakery</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #fcf4f5;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(251, 113, 133, 0.1);
        }
        .fade-in {
            animation: fadeIn 0.5s ease-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body class="p-4">

    <!-- LOGIN CONTAINER -->
    <div class="fade-in w-full max-w-md">
        <div class="glass-card p-10 rounded-[2.5rem] shadow-2xl shadow-rose-100">
            <!-- Header Section -->
            <div class="text-center mb-10">
                <div class="w-20 h-20 bg-rose-500 rounded-3xl flex items-center justify-center text-white text-3xl mx-auto mb-6 shadow-xl shadow-rose-200">
                    <i class="fas fa-user-lock"></i>
                </div>
                <h2 class="text-3xl font-black text-gray-800 tracking-tight">Admin <span class="text-rose-500">Login</span></h2>
                <p class="text-gray-400 text-sm font-medium mt-2 uppercase tracking-widest text-[10px]">DH Bakery Management</p>
            </div>

            <!-- Login Form -->
            <form onsubmit="handleLogin(event)" class="space-y-6">
                <!-- Username Field -->
                <div class="space-y-2">
                    <label class="block text-[11px] font-black text-gray-400 uppercase tracking-[0.2em] ml-1">Username</label>
                    <div class="relative">
                        <span class="absolute left-5 top-1/2 -translate-y-1/2 text-gray-300">
                            <i class="fas fa-at"></i>
                        </span>
                        <input type="text" id="username" required 
                            class="w-full bg-gray-50 border border-gray-100 rounded-2xl pl-12 pr-6 py-4 outline-none focus:ring-4 focus:ring-rose-50 focus:border-rose-200 font-bold text-gray-700 transition-all placeholder:text-gray-300" 
                            placeholder="Username Anda">
                    </div>
                </div>

                <!-- Password Field -->
                <div class="space-y-2">
                    <label class="block text-[11px] font-black text-gray-400 uppercase tracking-[0.2em] ml-1">Password</label>
                    <div class="relative">
                        <span class="absolute left-5 top-1/2 -translate-y-1/2 text-gray-300">
                            <i class="fas fa-key"></i>
                        </span>
                        <input type="password" id="password" required 
                            class="w-full bg-gray-50 border border-gray-100 rounded-2xl pl-12 pr-6 py-4 outline-none focus:ring-4 focus:ring-rose-50 focus:border-rose-200 font-bold text-gray-700 transition-all placeholder:text-gray-300" 
                            placeholder="••••••••">
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit" id="login-btn" class="w-full bg-rose-500 text-white py-5 rounded-2xl font-black text-sm tracking-[0.2em] shadow-xl shadow-rose-200 hover:bg-rose-600 transition-all transform active:scale-95 flex items-center justify-center gap-3">
                    MASUK SEKARANG <i class="fas fa-sign-in-alt"></i>
                </button>
            </form>

            <!-- Footer Links -->
            <div class="mt-10 pt-8 border-t border-gray-50 text-center">
                <a href="index.html" class="text-xs font-bold text-gray-400 hover:text-rose-500 transition-colors uppercase tracking-widest flex items-center justify-center gap-2">
                    <i class="fas fa-arrow-left"></i> Kembali ke Katalog Toko
                </a>
            </div>
        </div>
    </div>

    <script>
        function handleLogin(e) {
            e.preventDefault();
            const u = document.getElementById('username').value;
            const p = document.getElementById('password').value;
            const btn = document.getElementById('login-btn');

            // Kredensial sesuai permintaan
            const validUser = "l4nt4buro";
            const validPass = "kampung_keluarga";

            if (u === validUser && p === validPass) {
                // Beri efek loading
                btn.innerHTML = 'MENGALIHKAN... <i class="fas fa-spinner fa-spin"></i>';
                btn.classList.replace('bg-rose-500', 'bg-green-500');
                btn.disabled = true;
                
                // Simpan status login sederhana (opsional untuk demo)
                localStorage.setItem('adminLoggedIn', 'true');

                setTimeout(() => {
                    // Alihkan ke file dashboard
                    window.location.href = 'dashboard.html';
                }, 1200);
            } else {
                alert("Username atau Password salah. Silakan coba lagi.");
            }
        }
    </script>
</body>
</html>