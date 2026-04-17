@extends('public.layouts.main')

@section('title', 'Beranda')

@section('content')

    <!-- ==================== HERO CAROUSEL ==================== -->
    <div id="heroCarousel" 
     class="carousel slide hero-carousel" 
     data-bs-ride="carousel" 
     data-bs-interval="5000"
     data-bs-pause="false">

    <!-- INDICATORS -->
    <div class="carousel-indicators">
        @foreach($carousels as $key => $carousel)
            <button type="button"
                data-bs-target="#heroCarousel"
                data-bs-slide-to="{{ $key }}"
                class="{{ $key == 0 ? 'active' : '' }}"
                aria-current="{{ $key == 0 ? 'true' : 'false' }}">
            </button>
        @endforeach
    </div>

    <!-- SLIDES -->
    <div class="carousel-inner">
        @foreach($carousels as $key => $carousel)
        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
            
            <!-- IMAGE -->
            <div class="carousel-bg"
                 style="background-image: url('{{ $carousel->image_url }}');">
            </div>

            <!-- OVERLAY -->
            <div class="carousel-overlay"></div>

            <!-- CONTENT -->
            <div class="carousel-caption text-center text-white">
                <h1 class="display-3">
                    {{ $carousel->title ?? $profile->school_name }}
                </h1>

                <p class="lead fs-3 mb-4">
                    {{ $carousel->description ?? $profile->motto }}
                </p>

                @if($carousel->link)
                    <a href="{{ $carousel->link }}" 
                       class="btn btn-light btn-lg px-5 py-3 rounded-pill fw-semibold">
                        Lihat Selengkapnya
                    </a>
                @endif
            </div>

        </div>
        @endforeach
    </div>

    <!-- CONTROL -->
    <button class="carousel-control-pre" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>

    <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>

