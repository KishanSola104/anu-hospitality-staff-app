@extends('layouts.app')

@section('title', 'Domestic Cleaning Services | ANU Hospitality Staff Ltd')

@section('content')

<!-- =========================
     DOMESTIC PAGE BANNER
========================= -->
<section class="about-page-banner">

    <div class="about-page-banner-image">
        <img
            src="{{ asset('assets/images/backgrounds/domestic.webp') }}"
            alt="Domestic Cleaning Services - ANU Hospitality Staff Ltd"
        >
    </div>

    <div class="about-page-banner-overlay">
        <div class="about-page-banner-text">
            <h1>Domestic Cleaning Services</h1>
            <p>Reliable home cleaning for regular & one-off bookings</p>

            <!-- Postcode Box -->
            <div class="hero-search-box">
                <input
                    type="text"
                    id="postcodeInput"
                    placeholder="Enter your postcode (e.g. E12 3AB)"
                    autocomplete="postal-code"
                >
                <button type="button" id="findCleanerBtn">
                    Find a home cleaner
                </button>
            </div>
        </div>
    </div>

</section>

<!-- =========================
     FAQ SECTION
========================= -->
<section class="faq-section container">
    <h2 class="faq-title">Frequently Asked Questions</h2>

    <div class="faq-list">

        <div class="faq-item">
            <button class="faq-question">What does a standard domestic clean include?</button>
            <div class="faq-answer">
                Dusting, vacuuming, mopping, kitchen and bathroom cleaning,
                bins emptied and general tidying. Extras can be added.
            </div>
        </div>

        <div class="faq-item">
            <button class="faq-question">Can I have the same cleaner every time?</button>
            <div class="faq-answer">
                Yes. For regular bookings we assign the same cleaner whenever possible.
            </div>
        </div>

        <div class="faq-item">
            <button class="faq-question">Do I need to be home?</button>
            <div class="faq-answer">
                No. You can provide spare keys or access instructions.
            </div>
        </div>

        <div class="faq-item">
            <button class="faq-question">Are cleaners vetted and insured?</button>
            <div class="faq-answer">
                Yes. All cleaners are background-checked, trained and insured.
            </div>
        </div>

        <div class="faq-item">
            <button class="faq-question">How do payments work?</button>
            <div class="faq-answer">
                Secure online payments. No cash, no hidden charges.
            </div>
        </div>

    </div>
</section>

@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/domestic-clean.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('js/domestic-clean.js') }}"></script>
@endpush
