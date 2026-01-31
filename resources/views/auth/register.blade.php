@extends('layouts.auth')

@section('title', 'Create Account | ANU Hospitality Staff LTD')

@section('content')
<div class="login-page-wrapper">

    <div class="signup-box">

        <div class="brand-name">ANU Hospitality Staff LTD</div>
        <div class="brand-sub">Professional Cleaning & Staffing Services</div>

        <h2>Create Your Account</h2>

        {{-- Errors --}}
        @if(session('error'))
            <div class="error-msg">{{ session('error') }}</div>
        @endif

        @if($errors->any())
            <div class="error-msg">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="input-group">
                <label>Full Name</label>
                <input type="text" name="name" value="{{ old('name') }}" required>
            </div>

            <div class="input-group">
                <label>Email Address</label>
                <input type="email" name="email" value="{{ old('email') }}" required>
            </div>

            <div class="input-group">
                <label>Phone Number</label>
                <input type="text" name="phone" value="{{ old('phone') }}">
            </div>

            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>

            {{-- Redirect context --}}
            <input type="hidden" name="redirect_after_signup" value="{{ $redirect }}">

            <button type="submit" class="signup-btn">Create Account</button>
        </form>

        {{-- Google Signup --}}
        <a href="{{ route('google.login', ['redirect' => $redirect]) }}" class="google-btn">
            <img src="{{ asset('assets/logos/goggle_logo.svg') }}" alt="Google Logo">
            Continue with Google
        </a>

        <div class="login-link">
            Already have an account?
            <a href="{{ route('login', ['redirect' => $redirect]) }}">Login</a>
        </div>

    </div>

</div>
@endsection
