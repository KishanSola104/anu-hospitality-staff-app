<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    /**
     * Show register page
     */
    public function show(Request $request)
    {
        return view('auth.register', [
            'redirect' => $request->query('redirect')
        ]);
    }

    /**
     * Handle registration
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'email', 'max:255', Rule::unique('users', 'email')],
            'phone'    => ['nullable', 'string', 'max:20'],
            'password' => ['required', 'min:6'],
        ]);

        DB::beginTransaction();

        try {
            $user = User::create([
                'name'       => $validated['name'],
                'email'      => $validated['email'],
                'phone'      => $validated['phone'] ?? null,
                'password'   => bcrypt($validated['password']),
                'login_type' => 'email',
            ]);

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();

            return back()->withInput()
                ->with('error', 'Something went wrong. Please try again.');
        }

        //  Auto login (remember enabled)
        Auth::login($user, true);

        //  Smart redirect
        $redirect = $request->input('redirect_after_signup');

        return $redirect
            ? redirect($redirect)
            : redirect()->route('user.dashboard');
    }
}
