@extends('admin.layouts.admin-app')
@section('title','Contact Queries')

@section('content')
<div class="page-header">
    <h2>Contact Queries</h2>
</div>

<table class="admin-table">
    <thead>
        <tr>
            <th>Company</th>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Subject</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        @forelse($contacts as $c)
        <tr>
            <td>{{ $c->company_name ?? '-' }}</td>
            <td>{{ $c->applicant_name }}</td>

            <td>
                <a href="mailto:{{ $c->email }}" class="contact-link">
                    {{ $c->email }}
                </a>
            </td>

            <td>
                <a href="tel:{{ $c->mobile }}" class="contact-link">
                    {{ $c->mobile }}
                </a>
            </td>

            <td>{{ $c->subject }}</td>

            <td>
                <button class="btn-blue"
                    data-contact='@json($c)'
                    onclick="openContactModal(this)">
                    View
                </button>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6">No contact queries found.</td>
        </tr>
        @endforelse
    </tbody>
</table>

@include('admin.pages.contact-modal')
@endsection
