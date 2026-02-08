@extends('admin.layouts.admin-app')
@section('title','Candidate Applications')

@section('content')
<div class="page-header">
    <h2>Candidate Applications</h2>
</div>

<table class="admin-table">
    <thead>
        <tr>
            <th>Candidate</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Job Title</th>
            <th>Status</th>
            <th>Resume</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        @forelse($applications as $app)
        <tr>
            <td>{{ $app->name }}</td>
            <td>
                <a href="mailto:{{ $app->email }}"
                    class="contact-link"
                    title="Send Email">
                    {{ $app->email }}
                </a>
            </td>

            <td>
                <a href="tel:{{ $app->mobile }}"
                    class="contact-link"
                    title="Call Candidate">
                    {{ $app->mobile }}
                </a>
            </td>

            <td>{{ $app->jobPost->title ?? 'N/A' }}</td>

            <td>
                <span class="
                    {{ $app->status == 'new' ? 'badge-blue' : '' }}
                    {{ $app->status == 'shortlisted' ? 'badge-green' : '' }}
                    {{ $app->status == 'rejected' ? 'badge-red' : '' }}
                ">
                    {{ ucfirst($app->status) }}
                </span>
            </td>

            <td>
                @if($app->resume)
                <a href="{{ asset($app->resume) }}" target="_blank"
                    class="btn-blue">
                    View
                </a>
                @else
                —
                @endif
            </td>

            <td>
                <form method="POST"
                    action="{{ route('admin.applications.status', $app) }}">
                    @csrf
                    <select name="status" onchange="this.form.submit()">
                        <option value="new" @selected($app->status=='new')>
                            New
                        </option>
                        <option value="shortlisted" @selected($app->status=='shortlisted')>
                            Shortlisted
                        </option>
                        <option value="rejected" @selected($app->status=='rejected')>
                            Rejected
                        </option>
                    </select>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="7">No applications found.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection