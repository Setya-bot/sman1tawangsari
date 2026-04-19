@extends('public.layouts.main')

@section('title', 'Detail Sarana - ' . ucfirst($slug))

@section('content')

<div class="max-w-5xl mx-auto px-6 py-20">

    <a href="{{ route('sarana') }}" class="inline-flex items-center text-[#48c3d9] mb-8 hover:underline">
        ← Kembali ke Sarana & Prasarana
    </a>

    <div class="grid lg:grid-cols-12 gap-12">

        <!-- Gambar Besar -->
        <div class="lg:col-span-7">
            <img src="https://source.unsplash.com/1200x800/?{{ $slug }},school,facility" 
                 class="w-full rounded-3xl shadow-xl" alt="{{ ucfirst($slug) }}">
        </div>

        <!-- Informasi Detail -->
        <div class="lg:col-span-5">
            <h1 class="text-4xl font-bold text-gray-900 mb-6">
                @if($slug == 'laboratorium') Laboratorium Modern
                @elseif($slug == 'perpustakaan') Perpustakaan Digital & Fisik
                @elseif($slug == 'olahraga') Lapangan Olahraga Standar Nasional
                @elseif($slug == 'ruang-kelas') Ruang Kelas Nyaman & Modern
                @elseif($slug == 'aula') Aula Serbaguna
                @elseif($slug == 'musholla') Musholla yang Nyaman
                @endif
            </h1>

            <div class="prose prose-lg text-gray-600">
                @if($slug == 'laboratorium')
                    <p>Kami memiliki 3 laboratorium IPA yang dilengkapi peralatan lengkap dan modern, 2 laboratorium komputer, serta 1 laboratorium bahasa. Semua laboratorium digunakan untuk mendukung pembelajaran praktikum siswa secara optimal.</p>
                @elseif($slug == 'perpustakaan')
                    <p>Perpustakaan kami memiliki koleksi lebih dari 15.000 buku fisik dan ribuan e-book serta jurnal online. Ruang baca yang nyaman dan akses digital membuat siswa semakin gemar membaca dan mencari referensi.</p>
                @elseif($slug == 'olahraga')
                    <p>Lapangan olahraga kami mencakup lapangan basket, voli, futsal, dan lintasan atletik dengan standar nasional. Fasilitas ini mendukung kegiatan ekstrakurikuler olahraga siswa.</p>
                @elseif($slug == 'ruang-kelas')
                    <p>36 ruang kelas ber-AC dengan LCD projector, sound system, dan smart board untuk mendukung pembelajaran interaktif dan nyaman.</p>
                @elseif($slug == 'aula')
                    <p>Aula serbaguna berkapasitas 500 orang digunakan untuk upacara, pentas seni, seminar, dan berbagai kegiatan sekolah lainnya.</p>
                @elseif($slug == 'musholla')
                    <p>Musholla yang luas dan bersih dengan kapasitas 200 jamaah, mendukung kegiatan ibadah siswa dan guru sehari-hari.</p>
                @endif
            </div>

            <div class="mt-12 pt-8 border-t">
                <h4 class="font-semibold text-gray-900 mb-4">Fasilitas Pendukung</h4>
                <ul class="grid grid-cols-2 gap-3 text-sm">
                    <li class="flex items-center gap-2"><span class="text-[#48c3d9]">✔</span> AC & Ventilasi Baik</li>
                    <li class="flex items-center gap-2"><span class="text-[#48c3d9]">✔</span> Keamanan 24 Jam</li>
                    <li class="flex items-center gap-2"><span class="text-[#48c3d9]">✔</span> Kebersihan Terjaga</li>
                    <li class="flex items-center gap-2"><span class="text-[#48c3d9]">✔</span> Akses Mudah</li>
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection