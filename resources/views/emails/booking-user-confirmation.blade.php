<h2>Booking Confirmation</h2>

<p>Dear {{ $booking->full_name }},</p>

<p>Your booking has been successfully confirmed.</p>

<p><strong>Booking ID:</strong> {{ $booking->id }}</p>
<p><strong>Date:</strong> {{ $booking->preferred_date }}</p>
<p><strong>Total:</strong> £{{ $booking->total_price }}</p>

<p>Thank you for choosing ANU Hospitality Staff Ltd.</p>