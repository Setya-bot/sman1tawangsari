<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/css/custom.css', 'resources/css/mobile.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<div class="admin-wrapper">
    {{-- Sidebar --}}
    @include('admin.partials.sidebar')
    {{-- Main Panel Wrapper --}}
    <main class="main-content">
        <button id="mobileToggle" class="mobile-toggle-btn d-md-none">
            ☰
        </button>
        {{-- Top Navbar (Opsional) --}}
        <header class="top-header">
            <div class="header-left">
                <h2 class="page-title">@yield('title')</h2>
            </div>
            <div class="header-right">
                <span>{{ auth()->user()->name }}</span>
            </div>
        </header>
        {{-- Page Content Wrapper --}}
        <div class="content-container">
            @yield('content')
        </div>
        {{-- Footer --}}
        @include('admin.partials.footer')
    </main>
    </div>
    @stack('scripts') 
</body>
</html>