@extends('admin.layouts.main')

@section('title', 'Profil Sekolah')

@section('content')
<div class="content-wrapper-card">
    {{-- Form --}}
    <form action="{{ route('school.profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row g-4">
            {{-- Bagian Identitas Utama --}}
            <div class="col-12">
                <h5 class="text-primary fw-semibold border-bottom pb-2 mb-3">Identitas Dasar</h5>
            </div>

            <div class="col-md-6">
                <label class="form-label fw-bold">Nama Sekolah</label>
                <input type="text" name="school_name" class="form-control form-control-lg"
                       value="{{ $profile->school_name ?? '' }}" placeholder="Masukkan nama resmi sekolah" required>
            </div>

            <div class="col-md-6">
                <label class="form-label fw-bold">Email Sekolah</label>
                <input type="email" name="email" class="form-control form-control-lg"
                       value="{{ $profile->email ?? '' }}" placeholder="sekolah@contoh.sch.id">
            </div>

            <div class="col-md-6">
                <label class="form-label fw-bold">Telepon / WhatsApp</label>
                <input type="text" name="phone" inputmode="tel" oninput="this.value = this.value.replace(/[^0-9+\- ]/g, '');" class="form-control"
                       value="{{ $profile->phone ?? '' }}" placeholder="0271-xxxxxx">
            </div>

            <div class="col-md-6">
                <label class="form-label fw-bold">Logo Sekolah</label>
                <input type="file" name="logo" id="logoInput" class="form-control" accept="image/*">
                
                <div class="mt-3">
                    <p class="small text-muted mb-2">Pratinjau Logo:</p>
                    {{-- Box Preview Fixed Size --}}
                    <div class="preview-box border rounded bg-light d-flex align-items-center justify-content-center overflow-hidden" 
                        style="width: 120px; height: 120px;">
                        <img id="logoPreview" 
                            src="{{ !empty($profile->logo) ? asset('storage/'.$profile->logo) : asset('images/no-logo.png') }}" 
                            style="max-width: 100%; max-height: 100%; object-fit: contain;">
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <label class="form-label fw-bold">Alamat Lengkap</label>
                <textarea name="address" class="form-control" rows="2" placeholder="Jl. Raya Nomor... ">{{ $profile->address ?? '' }}</textarea>
            </div>

            {{-- Bagian Visi Misi --}}
            <div class="col-12 mt-5">
                <h5 class="text-primary fw-semibold border-bottom pb-2 mb-3">Visi, Misi & Budaya</h5>
            </div>

            <div class="col-md-6">
                <label class="form-label fw-bold">Visi</label>
                <textarea name="vision" class="form-control" rows="4">{{ $profile->vision ?? '' }}</textarea>
            </div>

            <div class="col-md-6">
                <label class="form-label fw-bold">Misi</label>
                <textarea name="mission" class="form-control" rows="4">{{ $profile->mission ?? '' }}</textarea>
            </div>

            <div class="col-md-4">
                <label class="form-label fw-bold">Motto</label>
                <textarea name="motto" class="form-control" rows="2">{{ $profile->motto ?? '' }}</textarea>
            </div>

            <div class="col-md-4">
                <label class="form-label fw-bold">Yel-yel</label>
                <textarea name="yelyel" class="form-control" rows="2">{{ $profile->yelyel ?? '' }}</textarea>
            </div>

            <div class="col-md-4">
                <label class="form-label fw-bold">Lagu Mars Sekolah</label>
                <textarea name="mars" class="form-control" rows="2">{{ $profile->mars ?? '' }}</textarea>
            </div>
        </div>

        <div class="sticky-save-bar border-top bg-white p-3 mt-4">
            <div class="d-flex justify-content-end gap-2">
                <button type="submit" class="btn btn-primary px-4">
                    <i class="fa fa-check-circle"></i> Simpan
                </button>
            </div>
        </div>
    </form>
</div>
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {

        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                timer: 2500,
                showConfirmButton: false
            });
        @endif

        @if(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: '{{ session('error') }}'
            });
        @endif

    });
    document.getElementById('logoInput').onchange = evt => {
        const [file] = document.getElementById('logoInput').files;
        if (file) {
            // Validasi sederhana: pastikan yang diupload adalah gambar
            if (file.type.startsWith('image/')) {
                document.getElementById('logoPreview').src = URL.createObjectURL(file);
            } else {
                alert("Mohon pilih file gambar yang valid.");
            }
        }
    }
</script>
@endpush
@endsection