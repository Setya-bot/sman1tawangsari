@extends('public.layouts.main')

@section('title', 'Beranda')

@section('content')

    <!-- ==================== CAROUSEL HERO ==================== -->
<section x-data="{ 
        current: 0,
        total: {{ count($carousels) }},
        next() { this.current = (this.current + 1) % this.total },
        prev() { this.current = (this.current - 1 + this.total) % this.total }
    }" 
    x-init="setInterval(() => { next() }, 6000)"
    class="relative w-full h-[80vh] md:h-[85vh] overflow-hidden bg-gray-900 isolate z-0">

    @foreach($carousels as $key => $carousel)
        <div x-show="current === {{ $key }}" 
            x-transition:enter="transition-all duration-1000 ease-out"
            x-transition:enter-start="opacity-0 scale-105" 
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition-all duration-1000 ease-in" 
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" 
            class="absolute inset-0">

            <div class="absolute inset-0">
                <img src="{{ $carousel->image_url }}" class="w-full h-full object-cover" alt="Carousel Image" />
                <div class="absolute inset-0 bg-gradient-to-r from-black/80 via-black/40 to-transparent"></div>
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
            </div>

            <div class="relative h-full max-w-7xl mx-auto px-6 flex items-center">
                <div class="max-w-3xl">
                    <span x-transition:enter="transition-all delay-300 duration-700"
                          x-transition:enter-start="opacity-0 translate-y-4"
                          x-transition:enter-end="opacity-100 translate-y-0"
                          class="inline-block px-4 py-1.5 bg-[#48c3d9] text-gray-900 text-xs font-bold uppercase tracking-widest rounded-md mb-6">
                        SMA N 1 TAWANGSARI
                    </span>

                    <h1 x-transition:enter="transition-all delay-500 duration-700"
                        x-transition:enter-start="opacity-0 translate-y-4"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        class="text-4xl md:text-7xl font-extrabold text-white leading-tight mb-6">
                        {{ $carousel->title ?? $profile->school_name ?? 'SMA Negeri 1 Tawangsari' }}
                    </h1>

                    <p x-transition:enter="transition-all delay-700 duration-700"
                       x-transition:enter-start="opacity-0 translate-y-4"
                       x-transition:enter-end="opacity-100 translate-y-0"
                       class="text-lg md:text-xl text-white/90 font-light leading-relaxed mb-8 max-w-2xl">
                        {{ $carousel->description ?? $profile->motto ?? 'Membentuk Generasi Berkarakter, Berprestasi, dan Berintegritas' }}
                    </p>

                    @if($carousel->link)
                    <div x-transition:enter="transition-all delay-900 duration-700"
                         x-transition:enter-start="opacity-0 translate-y-4"
                         x-transition:enter-end="opacity-100 translate-y-0">
                        <a href="{{ $carousel->link }}"
                            class="inline-block bg-[#48c3d9] hover:bg-[#3ab5cc] text-gray-900 px-8 py-4 rounded-2xl font-bold transition-all shadow-lg shadow-[#48c3d9]/20 transform hover:-translate-y-1">
                            Pelajari Lebih Lanjut
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    @endforeach

    <div class="absolute bottom-10 left-6 z-30 flex gap-3">
        @foreach($carousels as $key => $carousel)
            <button @click="current = {{ $key }}" 
                :class="current === {{ $key }} ? 'bg-[#48c3d9] w-12' : 'bg-white/40 w-3 hover:bg-white/60'"
                class="h-1.5 rounded-full transition-all duration-500"></button>
        @endforeach
    </div>

    <div class="absolute bottom-10 right-10 z-30 hidden md:block">
        <div class="flex items-center gap-4 text-white/40 rotate-90 origin-right">
            <span class="text-xs font-bold tracking-widest uppercase">Scroll Down</span>
            <div class="w-12 h-[1px] bg-white/40"></div>
        </div>
    </div>
</section>

    <!-- ==================== STATISTIK ==================== -->
    <section class="relative mt-12 px-6 pb-12">
        <div
            class="max-w-6xl mx-auto bg-white rounded-3xl shadow-2xl shadow-gray-200/80 p-10 md:p-14 grid grid-cols-2 md:grid-cols-4 gap-10 border border-gray-100">
            <div class="text-center">
                <div class="text-5xl font-bold text-[#48c3d9]">1.080</div>
                <p class="text-gray-500 mt-2 font-medium">Siswa Aktif</p>
            </div>
            <div class="text-center">
                <div class="text-5xl font-bold text-[#48c3d9]">60</div>
                <p class="text-gray-500 mt-2 font-medium">Guru & Staff</p>
            </div>
            <div class="text-center">
                <div class="text-5xl font-bold text-[#48c3d9]">36</div>
                <p class="text-gray-500 mt-2 font-medium">Rombel</p>
            </div>
            <div class="text-center">
                <div class="text-5xl font-bold text-[#48c3d9]">A</div>
                <p class="text-gray-500 mt-2 font-medium">Akreditasi Unggul</p>
            </div>
        </div>
    </section>

    <!-- ==================== PROGRAM UNGGULAN ==================== -->
    <section id="program" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <span class="text-[#48c3d9] font-bold uppercase tracking-widest">Program Unggulan</span>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mt-3">Apa yang Kami Tawarkan</h2>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="group bg-gray-50 hover:bg-[#48c3d9] p-10 rounded-3xl transition-all duration-500">
                    <div
                        class="w-16 h-16 bg-white group-hover:bg-white/20 rounded-2xl flex items-center justify-center mb-8 text-3xl transition-colors">
                        💻
                    </div>
                    <h3 class="text-2xl font-bold mb-4 group-hover:text-white transition-colors">Digital & STEM</h3>
                    <p class="text-gray-600 group-hover:text-white/80 transition-colors">Coding, Robotika, dan pembelajaran
                        berbasis teknologi modern.</p>
                </div>

                <div class="group bg-gray-50 hover:bg-[#48c3d9] p-10 rounded-3xl transition-all duration-500">
                    <div
                        class="w-16 h-16 bg-white group-hover:bg-white/20 rounded-2xl flex items-center justify-center mb-8 text-3xl transition-colors">
                        🌍
                    </div>
                    <h3 class="text-2xl font-bold mb-4 group-hover:text-white transition-colors">Global Perspective</h3>
                    <p class="text-gray-600 group-hover:text-white/80 transition-colors">Kurikulum Merdeka dengan pendekatan
                        internasional.</p>
                </div>

                <div class="group bg-gray-50 hover:bg-[#48c3d9] p-10 rounded-3xl transition-all duration-500">
                    <div
                        class="w-16 h-16 bg-white group-hover:bg-white/20 rounded-2xl flex items-center justify-center mb-8 text-3xl transition-colors">
                        🎨
                    </div>
                    <h3 class="text-2xl font-bold mb-4 group-hover:text-white transition-colors">Seni & Karakter</h3>
                    <p class="text-gray-600 group-hover:text-white/80 transition-colors">Pengembangan seni, olahraga, dan
                        karakter kepemimpinan.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== GALERI (placeholder) ==================== -->
    <section class="py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-4xl font-bold text-center mb-12">Berita Terkini</h2>
            <!-- Tambahkan galeri di sini nanti -->
        </div>
    </section>

@endsection