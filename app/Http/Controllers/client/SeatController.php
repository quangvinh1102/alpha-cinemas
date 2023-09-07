<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Seat;
use Illuminate\Http\Request;

class SeatController extends Controller
{
    public function index() {
        $seat = Seat::all();
        return response()->json(['listSeat' => $seat]);

    }
}
