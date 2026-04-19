@extends('public.layouts.main')

@section('title', 'SPMB - SMA Negeri 1 Tawangsari')

@section('content')

{{-- HERO --}}
<div class="relative h-[65vh] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1588072432836-e10032774350')] bg-cover bg-center"></div>
    <div class="absolute inset-0 bg-gradient-to-tr from-gray-900 via-gray-900/70 to-transparent"></div>

    <div class="relative z-10 px-6 max-w-7xl mx-auto w-full">
        <div class="max-w-3xl">
            <span class="inline-block px-4 py-1.5 bg-[#48c3d9] text-gray-900 text-xs font-bold uppercase tracking-widest rounded-md mb-6">
                SPMB 2026/2027
            </span>
            <h1 class="text-5xl md:text-7xl font-extrabold text-white leading-tight mb-6">
                Penerimaan <span class="text-[#48c3d9]">Murid Baru</span>
            </h1>
            <p class="text-lg text-white/80 border-l-4 border-[#48c3d9] pl-6">
                Bergabunglah bersama SMA Negeri 1 Tawangsari dan wujudkan masa depan akademik serta karier Anda.
            </p>

            <a href="#" class="inline-block mt-6 px-6 py-3 bg-[#48c3d9] text-gray-900 font-bold rounded-xl hover:bg-white transition">
                Daftar Sekarang →
            </a>
        </div>
    </div>
</div>

<div class="max-w-7xl mx-auto px-6 py-16">

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 relative z-10">
        @foreach([
            ['icon' => '📍', 'title' => 'Zonasi', 'desc' => 'Berdasarkan jarak tempat tinggal siswa ke sekolah.'],
            ['icon' => '🏆', 'title' => 'Prestasi', 'desc' => 'Berdasarkan jarak tempat tinggal siswa ke sekolah.'],
            ['icon' => '🤝', 'title' => 'Afirmasi', 'desc' => 'Berdasarkan jarak tempat tinggal siswa ke sekolah.'],
            ] as $keunggulan)
        <div class="group bg-white p-8 mb-16 rounded-[2.5rem] border border-gray-100 hover:border-[#48c3d9] hover:shadow-2xl hover:shadow-[#48c3d9]/10 transition-all duration-500 shadow-lg">
            <div class="w-16 h-16 bg-gray-50 rounded-2xl flex items-center justify-center text-3xl mb-6 group-hover:bg-[#48c3d9]/10 group-hover:scale-110 transition-all duration-500">
                {{ $keunggulan['icon'] }}
            </div>
            <h3 class="text-xl font-bold text-gray-900 mb-1">{{ $keunggulan['title'] }}</h3>
            <p class="text-sm text-gray-500 mb-3">{{ $keunggulan['desc'] }}</p>
            <div class="h-1 w-12 bg-gray-100 group-hover:w-20 group-hover:bg-[#48c3d9] transition-all duration-500"></div>
        </div>
        @endforeach
    </div>
    
    {{-- KUOTA JALUR PENDAFTARAN --}}
    <div class="mb-20">
        <h2 class="text-3xl font-bold mb-8">Kuota Jalur Pendaftaran</h2>
        <div class="bg-gray-50 rounded-3xl p-8 space-y-6">
            
            {{-- Jalur Zonasi --}}
            <div class="flex justify-between items-center border-b border-gray-200 pb-4">
                <div>
                    <span class="block font-semibold text-lg">Jalur Zonasi</span>
                    <span class="text-sm text-gray-500">Domisili terdekat dengan sekolah</span>
                </div>
                <div class="text-right">
                    <span class="block font-bold text-xl text-blue-600">50%</span>
                    <span class="text-sm text-gray-500">180 Siswa</span>
                </div>
            </div>

            {{-- Jalur Afirmasi --}}
            <div class="flex justify-between items-center border-b border-gray-200 pb-4">
                <div>
                    <span class="block font-semibold text-lg">Jalur Afirmasi</span>
                    <span class="text-sm text-gray-500">Siswa kurang mampu & disabilitas</span>
                </div>
                <div class="text-right">
                    <span class="block font-bold text-xl text-blue-600">15%</span>
                    <span class="text-sm text-gray-500">54 Siswa</span>
                </div>
            </div>

            {{-- Jalur Prestasi --}}
            <div class="flex justify-between items-center border-b border-gray-200 pb-4">
                <div>
                    <span class="block font-semibold text-lg">Jalur Prestasi</span>
                    <span class="text-sm text-gray-500">Akademik & Non-Akademik</span>
                </div>
                <div class="text-right">
                    <span class="block font-bold text-xl text-blue-600">30%</span>
                    <span class="text-sm text-gray-500">108 Siswa</span>
                </div>
            </div>

            {{-- Jalur Perpindahan Tugas --}}
            <div class="flex justify-between items-center">
                <div>
                    <span class="block font-semibold text-lg">Perpindahan Tugas Ortu</span>
                    <span class="text-sm text-gray-500">Pindah tugas kerja/anak guru</span>
                </div>
                <div class="text-right">
                    <span class="block font-bold text-xl text-blue-600">5%</span>
                    <span class="text-sm text-gray-500">18 Siswa</span>
                </div>
            </div>

        </div>
    </div>

    {{-- SYARAT --}}
    <div class="mb-20">
        <h2 class="text-3xl font-bold mb-8">Syarat Pendaftaran</h2>
        <div class="grid md:grid-cols-2 gap-6">
            <ul class="bg-white p-6 rounded-2xl border space-y-2 text-sm">
                <li>• Ijazah / SKL</li>
                <li>• Kartu Keluarga</li>
                <li>• Akta Kelahiran</li>
                <li>• Pas Foto</li>
            </ul>
            <ul class="bg-white p-6 rounded-2xl border space-y-2 text-sm">
                <li>• Sertifikat Prestasi (jalur prestasi)</li>
                <li>• KIP / KKS (jalur afirmasi)</li>
                <li>• Surat Pernyataan</li>
            </ul>
        </div>
    </div>

    {{-- ALUR --}}
    <div class="mb-20">
        <h2 class="text-3xl font-bold mb-8">Alur Pendaftaran</h2>
        <div class="grid md:grid-cols-5 gap-4 text-center">
            @foreach([
                'Buat Akun',
                'Isi Formulir',
                'Upload Berkas',
                'Verifikasi',
                'Pengumuman'
            ] as $step)
            <div class="p-6 bg-white border rounded-2xl shadow-sm">
                <div class="text-xl font-bold mb-2">{{ $loop->iteration }}</div>
                <p class="text-sm">{{ $step }}</p>
            </div>
            @endforeach
        </div>
    </div>

    {{-- FORM CTA --}}
    <div class="bg-gray-900 text-white rounded-[2.5rem] p-12 mb-20 text-center">
        <h3 class="text-2xl font-bold mb-4">Mulai Pendaftaran Sekarang</h3>
        <p class="text-gray-400 mb-6">Isi formulir pendaftaran secara online dengan mudah dan cepat.</p>
        <a href="#" class="px-6 py-3 bg-[#48c3d9] text-gray-900 font-bold rounded-xl">
            Isi Formulir →
        </a>
    </div>

    {{-- KONTAK --}}
    <div class="bg-[#48c3d9] rounded-[2.5rem] p-12 text-center">
        <h3 class="text-2xl font-bold mb-4">Butuh Bantuan?</h3>
        <p class="mb-6">Hubungi panitia SPMB untuk informasi lebih lanjut</p>
        <p class="font-bold">(0271) 123-456</p>
        <p class="font-bold">spmb@sman1tawangsari.sch.id</p>
    </div>

</div>

@endsection