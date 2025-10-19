<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Booking;


class RiwayatController extends Controller
{
    public function index()
    {
        $data = Booking::all();
        return view('riwayat-booking.index', compact('data'));
    }
}
