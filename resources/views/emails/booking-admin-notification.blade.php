<h2>New Booking Received</h2>

<p><strong>Booking ID:</strong> {{ $booking->id }}</p>
<p><strong>Name:</strong> {{ $booking->full_name }}</p>
<p><strong>Mobile:</strong> {{ $booking->mobile }}</p>
<p><strong>Date:</strong> {{ $booking->preferred_date }}</p>
<p><strong>Total:</strong> £{{ $booking->total_price }}</p>

<p>Please check admin dashboard for full details.</p>