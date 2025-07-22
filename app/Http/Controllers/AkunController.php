<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
        if (auth()->user()->email === 'palembang.reservasion@hayohotels.com') {
            return redirect()->route('akun.index')->with('error', 'Anda tidak memiliki izin untuk membuat akun.');
        }
        $users = new User();
        $users->name = $request->input('name');
        $users->email = $request->input('email');
        $users->password = bcrypt($request->input('password'));
        $users->role = $request->input('role');
        $users->hp = $request->input('hp');
        $users->save();

        return redirect()->route('akun.index')->with('success', 'Akun berhasil dibuat.');
    }

    /**
     * Show the form for editing the specified user.
     */
    public function edit($id)
    {
        // Check if the authenticated user is allowed to edit the user
        $user = User::findOrFail($id);
        return view('akun.edit', compact('user'));
    }

    /**
     * Update the specified user in storage.
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        // $user->email = $request->input('email');
        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }
        $user->hp = $request->input('hp');
        $user->save();

        return redirect()->route('akun.index')->with('success', 'Akun berhasil diperbarui.');
    }

}
