<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

/* ======================
   HOME
====================== */
Route::get('/', [HomeController::class, 'index'])->name('home');

/* ======================
   STATIC PAGES
====================== */
Route::get('/about-us', [PagesController::class, 'about'])->name('about');
Route::get('/services', [PagesController::class, 'services'])->name('services');
Route::get('/vacancies', [PagesController::class, 'vacancies'])->name('vacancies');
Route::get('/domestic-clean', [PagesController::class, 'domesticClean'])->name('domestic.clean');

/* ======================
   CONTACT PAGE
====================== */
Route::get('/contact-us', [ContactController::class, 'show'])->name('contact');
Route::post('/contact-us', [ContactController::class, 'store'])->name('contact.store');

/* ======================
   POLICY PAGES
====================== */
Route::get('/privacy-policy', [PagesController::class, 'privacyPolicy'])->name('privacy.policy');
Route::get('/terms-conditions', [PagesController::class, 'termsConditions'])->name('terms.conditions');
Route::get('/refund-policy', [PagesController::class, 'refundPolicy'])->name('refund.policy');
Route::get('/cancellation-policy', [PagesController::class, 'cancellationPolicy'])->name('cancellation.policy');

/* ======================
   AUTHENTICATION
====================== */

/* Login */
Route::get('/login', [LoginController::class, 'show'])
    ->name('login')
    ->middleware('guest');

Route::post('/login', [LoginController::class, 'authenticate'])
    ->middleware('guest');

/* Register */
Route::get('/register', [RegisterController::class, 'show'])
    ->name('register')
    ->middleware('guest');

Route::post('/register', [RegisterController::class, 'store'])
    ->middleware('guest');

/* Google Auth */
Route::get('/auth/google', [GoogleAuthController::class, 'redirect'])
    ->name('google.login');

Route::get('/auth/google/callback', [GoogleAuthController::class, 'callback']);

/* Logout */
Route::post('/logout', [LoginController::class, 'logout'])
    ->name('logout');

/* ======================
   USER DASHBOARD
====================== */
Route::get('/dashboard', function () {
    return view('user.dashboard');
})->name('user.dashboard')->middleware('auth');
