@extends('public.layouts.main')

@section('title', 'Kesiswaan - SMA Negeri 1 Tawangsari')

@section('content')
    <div class="relative h-[65vh] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1541339907198-e08756ebafe3?ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80')] bg-cover bg-center"></div>
        <div class="absolute inset-0 bg-gradient-to-tr from-gray-900 via-gray-900/70 to-transparent"></div>
        
        <div class="relative z-10 text-left px-6 max-w-7xl mx-auto w-full">
            <div class="max-w-3xl">
                <span class="inline-block px-4 py-1.5 bg-[#48c3d9] text-gray-900 text-xs font-bold uppercase tracking-widest rounded-md mb-6">
                    Kesiswaan
                </span>
                <h1 class="text-5xl md:text-7xl font-extrabold text-white leading-tight mb-6">
                    Pembinaan <span class="text-[#48c3d9]">Siswa</span>
                </h1>
                <p class="text-lg md:text-xl text-white/80 font-light leading-relaxed border-l-4 border-[#48c3d9] pl-6">
                    Mewujudkan lingkungan belajar yang kondusif melalui sistem pembinaan karakter dan layanan pendukung perkembangan siswa yang prima.
                </p>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-6 py-20">

        <div class="grid md:grid-cols-3 gap-8 mb-32">
            @foreach([
                ['icon' => '🛡️', 'title' => 'Pembinaan Karakter', 'desc' => 'Menanamkan nilai budi pekerti, kedisiplinan, dan etika melalui program Profil Pelajar Pancasila.'],
                ['icon' => '🤝', 'title' => 'Layanan Kesejahteraan', 'desc' => 'Mengelola beasiswa, jaminan kesehatan sekolah, dan dukungan fasilitas pendukung belajar siswa.'],
                ['icon' => '📈', 'title' => 'Pengembangan Diri', 'desc' => 'Memfasilitasi pemetaan minat dan bakat siswa sejak dini untuk kesuksesan akademik dan non-akademik.']
            ] as $item)
            <div class="bg-white p-8 rounded-[2rem] border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-300">
                <div class="text-4xl mb-6">{{ $item['icon'] }}</div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $item['title'] }}</h3>
                <p class="text-gray-600 leading-relaxed">{{ $item['desc'] }}</p>
            </div>
            @endforeach
        </div>

        <div>
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Budaya Sekolah & Kedisiplinan</h2>
                <div class="w-24 h-1 bg-[#48c3d9] mx-auto rounded-full"></div>
            </div>

            <div class="grid md:grid-cols-2 gap-12">
                <div class="bg-white border border-gray-100 rounded-[2.5rem] p-10 hover:shadow-xl transition-all">
                    <h3 class="text-2xl font-bold text-gray-900 mb-8 flex items-center gap-3">
                        <span class="p-2 bg-[#48c3d9]/10 rounded-lg">📋</span> Kode Etik Siswa
                    </h3>
                    <div class="space-y-6">
                        @foreach([
                            '01' => 'Menjunjung tinggi nilai kejujuran akademik dalam setiap evaluasi dan tugas.',
                            '02' => 'Menerapkan budaya 5S (Salam, Senyum, Sapa, Sopan, Santun) di lingkungan sekolah.',
                            '03' => 'Mematuhi regulasi atribut seragam sesuai dengan hari yang ditentukan.',
                            '04' => 'Berpartisipasi aktif dalam menjaga kebersihan dan keamanan fasilitas sekolah.'
                        ] as $number => $text)
                        <div class="flex gap-4">
                            <div class="flex-shrink-0 w-8 h-8 bg-gray-900 text-white rounded-full flex items-center justify-center font-bold text-sm">{{ $number }}</div>
                            <p class="text-gray-600 font-medium">{{ $text }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="bg-gray-900 text-white rounded-[2.5rem] p-10 shadow-2xl">
                    <h3 class="text-2xl font-bold mb-8 flex items-center gap-3">
                        <span class="p-2 bg-white/10 rounded-lg text-[#48c3d9]">⏰</span> Sistem Kehadiran
                    </h3>
                    <div class="space-y-8">
                        <div>
                            <p class="text-[#48c3d9] font-bold mb-2">Batas Keterlambatan</p>
                            <p class="text-gray-400 text-sm leading-relaxed">Siswa wajib hadir di kelas maksimal pukul 07:00 WIB. Keterlambatan tanpa keterangan sah akan diproses melalui piket kesiswaan.</p>
                        </div>
                        <div>
                            <p class="text-[#48c3d9] font-bold mb-2">Izin & Ketidakhadiran</p>
                            <p class="text-gray-400 text-sm leading-relaxed">Surat izin sakit atau keperluan keluarga harus diserahkan kepada wali kelas paling lambat 1x24 jam setelah ketidakhadiran.</p>
                        </div>
                        <div class="pt-6 border-t border-white/10 text-center">
                            <p class="text-xs text-gray-500 italic">Disiplin adalah kunci sukses masa depan.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection