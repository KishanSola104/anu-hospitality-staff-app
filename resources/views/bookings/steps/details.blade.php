<div class="booking-section">

    <h3>Address & Contact Details</h3>

    <div class="booking-grid">

        {{-- Full Name --}}
        <div class="booking-field full-width" id="field-full-name">
            <label>Full Name <span class="required">*</span></label>
            <input type="text"
                   placeholder="Enter your full name"
                   ng-model="vm.form.address.full_name" id="field-full-name">

            <span class="error-text" ng-show="vm.errors.full_name">
                @{{ vm.errors.full_name }}
            </span>
        </div>

        {{-- Full Address --}}
        <div class="booking-field full-width" id="field-full-address">
            <label>Full Address <span class="required">*</span></label>
            <textarea rows="3"
                      placeholder="House number, street, locality"
                      ng-model="vm.form.address.full_address"></textarea>

            <span class="error-text" ng-show="vm.errors.full_address">
                @{{ vm.errors.full_address }}
            </span>
        </div>

        {{-- City --}}
        <div class="booking-field" id="field-city">
            <label>City <span class="required">*</span></label>
            <input type="text"
                   placeholder="Enter your city"
                   ng-model="vm.form.address.city">

            <span class="error-text" ng-show="vm.errors.city">
                @{{ vm.errors.city }}
            </span>
        </div>

        {{-- Postcode --}}
        <div class="booking-field">
            <label>Postcode <span class="required">*</span></label>
            <input type="text"
                   ng-model="vm.form.postcode"
                   readonly
                   class="readonly-input">
        </div>

        {{-- Mobile --}}
        <div class="booking-field" id="field-mobile">
            <label>Mobile Number <span class="required">*</span></label>
            <input type="tel"
                   placeholder="e.g. 44 7123 456789"
                   ng-model="vm.form.address.mobile">

            <span class="error-text" ng-show="vm.errors.mobile">
                @{{ vm.errors.mobile }}
            </span>
        </div>

        {{-- Alternate Mobile --}}
        <div class="booking-field">
            <label>Alternate Mobile (optional)</label>
            <input type="tel"
                   placeholder="e.g. 44 7123 456789"
                   ng-model="vm.form.address.alt_mobile">
        </div>

        {{-- Instructions --}}
        <div class="booking-field full-width">
            <label>Special Instructions (optional)</label>
            <textarea rows="3"
                      placeholder="Parking info, pet details, gate code, etc."
                      ng-model="vm.form.address.instructions"></textarea>
        </div>

    </div>

</div>
