@extends('public.layouts.main')

@section('title', 'Guru & Tenaga Kependidikan - SMA Negeri 1 Tawangsari')

@section('content')

    <!-- Hero Header -->
    <div class="relative h-[70vh] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 bg-[url('https://source.unsplash.com/1920x1080/?teacher,classroom,education')] bg-cover bg-center"></div>
        <div class="absolute inset-0 bg-gradient-to-b from-black/70 via-black/65 to-black/80"></div>
        
        <div class="relative z-10 text-center px-6 max-w-4xl mx-auto">
            <span class="inline-block px-6 py-2 bg-white/20 backdrop-blur-md text-white text-sm font-medium rounded-full mb-6">
                Sumber Daya Manusia
            </span>
            <h1 class="text-5xl md:text-7xl font-bold text-white tracking-tight mb-6">
                Guru & Tenaga Kependidikan
            </h1>
            <p class="text-xl text-white/90">
                48 Guru Profesional & 12 Tenaga Kependidikan yang berdedikasi tinggi
            </p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-6 py-20">

        <!-- Statistik Singkat -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-20">
            <div class="bg-white rounded-3xl p-8 text-center border border-gray-100">
                <div class="text-5xl font-bold text-emerald-600">48</div>
                <div class="text-gray-600 mt-2">Guru Profesional</div>
                <div class="text-xs text-gray-400 mt-1">Semua bersertifikasi</div>
            </div>
            <div class="bg-white rounded-3xl p-8 text-center border border-gray-100">
                <div class="text-5xl font-bold text-blue-600">12</div>
                <div class="text-gray-600 mt-2">Tenaga Kependidikan</div>
                <div class="text-xs text-gray-400 mt-1">Staff administrasi & layanan</div>
            </div>
            <div class="bg-white rounded-3xl p-8 text-center border border-gray-100">
                <div class="text-5xl font-bold text-amber-600">15+</div>
                <div class="text-gray-600 mt-2">Rata-rata Pengalaman</div>
                <div class="text-xs text-gray-400 mt-1">Tahun mengajar</div>
            </div>
            <div class="bg-white rounded-3xl p-8 text-center border border-gray-100">
                <div class="text-5xl font-bold text-purple-600">100%</div>
                <div class="text-gray-600 mt-2">Guru Bersertifikasi</div>
            </div>
        </div>

        <!-- Pimpinan Sekolah -->
        <div class="mb-20">
            <h2 class="text-3xl font-semibold text-gray-900 mb-10 text-center">Pimpinan Sekolah</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach([
                    ['nama' => 'Drs. Ahmad Suryanto, M.Pd.', 'jabatan' => 'Kepala Sekolah', 'nip' => '196505121990031002'],
                    ['nama' => 'Dra. Sri Wahyuni, M.Pd.', 'jabatan' => 'Wakasek Kurikulum', 'nip' => '196708151992032001'],
                    ['nama' => 'Drs. Budi Santoso, M.Pd.', 'jabatan' => 'Wakasek Kesiswaan', 'nip' => '196809201993031003'],
                    ['nama' => 'Drs. Hendra Wijaya, M.M.', 'jabatan' => 'Wakasek Sarpras', 'nip' => '196910051994031001']
                ] as $pimpinan)
                <div class="bg-white border border-gray-100 rounded-3xl p-8 text-center hover:shadow-xl transition-all">
                    <div class="w-24 h-24 mx-auto bg-gradient-to-br from-gray-100 to-gray-200 rounded-2xl flex items-center justify-center text-5xl mb-6">
                        👨‍💼
                    </div>
                    <h4 class="font-semibold text-xl text-gray-900">{{ $pimpinan['nama'] }}</h4>
                    <p class="text-emerald-600 font-medium mt-1">{{ $pimpinan['jabatan'] }}</p>
                    <p class="text-xs text-gray-400 mt-4">NIP: {{ $pimpinan['nip'] }}</p>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Daftar Guru -->
        <div class="mb-24">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-10">
                <h2 class="text-4xl font-semibold text-gray-900">Daftar Guru</h2>
                <div class="mt-4 md:mt-0 text-sm text-gray-500">
                    Menampilkan sebagian • Total 48 guru aktif
                </div>
            </div>

            <div class="overflow-x-auto rounded-3xl border border-gray-100 shadow-sm">
                <table class="w-full min-w-[900px]">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="py-5 px-6 text-left font-medium text-gray-600 w-12">No</th>
                            <th class="py-5 px-6 text-left font-medium text-gray-600">Nama</th>
                            <th class="py-5 px-6 text-left font-medium text-gray-600">Mata Pelajaran</th>
                            <th class="py-5 px-6 text-left font-medium text-gray-600">Pendidikan</th>
                            <th class="py-5 px-6 text-left font-medium text-gray-600">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 text-gray-700">
                        @foreach([
                            ['1','Dra. Ratna Sari, M.Pd.','Matematika','S2 Pendidikan Matematika','Sertifikasi'],
                            ['2','Ir. Hadi Gunawan, M.Sc.','Fisika','S2 Fisika','Sertifikasi'],
                            ['3','Dra. Lestari Indah, M.Si.','Kimia','S2 Kimia','Sertifikasi'],
                            ['4','Dr. Bambang Setiawan, M.Pd.','Biologi','S3 Pendidikan Biologi','Sertifikasi'],
                            ['5','Drs. Eko Prabowo, M.Pd.','Ekonomi','S2 Pendidikan Ekonomi','Sertifikasi'],
                            ['6','Dra. Wulandari, M.Si.','Geografi','S2 Geografi','Sertifikasi'],
                            ['7','Drs. Agung Nugroho, M.Hum.','Sosiologi','S2 Sosiologi','Sertifikasi'],
                            ['8','Drs. Supriyadi, M.Pd.','Sejarah','S2 Pendidikan Sejarah','Sertifikasi'],
                            ['9','Dra. Retno Wijayanti, M.Pd.','Bahasa Indonesia','S2 Pendidikan Bahasa Indonesia','Sertifikasi'],
                            ['10','Sarah Johnson, M.Ed.','Bahasa Inggris','S2 TESOL','Sertifikasi'],
                            ['11','Drs. Yoga Pratama, M.Pd.','Bahasa Jawa','S2 Pendidikan Bahasa Jawa','Sertifikasi'],
                            ['12','H. Muhammad Yusuf, S.Ag., M.Pd.I.','Pendidikan Agama Islam','S2 Pendidikan Islam','Sertifikasi'],
                        ] as $guru)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="py-5 px-6 font-medium text-gray-400">{{ $guru[0] }}</td>
                            <td class="py-5 px-6 font-semibold">{{ $guru[1] }}</td>
                            <td class="py-5 px-6">{{ $guru[2] }}</td>
                            <td class="py-5 px-6 text-sm">{{ $guru[3] }}</td>
                            <td class="py-5 px-6">
                                <span class="inline-block px-4 py-1 bg-emerald-100 text-emerald-700 text-xs font-medium rounded-full">
                                    {{ $guru[4] }}
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <p class="text-xs text-gray-400 text-center mt-6 italic">
                * Tabel di atas menampilkan sebagian guru. Total terdapat 48 guru aktif.
            </p>
        </div>

        <!-- Tenaga Kependidikan -->
        <div>
            <h2 class="text-4xl font-semibold text-gray-900 mb-10">Tenaga Kependidikan</h2>
            
            <div class="overflow-x-auto rounded-3xl border border-gray-100 shadow-sm">
                <table class="w-full min-w-[800px]">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="py-5 px-6 text-left font-medium text-gray-600 w-12">No</th>
                            <th class="py-5 px-6 text-left font-medium text-gray-600">Nama</th>
                            <th class="py-5 px-6 text-left font-medium text-gray-600">Jabatan</th>
                            <th class="py-5 px-6 text-left font-medium text-gray-600">Unit Kerja</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 text-gray-700">
                        @foreach([
                            ['1','Hendra Saputra, S.E.','Kepala Tata Usaha','Administrasi'],
                            ['2','Dewi Lestari, A.Md.','Bendahara','Keuangan'],
                            ['3','Rina Marlina','Staff Administrasi','Tata Usaha'],
                            ['4','Budi Hartono','Staff Administrasi','Kurikulum'],
                            ['5','Agus Supriadi','Staff Administrasi','Kesiswaan'],
                            ['6','Siti Rahayu, A.Md.Kom.','Operator Komputer','ICT'],
                            ['7','Ahmad Fauzi, S.IP.','Pustakawan','Perpustakaan'],
                            ['8','Wawan Setiawan','Laboran','Laboratorium'],
                            ['9','Joko Susilo','Teknisi','Sarana Prasarana'],
                            ['10','Sutrisno','Satpam','Keamanan'],
                            ['11','Suparman','Petugas Kebersihan','Lingkungan'],
                            ['12','Tukiman','Petugas Kebersihan','Lingkungan']
                        ] as $tendik)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="py-5 px-6 font-medium text-gray-400">{{ $tendik[0] }}</td>
                            <td class="py-5 px-6 font-medium">{{ $tendik[1] }}</td>
                            <td class="py-5 px-6">{{ $tendik[2] }}</td>
                            <td class="py-5 px-6 text-gray-600">{{ $tendik[3] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

@endsection