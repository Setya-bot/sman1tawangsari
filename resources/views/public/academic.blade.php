@extends('public.layouts.main')

@section('title', 'Informasi Akademik - SMA Negeri 1 Tawangsari')

@section('content')
    <div class="relative h-[65vh] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1541339907198-e08756ebafe3?ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80')] bg-cover bg-center"></div>
        <div class="absolute inset-0 bg-gradient-to-tr from-gray-900 via-gray-900/70 to-transparent"></div>
        
        <div class="absolute top-20 right-20 w-64 h-64 bg-[#48c3d9]/10 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute bottom-10 left-10 w-40 h-40 bg-white/5 rounded-full blur-2xl"></div>
        
        <div class="relative z-10 text-left px-6 max-w-7xl mx-auto w-full">
            <div class="max-w-3xl">
                <span class="inline-block px-4 py-1.5 bg-[#48c3d9] text-gray-900 text-xs font-bold uppercase tracking-[0.2em] rounded-md mb-6 shadow-lg shadow-[#48c3d9]/20">
                    Academic Excellence
                </span>
                <h1 class="text-5xl md:text-7xl font-extrabold text-white leading-tight mb-6">
                    Sistem <span class="text-[#48c3d9] relative inline-block">Akademik
                    </span>
                </h1>
                <p class="text-lg md:text-xl text-white/80 font-light leading-relaxed border-l-4 border-[#48c3d9] pl-6">
                    Implementasi Kurikulum Merdeka yang adaptif, inovatif, dan berorientasi pada masa depan siswa.
                </p>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-6 py-20 relative">
        
        <div class="relative mb-32">
            <div class="max-w-3xl mx-auto text-center mb-20 relative z-10">
                <h2 class="text-4xl font-bold text-gray-900 mb-6">Filosofi Kurikulum Merdeka</h2>
                <p class="text-lg text-gray-600 leading-relaxed">
                    Kami percaya setiap siswa memiliki potensi unik. Pendekatan <span class="text-[#48c3d9] font-bold">Student-Centered Learning</span> kami memastikan setiap individu mendapatkan ruang untuk bertumbuh sesuai minatnya.
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 relative z-10">
                @foreach([
                    ['icon' => '🚀', 'title' => 'Project Based Learning', 'label' => 'Metode'],
                    ['icon' => '🛡️', 'title' => 'Profil Pelajar Pancasila', 'label' => 'Karakter'],
                    ['icon' => '🎯', 'title' => 'Fleksibilitas Peminatan', 'label' => 'Sistem'],
                    ['icon' => '💻', 'title' => 'Integrasi Digital', 'label' => 'Teknologi'],
                    ['icon' => '📊', 'title' => 'Asesmen Adaptif', 'label' => 'Evaluasi'],
                    ['icon' => '🤝', 'title' => 'Kolaborasi Industri', 'label' => 'Networking']
                ] as $keunggulan)
                <div class="group bg-white p-8 rounded-[2.5rem] border border-gray-100 hover:border-[#48c3d9] hover:shadow-2xl hover:shadow-[#48c3d9]/10 transition-all duration-500">
                    <div class="w-16 h-16 bg-gray-50 rounded-2xl flex items-center justify-center text-3xl mb-6 group-hover:bg-[#48c3d9]/10 group-hover:scale-110 transition-all duration-500">
                        {{ $keunggulan['icon'] }}
                    </div>
                    <span class="text-[10px] font-bold text-[#48c3d9] uppercase tracking-widest mb-2 block">{{ $keunggulan['label'] }}</span>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $keunggulan['title'] }}</h3>
                    <div class="h-1 w-12 bg-gray-100 group-hover:w-20 group-hover:bg-[#48c3d9] transition-all duration-500"></div>
                </div>
                @endforeach
            </div>
            
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full h-1/2 bg-[#48c3d9]/5 -skew-y-3 rounded-[3rem] -z-10"></div>
        </div>

        <div class="mb-32">
            <div class="flex items-end justify-between mb-12">
                <div class="max-w-2xl">
                    <h2 class="text-4xl font-bold text-gray-900 mb-4">Konsentrasi Pembelajaran</h2>
                    <p class="text-gray-500">Pilihan rumpun mata pelajaran yang dirancang untuk persiapan jenjang perguruan tinggi.</p>
                </div>
                <div class="hidden lg:block h-px flex-1 bg-gray-100 mx-10 mb-4"></div>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                @php
                    $peminatan = [
                        ['title' => 'MIPA', 'sub' => 'Sains & Teknologi', 'icon' => '🔬', 'color' => '#48c3d9', 'list' => ['Matematika Lanjut', 'Fisika Dasar', 'Kimia Analitik', 'Biologi Molekuler']],
                        ['title' => 'IPS', 'sub' => 'Sosial & Humaniora', 'icon' => '📊', 'color' => '#111827', 'list' => ['Ekonomi Bisnis', 'Sosiologi Terapan', 'Geografi Regional', 'Sejarah Dunia']],
                        ['title' => 'Bahasa', 'sub' => 'Literasi & Komunikasi', 'icon' => '🗣️', 'color' => '#64748b', 'list' => ['Sastra Indonesia', 'English Proficiency', 'Bahasa Asing', 'Antropologi Budaya']]
                    ];
                @endphp

                @foreach($peminatan as $p)
                <div class="group relative bg-white border border-gray-100 rounded-[3rem] p-10 overflow-hidden hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-gray-50 rounded-bl-[5rem] -z-10 group-hover:bg-opacity-50 transition-all"></div>
                    <div class="text-5xl mb-6">{{ $p['icon'] }}</div>
                    <h3 class="text-3xl font-black text-gray-900 mb-1">{{ $p['title'] }}</h3>
                    <p class="text-xs font-bold uppercase tracking-widest mb-8" style="color: {{ $p['color'] }}">{{ $p['sub'] }}</p>
                    
                    <ul class="space-y-4">
                        @foreach($p['list'] as $item)
                        <li class="flex items-center gap-3 text-sm text-gray-600">
                            <span class="w-1.5 h-1.5 rounded-full" style="background-color: {{ $p['color'] }}"></span>
                            {{ $item }}
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endforeach
            </div>
        </div>

        <div class="grid gap-8 mb-32">
            <div class="lg:col-span-3">
                <div class="flex items-center gap-4 mb-10">
                    <h2 class="text-3xl font-bold text-gray-900">Agenda Akademik</h2>
                    <span class="px-4 py-1 bg-gray-900 text-white text-[10px] font-bold rounded-full uppercase tracking-tighter">Tahun Ajaran 2024/2025</span>
                </div>
                
                <div class="bg-white rounded-[2.5rem] shadow-2xl shadow-gray-200/50 border border-gray-50 overflow-hidden">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50/50 border-b border-gray-100">
                                <th class="p-6 text-[10px] font-bold text-gray-400 uppercase tracking-widest">Event</th>
                                <th class="p-6 text-[10px] font-bold text-gray-400 uppercase tracking-widest">Timeline</th>
                                <th class="p-6 text-[10px] font-bold text-gray-400 uppercase tracking-widest text-right">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            @foreach([
                                ['MPLS Siswa Baru', '15-17 Juli 2024', 'Selesai'],
                                ['Awal Tahun Pelajaran', '18 Juli 2024', 'Aktif'],
                                ['Asesmen Tengah Semester', '23-27 Sept 2024', 'Mendatang'],
                                ['Libur Akhir Semester', '23 Des - 5 Jan 2025', 'Mendatang']
                            ] as $event)
                            <tr class="hover:bg-gray-50/50 transition-all group">
                                <td class="p-6 font-bold text-gray-800 group-hover:text-[#48c3d9]">{{ $event[0] }}</td>
                                <td class="p-6 text-sm text-gray-500 font-mono">{{ $event[1] }}</td>
                                <td class="p-6 text-right">
                                    <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase {{ $event[2] == 'Selesai' ? 'bg-green-100 text-green-600' : ($event[2] == 'Aktif' ? 'bg-blue-100 text-[#48c3d9]' : 'bg-gray-100 text-gray-400') }}">
                                        {{ $event[2] }}
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="bg-gray-900 rounded-[3.5rem] p-10 md:p-16 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-64 h-64 bg-[#48c3d9]/10 rounded-full blur-[100px] -mr-32 -mt-32"></div>
            
            <div class="relative z-10">
                <div class="flex flex-col md:flex-row md:items-center justify-between mb-12 gap-4">
                    <div>
                        <h2 class="text-3xl font-bold text-white mb-2">Simulasi Jadwal Harian</h2>
                        <p class="text-gray-400 text-sm">Contoh distribusi jam pelajaran efektif.</p>
                    </div>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
                    @foreach(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'] as $hari)
                    <div class="bg-white/5 border border-white/10 p-6 rounded-3xl hover:bg-white/10 transition-all cursor-default group">
                        <p class="text-[#48c3d9] font-bold text-xs uppercase tracking-[0.2em] mb-4">{{ $hari }}</p>
                        <div class="space-y-3">
                            <div class="h-1 w-full bg-white/10 rounded-full overflow-hidden">
                                <div class="h-full bg-[#48c3d9] w-2/3 group-hover:w-full transition-all duration-700"></div>
                            </div>
                            <p class="text-white text-sm font-medium">8 Jam Pelajaran</p>
                            <p class="text-gray-500 text-[10px]">Mulai 07.00 WIB</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection