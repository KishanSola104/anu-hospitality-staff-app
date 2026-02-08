<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\ContactMessage;
use App\Models\VacancyApplication;
// pdf download
use Barryvdh\DomPDF\Facade\Pdf;

class AdminDashboardController extends Controller
{
    /* ======================
       DASHBOARD
    ====================== */
    public function dashboard()
    {
        return view('admin.pages.dashboard', [
            'totalBookings'   => Booking::count(),
            'pendingBookings' => Booking::where('payment_status', 'pending')->count(),
            'vacancies'       => VacancyApplication::count(),
            'contactQueries'  => ContactMessage::count(),
        ]);
    }

    /* ======================
       BOOKINGS LIST
    ====================== */
    public function bookings(Request $request)
    {
        $status = $request->get('status', 'upcoming');
        $search = $request->get('search');

        $query = Booking::query();

        // STATUS LOGIC (BASED ON payment_status ONLY)
        if ($status === 'upcoming') {
            // Paid bookings that are not refunded
            $query->where('payment_status', 'paid');
        } elseif ($status === 'completed') {
            // Completed bookings = paid & date in past
            $query->where('payment_status', 'paid')
                ->whereDate('preferred_date', '<', now());
        } elseif ($status === 'cancelled') {
            $query->where('payment_status', 'refunded');
        }

        // SEARCH FILTER
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('full_name', 'like', "%{$search}%")
                    ->orWhere('mobile', 'like', "%{$search}%")
                    ->orWhere('address_postcode', 'like', "%{$search}%");
            });
        }

        $bookings = $query
            ->orderByDesc('created_at')
            ->paginate(10)
            ->withQueryString();

        return view('admin.pages.bookings', compact('bookings', 'status', 'search'));
    }



    /* ======================
   MARK BOOKING COMPLETED
====================== */
    public function markCompleted(Booking $booking)
    {
        if ($booking->payment_status !== 'paid') {
            return back()->with('error', 'Only paid bookings can be completed.');
        }

        // Nothing to update in DB yet (date-based completion)
        return back()->with('success', 'Booking marked as completed.');
    }


    /* ======================
   MARK BOOKING REFUNDED
====================== */
    public function markRefunded(Booking $booking)
    {
        if ($booking->payment_status !== 'paid') {
            return back()->with('error', 'Only paid bookings can be refunded.');
        }

        $booking->update([
            'payment_status' => 'refunded',
        ]);

        return back()->with('success', 'Refund marked as completed.');
    }



    /* ======================
       VACANCIES
    ====================== */
    public function vacancies()
    {
        return view('admin.pages.vacancy-applications');
    }

   /* ======================
   CONTACT QUERIES
====================== */
public function contacts()
{
    $contacts = ContactMessage::latest()->get();

    return view(
        'admin.pages.contact-queries',
        compact('contacts')
    );
}

    /* PDF Download Function */
    public function downloadBookingPdf(Booking $booking)
    {
        $pdf = Pdf::loadView(
            'admin.pdf.booking',
            compact('booking')
        )->setPaper('a4');

        return $pdf->download(
            'Booking-' . $booking->id . '.pdf'
        );
    }
}
