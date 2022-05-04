<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Payment\TripayController;
use App\Models\Room;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function dashboardPage()
    {
        return view('admin/dashboard');
    }

    public function createDataPage()
    {
        return view('admin/tambah-ruangan');
    }

    public function updateDataPage($id)
    {
        $roomsData = Room::findOrFail($id);

        return view('admin/perbarui-ruangan', compact('roomsData'));
    }

    public function roomListPage()
    {
        $roomsData = Room::all();

        return view('guest/list-ruangan', compact('roomsData'));
    }

    public function overviewPage($id)
    {
        $roomsData = Room::findOrFail($id);

        return view('guest/overview-ruangan', compact('roomsData'));
    }

    public function checkoutPage($id)
    {
        $tripay = new TripayController();
        $paymentChannels = $tripay->getPaymentChannels();

        $roomsData = Room::findOrFail($id);

        return view('guest/checkout', compact('roomsData', 'paymentChannels'));
    }

    public function transactionPage()
    {

        return view('guest/transaction');
    }
}
