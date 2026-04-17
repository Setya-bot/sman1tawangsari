@extends('admin.layouts.main')

@section('title', 'Manajemen Carousel')

@section('content')

    <div class="max-w-8xl mx-auto">
        <!-- Search & Filter -->
        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-6 mb-6">
            <div class="flex flex-col md:flex-row gap-4">
                <div class="flex-1 relative">
                    <div class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                        <i class="fas fa-search"></i>
                    </div>
                    <input type="text" 
                           id="searchInput"
                           placeholder="Cari berdasarkan judul atau deskripsi..." 
                           class="w-full pl-11 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-2xl focus:outline-none focus:border-blue-500 transition">
                </div>
                
                <div class="flex items-center gap-3">
                    <select id="statusFilter" class="px-8 py-3 bg-gray-50 border w-100 border-gray-200 rounded-2xl focus:outline-none">
                        <option value="">Semua Status</option>
                        <option value="1">Aktif</option>
                        <option value="0">Nonaktif</option>
                    </select>
                </div>
                <a href="{{ route('carousels.create') }}" class="flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-2xl font-medium transition shadow-sm">
                    <i class="fas fa-plus"></i>
                    Tambah Carousel Baru
                </a>
            </div>
        </div>

        <!-- Table -->
        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
            <table class="w-full">
                <thead class="bg-white-50">
                    <tr>
                        <th class="px-8 py-5 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider w-16">No</th>
                        <th class="px-6 py-5 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Gambar</th>
                        <th class="px-6 py-5 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Judul</th>
                        <th class="px-6 py-5 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Deskripsi</th>
                        <th class="px-6 py-5 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Link</th>
                        <th class="px-6 py-5 text-center text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-8 py-5 text-center text-xs font-semibold text-gray-500 uppercase tracking-wider w-32">Aksi</th>
                    </tr>
                </thead>
                <tbody id="carouselTableBody" class="divide-y divide-gray-100">
                    @forelse ($carousels as $key => $carousel)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-8 py-6 text-gray-400 font-medium">
                            {{ $carousels->firstItem() + $key }}
                        </td>
                        <td class="px-6 py-6">
                            <div class="w-20 h-14 bg-gray-100 rounded-2xl overflow-hidden border border-gray-200">
                                @if($carousel->image)
                                    <img src="{{ $carousel->image_url }}" 
                                         alt="{{ $carousel->title }}" 
                                         class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-gray-300">
                                        <i class="fas fa-image text-2xl"></i>
                                    </div>
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-6 font-medium text-gray-800">{{ $carousel->title }}</td>
                        <td class="px-6 py-6 text-gray-600 text-sm max-w-xs">
                            {{ Str::limit($carousel->description, 80) ?? '-' }}
                        </td>
                        <td class="px-6 py-6">
                            @if($carousel->link)
                                <a href="{{ $carousel->link }}" target="_blank" 
                                   class="text-blue-600 hover:underline text-sm flex items-center gap-1">
                                    <i class="fas fa-external-link-alt"></i>
                                    <span>Link</span>
                                </a>
                            @else
                                <span class="text-gray-400">-</span>
                            @endif
                        </td>
                        <td class="px-6 py-6 text-center">
                            @if($carousel->is_active)
                                <span class="inline-flex items-center px-4 py-1.5 rounded-2xl text-xs font-medium bg-emerald-100 text-emerald-700">
                                    <span class="w-2 h-2 bg-emerald-500 rounded-full mr-2 animate-pulse"></span>
                                    Aktif
                                </span>
                            @else
                                <span class="inline-flex items-center px-4 py-1.5 rounded-2xl text-xs font-medium bg-gray-100 text-gray-600">
                                    Nonaktif
                                </span>
                            @endif
                        </td>
                        <td class="px-8 py-6">
                            <div class="flex justify-center gap-2">
                                <a href="{{ route('carousels.edit', $carousel->id) }}" 
                                   class="p-3 text-blue-600 hover:bg-blue-50 rounded-2xl transition">
                                    <i class="fas fa-pen-to-square"></i>
                                </a>
                                <button onclick="deleteCarousel({{ $carousel->id }})" 
                                        class="p-3 text-red-600 hover:bg-red-50 rounded-2xl transition">
                                    <i class="fas fa-trash-can"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-20 text-gray-400">
                            <i class="fas fa-images text-6xl mb-4"></i>
                            <p>Belum ada data carousel</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- Pagination -->
            <div class="px-8 py-5 border-t">
                {{ $carousels->links() }}
            </div>
        </div>

    </div>
