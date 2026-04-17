@extends('public.layouts.main')

@section('title', 'Beranda')

@section('content')

    <!-- ==================== HERO CAROUSEL ==================== -->
<div x-data="{ active: 0 }" class="relative w-full h-screen overflow-hidden">

    <!-- SLIDES -->
    @foreach($carousels as $key => $carousel)
    <div x-show="active === {{ $key }}" 
         x-transition
         class="absolute inset-0">

        <!-- Background -->
        <div class="absolute inset-0 bg-cover bg-center"
             style="background-image: url('{{ asset("storage/{$carousel->image_url}") }}')">
        </div>

        <!-- Overlay -->
        <div class="absolute inset-0 bg-black/60"></div>

        <!-- Content -->
        <div class="relative z-10 flex flex-col justify-center items-center h-full text-center text-white px-4">
            <h1 class="text-4xl md:text-6xl font-bold mb-4">
                {{ $carousel->title ?? $profile->school_name }}
            </h1>

            <p class="text-lg md:text-2xl mb-6">
                {{ $carousel->description ?? $profile->motto }}
            </p>

            @if($carousel->link)
            <a href="{{ $carousel->link }}"
               class="bg-white text-black px-6 py-3 rounded-full font-semibold hover:bg-gray-200">
                Lihat Selengkapnya
            </a>
            @endif
        </div>
    </div>
    @endforeach

    <!-- BUTTON -->
    <button @click="active = (active - 1 + {{ count($carousels) }}) % {{ count($carousels) }}"
        class="absolute left-4 top-1/2 -translate-y-1/2 text-white text-3xl">
        ‹
    </button>

    <button @click="active = (active + 1) % {{ count($carousels) }}"
        class="absolute right-4 top-1/2 -translate-y-1/2 text-white text-3xl">
        ›
    </button>

</div>

<!-- ==================== SAMBUTAN ==================== -->
<section class="py-16 bg-gray-100">
    <div class="max-w-7xl mx-auto px-4 grid md:grid-cols-2 gap-10 items-center">

        <!-- FOTO -->
        <div class="text-center">
            <img src="{{ $profile->principal_photo 
                ? asset('storage/'.$profile->principal_photo) 
                : 'https://source.unsplash.com/500x500/?man,teacher' }}"
                class="w-60 h-60 mx-auto rounded-full object-cover shadow-xl">

            <h4 class="mt-5 text-xl font-bold">
                {{ $profile->principal_name ?? 'Nama Kepala Sekolah' }}
            </h4>
            <p class="text-gray-500">Kepala Sekolah</p>
        </div>

        <!-- TEXT -->
        <div>
            <h2 class="text-3xl font-bold mb-4 border-b-4 border-blue-500 inline-block pb-2">
                Sambutan Kepala Sekolah
            </h2>

            <p class="text-lg leading-relaxed">
                Assalamu'alaikum Wr. Wb.<br><br>
                Selamat datang di website resmi sekolah kami. Kami berkomitmen
                memberikan pendidikan terbaik berbasis karakter dan prestasi.
            </p>

            <p class="mt-4">
                Kami mengundang seluruh calon siswa untuk bergabung bersama kami.
            </p>
        </div>

    </div>
</section>


<!-- ==================== VISI MISI ==================== -->
<section class="py-16">
    <div class="max-w-7xl mx-auto px-4 grid md:grid-cols-2 gap-8">

        <!-- VISI -->
        <div class="bg-white p-8 rounded-2xl shadow hover:shadow-lg transition">
            <h3 class="text-blue-600 text-2xl font-bold mb-4">Visi</h3>
            <p class="text-gray-700">
                Menjadi sekolah unggulan nasional yang menghasilkan lulusan
                beriman, berprestasi, dan berwawasan global.
            </p>
        </div>

        <!-- MISI -->
        <div class="bg-white p-8 rounded-2xl shadow hover:shadow-lg transition">
            <h3 class="text-blue-600 text-2xl font-bold mb-4">Misi</h3>
            <ul class="space-y-3 text-gray-700">
                <li>• Pendidikan berbasis karakter & teknologi</li>
                <li>• Mengembangkan potensi siswa</li>
                <li>• Kerjasama dengan masyarakat</li>
            </ul>
        </div>

    </div>
