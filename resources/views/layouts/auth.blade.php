<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap">

    {{-- Vite CSS & JS --}}
    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])
</head>
<body>

    @yield('content')

</body>
</html>
