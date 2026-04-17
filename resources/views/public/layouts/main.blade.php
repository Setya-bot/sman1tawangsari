<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - SMA Negeri 1 Yogyakarta</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary: #0d6efd;
            --accent: #00c4a7;
        }
        body {
            font-family: 'Inter', sans-serif;
            line-height: 1.6;
        }
        h1, h2, h3, h4, h5 { 
            font-family: 'Playfair Display', serif; 
            font-weight: 700; 
        }

        .navbar {
            background: rgba(255,255,255,0.97) !important;
            backdrop-filter: blur(12px);
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        }
        .nav-link {
            font-weight: 500;
            color: #333 !important;
            transition: all 0.3s;
        }
        .nav-link:hover { color: var(--primary) !important; }

        .hero-carousel .carousel-item {
            height: 100vh;
            min-height: 700px;
            background-size: cover;
            background-position: center;
        }
        .carousel-caption {
            background: linear-gradient(transparent, rgba(0,0,0,0.8));
            bottom: 0;
            padding: 80px 20px 70px;
        }
        .carousel-caption h1 {
            font-size: 3.8rem;
            text-shadow: 0 4px 20px rgba(0,0,0,0.7);
        }

        .section-title {
            position: relative;
            display: inline-block;
        }
        .section-title:after {
            content: '';
            position: absolute;
            width: 75px;
            height: 4px;
            background: linear-gradient(to right, var(--primary), var(--accent));
            bottom: -12px;
            left: 0;
            border-radius: 4px;
        }

        .card {
            border: none;
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.4s ease;
        }
        .card:hover {
            transform: translateY(-12px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.12);
        }

        .gallery-img {
            transition: all 0.4s;
            border-radius: 12px;
        }
        .gallery-img:hover {
            transform: scale(1.06);
        }

        footer { background: #0f172a; }
    </style>
    
    @yield('styles')
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2 fw-bold text-primary" href="{{ url('/') }}">
                
                <img src="{{ $profile->logo ? asset('storage/'.$profile->logo) : asset('images/logo-default.png') }}"
                    alt="Logo Sekolah"
                    style="height: 45px; width: 45px; object-fit: cover; border-radius: 8px;">

                <span class="fs-5">
                    {{ $profile->school_name ?? 'Nama Sekolah' }}
                </span>
            </a>            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item"><a class="nav-link px-3" href="{{ url('/') }}">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="{{ route('profile') }}">Profil</a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="#">Akademik</a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="#">Program</a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="#">Galeri</a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="#">Berita</a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="#">PPDB 2026</a></li>
                    <li class="nav-item ms-3">
                        <a href="#" class="btn btn-primary px-4 rounded-pill">Hubungi Kami</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="text-white py-5 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <h5 class="fw-bold">SMA Negeri 1 Yogyakarta</h5>
                    <p>Jl. HOS Cokroaminoto No. 10, Pakuncen, Wirobrajan,<br>Yogyakarta 55253</p>
                    <p>Telp: (0274) 513454<br>Email: humas@sman1yogya.sch.id</p>
                </div>
                <div class="col-lg-2">
                    <h6 class="fw-bold">Navigasi</h6>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white text-decoration-none">Profil Sekolah</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Visi & Misi</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Fasilitas</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h6 class="fw-bold">Layanan Cepat</h6>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white text-decoration-none">PPDB Online</a></li>
                        <li><a href="#" class="text-white text-decoration-none">E-Learning</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Portal Siswa</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Alumni</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h6 class="fw-bold">Ikuti Kami</h6>
                    <div class="d-flex gap-3 fs-3">
                        <i class="fab fa-instagram"></i>
                        <i class="fab fa-youtube"></i>
                        <i class="fab fa-facebook"></i>
                        <i class="fab fa-twitter"></i>
                    </div>
                </div>
            </div>
            <hr class="my-4">
            <div class="text-center small">
                &copy; 2026 SMA Negeri 1 Yogyakarta • Teladan Jayamahe • All Rights Reserved
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    @yield('scripts')
</body>
</html>