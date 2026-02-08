<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BookingController;

/* ======================
   ADMIN CONTROLLERS
====================== */
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\JobPostController;
use App\Http\Controllers\Admin\VacancyApplicationController;

/*
|--------------------------------------------------------------------------
| WEB ROUTES
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
Route::get('/domestic-clean', [PagesController::class, 'domesticClean'])->name('domestic.clean');

/* Candudate Vacancies URL */
Route::get('/vacancies', [PagesController::class, 'vacancies'])
    ->name('vacancies');

Route::get('/apply/{job}', [PagesController::class, 'apply'])
    ->name('vacancy.apply');

Route::get('/apply', [PagesController::class, 'applyGeneral'])
    ->name('vacancy.apply.general');

Route::post('/apply', [PagesController::class, 'submitApplication'])
    ->name('vacancy.apply.submit');

    

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
   USER AUTHENTICATION
====================== */
Route::get('/login', [LoginController::class, 'show'])
    ->name('login')
    ->middleware('guest');

Route::post('/login', [LoginController::class, 'authenticate'])
    ->middleware('guest');

Route::get('/register', [RegisterController::class, 'show'])
    ->name('register')
    ->middleware('guest');

Route::post('/register', [RegisterController::class, 'store'])
    ->middleware('guest');

/* Google Login */
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

/* ======================
   BOOKING (AUTH REQUIRED)
====================== */
Route::middleware('auth')->group(function () {

    Route::get('/booking/domestic', [BookingController::class, 'domestic'])
        ->name('booking.domestic');

    Route::post('/booking/pay', [BookingController::class, 'pay'])
        ->name('booking.pay');

    Route::get('/booking/success/{booking}', [BookingController::class, 'success'])
        ->name('booking.success');

    Route::get('/booking/cancel/{booking}', [BookingController::class, 'cancel'])
        ->name('booking.cancel');
});

/* ======================
   ADMIN ROUTES
====================== */
Route::prefix('admin')->name('admin.')->group(function () {

    /* ---------- ADMIN AUTH ---------- */
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    /* ---------- PROTECTED ADMIN ---------- */
    Route::middleware(['admin.auth', 'prevent.back'])->group(function () {

        /* Dashboard */
        Route::get('/dashboard', [AdminDashboardController::class, 'dashboard'])
            ->name('dashboard');

        /* Bookings */
        Route::get('/bookings', [AdminDashboardController::class, 'bookings'])
            ->name('bookings');

        Route::post('/bookings/{booking}/complete',
            [AdminDashboardController::class, 'markCompleted']
        )->name('bookings.complete');

        Route::post('/bookings/{booking}/refund',
            [AdminDashboardController::class, 'markRefunded']
        )->name('bookings.refund');

        Route::get('/bookings/{booking}/download',
            [AdminDashboardController::class, 'downloadBookingPdf']
        )->name('bookings.download');

        /* Contacts */
        Route::get('/contacts', [AdminDashboardController::class, 'contacts'])
            ->name('contacts');

        /* ======================
           VACANCY MANAGEMENT
        ====================== */
        Route::get('/vacancies', [JobPostController::class, 'index'])
            ->name('vacancies');

        Route::post('/vacancies', [JobPostController::class, 'store'])
            ->name('vacancies.store');

        Route::put('/vacancies/{job}', [JobPostController::class, 'update'])
            ->name('vacancies.update');

        Route::delete('/vacancies/{job}', [JobPostController::class, 'destroy'])
            ->name('vacancies.delete');

        Route::post('/vacancies/{job}/toggle', [JobPostController::class, 'toggle'])
            ->name('vacancies.toggle');

        /* Job-wise Applications */
        Route::get('/vacancies/{job}/applications',
            [VacancyApplicationController::class, 'index']
        )->name('vacancies.applications');

        /* ======================
           CANDIDATE APPLICATIONS
        ====================== */
        Route::get('/candidate-applications',
            [VacancyApplicationController::class, 'all']
        )->name('candidate.applications');

        Route::post('/applications/{application}/status',
            [VacancyApplicationController::class, 'updateStatus']
        )->name('applications.status');
    });
});
