<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;
use App\Models\Kamar;
use Illuminate\Http\Request;

use function Laravel\Prompts\error;

class DbadminController extends Controller
{
    public function index()
    {
        $kamar = Kamar::all();
        $reservasi = Reservasi::all();
        $today = now()->toDateString();
        $reservasibaru = Reservasi::where('status', 'pending')
            ->whereDate('created_at', $today)
            ->count();
        $checkin = Reservasi::where('status', 'checkin')
            ->whereDate('checkin', $today)
            ->count();
        $checkout = Reservasi::where('status', 'checkout')
            ->whereDate('checkout', $today)
            ->count();

        $totalKamars = Kamar::select('jmlhkamar')->sum('jmlhkamar') - 35;
        $availableDouble = Kamar::where('jeniskamar', 'like', '%Double%')
            ->sum('jmlhkamar')-20;
        $availableTwin = Kamar::where('jeniskamar', 'like', '%Twin%')
            ->sum('jmlhkamar')-15;

        if (auth()->user()->role !== 'admin') {
            return error('You do not have permission to access this page.');
        }
        return view('dashboard.dbadmin', compact('kamar', 'totalKamars', 'reservasi', 'reservasibaru', 'today', 'checkin', 'checkout', 'availableDouble', 'availableTwin'));
    }
}
