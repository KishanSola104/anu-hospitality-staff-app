@extends('layouts.auth')

@section('title', 'Login | ANU Hospitality Staff LTD')

@section('content')
<div class="login-page-wrapper">

    <div class="login-box">

        <div class="brand-name">ANU Hospitality Staff LTD</div>
        <div class="brand-sub">Professional Cleaning & Staffing Services</div>

        <h2>Login to Continue</h2>

        {{-- Error Message --}}
        @if(session('error'))
        <div class="error-msg">
            {{ session('error') }}
        </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="input-group">
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required>
            </div>

            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>

            {{-- Redirect after login --}}
            <input type="hidden" name="redirect_after_login" value="{{ request('redirect') }}">

            <button type="submit" class="login-btn">Login</button>
        </form>

        {{-- Google Login --}}
        <a href="{{ route('google.login', ['redirect' => request('redirect')]) }}" class="google-btn">
            <img src="{{ asset('assets/logos/goggle_logo.svg') }}" alt="Google Logo">
            Continue with Google
        </a>


        <div class="signup-link">
            Don’t have an account?
            <a href="{{ route('register', ['redirect' => request('redirect')]) }}">
                Create one
            </a>
        </div>

    </div>

</div>
@endsection