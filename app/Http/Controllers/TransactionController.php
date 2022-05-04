<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Payment\TripayController;
use App\Models\Room;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function store(Request $request)
    {
        $roomsData = Room::find($request->rooms_id);
        $method = $request->method;

        $tripay = new TripayController();
        $tripay->requestTransaction($method, $roomsData);
    }
}
