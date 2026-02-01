var app = angular.module('BookingApp', []);

app.controller('BookingController', function ($http, $timeout) {

    var vm = this;

    // ---------------------------
    // STATE
    // ---------------------------
    vm.step = 1;
    vm.loading = false;

    vm.form = {
        extras: {},
        frequency: 'oneoff'
    };

    // ---------------------------
    // CONSTANTS (UI ONLY)
    // ---------------------------
    vm.timeSlots = [
        '09:00–10:00','10:00–11:00','11:00–12:00',
        '12:00–13:00','13:00–14:00','14:00–15:00'
    ];

    vm.extras = [
        'Ironing',
        'Laundry',
        'Inside windows',
        'Inside fridge',
        'Inside oven'
    ];

    vm.frequencies = [
        { label: 'Every week', value: 'weekly' },
        { label: 'Every 2 weeks', value: 'biweekly' },
        { label: 'One-off clean', value: 'oneoff' }
    ];

    // ---------------------------
    // STEP CONTROL
    // ---------------------------
    vm.next = function () {
        if (!vm.validateStep(vm.step)) return;
        vm.step++;
        window.scrollTo({ top: 0, behavior: 'smooth' });
    };

    vm.prev = function () {
        vm.step--;
        window.scrollTo({ top: 0, behavior: 'smooth' });
    };

    // ---------------------------
    // VALIDATION (UI ONLY)
    // ---------------------------
    vm.validateStep = function (step) {
        if (step === 1) {
            return vm.form.postcode && vm.form.bedrooms !== undefined;
        }
        if (step === 2) {
            return vm.form.full_name && vm.form.mobile;
        }
        if (step === 3) {
            return vm.form.date && vm.form.arrival_window;
        }
        return true;
    };

    // ---------------------------
    // PRICE (SERVER CONTROLLED)
    // ---------------------------
    vm.fetchPrice = function () {
        return $http.post('/api/bookings/calculate', vm.form)
            .then(res => {
                vm.calculatedTotal = res.data.total;
                vm.breakdown = res.data.breakdown;
            });
    };

    // ---------------------------
    // SUBMIT & STRIPE
    // ---------------------------
    vm.submitBooking = function () {
        vm.loading = true;

        $http.post('/api/bookings/create', vm.form)
            .then(res => {
                return stripe.confirmCardPayment(
                    res.data.client_secret,
                    {
                        payment_method: {
                            card: cardElement,
                            billing_details: {
                                email: window.AUTH_USER.email
                            }
                        }
                    }
                );
            })
            .then(result => {
                if (result.error) {
                    alert(result.error.message);
                } else {
                    window.location.href = '/booking/success';
                }
            })
            .finally(() => vm.loading = false);
    };

});
