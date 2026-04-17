@extends('public.layouts.main')

@section('title', 'Profil Sekolah')

@section('content')

    <!-- Hero Header -->
    <div class="relative h-screen flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 bg-[url('https://source.unsplash.com/1920x1080/?school,modern-building')] bg-cover bg-center"></div>
        <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-black/70 to-black/80"></div>
        
        <div class="relative z-10 text-center px-6 max-w-4xl mx-auto">
            <h1 class="text-5xl md:text-7xl font-bold text-white tracking-tight mb-4">
                Profil Sekolah
            </h1>
            <p class="text-xl md:text-2xl text-white/90">
                {{ $profile->school_name ?? 'SMA Negeri 1 Yogyakarta' }}
            </p>
            <div class="w-24 h-1 bg-blue-500 mx-auto mt-8 rounded-full"></div>
        </div>
        
        <!-- Scroll indicator -->
        <div class="absolute bottom-10 left-1/2 -translate-x-1/2 text-white/70 animate-bounce">
            <i class="fas fa-chevron-down text-3xl"></i>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-6 py-20">

        <!-- Tentang Kami + Info Singkat -->
        <div class="grid lg:grid-cols-12 gap-16 items-start">
            
            <!-- Main Content -->
            <div class="lg:col-span-8">
                <h2 class="text-4xl font-semibold text-gray-900 mb-6">Tentang Kami</h2>
                <div class="prose prose-lg text-gray-600 max-w-none">
                    <p>
                        {{ $profile->description ?? 'SMA Negeri 1 Yogyakarta adalah sekolah unggulan yang berdiri sejak tahun 1950. Kami berkomitmen mencetak generasi unggul berbasis iman, ilmu pengetahuan, teknologi, dan karakter mulia.' }}
                    </p>
                </div>

                <div class="grid grid-cols-2 gap-8 mt-12">
                    <div>
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-2xl flex items-center justify-center">
                                <i class="fas fa-calendar-alt text-2xl"></i>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Didirikan</p>
                                <p class="text-2xl font-semibold text-gray-900">{{ $profile->established_year ?? '1950' }}</p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-emerald-100 text-emerald-600 rounded-2xl flex items-center justify-center">
                                <i class="fas fa-map-marker-alt text-2xl"></i>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Alamat</p>
                                <p class="text-lg font-medium text-gray-900">{{ $profile->address ?? 'Jl. HOS Cokroaminoto No. 10, Yogyakarta' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar Card -->
            <div class="lg:col-span-4">
                <div class="bg-white rounded-3xl shadow-xl p-8 sticky top-8">
                    <h3 class="text-2xl font-semibold mb-6 text-gray-900">Informasi Singkat</h3>
                    <div class="space-y-6">
                        <div class="flex justify-between items-center pb-4 border-b">
                            <span class="text-gray-600">NSS / NPSN</span>
                            <span class="font-semibold">{{ $profile->nss ?? '1234567890' }} / {{ $profile->npsn ?? '12345678' }}</span>
                        </div>
                        <div class="flex justify-between items-center pb-4 border-b">
                            <span class="text-gray-600">Akreditasi</span>
                            <span class="font-semibold text-emerald-600">A (Unggul)</span>
                        </div>
                        <div class="flex justify-between items-center pb-4 border-b">
                            <span class="text-gray-600">Jumlah Siswa</span>
                            <span class="font-semibold">1.280 Orang</span>
                        </div>
                        <div class="flex justify-between items-center pb-4 border-b">
                            <span class="text-gray-600">Jumlah Guru</span>
                            <span class="font-semibold">92 Orang</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">Kurikulum</span>
                            <span class="font-semibold">Merdeka + Cambridge</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sejarah -->
        <div class="mt-24 pt-16 border-t border-gray-200">
            <h2 class="text-4xl font-semibold text-gray-900 mb-8">Sejarah Singkat</h2>
            <div class="max-w-3xl text-lg text-gray-600 leading-relaxed">
                <p>
                    SMA Negeri 1 Yogyakarta didirikan pada tahun 1950 sebagai salah satu sekolah menengah atas pertama di wilayah Yogyakarta. 
                    Selama lebih dari 75 tahun, sekolah ini telah menjadi teladan dalam bidang akademik dan pengembangan karakter.
                </p>
                <p class="mt-6">
                    Saat ini kami terus berinovasi dengan teknologi pembelajaran modern dan program unggulan yang berorientasi pada masa depan.
                </p>
            </div>
        </div>

        <!-- Visi & Misi -->
        <div class="mt-24 grid md:grid-cols-2 gap-12">
            <div class="bg-gradient-to-br from-blue-50 to-white p-10 rounded-3xl border border-blue-100">
                <div class="flex items-center gap-4 mb-6">
                    <i class="fas fa-eye text-4xl text-blue-600"></i>
                    <h3 class="text-3xl font-semibold text-gray-900">Visi</h3>
                </div>
                <p class="text-lg text-gray-700 leading-relaxed">
                    {{ $profile->vision ?? 'Menjadi sekolah unggulan nasional yang menghasilkan lulusan beriman, bertakwa, berprestasi, berwawasan global, dan berkontribusi positif bagi masyarakat pada tahun 2035.' }}
                </p>
            </div>

            <div class="bg-white p-10 rounded-3xl shadow-sm border border-gray-100">
                <div class="flex items-center gap-4 mb-6">
                    <i class="fas fa-bullseye text-4xl text-emerald-600"></i>
                    <h3 class="text-3xl font-semibold text-gray-900">Misi</h3>
                </div>
                <ul class="space-y-5 text-lg text-gray-700">
                    <li class="flex gap-3">
                        <span class="text-emerald-500 mt-1">•</span>
                        <span>Menyelenggarakan pendidikan berkualitas berbasis karakter dan teknologi</span>
                    </li>
                    <li class="flex gap-3">
                        <span class="text-emerald-500 mt-1">•</span>
                        <span>Mengembangkan seluruh potensi siswa secara optimal</span>
                    </li>
                    <li class="flex gap-3">
                        <span class="text-emerald-500 mt-1">•</span>
                        <span>Membangun kerjasama sinergis dengan orang tua, alumni, dan masyarakat</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Kepala Sekolah -->
        <div class="mt-24 text-center">
            <h2 class="text-4xl font-semibold text-gray-900 mb-12">Kepala Sekolah</h2>
            <div class="max-w-md mx-auto">
                <img src="{{ $profile->principal_photo ? asset('storage/'.$profile->principal_photo) : 'https://source.unsplash.com/600x600/?man,teacher,portrait' }}" 
                     class="w-64 h-64 mx-auto rounded-3xl object-cover shadow-2xl ring-8 ring-white" 
                     alt="Kepala Sekolah">
                
                <div class="mt-8">
                    <h4 class="text-2xl font-semibold text-gray-900">
                        {{ $profile->principal_name ?? 'Drs. Ahmad Santoso, M.Pd' }}
                    </h4>
                    <p class="text-gray-500 mt-1">Kepala Sekolah</p>
                </div>

                <div class="mt-10 bg-gray-50 rounded-3xl p-8 italic text-gray-600 border border-gray-100">
                    "Kami berkomitmen untuk terus meningkatkan kualitas pendidikan dan membentuk siswa yang tidak hanya cerdas secara intelektual, tetapi juga berakhlak mulia."
                </div>
            </div>
        </div>

        <!-- Tenaga Pendidik -->
        <div class="mt-28">
            <h2 class="text-4xl font-semibold text-gray-900 text-center mb-12">Tenaga Pendidik</h2>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                @if(isset($teachers) && $teachers->count() > 0)
                    @foreach($teachers as $teacher)
                    <div class="group">
                        <div class="relative overflow-hidden rounded-3xl">
                            <img src="{{ $teacher->photo ? asset('storage/'.$teacher->photo) : 'https://source.unsplash.com/400x400/?teacher' }}" 
                                 class="w-full aspect-square object-cover transition-transform duration-500 group-hover:scale-110" 
                                 alt="{{ $teacher->name }}">
                            <div class="absolute inset-x-0 bottom-0 h-2/3 bg-gradient-to-t from-black/70 to-transparent"></div>
                        </div>
                        <div class="mt-4 text-center">
                            <h6 class="font-semibold text-lg">{{ $teacher->name }}</h6>
                            <p class="text-sm text-gray-500">{{ $teacher->position ?? 'Guru Mata Pelajaran' }}</p>
                        </div>
                    </div>
                    @endforeach
                @else
                    <!-- Dummy Teachers -->
                    <div class="group">
                        <div class="overflow-hidden rounded-3xl">
                            <img src="https://source.unsplash.com/400x400/?teacher,woman" class="w-full aspect-square object-cover" alt="">
                        </div>
                        <div class="mt-4 text-center">
                            <h6 class="font-semibold text-lg">Dra. Siti Aminah</h6>
                            <p class="text-sm text-gray-500">Guru Matematika</p>
                        </div>
                    </div>
                    <!-- Tambahkan 3 dummy lain jika diperlukan -->
                @endif
            </div>
        </div>

        <!-- Fasilitas -->
        <div class="mt-28 bg-gray-900 text-white rounded-3xl p-12 md:p-16">
            <h2 class="text-4xl font-semibold text-center mb-12">Fasilitas Sekolah</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach(['Ruang Kelas Ber-AC & Smart Board', 'Laboratorium IPA Modern', 'Laboratorium Komputer', 'Perpustakaan Digital', 'Lapangan Olahraga Multifungsi', 'Aula Serbaguna & Teater', 'Kantin Sehat & Higienis', 'Ruang Konseling'] as $facility)
                <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-2xl p-6 hover:bg-white/20 transition-all">
                    <i class="fas fa-check-circle text-emerald-400 text-3xl mb-4"></i>
                    <p class="text-lg font-medium">{{ $facility }}</p>
                </div>
                @endforeach
            </div>
        </div>

    </div>

@endsection