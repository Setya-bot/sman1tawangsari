@extends('public.layouts.main')

@section('title', 'Profil Sekolah')

@section('content')

    <!-- Hero Page Header -->
    <div class="page-header py-5 text-white text-center" 
         style="background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('https://source.unsplash.com/1920x800/?school,building') center/cover no-repeat; min-height: 400px;">
        <div class="container">
            <h1 class="display-4 fw-bold">Profil Sekolah</h1>
            <p class="lead">{{ $profile->school_name ?? 'SMA Negeri 1 Yogyakarta' }}</p>
        </div>
    </div>

    <section class="py-5">
        <div class="container">

            <!-- Informasi Umum Sekolah -->
            <div class="row g-5">
                <div class="col-lg-8">
                    <h2 class="section-title mb-4">Tentang Kami</h2>
                    <p class="lead">
                        {{ $profile->description ?? 'SMA Negeri 1 Yogyakarta adalah sekolah unggulan yang berdiri sejak tahun 1950. Kami berkomitmen mencetak generasi unggul berbasis iman, ilmu pengetahuan, teknologi, dan karakter mulia.' }}
                    </p>

                    <div class="row mt-5">
                        <div class="col-md-6">
                            <h5 class="fw-bold text-primary"><i class="fas fa-calendar-alt me-2"></i> Didirikan</h5>
                            <p class="fs-5">{{ $profile->established_year ?? '1950' }}</p>
                        </div>
                        <div class="col-md-6">
                            <h5 class="fw-bold text-primary"><i class="fas fa-map-marker-alt me-2"></i> Alamat</h5>
                            <p class="fs-5">{{ $profile->address ?? 'Jl. HOS Cokroaminoto No. 10, Pakuncen, Wirobrajan, Yogyakarta 55253' }}</p>
                        </div>
                        <div class="col-md-6 mt-4">
                            <h5 class="fw-bold text-primary"><i class="fas fa-phone me-2"></i> Telepon</h5>
                            <p class="fs-5">{{ $profile->phone ?? '(0274) 513454' }}</p>
                        </div>
                        <div class="col-md-6 mt-4">
                            <h5 class="fw-bold text-primary"><i class="fas fa-envelope me-2"></i> Email</h5>
                            <p class="fs-5">{{ $profile->email ?? 'humas@sman1yogya.sch.id' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Info -->
                <div class="col-lg-4">
                    <div class="card shadow-sm p-4 sticky-top" style="top: 100px;">
                        <h5 class="fw-bold mb-3">Informasi Singkat</h5>
                        <ul class="list-unstyled">
                            <li class="d-flex justify-content-between py-2 border-bottom">
                                <span>NSS / NPSN</span>
                                <strong>{{ $profile->nss ?? '1234567890' }} / {{ $profile->npsn ?? '12345678' }}</strong>
                            </li>
                            <li class="d-flex justify-content-between py-2 border-bottom">
                                <span>Akreditasi</span>
                                <strong class="text-success">A (Unggul)</strong>
                            </li>
                            <li class="d-flex justify-content-between py-2 border-bottom">
                                <span>Jumlah Siswa</span>
                                <strong>1.280 orang</strong>
                            </li>
                            <li class="d-flex justify-content-between py-2 border-bottom">
                                <span>Jumlah Guru</span>
                                <strong>92 orang</strong>
                            </li>
                            <li class="d-flex justify-content-between py-2">
                                <span>Kurikulum</span>
                                <strong>Merdeka + Cambridge</strong>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Sejarah Sekolah -->
            <div class="mt-5 pt-5 border-top">
                <h2 class="section-title mb-4">Sejarah Singkat</h2>
                <div class="row">
                    <div class="col-lg-8">
                        <p>
                            SMA Negeri 1 Yogyakarta didirikan pada tahun 1950 sebagai salah satu sekolah menengah atas pertama di wilayah Yogyakarta. 
                            Sejak awal berdiri, sekolah ini telah menjadi teladan dalam bidang akademik dan non-akademik. 
                            Banyak alumni yang berhasil menjadi tokoh nasional, akademisi, dan pemimpin di berbagai bidang.
                        </p>
                        <p class="mt-3">
                            Saat ini, kami terus berinovasi dengan menerapkan teknologi dalam pembelajaran dan mengembangkan program unggulan berbasis STEM, seni, serta kepemimpinan.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Visi & Misi -->
            <div class="mt-5 pt-5 border-top">
                <h2 class="section-title text-center mb-5">Visi dan Misi</h2>
                <div class="row g-5">
                    <div class="col-lg-6">
                        <div class="card h-100 p-5 shadow-sm">
                            <h3 class="text-primary mb-4"><i class="fas fa-eye fa-2x"></i> Visi</h3>
                            <p class="fs-5">
                                {{ $profile->vision ?? 'Menjadi sekolah unggulan nasional yang menghasilkan lulusan beriman, bertakwa, berprestasi, berwawasan global, dan berkontribusi positif bagi masyarakat pada tahun 2035.' }}
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card h-100 p-5 shadow-sm">
                            <h3 class="text-primary mb-4"><i class="fas fa-bullseye fa-2x"></i> Misi</h3>
                            <ul class="list-unstyled fs-5">
                                @foreach(['Menyelenggarakan pendidikan berkualitas berbasis karakter dan teknologi', 
                                         'Mengembangkan seluruh potensi siswa secara optimal', 
                                         'Membangun kerjasama sinergis dengan orang tua, alumni, dan masyarakat'] as $misi)
                                    <li class="mb-3">• {{ $misi }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kepala Sekolah -->
            <div class="mt-5 pt-5 border-top">
                <h2 class="section-title mb-4 text-center">Kepala Sekolah</h2>
                <div class="text-center">
                    <img src="{{ $profile->principal_photo ? asset('storage/'.$profile->principal_photo) : 'https://source.unsplash.com/500x500/?man,teacher,portrait' }}" 
                         class="rounded-circle shadow-lg mb-4" width="280" alt="Kepala Sekolah">
                    <h4>{{ $profile->principal_name ?? 'Drs. Ahmad Santoso, M.Pd' }}</h4>
                    <p class="text-muted">Kepala Sekolah</p>
                    <div class="mt-4" style="max-width: 700px; margin: 0 auto;">
                        <p class="fst-italic">
                            "Kami berkomitmen untuk terus meningkatkan kualitas pendidikan dan membentuk siswa yang tidak hanya cerdas secara intelektual, tetapi juga berakhlak mulia."
                        </p>
                    </div>
                </div>
            </div>

            <!-- Tenaga Pendidik / Guru -->
            <div class="mt-5 pt-5 border-top">
                <h2 class="section-title text-center mb-5">Tenaga Pendidik</h2>
                <div class="row g-4">
                    @if(isset($teachers) && $teachers->count() > 0)
                        @foreach($teachers as $teacher)
                        <div class="col-md-3 col-sm-6">
                            <div class="card text-center h-100">
                                <img src="{{ $teacher->photo ? asset('storage/'.$teacher->photo) : 'https://source.unsplash.com/400x400/?teacher' }}" 
                                     class="card-img-top" style="height: 220px; object-fit: cover;" alt="">
                                <div class="card-body">
                                    <h6 class="fw-bold">{{ $teacher->name }}</h6>
                                    <small class="text-muted">{{ $teacher->position ?? 'Guru Mata Pelajaran' }}</small>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <!-- Data dummy jika belum ada data -->
                        <div class="col-md-3 col-sm-6">
                            <div class="card text-center h-100">
                                <img src="https://source.unsplash.com/400x400/?teacher,woman" class="card-img-top" style="height: 220px; object-fit: cover;" alt="">
                                <div class="card-body">
                                    <h6 class="fw-bold">Dra. Siti Aminah</h6>
                                    <small class="text-muted">Guru Matematika</small>
                                </div>
                            </div>
                        </div>
                        <!-- Tambahkan dummy lain jika perlu -->
                    @endif
                </div>
            </div>

            <!-- Fasilitas Sekolah -->
            <div class="mt-5 pt-5 border-top">
                <h2 class="section-title text-center mb-5">Fasilitas Sekolah</h2>
                <div class="row g-4">
                    @foreach(['Ruang Kelas Ber-AC & Smart Board', 'Laboratorium IPA & Komputer', 'Perpustakaan Digital', 'Lapangan Olahraga', 'Aula Serbaguna', 'Kantin Sehat'] as $facility)
                    <div class="col-md-4">
                        <div class="card h-100 text-center p-4">
                            <i class="fas fa-check-circle fa-3x text-success mb-3"></i>
                            <h5>{{ $facility }}</h5>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </section>

@endsection