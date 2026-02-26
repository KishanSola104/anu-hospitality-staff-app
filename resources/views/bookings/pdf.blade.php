<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Booking Invoice</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color: #333;
        }

        .container {
            padding: 30px;
        }

        .header-table,
        .info-table,
        .details-table,
        .payment-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        .header-table td {
            vertical-align: top;
        }

        .company-name {
            font-size: 20px;
            font-weight: bold;
            color: #1a237e;
        }

        .invoice-title {
            font-size: 20px;
            font-weight: bold;
            text-align: right;
            color: #1a237e;
        }

        .section-title {
            background: #f2f4f8;
            font-weight: bold;
            padding: 6px;
            border: 1px solid #ddd;
            margin-top: 20px;
        }

        .info-table td {
            padding: 6px;
            border: 1px solid #ddd;
        }

        .details-table th {
            background: #1a237e;
            color: #fff;
            padding: 8px;
            border: 1px solid #ddd;
            text-align: left;
        }

        .details-table td {
            padding: 8px;
            border: 1px solid #ddd;
        }

        .text-right {
            text-align: right;
        }

        .payment-table td {
            padding: 6px;
            border: 1px solid #ddd;
        }

        .grand-total {
            font-weight: bold;
            font-size: 14px;
        }

        .footer {
            margin-top: 40px;
            font-size: 11px;
            text-align: center;
            color: #666;
            border-top: 1px solid #ddd;
            padding-top: 10px;
        }

        .green-note {
            margin-top: 20px;
            font-size: 11px;
            background: #f8fdf8;
            border: 1px solid #cdeccd;
            padding: 10px;
        }
    </style>
</head>

<body>

<div class="container">

    <!-- HEADER -->
    <table class="header-table">
        <tr>
            <td width="60%">
              
                <div class="company-name">Anu Hospitality Staff Ltd</div>
                35 Peel Road, North Wembley, London HA9 7LY<br>
                Email: info@anuhospitalitystaff.com<br>
                Website: www.anuhospitalitystaff.com
            </td>

            <td width="40%" class="text-right">
                <div class="invoice-title">INVOICE</div>
                <strong>Invoice No:</strong> DC-{{ $booking->id }}<br>
                <strong>Invoice Date:</strong> {{ now()->format('d M Y') }}<br>
                <strong>Service Date:</strong> {{ \Carbon\Carbon::parse($booking->preferred_date)->format('d M Y') }}<br>
                <strong>Status:</strong> {{ ucfirst($booking->payment_status) }}
            </td>
        </tr>
    </table>

    <!-- CUSTOMER INFO -->
    <div class="section-title">Customer Information</div>

    <table class="info-table">
        <tr>
            <td><strong>Name</strong></td>
            <td>{{ $booking->full_name }}</td>
            <td><strong>Mobile</strong></td>
            <td>{{ $booking->mobile }}</td>
        </tr>
        <tr>
            <td><strong>Address</strong></td>
            <td colspan="3">
                {{ $booking->address }}, {{ $booking->city }} - {{ $booking->address_postcode }}
            </td>
        </tr>
    </table>

    <!-- SERVICE DETAILS -->
    <div class="section-title">Service Details</div>

    <table class="details-table">
        <thead>
            <tr>
                <th>Description</th>
                <th>Details</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Bedrooms</td>
                <td>{{ $booking->bedrooms }}</td>
            </tr>
            <tr>
                <td>Bathrooms</td>
                <td>{{ $booking->bathrooms }}</td>
            </tr>
            <tr>
                <td>Cleaning Hours</td>
                <td>{{ $booking->hours }}</td>
            </tr>
            <tr>
                <td>Pets</td>
                <td>{{ $booking->has_pets ? 'Yes' : 'No' }}</td>
            </tr>
            <tr>
                <td>Access Method</td>
                <td>{{ $booking->access_method }}</td>
            </tr>
            <tr>
                <td>Cleaning Materials</td>
                <td>{{ ucfirst($booking->cleaning_materials ?? 'N/A') }}</td>
            </tr>
        </tbody>
    </table>

    <!-- PAYMENT -->
    <div class="section-title">Payment Summary</div>

    <table class="payment-table">
        <tr>
            <td><strong>Base Price</strong></td>
            <td class="text-right">£{{ number_format($booking->base_price, 2) }}</td>
        </tr>

        <tr>
            <td><strong>Discount</strong></td>
            <td class="text-right">£{{ number_format($booking->discount, 2) }}</td>
        </tr>

        <tr class="grand-total">
            <td>Total Paid</td>
            <td class="text-right">£{{ number_format($booking->total_price, 2) }}</td>
        </tr>
    </table>

    <!-- GREEN INITIATIVE -->
    <div class="green-note">
        <strong>Go Green Initiative:</strong> For first-time bookings, we plant a tree as part of our sustainability commitment.
        Repeat customers receive a personalised tree growth update video.
    </div>

    <!-- FOOTER -->
    <div class="footer">
        
        Thank you for choosing Anu Hospitality Staff Ltd.<br>
        This document serves as your official booking confirmation.
    </div>

</div>

</body>
</html>