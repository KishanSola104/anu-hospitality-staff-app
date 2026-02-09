<footer class="footer">

    <!-- ===== MAIN FOOTER CONTENT ===== -->
    <section class="footer-main">
        <div class="footer-grid">

            <!-- Brand & Address -->
            <div class="footer-col">
                <img
                    src="{{ asset('assets/logos/logo.webp') }}"
                    class="footer-logo"
                    alt="ANU Hospitality Staff Ltd">

                <p>
                    35 Peel Road
                    North Wembley
                    Wembley
                    Greater London
                    HA9 7LY
                    United Kingdom<br>

                    <a class="hover-underline" href="mailto:info@anuhospitality.com">
                        info@anuhospitality.com
                    </a><br>

                    <a class="hover-underline" href="tel:+447459292378">
                        +44 7459 292378
                    </a>
                </p>
            </div>

            <!-- Quick Links -->
            <div class="footer-col">
                <h4>Quick Links</h4>
                <ul>
                    <li><a class="hover-underline" href="{{ route('home') }}">Home</a></li>
                    <li><a class="hover-underline" href="{{ route('about') }}">About Us</a></li>
                    <li><a class="hover-underline" href="{{ route('vacancies') }}">Vacancies</a></li>
                    <li><a class="hover-underline" href="{{ route('services') }}">Services</a></li>
                    <li><a class="hover-underline" href="{{ route('domestic.clean') }}">Domestic Cleaning</a></li>
                    <li><a class="hover-underline" href="{{ route('contact') }}">Contact</a></li>
                </ul>
            </div>

            <!-- Policy Links -->
            <div class="footer-col">
                <h4>Policies</h4>
                <ul>
                    <li><a class="hover-underline" href="{{ route('privacy.policy') }}">Privacy Policy</a></li>
                    <li><a class="hover-underline" href="{{ route('terms.conditions') }}">Terms & Conditions</a></li>
                    <li><a class="hover-underline" href="{{ route('cancellation.policy') }}">Cancellation Policy</a></li>
                    <li><a class="hover-underline" href="{{ route('refund.policy') }}">Refund Policy</a></li>
                </ul>
            </div>

            <!-- Social Media Links -->
            <div class="footer-col">
                <h4>Follow Us</h4>

                <div class="social-links">
                    <a href="https://www.facebook.com/" target="_blank" aria-label="Facebook">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>

                    <a href="https://www.linkedin.com/in/anushika-bajpai-0974813ab/" target="_blank" aria-label="LinkedIn">
                        <i class="fa-brands fa-linkedin-in"></i>
                    </a>

                    <a href="https://www.instagram.com/" target="_blank" aria-label="Instagram">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                </div>
            </div>

        </div>
    </section>

    <!-- ===== COPYRIGHT ===== -->
    <div class="footer-bottom">
        <p>
            © {{ now()->year }} ANU Hospitality Staff Ltd. All Rights Reserved.
        </p>

        <p>
            Designed & Developed by
            <a
                href="https://www.linkedin.com/company/shreeji-it-solution-pvt-ltd"
                target="_blank"
                class="hover-underline">
                Shreeji IT Solutions Pvt. Ltd.
            </a>
        </p>
    </div>

</footer>