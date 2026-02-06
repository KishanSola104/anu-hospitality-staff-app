<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin Dashboard')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Admin CSS --}}
    <link rel="stylesheet" href="{{ asset('css/admin-app.css') }}">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>

<div class="admin-wrapper">

    {{-- Sidebar --}}
    @include('admin.partials.sidebar')

    <div class="admin-main">

        {{-- Header --}}
        @include('admin.partials.header')

        {{-- Page Content --}}
        <main class="admin-content">
            @yield('content')
        </main>

        {{-- Footer --}}
        @include('admin.partials.footer')

    </div>
</div>


<div class="sidebar-overlay" id="sidebarOverlay"></div>

<script src="{{ asset('js/admin-app.js') }}"></script>
</body>
</html>
