@extends('admin.layouts.admin-app')

@section('title', 'Bookings')

@section('content')
<div class="dashboard-container">

    <h2 class="section-title">Bookings Management</h2>

    {{-- STATUS TABS --}}
    <div class="tabs">
        @foreach (['upcoming','completed','cancelled'] as $tab)
        <a href="{{ route('admin.bookings', ['status' => $tab]) }}"
            class="tab-link {{ ($status ?? 'upcoming') === $tab ? 'active' : '' }}">
            {{ ucfirst($tab) }}
        </a>
        @endforeach
    </div>

    {{-- SEARCH --}}
    <form class="search-row" method="get">
        <input type="hidden" name="status" value="{{ $status ?? 'upcoming' }}">
        <input type="text"
            name="search"
            value="{{ $search ?? '' }}"
            placeholder="Search by name, mobile or postcode">
        <button type="submit" class="btn view">Search</button>
    </form>

    {{-- TABLE --}}
    <div class="table-wrapper">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Customer</th>
                    <th>Mobile</th>
                    <th>Service</th>
                    <th>Date</th>
                    <th>Total (£)</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($bookings as $booking)
                <tr>
                    <td>{{ $booking->id }}</td>

                    <td>
                        <strong>{{ $booking->full_name }}</strong><br>
                        <small>{{ $booking->address_postcode }}</small>
                    </td>

                    <td>{{ $booking->mobile }}</td>

                    <td>{{ $booking->bedrooms }} Bed / {{ $booking->bathrooms }} Bath</td>

                    <td>{{ optional($booking->preferred_date)->format('d M Y') }}</td>

                    <td>£{{ number_format($booking->total_price, 2) }}</td>

                    {{-- STATUS --}}
                    <td>
                        <span class="status-badge {{ $booking->payment_status }}">
                            {{ ucfirst($booking->payment_status) }}
                        </span>

                        @if($booking->payment_status === 'pending')
                        <small class="payment-note">Unpaid</small>
                        @endif
                    </td>

                    {{-- ACTIONS --}}
                    <td class="actions">

                        {{-- VIEW --}}
                        <button
                            class="btn view"
                            data-view
                            data-booking='@json($booking)'>
                            View
                        </button>



                        {{-- DONE (ONLY IF PAID & DATE PASSED) --}}
                        @if(
                        $booking->payment_status === 'paid' &&
                        $booking->preferred_date < now()
                            )
                            <form method="POST"
                            action="{{ route('admin.bookings.complete', $booking) }}"
                            onsubmit="return confirm('Mark this booking as completed?')">
                            @csrf
                            <button class="btn complete">Done</button>
                            </form>
                            @else
                            <span class="btn disabled" disabled>Done</span>
                            @endif

                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="no-data">No bookings found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="pagination-wrapper">
        {{ $bookings->links() }}
    </div>

</div>



{{-- BOOKING DETAILS POPUP --}}
<div id="bookingModal" class="modal-overlay">

    <div class="modal-card">

        {{-- HEADER --}}
        <div class="modal-header">
            <h3>Booking Details</h3>
            <button class="modal-close" id="closeBookingModal">&times;</button>
        </div>

        {{-- BODY --}}
        <div class="modal-body" id="bookingModalBody">
            {{-- JS injects content --}}
        </div>

        {{-- FOOTER --}}
        <div class="modal-footer">
            <a href="#" id="downloadPdfBtn" class="btn complete" target="_blank">
                Download PDF
            </a>
            <button id="closeBookingModalFooter" class="btn view">
                Close
            </button>
        </div>

    </div>
</div>

@endsection