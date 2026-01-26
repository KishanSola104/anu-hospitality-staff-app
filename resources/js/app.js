/* -------------------------------------------------------
   Application Main JavaScript
   Handles:
   - Mobile navigation toggle
   - Home hero image slider
   - Scroll reveal animations
------------------------------------------------------- */

/* import './bootstrap'; */

document.addEventListener("DOMContentLoaded", () => {

    /* =====================================================
       MOBILE NAVIGATION MENU
    ===================================================== */

    const toggle = document.querySelector(".menu-toggle");
    const mobileNav = document.querySelector(".mobile-nav");
    const closeBtn = document.querySelector(".close-menu");
    const overlay = document.querySelector(".menu-overlay");

    if (toggle && mobileNav && closeBtn && overlay) {

        const closeMenu = () => {
            mobileNav.classList.remove("active");
            overlay.classList.remove("active");
        };

        toggle.addEventListener("click", () => {
            mobileNav.classList.add("active");
            overlay.classList.add("active");
        });

        closeBtn.addEventListener("click", closeMenu);
        overlay.addEventListener("click", closeMenu);

        mobileNav.querySelectorAll("a").forEach(link => {
            link.addEventListener("click", closeMenu);
        });
    }

    /* =====================================================
       HERO IMAGE SLIDER (HOME PAGE)
    ===================================================== */

    const slides = document.querySelectorAll(".hero-slide");
    let currentSlide = 0;

    if (slides.length > 0) {

        /* Assign background images from data attribute */
        slides.forEach(slide => {
            const bgImage = slide.getAttribute("data-bg");
            if (bgImage) {
                slide.style.backgroundImage = `url('${bgImage}')`;
            }
        });

        const showSlide = (index) => {
            slides.forEach(slide => slide.classList.remove("active"));
            slides[index].classList.add("active");
        };

        /* Auto slide every 4.5 seconds */
        setInterval(() => {
            currentSlide = (currentSlide + 1) % slides.length;
            showSlide(currentSlide);
        }, 4500);
    }

    /* =====================================================
       SCROLL REVEAL ANIMATION (ABOUT / OTHER SECTIONS)
    ===================================================== */

    const revealElements = document.querySelectorAll(".reveal");

    const revealOnScroll = () => {
        revealElements.forEach(element => {
            const elementTop = element.getBoundingClientRect().top;
            const windowHeight = window.innerHeight;

            if (elementTop < windowHeight - 100) {
                element.classList.add("active");
            }
        });
    };

    window.addEventListener("scroll", revealOnScroll);
    revealOnScroll(); // Run once on page load

});
