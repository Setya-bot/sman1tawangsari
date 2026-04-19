@extends('admin.layouts.main')

@section('title', 'Tambah Administrator')

@section('content')
<div class="pt-3 max-w-8xl mx-auto">
    <form action="{{ route('administrators.store') }}" 
          method="POST" 
          enctype="multipart/form-data" 
          id="adminForm">

        @csrf

        <div class="bg-white rounded-3xl shadow border border-gray-100 p-10">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                <!-- Nama -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Nama Lengkap & Gelar <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="name" value="{{ old('name') }}" required
                        class="w-full px-5 py-4 border border-gray-200 rounded-2xl focus:outline-none focus:border-[#48c3d9] focus:ring-1 focus:ring-[#48c3d9] transition-all"
                        placeholder="Contoh: Dr. Budi Santoso, M.Pd">
                    @error('name')
                        <p class="mt-1 text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Role -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Role <span class="text-red-500">*</span></label>
                    <select name="role" required
                        class="w-full px-5 py-4 border border-gray-200 rounded-2xl focus:outline-none focus:border-[#48c3d9] focus:ring-1 focus:ring-[#48c3d9] appearance-none bg-white">
                        <option value="">Pilih Role</option>
                        <option value="guru" {{ old('role') == 'guru' ? 'selected' : '' }}>Guru</option>
                        <option value="pengurus" {{ old('role') == 'pengurus' ? 'selected' : '' }}>Pengurus</option>
                        <option value="tendik" {{ old('role') == 'tendik' ? 'selected' : '' }}>Tendik</option>
                    </select>
                    @error('role')
                        <p class="mt-1 text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>

                <!-- NIP -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">NIP (Opsional)</label>
                    <input type="text" name="nip" value="{{ old('nip') }}"
                        class="w-full px-5 py-4 border border-gray-200 rounded-2xl focus:outline-none focus:border-[#48c3d9] focus:ring-1 focus:ring-[#48c3d9]"
                        placeholder="Masukkan NIP jika ada">
                    @error('nip')
                        <p class="mt-1 text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Keterangan -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Keterangan / Jabatan <span class="text-red-500">*</span></label>
                    <input type="text" name="keterangan" value="{{ old('keterangan') }}" required
                        class="w-full px-5 py-4 border border-gray-200 rounded-2xl focus:outline-none focus:border-[#48c3d9] focus:ring-1 focus:ring-[#48c3d9]"
                        placeholder="Contoh: Kepala Sekolah, Guru Seni Budaya, Staf TU">
                    @error('keterangan')
                        <p class="mt-1 text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Upload Foto -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-3">Foto Formal</label>
                    
                    <div id="uploadArea" 
                         onclick="document.getElementById('imageInput').click()" 
                         class="border-2 border-dashed border-gray-300 hover:border-[#48c3d9] rounded-2xl p-10 text-center cursor-pointer transition-all">
                        <i class="fas fa-camera text-5xl text-gray-400 mb-4"></i>
                        <p class="text-gray-600 font-medium">Klik atau tarik foto ke sini</p>
                        <p class="text-xs text-gray-400 mt-2">JPG, PNG • Maksimal 2MB</p>
                    </div>

                    <input type="file" name="image" id="imageInput" accept="image/*" class="hidden">

                    <!-- Preview -->
                    <div id="previewContainer" class="mt-6 hidden">
                        <div class="flex justify-center">
                            <div class="relative">
                                <img id="imagePreview" 
                                     class="h-52 w-44 rounded-2xl object-cover shadow-lg border-4 border-white" 
                                     alt="Preview">
                                <button type="button" id="removeImage"
                                    class="absolute -top-3 -right-3 bg-red-500 text-white w-7 h-7 rounded-full flex items-center justify-center text-xs hover:bg-red-600">
                                    ✕
                                </button>
                            </div>
                        </div>
                    </div>

                    @error('image')
                        <p class="mt-2 text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Status Aktif -->
                <div class="md:col-span-2">
                    <div class="flex items-center gap-3 bg-gray-50 p-5 rounded-2xl border border-gray-100">
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" name="is_active" id="is_active" value="1" 
                                   class="sr-only peer" {{ old('is_active', 1) ? 'checked' : '' }}>
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-[#48c3d9]"></div>
                        </label>
                        <span class="text-sm font-medium text-gray-700">Tampilkan di Halaman Publik</span>
                    </div>
                </div>

            </div>

            <!-- Tombol Aksi -->
            <div class="mt-12 flex justify-end gap-4">
                <a href="{{ route('administrators.index') }}" 
                   class="px-8 py-4 text-gray-600 hover:bg-gray-100 rounded-2xl font-medium transition-colors">
                    Batal
                </a>
                <button type="submit" id="submitBtn"
                    class="bg-[#48c3d9] hover:bg-[#3ab5cc] text-white font-semibold px-10 py-4 rounded-2xl flex items-center gap-3 transition-all shadow-lg shadow-[#48c3d9]/25 disabled:opacity-70">
                    <i class="fa-solid fa-circle-plus"></i>
                    <span id="btnText">Simpan Data</span>
                </button>
            </div>

        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('adminForm');
    const imageInput = document.getElementById('imageInput');
    const previewContainer = document.getElementById('previewContainer');
    const imagePreview = document.getElementById('imagePreview');
    const uploadArea = document.getElementById('uploadArea');
    const removeBtn = document.getElementById('removeImage');
    const submitBtn = document.getElementById('submitBtn');
    const btnText = document.getElementById('btnText');

    // Preview Image
    imageInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (!file) return;

        if (file.size > 2 * 1024 * 1024) {
            Swal.fire('Ukuran terlalu besar', 'Maksimal 2MB', 'warning');
            this.value = '';
            return;
        }

        const reader = new FileReader();
        reader.onload = function(ev) {
            imagePreview.src = ev.target.result;
            previewContainer.classList.remove('hidden');
            uploadArea.classList.add('hidden');
        }
        reader.readAsDataURL(file);
    });

    // Remove Preview
    removeBtn.addEventListener('click', function() {
        imageInput.value = '';
        previewContainer.classList.add('hidden');
        uploadArea.classList.remove('hidden');
    });

    // Submit dengan loading state
    form.addEventListener('submit', function() {
        submitBtn.disabled = true;
        btnText.textContent = 'Menyimpan...';
    });
});
</script>
@endpush