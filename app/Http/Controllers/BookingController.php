<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class BookingController extends Controller
{
    /**
     * Show booking page
     */
    public function domestic(Request $request)
    {
        $postcode = $request->query('postcode');

        return view('bookings.booking', compact('postcode'));
    }

    /**
     * Create booking & redirect to Stripe Checkout
     */
    public function pay(Request $request)
    {
        // Ensure user is logged in
        if (!Auth::check()) {
            return response()->json([
                'error' => 'Login required'
            ], 403);
        }

        // Validate request
        $data = $request->validate([
            'form'  => 'required|array',
            'price' => 'required|array',
        ]);

        try {
            // Create booking (payment pending)
            $booking = Booking::create([
                'user_id' => Auth::id(),

                // Service
                'postcode'  => $data['form']['postcode'],
                'bedrooms'  => $data['form']['bedrooms'],
                'bathrooms' => $data['form']['bathrooms'],
                'extras'    => $data['form']['extras'],
                'has_pets'  => $data['form']['hasPets'],
                'hours'     => $data['form']['hours'],

                // Address
                'full_name'        => $data['form']['address']['full_name'],
                'address'          => $data['form']['address']['full_address'],
                'city'             => $data['form']['address']['city'],
                'address_postcode' => $data['form']['postcode'],
                'mobile'           => $data['form']['address']['mobile'],
                'alt_mobile'       => $data['form']['address']['alt_mobile'] ?? null,
                'instructions'     => $data['form']['address']['instructions'] ?? null,

                // Schedule
                'preferred_date' => $data['form']['schedule']['date'],
                'arrival_window' => $data['form']['schedule']['arrival'],
                'access_method'  => $data['form']['schedule']['access'],

                // Pricing
                'base_price'  => $data['price']['base'],
                'discount'    => $data['price']['discount'],
                'total_price' => $data['price']['total'],

                'payment_status' => 'pending',
            ]);

            // Stripe configuration
            Stripe::setApiKey(config('services.stripe.secret'));

            // Create Stripe Checkout session
            $session = Session::create([
                'mode' => 'payment',
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'gbp',
                        'product_data' => [
                            'name' => 'Domestic Cleaning Service',
                        ],
                        'unit_amount' => (int) ($booking->total_price * 100),
                    ],
                    'quantity' => 1,
                ]],
                'success_url' => route('booking.success', $booking),
                'cancel_url'  => route('booking.cancel', $booking),
            ]);

            // Save Stripe session ID
            $booking->update([
                'stripe_session_id' => $session->id,
            ]);

            return response()->json([
                'url' => $session->url
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Payment success
     */
    public function success(Booking $booking)
    {
        if ($booking->payment_status !== 'paid') {
            $booking->update([
                'payment_status' => 'paid',
            ]);
        }

        return view('bookings.success', compact('booking'));
    }

    /**
     * Payment cancelled
     */
    public function cancel(Booking $booking)
    {
        if ($booking->payment_status !== 'failed') {
            $booking->update([
                'payment_status' => 'failed',
            ]);
        }

        return view('bookings.cancel', compact('booking'));
    }


 /* Booking PDF Download */

public function download(Booking $booking)
{
    if ($booking->payment_status !== 'paid') {
        abort(403);
    }

    $pdf = Pdf::loadView('bookings.pdf', compact('booking'));

    // Clean filename: Booking-6-KishanSolanki-2026-02-27.pdf
    $fileName = 'Booking-' . $booking->id . '-' .
        preg_replace('/\s+/', '', $booking->full_name) . '-' .
        \Carbon\Carbon::parse($booking->preferred_date)->format('Y-m-d') .
        '.pdf';

    return $pdf->download($fileName);
}


}
