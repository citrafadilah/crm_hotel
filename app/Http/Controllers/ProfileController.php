<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Reservasi;
use App\Models\User;
use finfo;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display the user's profile.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $reservasi = Reservasi::where('email', auth()->user()->email)
            ->where('status', '!=', 'cancelled')
            ->count();
        return view('profile.index', compact('reservasi'));
    }

    /**
     * Show the form for editing the user's profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        if (auth()->id() != $id) {
            return redirect()->route('profile.index')->with('error', 'Anda tidak memiliki izin untuk mengedit profil ini.');
        }
        $user = User::findOrFail($id);
        return view('profile.edit', compact('user'));
    }

    /**
     * Update the user's profile.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        if (auth()->id() != $id) {
            return redirect()->route('profile.index')->with('error', 'Anda tidak memiliki izin untuk mengedit profil ini.');
        }
        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->hp = $request->input('hp');
        if ($request->has('password') && $request->input('password') !== '') {
            $user->password = bcrypt($request->input('password'));
        }
        $user->save();
        return redirect()->route('profile.index')->with('success', 'Profile updated successfully.');
    }
}
