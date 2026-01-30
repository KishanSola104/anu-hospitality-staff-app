@extends('layouts.app')

@section('title', 'Refund Policy - ANU Hospitality Staff Ltd')

@section('content')

<main class="policy-page">
    <section class="policy-section">
        <div class="policy-container">

            <h1 class="policy-title">Refund Policy</h1>

            <p>
                Refunds are processed fairly and transparently.
            </p>

            <h2>1. Refund Eligibility</h2>
            <p>
                Based on our <a href="{{ url('/cancellation-policy') }}">Cancellation Policy</a>.
            </p>

            <h2>2. Refund Method</h2>
            <ul>
                <li>75% refund</li>
                <li>3–7 working days</li>
            </ul>

            <h2>3. Wallet Credit</h2>
            <p>
                100% credit option available.
            </p>

            <div class="policy-signoff">
                <strong>Last Updated:</strong> 9th November 2025<br>
                <strong>ANU Hospitality Staff Ltd</strong>
            </div>

        </div>
    </section>
</main>

@endsection
