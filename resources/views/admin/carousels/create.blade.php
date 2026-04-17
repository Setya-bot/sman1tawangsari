@extends('admin.layouts.main')

@section('title', 'Tambah Carousel')

@section('content')

    <div class="max-w-8xl mx-auto">
        @if ($errors->any())
        <div class="bg-red-50 border border-red-200 text-red-700 px-6 py-4 rounded-2xl mb-8">
            <ul class="list-disc list-inside space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('carousels.store') }}" method="POST" enctype="multipart/form-data" 
              class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8">

            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                <!-- Judul -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Judul Slide</label>
                    <input type="text" name="title" value="{{ old('title') }}" 
                           class="w-full px-5 py-4 border border-gray-200 rounded-2xl focus:outline-none focus:border-blue-500 transition"
                           placeholder="Masukkan judul carousel">
                </div>

                <!-- Link -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Link (Opsional)</label>
                    <input type="url" name="link" value="{{ old('link') }}" 
                           class="w-full px-5 py-4 border border-gray-200 rounded-2xl focus:outline-none focus:border-blue-500 transition"
                           placeholder="https://example.com">
                </div>

                <!-- Urutan -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Urutan Tampil</label>
                    <input type="number" name="order" value="{{ old('order', $nextOrder ?? 1) }}" 
                           class="w-full px-5 py-4 border border-gray-200 rounded-2xl focus:outline-none focus:border-blue-500 transition">
                </div>

                <!-- Status Aktif -->
                <div class="flex items-center gap-3 pt-8">
                    <input type="hidden" name="is_active" value="0">
                    <input type="checkbox" name="is_active" value="1" id="is_active"
                           class="w-5 h-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                           {{ old('is_active', 1) ? 'checked' : '' }}>
                    <label for="is_active" class="text-gray-700 font-medium">Aktifkan slide ini</label>
                </div>

                <!-- Gambar -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Gambar Carousel</label>
                    <input type="file" name="image" id="imageInput" accept="image/*"
                           class="block w-full text-sm text-gray-500 file:mr-4 file:py-3 file:px-6 file:rounded-2xl file:border-0 file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition"
                           onchange="previewImage(event)">
                    
                    <div class="mt-6">
                        <img id="preview" class="max-h-60 rounded-2xl shadow-sm hidden object-cover" alt="Preview">
                    </div>
                </div>

                <!-- Deskripsi -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
                    <textarea name="description" rows="5" 
                              class="w-full px-5 py-4 border border-gray-200 rounded-2xl focus:outline-none focus:border-blue-500 transition"
                              placeholder="Deskripsi singkat untuk slide ini...">{{ old('description') }}</textarea>
                </div>

            </div>

            <!-- Submit Button -->
            <div class="mt-10 flex justify-end">
                <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-10 py-4 rounded-2xl transition flex items-center gap-2 shadow-sm">
                    <i class="fas fa-save"></i>
                    Simpan Carousel
                </button>
            </div>

        </form>
    </div>
@endsection

@push('scripts')
<script>
function previewImage(event) {
    const preview = document.getElementById('preview');
    const file = event.target.files[0];
    
    if (file) {
        preview.src = URL.createObjectURL(file);
        preview.classList.remove('hidden');
    }
}
</script>
@endpush