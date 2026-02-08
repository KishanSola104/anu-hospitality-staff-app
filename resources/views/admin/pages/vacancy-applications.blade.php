@extends('admin.layouts.admin-app')
@section('title','Manage Vacancies')

@section('content')
<div class="page-header">
    <h2>Manage Vacancies</h2>
    <button class="btn-primary" onclick="openAddModal()">+ Add Vacancy</button>
</div>

<table class="admin-table">
    <thead>
        <tr>
            <th>Job Title</th>
            <th>Location</th>
            <th>Job Type</th>
            <th>Status</th>
            <th>Posted</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        @foreach($vacancies as $job)
        <tr>
            <td>{{ $job->title }}</td>
            <td>{{ $job->location }}</td>
            <td>{{ $job->job_type }}</td>
            <td>
                <span class="{{ $job->is_active ? 'text-green' : 'text-red' }}">
                    {{ $job->is_active ? 'Open' : 'Closed' }}
                </span>
            </td>
            <td>{{ $job->created_at->format('d M Y') }}</td>
            <td>
                <form method="POST" action="{{ route('admin.vacancies.toggle',$job) }}" style="display:inline">
                    @csrf
                    <button class="btn-blue">Toggle</button>
                </form>

                <button class="btn-yellow"
                    data-job='@json($job)'
                    onclick="openEditModal(this)">
                    Edit
                </button>


                <form method="POST" action="{{ route('admin.vacancies.delete',$job) }}" style="display:inline">
                    @csrf @method('DELETE')
                    <button class="btn-red" onclick="return confirm('Delete vacancy?')">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@include('admin.pages.vacancy-modals')
@endsection