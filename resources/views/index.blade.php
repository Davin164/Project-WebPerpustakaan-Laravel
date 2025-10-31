<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #274eff, #5866ff);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .alert-success {
            background-color: #10b981;
            color: white;
            padding: 1rem 2rem;
            text-align: center;
            font-weight: 500;
            animation: slideDown 0.5s ease-out;
        }

        nav {
            background-color: rgba(255, 255, 255, 0.1);
            padding: 1rem 2rem;
            backdrop-filter: blur(5px);
        }

        .logo {
            color: white;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2rem;
        }

        .login-prompt {
            background-color: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 400px;
            width: 90%;
        }

        h1 {
            color: #333;
            margin-bottom: 1rem;
        }

        p {
            color: #666;
            margin-bottom: 2rem;
            line-height: 1.6;
        }

        .login-btn {
            background-color: #4f46e5;
            color: white;
            padding: 0.8rem 2rem;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .login-btn:hover {
            background-color: #4338ca;
        }

        .register-link {
            display: block;
            margin-top: 1rem;
            color: #6b7280;
            text-decoration: none;
        }

        .register-link:hover {
            color: #4f46e5;
        }
    </style>
</head>
<body>
    @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert-success" style="background-color: #ef4444;">
            {{ session('error') }}
        </div>
    @endif



    <nav>
        <div class="logo">PERPUSTAKAAN SAYA</div>
    </nav>

    <div class="container">
        <div class="login-prompt">
            <h1>Selamat Datang!</h1>
            <p>Untuk mengakses website perpustakaan ini, Anda perlu login terlebih dahulu. Silakan login menggunakan akun Anda atau daftar jika belum memiliki akun.</p>
            <a href="/login" class="login-btn">Login</a>
            <a href="/register" class="register-link">Belum punya akun? Daftar di sini</a>
        </div>
    </div>

    <!-- Auto-hide alert after 3 seconds -->
    <script>
        setTimeout(function() {
            const alert = document.querySelector('.alert-success');
            if (alert) {
                alert.style.transition = 'opacity 0.5s';
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 500);
            }
        }, 3000);
    </script>
</body>
</html>
