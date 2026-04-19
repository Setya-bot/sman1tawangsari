@extends('public.layouts.main')

@section('title', 'Ekskul - SMA Negeri 1 Tawangsari')

@section('content')

    <div class="relative h-[65vh] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1541339907198-e08756ebafe3?ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80')] bg-cover bg-center"></div>
        <div class="absolute inset-0 bg-gradient-to-tr from-gray-900 via-gray-900/70 to-transparent"></div>
        
        <div class="absolute -top-24 -right-24 w-96 h-96 bg-[#48c3d9]/20 rounded-full blur-3xl"></div>
        
        <div class="relative z-10 text-left px-6 max-w-7xl mx-auto w-full">
            <div class="max-w-3xl">
                <span class="inline-block px-4 py-1.5 bg-[#48c3d9] text-gray-900 text-xs font-bold uppercase tracking-widest rounded-md mb-6 shadow-lg shadow-[#48c3d9]/20">
                    Pengembangan Diri
                </span>
                <h1 class="text-5xl md:text-7xl font-extrabold text-white leading-tight mb-6">
                    Ekskul
                </h1>
                <p class="text-lg md:text-xl text-white/80 font-light leading-relaxed border-l-4 border-[#48c3d9] pl-6 border-l-4 border-[#48c3d9] pl-6">
                    Pilih kegiatan sesuai minat dan bakat untuk mengembangkan potensi diri siswa
                </p>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-6 py-20">

        <div class="flex flex-wrap justify-center gap-4 mb-20">
            @foreach(['Olahraga', 'Seni & Budaya', 'Sains & IT', 'Kepemimpinan', 'Religi'] as $cat)
                <div class="px-6 py-2 rounded-full border border-gray-100 bg-gray-50 text-gray-500 text-sm font-bold hover:bg-[#48c3d9] hover:text-white transition-all cursor-default">
                    # {{ $cat }}
                </div>
            @endforeach
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">

            @foreach($ekskuls as $ekskul)
            <div class="group relative">
                <div class="absolute inset-0 bg-[#48c3d9] rounded-[2.5rem] translate-x-2 translate-y-2 opacity-0 group-hover:opacity-100 transition-all duration-300 -z-10"></div>
                
                <a href="{{ route('ekskul.detail', $ekskul->id) }}"
                class="relative h-full bg-white border border-gray-100 rounded-[2.5rem] p-10 hover:border-[#48c3d9] transition-all duration-300 block overflow-hidden shadow-sm hover:shadow-2xl">
                    
                    <div class="relative w-20 h-20 mb-8">
                        <div class="absolute inset-0 bg-[#48c3d9]/10 rounded-2xl rotate-6 group-hover:rotate-12 transition-transform"></div>
                        <div class="absolute inset-0 rounded-2xl flex items-center justify-center text-4xl shadow-lg shadow-[#48c3d9]/20">
                             <img src="{{ $ekskul->image_url ?? 'https://source.unsplash.com/600x400/?activity' }}"
                                     class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                                     alt="{{ $ekskul->name }}">
                        </div>
                    </div>

                    <h3 class="text-2xl font-bold text-gray-900 mb-4 group-hover:text-[#48c3d9] transition-colors">
                        {{ $ekskul->name }}
                    </h3>

                    <p class="text-gray-500 leading-relaxed mb-8 text-sm italic">
                        "{{ Str::limit($ekskul->description, 110) }}"
                    </p>

                    <div class="flex items-center gap-2 text-[#48c3d9] font-bold text-xs uppercase tracking-widest">
                        Selengkapnya 
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transform group-hover:translate-x-2 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </div>
                </a>
            </div>
            @endforeach

        </div>

        <div class="mt-32 relative group">
            <div class="absolute -inset-1 bg-gradient-to-r from-[#48c3d9] to-emerald-400 rounded-[3rem] blur opacity-25 group-hover:opacity-50 transition duration-1000 group-hover:duration-200"></div>
            
            <div class="relative bg-white border border-gray-100 rounded-[3rem] p-12 md:p-16 flex flex-col md:flex-row items-center gap-12 overflow-hidden shadow-xl">
                <div class="w-full md:w-1/3 flex justify-center">
                    <div class="relative">
                        <div class="w-48 h-48 bg-[#48c3d9]/10 rounded-full animate-pulse"></div>
                        <span class="absolute inset-0 flex items-center justify-center text-8xl">📢</span>
                    </div>
                </div>

                <div class="w-full md:w-2/3 text-center md:text-left">
                    <h3 class="text-3xl font-black text-gray-900 mb-6 uppercase tracking-tight">Informasi Pendaftaran</h3>
                    <p class="text-gray-600 text-lg leading-relaxed mb-8">
                        Pendaftaran ekskul dibuka pada <span class="font-bold text-gray-900">Masa Pengenalan Lingkungan Sekolah (MPLS)</span>. 
                        Sesuai kurikulum nasional, <span class="text-[#48c3d9] font-bold">Pramuka merupakan ekskul wajib</span> bagi seluruh siswa kelas X.
                    </p>
                    <div class="flex flex-wrap gap-4 justify-center md:justify-start">
                        <div class="flex items-center gap-2 px-4 py-2 bg-gray-50 rounded-xl border border-gray-100">
                            <span class="w-2 h-2 bg-emerald-500 rounded-full"></span>
                            <span class="text-xs font-bold text-gray-500 uppercase">Kuota Terbatas</span>
                        </div>
                        <div class="flex items-center gap-2 px-4 py-2 bg-gray-50 rounded-xl border border-gray-100">
                            <span class="w-2 h-2 bg-orange-500 rounded-full"></span>
                            <span class="text-xs font-bold text-gray-500 uppercase">Sertifikat Resmi</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection