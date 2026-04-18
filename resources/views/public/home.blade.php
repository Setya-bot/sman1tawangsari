@extends('public.layouts.main')

@section('title', 'Beranda')

@section('content')

<section x-data="{ active: 0, loop() { setInterval(() => { this.active = (this.active + 1) % {{ count($carousels) }} }, 6000) } }" 
         x-init="loop"
         class="relative w-full h-[90vh] md:h-screen overflow-hidden bg-gray-900">

    @foreach($carousels as $key => $carousel)
    <div x-show="active === {{ $key }}" 
         x-transition:enter="transition ease-out duration-1000"
         x-transition:enter-start="opacity-0 scale-105"
         x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-1000"
         x-transition:leave-start="opacity-100 shadow-xl"
         x-transition:leave-end="opacity-0"
         class="absolute inset-0">

        <div class="absolute inset-0 bg-cover bg-center transition-transform duration-[10000ms] transform scale-110"
             :class="active === {{ $key }} ? 'scale-100' : 'scale-110'"
             style="background-image: url('{{ $carousel->image_url }}')">
        </div>

        <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/40 to-transparent"></div>

        <div class="relative z-10 flex flex-col justify-center items-center h-full text-center text-white px-6">
            <span class="inline-block px-4 py-1.5 mb-4 text-xs font-bold tracking-widest uppercase bg-blue-600 rounded-full italic animate-bounce">
                Welcome to Our School
            </span>
            <h1 class="text-5xl md:text-7xl font-extrabold mb-6 leading-tight max-w-4xl">
                {{ $carousel->title ?? $profile->school_name }}
            </h1>

            <p class="text-lg md:text-xl mb-10 text-gray-200 max-w-2xl font-light leading-relaxed">
                {{ $carousel->description ?? $profile->motto }}
            </p>

            <div class="flex flex-col sm:flex-row gap-4">
                @if($carousel->link)
                <a href="{{ $carousel->link }}"
                   class="bg-blue-600 text-white px-8 py-4 rounded-xl font-bold hover:bg-blue-700 transition-all transform hover:scale-105 shadow-lg shadow-blue-500/30">
                    Eksplorasi Sekarang
                </a>
                @endif
                <a href="#program" class="bg-white/10 backdrop-blur-md text-white border border-white/20 px-8 py-4 rounded-xl font-bold hover:bg-white/20 transition-all">
                    Program Kami
                </a>
            </div>
        </div>
    </div>
    @endforeach

    <div class="absolute bottom-10 left-1/2 -translate-x-1/2 z-20 flex gap-3">
        @foreach($carousels as $key => $carousel)
        <button @click="active = {{ $key }}" 
                :class="active === {{ $key }} ? 'w-8 bg-blue-500' : 'w-2 bg-white/50'" 
                class="h-2 rounded-full transition-all duration-300"></button>
        @endforeach
    </div>
</section>

<section class="relative z-30 -mt-16 px-4">
    <div class="max-w-6xl mx-auto bg-white rounded-[2rem] shadow-2xl shadow-blue-900/10 p-8 md:p-12 grid grid-cols-2 md:grid-cols-4 gap-8 border border-gray-100">
        <div class="text-center border-r border-gray-100 last:border-0">
            <div class="text-3xl md:text-4xl font-black text-blue-600">1.2K+</div>
            <p class="text-gray-500 text-sm font-medium uppercase tracking-wider">Siswa Aktif</p>
        </div>
        <div class="text-center border-r border-gray-100 last:border-0">
            <div class="text-3xl md:text-4xl font-black text-blue-600">90+</div>
            <p class="text-gray-500 text-sm font-medium uppercase tracking-wider">Tenaga Ahli</p>
        </div>
        <div class="text-center border-r border-gray-100 last:border-0">
            <div class="text-3xl md:text-4xl font-black text-blue-600">45+</div>
            <p class="text-gray-500 text-sm font-medium uppercase tracking-wider">Ekstrakurikuler</p>
        </div>
        <div class="text-center last:border-0">
            <div class="text-3xl md:text-4xl font-black text-blue-600">100%</div>
            <p class="text-gray-500 text-sm font-medium uppercase tracking-wider">Terakreditasi A</p>
        </div>
    </div>
</section>

