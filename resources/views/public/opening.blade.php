@extends('public.layouts.main')

@section('title', 'Kata Sambutan Kepala Sekolah')

@section('content')

{{-- Container Utama dengan Padding Top lebih besar karena tidak ada Header --}}
<div class="max-w-7xl mx-auto px-6 py-10 relative overflow-hidden">

    <div class="flex flex-col lg:flex-row gap-16 items-start">

        <div class="w-full lg:w-[400px] flex-shrink-0">
            <div class="sticky top-28">
                <div class="relative group">
                    {{-- Bingkai Hiasan --}}
                    <div class="absolute inset-0 border-2 border-[#48c3d9] rounded-[2.5rem] translate-x-4 translate-y-4 -z-10 transition-transform group-hover:translate-x-2 group-hover:translate-y-2"></div>
                    
                    <img src="https://images.unsplash.com/photo-1544168190-79c17527004f?q=80&w=800" 
                         class="w-full aspect-[3/4] rounded-[2.5rem] shadow-xl object-cover bg-gray-200"
                         alt="Kepala Sekolah">
                    
                    {{-- Badge Jabatan Floating --}}
                    <div class="absolute -bottom-4 -right-4 bg-white shadow-lg px-6 py-3 rounded-2xl border border-gray-100 z-20">
                        <p class="text-xs font-bold text-gray-400 uppercase tracking-widest">Jabatan</p>
                        <p class="text-[#48c3d9] font-bold">Kepala Sekolah</p>
                    </div>
                </div>
                
                <div class="mt-12 text-center lg:text-left px-2">
                    <h3 class="text-3xl font-extrabold text-gray-900 tracking-tight">Drs. Ahmad Suryanto, M.Pd</h3>
                    <p class="text-gray-500 font-medium mt-1">NIP. 19700101 199501 1 001</p>
                    
                    {{-- Social Media / Kontak Kecil --}}
                    <div class="flex justify-center lg:justify-start gap-4 mt-6">
                        <span class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-400 hover:bg-[#48c3d9] hover:text-white transition-all cursor-pointer">
                            <i class="fab fa-instagram"></i>
                        </span>
                        <span class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-400 hover:bg-[#48c3d9] hover:text-white transition-all cursor-pointer">
                            <i class="fab fa-facebook-f"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full flex-1">
            <div class="relative bg-white rounded-[3.5rem] shadow-2xl shadow-gray-200/50 border border-gray-100 overflow-hidden">
                
                {{-- Aksen Garis di Atas Card --}}
                <div class="absolute top-0 left-0 right-0 h-2 bg-gradient-to-r from-[#48c3d9] to-blue-600"></div>

                <div class="p-8 md:p-16">
                    {{-- Judul di Dalam Card --}}
                    <div class="mb-12">
                        <div class="flex items-center gap-3 mb-2">
                            <div class="w-12 h-[2px] bg-[#48c3d9]"></div>
                            <span class="text-[#48c3d9] font-bold tracking-[0.2em] uppercase text-sm">Welcome Message</span>
                        </div>
                        <h2 class="text-4xl md:text-5xl font-black text-gray-900 tracking-tight">
                            Kata Sambutan <br>
                            <span class="text-transparent bg-clip-text bg-gradient-to-r from-gray-900 to-gray-500">Kepala Sekolah</span>
                        </h2>
                    </div>

                    {{-- Isi Teks --}}
                    <div class="prose prose-xl prose-slate max-w-none">
                        <p class="text-2xl font-light text-blue-600 leading-relaxed mb-10 italic">
                            "Assalamu'alaikum Warahmatullahi Wabarakatuh,"
                        </p>

                        <div class="space-y-6 text-gray-600 leading-relaxed text-lg">
                            <p>
                                Selamat datang di website resmi SMA Negeri 1 Tawangsari. Puji syukur kita panjatkan ke hadirat Allah SWT atas segala rahmat-Nya, sehingga kita dapat terus berkarya dalam dunia pendidikan.
                            </p>

                            <div class="relative py-8 my-8 border-y border-gray-50 flex items-center gap-8">
                                <span class="text-6xl text-[#48c3d9]/20 absolute -left-4 top-4 font-serif">“</span>
                                <p class="relative z-10 font-medium text-gray-800 italic text-xl pl-6">
                                    SMA Negeri 1 Tawangsari hadir sebagai lembaga pendidikan yang berkomitmen membentuk generasi muda yang berkarakter, berprestasi, dan berintegritas tinggi.
                                </p>
                            </div>

                            <p>
                                Dengan motto <strong class="text-gray-900 underline decoration-[#48c3d9] decoration-4 underline-offset-4">“Berkarakter, Berprestasi, dan Berintegritas”</strong>, kami terus berupaya memberikan pendidikan yang tidak hanya unggul secara akademik, tetapi juga membangun karakter siswa yang kuat.
                            </p>

                            <p>
                                Melalui Kurikulum Merdeka dan fasilitas modern, kami berusaha menciptakan lingkungan belajar yang kondusif bagi setiap siswa untuk melahirkan generasi emas bangsa.
                            </p>
                        </div>

                        <div class="mt-16 pt-10 border-t border-gray-100 flex flex-col sm:flex-row justify-between items-end gap-8">
                            <div class  ="text-gray-400 text-sm italic">
                                Diterbitkan pada: April 2026
                            </div>
                            <div class="text-right">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/3/3a/Jon_Kirsch%27s_Signature.png" class="h-16 mb-4 opacity-70 mix-blend-multiply ml-auto grayscale hover:grayscale-0 transition-all" alt="Signature">
                                <p class="text-xl font-bold text-gray-900">Drs. Ahmad Suryanto, M.Pd</p>
                                <p class="text-[#48c3d9] font-medium">Kepala Sekolah</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection