@extends('admin.layouts.main')

@section('title', 'Administrator')

@section('content')
    <div class="max-w-8xl mx-auto">
        
        <!-- Search & Button -->
        <div class="bg-white rounded-[2rem] shadow-sm border border-gray-100 p-6 mb-8">
            <div class="flex flex-col md:flex-row justify-between items-center gap-5">
                
                <div class="flex-1 relative group w-full md:w-auto">
                    <div class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 group-focus-within:text-blue-600 transition-colors">
                        <i class="fas fa-search"></i>
                    </div>
                    <input type="text" 
                           id="search"
                           placeholder="Cari nama, NIP, atau keterangan..." 
                           class="w-full pl-12 pr-4 py-3.5 bg-gray-50 border border-gray-200 rounded-2xl focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-500/5 transition-all text-sm">
                </div>
                
                <a href="{{ route('administrators.create') }}" 
                   class="flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-8 py-3.5 rounded-2xl font-bold transition-all shadow-lg shadow-blue-600/20 active:scale-95 text-sm w-full md:w-auto">
                    <i class="fas fa-plus"></i>
                    Tambah Administrator
                </a>
            </div>
        </div>

        <!-- Table Card -->
        <div class="bg-white rounded-[2.5rem] shadow-xl shadow-gray-200/50 border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50/50">
                            <th class="px-8 py-5 text-[11px] font-bold text-gray-400 uppercase tracking-[0.1em] w-20 text-center">No</th>
                            <th class="px-6 py-5 text-[11px] font-bold text-gray-400 uppercase tracking-[0.1em] w-28">Foto</th>
                            <th class="px-6 py-5 text-[11px] font-bold text-gray-400 uppercase tracking-[0.1em]">Nama</th>
                            <th class="px-6 py-5 text-[11px] font-bold text-gray-400 uppercase tracking-[0.1em]">Role</th>
                            <th class="px-6 py-5 text-[11px] font-bold text-gray-400 uppercase tracking-[0.1em]">NIP</th>
                            <th class="px-6 py-5 text-[11px] font-bold text-gray-400 uppercase tracking-[0.1em] max-w-md">Keterangan</th>
                            <th class="px-8 py-5 text-[11px] font-bold text-gray-400 uppercase tracking-[0.1em] text-center w-40">Status</th>
                            <th class="px-8 py-5 text-[11px] font-bold text-gray-400 uppercase tracking-[0.1em] text-center w-44">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="admin-table" class="divide-y divide-gray-100">
                        @forelse ($administrators as $key => $admin)
                        <tr class="hover:bg-gray-50/80 transition-colors group">
                            <td class="px-8 py-6 text-center text-gray-400 font-medium text-sm">
                                {{ $administrators->firstItem() + $key }}
                            </td>
                            <td class="px-6 py-6">
                                <div class="w-16 h-16 bg-gray-100 rounded-2xl overflow-hidden border border-gray-100 shadow-inner group-hover:scale-105 transition-transform duration-300">
                                    @if($admin->image)
                                        <img src="{{ $admin->image_url }}" 
                                             alt="{{ $admin->name }}" 
                                             class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-gray-300 text-3xl">
                                            👤
                                        </div>
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-6">
                                <div class="font-bold text-gray-800 text-base group-hover:text-blue-600 transition-colors">
                                    {{ $admin->name }}
                                </div>
                            </td>
                            <td class="px-6 py-6">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium
                                    {{ $admin->role == 'pengurus' ? 'bg-purple-100 text-purple-700' : 
                                       ($admin->role == 'guru' ? 'bg-blue-100 text-blue-700' : 'bg-amber-100 text-amber-700') }}">
                                    {{ ucfirst($admin->role) }}
                                </span>
                            </td>
                            <td class="px-6 py-6 text-gray-600 font-mono text-sm">
                                {{ $admin->nip ?? '-' }}
                            </td>
                            <td class="px-6 py-6 max-w-md">
                                <p class="text-gray-500 text-xs leading-relaxed line-clamp-2">
                                    {{ $admin->keterangan }}
                                </p>
                            </td>
                            <td class="px-8 py-6 text-center">
                                <span class="inline-flex items-center px-4 py-1.5 rounded-2xl text-xs font-semibold
                                    {{ $admin->is_active ? 'bg-emerald-100 text-emerald-700' : 'bg-red-100 text-red-700' }}">
                                    {{ $admin->is_active ? 'Aktif' : 'Nonaktif' }}
                                </span>
                            </td>
                            <td class="px-8 py-6">
                                <div class="flex justify-center items-center gap-2">
                                    <a href="{{ route('administrators.edit', $admin->id) }}" 
                                       class="w-10 h-10 flex items-center justify-center text-blue-600 bg-blue-50 hover:bg-blue-600 hover:text-white rounded-xl transition-all duration-300 shadow-sm"
                                       title="Edit">
                                        <i class="fas fa-pen-to-square"></i>
                                    </a>
                                    
                                    <form action="{{ route('administrators.destroy', $admin->id) }}" 
                                          method="POST" class="inline">
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
                            <td colspan="8" class="text-center py-24">
                                <div class="flex flex-col items-center justify-center">
                                    <div class="w-32 h-32 bg-gray-50 rounded-full flex items-center justify-center mb-6">
                                        <i class="fas fa-users text-6xl text-gray-200"></i>
                                    </div>
                                    <h3 class="text-xl font-bold text-gray-800 mb-1">Belum Ada Data</h3>
                                    <p class="text-gray-400 text-sm">Administrator belum ditambahkan.</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($administrators->hasPages())
                <div class="px-8 py-6 bg-gray-50/50 border-t border-gray-100">
                    {{ $administrators->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection

@push('scripts')
<script>
    const searchInput = document.getElementById('search');
    const tableBody = document.getElementById('admin-table');

    function fetchAdministrators() {
        const search = searchInput.value;

        fetch(`{{ route('administrators.search') }}?search=${encodeURIComponent(search)}`)
            .then(res => res.json())
            .then(data => {
                let html = '';

                if (data.length === 0) {
                    html = `
                        <tr>
                            <td colspan="8" class="text-center py-24">
                                <div class="flex flex-col items-center justify-center">
                                    <i class="fas fa-search text-5xl text-gray-100 mb-4"></i>
                                    <p class="text-gray-400">Tidak ada hasil yang cocok</p>
                                </div>
                            </td>
                        </tr>`;
                } else {
                    data.forEach((item, index) => {
                        const imgHtml = item.image 
                            ? `<img src="${item.image_url}" class="w-full h-full object-cover">`
                            : `<div class="w-full h-full flex items-center justify-center text-gray-300 text-3xl">👤</div>`;

                        const roleClass = item.role === 'pengurus' ? 'bg-purple-100 text-purple-700' :
                                        (item.role === 'guru' ? 'bg-blue-100 text-blue-700' : 'bg-amber-100 text-amber-700');

                        const statusClass = item.is_active ? 'bg-emerald-100 text-emerald-700' : 'bg-red-100 text-red-700';
                        const statusText = item.is_active ? 'Aktif' : 'Nonaktif';

                        html += `
                            <tr class="hover:bg-gray-50/80 transition-colors group">
                                <td class="px-8 py-6 text-center text-gray-400 font-medium text-sm">${index + 1}</td>
                                <td class="px-6 py-6">
                                    <div class="w-16 h-16 bg-gray-100 rounded-2xl overflow-hidden border border-gray-100 shadow-inner group-hover:scale-105 transition-transform duration-300">
                                        ${imgHtml}
                                    </div>
                                </td>
                                <td class="px-6 py-6">
                                    <div class="font-bold text-gray-800 text-base group-hover:text-blue-600 transition-colors">${item.name}</div>
                                </td>
                                <td class="px-6 py-6">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium ${roleClass}">
                                        ${item.role.charAt(0).toUpperCase() + item.role.slice(1)}
                                    </span>
                                </td>
                                <td class="px-6 py-6 text-gray-600 font-mono text-sm">${item.nip || '-'}</td>
                                <td class="px-6 py-6 max-w-md">
                                    <p class="text-gray-500 text-xs leading-relaxed line-clamp-2">${item.keterangan}</p>
                                </td>
                                <td class="px-8 py-6 text-center">
                                    <span class="inline-flex items-center px-4 py-1.5 rounded-2xl text-xs font-semibold ${statusClass}">
                                        ${statusText}
                                    </span>
                                </td>
                                <td class="px-8 py-6">
                                    <div class="flex justify-center items-center gap-2">
                                        <a href="/admin/administrators/${item.id}/edit" 
                                           class="w-10 h-10 flex items-center justify-center text-blue-600 bg-blue-50 hover:bg-blue-600 hover:text-white rounded-xl transition-all duration-300 shadow-sm">
                                            <i class="fas fa-pen-to-square"></i>
                                        </a>
                                        <form action="/admin/administrators/${item.id}" method="POST" class="inline">
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
        delay = setTimeout(fetchAdministrators, 350);
    });

    // SweetAlert Delete Confirmation
    document.addEventListener('click', function(e) {
        if (e.target.closest('.delete-btn')) {
            const button = e.target.closest('.delete-btn');
            const form = button.closest('form');
            
            Swal.fire({
                title: 'Hapus Administrator?',
                text: 'Data akan dihapus secara permanen!',
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
</script>
@endpush