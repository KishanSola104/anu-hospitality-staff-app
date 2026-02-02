<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function domestic(Request $request)
    {
        $postcode = $request->query('postcode');

        return view('bookings.booking', compact('postcode'));
    }
}
