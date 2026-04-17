@extends('admin.layouts.main')

@section('title', 'Edit Carousel')

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

        <form action="{{ route('carousels.update', $carousel->id) }}" method="POST" enctype="multipart/form-data"
              class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                <!-- Judul -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Judul Slide</label>
                    <input type="text" name="title" value="{{ old('title', $carousel->title) }}" 
                           class="w-full px-5 py-4 border border-gray-200 rounded-2xl focus:outline-none focus:border-blue-500 transition">
                </div>

                <!-- Link -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Link (Opsional)</label>
                    <input type="url" name="link" value="{{ old('link', $carousel->link) }}" 
                           class="w-full px-5 py-4 border border-gray-200 rounded-2xl focus:outline-none focus:border-blue-500 transition">
                </div>

                <!-- Urutan -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Urutan Tampil</label>
                    <input type="number" name="order" value="{{ old('order', $carousel->order) }}" 
                           class="w-full px-5 py-4 border border-gray-200 rounded-2xl focus:outline-none focus:border-blue-500 transition">
                </div>

                <!-- Status -->
                <div class="flex items-center gap-3">
                    <input type="hidden" name="is_active" value="0">
                    <input type="checkbox" name="is_active" value="1" id="is_active"
                           class="w-5 h-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                           {{ old('is_active', $carousel->is_active) ? 'checked' : '' }}>
                    <label for="is_active" class="text-gray-700 font-medium">Aktifkan slide ini</label>
                </div>

                <!-- Gambar -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-3">Gambar Carousel</label>
                    
                    @if($carousel->image)
                    <div class="mb-6">
                        <p class="text-xs text-gray-500 mb-2">Gambar Saat Ini:</p>
                        <img src="{{ asset('storage/' . $carousel->image) }}" 
                            class="max-h-60 rounded-2xl shadow-sm border border-gray-100 mb-4 object-cover" 
                            alt="Current Image">
                    </div>
                    @endif

                    <input type="file" name="image" id="imageInput" accept="image/*"
                        onchange="previewImage(event)"
                        class="block w-full text-sm text-gray-500 file:mr-4 file:py-3 file:px-6 file:rounded-2xl file:border-0 file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition">

                    <div class="mt-6">
                        <p id="previewText" class="text-xs text-blue-500 mb-2 hidden">Preview Gambar Baru:</p>
                        <img id="preview" class="max-h-60 rounded-2xl shadow-sm hidden object-cover border-2 border-blue-400" alt="Preview">
                    </div>
                </div>

                <!-- Deskripsi -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
                    <textarea name="description" rows="5" 
                              class="w-full px-5 py-4 border border-gray-200 rounded-2xl focus:outline-none focus:border-blue-500 transition">{{ old('description', $carousel->description) }}</textarea>
                </div>

            </div>

            <!-- Submit -->
            <div class="sticky bottom-0 left-0 right-0 mt-10 -mx-8 -mb-8 p-6 bg-white/80 backdrop-blur-md border-t border-gray-100 flex justify-end gap-4 rounded-b-3xl z-10">
                <a href="{{ route('carousels.index') }}" 
                class="px-8 py-4 text-gray-600 hover:bg-gray-100 rounded-2xl transition font-medium">
                    Batal
                </a>
                <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-10 py-4 rounded-2xl transition shadow-lg shadow-blue-200 flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path>
                    </svg>
                    Update Carousel
                </button>
            </div>
        </form>
    </div>

@endsection

@push('scripts')
<script>
function previewImage(event) {
    const preview = document.getElementById('preview');
    const previewText = document.getElementById('previewText');
    const file = event.target.files[0];
    
    if (file) {
        preview.src = URL.createObjectURL(file);
        
        preview.classList.remove('hidden');
        if (previewText) previewText.classList.remove('hidden');
        
        const currentImg = document.querySelector('img[alt="Current Image"]');
        if (currentImg) {
            currentImg.classList.add('opacity-40');
        }
    }
}
</script>
@endpush