@endsection

@push('scripts')
<script>
    // Live Search
    const searchInput = document.getElementById('searchInput');
    const statusFilter = document.getElementById('statusFilter');
    const tableBody = document.getElementById('carouselTableBody');

    let timeout;

    function fetchCarousels() {
        const search = searchInput.value;
        const status = statusFilter.value;

        fetch(`{{ route('carousels.search') }}?search=${encodeURIComponent(search)}&status=${status}`)
            .then(response => {
                if (!response.ok) throw new Error('Network response was not ok');
                return response.json();
            })
            .then(data => {
                let html = '';

                if (data.length === 0) {
                    html = `
                        <tr>
                            <td colspan="7" class="text-center py-16 text-gray-400">
                                <i class="fas fa-search text-5xl mb-3"></i>
                                <p>Tidak ditemukan data yang sesuai</p>
                            </td>
                        </tr>`;
                } else {
                    data.forEach((item, index) => {
                        const statusBadge = item.is_active 
                            ? `<span class="inline-flex items-center px-4 py-1.5 rounded-2xl text-xs font-medium bg-emerald-100 text-emerald-700"><span class="w-2 h-2 bg-emerald-500 rounded-full mr-2 animate-pulse"></span>Aktif</span>`
                            : `<span class="inline-flex items-center px-4 py-1.5 rounded-2xl text-xs font-medium bg-gray-100 text-gray-600">Nonaktif</span>`;

                        const imageHtml = item.image_url 
                            ? `<img src="${item.image_url}" class="w-20 h-14 object-cover rounded-2xl border border-gray-200">`
                            : `<div class="w-20 h-14 bg-gray-100 rounded-2xl flex items-center justify-center text-gray-300"><i class="fas fa-image"></i></div>`;

                        html += `
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-8 py-6 text-gray-400 font-medium">${index + 1}</td>
                                <td class="px-6 py-6">${imageHtml}</td>
                                <td class="px-6 py-6 font-medium">${item.title}</td>
                                <td class="px-6 py-6 text-gray-600 text-sm">${item.description ? item.description.substring(0, 80) + '...' : '-'}</td>
                                <td class="px-6 py-6">
                                    ${item.link ? `<a href="${item.link}" target="_blank" class="text-blue-600 hover:underline">Link</a>` : '-'}
                                </td>
                                <td class="px-6 py-6 text-center">${statusBadge}</td>
                                <td class="px-8 py-6">
                                    <div class="flex justify-center gap-2">
                                        <a href="/admin/carousels/${item.id}/edit" class="p-3 text-blue-600 hover:bg-blue-50 rounded-2xl transition">
                                            <i class="fas fa-pen-to-square"></i>
                                        </a>
                                        <button onclick="deleteCarousel(${item.id})" class="p-3 text-red-600 hover:bg-red-50 rounded-2xl transition">
                                            <i class="fas fa-trash-can"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>`;
                    });
                }
                tableBody.innerHTML = html;
            })
            .catch(error => {
            console.error('Error:', error);
        });
    }

    // Debounce Search
    searchInput.addEventListener('keyup', () => {
        clearTimeout(timeout);
        timeout = setTimeout(fetchCarousels, 350);
    });

    statusFilter.addEventListener('change', fetchCarousels);

    // Delete Function with SweetAlert
    function deleteCarousel(id) {
        Swal.fire({
            title: 'Hapus Carousel?',
            text: "Data ini akan dihapus secara permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ef4444',
            cancelButtonColor: '#6b7280',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Menghapus...',
                    allowOutsideClick: false,
                    didOpen: () => Swal.showLoading()
                });

                fetch(`/admin/carousels/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire('Terhapus!', data.message, 'success');
                        fetchCarousels(); // Refresh table
                    } else {
                        Swal.fire('Gagal!', data.message || 'Terjadi kesalahan', 'error');
                    }
                });
            }
        });
    }

    // Notifikasi dari Session
    @if(session('success'))
    Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: '{{ session('success') }}',
        timer: 3000,
        showConfirmButton: false
    });
    @endif

    @if(session('error'))
    Swal.fire({
        icon: 'error',
        title: 'Gagal',
        text: '{{ session('error') }}',
        timer: 4000
    });
    @endif
</script>
@endpush
