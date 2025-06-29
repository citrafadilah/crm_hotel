<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;
use App\Models\Room;
use Illuminate\Http\Request;

use function Laravel\Prompts\error;

class DbadminController extends Controller
{
    public function index()
    {
        $room = Room::all();
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

        $totalRooms = Room::select('jmlhkamar')->sum('jmlhkamar') - 35;
        $availableDouble = Room::where('jeniskamar', 'like', '%Double%')
            ->sum('jmlhkamar')-20;
        $availableTwin = Room::where('jeniskamar', 'like', '%Twin%')
            ->sum('jmlhkamar')-15;

        if (auth()->user()->role !== 'admin') {
            return error('You do not have permission to access this page.');
        }
        return view('dashboard.dbadmin', compact('room', 'totalRooms', 'reservasi', 'reservasibaru', 'today', 'checkin', 'checkout', 'availableDouble', 'availableTwin'));
    }
}
