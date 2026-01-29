@extends('layouts.app')

@section('title', 'About Us - ANU Hospitality Staff Ltd')

@section('content')

<!-- =========================
     ABOUT US PAGE BANNER
========================= -->
<section class="about-page-banner">

    <div class="about-page-banner-image">
        <img 
            src="{{ asset('assets/images/about-us.webp') }}" 
            alt="About ANU Hospitality Staff Ltd"
        >
    </div>

     <div class="about-page-banner-overlay">
        <div class="about-page-banner-text">
            <h1>About Us</h1>
            <p>Professional Hospitality Staffing & Cleaning Services</p>
        </div>
    </div>  

</section>




<!-- =========================
     ABOUT INTRO
========================= -->
<section class="about-section container">
    <div class="about-grid">

        <!-- Left Image -->
        <div class="about-image">
            <img src="{{ asset('assets/images/about.webp') }}"
                 alt="ANU Hospitality Staff Team">
        </div>

        <!-- Right Content -->
        <div class="about-content">
            <h2>About ANU Hospitality Staff Ltd</h2>

            <p>
                ANU Hospitality Staff Ltd is a trusted hospitality staffing and cleaning
                services provider, delivering reliable, professional, and fully trained
                staff across hotels, serviced apartments, commercial properties, and
                domestic environments.
            </p>

            <p>
                We support our clients with a wide range of services including hotel
                housekeeping, room attendants, public area cleaners, kitchen porters,
                front-of-house support, and domestic cleaning solutions.
            </p>

            <p>
                Our focus is simple — to help our clients operate smoothly while
                maintaining the highest standards of cleanliness, service quality,
                and professionalism.
            </p>
        </div>

    </div>
</section>

<!-- =========================
     VISION & MISSION
========================= -->
<section class="vision-mission-section">
    <div class="container">
        <div class="vision-mission-grid">

            <div class="vision-box reveal">
                <div class="icon">
                    <i class="fa-solid fa-eye"></i>
                </div>
                <h3>Our Vision</h3>
                <p>
                    To become a leading and most trusted hospitality staffing and
                    cleaning services provider across the UK, recognised for quality,
                    reliability, and client satisfaction.
                </p>
            </div>

            <div class="mission-box reveal">
                <div class="icon">
                    <i class="fa-solid fa-rocket"></i>
                </div>
                <h3>Our Mission</h3>
                <p>
                    To deliver professional, flexible, and cost-effective staffing
                    solutions that meet our clients’ exact requirements while creating
                    long-term partnerships built on trust and performance.
                </p>
            </div>

        </div>
    </div>
</section>

<!-- =========================
     CORE VALUES
========================= -->
<section class="values-section container">
    <h2 class="section-title">Our Core Values</h2>

    <div class="values-grid">

        <div class="value-card reveal">
            <i class="fa-solid fa-chart-line"></i>
            <h4>Development</h4>
            <p>
                We invest in continuous training and development of our staff to ensure
                consistent service quality and growth.
            </p>
        </div>

        <div class="value-card highlighted reveal">
            <i class="fa-solid fa-award"></i>
            <h4>Excellence</h4>
            <p>
                We strive for excellence in every service we provide, maintaining
                high operational and professional standards.
            </p>
        </div>

        <div class="value-card reveal">
            <i class="fa-solid fa-lightbulb"></i>
            <h4>Innovation</h4>
            <p>
                We adopt smart and efficient working methods to deliver reliable and
                modern staffing solutions.
            </p>
        </div>

        <div class="value-card reveal">
            <i class="fa-solid fa-comments"></i>
            <h4>Communication</h4>
            <p>
                Clear and honest communication is the foundation of our long-term
                relationships with clients and staff.
            </p>
        </div>

        <div class="value-card highlighted reveal">
            <i class="fa-solid fa-bullseye"></i>
            <h4>Ambition</h4>
            <p>
                We are ambitious for our clients, our people, and our organisation,
                always aiming higher.
            </p>
        </div>

        <div class="value-card reveal">
            <i class="fa-solid fa-shield-heart"></i>
            <h4>Responsibility</h4>
            <p>
                We take full responsibility for our services, our workforce, and
                maintaining compliance and trust.
            </p>
        </div>

    </div>
</section>

@endsection
