<?php

namespace App\Http\Controllers;

use App\Models\User;
use GuzzleHttp\Psr7\Request;

class AkunController extends Controller
{
    /**
     * Display a listing of the users.
     */
    public function index()
    {
        if (auth()->user()->email === 'palembang.reservasion@hayohotels.com') {
            $users = User::all();
        } else {
            $users = User::where('id', auth()->id())->get();
        }
        return view('akun.index', compact('users'));
    }

    /**
     * Show the form for creating a new user.
     */
    public function create()
    {
        return view('akun.create');
    }

    /**
     * Store a newly created user in storage.
     */
    public function store(Request  $request)
    {
    }

    /**
     * Show the form for editing the specified user.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('akun.edit', compact('user'));
    }

    /**
     * Update the specified user in storage.
     */
    public function update(Request $request, $id)
    {
        return redirect()->route('akun.index')->with('success', 'User updated successfully.');
    }

}