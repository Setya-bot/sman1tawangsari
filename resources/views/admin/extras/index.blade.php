@extends('admin.layouts.main')

@section('title', 'Ekstrakurikuler')

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
                <a href="{{ route('extras.create') }}" class="btn btn-primary">
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
                        <th class="text-muted text-uppercase small fw-bold" style="width: 100px;">Gambar</th>
                        <th class="text-muted text-uppercase small fw-bold">Ekstrakurikuler</th>
                        <th class="text-muted text-uppercase small fw-bold">Deskripsi</th>
                        <th class="text-muted text-uppercase small fw-bold text-center pe-4" style="width: 50px;">Aksi</th>
                    </tr>
                </thead>
                <tbody id="extra-table border-top-0">
                    @forelse ($extras as $key => $extra)
                    <tr>
                        <td class="ps-4">
                            <span class="text-secondary">{{ $extras->firstItem() + $key }}</span>
                        </td>
                        <td>
                            <div class="rounded-3 overflow-hidden border" style="width: 50px; height: 50px;">
                                @if($extra->image)
                                    <img src="{{ $extra->image_url }}" class="w-100 h-100 object-fit-cover" alt="img">
                                @else
                                    <div class="w-100 h-100 bg-light d-flex align-items-center justify-content-center">
                                        <i class="bi bi-image text-muted"></i>
                                    </div>
                                @endif
                            </div>
                        </td>
                        <td>
                            <h6 class="mb-0 fw-bold text-dark">{{ $extra->name }}</h6>
                        </td>
                        <td>
                            <p class="mb-0 text-muted small text-truncate" style="max-width: 300px;">
                                {{ $extra->description ?? 'Tidak ada deskripsi' }}
                            </p>
                        </td>
                        <td class="text-end pe-4">
                            <div class="btn-group">
                                <a href="{{ route('extras.edit', $extra->id) }}" 
                                class="btn btn-sm btn-light border text-primary" 
                                data-bs-toggle="tooltip" title="Edit">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <form action="{{ route('extras.destroy', $extra->id) }}" method="POST" class="d-inline">
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
                        <td colspan="5" class="text-center py-5">
                            <img src="{{ asset('images/empty.svg') }}" class="mb-3" style="width: 150px; opacity: 0.5;">
                            <p class="text-muted">Belum ada data ekstrakurikuler.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="card-footer">
            {{ $extras->links() }}
        </div>

    </div>
</div>
@endsection
@push('scripts')
<script>
const searchInput = document.getElementById('search');
const tableBody = document.getElementById('extra-table');

function fetchExtras() {
    const search = searchInput.value;

    fetch(`{{ route('extras.search') }}?search=${search}`)
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
                            <td>
                                <div class="rounded-3 overflow-hidden border" style="width: 50px; height: 50px;">
                                    ${imgHtml}
                                </div>
                            </td>
                            <td><h6 class="mb-0 fw-bold text-dark">${item.name}</h6></td>
                            <td><p class="mb-0 text-muted small text-truncate" style="max-width: 300px;">${item.description ?? '-'}</p></td>
                            <td class="text-end pe-4">
                                <div class="btn-group">
                                    <a href="/admin/extras/${item.id}/edit" class="btn btn-sm btn-light border text-primary">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <form action="/admin/extras/${item.id}" method="POST" class="d-inline">
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
    delay = setTimeout(fetchExtras, 400);
});

// DELETE SWAL
document.addEventListener('click', function(e){
    if(e.target.closest('.delete-btn')){
        e.preventDefault();

        const form = e.target.closest('form');

        Swal.fire({
            title: 'Hapus data?',
            text: 'Data akan dihapus permanen!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: 'Batal'
        }).then((result)=>{
            if(result.isConfirmed){
                form.submit();
            }
        });
    }
});
</script>
@endpush
