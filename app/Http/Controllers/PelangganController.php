<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pelanggan = Pelanggan::all();
        $user = User::where('role', 'user')->get();
        $allPelanggan = $pelanggan->merge($user);
        return view('pelanggan.index', compact('pelanggan', 'user', 'allPelanggan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('pelanggan.index')->with('error', 'You do not have permission to create a pelanggan.');
        }
        return view('pelanggan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pelanggan = new Pelanggan();
        $pelanggan->name = $request->name;
        $pelanggan->email = $request->email;
        $pelanggan->hp = $request->hp;
        $pelanggan->save();
        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pelanggan $pelanggan)
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('pelanggan.index')->with('error', 'You do not have permission to edit this pelanggan.');
        }
        $pelanggan = Pelanggan::findOrFail($pelanggan->id);
        return view('pelanggan.edit', compact('pelanggan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pelanggan $pelanggan)
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('pelanggan.index')->with('error', 'You do not have permission to update this pelanggan.');
        }
        $pelanggan->name = $request->name;
        $pelanggan->email = $request->email;
        $pelanggan->hp = $request->hp;
        $pelanggan->save();
        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pelanggan $pelanggan)
    {
        //
    }
}
