<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParkingController extends Controller
{
    public function entryForm()
    {
        return view('parking.entry');
    }


}
