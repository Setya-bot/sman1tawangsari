@extends('public.layouts.main')

@section('title', 'Kesiswaan - SMA Negeri 1 Tawangsari')

@section('content')

    <!-- Hero Header -->
    <div class="relative h-[70vh] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 bg-[url('https://source.unsplash.com/1920x1080/?students,school,activity')] bg-cover bg-center"></div>
        <div class="absolute inset-0 bg-gradient-to-b from-black/70 via-black/60 to-black/80"></div>
        
        <div class="relative z-10 text-center px-6 max-w-4xl mx-auto">
            <span class="inline-block px-6 py-2 bg-white/20 backdrop-blur-md text-white text-sm font-medium rounded-full mb-6">
                Bidang Kesiswaan
            </span>
            <h1 class="text-5xl md:text-7xl font-bold text-white tracking-tight leading-none mb-6">
                Kesiswaan SMA Negeri 1 Tawangsari
            </h1>
            <p class="text-xl text-white/90 max-w-2xl mx-auto">
                Mengembangkan potensi siswa melalui organisasi, ekstrakurikuler, dan bimbingan konseling yang berkualitas
            </p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-6 py-20">

        <!-- Deskripsi Utama -->
        <div class="max-w-3xl mx-auto text-center mb-20">
            <p class="text-lg text-gray-600 leading-relaxed">
                Bidang Kesiswaan SMA Negeri 1 Tawangsari berkomitmen untuk mengembangkan potensi siswa melalui berbagai kegiatan organisasi, 
                ekstrakurikuler, dan bimbingan konseling yang berkualitas.
            </p>
        </div>

        <!-- OSIS -->
        <div class="mb-24">
            <div class="flex items-center gap-4 mb-8">
                <div class="w-14 h-14 bg-amber-100 text-amber-600 rounded-2xl flex items-center justify-center text-3xl">🎯</div>
                <div>
                    <h2 class="text-4xl font-semibold text-gray-900">OSIS</h2>
                    <p class="text-emerald-600 font-medium">Organisasi Siswa Intra Sekolah</p>
                </div>
            </div>
            
            <div class="prose prose-lg text-gray-600 max-w-none">
                <p>
                    OSIS merupakan wadah organisasi siswa yang bertujuan mengembangkan kepemimpinan, kreativitas, dan karakter siswa 
                    melalui berbagai program kerja dan kegiatan.
                </p>
            </div>

            <div class="mt-10 grid md:grid-cols-2 gap-10">
                <!-- Struktur -->
                <div>
                    <h3 class="text-2xl font-semibold mb-6 text-gray-900">Struktur Kepengurusan</h3>
                    <ul class="space-y-4 text-gray-700">
                        <li class="flex items-center gap-3"><span class="text-amber-500">•</span> Ketua OSIS</li>
                        <li class="flex items-center gap-3"><span class="text-amber-500">•</span> Wakil Ketua OSIS</li>
                        <li class="flex items-center gap-3"><span class="text-amber-500">•</span> Sekretaris (2 orang)</li>
                        <li class="flex items-center gap-3"><span class="text-amber-500">•</span> Bendahara (2 orang)</li>
                        <li class="flex items-center gap-3"><span class="text-amber-500">•</span> 9 Seksi Bidang</li>
                    </ul>
                </div>

                <!-- Program Kerja -->
                <div>
                    <h3 class="text-2xl font-semibold mb-6 text-gray-900">Program Kerja Unggulan</h3>
                    <div class="grid grid-cols-1 gap-4">
                        <div class="bg-white border border-gray-100 rounded-2xl p-6 hover:shadow-md transition">Masa Pengenalan Lingkungan Sekolah (MPLS)</div>
                        <div class="bg-white border border-gray-100 rounded-2xl p-6 hover:shadow-md transition">Class Meeting</div>
                        <div class="bg-white border border-gray-100 rounded-2xl p-6 hover:shadow-md transition">Peringatan Hari Besar Nasional</div>
                        <div class="bg-white border border-gray-100 rounded-2xl p-6 hover:shadow-md transition">Bakti Sosial</div>
                        <div class="bg-white border border-gray-100 rounded-2xl p-6 hover:shadow-md transition">Pentas Seni & Pameran Karya</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- MPK -->
        <div class="mb-24 bg-gray-50 rounded-3xl p-12">
            <div class="flex items-center gap-4 mb-8">
                <div class="w-14 h-14 bg-blue-100 text-blue-600 rounded-2xl flex items-center justify-center text-3xl">⚖️</div>
                <div>
                    <h2 class="text-4xl font-semibold text-gray-900">MPK</h2>
                    <p class="text-blue-600 font-medium">Majelis Permusyawaratan Kelas</p>
                </div>
            </div>
            
            <p class="text-lg text-gray-600 mb-10">
                MPK adalah lembaga legislatif siswa yang berfungsi sebagai badan pengawas jalannya kegiatan OSIS dan menyalurkan aspirasi siswa kepada sekolah.
            </p>

            <div class="grid md:grid-cols-2 gap-12">
                <div>
                    <h4 class="font-semibold text-xl mb-4">Struktur Kepengurusan</h4>
                    <ul class="space-y-3 text-gray-700">
                        <li>• Ketua MPK</li>
                        <li>• Wakil Ketua MPK</li>
                        <li>• Sekretaris</li>
                        <li>• Anggota dari setiap kelas</li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-semibold text-xl mb-4">Tugas & Fungsi</h4>
                    <ul class="space-y-3 text-gray-700">
                        <li>• Mengawasi kinerja OSIS</li>
                        <li>• Menampung aspirasi siswa</li>
                        <li>• Mediator antara siswa dan sekolah</li>
                        <li>• Mengevaluasi program OSIS</li>
                        <li>• Membahas peraturan siswa</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Ekstrakurikuler -->
        <div class="mb-24">
            <h2 class="text-4xl font-semibold text-center text-gray-900 mb-4">Ekstrakurikuler</h2>
            <p class="text-center text-gray-600 mb-12 max-w-xl mx-auto">
                Pilih kegiatan sesuai minat dan bakat untuk mengembangkan potensi diri
            </p>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach([
                    ['emoji' => '🏕️', 'name' => 'Pramuka', 'desc' => 'Wajib untuk kelas X – melatih kepemimpinan dan kemandirian'],
                    ['emoji' => '⚕️', 'name' => 'PMR', 'desc' => 'Palang Merah Remaja – keterampilan pertolongan pertama'],
                    ['emoji' => '🏀', 'name' => 'Basket', 'desc' => 'Tim putra & putri berprestasi tingkat provinsi'],
                    ['emoji' => '⚽', 'name' => 'Futsal', 'desc' => 'Futsal putra & putri'],
                    ['emoji' => '🏐', 'name' => 'Voli', 'desc' => 'Tim voli aktif di berbagai kompetisi'],
                    ['emoji' => '🥋', 'name' => 'Pencak Silat', 'desc' => 'Seni bela diri tradisional'],
                    ['emoji' => '🤖', 'name' => 'Robotika', 'desc' => 'Belajar pemrograman dan robotika'],
                    ['emoji' => '💻', 'name' => 'Coding Club', 'desc' => 'Komunitas programmer muda'],
                    ['emoji' => '🎭', 'name' => 'Teater', 'desc' => 'Seni peran dan drama'],
                    ['emoji' => '🎵', 'name' => 'Musik / Band', 'desc' => 'Latihan alat musik dan vocal'],
                    ['emoji' => '🎨', 'name' => 'Seni Rupa', 'desc' => 'Melukis, menggambar, dan desain grafis'],
                    ['emoji' => '📰', 'name' => 'Jurnalistik', 'desc' => 'Mading, website, dan media sekolah'],
                    ['emoji' => '🗣️', 'name' => 'English Club', 'desc' => 'Meningkatkan kemampuan bahasa Inggris'],
                    ['emoji' => '🔬', 'name' => 'KIR', 'desc' => 'Karya Ilmiah Remaja'],
                    ['emoji' => '🕌', 'name' => 'Rohis', 'desc' => 'Kerohanian Islam'],
                    ['emoji' => '📚', 'name' => 'Literasi', 'desc' => 'Komunitas pecinta buku']
                ] as $ekskul)
                <div class="bg-white border border-gray-100 rounded-3xl p-6 hover:border-emerald-200 hover:shadow-lg transition-all group">
                    <div class="text-4xl mb-4">{{ $ekskul['emoji'] }}</div>
                    <h5 class="font-semibold text-xl mb-2 group-hover:text-emerald-700 transition">{{ $ekskul['name'] }}</h5>
                    <p class="text-sm text-gray-500">{{ $ekskul['desc'] }}</p>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Bimbingan Konseling -->
        <div class="mb-24 bg-gradient-to-br from-emerald-50 to-white rounded-3xl p-12 md:p-16">
            <div class="flex items-center gap-4 mb-10">
                <div class="text-5xl">🧠</div>
                <h2 class="text-4xl font-semibold text-gray-900">Bimbingan Konseling</h2>
            </div>
            
            <p class="text-lg text-gray-600 mb-10">
                Layanan Bimbingan dan Konseling untuk membantu siswa dalam perkembangan akademik, karir, pribadi, dan sosial.
            </p>

            <div class="grid md:grid-cols-2 gap-12">
                <div>
                    <h4 class="font-semibold text-2xl mb-6">Layanan BK</h4>
                    <ul class="space-y-4">
                        <li class="flex gap-3"><span class="text-emerald-500">•</span> Bimbingan Akademik – Strategi belajar efektif</li>
                        <li class="flex gap-3"><span class="text-emerald-500">•</span> Bimbingan Karir – Perencanaan studi lanjut</li>
                        <li class="flex gap-3"><span class="text-emerald-500">•</span> Bimbingan Pribadi – Pengembangan diri</li>
                        <li class="flex gap-3"><span class="text-emerald-500">•</span> Bimbingan Sosial – Hubungan interpersonal</li>
                        <li class="flex gap-3"><span class="text-emerald-500">•</span> Konseling Individu & Kelompok</li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-semibold text-2xl mb-6">Tim Konselor</h4>
                    <div class="space-y-6">
                        <div>
                            <p class="font-medium">Dra. Siti Aminah, M.Pd.</p>
                            <p class="text-sm text-gray-500">Koordinator BK</p>
                        </div>
                        <div>
                            <p class="font-medium">Rina Marlina, S.Pd., M.Psi.</p>
                            <p class="text-sm text-gray-500">Konselor Kelas X & XI</p>
                        </div>
                        <div>
                            <p class="font-medium">Agus Prasetyo, S.Pd., M.Pd.</p>
                            <p class="text-sm text-gray-500">Konselor Kelas XII</p>
                        </div>
                    </div>

                    <div class="mt-10 pt-8 border-t">
                        <p class="font-medium">Jadwal Konsultasi</p>
                        <p class="text-emerald-700">Senin – Jumat : 08.00 – 14.00 WIB</p>
                        <div class="flex gap-6 mt-4 text-sm">
                            <div>📞 Ext. 125</div>
                            <div>📧 bk@sman1tawangsari.com</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tata Tertib -->
        <div>
            <h2 class="text-4xl font-semibold text-gray-900 text-center mb-12">Tata Tertib Siswa</h2>
            
            <div class="grid md:grid-cols-2 gap-12">
                <!-- Kewajiban -->
                <div class="bg-white border border-emerald-200 rounded-3xl p-10">
                    <div class="flex items-center gap-3 mb-8">
                        <span class="text-4xl">✅</span>
                        <h3 class="text-3xl font-semibold text-emerald-700">Kewajiban Siswa</h3>
                    </div>
                    <ul class="space-y-5 text-gray-700">
                        <li class="flex gap-3">• Hadir tepat waktu</li>
                        <li class="flex gap-3">• Memakai seragam lengkap</li>
                        <li class="flex gap-3">• Mengikuti pembelajaran dengan aktif</li>
                        <li class="flex gap-3">• Menghormati guru dan sesama siswa</li>
                        <li class="flex gap-3">• Menjaga kebersihan lingkungan sekolah</li>
                        <li class="flex gap-3">• Mengerjakan tugas tepat waktu</li>
                    </ul>
                </div>

                <!-- Larangan -->
                <div class="bg-white border border-red-200 rounded-3xl p-10">
                    <div class="flex items-center gap-3 mb-8">
                        <span class="text-4xl">❌</span>
                        <h3 class="text-3xl font-semibold text-red-700">Larangan Siswa</h3>
                    </div>
                    <ul class="space-y-5 text-gray-700">
                        <li class="flex gap-3">• Terlambat tanpa alasan yang jelas</li>
                        <li class="flex gap-3">• Bolos sekolah</li>
                        <li class="flex gap-3">• Merokok di area sekolah</li>
                        <li class="flex gap-3">• Membawa barang terlarang</li>
                        <li class="flex gap-3">• Berkelahi atau tawuran</li>
                        <li class="flex gap-3">• Melakukan bullying</li>
                    </ul>
                </div>
            </div>
        </div>

    </div>

@endsection