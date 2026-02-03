(function () {
    "use strict";

    angular
        .module("bookingApp", [])
        .controller("BookingController", function () {
            const vm = this;

            /* =====================
               STATE
            ===================== */
            vm.step = 1;

            vm.form = {
                postcode: new URLSearchParams(window.location.search).get("postcode") || "",

                /* ---------- STEP 1 ---------- */
                bedrooms: null,
                bathrooms: null,
                extras: {
                    ironing: false,
                    laundry: false,
                    windows: false,
                    fridge: false,
                    oven: false,
                },
                hasPets: false,
                hours: null,

                /* ---------- STEP 2 ---------- */
                address: {
                    full_name: "",
                    full_address: "",
                    city: "",
                    postcode: new URLSearchParams(window.location.search).get("postcode") || "",
                    mobile: "",
                    alt_mobile: "",
                    instructions: "",
                },

                /* ---------- STEP 3 ---------- */
                schedule: {
                    date: "",
                    arrival: "",
                    access: "",
                },
            };

            /* =====================
               ERRORS
            ===================== */
            vm.errors = {};

            /* =====================
               PRICE (IMPORTANT)
            ===================== */
            vm.price = {
                base: 0,
                discount: 0,
                total: 0,
            };

            const HOURLY_RATE = 20;
            const OVEN_PRICE = 60;

            vm.calculatePrice = function () {
                let base = vm.form.hours * HOURLY_RATE;

                if (vm.form.extras.oven) {
                    base += OVEN_PRICE;
                }

                vm.price.base = base;
                vm.price.discount = 0;
                vm.price.total = base;
            };

            /* =====================
               HOURS CONFIG
            ===================== */
            vm.hoursOptions = [2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
            vm.recommendedHours = 2;

            /* =====================
               DATE LIMITS
            ===================== */
            const today = new Date();
            const plus30 = new Date();
            plus30.setDate(today.getDate() + 30);

            const formatDate = (d) =>
                d.getFullYear() +
                "-" +
                String(d.getMonth() + 1).padStart(2, "0") +
                "-" +
                String(d.getDate()).padStart(2, "0");

            vm.minDate = formatDate(today);
            vm.maxDate = formatDate(plus30);

            /* =====================
               ARRIVAL WINDOWS
            ===================== */
            vm.arrivalSlots = [
                "9:00 AM – 10:00 AM",
                "10:00 AM – 11:00 AM",
                "11:00 AM – 12:00 PM",
                "12:00 PM – 1:00 PM",
                "1:00 PM – 2:00 PM",
                "2:00 PM – 3:00 PM",
                "3:00 PM – 4:00 PM",
                "4:00 PM – 5:00 PM",
            ];

            /* =====================
               HOURS CALCULATION
            ===================== */
            vm.recalculate = function () {
                let hours = 1;

                const b = parseInt(vm.form.bedrooms || 0);
                const ba = parseInt(vm.form.bathrooms || 0);

                hours += b * 0.6;
                hours += ba * 0.5;

                if (vm.form.extras.ironing) hours += 0.75;
                if (vm.form.extras.laundry) hours += 0.5;
                if (vm.form.extras.windows) hours += 0.75;
                if (vm.form.extras.fridge) hours += 0.4;
                if (vm.form.extras.oven) hours += 0.75;

                hours = Math.max(2, Math.round(hours));

                vm.recommendedHours = hours;

                if (!vm.form.hours) {
                    vm.form.hours = hours;
                }

                vm.calculatePrice();
            };

            /* =====================
               STEP VALIDATIONS
            ===================== */
            vm.validateStep1 = function () {
                vm.errors = {};

                if (!vm.form.bedrooms) {
                    vm.errors.bedrooms = "Please select number of bedrooms.";
                    vm.scrollToError("field-bedrooms");
                    return false;
                }

                if (!vm.form.bathrooms) {
                    vm.errors.bathrooms = "Please select number of bathrooms.";
                    vm.scrollToError("field-bathrooms");
                    return false;
                }

                if (!vm.form.hours) {
                    vm.errors.hours = "Please select cleaning hours.";
                    vm.scrollToError("field-hours");
                    return false;
                }

                if (vm.form.hours < vm.recommendedHours) {
                    vm.errors.hours =
                        "Minimum " +
                        vm.recommendedHours +
                        " hours required based on your home details.";
                    vm.scrollToError("field-hours");
                    return false;
                }

                return true;
            };

            vm.validateStep2 = function () {
                vm.errors = {};

                if (!vm.form.address.full_name) {
                    vm.errors.full_name = "Full name is required.";
                    vm.scrollToError("field-full-name");
                    return false;
                }

                if (!vm.form.address.full_address) {
                    vm.errors.full_address = "Full address is required.";
                    vm.scrollToError("field-full-address");
                    return false;
                }

                if (!vm.form.address.city) {
                    vm.errors.city = "City is required.";
                    vm.scrollToError("field-city");
                    return false;
                }

                if (!vm.form.address.mobile) {
                    vm.errors.mobile = "Mobile number is required.";
                    vm.scrollToError("field-mobile");
                    return false;
                }

                if (!/^[0-9\s]{7,15}$/.test(vm.form.address.mobile)) {
                    vm.errors.mobile = "Enter a valid mobile number.";
                    vm.scrollToError("field-mobile");
                    return false;
                }

                return true;
            };

            vm.validateStep3 = function () {
                vm.errors = {};

                if (!vm.form.schedule.date) {
                    vm.errors.date = "Please select preferred date.";
                    vm.scrollToError("field-date");
                    return false;
                }

                if (!vm.form.schedule.arrival) {
                    vm.errors.arrival = "Please select arrival window.";
                    vm.scrollToError("field-arrival");
                    return false;
                }

                if (!vm.form.schedule.access) {
                    vm.errors.access = "Please select access method.";
                    vm.scrollToError("field-access");
                    return false;
                }

                return true;
            };

            /* =====================
               SCROLL TO ERROR
            ===================== */
            vm.scrollToError = function (elementId) {
                setTimeout(() => {
                    const el = document.getElementById(elementId);
                    if (!el) return;

                    el.scrollIntoView({ behavior: "smooth", block: "center" });

                    const input = el.querySelector("input, textarea, select, button");
                    if (input) input.focus();
                }, 100);
            };

            /* =====================
               NAVIGATION
            ===================== */
            vm.next = function () {
                if (vm.step === 1 && !vm.validateStep1()) return;
                if (vm.step === 2 && !vm.validateStep2()) return;
                if (vm.step === 3 && !vm.validateStep3()) return;

                if (vm.step < 4) {
                    vm.step++;
                    window.scrollTo({ top: 0, behavior: "smooth" });
                }
            };

            vm.prev = function () {
                if (vm.step > 1) {
                    vm.step--;
                    window.scrollTo({ top: 0, behavior: "smooth" });
                }
            };

            /* =====================
               💳 PAYMENT (FINAL & WORKING)
            ===================== */
            vm.pay = function () {
                fetch("/booking/pay", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": document
                            .querySelector('meta[name="csrf-token"]')
                            .getAttribute("content"),
                    },
                    body: JSON.stringify({
                        form: vm.form,
                        price: vm.price,
                    }),
                })
                    .then((res) => res.json())
                    .then((data) => {
                        if (data.url) {
                            window.location.href = data.url;
                        } else {
                            alert("Payment initialization failed.");
                        }
                    })
                    .catch(() => {
                        alert("Something went wrong. Please try again.");
                    });
            };

            /* =====================
               INIT
            ===================== */
            vm.recalculate();
        });
})();
