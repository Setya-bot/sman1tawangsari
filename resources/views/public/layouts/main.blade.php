<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - SMA Negeri 1 Tawangsari</title>

    @vite('resources/css/app.css')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        h1, h2, h3, h4, h5 {
            font-family: 'Playfair Display', serif;
        }
    </style>

    @yield('styles')
</head>
<body class="bg-gray-50 text-gray-800">

<!-- ================= NAVBAR ================= -->
<nav class="fixed top-0 w-full bg-white/90 backdrop-blur shadow z-50">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex justify-between items-center h-16">

            <!-- Logo -->
            <a href="{{ url('/') }}" class="flex items-center gap-3">
                <img src="{{ $profile->logo ? asset('storage/'.$profile->logo) : asset('images/logo-default.png') }}"
                     class="h-10 w-10 object-cover rounded-lg">
                <span class="font-bold text-lg text-blue-600">
                    {{ $profile->school_name ?? 'Nama Sekolah' }}
                </span>
            </a>

            <!-- Menu Desktop -->
            <div class="hidden md:flex items-center gap-6">
                <a href="{{ url('/') }}" class="hover:text-blue-600">Beranda</a>
                <div class="relative group inline-block">
                    <button class="flex items-center hover:text-blue-600 focus:outline-none">
                        <span>Profil</span>
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>

                    <div class="absolute left-0 w-48 mt-2 origin-top-left bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50">
                        <div class="py-1">
                            <a href="{{ route('opening') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600">Kata Sambutan</a>
                            <a href="{{ route('history') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600">Sejarah & Visi Misi</a>
                            <a href="{{ route('gtk') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600">Guru & Tendik</a>
                            <a href="{{ route('service') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600">Layanan</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600">Struktur Organisasi</a>
                        </div>
                    </div>
                </div>
                <div class="relative group inline-block">
                    <button class="flex items-center hover:text-blue-600 focus:outline-none">
                        <span>Program</span>
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>

                    <div class="absolute left-0 w-48 mt-2 origin-top-left bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50">
                        <div class="py-1">
                            <a href="{{ route('studentship') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600">Kesiswaan</a>
                            <a href="{{ route('academic') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600">Akademik</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600">Sarana Prasarana</a>
                        </div>
                    </div>
                </div>
                <div class="relative group inline-block">
                    <button class="flex items-center hover:text-blue-600 focus:outline-none">
                        <span>Siswa</span>
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>

                    <div class="absolute left-0 w-48 mt-2 origin-top-left bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50">
                        <div class="py-1">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600">SPMB 2026</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600">Alumni</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600">Prestasi</a>
                        </div>
                    </div>
                </div>
                <a href="{{ route('ekstrakurikuler') }}" class="hover:text-blue-600">Ekstrakurikuler</a>
                <a href="#" class="hover:text-blue-600">Galeri</a>
                <a href="#" class="hover:text-blue-600">Berita</a>

                <a href="#" class="bg-blue-600 text-white px-4 py-2 rounded-full hover:bg-blue-700 transition">
                    Info PPDB
                </a>
            </div>

            <!-- Mobile Button -->
            <button id="menuBtn" class="md:hidden text-2xl">
                <i class="fas fa-bars"></i>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div id="mobileMenu" class="hidden flex-col gap-2 py-4 md:hidden border-t border-gray-100 mt-2">
            <a href="{{ url('/') }}" class="py-2 font-medium hover:text-blue-600">Beranda</a>
            
            <div class="flex flex-col">
                <button onclick="toggleMobileDropdown('profileSub')" class="flex justify-between items-center py-2 font-medium hover:text-blue-600">
                    <span>Profil</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div id="profileSub" class="hidden flex-col ml-4 border-l-2 border-blue-500 pl-4 gap-2 mb-2">
                    <a href="{{ route('opening') }}" class="py-1 text-sm text-gray-600">Kata Sambutan</a>
                    <a href="{{ route('history') }}" class="py-1 text-sm text-gray-600">Sejarah</a>
                    <a href="{{ route('gtk') }}" class="py-1 text-sm text-gray-600">Guru & Tendik</a>
                    <a href="{{ route('service') }}" class="py-1 text-sm text-gray-600">Layanan</a>
                    <a href="#" class="py-1 text-sm text-gray-600">Struktur Organisasi</a>
                </div>
            </div>
            
            <a href="{{ route('academic') }}" class="py-2 font-medium hover:text-blue-600">Akademik</a>
            <a href="{{ route('studentship') }}" class="py-2 font-medium hover:text-blue-600">Kesiswaan</a>
            <a href="#" class="py-2 font-medium hover:text-blue-600">Galeri</a>
            <a href="#" class="py-2 font-medium hover:text-blue-600">Berita</a>
            <a href="#" class="py-2 font-medium text-blue-600 font-bold">PPDB 2026</a>
        </div>
    </div>
</nav>

<!-- ================= CONTENT ================= -->
<main class="pt-16">
    @yield('content')
</main>

<!-- ================= FOOTER ================= -->
<footer class="bg-slate-900 text-white">
    <div class="max-w-7xl mx-auto px-4 py-10 grid md:grid-cols-4 gap-8">

        <div>
            <h5 class="font-bold text-lg mb-3">SMA Negeri 1 Tawangsari</h5>
            <p class="text-sm">
                Jl. HOS Cokroaminoto No. 10<br>
                Tawangsari 55253
            </p>
            <p class="text-sm mt-2">
                Telp: (0274) 513454<br>
                Email: humas@sman1tawangsari.sch.id
            </p>
        </div>

        <div>
            <h6 class="font-semibold mb-3">Navigasi</h6>
            <ul class="space-y-2 text-sm">
                <li><a href="#" class="hover:text-blue-400">Profil Sekolah</a></li>
                <li><a href="#" class="hover:text-blue-400">Visi & Misi</a></li>
                <li><a href="#" class="hover:text-blue-400">Fasilitas</a></li>
            </ul>
        </div>

        <div>
            <h6 class="font-semibold mb-3">Layanan Cepat</h6>
            <ul class="space-y-2 text-sm">
                <li><a href="#" class="hover:text-blue-400">PPDB Online</a></li>
                <li><a href="#" class="hover:text-blue-400">E-Learning</a></li>
                <li><a href="#" class="hover:text-blue-400">Portal Siswa</a></li>
                <li><a href="#" class="hover:text-blue-400">Alumni</a></li>
            </ul>
        </div>

        <div>
            <h6 class="font-semibold mb-3">Ikuti Kami</h6>
            <div class="flex gap-4 text-2xl">
                <i class="fab fa-instagram hover:text-pink-400"></i>
                <i class="fab fa-youtube hover:text-red-500"></i>
                <i class="fab fa-facebook hover:text-blue-500"></i>
                <i class="fab fa-twitter hover:text-sky-400"></i>
            </div>
        </div>
    </div>

    <div class="text-center text-sm border-t border-gray-700 py-4">
        &copy; 2026 SMA Negeri 1 Tawangsari • All Rights Reserved
    </div>
</footer>

<!-- ================= SCRIPT ================= -->
<script>
    const btn = document.getElementById('menuBtn');
    const menu = document.getElementById('mobileMenu');

    btn.addEventListener('click', () => {
        menu.classList.toggle('hidden');
    });
</script>
<script src="//unpkg.com/alpinejs" defer></script>
<script src="https://cdn.tailwindcss.com"></script>
<script>
  tailwind.config = {
    content: [],
    theme: {
      extend: {}
    }
  }
</script>
@yield('scripts')

</body>
</html>