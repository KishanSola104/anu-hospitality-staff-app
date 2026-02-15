
@extends('layouts.user-app')

@section('title', 'My Bookings')

@section('content')
   <h1>Welcome {{ auth()->user()->name }}</h1>
@endsection
