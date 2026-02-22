@extends('layouts.booking')

@section('title', 'Domestic Cleaning Booking')

@section('content')

<div class="booking-wrapper"
     ng-app="bookingApp"
     ng-controller="BookingController as vm">


     <!-- GLOBAL STEP & PAYMENT LOADER -->
<div class="step-loader" ng-class="{ active: vm.isLoading }">

    <div class="loader-backdrop"></div>

    <div class="loader-box">

        <img src="{{ asset('assets/images/stripe-logo.svg') }}"
             alt="Stripe Secure Payment"
             class="stripe-logo"
             ng-if="vm.isPayment">

        <div class="spinner"></div>

        <p class="loader-text">
            @{{ vm.loaderText }}
        </p>

    </div>
</div>


    {{-- Progress --}}
    <div class="progress-steps">
        <div class="step active" data-step="1" ng-class="{active: vm.step >= 1}">1 Service</div>
        <div class="step" data-step="2" ng-class="{active: vm.step >= 2}">2 Details</div>
        <div class="step" data-step="3" ng-class="{active: vm.step >= 3}">3 Date & Time</div>
        <div class="step" data-step="4" ng-class="{active: vm.step >= 4}">4 Payment</div>
    </div>

    {{-- STEP 1 --}}
    <section  ng-show="vm.step === 1">
        @include('bookings.steps.service')
        <button ng-click="vm.next()">Continue</button>
    </section>

    {{-- STEP 2 --}}
    <section ng-show="vm.step === 2">
        @include('bookings.steps.details')
        <button ng-click="vm.prev()">Back</button>
        <button ng-click="vm.next()">Continue</button>
    </section>

    {{-- STEP 3 --}}
    <section ng-show="vm.step === 3">
        @include('bookings.steps.datetime')
        <button ng-click="vm.prev()">Back</button>
        <button ng-click="vm.next()">Review</button>
    </section>

    {{-- STEP 4 --}}
    <section ng-show="vm.step === 4">
        @include('bookings.steps.summary')
        <button ng-click="vm.prev()">Back</button>
        <button ng-click="vm.pay()">Pay Securely</button>
    </section>

</div>

@endsection
