<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AksesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('dashboard.dbuser');
    }

    public function admin()
    {
        return view('dashboard.dbadmin');
    }

    public function user()
    {
        return view('dashboard.dbuser');
    }
}
