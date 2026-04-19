@extends('admin.layouts.main')

@section('title', 'Edit Ekskul')

@section('content')
<div class="pt-3 max-w-8xl mx-auto">

    <form action="{{ route('ekskuls.update', $ekskul->id) }}" method="POST" enctype="multipart/form-data" 
          id="ekskulForm" class="bg-white rounded-3xl shadow border border-gray-100 p-10">

        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

            <!-- Nama Ekskul -->
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Nama Ekskul <span class="text-red-500">*</span>
                </label>
                <input type="text" name="name" value="{{ old('name', $ekskul->name) }}" required
                    class="w-full px-5 py-4 border border-gray-200 rounded-2xl focus:outline-none focus:border-[#48c3d9] focus:ring-1 focus:ring-[#48c3d9]">
            </div>

            <!-- Gambar -->
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-3">
                    Gambar Ekskul
                </label>

                <div onclick="document.getElementById('imageInput').click()" 
                     class="border-2 border-dashed border-gray-300 hover:border-[#48c3d9] rounded-2xl p-10 text-center cursor-pointer transition-all">
                    <i class="fas fa-cloud-upload-alt text-5xl text-gray-400 mb-4"></i>
                    <p class="text-gray-600 font-medium">Klik untuk mengganti gambar (opsional)</p>
                    <p class="text-xs text-gray-400 mt-2">Format: JPG, PNG • Maksimal 2MB</p>
                </div>

                <input type="file" name="image" id="imageInput" accept="image/*" class="hidden">

                <!-- Preview Gambar - UKURAN KECIL & CENTER -->
                <div id="previewContainer" class="mt-6">
                    <p class="text-xs text-gray-500 mb-3">Gambar Saat Ini:</p>
                    <div class="flex justify-center">
                        <div class="border border-gray-200 rounded-2xl p-4 bg-gray-50 shadow-sm">
                            <img id="preview" 
                                 src="{{ $ekskul->image ? asset('storage/'.$ekskul->image) : asset('images/no-image.png') }}"
                                 class="max-h-52 w-auto max-w-full rounded-xl object-contain" 
                                 alt="Preview Gambar">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Deskripsi -->
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
                <textarea name="description" rows="6" 
                    class="w-full px-5 py-4 border border-gray-200 rounded-2xl focus:outline-none focus:border-[#48c3d9]"
                    placeholder="Deskripsikan kegiatan ekskul ini...">{{ old('description', $ekskul->description) }}</textarea>
            </div>

        </div>

        <div class="mt-12 flex justify-end gap-4">
            <a href="{{ route('ekskuls.index') }}" 
               class="px-8 py-4 text-gray-600 hover:bg-gray-100 rounded-2xl font-medium transition">
                Batal
            </a>
            <button type="button" id="btnSubmit"
                class="bg-[#48c3d9] hover:bg-[#3ab5cc] text-white font-semibold px-10 py-4 rounded-2xl flex items-center gap-3 transition">
                <i class="fa-solid fa-circle-check"></i>
                Update Data
            </button>
        </div>

    </form>
</div>
@endsection

@push('scripts')
<script>
document.getElementById('imageInput').onchange = function(e) {
    const file = e.target.files[0];
    if (file && file.type.startsWith('image/')) {
        const reader = new FileReader();
        reader.onload = function(ev) {
            document.getElementById('preview').src = ev.target.result;
        };
        reader.readAsDataURL(file);
    }
};

// SweetAlert Submit
document.getElementById('btnSubmit').onclick = function() {
    Swal.fire({
        title: 'Update data ekskul?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#48c3d9',
        cancelButtonColor: '#6b7280',
        confirmButtonText: 'Ya, Update',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            this.closest('form').submit();
        }
    });
};
</script>
@endpush