</section>


<!-- ==================== PROGRAM ==================== -->
<section class="py-16 bg-gray-100">
    <div class="max-w-7xl mx-auto px-4 text-center">

        <h2 class="text-3xl font-bold mb-10">Program Unggulan</h2>

        <div class="grid md:grid-cols-3 gap-6">

            <div class="bg-white p-6 rounded-2xl shadow hover:-translate-y-2 transition">
                <i class="fas fa-laptop-code text-4xl text-blue-500 mb-4"></i>
                <h5 class="font-bold text-lg">STEM & Coding</h5>
                <p class="text-gray-600 mt-2">Program teknologi & pemrograman</p>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow hover:-translate-y-2 transition">
                <i class="fas fa-globe-asia text-4xl text-green-500 mb-4"></i>
                <h5 class="font-bold text-lg">International Class</h5>
                <p class="text-gray-600 mt-2">Kurikulum internasional</p>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow hover:-translate-y-2 transition">
                <i class="fas fa-palette text-4xl text-yellow-500 mb-4"></i>
                <h5 class="font-bold text-lg">Arts & Leadership</h5>
                <p class="text-gray-600 mt-2">Seni & kepemimpinan</p>
            </div>

        </div>
    </div>
</section>


<!-- ==================== STATISTIK ==================== -->
<section class="py-16 bg-gradient-to-r from-blue-600 to-teal-400 text-white">
    <div class="max-w-7xl mx-auto px-4 grid grid-cols-2 md:grid-cols-4 text-center gap-8">

        <div>
            <div class="text-4xl font-bold">1,280</div>
            <p>Siswa Aktif</p>
        </div>

        <div>
            <div class="text-4xl font-bold">92</div>
            <p>Guru & Staff</p>
        </div>

        <div>
            <div class="text-4xl font-bold">98%</div>
            <p>Kelulusan</p>
        </div>

        <div>
            <div class="text-4xl font-bold">45</div>
            <p>Prestasi</p>
        </div>

    </div>
</section>


<!-- ==================== TESTIMONI ==================== -->
<section class="py-16">
    <div class="max-w-3xl mx-auto text-center px-4">

        <h2 class="text-3xl font-bold mb-8">Apa Kata Mereka</h2>

        <p class="text-lg italic">
            "Sekolah ini membentuk saya menjadi pribadi disiplin dan siap kuliah."
        </p>
        <p class="mt-4 font-semibold">
            — Alumni 2024
        </p>

    </div>
</section>


<!-- ==================== GALERI ==================== -->
<section class="py-16 bg-gray-100">
    <div class="max-w-7xl mx-auto px-4">

        <h2 class="text-3xl font-bold text-center mb-10">Galeri</h2>

        <div class="grid md:grid-cols-3 gap-4">
            <img src="https://source.unsplash.com/800x600/?school" class="rounded-xl shadow hover:scale-105 transition">
            <img src="https://source.unsplash.com/800x600/?classroom" class="rounded-xl shadow hover:scale-105 transition">
            <img src="https://source.unsplash.com/800x600/?students" class="rounded-xl shadow hover:scale-105 transition">
        </div>

    </div>
</section>


<!-- ==================== BERITA ==================== -->
<section class="py-16">
    <div class="max-w-7xl mx-auto px-4">

        <h2 class="text-3xl font-bold text-center mb-10">Berita</h2>

        <div class="grid md:grid-cols-3 gap-6">

            <div class="bg-white rounded-2xl shadow overflow-hidden">
                <img src="https://source.unsplash.com/600x400/?news" class="w-full">
                <div class="p-4">
                    <small class="text-gray-500">16 April 2026</small>
                    <h5 class="font-bold mt-2">PPDB Dibuka</h5>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow overflow-hidden">
                <img src="https://source.unsplash.com/600x400/?student" class="w-full">
                <div class="p-4">
                    <small class="text-gray-500">14 April 2026</small>
                    <h5 class="font-bold mt-2">Juara Debat</h5>
                </div>
            </div>

        </div>

    </div>
</section>

@endsection