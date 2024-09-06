<?php

namespace App\Http\Controllers;

use App\Models\FilmSchedule;
use App\Models\Hall;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function __invoke($id)
    {
        $booking = FilmSchedule::find($id);

        return view('booking', [
            'booking' => $booking,
            'price' => Hall::find($booking->hall->id),
        ]);
    }
}
