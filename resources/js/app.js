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
        slides.forEach(slide => {
            const bgImage = slide.getAttribute("data-bg");
            if (bgImage) slide.style.backgroundImage = `url('${bgImage}')`;
        });

        setInterval(() => {
            slides[currentSlide].classList.remove("active");
            currentSlide = (currentSlide + 1) % slides.length;
            slides[currentSlide].classList.add("active");
        }, 4500);
    }

    /* =====================================================
       SCROLL REVEAL ANIMATION
    ===================================================== */
    const revealElements = document.querySelectorAll(".reveal");

    if (revealElements.length) {
        const revealOnScroll = () => {
            revealElements.forEach(el => {
                if (el.getBoundingClientRect().top < window.innerHeight - 100) {
                    el.classList.add("active");
                }
            });
        };

        window.addEventListener("scroll", revealOnScroll);
        revealOnScroll();
    }

    /* =====================================================
       SERVICES SECTION (VIEW MORE)
    ===================================================== */
    const serviceCards = document.querySelectorAll(".service-card");
    const servicesBtn = document.querySelector(".services-view-more");

    if (serviceCards.length && servicesBtn) {
        let expanded = false;

        const getVisibleCount = () => {
            const w = window.innerWidth;
            if (w >= 992) return 6;
            if (w >= 576) return 4;
            return 3;
        };

        const updateVisibility = () => {
            const visible = expanded ? serviceCards.length : getVisibleCount();
            serviceCards.forEach((card, i) => {
                card.classList.toggle("is-hidden", i >= visible);
            });
            servicesBtn.textContent = expanded ? "View Less" : "View More";
        };

        updateVisibility();

        servicesBtn.addEventListener("click", () => {
            expanded = !expanded;
            updateVisibility();
        });

        window.addEventListener("resize", () => {
            if (!expanded) updateVisibility();
        });
    }

    /* =====================================================
       DOMESTIC PAGE – FAQ (ONE OPEN AT A TIME)
    ===================================================== */
    const faqItems = document.querySelectorAll(".faq-item");

    if (faqItems.length) {
        faqItems.forEach(item => {
            item.querySelector(".faq-question").addEventListener("click", () => {
                faqItems.forEach(i => {
                    if (i !== item) i.classList.remove("active");
                });
                item.classList.toggle("active");
            });
        });
    }

    /* =====================================================
       DOMESTIC PAGE – POSTCODE CHECK
    ===================================================== */
    const findCleanerBtn = document.getElementById("findCleanerBtn");
    const postcodeInput = document.getElementById("postcodeInput");

    if (findCleanerBtn && postcodeInput) {
        findCleanerBtn.addEventListener("click", () => {
            const postcode = postcodeInput.value.trim().toUpperCase();

            if (!postcode) {
                alert("Please enter your postcode.");
                postcodeInput.focus();
                return;
            }

            const ukPostcodeRegex = /^([A-Z]{1,2}\d[A-Z\d]? ?\d[A-Z]{2})$/;

            if (!ukPostcodeRegex.test(postcode)) {
                alert("Please enter a valid UK postcode (e.g. E12 3AB).");
                postcodeInput.focus();
                return;
            }

            window.location.href =
                `/booking/domestic?postcode=${encodeURIComponent(postcode)}`;
        });
    }

});
