@extends('layouts.app')

@section('title', 'Payment Failed')

@section('content')

<style>
    .booking-wrapper {margin-top: 120px;padding-bottom: 60px;}.booking-title-bar {text-align: center;margin-bottom: 30px;}.booking-title-bar h1 {font-size: 32px;font-weight: 700;color: #dc3545;}.booking-section {text-align: center;max-width: 600px;margin: 0 auto;padding: 40px 30px;background: #ffffff;border-radius: 12px;box-shadow: 0 10px 30px rgba(0,0,0,0.05);}.booking-section h3 {font-size: 22px;margin-bottom: 15px;color: #dc3545;}.info-box {font-size: 15px;margin-bottom: 30px;color: #555;line-height: 1.6;}.retry-btn {display: inline-block;padding: 14px 36px;border-radius: 50px;background: #0b5ed7;color: #ffffff;text-decoration: none;font-weight: 600;font-size: 15px;margin-right: 10px;transition: 0.3s ease;}.retry-btn:hover {background: #084298;color: #ffffff;}.home-btn {display: inline-block;padding: 14px 36px;border-radius: 50px;background: #6c757d;color: #ffffff;text-decoration: none;font-weight: 600;font-size: 15px;transition: 0.3s ease;}.home-btn:hover {background: #5a6268;color: #ffffff;}
</style>

<div class="booking-wrapper">

    <div class="booking-title-bar">
        <h1>Payment Failed</h1>
    </div>

    <div class="booking-section">

        <h3>Booking Not Confirmed</h3>

        <div class="info-box">
            Unfortunately, your payment was not completed.<br>
            Your booking has not been confirmed.<br><br>
            Please try again to secure your booking.
        </div>

        <a href="{{ route('booking.domestic') }}" class="retry-btn">
            Retry Payment
        </a>

        <a href="{{ route('home') }}" class="home-btn">
            Back to Home
        </a>

    </div>

</div>

@endsection
