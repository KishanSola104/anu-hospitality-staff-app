<?php

namespace App\Mail;

use App\Models\Booking;
use Illuminate\Mail\Mailable;
use Barryvdh\DomPDF\Facade\Pdf;

class BookingAdminNotification extends Mailable
{
    public $booking;

    public function __construct(Booking $booking)
    {
        $this->booking = $booking;
    }

    public function build()
    {
        $pdf = Pdf::loadView('bookings.pdf', [
            'booking' => $this->booking
        ]);

        return $this->subject('New Booking Received')
            ->view('emails.booking-admin-notification')
            ->attachData(
                $pdf->output(),
                'Booking-' . $this->booking->id . '.pdf',
                [
                    'mime' => 'application/pdf',
                ]
            );
    }
}
