<!DOCTYPE html>
<html lang="id">
<head>
    <title>@yield('title') - SMA Negeri 1 Tawangsari</title>

    @vite('resources/css/app.css')

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Merriweather:ital,wght@0,400;0,700;0,900;1,400&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        :root {
            --primary: #48c3d9;
            --primary-dark: #3aa8b9;
        }

        body {
            /* Font body yang bersih dan formal */
            font-family: 'Inter', sans-serif;
            -webkit-font-smoothing: antialiased;
        }
        
        h1, h2, h3, h4, h5, h6 {
            /* Font heading yang berwibawa */
            font-family: 'Merriweather', serif;
            letter-spacing: -0.02em;
        }

        /* Utility untuk teks navigasi agar sangat jelas */
        .nav-text {
            font-family: 'Inter', sans-serif;
            font-weight: 700;
            letter-spacing: 0.025em;
            text-transform: uppercase;
        }

        /* Navbar Glassmorphism */
        .nav-glass {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(0,0,0,0.05);
        }

        /* Dropdown transition */
        .dropdown-content {
            display: none;
            opacity: 0;
            transform: translateY(10px);
            transition: all 0.2s ease-out;
        }

        .group:hover .dropdown-content {
            display: block;
            opacity: 1;
            transform: translateY(0);
        }

        #mobileMenu {
            transition: max-height 0.3s ease-in-out;
            max-height: 0;
            overflow: hidden;
        }

        #mobileMenu.active {
            max-height: 100vh;
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800">

