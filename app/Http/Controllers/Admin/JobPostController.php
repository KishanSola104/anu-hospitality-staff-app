<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobPost;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class JobPostController extends Controller
{
    public function index()
    {
        $vacancies = JobPost::withCount('applications')
            ->latest()
            ->get();

        return view('admin.pages.vacancy-applications', compact('vacancies'));
    }

     public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'location' => 'required',
            'job_type' => 'required',
            'description' => 'required',
        ]);

        JobPost::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'location' => $request->location,
            'job_type' => $request->job_type,
            'description' => $request->description,
            'is_active' => true,
        ]);

        return back()->with('success', 'Vacancy added');
    }

    public function update(Request $request, JobPost $job)
    {
        $job->update($request->only([
            'title', 'location', 'job_type', 'description', 'is_active'
        ]));

        return back()->with('success', 'Vacancy updated');
    }

    public function destroy(JobPost $job)
    {
        $job->applications()->delete();
        $job->delete();

        return back()->with('success', 'Vacancy deleted');
    }

    public function toggle(JobPost $job)
    {
        $job->update(['is_active' => !$job->is_active]);
        return back();
    }
}
