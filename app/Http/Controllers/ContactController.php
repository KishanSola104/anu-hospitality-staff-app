<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Show contact page
     */
    public function show()
    {
        return view('pages.contact-us');
    }

    /**
     * Store contact form
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'company_name'   => ['nullable', 'string', 'max:255'],
            'applicant_name' => ['nullable', 'string', 'max:255'],
            'email'          => ['required', 'email'],
            'mobile'         => ['nullable', 'string', 'max:20'],
            'subject'        => ['nullable', 'string', 'max:255'],
            'message'        => ['required', 'string', 'min:10'],
        ]);

        ContactMessage::create($validated);

        return back()->with('success', 'Thank you! We will contact you shortly.');
    }
}
