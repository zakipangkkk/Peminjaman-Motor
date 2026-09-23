<?php

namespace App\Http\Controllers;

use App\Models\Motor;
use App\Models\User;
use App\Models\Booking;

class DashboardController extends Controller
{
    public function index()
    {
        // Motor tersedia
        $motortersedia = Motor::where('status', 'tersedia')->count();

        // Motor sedang disewa
        $motorDisewa = Motor::where('status', 'disewa')->count();

        // Total seluruh motor
        $totalMotor = Motor::count();

        // Total pelanggan
        $totalUser = User::count();

        // Penyewaan terbaru
        $bookingTerbaru = Booking::with(['user', 'motor'])
            ->take(5)
            ->get();

        return view('admin.index', compact(
            'motortersedia',
            'motorDisewa',
            'totalMotor',
            'totalUser',
            'bookingTerbaru'
        ));
    }
}