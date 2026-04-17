// admin-sidebar.js

document.addEventListener('DOMContentLoaded', () => {
  const sidebar = document.getElementById('adminSidebar');
  const navLinks = document.querySelectorAll('.nav-link[data-link]');

  // === Active Link Animation ===
  navLinks.forEach(link => {
    link.addEventListener('click', function(e) {
      // Jika link adalah logout, biarkan redirect normal
      if (this.classList.contains('nav-link-logout')) return;

      e.preventDefault();

      // Hilangkan active dari semua link
      navLinks.forEach(l => l.classList.remove('active'));

      // Tambahkan active ke link yang diklik
      this.classList.add('active');

      // Tambahkan efek ripple/click animation
      const ripple = document.createElement('span');
      ripple.classList.add('ripple');
      this.appendChild(ripple);

      setTimeout(() => {
        ripple.remove();
      }, 800);

      // Optional: Simulate page change (bisa diganti dengan AJAX atau redirect)
      console.log(`Navigasi ke: ${this.textContent.trim()}`);
    });
  });

  // === Ripple Effect CSS (ditambahkan via JS) ===
  const style = document.createElement('style');
  style.innerHTML = `
    .nav-link {
      overflow: hidden;
      position: relative;
    }
    
    .ripple {
      position: absolute;
      background: rgba(96, 165, 250, 0.3);
      border-radius: 50%;
      transform: scale(0);
      animation: rippleAnim 0.8s linear forwards;
      pointer-events: none;
    }
    
    @keyframes rippleAnim {
      to {
        transform: scale(4);
        opacity: 0;
      }
    }
  `;
  document.head.appendChild(style);

  // === Keyboard Navigation (opsional tapi profesional) ===
  document.addEventListener('keydown', (e) => {
    if (e.key === '/' && document.activeElement.tagName !== "INPUT" && document.activeElement.tagName !== "TEXTAREA") {
      e.preventDefault();
      const firstLink = sidebar.querySelector('.nav-link');
      if (firstLink) firstLink.focus();
    }
  });

  // Tambahkan class 'loaded' untuk animasi masuk
  setTimeout(() => {
    sidebar.classList.add('loaded');
  }, 100);
});