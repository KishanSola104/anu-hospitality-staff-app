<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>@yield('title', 'Booking | ANU Hospitality Staff Ltd')</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="icon" type="image/webp" href="{{ asset('assets/logos/logo.webp') }}">

    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Booking CSS -->
<link rel="stylesheet" href="{{ asset('css/booking-app.css') }}">

</head>
<body>

    @include('partials.booking-header')

    @yield('content')

    @include('partials.booking-footer')


        <!-- AngularJS -->
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.3/angular.min.js"></script>


    <!-- Booking JS -->
<script src="{{ asset('js/booking-app.js') }}"></script>

</body>
</html>
