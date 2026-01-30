@extends('layouts.app')

@section('title', 'Terms & Conditions - ANU Hospitality Staff Ltd')

@section('content')

<main class="policy-page">
    <section class="policy-section">
        <div class="policy-container">

            <h1 class="policy-title">Terms & Conditions</h1>

            <p>
                By using our website or booking services, you agree to these Terms & Conditions.
            </p>

            <h2>1. Company Information</h2>
            <p>
                <strong>ANU Hospitality Staff Ltd</strong> is a UK-registered company.
            </p>

            <h2>2. Website Use</h2>
            <ul>
                <li>Lawful usage only</li>
                <li>No misuse or interference</li>
            </ul>

            <h2>3. Bookings</h2>
            <ul>
                <li>Subject to confirmation</li>
                <li>Accurate details required</li>
            </ul>

            <h2>4. Payments</h2>
            <p>
                Payments are handled securely in line with our
                <a href="{{ url('/privacy-policy') }}">Privacy Policy</a>.
            </p>

            <h2>5. Cancellations & Refunds</h2>
            <p>
                Governed by our
                <a href="{{ url('/cancellation-policy') }}">Cancellation Policy</a> and
                <a href="{{ url('/refund-policy') }}">Refund Policy</a>.
            </p>

            <h2>6. Governing Law</h2>
            <p>
                Governed by the laws of England and Wales.
            </p>

            <div class="policy-signoff">
                <strong>Last Updated:</strong> 9th November 2025<br>
                <strong>ANU Hospitality Staff Ltd</strong>
            </div>

        </div>
    </section>
</main>

@endsection