<!-- ================= NAVBAR ================= -->
<nav class="fixed top-0 w-full nav-glass shadow-lg border-b border-gray-100 z-[100]">
    <div class="max-w-7xl mx-auto px-4 md:px-6">
        <div class="flex justify-between items-center h-20">

            <a href="{{ url('/') }}" class="flex items-center gap-3 group">
                <div class="relative overflow-hidden rounded-xl">
                    <img src="{{ $profile->logo ? asset('storage/'.$profile->logo) : asset('images/logo-default.png') }}"
                         class="h-12 w-12 object-contain">
                </div>
                <div class="flex flex-col">
                    <span class="font-black text-lg leading-none tracking-tighter text-gray-900 uppercase">
                        SMAN 1
                    </span>
                    <span class="font-medium text-xs text-[var(--primary)] tracking-widest uppercase">
                        Tawangsari
                    </span>
                </div>
            </a>

            <div class="hidden lg:flex items-center gap-8">
                <a href="{{ url('/') }}" class="nav-text text-[13px] text-gray-900 hover:text-[var(--primary)] transition-colors">
                    Beranda
                </a>

                <div class="relative group">
                    <button class="nav-text flex items-center gap-1.5 text-[13px] text-gray-900 group-hover:text-[var(--primary)] py-7">
                        Profil <i class="fas fa-chevron-down text-[10px] transition-transform group-hover:rotate-180"></i>
                    </button>
                    <div class="dropdown-content absolute left-0 w-64 bg-white border border-gray-100 rounded-lg shadow-xl p-2 z-[110]">
                        <a href="{{ route('opening') }}" class="block px-4 py-3 rounded-md text-[13px] font-semibold text-gray-700 hover:bg-gray-50 hover:text-[var(--primary)] transition-all font-medium">Kata Sambutan</a>
                        <a href="{{ route('history') }}" class="block px-4 py-3 rounded-md text-[13px] font-semibold text-gray-700 hover:bg-gray-50 hover:text-[var(--primary)] transition-all font-medium">Sejarah & Visi Misi</a>
                        <a href="{{ route('gtk') }}" class="block px-4 py-3 rounded-md text-[13px] font-semibold text-gray-700 hover:bg-gray-50 hover:text-[var(--primary)] transition-all font-medium">Guru & Tendik</a>
                        <a href="{{ route('service') }}" class="block px-4 py-3 rounded-md text-[13px] font-semibold text-gray-700 hover:bg-gray-50 hover:text-[var(--primary)] transition-all font-medium">Layanan</a>
                    </div>
                </div>  

                <div class="relative group">
                    <button class="nav-text flex items-center gap-1.5 text-[13px] text-gray-900 group-hover:text-[var(--primary)] py-7">
                        Program <i class="fas fa-chevron-down text-[10px] transition-transform group-hover:rotate-180"></i>
                    </button>
                    <div class="dropdown-content absolute left-0 w-60 bg-white border border-gray-100 rounded-2xl shadow-2xl p-2 z-[110]">
                        <a href="{{ route('academic') }}" class="block px-4 py-3 rounded-md text-[13px] font-semibold text-gray-700 hover:bg-gray-50 hover:text-[var(--primary)] transition-all font-medium">Akademik</a>
                        <a href="{{ route('studentship') }}" class="block px-4 py-3 rounded-md text-[13px] font-semibold text-gray-700 hover:bg-gray-50 hover:text-[var(--primary)] transition-all font-medium">Kesiswaan</a>
                        <a href="{{ route('sarana') }}" class="block px-4 py-3 rounded-md text-[13px] font-semibold text-gray-700 hover:bg-gray-50 hover:text-[var(--primary)] transition-all font-medium">Sarana Prasarana</a>
                    </div>
                </div>

                <div class="relative group">
                    <button class="nav-text flex items-center gap-1.5 text-[13px] text-gray-900 group-hover:text-[var(--primary)] py-7">
                        Siswa <i class="fas fa-chevron-down text-[10px] transition-transform group-hover:rotate-180"></i>
                    </button>
                    <div class="dropdown-content absolute left-0 w-60 bg-white border border-gray-100 rounded-2xl shadow-2xl p-2 z-[110]">
                        <a href="{{ route('spmb') }}" class="block px-4 py-3 rounded-md text-[13px] font-semibold text-gray-700 hover:bg-gray-50 hover:text-[var(--primary)] transition-all font-medium">SPMB</a>
                        <a href="{{ route('achievment') }}" class="block px-4 py-3 rounded-md text-[13px] font-semibold text-gray-700 hover:bg-gray-50 hover:text-[var(--primary)] transition-all font-medium">Prestasi</a>
                        <a href="{{ route('alumni') }}" class="block px-4 py-3 rounded-md text-[13px] font-semibold text-gray-700 hover:bg-gray-50 hover:text-[var(--primary)] transition-all font-medium">Alumni</a>
                    </div>
                </div>

                <a href="{{ route('ekstrakurikuler') }}" class="nav-text text-[13px] text-gray-900 hover:text-[var(--primary)] transition-colors">Ekstrakurikuler</a>
                <a href="#" class="nav-text text-[13px] text-gray-900 hover:text-[var(--primary)] transition-colors">Berita</a>

                <a href="#" class="ml-4 bg-[var(--primary)] hover:bg-gray-900 text-white text-[11px] px-6 py-3 rounded-full font-black uppercase tracking-widest transition-all duration-300 shadow-lg shadow-gray-200 hover:shadow-[var(--primary)]/40 active:scale-95">
                    PPDB 2026
                </a>
            </div>

            <button id="menuBtn" class="lg:hidden w-12 h-12 flex items-center justify-center rounded-xl bg-gray-50 text-gray-900 transition-all hover:bg-gray-100">
                <i class="fas fa-bars-staggered text-xl" id="menuIcon"></i>
            </button>
        </div>

        <div id="mobileMenu" class="lg:hidden">
            <div class="flex flex-col space-y-2 pb-6">
                <a href="{{ url('/') }}" class="p-4 font-bold text-gray-700">Beranda</a>
                
                <div class="border border-gray-100 rounded-2xl overflow-hidden">
                    <button onclick="toggleMobileDropdown('profileSub')" class="flex justify-between items-center w-full p-4 font-bold text-gray-700 bg-white">
                        Profil <i class="fas fa-chevron-down text-xs transition-transform" id="profileIcon"></i>
                    </button>
                    <div id="profileSub" class="hidden bg-gray-50 px-4 py-2 flex flex-col space-y-3">
                        <a href="{{ route('opening') }}" class="text-sm text-gray-600 py-2">Kata Sambutan</a>
                        <a href="{{ route('history') }}" class="text-sm text-gray-600 py-2">Sejarah & Visi Misi</a>
                        <a href="{{ route('gtk') }}" class="text-sm text-gray-600 py-2">Guru & Tendik</a>
                        <a href="{{ route('service') }}" class="text-sm text-gray-600 py-2">Layanan</a>
                    </div>
                </div>
                <div class="border border-gray-100 rounded-2xl overflow-hidden">
                    <button onclick="toggleMobileDropdown('profileSub')" class="flex justify-between items-center w-full p-4 font-bold text-gray-700 bg-white">
                        Program <i class="fas fa-chevron-down text-xs transition-transform" id="profileIcon"></i>
                    </button>
                    <div id="profileSub" class="hidden bg-gray-50 px-4 py-2 flex flex-col space-y-3">
                        <a href="{{ route('academic') }}" class="text-sm text-gray-600 py-2">Akademik</a>
                        <a href="{{ route('studentship') }}" class="text-sm text-gray-600 py-2">Kesiswaan</a>
                        <a href="{{ route('sarana') }}" class="text-sm text-gray-600 py-2">Sarana</a>
                    </div>
                </div>
                <div class="border border-gray-100 rounded-2xl overflow-hidden">
                    <button onclick="toggleMobileDropdown('profileSub')" class="flex justify-between items-center w-full p-4 font-bold text-gray-700 bg-white">
                        Siswa <i class="fas fa-chevron-down text-xs transition-transform" id="profileIcon"></i>
                    </button>
                    <div id="profileSub" class="hidden bg-gray-50 px-4 py-2 flex flex-col space-y-3">
                        <a href="{{ route('spmb') }}" class="text-sm text-gray-600 py-2">SPMB</a>
                        <a href="{{ route('achievment') }}" class="text-sm text-gray-600 py-2">Prestasi</a>
                        <a href="{{ route('alumni') }}" class="text-sm text-gray-600 py-2">Alumni</a>
                    </div>
                </div>

                <a href="{{ route('ekstrakurikuler') }}" class="p-4 font-bold text-gray-700">Ekstrakurikuler</a>
                <a href="#" class="p-4 font-bold text-gray-700">Berita</a>
                <a href="#" class="p-4 font-bold text-gray-700 text-[var(--primary)] uppercase tracking-widest text-xs border-2 border-[var(--primary)] rounded-2xl text-center">Info PPDB 2026</a>
            </div>
        </div>
    </div>
