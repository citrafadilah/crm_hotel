<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use Illuminate\Http\Request;

class DbuserController extends Controller
{
    public function index()
    {
        $kamar = Kamar::all();
        if (auth()->user()->role == 'admin') {
            return redirect('dbadmin');
        } elseif (auth()->user()->role == 'user') {
            return view('dashboard.dbuser', compact('kamar'));
        }
        return redirect()->route('log')->with('error', 'Unauthorized access');
    }
}
