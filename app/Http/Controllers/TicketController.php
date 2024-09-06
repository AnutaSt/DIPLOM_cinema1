<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function __invoke(Request $request)
    {
        foreach ($request->request as $key => $value) {
            if ($value == 'on') {
                $places[] = $key;
            }
        }
        if (! isset($places)) {
            $request->validate([
                'movie_title' => 'min:99999',
            ]);
        }

        return view('ticket', [
            'movieTitle' => $request->movie_title,
            'movieTime' => $request->movie_time,
            'movieHall' => $request->movie_hall,
            'places' => $places,
        ]);
    }
}
