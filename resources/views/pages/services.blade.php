@extends('layouts.app')

@section('title', 'Our Services - ANU Hospitality Staff Ltd')

@section('content')

<!-- =========================
     SERVICES PAGE BANNER
========================= -->
<section class="about-page-banner">

    <div class="about-page-banner-image">
        <img 
            src="{{ asset('assets/images/services.webp') }}" 
            alt="Our Services - ANU Hospitality Staff Ltd"
        >
    </div>

    <div class="about-page-banner-overlay">
        <div class="about-page-banner-text">
            <h1>Our Services</h1>
            <p>Hospitality Staffing, Domestic & Office Cleaning Solutions</p>
        </div>
    </div>

</section>

<!-- =========================
     SERVICES INTRO
========================= -->
<section class="services-intro container">
    <h2 class="section-tag">Our Services</h2>
    <h2 class="reveal">What Services We Offer</h2>
</section>

<!-- =========================
     SERVICES GRID
========================= -->
<section class="services-section container">

    <div class="services-grid">

        <!-- Housekeeping -->
        <div class="service-card dark reveal">
            <i class="fa-solid fa-broom"></i>
            <h3>Housekeeping</h3>
            <p>
                Professional housekeeping staff to maintain hotel rooms and public
                areas to the highest cleanliness and presentation standards.
            </p>
        </div>

        <!-- Front Desk -->
        <div class="service-card light reveal">
            <i class="fa-solid fa-user"></i>
            <h3>Front Desk</h3>
            <p>
                Trained front desk staff to handle reservations, check-in, check-out,
                guest assistance, enquiries, and administrative tasks efficiently.
            </p>
        </div>

        <!-- Food & Beverage -->
        <div class="service-card dark reveal">
            <i class="fa-solid fa-pizza-slice"></i>
            <h3>Food & Beverages</h3>
            <p>
                Skilled food and beverage staff including waiters, servers, kitchen
                porters, and banquet staff to support hotel operations.
            </p>
        </div>

        <!-- Security -->
        <div class="service-card light reveal">
            <i class="fa-solid fa-shield-halved"></i>
            <h3>Security</h3>
            <p>
                Reliable security personnel to manage access control, monitor premises,
                and ensure a safe environment for guests and staff.
            </p>
        </div>

        <!-- Domestic & Office Cleaning (MERGED) -->
        <div class="service-card dark reveal">
            <i class="fa-solid fa-house-circle-check"></i>
            <h3>Domestic & Office Cleaning</h3>
            <p>
                Professional cleaning services for homes, offices, and commercial
                spaces, delivered by trained and reliable cleaning professionals.
            </p>
        </div>

        <!-- Concierge -->
        <div class="service-card light reveal">
            <i class="fa-solid fa-bell-concierge"></i>
            <h3>Concierge</h3>
            <p>
                Experienced concierge staff providing guest assistance, local
                information, reservations, and personalised hospitality services.
            </p>
        </div>

    </div>

</section>


@endsection
