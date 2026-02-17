<div class="booking-section">

    <h3>Service Information</h3>

    {{-- Postcode --}}
    <div class="booking-field">
        <label>Postcode <span class="required">*</span></label>
        <input type="text"
               ng-model="vm.form.postcode"
               readonly
               class="readonly-input">
    </div>

    {{-- Bedrooms & Bathrooms --}}
    <div class="booking-grid">

        <div class="booking-field">
            <label>Number of Bedrooms <span class="required">*</span></label>
            <select ng-model="vm.form.bedrooms"
                    ng-change="vm.recalculate()"
                    id="field-bedrooms">
                <option value="">Select...</option>
                <option ng-repeat="n in [0,1,2,3,4,5,6,7,8]" value="@{{ n }}">
                    @{{ n }}
                </option>
            </select>

            <span class="error-text" ng-show="vm.errors.bedrooms">
                @{{ vm.errors.bedrooms }}
            </span>
        </div>

        <div class="booking-field">
            <label>Number of Bathrooms <span class="required">*</span></label>
            <select ng-model="vm.form.bathrooms"
                    ng-change="vm.recalculate()"
                    id="field-bathrooms">
                <option value="">Select...</option>
                <option ng-repeat="n in [0,1,2,3,4,5,6]" value="@{{ n }}">
                    @{{ n }}
                </option>
            </select>

            <span class="error-text" ng-show="vm.errors.bathrooms">
                @{{ vm.errors.bathrooms }}
            </span>
        </div>

    </div>

    {{-- Included Areas --}}
    <div class="info-box">
        Your cleaner will also clean your kitchen, lounge and common areas.
    </div>

    {{-- Extra Tasks --}}
    <h4>Extra Tasks (optional)</h4>

    <div class="checkbox-group">

        <label>
            <input type="checkbox"
                   ng-model="vm.form.extras.ironing"
                   ng-change="vm.recalculate()">
            Ironing
        </label>

        <label>
            <input type="checkbox"
                   ng-model="vm.form.extras.laundry"
                   ng-change="vm.recalculate()">
            Laundry
        </label>

        <label>
            <input type="checkbox"
                   ng-model="vm.form.extras.windows"
                   ng-change="vm.recalculate()">
            Inside windows
        </label>

        <label>
            <input type="checkbox"
                   ng-model="vm.form.extras.fridge"
                   ng-change="vm.recalculate()">
            Inside fridge
        </label>

        <label class="highlight">
            <input type="checkbox"
                   ng-model="vm.form.extras.oven"
                   ng-change="vm.recalculate()">
            Oven cleaning
        </label>

        <label>
            <input type="checkbox"
                   ng-model="vm.form.hasPets">
            I have pets
        </label>

    </div>

    {{-- Cleaning Products --}}
    <h4>Cleaning Products</h4>

    <div class="info-box">
        Includes sprays and cloths. Cleaner cannot bring vacuum, mop or bucket.
    </div>

    <div class="radio-group">

        <label>
            <input type="radio"
                   ng-model="vm.form.cleaning_products"
                   value="provide"
                   ng-change="vm.recalculate()"
                   required>
            I will provide cleaning materials
        </label>

        <label>
            <input type="radio"
                   ng-model="vm.form.cleaning_products"
                   value="bring"
                   ng-change="vm.recalculate()">
            Cleaner should bring cleaning materials (+£6)
        </label>

    </div>

    <span class="error-text" ng-show="vm.errors.cleaning_products">
        @{{ vm.errors.cleaning_products }}
    </span>

    {{-- Oven Warning --}}
    <div class="warning-box" ng-show="vm.form.extras.oven">
        💷 Oven cleaning adds £60 (includes specialised products).
    </div>

    {{-- Recommended Hours --}}
    <h4>Recommended Hours</h4>

    <div class="info-box">
        We recommend selecting
        <strong>@{{ vm.recommendedHours }}</strong> hours
        based on your home details.
    </div>

    {{-- Hour Selection --}}
    <div class="hours-grid" id="field-hours">
        <button type="button"
                ng-repeat="h in vm.hoursOptions"
                ng-class="{
                    active: vm.form.hours === h,
                    recommended: h === vm.recommendedHours
                }"
                ng-click="vm.form.hours = h; vm.calculatePrice();">
            @{{ h }}h
        </button>
    </div>

      <span class="warning-text" 
      ng-show="vm.form.hours < vm.recommendedHours">
    We recommend at least @{{ vm.recommendedHours }} hours for better results.
</span>


</div>
