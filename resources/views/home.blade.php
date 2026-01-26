@extends('layouts.app')

@section('title', 'Home - ANU Hospitality Staff Ltd | Professional Staffing Services')

@section('content')
    
        
         {{-- Hero Section --}}
    @include('home.hero')

    {{-- About Us --}}
    @include('home.about')

    {{-- Services --}}
    @include('home.services')

    {{-- Why Choose Us --}}
    @include('home.why-choose-us')

    {{-- How We Work --}}
    @include('home.how-we-work')

    
@endsection
