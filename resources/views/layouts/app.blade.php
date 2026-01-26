<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>
             @yield('title', 'ANU Hospitality Staff Ltd')
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
<body>

    @include('partials.header')

    @yield('content')

     @include('partials.footer')

</body>
</html>