</nav>

<!-- ================= CONTENT ================= -->
<main class="pt-20">
    @yield('content')
</main>

<!-- ================= FOOTER ================= -->
<footer class="bg-slate-950 text-white">
    <div class="max-w-7xl mx-auto px-4 py-16 grid md:grid-cols-4 gap-10">
        
        <div>
            <div class="flex items-center gap-3 mb-6">
                <img src="{{ $profile->logo ? asset('storage/'.$profile->logo) : asset('images/logo-default.png') }}"
                     class="h-12 w-12">
                <h5 class="font-bold text-2xl">SMA Negeri 1 Tawangsari</h5>
            </div>
            <p class="text-slate-400 leading-relaxed">
                Jl. HOS Cokroaminoto No. 10<br>
                Tawangsari, Kabupaten Sukoharjo 57561
            </p>
            <div class="mt-6 space-y-1 text-sm text-slate-400">
                <p>Telp: (0274) 513454</p>
                <p>Email: humas@sman1tawangsari.sch.id</p>
            </div>
        </div>

        <div>
            <h6 class="font-semibold text-lg mb-6 text-white">Navigasi</h6>
            <ul class="space-y-3 text-slate-400">
                <li><a href="#" class="hover:text-[var(--primary)] transition-colors">Profil Sekolah</a></li>
                <li><a href="#" class="hover:text-[var(--primary)] transition-colors">Visi & Misi</a></li>
                <li><a href="#" class="hover:text-[var(--primary)] transition-colors">Fasilitas</a></li>
                <li><a href="#" class="hover:text-[var(--primary)] transition-colors">Struktur Organisasi</a></li>
            </ul>
        </div>

        <div>
            <h6 class="font-semibold text-lg mb-6 text-white">Layanan Cepat</h6>
            <ul class="space-y-3 text-slate-400">
                <li><a href="#" class="hover:text-[var(--primary)] transition-colors">PPDB Online 2026</a></li>
                <li><a href="#" class="hover:text-[var(--primary)] transition-colors">E-Learning</a></li>
                <li><a href="#" class="hover:text-[var(--primary)] transition-colors">Portal Siswa</a></li>
                <li><a href="#" class="hover:text-[var(--primary)] transition-colors">Alumni</a></li>
            </ul>
        </div>

        <div>
            <h6 class="font-semibold text-lg mb-6 text-white">Ikuti Kami</h6>
            <div class="flex gap-5 text-3xl">
                <a href="#" class="hover:text-[#48c3d9] transition-colors"><i class="fab fa-instagram"></i></a>
                <a href="#" class="hover:text-[#48c3d9] transition-colors"><i class="fab fa-youtube"></i></a>
                <a href="#" class="hover:text-[#48c3d9] transition-colors"><i class="fab fa-facebook"></i></a>
                <a href="#" class="hover:text-[#48c3d9] transition-colors"><i class="fab fa-twitter"></i></a>
            </div>
            
            <div class="mt-10">
                <p class="text-xs text-slate-500">© 2026 SMA Negeri 1 Tawangsari</p>
                <p class="text-xs text-slate-500 mt-1">All Rights Reserved</p>
            </div>
        </div>
    </div>
</footer>

<script>
    const menuBtn = document.getElementById('menuBtn');
    const mobileMenu = document.getElementById('mobileMenu');
    const menuIcon = document.getElementById('menuIcon');

    // Toggle Mobile Main Menu
    menuBtn.addEventListener('click', () => {
        mobileMenu.classList.toggle('active');
        // Ganti icon bars jadi X saat buka
        if (mobileMenu.classList.contains('active')) {
            menuIcon.classList.replace('fa-bars-staggered', 'fa-xmark');
        } else {
            menuIcon.classList.replace('fa-xmark', 'fa-bars-staggered');
        }
    });

    // Toggle Mobile Dropdown (Accordion style)
    function toggleMobileDropdown(id) {
        const subMenu = document.getElementById(id);
        const icon = document.getElementById(id.replace('Sub', 'Icon'));
        
        subMenu.classList.toggle('hidden');
        if (icon) {
            icon.classList.toggle('rotate-180');
        }
    }

    // Navbar Scroll Effect (Opsional: Mengecilkan navbar saat scroll)
    window.addEventListener('scroll', () => {
        const nav = document.querySelector('nav');
        if (window.scrollY > 50) {
            nav.classList.add('py-2'); // Navbar memendek
            nav.querySelector('.h-20').classList.replace('h-20', 'h-16');
        } else {
            nav.classList.remove('py-2');
            nav.querySelector('.h-16')?.classList.replace('h-16', 'h-20');
        }
    });
</script>

<script src="//unpkg.com/alpinejs" defer></script>
<script src="https://cdn.tailwindcss.com"></script>

@yield('scripts')

</body>
</html>