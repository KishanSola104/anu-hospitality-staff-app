@extends('layouts.app')
@section('title', 'Vacancies')

@section('content')

<section class="jobs-section">
    <div class="jobs-container">

        <h1 class="section-title">Current Job Openings</h1>
        <p class="section-subtitle">
            We are always looking for skilled, compassionate and dedicated staff members.
        </p>

        <div class="jobs-grid">
            @forelse($jobs as $job)
                <div class="job-card">

                    <div>
                        <h3>{{ $job->title }}</h3>

                        <p class="job-meta">
                            <strong>Location:</strong> {{ $job->location }}
                        </p>

                        <p class="job-meta">
                            <strong>Job Type:</strong> {{ $job->job_type }}
                        </p>

                        <p class="job-desc">
                            {{ Str::limit($job->description, 100) }}
                        </p>
                    </div>

                    <a href="{{ route('vacancy.apply', $job->id) }}"
                       class="btn btn-primary">
                        Apply Now
                    </a>

                </div>
            @empty
                <p>No current vacancies available.</p>
            @endforelse
        </div>

    </div>
</section>


@endsection
