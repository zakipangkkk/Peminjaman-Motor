<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    public function index()
    {
        $penyewaan = Booking::with(['motor', 'user'])
            ->latest()
            ->get();

        return view('booking.index', compact('penyewaan'));
    }
}
