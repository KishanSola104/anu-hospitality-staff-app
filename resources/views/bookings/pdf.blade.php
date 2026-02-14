<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Booking Receipt</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 13px;
            color: #333;
        }

        .container {
            padding: 30px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .company-name {
            font-size: 22px;
            font-weight: bold;
        }

        .subtitle {
            font-size: 13px;
            color: #555;
        }

        .section {
            margin-top: 20px;
        }

        .section h4 {
            margin-bottom: 8px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 4px;
        }

        .row {
            margin-bottom: 6px;
        }

        .price {
            font-size: 16px;
            font-weight: bold;
        }

        .footer {
            margin-top: 30px;
            font-size: 12px;
            color: #777;
            text-align: center;
        }

        hr {
            margin: 15px 0;
        }
    </style>
</head>
<body>

<div class="container">

    <!-- HEADER -->
    <div class="header">
        <div class="company-name">Anu Hospitality Staff Ltd</div>
        <div class="subtitle">Domestic Cleaning Services</div>
        <div class="subtitle">Official Booking Receipt</div>
    </div>

    <hr>

    <div class="row"><strong>Booking ID:</strong> #{{ $booking->id }}</div>
    <div class="row"><strong>Invoice Date:</strong> {{ now()->format('d M Y') }}</div>

    <!-- CUSTOMER INFO -->
    <div class="section">
        <h4>Customer Information</h4>
        <div class="row"><strong>Name:</strong> {{ $booking->full_name }}</div>
        <div class="row"><strong>Mobile:</strong> {{ $booking->mobile }}</div>

        @if($booking->alt_mobile)
            <div class="row"><strong>Alt Mobile:</strong> {{ $booking->alt_mobile }}</div>
        @endif

        <div class="row"><strong>Address:</strong> {{ $booking->address }}, {{ $booking->city }}</div>
        <div class="row"><strong>Postcode:</strong> {{ $booking->address_postcode }}</div>
    </div>

    <!-- SERVICE DETAILS -->
    <div class="section">
        <h4>Service Details</h4>
        <div class="row"><strong>Bedrooms:</strong> {{ $booking->bedrooms }}</div>
        <div class="row"><strong>Bathrooms:</strong> {{ $booking->bathrooms }}</div>
        <div class="row"><strong>Cleaning Hours:</strong> {{ $booking->hours }}</div>
        <div class="row"><strong>Has Pets:</strong> {{ $booking->has_pets ? 'Yes' : 'No' }}</div>
        <div class="row"><strong>Access Method:</strong> {{ $booking->access_method }}</div>
        <div class="row"><strong>Cleaning Materials:</strong> {{ ucfirst($booking->cleaning_materials ?? 'N/A') }}</div>
    </div>

    <!-- EXTRAS -->
    @if($booking->extras)
        <div class="section">
            <h4>Extra Services</h4>
            @foreach($booking->extras as $key => $value)
                @if($value)
                    <div class="row">• {{ ucfirst($key) }}</div>
                @endif
            @endforeach
        </div>
    @endif

    <!-- SCHEDULE -->
    <div class="section">
        <h4>Schedule</h4>
        <div class="row">
            <strong>Preferred Date:</strong>
            {{ \Carbon\Carbon::parse($booking->preferred_date)->format('d M Y') }}
        </div>
        <div class="row"><strong>Arrival Window:</strong> {{ $booking->arrival_window }}</div>
    </div>

    <!-- PAYMENT -->
    <div class="section">
        <h4>Payment Summary</h4>
        <div class="row"><strong>Base Price:</strong> £{{ number_format($booking->base_price, 2) }}</div>
        <div class="row"><strong>Discount:</strong> £{{ number_format($booking->discount, 2) }}</div>
        <div class="row price"><strong>Total Paid:</strong> £{{ number_format($booking->total_price, 2) }}</div>
        <div class="row"><strong>Status:</strong> {{ ucfirst($booking->payment_status) }}</div>
    </div>

    <div class="footer">
        Thank you for choosing Anu Hospitality Staff Ltd.<br>
        This document serves as your official booking confirmation.
    </div>

</div>

</body>
</html>
