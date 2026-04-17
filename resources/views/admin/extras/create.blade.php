@extends('admin.layouts.main')

@section('title', 'Tambah Ekstrakurikuler')

@section('content')
<div class="content-wrapper-card">
    <form action="{{ route('extras.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row g-4">

            <div class="col-12">
                <h5 class="text-primary fw-semibold border-bottom pb-2">Data Ekstrakurikuler</h5>
            </div>

            <div class="col-md-6">
                <label class="form-label fw-bold">Nama Ekstrakurikuler</label>
                <input type="text" name="name" class="form-control"
                       placeholder="Contoh: Pramuka" required>
            </div>

            <div class="col-md-6">
                <label class="form-label fw-bold">Gambar</label>
                <input type="file" name="image" id="imageInput" class="form-control" accept="image/*">

                <div class="mt-3">
                    <div class="preview-box d-flex align-items-center justify-content-center"
                         style="width:120px;height:120px;">
                        <img id="preview" src="{{ asset('images/no-image.png') }}"
                             style="max-width:100%; max-height:100%;">
                    </div>
                </div>
            </div>

            <div class="col-12">
                <label class="form-label fw-bold">Deskripsi</label>
                <textarea name="description" class="form-control" rows="4"></textarea>
            </div>

        </div>

        <div class="sticky-submit mt-4 pt-3 pb-3 border-top text-end">
            <button type="button" id="btnSubmit" class="btn btn-primary px-4">
                <i class="fa-solid fa-circle-plus"></i> Tambah
            </button>
        </div>
    </form>
</div>

@push('scripts')
<script>
document.getElementById('imageInput').onchange = e => {
    const file = e.target.files[0];
    if(file && file.type.startsWith('image/')){
        document.getElementById('preview').src = URL.createObjectURL(file);
    }
};

// Swal submit
document.getElementById('btnSubmit').onclick = function(){
    Swal.fire({
        title: 'Simpan data?',
        icon: 'question',
        showCancelButton: true
    }).then(res=>{
        if(res.isConfirmed){
            this.closest('form').submit();
        }
    });
};
</script>
@endpush
@endsectionp