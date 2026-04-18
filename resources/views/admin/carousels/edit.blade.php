@extends('admin.layouts.main')

@section('title', 'Edit Carousel')

@section('content')

<div class="pt-3 max-w-8xl">

    <form action="{{ route('carousels.update', $carousel->id) }}" method="POST" enctype="multipart/form-data"
          class="bg-white rounded-3xl shadow border border-gray-100 p-10">

        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

            <!-- Judul -->
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-2">Judul Slide</label>
                <input type="text" name="title" value="{{ old('title', $carousel->title) }}" 
                       class="w-full px-5 py-4 border border-gray-200 rounded-2xl focus:outline-none focus:border-[#48c3d9]">
            </div>

            <!-- Link -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Link (Opsional)</label>
                <input type="url" name="link" value="{{ old('link', $carousel->link) }}" 
                       class="w-full px-5 py-4 border border-gray-200 rounded-2xl focus:outline-none focus:border-[#48c3d9]">
            </div>

            <!-- Urutan -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Urutan Tampil</label>
                <input type="number" name="order" value="{{ old('order', $carousel->order) }}" 
                       class="w-full px-5 py-4 border border-gray-200 rounded-2xl focus:outline-none focus:border-[#48c3d9]">
            </div>

            <!-- Status -->
            <div class="flex items-center gap-3 pt-8">
                <input type="hidden" name="is_active" value="0">
                <input type="checkbox" name="is_active" value="1" id="is_active"
                       class="w-5 h-5 text-[#48c3d9] border-gray-300 rounded focus:ring-[#48c3d9]"
                       {{ old('is_active', $carousel->is_active) ? 'checked' : '' }}>
                <label for="is_active" class="text-gray-700 font-medium">Aktifkan slide ini</label>
            </div>

            <!-- Gambar + Crop -->
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-3">Gambar Carousel</label>

                <input type="hidden" name="cropped_image" id="croppedImage">

                <!-- Gambar Saat Ini -->
                @if($carousel->image)
                <div class="mb-6">
                    <p class="text-xs text-gray-500 mb-2">Gambar Saat Ini:</p>
                    <img src="{{ asset('storage/' . $carousel->image) }}" 
                         class="max-h-60 rounded-2xl shadow border border-gray-200 object-cover" 
                         alt="Current Image">
                </div>
                @endif

                <!-- Area Pilih Gambar Baru -->
                <div onclick="document.getElementById('imageInput').click()" 
                     class="border-2 border-dashed border-gray-300 hover:border-[#48c3d9] rounded-2xl p-8 text-center cursor-pointer transition">
                    <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-3"></i>
                    <p class="text-gray-600">Klik untuk mengganti gambar</p>
                    <p class="text-xs text-gray-400 mt-1">Direkomendasikan: 1900 × 815 px</p>
                </div>

                <input type="file" name="image" id="imageInput" accept="image/*" class="hidden">

                <!-- Preview setelah crop -->
                <div id="previewContainer" class="mt-6 hidden">
                    <p class="text-xs text-gray-500 mb-2">Preview Gambar Baru:</p>
                    <img id="preview" class="max-h-80 rounded-2xl shadow border border-gray-200 object-cover" alt="Preview">
                </div>
            </div>

            <!-- Deskripsi -->
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
                <textarea name="description" rows="4" 
                          class="w-full px-5 py-4 border border-gray-200 rounded-2xl focus:outline-none focus:border-[#48c3d9]">{{ old('description', $carousel->description) }}</textarea>
            </div>

        </div>

        <div class="mt-12 flex justify-end gap-4">
            <a href="{{ route('carousels.index') }}" 
               class="px-8 py-4 text-gray-600 hover:bg-gray-100 rounded-2xl font-medium transition">
                Batal
            </a>
            <button type="submit" 
                    class="bg-[#48c3d9] hover:bg-[#3ab5cc] text-white font-semibold px-10 py-4 rounded-2xl flex items-center gap-3 transition">
                <i class="fas fa-save"></i>
                Update Carousel
            </button>
        </div>
    </form>
</div>

<!-- ==================== CROP MODAL ==================== -->
<div id="cropModal" class="fixed inset-0 bg-black/80 hidden flex items-center justify-center z-[9999]">
    <div class="bg-white rounded-3xl w-full max-w-5xl mx-4 overflow-hidden">
        <div class="px-8 py-5 border-b flex justify-between items-center">
            <h3 class="font-semibold text-xl">Sesuaikan Gambar Carousel</h3>
            <p class="text-sm text-gray-500">Rasio: 1900 × 815 px</p>
        </div>

        <div class="p-8 bg-gray-50">
            <img id="cropImage" class="max-w-full mx-auto block rounded-xl" style="max-height: 460px;">
        </div>

        <div class="px-8 py-6 border-t flex justify-end gap-4">
            <button onclick="closeCropModal()" 
                    class="px-8 py-3 text-gray-600 hover:bg-gray-100 rounded-2xl font-medium">
                Batal
            </button>
            <button onclick="saveCroppedImage()" 
                    class="px-8 py-3 bg-[#48c3d9] hover:bg-[#3ab5cc] text-white rounded-2xl font-medium">
                Gunakan Gambar Ini
            </button>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script src="https://unpkg.com/cropperjs@1.6.1/dist/cropper.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/cropperjs@1.6.1/dist/cropper.min.css">

<script>
let cropper = null;

document.getElementById('imageInput').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (!file) return;

    const reader = new FileReader();
    reader.onload = function(ev) {
        document.getElementById('cropImage').src = ev.target.result;

        const modal = document.getElementById('cropModal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');

        if (cropper) cropper.destroy();

        cropper = new Cropper(document.getElementById('cropImage'), {
            aspectRatio: 1900 / 815,
            viewMode: 2,
            autoCropArea: 0.95,
            movable: true,
            zoomable: true,
            rotatable: false,
            scalable: false,
            cropBoxResizable: true,
            dragMode: 'move'
        });
    };
    reader.readAsDataURL(file);
});

function closeCropModal() {
    const modal = document.getElementById('cropModal');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
    if (cropper) {
        cropper.destroy();
        cropper = null;
    }
}

function saveCroppedImage() {
    if (!cropper) return;

    const canvas = cropper.getCroppedCanvas({
        width: 1900,
        height: 815
    });

    const base64 = canvas.toDataURL('image/jpeg', 0.92);

    // Tampilkan preview
    document.getElementById('preview').src = base64;
    document.getElementById('previewContainer').classList.remove('hidden');

    // Simpan ke hidden input
    document.getElementById('croppedImage').value = base64;

    // Kosongkan input file
    document.getElementById('imageInput').value = '';

    closeCropModal();
}
</script>
@endpush