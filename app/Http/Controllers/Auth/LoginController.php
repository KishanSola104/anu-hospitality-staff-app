<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Show login page
     */
    public function show(Request $request)
    {
        return view('auth.login', [
            'redirect' => $request->query('redirect')
        ]);
    }

    /**
     * Handle login form
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, true)) {
            $request->session()->regenerate();

            $redirect = $request->input('redirect_after_login');

            return $redirect
                ? redirect($redirect)
                : redirect()->route('user.dashboard');
        }

        return back()->with('error', 'Invalid email or password.');
    }

    /**
     * Logout user
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
