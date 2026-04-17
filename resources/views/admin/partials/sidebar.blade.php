<aside class="admin-sidebar" id="adminSidebar">
  <!-- Header / Logo -->
  <div class="sidebar-header d-flex align-items-center justify-content-between">
    <div class="logo-container">
      <h2 class="logo-text">Admin<span class="logo-highlight">Panel</span></h2>
    </div>
  </div>

  <!-- Navigasi Utama -->
  <nav class="sidebar-nav">
    
    <!-- Dashboard -->
    <a href="{{ route('admin') }}" class="nav-link {{ Route::is('admin') ? 'active' : '' }}" data-link>
      <i class="icon">📊</i>
      <span>Dashboard</span>
    </a>

    <!-- Grup: Konten -->
    <div class="nav-group">
      <span class="nav-group-title">KONTEN</span>
      <a href="#" class="nav-link" data-link>
        <i class="icon">📰</i>
        <span>Berita</span>
      </a>
      <a href="{{ route('carousels.index') }}" class="nav-link" data-link>
        <i class="icon">📄</i>
        <span>Carousel</span>
      </a>
      <a href="{{ route('extras.index') }}" class="nav-link {{ Route::is('extras.index') ? 'active' : '' }}" data-link>
        <i class="bi bi-activity"></i>
        <span>Ekstrakurikuler</span>
      </a>
      <a href="{{ route('school.profile') }}" class="nav-link {{ Route::is('school.profile') ? 'active' : '' }}" data-link>
        <i class="icon">🖼️</i>
        <span>Profile</span>
      </a>
    </div>

    <!-- Grup: Manajemen -->
    <div class="nav-group">
      <span class="nav-group-title">MANAJEMEN</span>
      <a href="{{ route('users.index') }}" class="nav-link {{ Route::is('users.*') ? 'active' : '' }}" data-link>
        <i class="icon">👥</i>
        <span>Pengguna</span>
      </a>
      <a href="#" class="nav-link" data-link>
        <i class="icon">🔑</i>
        <span>Role & Akses</span>
      </a>
      <a href="#" class="nav-link" data-link>
        <i class="icon">💬</i>
        <span>Komentar</span>
      </a>
    </div>

    <!-- Grup: Sistem -->
    <div class="nav-group">
      <span class="nav-group-title">SISTEM</span>
      <a href="#" class="nav-link" data-link>
        <i class="icon">⚙️</i>
        <span>Pengaturan</span>
      </a>
      <a href="#" class="nav-link" data-link>
        <i class="icon">📋</i>
        <span>Log Aktivitas</span>
      </a>
      <a href="#" class="nav-link" data-link>
        <i class="icon">💾</i>
        <span>Backup & Restore</span>
      </a>
    </div>
  </nav>

  <!-- Footer / Logout -->
  <div class="sidebar-footer">
    <a href="/logout" class="nav-link nav-link-logout" data-link>
      <i class="icon">🚪</i>
      <span>Logout</span>
    </a>
  </div>
</aside>

<script>
const sidebar = document.getElementById('adminSidebar');
const mobileToggle = document.getElementById('mobileToggle');

// MOBILE ONLY
if (mobileToggle) {
    mobileToggle.addEventListener('click', () => {
        sidebar.classList.toggle('show');
    });
}
</script>