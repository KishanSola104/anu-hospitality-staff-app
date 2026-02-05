<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Admin Auth CSS --}}
   <link rel="stylesheet" href="{{ asset('css/admin-auth.css') }}">
</head>
<body>

<div class="auth-wrapper">

    <div class="auth-card">

        <!-- Brand -->
        <div class="auth-brand">
            <h1>Anu Hospitality Staff</h1>
            <span>Admin Panel</span>
        </div>

        <h2 class="auth-title">Admin Login</h2>
        <p class="auth-subtitle">Sign in to manage your dashboard</p>

        @if(session('error'))
            <div class="auth-error">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.login.submit') }}">
            @csrf

            <div class="form-group">
                <input type="email" name="email" placeholder="Email address" required>
            </div>

            <div class="form-group">
                <input type="password" name="password" placeholder="Password" required>
            </div>

            <button type="submit" class="auth-btn">
                Login
            </button>
        </form>

        <!-- Footer -->
        <div class="auth-footer">
            <p>© {{ date('Y') }} Anu Hospitality Staff. All rights reserved.</p>
            <p class="powered-by">
                Powered by <strong>Shreeji IT Solution</strong>
            </p>
        </div>

    </div>

</div>

</body>
</html>