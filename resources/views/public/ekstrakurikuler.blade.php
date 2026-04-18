@extends('public.layouts.main')

@section('title', 'Ekstrakurikuler - SMA Negeri 1 Tawangsari')

@section('content')

    <!-- Hero Header -->
    <div class="relative h-[75vh] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 bg-[url('https://source.unsplash.com/1920x1080/?students,extracurricular,activity')] bg-cover bg-center"></div>
        <div class="absolute inset-0 bg-gradient-to-b from-black/70 via-black/60 to-black/80"></div>
        
        <div class="relative z-10 text-center px-6 max-w-4xl mx-auto">
            <span class="inline-block px-6 py-2 bg-white/20 backdrop-blur-md text-white text-sm font-medium rounded-full mb-6">
                Pengembangan Diri
            </span>
            <h1 class="text-5xl md:text-7xl font-bold text-white tracking-tight mb-6">
                Ekstrakurikuler
            </h1>
            <p class="text-xl text-white/90 max-w-2xl mx-auto">
                Pilih kegiatan sesuai minat dan bakat untuk mengembangkan potensi diri siswa
            </p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-6 py-20">

        <!-- Pengantar -->
        <div class="max-w-3xl mx-auto text-center mb-16">
            <h2 class="text-4xl font-semibold text-gray-900 mb-6">Ekstrakurikuler SMA Negeri 1 Tawangsari</h2>
            <p class="text-lg text-gray-600 leading-relaxed">
                Kami menyediakan beragam kegiatan ekstrakurikuler yang dirancang untuk mengembangkan bakat, minat, 
                kepemimpinan, kreativitas, serta karakter siswa di luar jam pelajaran.
            </p>
        </div>

        <!-- Daftar Ekstrakurikuler -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            @foreach($extras as $ekskul)
            <a href="{{ route('ekstrakurikuler.detail', $ekskul->id) }}"
            class="group bg-white border border-gray-100 rounded-3xl p-8 hover:border-emerald-200 hover:shadow-xl transition-all duration-300 block">

                <div class="text-6xl mb-6">
                    🎯
                </div>

                <h3 class="text-2xl font-semibold text-gray-900 mb-3">
                    {{ $ekskul->name }}
                </h3>

                <p class="text-gray-600">
                    {{ Str::limit($ekskul->description, 100) }}
                </p>

            </a>
            @endforeach

        </div>

        <!-- Catatan -->
        <div class="mt-20 bg-emerald-50 border border-emerald-100 rounded-3xl p-10 text-center">
            <h3 class="text-2xl font-semibold text-emerald-800 mb-4">Informasi Penting</h3>
            <p class="text-emerald-700 max-w-2xl mx-auto">
                Pendaftaran ekstrakurikuler biasanya dibuka di awal tahun pelajaran. 
                Siswa kelas X diwajibkan mengikuti Pramuka. Untuk ekstrakurikuler lain, siswa dapat memilih sesuai minat dan bakat masing-masing.
            </p>
        </div>

    </div>

@endsection