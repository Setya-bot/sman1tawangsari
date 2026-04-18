@extends('admin.layouts.main')

@section('title', 'Ekstrakurikuler')

@section('content')

    <div class="max-w-8xl mx-auto p-6">
        <div class="bg-white rounded-[2rem] shadow-sm border border-gray-100 p-6 mb-8">
            <div class="flex flex-col md:flex-row justify-between items-center gap-5">
                
                <div class="flex-1 relative group w-full md:w-auto">
                    <div class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 group-focus-within:text-blue-600 transition-colors">
                        <i class="fas fa-search"></i>
                    </div>
                    <input type="text" 
                           id="search"
                           placeholder="Cari nama atau deskripsi ekstrakurikuler..." 
                           class="w-full pl-12 pr-4 py-3.5 bg-gray-50 border border-gray-200 rounded-2xl focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-500/5 transition-all text-sm">
                </div>
                
                <a href="{{ route('extras.create') }}" 
                   class="flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-8 py-3.5 rounded-2xl font-bold transition-all shadow-lg shadow-blue-600/20 active:scale-95 text-sm w-full md:w-auto">
                    <i class="fas fa-plus"></i>
                    Tambah Ekstrakurikuler
                </a>
            </div>
        </div>

        <div class="bg-white rounded-[2.5rem] shadow-xl shadow-gray-200/50 border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50/50">
                            <th class="px-8 py-5 text-[11px] font-bold text-gray-400 uppercase tracking-[0.1em] w-20 text-center">No</th>
                            <th class="px-6 py-5 text-[11px] font-bold text-gray-400 uppercase tracking-[0.1em] w-32">Gambar</th>
                            <th class="px-6 py-5 text-[11px] font-bold text-gray-400 uppercase tracking-[0.1em]">Nama Ekstrakurikuler</th>
                            <th class="px-6 py-5 text-[11px] font-bold text-gray-400 uppercase tracking-[0.1em]">Deskripsi</th>
                            <th class="px-8 py-5 text-[11px] font-bold text-gray-400 uppercase tracking-[0.1em] text-center w-40">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="extra-table" class="divide-y divide-gray-100">
                        @forelse ($extras as $key => $extra)
                        <tr class="hover:bg-gray-50/80 transition-colors group">
                            <td class="px-8 py-6 text-center text-gray-400 font-medium text-sm">
                                {{ $extras->firstItem() + $key }}
                            </td>
                            <td class="px-6 py-6">
                                <div class="w-16 h-16 bg-gray-100 rounded-2xl overflow-hidden border border-gray-100 shadow-inner group-hover:scale-105 transition-transform duration-300">
                                    @if($extra->image)
                                        <img src="{{ $extra->image_url }}" 
                                             alt="{{ $extra->name }}" 
                                             class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-gray-300">
                                            <i class="fas fa-image text-xl"></i>
                                        </div>
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-6">
                                <div class="font-bold text-gray-800 text-base group-hover:text-blue-600 transition-colors">{{ $extra->name }}</div>
                            </td>
                            <td class="px-6 py-6 max-w-xs">
                                <p class="text-gray-500 text-xs leading-relaxed line-clamp-2">
                                    {{ $extra->description ?? 'Tidak ada deskripsi tersedia' }}
                                </p>
                            </td>
                            <td class="px-8 py-6">
                                <div class="flex justify-center items-center gap-2">
                                    <a href="{{ route('extras.edit', $extra->id) }}" 
                                       class="w-10 h-10 flex items-center justify-center text-blue-600 bg-blue-50 hover:bg-blue-600 hover:text-white rounded-xl transition-all duration-300 shadow-sm"
                                       title="Edit">
                                        <i class="fas fa-pen-to-square"></i>
                                    </a>
                                    <form action="{{ route('extras.destroy', $extra->id) }}" method="POST" class="inline">
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
                                        <i class="fas fa-skating text-5xl text-gray-200"></i>
                                    </div>
                                    <h3 class="text-xl font-bold text-gray-800 mb-1">Data Kosong</h3>
                                    <p class="text-gray-400 text-sm">Belum ada data ekstrakurikuler yang ditambahkan.</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($extras->hasPages())
                <div class="px-8 py-6 bg-gray-50/50 border-t border-gray-100">
                    {{ $extras->links() }}
                </div>
            @endif
        </div>
    </div>

@endsection

@push('scripts')
<script>
    const searchInput = document.getElementById('search');
    const tableBody = document.getElementById('extra-table');

    function fetchExtras() {
        const search = searchInput.value;

        fetch(`{{ route('extras.search') }}?search=${encodeURIComponent(search)}`)
            .then(res => res.json())
            .then(data => {
                let html = '';

                if (data.length === 0) {
                    html = `
                        <tr>
                            <td colspan="5" class="text-center py-24">
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
                            : `<div class="w-full h-full flex items-center justify-center text-gray-300"><i class="fas fa-image text-xl"></i></div>`;

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
                                <td class="px-6 py-6 max-w-xs">
                                    <p class="text-gray-500 text-xs leading-relaxed line-clamp-2">${item.description ?? '-'}</p>
                                </td>
                                <td class="px-8 py-6">
                                    <div class="flex justify-center items-center gap-2">
                                        <a href="/admin/extras/${item.id}/edit" class="w-10 h-10 flex items-center justify-center text-blue-600 bg-blue-50 hover:bg-blue-600 hover:text-white rounded-xl transition-all duration-300 shadow-sm">
                                            <i class="fas fa-pen-to-square"></i>
                                        </a>
                                        <form action="/admin/extras/${item.id}" method="POST" class="inline">
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
        delay = setTimeout(fetchExtras, 350);
    });

    // Handle Delete using SweetAlert (Event Delegation)
    document.addEventListener('click', function(e) {
        if (e.target.closest('.delete-btn')) {
            const button = e.target.closest('.delete-btn');
            const form = button.closest('form');
            
            Swal.fire({
                title: 'Hapus data?',
                text: 'Ekstrakurikuler akan dihapus secara permanen!',
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