@extends('public.layouts.main')

@section('title', 'Profil Sekolah - SMA Negeri 1 Tawangsari')

@section('content')
    <div class="relative h-[65vh] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1541339907198-e08756ebafe3?ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80')] bg-cover bg-center"></div>
        <div class="absolute inset-0 bg-gradient-to-tr from-gray-900 via-gray-900/70 to-transparent"></div>
        
        <div class="relative z-10 text-left px-6 max-w-7xl mx-auto w-full">
            <div class="max-w-3xl">
                <span class="inline-block px-4 py-1.5 bg-[#48c3d9] text-gray-900 text-xs font-bold uppercase tracking-widest rounded-md mb-6">
                    SMA Negeri 1 Tawangsari
                </span>
                <h1 class="text-5xl md:text-7xl font-extrabold text-white leading-tight mb-6">
                    Sejarah <span class="text-[#48c3d9]">Sekolah</span>
                </h1>
                <p class="text-lg md:text-xl text-white/80 font-light leading-relaxed border-l-4 border-[#48c3d9] pl-6">
                    Berdiri sejak 1985 • Akreditasi A (Unggul)
                </p>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-6 py-20">

        <div class="max-w-4xl mx-auto mb-24">
            <h2 class="text-4xl font-semibold text-gray-900 mb-8 text-center">Sejarah Singkat</h2>
            <div class="prose prose-lg text-gray-600 leading-relaxed mx-auto">
                <p>
                    <span class="text-[#48c3d9] font-bold">SMA Negeri 1 Tawangsari</span> didirikan pada tanggal 17 Agustus 1985 berdasarkan Surat Keputusan Menteri Pendidikan dan Kebudayaan Republik Indonesia. 
                    Sekolah ini merupakan salah satu SMA Negeri tertua dan paling berprestasi di wilayah Tawangsari.
                </p>
                <p class="mt-6">
                    Sejak berdirinya, SMA Negeri 1 Tawangsari telah meluluskan lebih dari 10.000 alumni yang tersebar di berbagai perguruan tinggi ternama baik di dalam maupun luar negeri. 
                    Sekolah ini dikenal sebagai lembaga pendidikan yang menghasilkan lulusan berkualitas dengan prestasi akademik dan non-akademik yang gemilang.
                </p>
                <p class="mt-8 font-medium text-gray-800">
                    Dengan motto <span class="italic text-[#48c3d9]">"Berkarakter, Berprestasi, dan Berintegritas"</span>, 
                    SMA Negeri 1 Tawangsari terus berkomitmen untuk memberikan pendidikan terbaik bagi generasi muda Indonesia.
                </p>
            </div>
        </div>

        <div class="grid lg:grid-cols-12 gap-16 mb-24">
            <div class="lg:col-span-5">
                <div class="bg-gradient-to-br from-[#48c3d9] to-[#36a6ba] text-white rounded-3xl p-10 h-full shadow-lg">
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

            <div class="lg:col-span-7">
                <div class="bg-white border border-gray-100 rounded-3xl p-10 shadow-sm">
                    <div class="flex items-center gap-4 mb-8">
                        <i class="fas fa-bullseye text-4xl text-[#48c3d9]"></i>
                        <h3 class="text-4xl font-semibold text-gray-900">Misi</h3>
                    </div>
                    <ul class="space-y-6 text-gray-700">
                        @foreach([
                            'Menyelenggarakan pendidikan berkualitas dengan kurikulum yang adaptif dan inovatif',
                            'Mengembangkan potensi siswa secara optimal melalui pembelajaran yang efektif',
                            'Menerapkan nilai-nilai karakter dalam setiap aspek pembelajaran',
                            'Meningkatkan kompetensi dan profesionalisme tenaga pendidik',
                            'Membangun lingkungan sekolah yang kondusif dan religius'
                        ] as $misi)
                        <li class="flex gap-4">
                            <span class="text-[#48c3d9] text-2xl leading-none mt-1">•</span>
                            <span>{{ $misi }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="mb-24">
            <h2 class="text-4xl font-semibold text-gray-900 text-center mb-12">Statistik Sekolah</h2>
            <div class="grid lg:grid-cols-12 gap-12">
                <div class="lg:col-span-5">
                    <div class="bg-gray-900 text-white rounded-3xl p-10 shadow-xl border-t-4 border-[#48c3d9]">
                        <h4 class="text-[#48c3d9] font-bold uppercase tracking-wider mb-6 text-sm text-center lg:text-left">Informasi Legalitas</h4>
                        <div class="space-y-4 text-sm md:text-base">
                            @foreach([
                                'Nama Sekolah' => 'SMA Negeri 1 Tawangsari',
                                'NPSN' => '12345678',
                                'NSS' => '301234567890',
                                'Bentuk Pendidikan' => 'SMA',
                                'Status' => 'Negeri',
                                'Status Kepemilikan' => 'Pemerintah Daerah',
                                'SK Pendirian' => '0601/0/1985',
                                'Tgl SK Pendirian' => '1985-07-17',
                                'Akreditasi' => 'A (Unggul)',
                                'Email' => 'info@sman1tawangsari.sch.id'
                            ] as $key => $value)
                            <div class="flex justify-between border-b border-white/10 pb-2">
                                <span class="text-gray-400">{{ $key }}</span>
                                <span class="font-medium {{ $key == 'Akreditasi' ? 'text-[#48c3d9]' : '' }}">{{ $value }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-7">
                    <div class="grid grid-cols-2 md:grid-cols-2 gap-6">
                        @foreach([
                            ['label' => 'Total Siswa', 'value' => '1.080', 'satuan' => 'siswa'],
                            ['label' => 'Guru', 'value' => '16', 'satuan' => 'orang'],
                            ['label' => 'Tenaga Kependidikan', 'value' => '12', 'satuan' => 'orang'],
                            ['label' => 'Ruang Teori', 'value' => '36', 'satuan' => 'ruang'],
                            ['label' => 'Luas Tanah', 'value' => '15.000', 'satuan' => 'm²'],
                            ['label' => 'Luas Bangunan', 'value' => '8.500', 'satuan' => 'm²']
                        ] as $stat)
                        <div class="bg-white border border-gray-100 rounded-3xl p-6 shadow-sm hover:bg-[#48c3d9]/5 transition-colors border-b-2 hover:border-b-[#48c3d9]">
                            <p class="text-gray-500 text-xs font-bold uppercase tracking-tighter">{{ $stat['label'] }}</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">{{ $stat['value'] }}</p>
                            <p class="text-gray-400 text-sm">{{ $stat['satuan'] }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection