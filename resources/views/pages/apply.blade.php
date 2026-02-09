@extends('layouts.app')
@section('title','Apply for Job')

@section('content')

<!-- SUBMIT LOADER OVERLAY -->
<div id="form-loader-overlay">
    <div class="loader-box">
        <div class="spinner"></div>
        <p>Sending your message…</p>
    </div>
</div>

<section class="apply-section reveal">

    <h1>Job Application</h1>

    <form method="POST"
          action="{{ route('vacancy.apply.submit') }}"
          enctype="multipart/form-data"
          class="apply-form">

        @csrf

        {{-- Success / Error Messages --}}
        @if(session('success'))
            <div class="contact-success-msg">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="contact-error-msg">
                {{ session('error') }}
            </div>
        @endif

        {{-- Job Title --}}
        <div class="form-group">
            <label>Job Title</label>

            @if(isset($job))
                <input type="text"
                       value="{{ $job->title }}"
                       readonly>

                <input type="hidden"
                       name="job_post_id"
                       value="{{ $job->id }}">
            @else
                <input type="text"
                       name="job_title"
                       placeholder="Enter job title"
                       required>
            @endif
        </div>

        {{-- Name --}}
        <div class="form-group">
            <label>Your Name</label>
            <input type="text"
                   name="name"
                   required>
        </div>

        {{-- Email --}}
        <div class="form-group">
            <label>Email</label>
            <input type="email"
                   name="email"
                   required>
        </div>

        {{-- Mobile --}}
        <div class="form-group">
            <label>Mobile</label>
            <input type="text"
                   name="mobile"
                   required>
        </div>

        {{-- Resume --}}
        <div class="form-group">
            <label>Upload Resume (PDF / DOC / DOCX)</label>
            <input type="file"
                   name="resume"
                   accept=".pdf,.doc,.docx"
                   required>
        </div>

        {{-- Message --}}
        <div class="form-group">
            <label>Message (Optional)</label>
            <textarea name="message"
                      placeholder="Anything you would like us to know…"></textarea>
        </div>

        <button type="submit"
                class="btn btn-primary">
            Submit
        </button>

    </form>

</section>

@endsection
