<?php

namespace App\Mail;

use App\Models\Booking;
use Illuminate\Mail\Mailable;
use Barryvdh\DomPDF\Facade\Pdf;

class BookingUserConfirmation extends Mailable
{
    public $booking;

    public function __construct(Booking $booking)
    {
        $this->booking = $booking;
    }

    public function build()
    {
        // Generate PDF
        $pdf = Pdf::loadView('bookings.pdf', [
            'booking' => $this->booking
        ]);

        return $this->subject('Your Booking Confirmation')
            ->view('emails.booking-user-confirmation')
            ->attachData(
                $pdf->output(),
                'Booking-' . $this->booking->id . '.pdf',
                [
                    'mime' => 'application/pdf',
                ]
            );
    }
}