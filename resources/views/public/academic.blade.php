@extends('public.layouts.main')

@section('title', 'Informasi Akademik - SMA Negeri 1 Tawangsari')

@section('content')

    <!-- Hero Header -->
    <div class="relative h-[70vh] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 bg-[url('https://source.unsplash.com/1920x1080/?classroom,learning,teacher')] bg-cover bg-center"></div>
        <div class="absolute inset-0 bg-gradient-to-b from-black/70 via-black/65 to-black/80"></div>
        
        <div class="relative z-10 text-center px-6 max-w-4xl mx-auto">
            <span class="inline-block px-6 py-2 bg-white/20 backdrop-blur-md text-white text-sm font-medium rounded-full mb-6">
                Informasi Akademik
            </span>
            <h1 class="text-5xl md:text-7xl font-bold text-white tracking-tight leading-none mb-6">
                Akademik SMA Negeri 1 Tawangsari
            </h1>
            <p class="text-xl text-white/90 max-w-2xl mx-auto">
                Kurikulum Merdeka • Pembelajaran Berkualitas • Pengembangan Potensi Siswa Secara Holistik
            </p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-6 py-20">

        <!-- Deskripsi Kurikulum -->
        <div class="max-w-3xl mx-auto text-center mb-20">
            <h2 class="text-4xl font-semibold text-gray-900 mb-6">Kurikulum Merdeka</h2>
            <p class="text-lg text-gray-600 leading-relaxed">
                SMA Negeri 1 Tawangsari menerapkan Kurikulum Merdeka yang memberikan fleksibilitas kepada siswa untuk memilih mata pelajaran 
                sesuai minat, bakat, dan aspirasi karir mereka. Pembelajaran dilakukan dengan pendekatan <span class="font-medium">student-centered learning</span>, 
                di mana guru berperan sebagai fasilitator.
            </p>
        </div>

        <!-- Keunggulan Kurikulum -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-24">
            @foreach([
                ['icon' => '🚀', 'title' => 'Pembelajaran Berbasis Proyek', 'desc' => 'Mengembangkan kreativitas dan kemampuan problem solving siswa'],
                ['icon' => '🛡️', 'title' => 'Profil Pelajar Pancasila', 'desc' => 'Penguatan melalui kegiatan Projek Penguatan Profil Pelajar Pancasila (P5)'],
                ['icon' => '🎯', 'title' => 'Fleksibilitas Peminatan', 'desc' => 'Siswa dapat memilih mata pelajaran sesuai minat dan bakat'],
                ['icon' => '💻', 'title' => 'Integrasi Teknologi', 'desc' => 'Pemanfaatan teknologi dalam proses pembelajaran'],
                ['icon' => '📊', 'title' => 'Asesmen Autentik', 'desc' => 'Penilaian yang beragam dan sesuai dengan kemampuan siswa']
            ] as $keunggulan)
            <div class="bg-white border border-gray-100 rounded-3xl p-8 hover:shadow-xl transition-all duration-300">
                <div class="text-5xl mb-6">{{ $keunggulan['icon'] }}</div>
                <h3 class="text-2xl font-semibold text-gray-900 mb-3">{{ $keunggulan['title'] }}</h3>
                <p class="text-gray-600">{{ $keunggulan['desc'] }}</p>
            </div>
            @endforeach
        </div>

        <!-- Program Peminatan -->
        <div class="mb-24">
            <h2 class="text-4xl font-semibold text-center text-gray-900 mb-12">Program Peminatan</h2>
            
            <div class="grid md:grid-cols-3 gap-10">

                <!-- MIPA -->
                <div class="bg-white rounded-3xl overflow-hidden border border-gray-100 hover:border-blue-200 transition-all">
                    <div class="h-2 bg-blue-500"></div>
                    <div class="p-8">
                        <div class="text-5xl mb-4">🔬</div>
                        <h3 class="text-3xl font-semibold mb-2">MIPA</h3>
                        <p class="text-blue-600 font-medium mb-6">Matematika dan Ilmu Pengetahuan Alam</p>
                        <ul class="space-y-3 text-gray-600">
                            <li class="flex items-start gap-2"><span class="text-blue-500 mt-1">•</span> Matematika Lanjut</li>
                            <li class="flex items-start gap-2"><span class="text-blue-500 mt-1">•</span> Fisika</li>
                            <li class="flex items-start gap-2"><span class="text-blue-500 mt-1">•</span> Kimia</li>
                            <li class="flex items-start gap-2"><span class="text-blue-500 mt-1">•</span> Biologi</li>
                        </ul>
                    </div>
                </div>

                <!-- IPS -->
                <div class="bg-white rounded-3xl overflow-hidden border border-gray-100 hover:border-emerald-200 transition-all">
                    <div class="h-2 bg-emerald-500"></div>
                    <div class="p-8">
                        <div class="text-5xl mb-4">📊</div>
                        <h3 class="text-3xl font-semibold mb-2">IPS</h3>
                        <p class="text-emerald-600 font-medium mb-6">Ilmu Pengetahuan Sosial</p>
                        <ul class="space-y-3 text-gray-600">
                            <li class="flex items-start gap-2"><span class="text-emerald-500 mt-1">•</span> Ekonomi</li>
                            <li class="flex items-start gap-2"><span class="text-emerald-500 mt-1">•</span> Sosiologi</li>
                            <li class="flex items-start gap-2"><span class="text-emerald-500 mt-1">•</span> Geografi</li>
                            <li class="flex items-start gap-2"><span class="text-emerald-500 mt-1">•</span> Sejarah</li>
                        </ul>
                    </div>
                </div>

                <!-- Bahasa -->
                <div class="bg-white rounded-3xl overflow-hidden border border-gray-100 hover:border-purple-200 transition-all">
                    <div class="h-2 bg-purple-500"></div>
                    <div class="p-8">
                        <div class="text-5xl mb-4">🗣️</div>
                        <h3 class="text-3xl font-semibold mb-2">Bahasa & Budaya</h3>
                        <p class="text-purple-600 font-medium mb-6">Bahasa dan Sastra</p>
                        <ul class="space-y-3 text-gray-600">
                            <li class="flex items-start gap-2"><span class="text-purple-500 mt-1">•</span> Bahasa Indonesia</li>
                            <li class="flex items-start gap-2"><span class="text-purple-500 mt-1">•</span> Bahasa Inggris</li>
                            <li class="flex items-start gap-2"><span class="text-purple-500 mt-1">•</span> Bahasa Asing Lain</li>
                            <li class="flex items-start gap-2"><span class="text-purple-500 mt-1">•</span> Antropologi</li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>

        <!-- Kalender Akademik -->
        <div class="mb-24">
            <h2 class="text-4xl font-semibold text-gray-900 mb-10 text-center">Kalender Akademik 2024/2025</h2>
            
            <div class="overflow-x-auto rounded-3xl border border-gray-100 shadow-sm">
                <table class="w-full min-w-[800px]">
                    <thead>
                        <tr class="bg-gray-900 text-white">
                            <th class="py-5 px-6 text-left font-medium">No</th>
                            <th class="py-5 px-6 text-left font-medium">Kegiatan</th>
                            <th class="py-5 px-6 text-left font-medium">Waktu Pelaksanaan</th>
                            <th class="py-5 px-6 text-left font-medium">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach([
                            ['1', 'Masa Pengenalan Lingkungan Sekolah (MPLS)', '15-17 Juli 2024', 'Kelas X'],
                            ['2', 'Awal Tahun Pelajaran', '18 Juli 2024', 'Semua kelas'],
                            ['3', 'Ulangan Tengah Semester Ganjil', '23-27 September 2024', 'Semua kelas'],
                            ['4', 'Ulangan Akhir Semester Ganjil', '15-22 Desember 2024', 'Semua kelas'],
                            ['5', 'Libur Semester Ganjil', '23 Des 2024 - 5 Jan 2025', 'Semua kelas'],
                            ['6', 'Awal Semester Genap', '6 Januari 2025', 'Semua kelas'],
                            ['7', 'ANBK', '10-12 Januari 2025', 'Kelas XI'],
                            ['8', 'Ulangan Tengah Semester Genap', '10-14 Maret 2025', 'Semua kelas'],
                            ['9', 'Ujian Sekolah', '7-15 April 2025', 'Kelas XII'],
                            ['10', 'Ulangan Akhir Semester Genap', '8-15 Juni 2025', 'Kelas X & XI'],
                            ['11', 'Libur Akhir Tahun Pelajaran', '16 Juni - 14 Juli 2025', 'Semua kelas']
                        ] as $item)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="py-5 px-6 font-medium text-gray-500">{{ $item[0] }}</td>
                            <td class="py-5 px-6 font-medium">{{ $item[1] }}</td>
                            <td class="py-5 px-6 text-gray-600">{{ $item[2] }}</td>
                            <td class="py-5 px-6 text-gray-600">{{ $item[3] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Jadwal Pelajaran -->
        <div>
            <h2 class="text-4xl font-semibold text-gray-900 mb-4 text-center">Contoh Jadwal Pelajaran</h2>
            <p class="text-center text-gray-500 mb-10">Kelas X MIPA 1 (Jadwal dapat berubah sewaktu-waktu)</p>

            <div class="bg-white rounded-3xl shadow overflow-hidden border border-gray-100">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="py-6 px-8 text-left font-medium text-gray-600">Jam</th>
                            <th class="py-6 px-6 text-left font-medium text-gray-600">Senin</th>
                            <th class="py-6 px-6 text-left font-medium text-gray-600">Selasa</th>
                            <th class="py-6 px-6 text-left font-medium text-gray-600">Rabu</th>
                            <th class="py-6 px-6 text-left font-medium text-gray-600">Kamis</th>
                            <th class="py-6 px-6 text-left font-medium text-gray-600">Jumat</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm divide-y">
                        <tr>
                            <td class="py-5 px-8 font-medium text-gray-500">07.00 - 07.45</td>
                            <td class="py-5 px-6">Upacara</td>
                            <td class="py-5 px-6">Matematika</td>
                            <td class="py-5 px-6">Fisika</td>
                            <td class="py-5 px-6">Kimia</td>
                            <td class="py-5 px-6">Pend. Agama</td>
                        </tr>
                        <tr>
                            <td class="py-5 px-8 font-medium text-gray-500">07.45 - 08.30</td>
                            <td class="py-5 px-6">PKn</td>
                            <td class="py-5 px-6">Matematika</td>
                            <td class="py-5 px-6">Fisika</td>
                            <td class="py-5 px-6">Kimia</td>
                            <td class="py-5 px-6">Pend. Agama</td>
                        </tr>
                        <tr>
                            <td class="py-5 px-8 font-medium text-gray-500">08.30 - 09.15</td>
                            <td class="py-5 px-6">Bahasa Indonesia</td>
                            <td class="py-5 px-6">Biologi</td>
                            <td class="py-5 px-6">Bahasa Inggris</td>
                            <td class="py-5 px-6">Matematika</td>
                            <td class="py-5 px-6">PJOK</td>
                        </tr>
                        <tr>
                            <td class="py-5 px-8 font-medium text-gray-500">09.15 - 10.00</td>
                            <td class="py-5 px-6">Bahasa Indonesia</td>
                            <td class="py-5 px-6">Biologi</td>
                            <td class="py-5 px-6">Bahasa Inggris</td>
                            <td class="py-5 px-6">Matematika</td>
                            <td class="py-5 px-6">Istirahat</td>
                        </tr>
                        <!-- Tambahkan baris lain sesuai kebutuhan -->
                    </tbody>
                </table>
            </div>
            
            <p class="text-xs text-gray-400 text-center mt-6 italic">
                * Jadwal di atas merupakan contoh dan dapat berubah sewaktu-waktu sesuai kebijakan sekolah.
            </p>
        </div>

    </div>

@endsection