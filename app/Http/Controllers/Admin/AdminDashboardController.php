<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminDashboardController extends Controller
{
    public function dashboard()
    {
        return view('admin.pages.dashboard');
    }

    public function bookings()
    {
        return view('admin.pages.bookings');
    }

    public function vacancies()
    {
        return view('admin.pages.vacancy-applications');
    }

    public function contacts()
    {
        return view('admin.pages.contact-queries');
    }
}
