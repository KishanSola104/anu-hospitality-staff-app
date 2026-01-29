<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PagesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

/* ======================
   STATIC PAGES
====================== */

Route::get('/about-us', [PagesController::class, 'about'])->name('about');
Route::get('/services', [PagesController::class, 'services'])->name('services');
Route::get('/contact-us', [PagesController::class, 'contact'])->name('contact');
Route::get('/domestic-clean', [PagesController::class, 'domesticClean'])->name('domestic.clean');
Route::get('/vacancies', [PagesController::class, 'vacancies'])->name('vacancies');

/* ======================
   AUTH PAGES
====================== */

Route::get('/login', [PagesController::class, 'login'])->name('login');
Route::get('/register', [PagesController::class, 'register'])->name('register');

/* ======================
   POLICY PAGES
====================== */

Route::get('/privacy-policy', [PagesController::class, 'privacyPolicy'])->name('privacy.policy');
Route::get('/terms-conditions', [PagesController::class, 'termsConditions'])->name('terms.conditions');
Route::get('/refund-policy', [PagesController::class, 'refundPolicy'])->name('refund.policy');
Route::get('/cancellation-policy', [PagesController::class, 'cancellationPolicy'])->name('cancellation.policy');
