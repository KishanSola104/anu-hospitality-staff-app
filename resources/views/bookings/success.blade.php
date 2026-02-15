@extends('layouts.app')

@section('title', 'Booking Confirmed')

@section('content')

<style>
      .booking-wrapper {margin-top: 120px;padding-bottom: 60px;}.booking-title-bar {text-align: center;margin-bottom: 30px;}.booking-title-bar h1 {font-size: 32px;font-weight: 700;color: #0b5ed7;}.booking-section {text-align: center;max-width: 600px;margin: 0 auto;padding: 40px 30px;background: #ffffff;border-radius: 12px;box-shadow: 0 10px 30px rgba(0,0,0,0.05);}.booking-section h3 {font-size: 22px;margin-bottom: 15px;color: #198754;}.info-box {font-size: 15px;margin-bottom: 30px;color: #555;line-height: 1.6;}.download-btn {display: inline-block;padding: 16px 40px;border-radius: 50px;background: #0b5ed7;color: #ffffff;text-decoration: none;font-weight: 600;font-size: 16px;transition: 0.3s ease;}.download-btn:hover {background: #084298;color: #ffffff;}.error-message {color: red;font-weight: 600;}
</style>

<div class="booking-wrapper">

    <div class="booking-title-bar">
        <h1>Booking Confirmed</h1>
    </div>

    <div class="booking-section">

        <h3>Payment Successful</h3>

        <div class="info-box">
            Your booking has been successfully confirmed.<br>
            Please download your official confirmation receipt below.
        </div>

        @if($booking->payment_status === 'paid')
            <a href="{{ route('booking.download', $booking->id) }}"
               class="download-btn">
                Download Booking Receipt (PDF)
            </a>
        @else
            <div class="error-message">
                Payment not verified.
            </div>
        @endif

    </div>

</div>

@endsection
