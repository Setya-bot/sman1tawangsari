@extends('admin.layouts.main')

@section('title', 'Manajemen Pengguna')

@section('content')

    <div class="max-w-8xl mx-auto">
        <div class="bg-white rounded-[2rem] shadow-sm border border-gray-100 p-6 mb-8">
            <div class="flex flex-col md:flex-row justify-between items-center gap-5">
                
                <div class="flex flex-1 flex-col sm:flex-row gap-3 w-full md:w-auto">
                    <div class="relative group flex-1">
                        <div class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 group-focus-within:text-blue-600 transition-colors">
                            <i class="fas fa-search"></i>
                        </div>
                        <input type="text" 
                               id="search"
                               placeholder="Cari nama atau email pengguna..." 
                               class="w-full pl-12 pr-4 py-3.5 bg-gray-50 border border-gray-200 rounded-2xl focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-500/5 transition-all text-sm">
                    </div>

                    <select id="role-filter" 
                            class="bg-gray-50 border border-gray-200 text-gray-700 text-sm rounded-2xl focus:ring-blue-500 focus:border-blue-500 block p-3.5 transition-all outline-none">
                        <option value="">Semua Role</option>
                        <option value="admin">Admin</option>
                        <option value="editor">Editor</option>
                    </select>
                </div>
                
                <div class="flex gap-3 w-full md:w-auto">
                    <button onclick="exportUsers()" 
                            class="flex items-center justify-center gap-2 bg-gray-100 hover:bg-gray-200 text-gray-600 px-5 py-3.5 rounded-2xl font-bold transition-all active:scale-95 text-sm">
                        <i class="fas fa-download"></i>
                    </button>

                    <a href="{{ route('users.create') }}" 
                       class="flex-1 flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-8 py-3.5 rounded-2xl font-bold transition-all shadow-lg shadow-blue-600/20 active:scale-95 text-sm">
                        <i class="fas fa-user-plus"></i>
                        Tambah Pengguna
                    </a>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-[2.5rem] shadow-xl shadow-gray-200/50 border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50/50">
                            <th class="px-8 py-5 text-[11px] font-bold text-gray-400 uppercase tracking-[0.1em] w-20 text-center">No</th>
                            <th class="px-6 py-5 text-[11px] font-bold text-gray-400 uppercase tracking-[0.1em]">Informasi Pengguna</th>
                            <th class="px-6 py-5 text-[11px] font-bold text-gray-400 uppercase tracking-[0.1em]">Email</th>
                            <th class="px-6 py-5 text-[11px] font-bold text-gray-400 uppercase tracking-[0.1em]">Role</th>
                            <th class="px-8 py-5 text-[11px] font-bold text-gray-400 uppercase tracking-[0.1em] text-center w-40">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="user-table" class="divide-y divide-gray-100">
                        @forelse ($users as $key => $user)
                        <tr class="hover:bg-gray-50/80 transition-colors group">
                            <td class="px-8 py-6 text-center text-gray-400 font-medium text-sm">
                                {{ $users->firstItem() + $key }}
                            </td>
                            <td class="px-6 py-6">
                                <div class="flex items-center gap-3">
                                    <div class="font-bold text-gray-800 text-base group-hover:text-blue-600 transition-colors">
                                        {{ $user->name }}
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-6">
                                <span class="text-gray-500 text-sm">{{ $user->email }}</span>
                            </td>
                            <td class="px-6 py-6">
                                @if($user->role == 'admin')
                                    <span class="px-3 py-1 text-[10px] font-black uppercase tracking-wider bg-purple-100 text-purple-600 rounded-lg">Admin</span>
                                @elseif($user->role == 'editor')
                                    <span class="px-3 py-1 text-[10px] font-black uppercase tracking-wider bg-amber-100 text-amber-600 rounded-lg">Editor</span>
                                @else
                                    <span class="px-3 py-1 text-[10px] font-black uppercase tracking-wider bg-emerald-100 text-emerald-600 rounded-lg">User</span>
                                @endif
                            </td>
                            <td class="px-8 py-6">
                                <div class="flex justify-center items-center gap-2">
                                    <a href="{{ route('users.edit', $user->id) }}" 
                                       class="w-10 h-10 flex items-center justify-center text-blue-600 bg-blue-50 hover:bg-blue-600 hover:text-white rounded-xl transition-all duration-300 shadow-sm"
                                       title="Edit">
                                        <i class="fas fa-pen-to-square"></i>
                                    </a>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" 
                                                class="w-10 h-10 flex items-center justify-center text-red-600 bg-red-50 hover:bg-red-600 hover:text-white rounded-xl transition-all duration-300 shadow-sm delete-btn" 
                                                title="Hapus">
                                            <i class="fas fa-trash-can"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-24">
                                <div class="flex flex-col items-center justify-center">
                                    <div class="w-32 h-32 bg-gray-50 rounded-full flex items-center justify-center mb-6">
                                        <i class="fas fa-users-slash text-5xl text-gray-200"></i>
                                    </div>
                                    <h3 class="text-xl font-bold text-gray-800 mb-1">Data Kosong</h3>
                                    <p class="text-gray-400 text-sm">Belum ada data pengguna yang terdaftar.</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($users->hasPages())
                <div class="px-8 py-6 bg-gray-50/50 border-t border-gray-100">
                    {{ $users->links() }}
                </div>
            @endif
        </div>
    </div>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    const searchInput = document.getElementById('search');
    const roleFilter = document.getElementById('role-filter');
    const tableBody = document.getElementById('user-table');

    function fetchUsers() {
        const search = searchInput.value;
        const role = roleFilter.value;

        fetch(`{{ route('users.search') }}?search=${encodeURIComponent(search)}&role=${role}`)
            .then(res => res.json())
            .then(data => {
                let html = '';

                if (data.length === 0) {
                    html = `
                        <tr>
                            <td colspan="5" class="text-center py-24">
                                <div class="flex flex-col items-center justify-center">
                                    <i class="fas fa-search text-5xl text-gray-100 mb-4"></i>
                                    <p class="text-gray-400">Tidak ada pengguna yang cocok</p>
                                </div>
                            </td>
                        </tr>`;
                } else {
                    data.forEach((user, index) => {
                        let roleBadge = '';
                        if(user.role === 'admin') {
                            roleBadge = '<span class="px-3 py-1 text-[10px] font-black uppercase tracking-wider bg-purple-100 text-purple-600 rounded-lg">Admin</span>';
                        } else if(user.role === 'editor') {
                            roleBadge = '<span class="px-3 py-1 text-[10px] font-black uppercase tracking-wider bg-amber-100 text-amber-600 rounded-lg">Editor</span>';
                        } else {
                            roleBadge = '<span class="px-3 py-1 text-[10px] font-black uppercase tracking-wider bg-emerald-100 text-emerald-600 rounded-lg">User</span>';
                        }

                        html += `
                            <tr class="hover:bg-gray-50/80 transition-colors group">
                                <td class="px-8 py-6 text-center text-gray-400 font-medium text-sm">${index + 1}</td>
                                <td class="px-6 py-6">
                                    <div class="flex items-center gap-3">
                                        <div class="font-bold text-gray-800 text-base group-hover:text-blue-600 transition-colors">${user.name}</div>
                                    </div>
                                </td>
                                <td class="px-6 py-6">
                                    <span class="text-gray-500 text-sm">${user.email}</span>
                                </td>
                                <td class="px-6 py-6">${roleBadge}</td>
                                <td class="px-8 py-6">
                                    <div class="flex justify-center items-center gap-2">
                                        <a href="/admin/users/${user.id}/edit" class="w-10 h-10 flex items-center justify-center text-blue-600 bg-blue-50 hover:bg-blue-600 hover:text-white rounded-xl transition-all duration-300 shadow-sm">
                                            <i class="fas fa-pen-to-square"></i>
                                        </a>
                                        <form action="/admin/users/${user.id}" method="POST" class="inline">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="button" class="w-10 h-10 flex items-center justify-center text-red-600 bg-red-50 hover:bg-red-600 hover:text-white rounded-xl transition-all duration-300 shadow-sm delete-btn">
                                                <i class="fas fa-trash-can"></i>
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
        delay = setTimeout(fetchUsers, 350);
    });

    roleFilter.addEventListener('change', fetchUsers);

    // SweetAlert Delete
    document.addEventListener('click', function(e) {
        if (e.target.closest('.delete-btn')) {
            const button = e.target.closest('.delete-btn');
            const form = button.closest('form');
            
            Swal.fire({
                title: 'Hapus pengguna?',
                text: 'Akses pengguna ini akan dicabut secara permanen!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ef4444',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal',
                customClass: {
                    confirmButton: 'rounded-xl font-bold',
                    cancelButton: 'rounded-xl font-bold'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        }
    });

    // Success notification from session
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '{{ session('success') }}',
            timer: 2500,
            showConfirmButton: false,
            customClass: { popup: 'rounded-[2rem]' }
        });
    @endif
</script>
@endpush