<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class DbuserController extends Controller
{
    public function index()
    {
        $room = Room::all();
        if (auth()->user()->role == 'admin') {
            return redirect('dbadmin');
        } elseif (auth()->user()->role == 'user') {
            return view('dashboard.dbuser', compact('room'));
        }
        return redirect()->route('log')->with('error', 'Unauthorized access');
    }
}
