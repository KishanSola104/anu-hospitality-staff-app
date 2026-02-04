<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    /**
     * Redirect user to Google authentication page
     */
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Handle Google callback
     */
    public function callback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
        } catch (\Throwable $e) {
            return redirect()->route('login')
                ->with('error', 'Google authentication failed. Please try again.');
        }

        DB::beginTransaction();

        try {
            // Check if user already exists by email
            $user = User::where('email', $googleUser->getEmail())->first();

            if ($user) {
                $user->update([
                    'login_type'     => 'google',
                    'profile_image' => $googleUser->getAvatar(),
                ]);
            } else {
                $user = User::create([
                    'name'           => $googleUser->getName(),
                    'email'          => $googleUser->getEmail(),
                    'login_type'     => 'google',
                    'profile_image' => $googleUser->getAvatar(),
                    'password'       => bcrypt(Str::random(32)),
                ]);
            }

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();

            return redirect()->route('login')
                ->with('error', 'Unable to complete Google login.');
        }

        // Login user
        Auth::login($user, true);

        // ✅ IMPORTANT: Laravel handles booking → login → booking
        return redirect()->intended(route('user.dashboard'));
    }
}
