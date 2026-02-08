<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobPost;
use App\Models\VacancyApplication;
use Illuminate\Http\Request;

class VacancyApplicationController extends Controller
{

    public function all()
    {
        $applications = VacancyApplication::with('jobPost')
            ->latest()
            ->get();

        return view(
            'admin.pages.candidate-applications',
            compact('applications')
        );
    }


    public function index(JobPost $job)
    {
        $applications = VacancyApplication::where('job_post_id', $job->id)
            ->latest()
            ->get();

        return view('admin.pages.candidate-applications', compact('job', 'applications'));
    }

    public function updateStatus(Request $request, VacancyApplication $application)
    {
        $request->validate([
            'status' => 'required|in:new,shortlisted,rejected',
        ]);

        $application->update([
            'status' => $request->status,
        ]);

        return back()->with('success', 'Application status updated successfully.');
    }
}
