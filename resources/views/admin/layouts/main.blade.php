<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/css/custom.css', 'resources/css/mobile.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link href="https://unpkg.com/cropperjs/dist/cropper.min.css" rel="stylesheet"/>
</head>
<body>
<div class="admin-wrapper">
    {{-- Sidebar --}}
    @include('admin.partials.sidebar')
    {{-- Main Panel Wrapper --}}
    <main class="main-content">
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
        <div class="mt-10">
            @include('admin.partials.footer')
        </div>
    </main>
    </div>
    @stack('scripts') 
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/cropperjs/dist/cropper.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
</body>
</html>