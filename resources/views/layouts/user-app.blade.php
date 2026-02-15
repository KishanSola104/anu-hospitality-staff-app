<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>
        @yield('title', 'User Dashboard - ANU Hospitality Staff Ltd')
    </title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/webp" href="{{ asset('assets/logos/logo.webp') }}">

    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Vite CSS & JS -->
    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])
</head>
<body class="bg-gray-50">

    {{-- USER HEADER --}}
    @include('partials.user-app-header')

    {{-- MAIN CONTENT --}}
    <main style="min-height: 80vh;">
        @yield('content')
    </main>

    {{-- Optional: You can remove footer if dashboard shouldn't show it --}}
    @include('partials.footer')

</body>
</html>
