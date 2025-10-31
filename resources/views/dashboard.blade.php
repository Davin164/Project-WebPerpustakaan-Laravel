<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan Digital</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        /* Navbar */
        .navbar {
            background: #1a237e;
            padding: 1rem 5%;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        .nav-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            color: white;
            font-size: 1.5rem;
            font-weight: bold;
            text-decoration: none;
        }

        .nav-links {
            display: flex;
            gap: 2rem;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            font-weight: 500;
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(rgba(41, 41, 41, 0.7), rgba(0, 0, 0, 0.7)), url('/dashboard/DJI_20241209071730_0011_D.JPG');
            background-size: cover;
            background-position: center;
            height: 800px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            padding: 0 20px;
            margin-top: 60px;
        }

        .hero-content h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        .hero-content p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
        }

        .cta-button {
            background: #1a237e;
            color: white;
            padding: 1rem 2rem;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: background 0.3s;
        }

        .cta-button:hover {
            background: #0d1757;
        }

        /* Features Section */
        .features {
            padding: 4rem 5%;
            background: #f5f5f5;
        }

        .features h2 {
            text-align: center;
            margin-bottom: 3rem;
            color: #1a237e;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }

        .feature-card {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            text-align: center;
        }

        .feature-card h3 {
            color: #1a237e;
            margin: 1rem 0;
        }

        /* Popular Books Section */
        .popular-books {
            padding: 4rem 5%;
        }

        .popular-books h2 {
            text-align: center;
            margin-bottom: 3rem;
            color: #1a237e;
        }

        .books-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
        }

        .book-card {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .book-image {
            width: 100%;
            height: 250px;
            background: #ddd;
            object-fit: cover;
        }

        .book-info {
            padding: 1rem;
        }

        .book-info h3 {
            color: #1a237e;
            margin-bottom: 0.5rem;
        }

        /* Footer */
        .footer {
            background: #1a237e;
            color: white;
            padding: 2rem 5%;
            text-align: center;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .footer-section h3 {
            margin-bottom: 1rem;
        }

        .footer-section ul {
            list-style: none;
        }

        .footer-section ul li {
            margin-bottom: 0.5rem;
        }

        .footer-section ul li a {
            color: white;
            text-decoration: none;
        }

        .copyright {
            border-top: 1px solid rgba(255,255,255,0.1);
            padding-top: 1rem;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }

            .hero-content h1 {
                font-size: 2rem;
            }

            .features-grid, .books-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="nav-content">
            <a href="#" class="logo">Perpustakaan Digital</a>
            <div class="nav-links">
                <a href="{{route('home')}}">Beranda</a>
                <a href="{{route('buku')}}">Buku</a>
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit">Logout</button>
            </form>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Selamat Datang di Perpustakaan Digital</h1>
            <p>Temukan ribuan buku digital dan resources pembelajaran dalam genggaman Anda</p>
            <a href="/buku" class="cta-button">Mulai Membaca</a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-section">
                <h3>Tentang Kami</h3>
                <ul>
                    <li><a href="#">Profil</a></li>
                    <li><a href="#">Visi & Misi</a></li>
                    <li><a href="#">Tim Kami</a></li>
                    <li><a href="home.html">home</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Kontak</h3>
                <ul>
                    <li>Email: info@perpustakaan.com</li>
                    <li>Telp: (021) 1234-5678</li>
                    <li>Alamat: Jl. Perpustakaan No. 123</li>
                </ul>
            </div>
        </div>
        <div class="copyright">
            <p>&copy; 2025 Perpustakaan Digital SMKBA.</p>
        </div>
    </footer>
</body>
</html>
