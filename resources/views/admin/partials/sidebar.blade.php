<aside class="fixed left-0 top-0 h-full w-64 bg-gray-900 text-white z-30 transform transition-transform duration-300 ease-in-out -translate-x-full lg:translate-x-0" id="adminSidebar">
  <!-- Header / Logo -->
  <div class="flex items-center justify-between p-4 border-b border-gray-800">
    <div class="logo-container">
      <h2 class="text-xl font-bold">Admin<span class="text-blue-500">Panel</span></h2>
    </div>
  </div>

  <!-- Navigasi Utama -->
  <nav class="flex-1 overflow-y-auto py-4">
    
    <!-- Dashboard -->
    <a href="{{ route('admin') }}" class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-gray-800 hover:text-white transition-colors duration-200 {{ Route::is('admin') ? 'bg-gray-800 text-white border-r-4 border-blue-500' : '' }}" data-link>
      <i class="icon w-5">📊</i>
      <span>Dashboard</span>
    </a>

    <!-- Grup: Konten -->
    <div class="nav-group mt-4">
      <span class="block px-4 py-2 text-xs font-semibold text-gray-500 uppercase tracking-wider">KONTEN</span>
      <a href="#" class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-gray-800 hover:text-white transition-colors duration-200" data-link>
        <i class="icon w-5">📰</i>
        <span>Berita</span>
      </a>
      <a href="{{ route('carousels.index') }}" class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-gray-800 hover:text-white transition-colors duration-200 {{ Route::is('carousels.index') ? 'bg-gray-800 text-white border-r-4 border-blue-500' : '' }}" data-link>
        <i class="icon w-5">📄</i>
        <span>Carousel</span>
      </a>
      <a href="{{ route('school.profile') }}" class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-gray-800 hover:text-white transition-colors duration-200 {{ Route::is('school.profile') ? 'bg-gray-800 text-white border-r-4 border-blue-500' : '' }}" data-link>
        <i class="icon w-5">🖼️</i>
        <span>Profile</span>
      </a>
    </div>
    
    <!-- Grup: Manajemen -->
    <div class="nav-group mt-4">
      <span class="block px-4 py-2 text-xs font-semibold text-gray-500 uppercase tracking-wider">MANAJEMEN</span>
      <a href="{{ route('ekskuls.index') }}" class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-gray-800 hover:text-white transition-colors duration-200 {{ Route::is('ekskuls.index') ? 'bg-gray-800 text-white border-r-4 border-blue-500' : '' }}" data-link>
        <i class="bi bi-activity w-5">📄</i>
        <span>Ekskul</span>
      </a>
      <a href="{{ route('users.index') }}" class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-gray-800 hover:text-white transition-colors duration-200 {{ Route::is('users.*') ? 'bg-gray-800 text-white border-r-4 border-blue-500' : '' }}" data-link>
        <i class="icon w-5">👥</i>
        <span>Pengguna</span>
      </a>
      <a href="{{ route('administrators.index') }}" class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-gray-800 hover:text-white transition-colors duration-200" data-link>
        <i class="icon w-5">🔑</i>
        <span>Administrator</span>
      </a>
      <a href="#" class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-gray-800 hover:text-white transition-colors duration-200" data-link>
        <i class="icon w-5">💬</i>
        <span>Komentar</span>
      </a>
    </div>
  </nav>

  <!-- Footer / Logout -->
  <div class="border-t border-gray-800">
    <a href="/logout" class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-gray-800 hover:text-white transition-colors duration-200" data-link>
      <i class="icon w-5">🚪</i>
      <span>Logout</span>
    </a>
  </div>
</aside>

<script>
const sidebar = document.getElementById('adminSidebar');
const mobileToggle = document.getElementById('mobileToggle');

if (mobileToggle) {
    mobileToggle.addEventListener('click', (e) => {
        e.stopPropagation(); // Mencegah event bubbling
        sidebar.classList.toggle('-translate-x-full');
    });
}

// Menutup sidebar jika klik di luar (Optional tapi disarankan untuk Mobile)
document.addEventListener('click', (e) => {
    if (!sidebar.contains(e.target) && !mobileToggle.contains(e.target)) {
        sidebar.classList.add('-translate-x-full');
    }
});
</script>