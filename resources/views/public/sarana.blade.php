@extends('public.layouts.main')

@section('title', 'Sarana & Prasarana - SMA Negeri 1 Tawangsari')

@section('content')
<div class="relative h-[65vh] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1541339907198-e08756ebafe3?ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80')] bg-cover bg-center"></div>
    <div class="absolute inset-0 bg-gradient-to-tr from-gray-900 via-gray-900/70 to-transparent"></div>
    
    <div class="relative z-10 text-left px-6 max-w-7xl mx-auto w-full">
        <div class="max-w-3xl">
            <span class="inline-block px-4 py-1.5 bg-[#48c3d9] text-gray-900 text-xs font-bold uppercase tracking-widest rounded-md mb-6">
                Fasilitas Sekolah
            </span>
            <h1 class="text-5xl md:text-7xl font-extrabold text-white leading-tight mb-6">
                Sarana & <span class="text-[#48c3d9]">Prasarana</span>
            </h1>
            <p class="text-lg md:text-xl text-white/80 font-light leading-relaxed border-l-4 border-[#48c3d9] pl-6">
                Mendukung proses pembelajaran yang nyaman, modern, dan berkualitas
            </p>
        </div>
    </div>
</div>

<div class="max-w-7xl mx-auto px-6 py-20">
    <div class="flex items-center justify-between mb-16 border-b border-gray-100 pb-8">
        <div>
            <h2 class="text-4xl font-black text-gray-900 uppercase tracking-tighter">Inventaris Utama</h2>
            <p class="text-gray-500 mt-2">Menyediakan standar kenyamanan terbaik bagi civitas akademika.</p>
        </div>
        <div class="hidden md:flex gap-4">
            <button class="bg-gray-900 text-white px-6 py-2 rounded-full text-xs font-bold uppercase">Semua</button>
            <button class="text-gray-400 hover:text-gray-900 px-6 py-2 rounded-full text-xs font-bold uppercase transition-colors">Akademik</button>
            <button class="text-gray-400 hover:text-gray-900 px-6 py-2 rounded-full text-xs font-bold uppercase transition-colors">Olahraga</button>
        </div>
    </div>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-10 mb-32">
        @php
            $facilities = [
                ['emoji' => '🔬', 'title' => 'Laboratorium Terpadu', 'desc' => 'Pusat riset sains yang dilengkapi mikroskop digital dan peralatan analisis modern.', 'img' => 'https://images.unsplash.com/photo-1581093450021-4a7360e9a6b5'],
                ['emoji' => '📚', 'title' => 'Digital Library', 'desc' => 'Akses ribuan literatur dengan sistem peminjaman mandiri berbasis RFID.', 'img' => 'https://images.unsplash.com/photo-1521587760476-6c12a4b040da'],
                ['emoji' => '⚽', 'title' => 'Sport Center', 'desc' => 'Fasilitas olahraga indoor dan outdoor dengan standar kompetisi provinsi.', 'img' => 'https://images.unsplash.com/photo-1541534741688-6078c64b5ca5'],
                ['emoji' => '🏫', 'title' => 'Smart Classroom', 'desc' => 'Kelas ber-AC dengan interaktif smart board dan koneksi Wi-Fi kencang.', 'img' => 'https://images.unsplash.com/photo-1509062522246-3755977927d7'],
                ['emoji' => '🎭', 'title' => 'Grand Auditorium', 'desc' => 'Ruang pertemuan megah dengan sistem tata suara dan pencahayaan panggung pro.', 'img' => 'https://images.unsplash.com/photo-1503095396549-807039045349'],
                ['emoji' => '🕌', 'title' => 'Al-Hikmah Mosque', 'desc' => 'Pusat kegiatan religi yang asri untuk mendukung pembentukan karakter siswa.', 'img' => 'https://images.unsplash.com/photo-1591604129939-f1efa4d9f7fa']
            ];
        @endphp

        @foreach($facilities as $f)
        <div class="group bg-white rounded-[2.5rem] overflow-hidden border border-gray-100 hover:shadow-2xl transition-all duration-500">
            <div class="relative h-72 overflow-hidden">
                <img src="{{ $f['img'] }}?auto=format&fit=crop&w=800&q=80" 
                     class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 grayscale-[30%] group-hover:grayscale-0" alt="{{ $f['title'] }}">
                <div class="absolute inset-0 bg-gradient-to-t from-gray-900/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="absolute bottom-6 left-6 flex items-center gap-3 translate-y-10 group-hover:translate-y-0 transition-transform duration-500">
                    <span class="bg-[#48c3d9] text-gray-900 text-[10px] font-black uppercase px-4 py-1.5 rounded-full">Explore Space</span>
                </div>
            </div>
            <div class="p-10">
                <div class="text-4xl mb-6 transform group-hover:-rotate-12 transition-transform duration-300 inline-block">{{ $f['emoji'] }}</div>
                <h3 class="text-2xl font-black text-gray-900 mb-4 tracking-tighter uppercase">{{ $f['title'] }}</h3>
                <p class="text-gray-500 leading-relaxed text-sm">
                    {{ $f['desc'] }}
                </p>
                <div class="mt-8 pt-8 border-t border-gray-50 flex items-center justify-between">
                    <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Available for Students</span>
                    <div class="w-8 h-8 rounded-full border border-gray-100 flex items-center justify-center text-gray-300 group-hover:bg-gray-900 group-hover:text-white transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="bg-[#48c3d9] rounded-[3.5rem] p-12 md:p-20 text-center relative overflow-hidden shadow-2xl shadow-[#48c3d9]/30">
        <div class="absolute top-0 left-0 w-full h-full opacity-10" style="background-image: url('https://www.transparenttextures.com/patterns/carbon-fibre.png');"></div>
        <div class="absolute -top-24 -right-24 w-96 h-96 bg-white/20 rounded-full blur-3xl"></div>
        
        <div class="relative z-10">
            <h2 class="text-4xl md:text-5xl font-black text-gray-900 mb-6 uppercase tracking-tighter">Ingin Melihat Lebih Dekat?</h2>
            <p class="text-gray-900/70 text-lg mb-10 max-w-2xl mx-auto font-medium leading-relaxed">
                Kami mengundang Anda untuk melakukan kunjungan langsung atau menjelajahi kampus kami melalui tur virtual 360 derajat.
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="#" class="bg-gray-900 text-white px-10 py-4 rounded-full font-bold uppercase text-xs tracking-[0.2em] shadow-xl hover:scale-105 transition-transform">
                    Mulai Tur Virtual
                </a>
                <a href="#" class="bg-white/20 backdrop-blur-md border border-white/30 text-gray-900 px-10 py-4 rounded-full font-bold uppercase text-xs tracking-[0.2em] hover:bg-white transition-colors">
                    Reservasi Kunjungan
                </a>
            </div>
        </div>
    </div>

</div>

@endsection