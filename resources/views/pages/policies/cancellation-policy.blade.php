@extends('layouts.app')

@section('title', 'Cancellation Policy - ANU Hospitality Staff Ltd')

@section('content')

<main class="policy-page">
    <section class="policy-section">
        <div class="policy-container">

            <h1 class="policy-title">Cancellation Policy</h1>

            <p>
                Cancellations must be made at least <strong>24 hours</strong> before the scheduled service.
            </p>

            <h2>1. Free Cancellation</h2>
            <p>
                Available if cancelled more than 24 hours in advance.
            </p>

            <h2>2. Refund Options</h2>
            <ul>
                <li>75% refund</li>
                <li>100% wallet credit</li>
            </ul>

            <h2>3. Non-Cancellable</h2>
            <ul>
                <li>Within 24 hours</li>
                <li>Service already started</li>
            </ul>

            <h2>4. Contact</h2>
            <p>
                Email: <a href="mailto:info@anuhospitality.com">info@anuhospitality.com</a>
            </p>

            <div class="policy-signoff">
                <strong>Last Updated:</strong> 9th November 2025<br>
                <strong>ANU Hospitality Staff Ltd</strong>
            </div>

        </div>
    </section>
</main>

@endsection