</div>

    <!-- ==================== SAMBUTAN KEPALA SEKOLAH ==================== -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-4 text-center">
                    <img src="{{ $profile->principal_photo 
                        ? asset('storage/'.$profile->principal_photo) 
                        : 'https://source.unsplash.com/500x500/?man,teacher' }}"
                    class="rounded-circle shadow-lg"
                    width="280"
                    alt="Kepala Sekolah">
                    <h4 class="mt-4">
                        {{ $profile->principal_name ?? 'Nama Kepala Sekolah' }}
                    </h4>
                    <p class="text-muted">Kepala Sekolah</p>
                </div>
                <div class="col-lg-8">
                    <h2 class="section-title mb-4">Sambutan Kepala Sekolah</h2>
                    <p class="lead">
                        Assalamu'alaikum Wr. Wb.<br><br>
                        Selamat datang di website resmi SMA Negeri 1 Yogyakarta. 
                        Sebagai sekolah teladan, kami berkomitmen memberikan pendidikan holistik yang unggul secara akademik sekaligus membentuk karakter siswa yang berakhlak mulia, kreatif, dan siap menghadapi tantangan masa depan.
                    </p>
                    <p>Kami mengundang seluruh calon siswa dan orang tua untuk bergabung bersama kami dalam mewujudkan generasi emas bangsa.</p>
                    <p class="fw-bold mt-4">Wassalamu'alaikum Wr. Wb.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== VISI & MISI ==================== -->
    <section class="py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6">
                    <div class="card h-100 p-5 shadow-sm">
                        <h3 class="text-primary mb-4"><i class="fas fa-eye fa-2x"></i> Visi</h3>
                        <p class="fs-5">
                            Menjadi sekolah unggulan nasional yang menghasilkan lulusan beriman, bertakwa, berprestasi, 
                            berwawasan global, dan berkontribusi positif bagi masyarakat pada tahun 2035.
                        </p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card h-100 p-5 shadow-sm">
                        <h3 class="text-primary mb-4"><i class="fas fa-bullseye fa-2x"></i> Misi</h3>
                        <ul class="list-unstyled fs-5">
                            <li class="mb-3">• Menyelenggarakan pendidikan berkualitas berbasis karakter dan teknologi</li>
                            <li class="mb-3">• Mengembangkan seluruh potensi siswa secara optimal</li>
                            <li class="mb-3">• Membangun kerjasama sinergis dengan orang tua, alumni, dan masyarakat</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== PROGRAM UNGGULAN ==================== -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="section-title text-center mb-5">Program Unggulan</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100 text-center p-4">
                        <i class="fas fa-laptop-code fa-4x text-primary mb-4"></i>
                        <h5 class="fw-bold">STEM & Coding Academy</h5>
                        <p class="mt-3">Program sains, teknologi, engineering, matematika, dan pemrograman tingkat lanjut.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 text-center p-4">
                        <i class="fas fa-globe-asia fa-4x text-success mb-4"></i>
                        <h5 class="fw-bold">International Class</h5>
                        <p class="mt-3">Kelas internasional dengan kurikulum Cambridge dan program pertukaran siswa.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 text-center p-4">
                        <i class="fas fa-palette fa-4x text-warning mb-4"></i>
                        <h5 class="fw-bold">Arts & Leadership</h5>
                        <p class="mt-3">Pengembangan seni, musik, tari tradisional, dan kepemimpinan siswa.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== STATISTIK ==================== -->
    <section class="py-5 text-white" style="background: linear-gradient(135deg, #0d6efd, #00c4a7);">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-3 col-6 mb-5">
                    <div class="stat-number fs-1 fw-bold">1,280</div>
                    <p class="fs-5 mt-2">Siswa Aktif</p>
                </div>
                <div class="col-md-3 col-6 mb-5">
                    <div class="stat-number fs-1 fw-bold">92</div>
                    <p class="fs-5 mt-2">Guru & Staff</p>
                </div>
                <div class="col-md-3 col-6 mb-5">
                    <div class="stat-number fs-1 fw-bold">98%</div>
                    <p class="fs-5 mt-2">Tingkat Kelulusan</p>
                </div>
                <div class="col-md-3 col-6 mb-5">
                    <div class="stat-number fs-1 fw-bold">45</div>
                    <p class="fs-5 mt-2">Prestasi Nasional 2025</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== TESTIMONI ==================== -->
    <section class="py-5">
        <div class="container">
            <h2 class="section-title text-center mb-5">Apa Kata Mereka</h2>
            <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active text-center">
                        <p class="fs-4 fst-italic mx-auto" style="max-width: 700px;">
                            "SMA N 1 Yogyakarta bukan hanya sekolah biasa. Di sini saya dibentuk menjadi pribadi disiplin, berprestasi, dan siap menghadapi dunia perkuliahan."
                        </p>
                        <p class="mt-4 fw-bold">— Rina Wijaya, Alumni 2024 (Mahasiswa Universitas Indonesia)</p>
                    </div>
                    <div class="carousel-item text-center">
                        <p class="fs-4 fst-italic mx-auto" style="max-width: 700px;">
                            "Fasilitas modern dan guru yang berkualitas membuat anak kami semakin percaya diri. Sangat direkomendasikan untuk orang tua yang menginginkan pendidikan terbaik."
                        </p>
                        <p class="mt-4 fw-bold">— Bapak Andi Pratama, Orang Tua Siswa Kelas XI</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== GALERI ==================== -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="section-title text-center mb-5">Galeri Sekolah</h2>
            <div class="row g-3">
                <div class="col-md-4"><img src="https://source.unsplash.com/800x600/?school,students" class="gallery-img img-fluid w-100 shadow" alt=""></div>
                <div class="col-md-4"><img src="https://source.unsplash.com/800x600/?classroom,modern" class="gallery-img img-fluid w-100 shadow" alt=""></div>
                <div class="col-md-4"><img src="https://source.unsplash.com/800x600/?lab,science" class="gallery-img img-fluid w-100 shadow" alt=""></div>
                <div class="col-md-4"><img src="https://source.unsplash.com/800x600/?sport,field" class="gallery-img img-fluid w-100 shadow" alt=""></div>
                <div class="col-md-4"><img src="https://source.unsplash.com/800x600/?graduation" class="gallery-img img-fluid w-100 shadow" alt=""></div>
                <div class="col-md-4"><img src="https://source.unsplash.com/800x600/?event,school" class="gallery-img img-fluid w-100 shadow" alt=""></div>
            </div>
        </div>
    </section>

    <!-- ==================== BERITA TERBARU ==================== -->
    <section class="py-5">
        <div class="container">
            <h2 class="section-title text-center mb-5">Berita & Pengumuman</h2>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100">
                        <img src="https://source.unsplash.com/600x400/?news,education" class="card-img-top" alt="">
                        <div class="card-body">
                            <small class="text-muted">16 April 2026</small>
                            <h5 class="card-title mt-3">Pengumuman Jadwal PPDB Tahun Pelajaran 2026/2027</h5>
                            <p class="card-text">Pendaftaran PPDB akan dibuka mulai 1 Mei 2026. Siapkan dokumen lengkap dan pantau informasi terbaru di website ini.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100">
                        <img src="https://source.unsplash.com/600x400/?award,student" class="card-img-top" alt="">
                        <div class="card-body">
                            <small class="text-muted">14 April 2026</small>
                            <h5 class="card-title mt-3">Tim Debat SMA N 1 Juara 1 Tingkat Provinsi DIY</h5>
                            <p class="card-text">Selamat kepada tim debat yang berhasil meraih juara pertama di kompetisi debat tingkat provinsi.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection