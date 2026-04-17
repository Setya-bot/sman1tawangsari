@extends('admin.layouts.main')

@section('title', 'Manajemen Pengguna')

@section('content')
<!-- <div class="container-fluid"> -->
<div class="content-wrapper-card">
    <!-- Card Utama -->
    <div class="card shadow-sm border-0 rounded-3">
        <!-- Toolbar -->
        <div class="card-header bg-light py-3">
            <div class="d-flex flex-wrap gap-2 justify-content-between align-items-center">

                <!-- Kiri: Search + Filter -->
                <div class="d-flex gap-2 flex-wrap" style="flex:1;">
                    <div class="input-group" style="max-width: 300px;">
                        <span class="input-group-text bg-white">
                            <i class="bi bi-search"></i>
                        </span>
                        <input type="text" id="search" name="search" class="form-control" placeholder="Cari...">
                    </div>

                    <select id="role-filter" name="role" class="form-select" style="max-width: 180px;">
                        <option value="">Semua Role</option>
                        <option value="admin">Admin</option>
                        <option value="editor">Editor</option>
                    </select>
                </div>

                <!-- Kanan: Button -->
                <div class="d-flex gap-2">
                    <button onclick="exportUsers()" class="btn btn-outline-secondary">
                        <i class="bi bi-download"></i>
                    </button>

                    <a href="{{ route('users.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus"></i> Tambah
                    </a>
                </div>
            </div>
        </div>

        <!-- Table -->
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <!-- <thead class="table-light">
                    <tr>
                        <th class="ps-4" style="width: 60px;">No</th>
                        <th>Pengguna</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th class="text-end pe-4">Aksi</th>
                    </tr>
                </thead> -->
                <thead class="bg-light">
                    <tr>
                        <th class="ps-4 text-muted text-uppercase small fw-bold" style="width: 70px;">No</th>
                        <th class="text-muted text-uppercase small fw-bold" style="width: 100px;">Pengguna</th>
                        <th class="text-muted text-uppercase small fw-bold">Email</th>
                        <th class="text-muted text-uppercase small fw-bold">Role</th>
                        <th class="text-muted text-uppercase small fw-bold text-center pe-4" style="width: 50px;">Aksi</th>
                    </tr>
                </thead>
                <tbody id="user-table">
                    @foreach ($users as $key => $user)
                    <tr>
                        <td class="ps-4 text-muted">{{ $key + 1 }}</td>
                        
                        <td>
                            <div class="d-flex align-items-center gap-3">
                                <div class="fw-medium">{{ $user->name }}</div>
                            </div>
                        </td>
                        
                        <td class="text-muted">{{ $user->email }}</td>
                        
                        <td>
                            @if($user->role == 'admin')
                                <span class="badge bg-purple">Admin</span>
                            @elseif($user->role == 'editor')
                                <span class="badge bg-warning text-dark">Editor</span>
                            @else
                                <span class="badge bg-success">User</span>
                            @endif
                        </td>
                        
                        <td class="text-end pe-4">
                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('users.edit', $user->id) }}" 
                                   class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="btn btn-sm btn-outline-danger delete-btn">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="card-footer bg-light d-flex justify-content-between align-items-center py-3">
            <div class="text-muted small">
                Menampilkan {{ $users->firstItem() ?? 1 }} - {{ $users->lastItem() ?? $users->count() }} 
                dari {{ $users->total() ?? $users->count() }} data
            </div>
            <div>
                {{ $users->links() }}
            </div>
        </div>

    </div>
</div>
@endsection

@push('scripts')
    <!-- WAJIB: Load Library SweetAlert2 dari CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>

        const searchInput = document.getElementById('search');
        const roleFilter = document.getElementById('role-filter');
        const tableBody = document.getElementById('user-table');

        function fetchUsers() {
            const search = searchInput.value;
            const role = roleFilter.value;

            fetch(`{{ route('users.search') }}?search=${search}&role=${role}`)
                .then(res => res.json())
                .then(data => {
                    let html = '';

                    if (data.length === 0) {
                        html = `<tr><td colspan="5" class="text-center text-muted py-4">Tidak ada data</td></tr>`;
                    } else {
                        data.forEach((user, index) => {
                            html += `
                                <tr>
                                    <td class="ps-4 text-muted">${index + 1}</td>
                                    <td>
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="fw-medium">${user.name}</div>
                                        </div>
                                    </td>
                                    <td class="text-muted">${user.email}</td>
                                    <td>
                                        ${user.role === 'admin' 
                                            ? '<span class="badge bg-purple">Admin</span>' 
                                            : '<span class="badge bg-warning text-dark">Editor</span>'}
                                    </td>
                                    <td class="text-end pe-4">
                                        <div class="d-flex justify-content-end gap-2">
                                            <a href="/admin/users/${user.id}/edit" class="btn btn-sm btn-outline-primary">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form action="/admin/users/${user.id}" method="POST" class="d-inline delete-form">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-sm btn-outline-danger delete-btn">
                                                    <i class="bi bi-trash"></i>
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
        function debounceFetch() {
            clearTimeout(delay);
            delay = setTimeout(fetchUsers, 400);
        }

        searchInput.addEventListener('keyup', debounceFetch);
        roleFilter.addEventListener('change', fetchUsers);

        document.addEventListener('DOMContentLoaded', function() {
            
            // 1. Logic untuk Tombol Hapus
            const deleteButtons = document.querySelectorAll('.delete-btn');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault(); 

                    const form = this.closest('form');

                    Swal.fire({
                        title: 'Apakah Anda yakin?',
                        text: "Data pengguna ini akan dihapus permanen!",
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