<?php

namespace App\Http\Controllers;

use App\Models\JobPost;
use App\Models\VacancyApplication;
use Illuminate\Http\Request;
use App\Mail\JobApplicationUserConfirmation;
use App\Mail\JobApplicationAdminNotification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;



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


    /* Candidate appliaction pages */
    public function vacancies()
    {
        $jobs = JobPost::where('is_active', true)->latest()->get();
        return view('pages.vacancies', compact('jobs'));
    }

    public function apply(JobPost $job)
    {
        return view('pages.apply', compact('job'));
    }

    public function applyGeneral()
    {
        return view('pages.apply');
    }

    public function submitApplication(Request $request)
    {
        $validated = $request->validate([
            'name'   => ['required', 'string', 'max:255'],
            'email'  => ['required', 'email'],
            'mobile' => ['required', 'string', 'max:20'],
            'resume' => ['required', 'file', 'mimes:pdf,doc,docx', 'max:2048'],
            'message' => ['nullable', 'string'],
        ]);

        DB::beginTransaction();

        try {

            // Upload resume to public/uploads/resumes
            $resume = $request->file('resume');
            $filename = time() . '_' . $resume->getClientOriginalName();
            $resume->move(public_path('uploads/resumes'), $filename);

            $application = VacancyApplication::create([
                'job_post_id' => $request->job_post_id ?? null,
                'name'        => $validated['name'],
                'email'       => $validated['email'],
                'mobile'      => $validated['mobile'],
                'resume'      => 'uploads/resumes/' . $filename,
                'message'     => $validated['message'] ?? null,
                'status'      => 'new',
            ]);

            $mailData = [
                'name'      => $application->name,
                'email'     => $application->email,
                'mobile'    => $application->mobile,
                'job_title' => optional($application->jobPost)->title,
            ];

            // Send email to USER
            Mail::to($application->email)
                ->send(new JobApplicationUserConfirmation($mailData));

            // Send email to ADMIN
            Mail::to(config('mail.from.address'))
                ->send(new JobApplicationAdminNotification($mailData));

            DB::commit();

            return back()->with('success', 'Your application has been submitted successfully.');
        } catch (\Exception $e) {

            DB::rollBack();

            return back()
                ->withInput()
                ->with('error', 'Something went wrong. Please try again.');
        }
    }
}
