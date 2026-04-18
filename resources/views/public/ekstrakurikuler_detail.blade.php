@extends('public.layouts.main')

@section('title', $extra->name . ' - Ekstrakurikuler')

@section('content') 

    <div class="relative h-[65vh] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1541339907198-e08756ebafe3?ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80')] bg-cover bg-center"></div>
        <div class="absolute inset-0 bg-gradient-to-tr from-gray-900 via-gray-900/70 to-transparent"></div>
        
        <div class="absolute -top-24 -right-24 w-96 h-96 bg-[#48c3d9]/20 rounded-full blur-3xl"></div>
        
        <div class="relative z-10 text-left px-6 max-w-7xl mx-auto w-full">
            <div class="max-w-3xl">
                <span class="inline-block px-4 py-1.5 bg-[#48c3d9] text-gray-900 text-xs font-bold uppercase tracking-widest rounded-md mb-6 shadow-lg shadow-[#48c3d9]/20">
                    Ekstrakurikuler
                </span>
                <h1 class="text-5xl md:text-7xl font-extrabold text-white leading-tight mb-6">
                    Ekskul <span class="text-[#48c3d9] relative">{{ $extra->name }}
                    </span>
                </h1>
                <p class="text-lg md:text-xl text-white/80 font-light leading-relaxed border-l-4 border-[#48c3d9] pl-6 border-l-4 border-[#48c3d9] pl-6">
                    Program pengembangan bakat SMA Negeri 1 Tawangsari
                </p>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-6 py-12 md:py-20">
        <div class="grid lg:grid-cols-12 gap-12">

            <div class="lg:col-span-8">
                <div class="prose prose-emerald prose-lg max-w-none text-gray-600 leading-relaxed">
                    <h2 class="text-3xl font-bold text-gray-800 mb-6">Tentang {{ $extra->name }}</h2>
                    {!! nl2br(e($extra->description)) !!}
                </div>

                <div class="mt-16 bg-white border border-gray-100 shadow-sm rounded-3xl p-8 md:p-10">
                    <h3 class="text-2xl font-bold mb-8 text-gray-800 flex items-center gap-3">
                        <span class="w-8 h-1 bg-[#48c3d9]/20 -500 rounded-full"></span>
                        Detail Kegiatan
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="flex gap-5">
                            <div class="w-12 h-12 bg-[#48c3d9]/20 -50 text-[#48c3d9] rounded-2xl flex items-center justify-center flex-shrink-0 text-xl shadow-sm">
                                <i class="far fa-calendar-alt"></i>
                            </div>
                            <div>
                                <p class="font-bold text-gray-800 mb-1">Jadwal Latihan</p>
                                <p class="text-gray-500 leading-relaxed">Sesuai kesepakatan anggota & pembina (Umumnya 2x seminggu)</p>
                            </div>
                        </div>
                        <div class="flex gap-5">
                            <div class="w-12 h-12 bg-[#48c3d9]/20 -50 text-[#48c3d9] rounded-2xl flex items-center justify-center flex-shrink-0 text-xl shadow-sm">
                                <i class="fas fa-users"></i>
                            </div>
                            <div>
                                <p class="font-bold text-gray-800 mb-1">Target Peserta</p>
                                <p class="text-gray-500 leading-relaxed">Terbuka untuk seluruh siswa Kelas X, XI, & XII</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-4">
                <div class="sticky top-24 space-y-8">

                    <div class="bg-white border border-gray-100 rounded-[2rem] p-8 text-center shadow-xl shadow-gray-100/50">
                        <div class="mx-auto w-32 h-32 bg-gray-50 rounded-[2rem] flex items-center justify-center shadow-inner mb-6 overflow-hidden border-4 border-white">
                            @if($extra->image)
                                <img src="{{ $extra->image_url }}" class="w-full h-full object-cover" alt="Logo">
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-gray-100 text-gray-400">
                                    <i class="fas fa-layer-group text-4xl"></i>
                                </div>
                            @endif
                        </div>
                        <h4 class="font-bold text-xl text-gray-800">{{ $extra->name }}</h4>
                        <p class="text-[#48c3d9] font-medium text-sm mt-1 uppercase tracking-wider">Unit Kegiatan Siswa</p>
                        
                        <hr class="my-6 border-gray-100">

                        <div class="space-y-5 text-left text-sm">
                            <div class="flex items-start gap-3">
                                <i class="fas fa-user-tie mt-1 text-gray-400"></i>
                                <div>
                                    <span class="text-[10px] uppercase font-bold text-gray-400 block tracking-widest">Pembina</span>
                                    <p class="font-semibold text-gray-700">Staff Kesiswaan / Guru Ahli</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-3">
                                <i class="fas fa-map-marker-alt mt-1 text-gray-400"></i>
                                <div>
                                    <span class="text-[10px] uppercase font-bold text-gray-400 block tracking-widest">Lokasi</span>
                                    <p class="font-semibold text-gray-700">Lingkungan SMAN 1 Tawangsari</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-900 rounded-[2rem] p-8 relative overflow-hidden group">
                        <div class="absolute -right-10 -bottom-10 w-32 h-32 bg-emerald-500/20 rounded-full blur-3xl group-hover:bg-emerald-500/40 transition-all duration-700"></div>
                        <h4 class="font-bold text-white text-xl mb-4 relative z-10">Siap Bergabung?</h4>
                        <p class="text-gray-400 text-sm leading-relaxed mb-6 relative z-10">
                            Kembangkan potensimu bersama komunitas {{ $extra->name }}. Pendaftaran dibuka setiap awal semester.
                        </p>
                        <a href="https://wa.me/your-number" target="_blank"
                            class="flex items-center justify-center gap-2 w-full bg-emerald-500 hover:bg-emerald-600 text-white py-4 rounded-2xl font-bold transition-all transform hover:scale-[1.02] active:scale-95 shadow-lg shadow-emerald-500/25 relative z-10">
                            <i class="fab fa-whatsapp text-lg"></i>
                            Daftar Sekarang
                        </a>
                    </div>

                </div>
            </div>
        </div>

        @if($others && $others->count() > 0)
            <div class="mt-32">
                <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 gap-4">
                    <div>
                        <h3 class="text-3xl font-extrabold text-gray-900">Eksplorasi Lainnya</h3>
                        <p class="text-gray-500 mt-2">Temukan kegiatan menarik lainnya di sekolah kami</p>
                    </div>
                    <div class="h-1 flex-1 bg-gray-100 mb-2 mx-8 hidden md:block"></div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($others as $item)
                        <a href="{{ route('ekstrakurikuler.detail', $item->id) }}"
                            class="group bg-white border border-gray-100 rounded-[2.5rem] overflow-hidden transition-all duration-500 hover:shadow-2xl hover:shadow-gray-200/50 hover:-translate-y-2">
                            
                            <div class="h-56 bg-gray-200 relative overflow-hidden">
                                <img src="{{ $item->image_url ?? 'https://source.unsplash.com/600x400/?activity' }}"
                                     class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                                     alt="{{ $item->name }}">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                            </div>

                            <div class="p-8">
                                <h4 class="font-bold text-xl text-gray-800 group-hover:text-[#48c3d9] transition-colors">
                                    {{ $item->name }}
                                </h4>
                                <p class="text-gray-500 text-sm mt-3 line-clamp-2 font-light leading-relaxed">
                                    {{ $item->description ?? 'Lihat detail kegiatan dan program kerja untuk unit ini.' }}
                                </p>
                                <div class="mt-6 flex items-center text-[#48c3d9] font-bold text-sm">
                                    Lihat Detail <i class="fas fa-arrow-right ml-2 text-xs transition-transform group-hover:translate-x-2"></i>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif
    </div>

@endsection