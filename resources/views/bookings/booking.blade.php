<!-- @extends('layouts.app')

@section('title', 'Domestic Cleaning Booking | ANU Hospitality Staff Ltd')

@section('content')

{{-- Auth protection (extra safety) --}}
@auth

<main ng-app="BookingApp" ng-controller="BookingController as vm">

    {{-- ================= HEADER ================= --}}
    <header class="booking-header">
        <div class="header-top glass-top">
            <a href="{{ route('home') }}" class="header-text-logo">ANU Hospitality</a>
        </div>
        <div class="header-sub gradient-sub">
            <h1>Domestic Cleaning Booking</h1>
        </div>
    </header>

    {{-- ================= BOOKING FORM ================= --}}
    <section class="booking-form-section">
        <div class="booking-container glass-card">

            <h2 class="booking-title">Book Your Service</h2>

            {{-- ================= PROGRESS ================= --}}
            <div class="progress-wrapper">
                <div class="progress-steps">
                    <div class="progress-step" ng-class="{active: vm.step === 1, completed: vm.step > 1}">
                        <span>1</span><p>Service</p>
                    </div>
                    <div class="progress-line"></div>

                    <div class="progress-step" ng-class="{active: vm.step === 2, completed: vm.step > 2}">
                        <span>2</span><p>Details</p>
                    </div>
                    <div class="progress-line"></div>

                    <div class="progress-step" ng-class="{active: vm.step === 3, completed: vm.step > 3}">
                        <span>3</span><p>Date & Time</p>
                    </div>
                    <div class="progress-line"></div>

                    <div class="progress-step" ng-class="{active: vm.step === 4}">
                        <span>4</span><p>Payment</p>
                    </div>
                </div>
            </div>

            {{-- ================= FORM ================= --}}
            <form name="bookingForm" novalidate>

                {{-- ================= STEP 1 ================= --}}
                <div class="form-step" ng-show="vm.step === 1">
                    <div class="booking-section">
                        <h3>Service Information</h3>

                        <div class="booking-grid">

                            <div class="booking-field full-width">
                                <label>Postcode <span class="required">*</span></label>
                                <input type="text" ng-model="vm.form.postcode" required>
                            </div>

                            <div class="booking-field">
                                <label>Bedrooms <span class="required">*</span></label>
                                <select ng-model="vm.form.bedrooms" required>
                                    <option value="">Select</option>
                                    <option ng-repeat="n in vm.range(0,8)" value="@{{n}}">
                                        @{{n}} Bedroom
                                    </option>
                                </select>
                            </div>

                            <div class="booking-field">
                                <label>Bathrooms <span class="required">*</span></label>
                                <select ng-model="vm.form.bathrooms" required>
                                    <option value="">Select</option>
                                    <option ng-repeat="n in vm.range(0,7)" value="@{{n}}">
                                        @{{n}} Bathroom
                                    </option>
                                </select>
                            </div>

                        </div>

                        {{-- Extras --}}
                        <div class="booking-sub-section">
                            <h4>Extra Tasks</h4>
                            <div class="booking-checkbox-group">
                                <label class="checkbox-item" ng-repeat="extra in vm.extras">
                                    <input type="checkbox" ng-model="vm.form.extras[extra]">
                                    <span>@{{ extra }}</span>
                                </label>
                            </div>
                        </div>

                        {{-- Frequency --}}
                        <div class="booking-sub-section">
                            <h4>How often?</h4>
                            <div class="booking-radio-group">
                                <label class="radio-item" ng-repeat="f in vm.frequencies">
                                    <input type="radio" ng-model="vm.form.frequency" ng-value="f.value">
                                    <span>@{{ f.label }}</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="booking-buttons step-nav">
                        <button type="button" class="btn-secondary" ng-click="vm.next()">Continue</button>
                    </div>
                </div>

                {{-- ================= STEP 2 ================= --}}
                <div class="form-step" ng-show="vm.step === 2">
                    <div class="booking-section">
                        <h3>Address & Contact</h3>

                        <div class="booking-grid">

                            <div class="booking-field full-width">
                                <label>Full Name *</label>
                                <input type="text" ng-model="vm.form.full_name" required>
                            </div>

                            <div class="booking-field full-width">
                                <label>Full Address *</label>
                                <textarea ng-model="vm.form.full_address" required></textarea>
                            </div>

                            <div class="booking-field">
                                <label>City *</label>
                                <input type="text" ng-model="vm.form.city" required>
                            </div>

                            <div class="booking-field">
                                <label>Postcode *</label>
                                <input type="text" ng-model="vm.form.address_postcode" required>
                            </div>

                            <div class="booking-field">
                                <label>Mobile *</label>
                                <input type="text" ng-model="vm.form.mobile" required>
                            </div>

                            <div class="booking-field">
                                <label>Alternate Mobile</label>
                                <input type="text" ng-model="vm.form.alt_mobile">
                            </div>

                        </div>
                    </div>

                    <div class="booking-buttons step-nav">
                        <button type="button" class="btn-tertiary" ng-click="vm.prev()">Back</button>
                        <button type="button" class="btn-secondary" ng-click="vm.next()">Continue</button>
                    </div>
                </div>

                {{-- ================= STEP 3 ================= --}}
                <div class="form-step" ng-show="vm.step === 3">
                    <div class="booking-section">
                        <h3>Date & Arrival Window</h3>

                        <div class="booking-grid">
                            <div class="booking-field">
                                <label>Date *</label>
                                <input type="date" ng-model="vm.form.date" required>
                            </div>

                            <div class="booking-field">
                                <label>Arrival Window *</label>
                                <div class="time-buttons">
                                    <button type="button"
                                            class="time-btn"
                                            ng-repeat="t in vm.timeSlots"
                                            ng-class="{active: vm.form.arrival_window === t}"
                                            ng-click="vm.form.arrival_window = t">
                                        @{{ t }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="booking-buttons step-nav">
                        <button type="button" class="btn-tertiary" ng-click="vm.prev()">Back</button>
                        <button type="button" class="btn-secondary" ng-click="vm.next()">Review</button>
                    </div>
                </div>

                {{-- ================= STEP 4 ================= --}}
                <div class="form-step" ng-show="vm.step === 4">
                    <div class="booking-section">
                        <h3>Summary & Payment</h3>

                        {{-- Summary --}}
                        <div class="summary-grid">
                            <div class="summary-card">
                                <h4>Service</h4>
                                <p><strong>Bedrooms:</strong> @{{ vm.form.bedrooms }}</p>
                                <p><strong>Bathrooms:</strong> @{{ vm.form.bathrooms }}</p>
                                <p><strong>Frequency:</strong> @{{ vm.form.frequency }}</p>
                            </div>

                            <div class="summary-card total">
                                <h4>Price Summary</h4>
                                <p><strong>Total:</strong> £@{{ vm.calculatedTotal }}</p>
                            </div>
                        </div>

                        {{-- Stripe Card --}}
                        <div id="stripe-card-element" class="stripe-box"></div>
                    </div>

                    <div class="booking-buttons">
                        <button type="button" class="btn-tertiary" ng-click="vm.prev()">Back</button>
                        <button type="button"
                                class="btn-primary pay-btn"
                                ng-click="vm.submitBooking()">
                            Pay Securely to Confirm Booking
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </section>

</main>

{{-- Logged-in user info for JS --}}
<script>
    window.AUTH_USER = {
        id: {{ auth()->id() }},
        email: @json(auth()->user()->email)
    };
</script>

@else
{{-- Redirect guests --}}
<script>
    window.location.href = "{{ route('login') }}";
</script>
@endauth

@endsection
 -->