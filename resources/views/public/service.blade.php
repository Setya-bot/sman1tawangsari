@extends('public.layouts.main')

@section('title', 'Layanan & Fasilitas - SMA Negeri 1 Tawangsari')

@section('content')

    <div class="relative h-[65vh] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1541339907198-e08756ebafe3?ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80')] bg-cover bg-center"></div>
        <div class="absolute inset-0 bg-gradient-to-tr from-gray-900 via-gray-900/70 to-transparent"></div>
        
        <div class="relative z-10 text-left px-6 max-w-7xl mx-auto w-full">
            <div class="max-w-3xl">
                <span class="inline-block px-4 py-1.5 bg-[#48c3d9] text-gray-900 text-xs font-bold uppercase tracking-widest rounded-md mb-6">
                    Student Services & Facilities
                </span>
                <h1 class="text-5xl md:text-7xl font-extrabold text-white leading-tight mb-6">
                    Ekosistem <span class="text-[#48c3d9]">Belajar</span> Terintegrasi.
                </h1>
                <p class="text-lg md:text-xl text-white/80 font-light leading-relaxed border-l-4 border-[#48c3d9] pl-6">
                    Kami menyediakan layanan komprehensif mulai dari dukungan akademik digital hingga pengembangan karakter dan persiapan karier masa depan.
                </p>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-6 py-16 relative z-20">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-24">
            @foreach([
                ['title' => 'Pusat Karier & PTN', 'icon' => '🎓', 'desc' => 'Layanan peminatan dan bimbingan masuk Perguruan Tinggi Negeri/Kedinasan.'],
                ['title' => 'Infrastruktur Digital', 'icon' => '⚡', 'desc' => 'Akses internet stabil dan platform pembelajaran mandiri 24 jam.'],
                ['title' => 'Layanan Inklusi', 'icon' => '🤝', 'desc' => 'Pendampingan khusus bagi keberagaman kebutuhan belajar setiap siswa.']
            ] as $top)
            <div class="bg-white p-8 rounded-3xl shadow-xl border border-gray-100 group hover:bg-[#48c3d9] transition-all duration-500">
                <div class="text-4xl mb-4 group-hover:scale-110 transition-transform">{{ $top['icon'] }}</div>
                <h3 class="text-xl font-bold text-gray-900 group-hover:text-white mb-2">{{ $top['title'] }}</h3>
                <p class="text-gray-500 group-hover:text-white/90 text-sm leading-relaxed">{{ $top['desc'] }}</p>
            </div>
            @endforeach
        </div>

        <div>
            <div class="text-center max-w-2xl mx-auto mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Layanan Digital & Literasi</h2>
                <p class="text-gray-500">Transformasi digital untuk memudahkan akses informasi bagi siswa dan orang tua.</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-10">
                <div class="space-y-10">
                    <div class="group">
                        <div class="flex items-start gap-5">
                            <div class="w-14 h-14 shrink-0 bg-gray-100 rounded-2xl flex items-center justify-center text-2xl group-hover:bg-[#48c3d9]/20 transition-colors">🌐</div>
                            <div>
                                <h4 class="text-xl font-bold text-gray-900 mb-2">Learning Management System</h4>
                                <p class="text-gray-600 text-sm mb-4">Akses materi, pengumpulan tugas, dan ujian berbasis digital melalui portal resmi sekolah.</p>
                                <a href="#" class="text-[#48c3d9] font-bold text-sm hover:underline">Akses LMS →</a>
                            </div>
                        </div>
                    </div>
                    <div class="group">
                        <div class="flex items-start gap-5">
                            <div class="w-14 h-14 shrink-0 bg-gray-100 rounded-2xl flex items-center justify-center text-2xl group-hover:bg-[#48c3d9]/20 transition-colors">📊</div>
                            <div>
                                <h4 class="text-xl font-bold text-gray-900 mb-2">E-Rapor & Monitoring</h4>
                                <p class="text-gray-600 text-sm mb-4">Pantau perkembangan nilai akademik dan kehadiran secara real-time dari perangkat Anda.</p>
                                <a href="#" class="text-[#48c3d9] font-bold text-sm hover:underline">Lihat Progres →</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lg:scale-110 bg-gray-900 rounded-[2.5rem] p-10 text-white shadow-2xl flex flex-col justify-between">
                    <div>
                        <div class="inline-block p-4 bg-white/10 rounded-2xl mb-6 text-3xl">📚</div>
                        <h3 class="text-2xl font-bold mb-4">Perpustakaan & Hub Literasi</h3>
                        <p class="text-gray-400 text-sm leading-relaxed mb-6">
                            Menyediakan lebih dari 10.000 koleksi buku fisik dan ribuan akses e-journal untuk mendukung riset serta tugas akhir siswa.
                        </p>
                    </div>
                    <div class="space-y-3">
                        <div class="flex items-center justify-between text-xs py-2 border-b border-white/10">
                            <span class="text-gray-500">Area Baca Nyaman</span>
                            <span class="text-[#48c3d9]">Tersedia</span>
                        </div>
                        <div class="flex items-center justify-between text-xs py-2 border-b border-white/10">
                            <span class="text-gray-500">Digital Catalog (OPAC)</span>
                            <span class="text-[#48c3d9]">Akses Online</span>
                        </div>
                    </div>
                </div>

                <div class="space-y-10">
                    <div class="group">
                        <div class="flex items-start gap-5">
                            <div class="w-14 h-14 shrink-0 bg-gray-100 rounded-2xl flex items-center justify-center text-2xl group-hover:bg-[#48c3d9]/20 transition-colors">💳</div>
                            <div>
                                <h4 class="text-xl font-bold text-gray-900 mb-2">E-Payment (SPP)</h4>
                                <p class="text-gray-600 text-sm mb-4">Sistem pembayaran iuran sekolah yang transparan via Virtual Account berbagai Bank.</p>
                                <a href="#" class="text-[#48c3d9] font-bold text-sm hover:underline">Bayar Sekarang →</a>
                            </div>
                        </div>
                    </div>
                    <div class="group">
                        <div class="flex items-start gap-5">
                            <div class="w-14 h-14 shrink-0 bg-gray-100 rounded-2xl flex items-center justify-center text-2xl group-hover:bg-[#48c3d9]/20 transition-colors">📁</div>
                            <div>
                                <h4 class="text-xl font-bold text-gray-900 mb-2">Layanan Persuratan</h4>
                                <p class="text-gray-600 text-sm mb-4">Pengajuan surat keterangan aktif, beasiswa, dan legalisir ijazah secara cepat.</p>
                                <a href="#" class="text-[#48c3d9] font-bold text-sm hover:underline">Ajukan Surat →</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-gray-50 rounded-[3.5rem] py-32">
            <h2 class="text-3xl font-bold text-gray-900 mb-12">Layanan Kesejahteraan & Pengembangan</h2>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="bg-white p-8 rounded-3xl border border-gray-100 shadow-sm">
                    <div class="w-12 h-12 bg-[#48c3d9]/10 rounded-xl flex items-center justify-center text-xl mb-6">🎯</div>
                    <h4 class="font-bold mb-3">Bimbingan Konseling</h4>
                    <p class="text-gray-500 text-xs leading-relaxed mb-4">Konsultasi pribadi, minat bakat, dan strategi pemilihan jurusan kuliah.</p>
                    <span class="text-[10px] font-bold text-[#48c3d9] uppercase">Ruang BK - Lt. 1</span>
                </div>

                <div class="bg-white p-8 rounded-3xl border border-gray-100 shadow-sm">
                    <div class="w-12 h-12 bg-[#48c3d9]/10 rounded-xl flex items-center justify-center text-xl mb-6">🏥</div>
                    <h4 class="font-bold mb-3">Unit Kesehatan (UKS)</h4>
                    <p class="text-gray-500 text-xs leading-relaxed mb-4">Layanan kesehatan dasar, obat-obatan, dan pemeriksaan berkala siswa.</p>
                    <span class="text-[10px] font-bold text-[#48c3d9] uppercase">Buka: 07.00 - 15.00</span>
                </div>

                <div class="bg-white p-8 rounded-3xl border border-gray-100 shadow-sm">
                    <div class="w-12 h-12 bg-[#48c3d9]/10 rounded-xl flex items-center justify-center text-xl mb-6">🍽️</div>
                    <h4 class="font-bold mb-3">Kantin Sehat</h4>
                    <p class="text-gray-500 text-xs leading-relaxed mb-4">Pusat kuliner higienis dengan sistem pembayaran non-tunai (Tap Cash).</p>
                    <span class="text-[10px] font-bold text-[#48c3d9] uppercase">Stand Halal MUI</span>
                </div>

                <div class="bg-white p-8 rounded-3xl border border-gray-100 shadow-sm">
                    <div class="w-12 h-12 bg-[#48c3d9]/10 rounded-xl flex items-center justify-center text-xl mb-6">🕌</div>
                    <h4 class="font-bold mb-3">Sarana Ibadah</h4>
                    <p class="text-gray-500 text-xs leading-relaxed mb-4">Masjid yang representatif untuk kegiatan keagamaan rutin seluruh warga sekolah.</p>
                    <span class="text-[10px] font-bold text-[#48c3d9] uppercase">Kapasitas 500 Jamaah</span>
                </div>
            </div>
        </div>

        <div class="mb-32">
            <div class="flex items-center gap-4 mb-12">
                <h2 class="text-3xl font-bold text-gray-900">Pusat Penelitian & Laboratorium</h2>
                <div class="flex-grow h-[1px] bg-gray-200"></div>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
                @foreach([
                    ['name' => 'Lab Fisika', 'img' => '🔬'],
                    ['name' => 'Lab Biologi', 'img' => '🧬'],
                    ['name' => 'Lab Kimia', 'img' => '🧪'],
                    ['name' => 'Lab Komputer', 'img' => '💻'],
                    ['name' => 'Lab Bahasa', 'img' => '🎧'],
                    ['name' => 'Studio Seni', 'img' => '🎨']
                ] as $lab)
                <div class="p-6 bg-white border border-gray-100 rounded-2xl text-center hover:shadow-lg transition-shadow cursor-default">
                    <div class="text-3xl mb-3">{{ $lab['img'] }}</div>
                    <p class="text-sm font-bold text-gray-700">{{ $lab['name'] }}</p>
                </div>
                @endforeach
            </div>
        </div>

        <div class="grid lg:grid-cols-2 gap-12 mb-24">
            <div class="bg-gray-900 rounded-[2.5rem] p-12 text-white relative overflow-hidden">
                <div class="absolute top-0 right-0 w-64 h-64 bg-[#48c3d9]/10 rounded-full blur-3xl -mr-32 -mt-32"></div>
                <h3 class="text-2xl font-bold mb-8">Waktu Operasional Layanan</h3>
                <div class="space-y-6">
                    <div class="flex justify-between items-center py-3 border-b border-white/10">
                        <span class="text-gray-400">Senin - Kamis</span>
                        <span class="font-bold">07.00 - 15.30 WIB</span>
                    </div>
                    <div class="flex justify-between items-center py-3 border-b border-white/10">
                        <span class="text-gray-400">Jumat</span>
                        <span class="font-bold">07.00 - 14.30 WIB</span>
                    </div>
                    <div class="flex justify-between items-center py-3">
                        <span class="text-gray-400">Sabtu, Minggu & Libur Nasional</span>
                        <span class="text-red-400 font-bold uppercase text-xs">Tutup</span>
                    </div>
                </div>
            </div>

            <div class="bg-[#48c3d9] rounded-[2.5rem] p-12 text-gray-900">
                <h3 class="text-2xl font-bold mb-4 text-white">Butuh bantuan teknis?</h3>
                <p class="mb-8 text-gray-900/70">Hubungi tim Helpdesk kami jika Anda mengalami kendala pada layanan digital atau fasilitas sekolah.</p>
                <div class="space-y-4">
                    <a href="#" class="flex items-center gap-4 bg-white/20 p-4 rounded-2xl border border-white/30 hover:bg-white transition-colors group">
                        <span class="text-xl">📞</span>
                        <div>
                            <p class="text-xs font-bold uppercase opacity-60">Hotline TU</p>
                            <p class="font-bold group-hover:text-[#48c3d9]">(0271) 123-456</p>
                        </div>
                    </a>
                    <a href="#" class="flex items-center gap-4 bg-white/20 p-4 rounded-2xl border border-white/30 hover:bg-white transition-colors group">
                        <span class="text-xl">📧</span>
                        <div>
                            <p class="text-xs font-bold uppercase opacity-60">Email Support</p>
                            <p class="font-bold group-hover:text-[#48c3d9]">helpdesk@sman1tawangsari.sch.id</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>

    </div>

@endsection