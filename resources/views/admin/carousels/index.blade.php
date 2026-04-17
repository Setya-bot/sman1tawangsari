@extends('admin.layouts.main')

@section('title', 'Carousel')

@section('content')
<div class="content-wrapper-card">
    <div class="card shadow-sm border-0 rounded-3">

        <!-- Toolbar -->
        <div class="card-header bg-light py-3">
            <div class="d-flex justify-content-between align-items-center">

                <!-- Search -->
                <div class="input-group" style="max-width: 300px;">
                    <span class="input-group-text bg-white">
                        <i class="bi bi-search"></i>
                    </span>
                    <input type="text" id="search" class="form-control" placeholder="Cari ekstrakurikuler...">
                </div>

                <!-- Button -->
                <a href="{{ route('carousels.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus"></i> Tambah
                </a>
            </div>
        </div>

        <!-- Table -->
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="ps-4 text-muted text-uppercase small fw-bold" style="width: 70px;">No</th>
                        <th class="text-muted text-uppercase small fw-bold" style="width: 100px;">Judul</th>
                        <th class="text-muted text-uppercase small fw-bold">Deskripsi</th>
                        <th class="text-muted text-uppercase small fw-bold">Link</th>
                        <th class="text-muted text-uppercase small fw-bold">Status</th>
                        <th class="text-muted text-uppercase small fw-bold text-center pe-4" style="width: 50px;">Aksi</th>
                    </tr>
                </thead>
                <tbody id="carousel-table border-top-0">
                    @forelse ($carousels as $key => $carousel)
                    <tr>
                        <td class="ps-4">
                            <span class="text-secondary">{{ $carousels->firstItem() + $key }}</span>
                        </td>
                        <td>{{ $carousel->title }}</td>

                        <td class="text-truncate" style="max-width:200px;">
                            {{ $carousel->description ?? '-' }}
                        </td>

                        <td>
                            @if($carousel->link)
                                <a href="{{ $carousel->link }}" target="_blank">Link</a>
                            @else
                                -
                            @endif
                        </td>

                        <td>
                            @if($carousel->is_active)
                                <span class="badge bg-success">Aktif</span>
                            @else
                                <span class="badge bg-secondary">Nonaktif</span>
                            @endif
                        </td>
                        <td class="text-end pe-4">
                            <div class="btn-group">
                                <a href="{{ route('carousels.edit', $carousel->id) }}" 
                                class="btn btn-sm btn-light border text-primary" 
                                data-bs-toggle="tooltip" title="Edit">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <form action="{{ route('carousels.destroy', $carousel->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-sm btn-light border text-danger delete-btn" 
                                            data-bs-toggle="tooltip" title="Hapus">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-5">
                            <p class="text-muted">Belum ada data carousel.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="card-footer">
            {{ $carousels->links() }}
        </div>

    </div>
</div>

@push('scripts')
<script>
const searchInput = document.getElementById('search');
const tableBody = document.getElementById('carousel-table');

function fetchcarousels() {
    const search = searchInput.value;

    fetch(`{{ route('carousels.search') }}?search=${search}`)
        .then(res => res.json())
        .then(data => {
            let html = '';

            if (data.length === 0) {
                html = `<tr><td colspan="5" class="text-center">Tidak ada data</td></tr>`;
            } else {
                data.forEach((item, index) => {
                    // Tentukan URL gambar
                    const imgHtml = item.image 
                        ? `<img src="${item.image_url}" class="w-100 h-100 object-fit-cover">`
                        : `<div class="w-100 h-100 bg-light d-flex align-items-center justify-content-center"><i class="bi bi-image text-muted"></i></div>`;

                    html += `
                        <tr>
                            <td class="ps-4 text-secondary">${index + 1}</td>
                            <td>${item.title ?? '-'}</td>
                            <td>${item.description ?? '-'}</td>
                            <td>${item.link ? `<a href="${item.link}" target="_blank">Link</a>` : '-'}</td>
                            <td>
                                ${item.is_active 
                                    ? '<span class="badge bg-success">Aktif</span>' 
                                    : '<span class="badge bg-secondary">Nonaktif</span>'}
                            </td>
                            <td class="text-end pe-4">
                                <div class="btn-group">
                                    <a href="/admin/carousels/${item.id}/edit" class="btn btn-sm btn-light border text-primary">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <form action="/admin/carousels/${item.id}" method="POST" class="d-inline">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="button" class="btn btn-sm btn-light border text-danger delete-btn">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    `;
                });
            }

            tableBody.innerHTML = html;
        });
}

let delay;
searchInput.addEventListener('keyup', () => {
    clearTimeout(delay);
    delay = setTimeout(fetchcarousels, 400);
});

document.addEventListener('DOMContentLoaded', function() {
    // 1. Logic untuk Tombol Hapus
    const deleteButtons = document.querySelectorAll('.delete-btn');
    deleteButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault(); 
            const form = this.closest('form');
            Swal.fire({
                title: 'Hapus data?',
                text: 'Data akan dihapus permanen!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Tampilkan loading
                    Swal.fire({
                        title: 'Menghapus...',
                        text: 'Mohon tunggu sebentar',
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });
                    
                    // Submit form
                    form.submit();
                }
            });
        });
    });
    // 2. Logic Notifikasi Sukses (Create/Update/Delete)
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '{{ session('success') }}',
            timer: 3000,
            showConfirmButton: false
        });
    @endif
    // 3. Logic Notifikasi Error
    @if(session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Gagal!',
            text: '{{ session('error') }}',
            timer: 3000,
            showConfirmButton: false
        });
    @endif
    
    // 4. Logic Validasi Error (Jika input form salah)
    @if($errors->any())
        let errorList = '<ul style="text-align: left; margin-bottom: 0;">';
        @foreach($errors->all() as $error)
            errorList += '<li>{{ $error }}</li>';
        @endforeach
        errorList += '</ul>';
        Swal.fire({
            icon: 'error',
            title: 'Validasi Gagal',
            html: errorList
        });
    @endif
});
</script>
@endpush
@endsection