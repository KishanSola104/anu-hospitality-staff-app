<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use App\Mail\ContactUserConfirmation;
use App\Mail\ContactAdminNotification;
use Illuminate\Support\Facades\Mail;

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

        // Save to DB
        ContactMessage::create($validated);

        // Send email to USER
        Mail::to($validated['email'])
            ->send(new ContactUserConfirmation($validated));

        // Send email to ADMIN
        Mail::to(config('mail.from.address')) // or admin email
            ->send(new ContactAdminNotification($validated));

        return back()->with('success', 'Thank you! We will contact you shortly.');
    }
}
