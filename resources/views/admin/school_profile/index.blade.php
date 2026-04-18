@extends('admin.layouts.main')

@section('title', 'Profil Sekolah')

@section('content')

    <div class="max-w-8xl mx-auto">
        <form action="{{ route('school.profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="bg-white rounded-[2.5rem] shadow-xl shadow-gray-200/50 border border-gray-100 p-8 mb-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="text-sm font-bold text-gray-700 ml-1">Nama Sekolah</label>
                        <input type="text" name="school_name" 
                               value="{{ $profile->school_name ?? '' }}" 
                               placeholder="Masukkan nama resmi sekolah" 
                               class="w-full px-5 py-3.5 bg-gray-50 border border-gray-200 rounded-2xl focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-500/5 transition-all text-sm" required>
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-bold text-gray-700 ml-1">Email Sekolah</label>
                        <input type="email" name="email" 
                               value="{{ $profile->email ?? '' }}" 
                               placeholder="sekolah@contoh.sch.id" 
                               class="w-full px-5 py-3.5 bg-gray-50 border border-gray-200 rounded-2xl focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-500/5 transition-all text-sm">
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-bold text-gray-700 ml-1">Telepon / WhatsApp</label>
                        <input type="text" name="phone" inputmode="tel" 
                               oninput="this.value = this.value.replace(/[^0-9+\- ]/g, '');" 
                               value="{{ $profile->phone ?? '' }}" 
                               placeholder="0271-xxxxxx" 
                               class="w-full px-5 py-3.5 bg-gray-50 border border-gray-200 rounded-2xl focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-500/5 transition-all text-sm">
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-bold text-gray-700 ml-1">Logo Sekolah</label>
                        <div class="flex items-center gap-5">
                            <div class="relative group">
                                <div class="w-24 h-24 bg-gray-50 rounded-[2rem] overflow-hidden border-2 border-dashed border-gray-200 flex items-center justify-center transition-all group-hover:border-blue-400">
                                    <img id="logoPreview" 
                                         src="{{ !empty($profile->logo) ? asset('storage/'.$profile->logo) : asset('images/no-logo.png') }}" 
                                         class="w-full h-full object-contain p-2">
                                </div>
                            </div>
                            <div class="flex-1">
                                <input type="file" name="logo" id="logoInput" accept="image/*"
                                       class="block w-full text-xs text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-blue-50 file:text-blue-600 hover:file:bg-blue-100 transition-all cursor-pointer">
                                <p class="text-[10px] text-gray-400 mt-2 italic">*Rekomendasi format PNG transparan.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-span-1 md:col-span-2 space-y-2">
                        <label class="text-sm font-bold text-gray-700 ml-1">Alamat Lengkap</label>
                        <textarea name="address" rows="2" 
                                  placeholder="Jl. Raya Nomor... " 
                                  class="w-full px-5 py-3.5 bg-gray-50 border border-gray-200 rounded-2xl focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-500/5 transition-all text-sm">{{ $profile->address ?? '' }}</textarea>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-[2.5rem] shadow-xl shadow-gray-200/50 border border-gray-100 p-8 mb-24">
                <div class="flex items-center gap-4 mb-8">
                    <div class="w-12 h-12 bg-amber-50 text-amber-600 rounded-2xl flex items-center justify-center">
                        <i class="fas fa-lightbulb text-xl"></i>
                    </div>
                    <div>
                        <h5 class="text-xl font-bold text-gray-800">Visi, Misi & Budaya</h5>
                        <p class="text-gray-400 text-sm">Nilai-nilai luhur dan tujuan sekolah.</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="text-sm font-bold text-gray-700 ml-1">Visi</label>
                        <textarea name="vision" rows="4" 
                                  class="w-full px-5 py-3.5 bg-gray-50 border border-gray-200 rounded-2xl focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-500/5 transition-all text-sm leading-relaxed">{{ $profile->vision ?? '' }}</textarea>
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-bold text-gray-700 ml-1">Misi</label>
                        <textarea name="mission" rows="4" 
                                  class="w-full px-5 py-3.5 bg-gray-50 border border-gray-200 rounded-2xl focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-500/5 transition-all text-sm leading-relaxed">{{ $profile->mission ?? '' }}</textarea>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
                    <div class="space-y-2">
                        <label class="text-sm font-bold text-gray-700 ml-1">Motto</label>
                        <textarea name="motto" rows="2" 
                                  class="w-full px-5 py-3.5 bg-gray-50 border border-gray-200 rounded-2xl focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-500/5 transition-all text-sm">{{ $profile->motto ?? '' }}</textarea>
                    </div>
                    <div class="space-y-2">
                        <label class="text-sm font-bold text-gray-700 ml-1">Yel-yel</label>
                        <textarea name="yelyel" rows="2" 
                                  class="w-full px-5 py-3.5 bg-gray-50 border border-gray-200 rounded-2xl focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-500/5 transition-all text-sm">{{ $profile->yelyel ?? '' }}</textarea>
                    </div>
                    <div class="space-y-2">
                        <label class="text-sm font-bold text-gray-700 ml-1">Lagu Mars Sekolah</label>
                        <textarea name="mars" rows="2" 
                                  class="w-full px-5 py-3.5 bg-gray-50 border border-gray-200 rounded-2xl focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-500/5 transition-all text-sm">{{ $profile->mars ?? '' }}</textarea>
                    </div>
                </div>
            </div>

            <div class="fixed bottom-0 left-0 right-0 md:left-64 bg-white/80 backdrop-blur-lg border-t border-gray-100 p-4 z-10">
                <div class="max-w-8xl mx-auto flex justify-end px-6">
                    <button type="submit" 
                            class="flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-10 py-3.5 rounded-2xl font-bold transition-all shadow-lg shadow-blue-600/20 active:scale-95 text-sm">
                        <i class="fas fa-save"></i>
                        Simpan Perubahan
                    </button>
                </div>
            </div>
        </form>
    </div>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                timer: 2500,
                showConfirmButton: false,
                customClass: { popup: 'rounded-[2rem]' }
            });
        @endif

        @if(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: '{{ session('error') }}',
                customClass: { popup: 'rounded-[2rem]' }
            });
        @endif
    });

    document.getElementById('logoInput').onchange = evt => {
        const [file] = document.getElementById('logoInput').files;
        if (file) {
            if (file.type.startsWith('image/')) {
                document.getElementById('logoPreview').src = URL.createObjectURL(file);
            } else {
                Swal.fire({
                    icon: 'warning',
                    title: 'File tidak valid',
                    text: 'Mohon pilih file gambar (JPG, PNG, atau WebP).',
                    customClass: { popup: 'rounded-[2rem]' }
                });
            }
        }
    }
</script>
@endpush