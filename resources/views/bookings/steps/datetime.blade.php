<div class="booking-section">

    <h3>Preferred Date & Arrival Window</h3>

    <div class="booking-grid">

        {{-- Preferred Date --}}
        <div class="booking-field">
            <label>Preferred Date <span class="required">*</span></label>
            <input type="date"
                   ng-model="vm.form.schedule.date"
                   min="@{{ vm.minDate }}"
                   max="@{{ vm.maxDate }}"
                   required id="field-date">
            <small class="hint">
                Book from today up to 30 days ahead.
            </small>
        </div>

        {{-- Arrival Window --}}
        <div class="booking-field">
            <label>Arrival Window <span class="required">*</span></label>

            <div class="arrival-grid">
                <button type="button"
                        ng-repeat="slot in vm.arrivalSlots"
                        ng-class="{active: vm.form.schedule.arrival === slot}"
                        ng-click="vm.form.schedule.arrival = slot" id="field-arrival">
                    @{{ slot }}
                </button>
            </div>

            <small class="hint">
                We use arrival windows so your cleaner has travel time between jobs.
            </small>
        </div>

    </div>

    {{-- Access Method --}}
    <h4>How can your cleaner access the property?</h4>

    <div class="access-grid" id="field-access">

        <label class="radio-card">
            <input type="radio"
                   ng-model="vm.form.schedule.access"
                   value="Spare keys">
            <span  id="access-key">Spare keys (Best)</span>
        </label>

        <label class="radio-card">
            <input type="radio"
                   ng-model="vm.form.schedule.access"
                   value="Someone at home">
            <span id="access-key">Someone at home</span>
        </label>

        <label class="radio-card">
            <input type="radio"
                   ng-model="vm.form.schedule.access"
                   value="Concierge">
            <span  id="access-key">Concierge</span>
        </label>

        <label class="radio-card">
            <input type="radio"
                   ng-model="vm.form.schedule.access"
                   value="Key safe">
            <span id="access-key">Key safe</span>
        </label>

        <label class="radio-card">
            <input type="radio"
                   ng-model="vm.form.schedule.access"
                   value="Key hidden">
            <span  id="access-key">Key hidden</span>
        </label>

    </div>

</div>
