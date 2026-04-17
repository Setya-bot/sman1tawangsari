@extends('public.layouts.main')

@section('title', 'Profil Sekolah - SMA Negeri 1 Tawangsari')

@section('content')

    <!-- Hero Header -->
    <div class="relative h-[75vh] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 bg-[url('https://source.unsplash.com/1920x1080/?school,building,flag')] bg-cover bg-center"></div>
        <div class="absolute inset-0 bg-gradient-to-b from-black/75 via-black/70 to-black/80"></div>
        
        <div class="relative z-10 text-center px-6 max-w-5xl mx-auto">
            <h1 class="text-5xl md:text-7xl font-bold text-white tracking-tight mb-6">
                Sejarah Sekolah
            </h1>
            <p class="text-2xl text-white/90">
                SMA Negeri 1 Tawangsari
            </p>
            <div class="mt-8 inline-flex items-center gap-2 bg-white/20 backdrop-blur-md px-6 py-3 rounded-full text-white text-sm">
                <span class="w-3 h-3 bg-emerald-400 rounded-full animate-pulse"></span>
                Berdiri sejak 1985 • Akreditasi A (Unggul)
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-6 py-20">

        <!-- Sejarah Singkat -->
        <div class="max-w-4xl mx-auto mb-24">
            <h2 class="text-4xl font-semibold text-gray-900 mb-8 text-center">Sejarah Singkat</h2>
            <div class="prose prose-lg text-gray-600 leading-relaxed mx-auto">
                <p>
                    SMA Negeri 1 Tawangsari didirikan pada tanggal 17 Agustus 1985 berdasarkan Surat Keputusan Menteri Pendidikan dan Kebudayaan Republik Indonesia. 
                    Sekolah ini merupakan salah satu SMA Negeri tertua dan paling berprestasi di wilayah Tawangsari.
                </p>
                <p class="mt-6">
                    Sejak berdirinya, SMA Negeri 1 Tawangsari telah meluluskan lebih dari 10.000 alumni yang tersebar di berbagai perguruan tinggi ternama baik di dalam maupun luar negeri. 
                    Sekolah ini dikenal sebagai lembaga pendidikan yang menghasilkan lulusan berkualitas dengan prestasi akademik dan non-akademik yang gemilang.
                </p>
                <p class="mt-8 font-medium text-gray-800">
                    Dengan motto <span class="italic">"Berkarakter, Berprestasi, dan Berintegritas"</span>, 
                    SMA Negeri 1 Tawangsari terus berkomitmen untuk memberikan pendidikan terbaik bagi generasi muda Indonesia.
                </p>
            </div>
        </div>

        <!-- Visi & Misi -->
        <div class="grid lg:grid-cols-12 gap-16 mb-24">
            <!-- Visi -->
            <div class="lg:col-span-5">
                <div class="bg-gradient-to-br from-blue-600 to-indigo-700 text-white rounded-3xl p-10 h-full">
                    <div class="flex items-center gap-4 mb-8">
                        <i class="fas fa-eye text-5xl opacity-80"></i>
                        <h3 class="text-4xl font-semibold">Visi</h3>
                    </div>
                    <p class="text-lg leading-relaxed">
                        Menjadi sekolah menengah atas unggulan yang menghasilkan lulusan berkarakter, berprestasi, 
                        dan siap bersaing di era global dengan tetap menjunjung tinggi nilai-nilai luhur budaya bangsa.
                    </p>
                </div>
            </div>

            <!-- Misi -->
            <div class="lg:col-span-7">
                <div class="bg-white border border-gray-100 rounded-3xl p-10">
                    <div class="flex items-center gap-4 mb-8">
                        <i class="fas fa-bullseye text-4xl text-emerald-600"></i>
                        <h3 class="text-4xl font-semibold text-gray-900">Misi</h3>
                    </div>
                    <ul class="space-y-6 text-gray-700">
                        <li class="flex gap-4">
                            <span class="text-emerald-500 text-2xl leading-none mt-1">•</span>
                            <span>Menyelenggarakan pendidikan berkualitas dengan kurikulum yang adaptif dan inovatif</span>
                        </li>
                        <li class="flex gap-4">
                            <span class="text-emerald-500 text-2xl leading-none mt-1">•</span>
                            <span>Mengembangkan potensi siswa secara optimal melalui pembelajaran yang efektif</span>
                        </li>
                        <li class="flex gap-4">
                            <span class="text-emerald-500 text-2xl leading-none mt-1">•</span>
                            <span>Menerapkan nilai-nilai karakter dalam setiap aspek pembelajaran</span>
                        </li>
                        <li class="flex gap-4">
                            <span class="text-emerald-500 text-2xl leading-none mt-1">•</span>
                            <span>Meningkatkan kompetensi dan profesionalisme tenaga pendidik</span>
                        </li>
                        <li class="flex gap-4">
                            <span class="text-emerald-500 text-2xl leading-none mt-1">•</span>
                            <span>Membangun lingkungan sekolah yang kondusif dan religius</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Struktur Organisasi -->
        <div class="mb-24">
            <h2 class="text-4xl font-semibold text-gray-900 text-center mb-12">Struktur Organisasi</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach([
                    ['nama' => 'Drs. Ahmad Suryanto, M.Pd.', 'jabatan' => 'Kepala Sekolah'],
                    ['nama' => 'Dra. Sri Wahyuni, M.Pd.', 'jabatan' => 'Wakasek Kurikulum'],
                    ['nama' => 'Drs. Budi Santoso, M.Pd.', 'jabatan' => 'Wakasek Kesiswaan'],
                    ['nama' => 'Drs. Hendra Wijaya, M.M.', 'jabatan' => 'Wakasek Sarpras'],
                    ['nama' => 'Dewi Kusuma, S.Pd., M.Pd.', 'jabatan' => 'Wakasek Humas']
                ] as $pejabat)
                <div class="bg-white border border-gray-100 rounded-3xl p-8 text-center hover:shadow-xl transition">
                    <div class="w-20 h-20 mx-auto bg-gray-100 rounded-2xl mb-6 flex items-center justify-center text-4xl">
                        👨‍💼
                    </div>
                    <h4 class="font-semibold text-xl text-gray-900">{{ $pejabat['nama'] }}</h4>
                    <p class="text-emerald-600 font-medium mt-2">{{ $pejabat['jabatan'] }}</p>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Sarana & Prasarana -->
        <div class="mb-24">
            <h2 class="text-4xl font-semibold text-gray-900 text-center mb-12">Sarana & Prasarana</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach([
                    ['emoji' => '🔬', 'title' => 'Laboratorium', 'desc' => '3 Lab IPA (Fisika, Kimia, Biologi), 2 Lab Komputer, 1 Lab Bahasa dengan peralatan modern'],
                    ['emoji' => '📚', 'title' => 'Perpustakaan', 'desc' => 'Koleksi 15.000+ buku, ruang baca nyaman, akses digital & e-book'],
                    ['emoji' => '⚽', 'title' => 'Lapangan Olahraga', 'desc' => 'Lapangan basket, voli, futsal, dan atletik dengan standar nasional'],
                    ['emoji' => '🕌', 'title' => 'Musholla', 'desc' => 'Musholla luas dengan kapasitas 200 jamaah'],
                    ['emoji' => '🏫', 'title' => 'Ruang Kelas', 'desc' => '36 ruang kelas ber-AC dengan LCD projector dan sound system'],
                    ['emoji' => '🎭', 'title' => 'Aula', 'desc' => 'Aula serbaguna kapasitas 500 orang']
                ] as $fasilitas)
                <div class="bg-white border border-gray-100 rounded-3xl p-8 hover:border-emerald-300 transition-all group">
                    <div class="text-6xl mb-6">{{ $fasilitas['emoji'] }}</div>
                    <h4 class="text-2xl font-semibold mb-3">{{ $fasilitas['title'] }}</h4>
                    <p class="text-gray-600">{{ $fasilitas['desc'] }}</p>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Data Sekolah & Statistik -->
        <div class="grid lg:grid-cols-12 gap-12">

            <!-- Identitas Sekolah -->
            <div class="lg:col-span-5">
                <div class="bg-gray-900 text-white rounded-3xl p-10">
                    <h3 class="text-3xl font-semibold mb-8">Identitas Sekolah</h3>
                    <div class="space-y-6">
                        <div class="flex justify-between border-b border-white/20 pb-4">
                            <span class="text-gray-300">Nama Sekolah</span>
                            <span class="font-medium">SMA Negeri 1 Tawangsari</span>
                        </div>
                        <div class="flex justify-between border-b border-white/20 pb-4">
                            <span class="text-gray-300">NPSN</span>
                            <span class="font-medium">12345678</span>
                        </div>
                        <div class="flex justify-between border-b border-white/20 pb-4">
                            <span class="text-gray-300">NSS</span>
                            <span class="font-medium">301234567890</span>
                        </div>
                        <div class="flex justify-between border-b border-white/20 pb-4">
                            <span class="text-gray-300">Status</span>
                            <span class="font-medium">Negeri</span>
                        </div>
                        <div class="flex justify-between border-b border-white/20 pb-4">
                            <span class="text-gray-300">Akreditasi</span>
                            <span class="text-emerald-400 font-semibold">A (Unggul)</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-300">Tahun Berdiri</span>
                            <span class="font-medium">1985</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Statistik -->
            <div class="lg:col-span-7">
                <h3 class="text-3xl font-semibold mb-8 text-gray-900">Statistik Sekolah</h3>
                <div class="grid grid-cols-2 gap-6">
                    @foreach([
                        ['label' => 'Jumlah Siswa', 'value' => '1.080', 'satuan' => 'siswa'],
                        ['label' => 'Jumlah Rombel', 'value' => '36', 'satuan' => 'kelas'],
                        ['label' => 'Jumlah Guru', 'value' => '48', 'satuan' => 'guru'],
                        ['label' => 'Jumlah Tendik', 'value' => '12', 'satuan' => 'orang'],
                        ['label' => 'Luas Lahan', 'value' => '15.000', 'satuan' => 'm²'],
                        ['label' => 'Luas Bangunan', 'value' => '8.500', 'satuan' => 'm²']
                    ] as $stat)
                    <div class="bg-white border border-gray-100 rounded-3xl p-8">
                        <p class="text-gray-500 text-sm">{{ $stat['label'] }}</p>
                        <p class="text-5xl font-bold text-gray-900 mt-3">{{ $stat['value'] }}</p>
                        <p class="text-gray-500">{{ $stat['satuan'] }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Prestasi Terbaru -->
        <div class="mt-24 pt-20 border-t">
            <h2 class="text-4xl font-semibold text-gray-900 text-center mb-12">Prestasi Terbaru</h2>
            
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white border border-amber-200 rounded-3xl p-8">
                    <div class="text-amber-500 text-sm font-medium mb-3">TINGKAT NASIONAL</div>
                    <h4 class="font-semibold text-xl mb-2">Juara 1 OSN Matematika</h4>
                    <p class="text-gray-600">Olimpiade Sains Nasional 2024</p>
                </div>
                <div class="bg-white border border-blue-200 rounded-3xl p-8">
                    <div class="text-blue-500 text-sm font-medium mb-3">TINGKAT PROVINSI</div>
                    <h4 class="font-semibold text-xl mb-2">Juara 1 Debat Bahasa Inggris</h4>
                    <p class="text-gray-600">English Debate Competition 2024</p>
                </div>
                <div class="bg-white border border-emerald-200 rounded-3xl p-8">
                    <div class="text-emerald-500 text-sm font-medium mb-3">TINGKAT KABUPATEN</div>
                    <h4 class="font-semibold text-xl mb-2">Juara 1 Basket Putra</h4>
                    <p class="text-gray-600">Kejuaraan Basket SMA 2024</p>
                </div>
            </div>
        </div>

    </div>

@endsection