<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    /* ======================
       SHOW LOGIN
    ====================== */
    public function showLogin()
    {
        // If already logged in, redirect to dashboard
        if (Session::has('admin_id')) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.auth.login');
    }

    /* ======================
       LOGIN
    ====================== */
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $admin = Admin::where('email', $request->email)->first();

        if (!$admin || !Hash::check($request->password, $admin->password)) {
            return back()->with('error', 'Invalid email or password');
        }

        // IMPORTANT: regenerate session (security)
        $request->session()->regenerate();

        // Store admin session
        Session::put('admin_id', $admin->id);

        return redirect()->route('admin.dashboard');
    }

    /* ======================
       LOGOUT
    ====================== */
    public function logout(Request $request)
    {
        // Destroy complete session
        Session::flush();

        // Regenerate token & session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
