@extends('admin.layouts.main')

@section('title', 'Edit Carousel')

@section('content')
<div class="content-wrapper-card">

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('carousels.update', $carousel->id) }}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')

<div class="row g-4">

    <div class="col-md-6">
        <label>Judul</label>
        <input type="text" name="title" class="form-control"
            value="{{ old('title', $carousel->title) }}">
    </div>

    <div class="col-md-6">
        <label>Link</label>
        <input type="url" name="link" class="form-control"
            value="{{ old('link', $carousel->link) }}">
    </div>

    <div class="col-md-6">
        <label>Gambar</label>
        <input type="file" name="image" class="form-control" onchange="previewImage(event)">

        {{-- Preview gambar lama --}}
        @if($carousel->image)
            <img id="preview"
                 src="{{ $carousel->image_url }}"
                 class="mt-2 rounded"
                 style="max-height:100px;">
        @else
            <img id="preview"
                 class="mt-2 rounded"
                 style="max-height:100px; display:none;">
        @endif
    </div>

    <div class="col-md-3">
        <label>Urutan</label>
        <input type="number" name="order" class="form-control"
            value="{{ old('order', $carousel->order) }}">
    </div>

    <div class="col-md-3 d-flex align-items-end">
        <div class="form-check">
            <input type="hidden" name="is_active" value="0">
            <input type="checkbox" name="is_active" value="1" class="form-check-input"
                {{ old('is_active', $carousel->is_active) ? 'checked' : '' }}>
            <label class="form-check-label">Aktif</label>
        </div>
    </div>

    <div class="col-md-12">
        <label>Deskripsi</label>
        <textarea name="description" class="form-control">{{ old('description', $carousel->description) }}</textarea>
    </div>

</div>

<div class="sticky-submit mt-4 text-end">
    <button class="btn btn-primary">Update</button>
</div>

</form>
</div>

@push('scripts')
<script>
function previewImage(event){
    const img = document.getElementById('preview');
    img.src = URL.createObjectURL(event.target.files[0]);
    img.style.display = 'block';
}
</script>
@endpush

@endsection