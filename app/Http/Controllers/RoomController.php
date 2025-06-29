<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $room = Room::all();
        return view('room.index', compact('room'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }
        return view('room.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $room = new Room();
        $room->jeniskamar = $request->jeniskamar;
        $room->harga = $request->harga;
        $room->jmlhorang = $request->jmlhorang;
        $room->catatan = $request->catatan;
        $room->jmlhkamar = $request->jmlhkamar;
        $room->save();
        return redirect()->route('room.index')->with('success', 'Room successfully created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $room = Room::findOrFail($id);
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }
        return view('room.edit', compact('room'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $room = Room::findOrFail($id);
        $room->jeniskamar = $request->jeniskamar;
        $room->harga = $request->harga;
        $room->jmlhorang = $request->jmlhorang;
        $room->catatan = $request->catatan;
        $room->jmlhkamar = $request->jmlhkamar;
        $room->save();
        return redirect()->route('room.index')->with('success', 'Room successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $room = Room::findOrFail($id);
        $room->delete();
        return redirect()->route('room.index')->with('success', 'Room successfully deleted.');
    }
}
