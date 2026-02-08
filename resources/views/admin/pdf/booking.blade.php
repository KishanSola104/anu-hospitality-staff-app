<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Booking #{{ $booking->id }}</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 13px;
            color: #1e293b;
            margin: 0;
            padding: 20px;
        }

        h2 {
            color: #0a66c2;
            margin-bottom: 5px;
        }

        .sub-title {
            font-size: 12px;
            color: #64748b;
            margin-bottom: 18px;
        }

        .card {
            border: 1px solid #d1d5db;
            border-radius: 8px;
            padding: 12px;
            margin-bottom: 14px;
        }

        .card-title {
            font-weight: bold;
            color: #0a66c2;
            margin-bottom: 8px;
            font-size: 14px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            padding: 6px 4px;
            vertical-align: top;
        }

        .label {
            font-weight: bold;
            width: 35%;
            color: #374151;
        }

        .value {
            width: 65%;
        }

        .two-col {
            width: 100%;
        }

        .two-col td {
            width: 50%;
            vertical-align: top;
            padding-right: 10px;
        }

        .total {
            font-size: 15px;
            font-weight: bold;
            color: #16a34a;
        }

        .status {
            font-weight: bold;
            text-transform: uppercase;
        }

        .footer {
            margin-top: 30px;
            font-size: 11px;
            color: #64748b;
            text-align: center;
        }
    </style>
</head>

<body>

    <!-- HEADER -->
    <h2>ANU Hospitality Staff Ltd</h2>
    <div class="sub-title">
        Booking Details • Booking ID #{{ $booking->id }}
    </div>

    <!-- BOOKING SUMMARY -->
    <div class="card">
        <div class="card-title">Booking Summary</div>
        <table>
            <tr>
                <td class="label">Date</td>
                <td class="value">{{ $booking->preferred_date->format('d M Y') }}</td>
            </tr>
            <tr>
                <td class="label">Time</td>
                <td class="value">{{ $booking->arrival_window }}</td>
            </tr>
            <tr>
                <td class="label">Total Hours</td>
                <td class="value">{{ $booking->hours }}</td>
            </tr>
        </table>
    </div>

    <!-- CUSTOMER & ADDRESS -->
    <div class="card">
        <div class="card-title">Customer Information</div>
        <table class="two-col">
            <tr>
                <td>
                    <strong>{{ $booking->full_name }}</strong><br>
                    {{ $booking->mobile }}<br>
                    {{ $booking->alt_mobile ?: '' }}
                </td>
                <td>
                    {{ $booking->address }}<br>
                    {{ $booking->city }} - {{ $booking->address_postcode }}
                </td>
            </tr>
        </table>
    </div>

    <!-- CLEANING DETAILS -->
    <div class="card">
        <div class="card-title">Cleaning Details</div>
        <table>
            <tr>
                <td class="label">Property Size</td>
                <td class="value">{{ $booking->bedrooms }} Bed / {{ $booking->bathrooms }} Bath</td>
            </tr>
            <tr>
                <td class="label">Pets</td>
                <td class="value">{{ $booking->has_pets ? 'Yes' : 'No' }}</td>
            </tr>
            <tr>
                <td class="label">Extras</td>
                <td class="value">
                    {{ collect($booking->extras)->filter()->keys()->implode(', ') ?: 'None' }}
                </td>
            </tr>
        </table>
    </div>

    <!-- ACCESS & MATERIALS -->
    <div class="card">
        <div class="card-title">Access & Materials</div>
        <table>
            <tr>
                <td class="label">Access Method</td>
                <td class="value">{{ $booking->access_method }}</td>
            </tr>
            <tr>
                <td class="label">Cleaning Materials</td>
                <td class="value">
                    {{ $booking->cleaning_materials === 'company'
                        ? 'Company Provided (+ £'.$booking->materials_charge.')'
                        : 'Customer Provides'
                    }}
                </td>
            </tr>
        </table>
    </div>

    <!-- PRICING -->
    <div class="card">
        <div class="card-title">Pricing</div>
        <table>
            <tr>
                <td class="label">Base Price</td>
                <td class="value">£{{ $booking->base_price }}</td>
            </tr>
            <tr>
                <td class="label">Materials Charge</td>
                <td class="value">£{{ $booking->materials_charge }}</td>
            </tr>
            <tr>
                <td class="label">Discount</td>
                <td class="value">£{{ $booking->discount }}</td>
            </tr>
            <tr>
                <td class="label">Total</td>
                <td class="value total">£{{ $booking->total_price }}</td>
            </tr>
        </table>
    </div>

    <!-- INSTRUCTIONS -->
    <div class="card">
        <div class="card-title">Instructions for Cleaner</div>
        <p>{{ $booking->instructions ?: 'No special instructions provided.' }}</p>
    </div>

    <!-- PAYMENT -->
    <div class="card">
        <div class="card-title">Payment Status</div>
        <p class="status">{{ strtoupper($booking->payment_status) }}</p>
    </div>

    <!-- FOOTER -->
    <div class="footer">
        This document is system generated by ANU Hospitality Staff Ltd
    </div>

</body>
</html>
