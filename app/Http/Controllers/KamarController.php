<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use Illuminate\Http\Request;

use function Laravel\Prompts\error;

class KamarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->email != 'palembang.reservasion@hayohotels.com') {
            return redirect()->route('kamar.index')->with('error', 'Unauthorized action.');
        }
        $kamar = Kamar::all();
        return view('kamar.index', compact('kamar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->user()->email != 'palembang.reservasion@hayohotels.com') {
            return redirect()->route('kamar.index')->with('error', 'Unauthorized action.');
        }
        return view('kamar.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (auth()->user()->email != 'palembang.reservasion@hayohotels.com') {
            return redirect()->route('kamar.index')->with('error', 'Unauthorized action.');
        }
        $kamar = new Kamar();
        $kamar->jeniskamar = $request->jeniskamar;
        $kamar->harga = $request->harga;
        $kamar->jmlhorang = $request->jmlhorang;
        $kamar->catatan = $request->catatan;
        $kamar->jmlhkamar = $request->jmlhkamar;
        $kamar->save();
        return redirect()->route('kamar.index')->with('success', 'Kamar successfully created.');
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
        if (auth()->user()->email != 'palembang.reservasion@hayohotels.com') {
            return redirect()->route('kamar.index')->with('error', 'Unauthorized action.');
        }
        $kamar = Kamar::findOrFail($id);
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }
        return view('kamar.edit', compact('kamar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (auth()->user()->email != 'palembang.reservasion@hayohotels.com') {
            return redirect()->route('kamar.index')->with('error', 'Unauthorized action.');
        }
        $kamar = Kamar::findOrFail($id);
        $kamar->jeniskamar = $request->jeniskamar;
        $kamar->harga = $request->harga;
        $kamar->jmlhorang = $request->jmlhorang;
        $kamar->catatan = $request->catatan;
        $kamar->jmlhkamar = $request->jmlhkamar;
        $kamar->save();
        return redirect()->route('kamar.index')->with('success', 'Kamar successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (auth()->user()->email != 'palembang.reservasion@hayohotels.com') {
            return redirect()->route('kamar.index')->with('error', 'Unauthorized action.');
        }
        $kamar = Kamar::findOrFail($id);
        $kamar->delete();
        return redirect()->route('kamar.index')->with('success', 'Kamar successfully deleted.');
    }
}
