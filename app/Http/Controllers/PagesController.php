<?php

namespace App\Http\Controllers;

class PagesController extends Controller
{
    /* ======================
       MAIN STATIC PAGES
    ====================== */

    public function about()
    {
        return view('pages.about-us');
    }

    public function services()
    {
        return view('pages.services');
    }

    public function contact()
    {
        return view('pages.contact-us');
    }

    public function domesticClean()
    {
        return view('pages.domestic-clean');
    }

    public function vacancies()
    {
        return view('pages.vacancies');
    }

    /* ======================
       AUTH PAGES (STATIC)
    ====================== */

    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    /* ======================
       POLICY PAGES
    ====================== */

    public function privacyPolicy()
    {
        return view('pages.policies.privacy-policy');
    }

    public function termsConditions()
    {
        return view('pages.policies.terms-conditions');
    }

    public function refundPolicy()
    {
        return view('pages.policies.refund-policy');
    }

    public function cancellationPolicy()
    {
        return view('pages.policies.cancellation-policy');
    }
}
