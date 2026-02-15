<header>

    <!-- Top Contact Bar -->
    <div class="sub-header">
        <div class="sub-header-container">

            <!-- Left: Contact Info -->
            <div class="contact-info">
                <a href="mailto:info@anuhospitality.com">
                    <i class="fa-solid fa-envelope"></i> info@anuhospitality.com
                </a>
                <a href="tel:+447459292378">
                    <i class="fa-solid fa-phone"></i> +44 7459 292378
                </a>
            </div>

            <!-- Right: Social Links -->
            <div class="social-links">
                <a href="https://www.facebook.com/" target="_blank" aria-label="Facebook">
                    <i class="fa-brands fa-facebook-f"></i>
                </a>
                <a href="https://www.linkedin.com/" target="_blank" aria-label="LinkedIn">
                    <i class="fa-brands fa-linkedin-in"></i>
                </a>
                <a href="https://www.instagram.com/" target="_blank" aria-label="Instagram">
                    <i class="fa-brands fa-instagram"></i>
                </a>
            </div>

        </div>
    </div>

    <!-- Desktop Header -->
    <div class="main-header">
        <div class="header-container">

            <!-- Logo -->
            <a href="{{ route('home') }}" class="logo">
                <img src="{{ asset('assets/logos/logo.webp') }}"
                     class="site-logo"
                     alt="ANU Hospitality Staff">
            </a>

            <!-- Navigation -->
            <nav class="main-nav">
                <ul>
                    <li><a href="{{ route('home') }}" class="hover-underline">Home</a></li>
                    <li><a href="{{ route('about') }}" class="hover-underline">About</a></li>
                    <li><a href="{{ route('services') }}" class="hover-underline">Services</a></li>
                    <li><a href="{{ route('vacancies') }}" class="hover-underline">Vacancies</a></li>
                    <li><a href="{{ route('domestic.clean') }}" class="hover-underline">Domestic Cleaning</a></li>
                    <li><a href="{{ route('contact') }}" class="hover-underline">Contact</a></li>
                </ul>
            </nav>

            <!-- Auth Button -->
            <div class="nav-buttons">
                @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-danger">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-secondary">
                        Login
                    </a>
                @endauth
            </div>

        </div>
    </div>

    <!-- Mobile Header -->
    <div class="mobile-header">
        <div class="header-container">

            <a href="{{ route('home') }}" class="mobile-logo">
                <img src="{{ asset('assets/logos/logo.webp') }}"
                     class="site-logo"
                     alt="ANU Hospitality Staff">
            </a>

            <div class="menu-toggle">
                <i class="fa-solid fa-bars"></i>
            </div>
        </div>

        <nav class="mobile-nav">
            <div class="mobile-nav-top">
                <span class="logo-text">ANU HOSPITALITY STAFF</span>
                <span class="close-menu">
                    <i class="fa-solid fa-xmark"></i>
                </span>
            </div>

            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('about') }}">About</a></li>
                <li><a href="{{ route('services') }}">Services</a></li>
                <li><a href="{{ route('vacancies') }}">Vacancies</a></li>
                <li><a href="{{ route('domestic.clean') }}">Domestic Cleaning</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>
            </ul>

            <!-- Mobile Auth Button -->
            <div class="nav-buttons-mobile">
                @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-danger" style="width:100%;">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-secondary" style="width:100%; display:block; text-align:center;">
                        Login
                    </a>
                @endauth
            </div>
        </nav>

        <div class="menu-overlay"></div>
    </div>

</header>
