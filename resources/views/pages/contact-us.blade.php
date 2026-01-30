@extends('layouts.app')

@section('title', 'Contact Us - ANU Hospitality Staff Ltd')

@section('content')

<!-- =========================
     CONTACT PAGE BANNER
========================= -->
<section class="about-page-banner">

    <div class="about-page-banner-image">
        <img 
            src="{{ asset('assets/images/contact-us.webp') }}" 
            alt="Contact Us - ANU Hospitality Staff Ltd"
        >
    </div>

    <!-- NO TEXT OVERLAY AS DISCUSSED -->
    <div class="about-page-banner-overlay"></div>

</section>

<!-- =========================
     CONTACT INFO BOXES
========================= -->
<section class="contact-info-section container">

    <div class="contact-info-grid">

        <!-- Call -->
        <a href="tel:+447700900123" class="contact-info-card reveal">
            <i class="fa-solid fa-phone"></i>
            <h3>Call</h3>
            <p>+44 7700 900123</p>
        </a>

        <!-- Email -->
        <a href="mailto:info@anuhospitalitystaff.com" class="contact-info-card reveal">
            <i class="fa-solid fa-envelope"></i>
            <h3>Email</h3>
            <p>info@anuhospitalitystaff.com</p>
        </a>

        <!-- Chat (WhatsApp) -->
        <a 
            href="https://wa.me/447700900123" 
            target="_blank"
            class="contact-info-card reveal"
        >
            <i class="fa-brands fa-whatsapp"></i>
            <h3>Chat</h3>
            <p>WhatsApp Support</p>
        </a>

    </div>

</section>

<!-- =========================
     CONTACT FORM
========================= -->
<section class="contact-form-section" id="contact-form">

    <div class="contact-form-container reveal">

        <p class="form-tagline">
            Fill Out The Form And We Will Be In Touch Soon!
        </p>

        <h2>How We Can Help You?</h2>

        <form method="POST" action="#">
            @csrf

            <input 
                type="text" 
                name="company_name" 
                placeholder="Company Name"
            >

            <input 
                type="text" 
                name="applicant_name" 
                placeholder="Applicant Name"
            >

            <input 
                type="email" 
                name="email" 
                placeholder="Email"
            >

              <input 
                type="tel" 
                name="mobile" 
                placeholder="Mobile Number"
            >

            <input 
                type="text" 
                name="subject" 
                placeholder="Subject"
            >

            <textarea 
                name="message" 
                rows="6" 
                placeholder="Message"
            ></textarea>

            <button type="submit">Submit</button>

        </form>

    </div>

</section>

@endsection