<section id="program" class="py-24 bg-white overflow-hidden">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-4">
            <div class="text-left">
                <span class="text-blue-600 font-bold tracking-widest uppercase text-sm">Our Excellence</span>
                <h2 class="text-4xl md:text-5xl font-black text-gray-900 mt-2">Program Unggulan</h2>
            </div>
            <p class="text-gray-500 max-w-md text-lg">Membangun generasi masa depan dengan kurikulum yang relevan dan fasilitas kelas dunia.</p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <div class="group p-10 rounded-[2.5rem] bg-gray-50 hover:bg-blue-600 transition-all duration-500 shadow-sm hover:shadow-2xl hover:shadow-blue-500/40">
                <div class="w-16 h-16 bg-blue-100 text-blue-600 rounded-2xl flex items-center justify-center mb-8 group-hover:bg-white/20 group-hover:text-white transition-colors">
                    <i class="fas fa-laptop-code text-2xl"></i>
                </div>
                <h3 class="text-2xl font-bold mb-4 group-hover:text-white transition-colors">Digital Innovation</h3>
                <p class="text-gray-600 group-hover:text-blue-50/80 leading-relaxed transition-colors">Pembelajaran berbasis teknologi, coding, dan robotika sejak dini.</p>
            </div>

            <div class="group p-10 rounded-[2.5rem] bg-gray-50 hover:bg-emerald-600 transition-all duration-500 shadow-sm hover:shadow-2xl hover:shadow-emerald-500/40">
                <div class="w-16 h-16 bg-emerald-100 text-emerald-600 rounded-2xl flex items-center justify-center mb-8 group-hover:bg-white/20 group-hover:text-white transition-colors">
                    <i class="fas fa-globe-asia text-2xl"></i>
                </div>
                <h3 class="text-2xl font-bold mb-4 group-hover:text-white transition-colors">Global Insights</h3>
                <p class="text-gray-600 group-hover:text-emerald-50/80 leading-relaxed transition-colors">Kurikulum internasional dengan fokus pada penguasaan bahasa asing.</p>
            </div>

            <div class="group p-10 rounded-[2.5rem] bg-gray-50 hover:bg-amber-500 transition-all duration-500 shadow-sm hover:shadow-2xl hover:shadow-amber-500/40">
                <div class="w-16 h-16 bg-amber-100 text-amber-600 rounded-2xl flex items-center justify-center mb-8 group-hover:bg-white/20 group-hover:text-white transition-colors">
                    <i class="fas fa-palette text-2xl"></i>
                </div>
                <h3 class="text-2xl font-bold mb-4 group-hover:text-white transition-colors">Creative Arts</h3>
                <p class="text-gray-600 group-hover:text-amber-50/80 leading-relaxed transition-colors">Wadah ekspresi seni dan pengembangan karakter kepemimpinan.</p>
            </div>
        </div>
    </div>
</section>

<section class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-4xl font-black text-center mb-16">Momen Berharga</h2>
        
        <div class="columns-1 md:columns-3 gap-6 space-y-6">
            <div class="relative overflow-hidden rounded-3xl group">
                <img src="https://images.unsplash.com/photo-1523050853063-bd8012fec047?q=80&w=800" class="w-full grayscale hover:grayscale-0 transition duration-700 transform group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity p-6 flex items-end">
                    <p class="text-white font-bold">Kegiatan Belajar Mengajar</p>
                </div>
            </div>
            <div class="relative overflow-hidden rounded-3xl group">
                <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?q=80&w=800" class="w-full grayscale hover:grayscale-0 transition duration-700 transform group-hover:scale-110">
            </div>
            <div class="relative overflow-hidden rounded-3xl group">
                <img src="https://images.unsplash.com/photo-1577896851231-70ef18881754?q=80&w=800" class="w-full grayscale hover:grayscale-0 transition duration-700 transform group-hover:scale-110">
            </div>
        </div>
    </div>
</section>

<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex justify-between items-center mb-16">
            <h2 class="text-4xl font-black text-gray-900">Berita Terkini</h2>
            <a href="#" class="text-blue-600 font-bold hover:underline flex items-center gap-2">
                Lihat Semua <i class="fas fa-arrow-right text-sm"></i>
            </a>
        </div>

        <div class="grid md:grid-cols-3 gap-10">
            @for($i=0; $i<3; $i++)
            <article class="group cursor-pointer">
                <div class="relative h-64 mb-6 overflow-hidden rounded-[2rem]">
                    <img src="https://images.unsplash.com/photo-1546410531-bb4caa6b424d?q=80&w=600" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                    <div class="absolute top-4 left-4 bg-white/90 backdrop-blur px-4 py-1 rounded-full text-xs font-bold text-blue-600">
                        Pendidikan
                    </div>
                </div>
                <div class="px-2">
                    <time class="text-gray-400 text-sm">April 16, 2026</time>
                    <h3 class="text-2xl font-bold mt-2 group-hover:text-blue-600 transition-colors">Penerimaan Siswa Baru Tahun Ajaran 2026/2027 Telah Dibuka</h3>
                    <p class="text-gray-500 mt-4 line-clamp-2">Segera daftarkan putra-putri anda untuk mendapatkan pendidikan terbaik dengan fasilitas yang memadai...</p>
                </div>
            </article>
            @endfor
        </div>
    </div>
</section>

@endsection