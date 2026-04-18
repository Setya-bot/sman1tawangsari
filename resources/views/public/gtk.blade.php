@extends('public.layouts.main')

@section('title', 'Guru & Tenaga Kependidikan - SMA Negeri 1 Tawangsari')

@section('content')

    <div class="relative h-[65vh] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1541339907198-e08756ebafe3?ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80')] bg-cover bg-center"></div>
        <div class="absolute inset-0 bg-gradient-to-tr from-gray-900 via-gray-900/70 to-transparent"></div>
        
        <div class="absolute -top-24 -right-24 w-96 h-96 bg-[#48c3d9]/20 rounded-full blur-3xl"></div>
        
        <div class="relative z-10 text-left px-6 max-w-7xl mx-auto w-full">
            <div class="max-w-3xl">
                <span class="inline-block px-4 py-1.5 bg-[#48c3d9] text-gray-900 text-xs font-bold uppercase tracking-widest rounded-md mb-6 shadow-lg shadow-[#48c3d9]/20">
                    Pengurus Sekolah
                </span>
                <h1 class="text-5xl md:text-7xl font-extrabold text-white leading-tight mb-6">
                    Guru & Tenaga <span class="text-[#48c3d9] relative">Kependidikan
                    </span>
                </h1>
                <p class="text-lg md:text-xl text-white/80 font-light leading-relaxed border-l-4 border-[#48c3d9] pl-6 border-l-4 border-[#48c3d9] pl-6">
                    Membangun masa depan melalui dedikasi 48 Guru Profesional & 12 Tenaga Kependidikan yang berkompetensi tinggi.
                </p>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-6 py-20">
        
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-24 relative z-10">
            @foreach([
                ['val' => '48', 'label' => 'Guru Profesional', 'sub' => 'Sertifikasi Pendidik', 'icon' => '👨‍🏫'],
                ['val' => '12', 'label' => 'Staff Tendik', 'sub' => 'Administrasi & IT', 'icon' => '🏢'],
                ['val' => '15+', 'label' => 'Tahun Mengajar', 'sub' => 'Rata-rata Pengalaman', 'icon' => '⏳'],
                ['val' => '100%', 'label' => 'Komitmen', 'sub' => 'Pelayanan Prima', 'icon' => '🌟']
            ] as $stat)
            <div class="bg-white/80 backdrop-blur-md rounded-3xl p-8 text-center border border-white shadow-xl hover:translate-y-[-5px] transition-all duration-300">
                <div class="text-3xl mb-2">{{ $stat['icon'] }}</div>
                <div class="text-4xl font-black text-gray-900">{{ $stat['val'] }}</div>
                <div class="text-gray-700 font-bold mt-2 text-sm uppercase tracking-tight">{{ $stat['label'] }}</div>
                <div class="text-[10px] text-[#48c3d9] font-bold uppercase mt-1 tracking-widest">{{ $stat['sub'] }}</div>
            </div>
            @endforeach
        </div>

        <div class="mb-32">
            <div class="flex items-center gap-6 mb-16">
                <h2 class="text-3xl font-bold text-gray-900 whitespace-nowrap uppercase tracking-tighter text-4xl">Dewan Pimpinan</h2>
                <div class="h-[2px] w-full bg-gray-100 relative">
                    <div class="absolute left-0 top-0 h-full w-24 bg-[#48c3d9]"></div>
                </div>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach([
                    ['nama' => 'Drs. Ahmad Suryanto, M.Pd.', 'jabatan' => 'Kepala Sekolah', 'nip' => '196505121990031002'],
                    ['nama' => 'Dra. Sri Wahyuni, M.Pd.', 'jabatan' => 'Wakasek Kurikulum', 'nip' => '196708151992032001'],
                    ['nama' => 'Drs. Budi Santoso, M.Pd.', 'jabatan' => 'Wakasek Kesiswaan', 'nip' => '196809201993031003'],
                    ['nama' => 'Drs. Hendra Wijaya, M.M.', 'jabatan' => 'Wakasek Sarpras', 'nip' => '196910051994031001']
                ] as $pimpinan)
                <div class="bg-white border border-gray-200 p-4 shadow-sm group hover:shadow-xl transition-all duration-300">
                    <div class="aspect-[3/4] overflow-hidden mb-6 relative">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($pimpinan['nama']) }}&background=f3f4f6&color=48c3d9&size=512" 
                             class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" 
                             alt="{{ $pimpinan['nama'] }}">
                        <div class="absolute inset-0 border-[12px] border-white opacity-20"></div>
                    </div>
                    <div class="text-center px-2 pb-4">
                        <h4 class="font-bold text-gray-900 leading-snug mb-2 min-h-[3rem] flex items-center justify-center">{{ $pimpinan['nama'] }}</h4>
                        <div class="h-px w-10 bg-[#48c3d9] mx-auto mb-3"></div>
                        <p class="text-[#48c3d9] text-[11px] font-black uppercase tracking-widest mb-3">{{ $pimpinan['jabatan'] }}</p>
                        <p class="text-[10px] text-gray-400 font-mono">NIP. {{ $pimpinan['nip'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="mb-32">
            <div class="flex items-center gap-6 mb-16">
                <h2 class="text-3xl font-bold text-gray-900 whitespace-nowrap uppercase tracking-tighter text-4xl">Guru</h2>
                <div class="h-[2px] w-full bg-gray-100 relative">
                    <div class="absolute left-0 top-0 h-full w-24 bg-[#48c3d9]"></div>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach([
                    ['nama' => 'Dra. Ratna Sari, M.Pd.', 'mapel' => 'Matematika'],
                    ['nama' => 'Ir. Hadi Gunawan, M.Sc.', 'mapel' => 'Fisika'],
                    ['nama' => 'Dra. Lestari Indah, M.Si.', 'mapel' => 'Kimia'],
                    ['nama' => 'Dr. Bambang Setiawan, M.Pd.', 'mapel' => 'Biologi'],
                    ['nama' => 'Drs. Eko Prabowo, M.Pd.', 'mapel' => 'Ekonomi'],
                    ['nama' => 'Dra. Wulandari, M.Si.', 'mapel' => 'Geografi'],
                    ['nama' => 'Drs. Agung Nugroho, M.Hum.', 'mapel' => 'Sosiologi'],
                    ['nama' => 'Drs. Supriyadi, M.Pd.', 'mapel' => 'Sejarah']
                ] as $guru)
                <div class="bg-gray-50 border border-gray-200 overflow-hidden group hover:bg-white transition-all">
                    <div class="flex flex-col">
                        <div class="aspect-square overflow-hidden grayscale group-hover:grayscale-0 transition-all duration-700">
                             <img src="https://ui-avatars.com/api/?name={{ urlencode($guru['nama']) }}&background=cbd5e1&color=ffffff&size=256" 
                                  class="w-full h-full object-cover" alt="{{ $guru['nama'] }}">
                        </div>
                        <div class="p-6">
                            <h4 class="font-bold text-gray-900 text-sm mb-1">{{ $guru['nama'] }}</h4>
                            <p class="text-[#48c3d9] text-[10px] font-bold uppercase tracking-widest">{{ $guru['mapel'] }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div>
            <div class="flex items-center gap-6 mb-16">
                <h2 class="text-3xl font-bold text-gray-900 whitespace-nowrap uppercase tracking-tighter text-4xl">Tenaga Kependidikan</h2>
                <div class="h-[2px] w-full bg-gray-100 relative">
                    <div class="absolute left-0 top-0 h-full w-24 bg-[#48c3d9]"></div>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach([
                    ['nama' => 'Dra. Ratna Sari, M.Pd.', 'mapel' => 'Matematika'],
                    ['nama' => 'Ir. Hadi Gunawan, M.Sc.', 'mapel' => 'Fisika'],
                    ['nama' => 'Dra. Lestari Indah, M.Si.', 'mapel' => 'Kimia'],
                    ['nama' => 'Dr. Bambang Setiawan, M.Pd.', 'mapel' => 'Biologi'],
                    ['nama' => 'Drs. Eko Prabowo, M.Pd.', 'mapel' => 'Ekonomi'],
                    ['nama' => 'Dra. Wulandari, M.Si.', 'mapel' => 'Geografi'],
                    ['nama' => 'Drs. Agung Nugroho, M.Hum.', 'mapel' => 'Sosiologi'],
                    ['nama' => 'Drs. Supriyadi, M.Pd.', 'mapel' => 'Sejarah']
                ] as $guru)
                <div class="bg-gray-50 border border-gray-200 overflow-hidden group hover:bg-white transition-all">
                    <div class="flex flex-col">
                        <div class="aspect-square overflow-hidden grayscale group-hover:grayscale-0 transition-all duration-700">
                             <img src="https://ui-avatars.com/api/?name={{ urlencode($guru['nama']) }}&background=cbd5e1&color=ffffff&size=256" 
                                  class="w-full h-full object-cover" alt="{{ $guru['nama'] }}">
                        </div>
                        <div class="p-6">
                            <h4 class="font-bold text-gray-900 text-sm mb-1">{{ $guru['nama'] }}</h4>
                            <p class="text-[#48c3d9] text-[10px] font-bold uppercase tracking-widest">{{ $guru['mapel'] }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection