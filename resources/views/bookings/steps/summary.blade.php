<div class="booking-section">

    <h3>Summary & Payment</h3>

    <p class="status-text">
        Status: <strong>Pending payment</strong>
    </p>

    <div class="summary-grid">

        {{-- SERVICE --}}
        <div class="summary-card">
            <h4>Service</h4>

            <p><strong>Postcode:</strong> @{{ vm.form.postcode }}</p>
            <p><strong>Bedrooms:</strong> @{{ vm.form.bedrooms }}</p>
            <p><strong>Bathrooms:</strong> @{{ vm.form.bathrooms }}</p>

            <p>
                <strong>Extras:</strong>
                <span ng-if="vm.hasExtras()">
                    @{{ vm.getExtrasText() }}
                </span>
                <span ng-if="!vm.hasExtras()">—</span>
            </p>

            <p><strong>Pets:</strong> @{{ vm.form.hasPets ? 'Yes' : 'No' }}</p>
            <p><strong>Hours selected:</strong> @{{ vm.form.hours }}h</p>
        </div>

        {{-- ADDRESS --}}
        <div class="summary-card">
            <h4>Address & Contact</h4>

            <p><strong>Name:</strong> @{{ vm.form.address.full_name }}</p>
            <p><strong>Mobile:</strong> @{{ vm.form.address.mobile }}</p>
            <p><strong>Alt Mobile:</strong> @{{ vm.form.address.alt_mobile || '—' }}</p>
            <p><strong>Address:</strong> @{{ vm.form.address.full_address }}</p>
            <p><strong>City:</strong> @{{ vm.form.address.city }}</p>
            <p><strong>Postcode:</strong> @{{ vm.form.postcode }}</p>
            <p><strong>Instructions:</strong> @{{ vm.form.address.instructions || '—' }}</p>
        </div>

        {{-- SCHEDULE --}}
        <div class="summary-card">
            <h4>Schedule</h4>

            <p><strong>Preferred Date:</strong> @{{ vm.form.schedule.date }}</p>
            <p><strong>Arrival Window:</strong> @{{ vm.form.schedule.arrival }}</p>
            <p><strong>Access Method:</strong> @{{ vm.form.schedule.access }}</p>
        </div>

        {{-- PRICE --}}
        <div class="summary-card full-width">
            <h4>Price Summary</h4>

            <p>Hourly rate: £20.00/hr</p>

            <p>
                @{{ vm.form.hours }}h × £20.00 =
                <strong>£@{{ vm.price.base }}</strong>
            </p>

            <p ng-if="vm.form.extras.oven">
                Oven cleaning: <strong>£60.00</strong>
            </p>

            <p ng-if="vm.isFirstTime">
                First-time customer discount:
                <strong>−£@{{ vm.price.discount }}</strong>
            </p>

            <hr>

            <p class="total-price">
                Total:
                <strong>£@{{ vm.price.total }}</strong>
            </p>
        </div>

    </div>

    {{-- SECURE NOTICE --}}
    <div class="secure-box">
        Secure Payment: Please review your booking and click
        <strong>“Pay Securely to Confirm Booking”</strong>.
        By continuing, you agree to our
        <a href="{{ route('terms.conditions') }}">Terms & Conditions</a>.
    </div>

</div>
