@extends('public.layouts.main')

@section('title', 'Layanan Digital & Fasilitas - SMA Negeri 1 Tawangsari')

@section('content')

    <!-- Hero Header -->
    <div class="relative h-[70vh] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 bg-[url('https://source.unsplash.com/1920x1080/?smart-classroom,technology,school')] bg-cover bg-center"></div>
        <div class="absolute inset-0 bg-gradient-to-b from-black/70 via-black/65 to-black/80"></div>
        
        <div class="relative z-10 text-center px-6 max-w-4xl mx-auto">
            <span class="inline-block px-6 py-2 bg-white/20 backdrop-blur-md text-white text-sm font-medium rounded-full mb-6">
                Fasilitas & Layanan
            </span>
            <h1 class="text-5xl md:text-7xl font-bold text-white tracking-tight mb-6">
                Layanan Digital & Fasilitas
            </h1>
            <p class="text-xl text-white/90 max-w-2xl mx-auto">
                Mendukung proses pembelajaran modern dan pelayanan prima bagi seluruh warga sekolah
            </p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-6 py-20">

        <!-- Layanan Digital -->
        <div class="mb-24">
            <h2 class="text-4xl font-semibold text-gray-900 text-center mb-12">Layanan Digital</h2>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

                <!-- E-Learning -->
                <div class="bg-white border border-gray-100 rounded-3xl p-8 hover:shadow-2xl transition-all group">
                    <div class="text-6xl mb-6">📚</div>
                    <h3 class="text-2xl font-semibold mb-3">E-Learning</h3>
                    <p class="text-gray-600 mb-6">Platform pembelajaran online lengkap dengan video conference, materi digital, tugas, dan kuis interaktif.</p>
                    <div class="space-y-2 text-sm text-gray-500">
                        <div class="flex items-center gap-2">✔️ Video pembelajaran</div>
                        <div class="flex items-center gap-2">✔️ Materi digital</div>
                        <div class="flex items-center gap-2">✔️ Tugas & kuis online</div>
                        <div class="flex items-center gap-2">✔️ Forum diskusi</div>
                        <div class="flex items-center gap-2">✔️ Absensi digital</div>
                    </div>
                    <a href="#" class="mt-8 inline-block text-emerald-600 font-medium hover:text-emerald-700 transition">
                        Akses E-Learning →
                    </a>
                </div>

                <!-- E-Rapor -->
                <div class="bg-white border border-gray-100 rounded-3xl p-8 hover:shadow-2xl transition-all group">
                    <div class="text-6xl mb-6">📊</div>
                    <h3 class="text-2xl font-semibold mb-3">E-Rapor</h3>
                    <p class="text-gray-600 mb-6">Sistem rapor digital yang dapat diakses kapan saja oleh siswa dan orang tua.</p>
                    <div class="space-y-2 text-sm text-gray-500">
                        <div class="flex items-center gap-2">✔️ Cek nilai online</div>
                        <div class="flex items-center gap-2">✔️ Download rapor</div>
                        <div class="flex items-center gap-2">✔️ Rekap absensi</div>
                        <div class="flex items-center gap-2">✔️ Grafik perkembangan</div>
                        <div class="flex items-center gap-2">✔️ Notifikasi nilai</div>
                    </div>
                    <a href="#" class="mt-8 inline-block text-emerald-600 font-medium hover:text-emerald-700 transition">
                        Akses E-Rapor →
                    </a>
                </div>

                <!-- Perpustakaan Digital -->
                <div class="bg-white border border-gray-100 rounded-3xl p-8 hover:shadow-2xl transition-all group">
                    <div class="text-6xl mb-6">📖</div>
                    <h3 class="text-2xl font-semibold mb-3">Perpustakaan Digital</h3>
                    <p class="text-gray-600 mb-6">Akses lebih dari 5.000 judul e-book, jurnal, dan referensi online.</p>
                    <div class="space-y-2 text-sm text-gray-500">
                        <div class="flex items-center gap-2">✔️ 5.000+ e-book</div>
                        <div class="flex items-center gap-2">✔️ Jurnal online</div>
                        <div class="flex items-center gap-2">✔️ Pencarian cepat</div>
                        <div class="flex items-center gap-2">✔️ Riwayat peminjaman</div>
                    </div>
                    <a href="#" class="mt-8 inline-block text-emerald-600 font-medium hover:text-emerald-700 transition">
                        Akses Perpustakaan →
                    </a>
                </div>

                <!-- Portal Alumni -->
                <div class="bg-white border border-gray-100 rounded-3xl p-8 hover:shadow-2xl transition-all group">
                    <div class="text-6xl mb-6">👥</div>
                    <h3 class="text-2xl font-semibold mb-3">Portal Alumni</h3>
                    <p class="text-gray-600 mb-6">Jaringan alumni untuk tetap terhubung dan berbagi informasi.</p>
                    <div class="space-y-2 text-sm text-gray-500">
                        <div class="flex items-center gap-2">✔️ Database alumni</div>
                        <div class="flex items-center gap-2">✔️ Forum diskusi</div>
                        <div class="flex items-center gap-2">✔️ Info lowongan kerja</div>
                        <div class="flex items-center gap-2">✔️ Acara reuni</div>
                    </div>
                    <a href="#" class="mt-8 inline-block text-emerald-600 font-medium hover:text-emerald-700 transition">
                        Kunjungi Portal Alumni →
                    </a>
                </div>

                <!-- Pembayaran SPP Online -->
                <div class="bg-white border border-gray-100 rounded-3xl p-8 hover:shadow-2xl transition-all group">
                    <div class="text-6xl mb-6">💳</div>
                    <h3 class="text-2xl font-semibold mb-3">Pembayaran SPP Online</h3>
                    <p class="text-gray-600 mb-6">Pembayaran SPP dan iuran sekolah secara mudah dan aman.</p>
                    <div class="text-sm text-gray-500">
                        Transfer bank • Virtual Account • E-Wallet • Minimarket
                    </div>
                    <a href="#" class="mt-8 inline-block text-emerald-600 font-medium hover:text-emerald-700 transition">
                        Bayar SPP Sekarang →
                    </a>
                </div>

                <!-- Email Sekolah -->
                <div class="bg-white border border-gray-100 rounded-3xl p-8 hover:shadow-2xl transition-all group">
                    <div class="text-6xl mb-6">📧</div>
                    <h3 class="text-2xl font-semibold mb-3">Email Sekolah</h3>
                    <p class="text-gray-600 mb-6">Layanan email resmi @sman1tawangsari.sch.id dengan storage unlimited.</p>
                    <a href="#" class="mt-8 inline-block text-emerald-600 font-medium hover:text-emerald-700 transition">
                        Akses Email Sekolah →
                    </a>
                </div>

            </div>
        </div>

        <!-- Layanan Administrasi & Fasilitas -->
        <div>
            <h2 class="text-4xl font-semibold text-gray-900 text-center mb-12">Layanan Administrasi & Fasilitas</h2>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

                <!-- Layanan Surat Menyurat -->
                <div class="bg-white border border-gray-100 rounded-3xl p-8">
                    <div class="text-5xl mb-6">📄</div>
                    <h3 class="text-2xl font-semibold mb-4">Layanan Surat Menyurat</h3>
                    <ul class="space-y-3 text-gray-600 text-sm">
                        <li>• Surat keterangan siswa aktif</li>
                        <li>• Surat izin kegiatan</li>
                        <li>• Legalisir dokumen</li>
                        <li>• Surat rekomendasi</li>
                        <li>• Surat keterangan lulus</li>
                    </ul>
                    <div class="mt-6 pt-6 border-t text-xs text-gray-500">
                        Waktu proses: 1-3 hari kerja<br>
                        Biaya: <span class="text-emerald-600 font-medium">Gratis</span>
                    </div>
                </div>

                <!-- UKS -->
                <div class="bg-white border border-gray-100 rounded-3xl p-8">
                    <div class="text-5xl mb-6">🏥</div>
                    <h3 class="text-2xl font-semibold mb-4">UKS (Unit Kesehatan Sekolah)</h3>
                    <p class="text-gray-600 text-sm leading-relaxed mb-6">
                        Pertolongan pertama, pemeriksaan kesehatan rutin, konseling kesehatan, dan obat-obatan dasar.
                    </p>
                    <div class="text-xs text-gray-500">
                        Jam buka: Senin–Jumat 07.00–14.00 WIB<br>
                        Petugas: 2 perawat terlatih
                    </div>
                </div>

                <!-- Loker Siswa -->
                <div class="bg-white border border-gray-100 rounded-3xl p-8">
                    <div class="text-5xl mb-6">🔒</div>
                    <h3 class="text-2xl font-semibold mb-4">Layanan Loker Siswa</h3>
                    <p class="text-gray-600 text-sm mb-6">
                        Loker pribadi untuk menyimpan barang siswa dengan aman dan dilengkapi CCTV.
                    </p>
                    <div class="text-xs text-gray-500">
                        Biaya: Rp 50.000 / semester<br>
                        Ukuran: 30 × 40 × 50 cm
                    </div>
                </div>

                <!-- Kantin Sehat -->
                <div class="bg-white border border-gray-100 rounded-3xl p-8">
                    <div class="text-5xl mb-6">🍽️</div>
                    <h3 class="text-2xl font-semibold mb-4">Kantin Sehat</h3>
                    <p class="text-gray-600 text-sm mb-6">
                        Menu makanan bergizi, halal, dan higienis dengan harga terjangkau.
                    </p>
                    <div class="text-xs text-gray-500">
                        Jam buka: 07.00–14.00 WIB<br>
                        Harga: Rp 5.000 – Rp 20.000
                    </div>
                </div>

            </div>
        </div>

        <!-- Jam Layanan -->
        <div class="mt-24 bg-gray-900 text-white rounded-3xl p-12 md:p-16">
            <h2 class="text-3xl font-semibold text-center mb-12">Jam Layanan</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-10">
                <div>
                    <p class="font-medium text-emerald-400 mb-2">Tata Usaha</p>
                    <p class="text-sm">Senin – Kamis: 07.00 - 15.00 WIB<br>Jumat: 07.00 - 11.30 WIB</p>
                </div>
                <div>
                    <p class="font-medium text-emerald-400 mb-2">Bimbingan Konseling</p>
                    <p class="text-sm">Senin – Jumat: 08.00 - 14.00 WIB</p>
                </div>
                <div>
                    <p class="font-medium text-emerald-400 mb-2">Perpustakaan</p>
                    <p class="text-sm">Senin – Jumat: 07.00 - 15.00 WIB</p>
                </div>
                <div>
                    <p class="font-medium text-emerald-400 mb-2">UKS</p>
                    <p class="text-sm">Senin – Jumat: 07.00 - 14.00 WIB</p>
                </div>
                <div>
                    <p class="font-medium text-emerald-400 mb-2">Kantin</p>
                    <p class="text-sm">Senin – Jumat: 07.00 - 14.00 WIB</p>
                </div>
                <div>
                    <p class="font-medium text-emerald-400 mb-2">IT Support</p>
                    <p class="text-sm">Senin – Jumat: 08.00 - 15.00 WIB</p>
                </div>
            </div>
        </div>

    </div>

@endsection