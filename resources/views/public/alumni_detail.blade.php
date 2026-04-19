@extends('public.layouts.main')

@section('title', 'Detail Alumni - SMA Negeri 1 Tawangsari')

@section('content')

{{-- HERO --}}
<div class="relative h-[60vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1523580846011-d3a5bc25702b')] bg-cover bg-center"></div>
    <div class="absolute inset-0 bg-gradient-to-tr from-gray-900 via-gray-900/80 to-transparent"></div>

    <div class="relative z-10 px-6 max-w-7xl mx-auto w-full">
        <div class="max-w-3xl">
            <span class="inline-block px-4 py-1.5 bg-[#48c3d9] text-gray-900 text-xs font-bold uppercase tracking-widest rounded-md mb-6">
                Profil Alumni
            </span>
            <h1 class="text-5xl font-extrabold text-white mb-4">
                {{ $alumni->nama ?? 'Nama Alumni' }}
            </h1>
            <p class="text-white/80 border-l-4 border-[#48c3d9] pl-4">
                Lulusan Tahun {{ $alumni->tahun_lulus ?? '2020' }}
            </p>
        </div>
    </div>
</div>

<div class="max-w-7xl mx-auto px-6 py-16">

    <div class="grid lg:grid-cols-3 gap-10">

        {{-- FOTO + INFO --}}
        <div class="bg-white rounded-3xl shadow border p-6 text-center">
            <img src="{{ $alumni->foto ?? 'https://ui-avatars.com/api/?name=Alumni&background=f3f4f6&color=48c3d9&size=512' }}" 
                 class="w-full aspect-[3/4] object-cover rounded-2xl mb-6">

            <h3 class="text-xl font-bold text-gray-900">{{ $alumni->nama ?? '-' }}</h3>
            <p class="text-[#48c3d9] font-bold text-sm mb-4">
                {{ $alumni->pekerjaan ?? 'Mahasiswa / Profesional' }}
            </p>

            <div class="space-y-2 text-sm text-gray-600">
                <p><strong>NISN:</strong> {{ $alumni->nisn ?? '-' }}</p>
                <p><strong>Email:</strong> {{ $alumni->email ?? '-' }}</p>
                <p><strong>No HP:</strong> {{ $alumni->no_hp ?? '-' }}</p>
            </div>
        </div>

        {{-- DETAIL --}}
        <div class="lg:col-span-2 space-y-10">

            {{-- BIODATA --}}
            <div class="bg-white rounded-3xl shadow border p-8">
                <h3 class="text-xl font-bold mb-6">Biodata</h3>

                <div class="grid md:grid-cols-2 gap-4 text-sm">
                    <p><strong>Tempat, Tanggal Lahir:</strong><br>{{ $alumni->ttl ?? '-' }}</p>
                    <p><strong>Jenis Kelamin:</strong><br>{{ $alumni->jk ?? '-' }}</p>
                    <p><strong>Alamat:</strong><br>{{ $alumni->alamat ?? '-' }}</p>
                    <p><strong>Tahun Masuk:</strong><br>{{ $alumni->tahun_masuk ?? '-' }}</p>
                </div>
            </div>

            {{-- RIWAYAT --}}
            <div class="bg-white rounded-3xl shadow border p-8">
                <h3 class="text-xl font-bold mb-6">Riwayat Pendidikan / Karier</h3>

                <div class="space-y-6 text-sm">
                    @foreach($alumni->riwayat ?? [] as $r)
                    <div class="border-l-4 border-[#48c3d9] pl-4">
                        <p class="font-bold text-gray-900">{{ $r['tahun'] }}</p>
                        <p class="text-gray-600">{{ $r['keterangan'] }}</p>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- TESTIMONI --}}
            <div class="bg-gray-900 text-white rounded-3xl p-8">
                <h3 class="text-xl font-bold mb-4">Testimoni Alumni</h3>
                <p class="text-gray-300 italic">
                    "{{ $alumni->testimoni ?? 'Sekolah ini memberikan pengalaman belajar yang luar biasa dan membentuk karakter saya hingga saat ini.' }}"
                </p>
            </div>

        </div>
    </div>

    {{-- BACK BUTTON --}}
    <div class="mt-12 text-center">
        <a href="{{ route('alumni.index') }}" 
           class="inline-block px-6 py-3 bg-[#48c3d9] text-gray-900 font-bold rounded-xl hover:bg-gray-900 hover:text-white transition">
            ← Kembali ke Alumni
        </a>
    </div>

</div>

@endsection