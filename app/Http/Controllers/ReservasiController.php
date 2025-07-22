<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;
use App\Models\Riwayat;
use App\Models\Kamar;
use App\Models\User;
use Illuminate\Http\Request;
use mPDF;

class ReservasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kamar = Kamar::all();
        $user = auth()->user();
        if ($user->role == 'admin') {
            $reservasi = Reservasi::with('kamar')
            ->where('status', '!=', 'checkout')
            ->orderBy('updated_at', 'asc')
            ->get();
        } else {
            $reservasi = Reservasi::where('email', $user->email)
                ->where('status', '!=', 'checkout')
                ->with('kamar')
                ->orderBy('updated_at', 'asc')
                ->get();
        }
        return view('reservasi.index', compact('reservasi', 'kamar', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth()->user();
        $kamar = Kamar::all();
        // $reservasi = Reservasi::where('user_id', $user->id)->get();
        return view('reservasi.create', compact('user', 'kamar'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = User::find(auth()->id());
        $reservasi = new Reservasi();
        $reservasi->nama = $request->nama;
        $reservasi->email = $user->email;
        $reservasi->nohp = $request->nohp;
        $reservasi->checkin = $request->checkin;
        $reservasi->checkout = $request->checkout;
        $reservasi->kamar_id = $request->kamar_id;
        $reservasi->status = 'pending';

        $checkin = \Carbon\Carbon::parse($request->checkin);
        $checkout = \Carbon\Carbon::parse($request->checkout);
        $days = $checkin->diffInDays($checkout);
        if ($days == 0) {
            $days = 1; // Minimal 1 hari
        }
        $kamar = Kamar::find($request->kamar_id);
        $reservasi->total = $kamar->harga * $days;
        $reservasi->updated_by = $user->name;

        $reservasi->save();
        return redirect()->route('reservasi.index')->with('success', 'Reservasi berhasil dibuat.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservasi $reservasi)
    {
        $user = auth()->user();
        $kamar = Kamar::all();
        $reservasi = Reservasi::with('kamar')->findOrFail($reservasi->id);
        if ($user->role != 'admin' && $reservasi->email != $user->email && $reservasi->status != 'pending') {
            return redirect()->route('reservasi.index')->with('error', 'You do not have permission to edit this reservation.');
        }

        return view('reservasi.edit', compact('reservasi', 'kamar', 'user'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservasi $reservasi)
    {
        $user = auth()->user();
        if ($user->role != 'admin' && $reservasi->email != $user->email && $reservasi->status != 'pending') {
            return redirect()->route('reservasi.index')->with('error', 'You do not have permission to update this reservation.');
        }
        $reservasi->nama = $request->nama;
        $reservasi->email = $request->email;
        $reservasi->nohp = $request->nohp;
        $reservasi->checkin = $request->checkin;
        $reservasi->checkout = $request->checkout;
        $reservasi->kamar_id = $request->kamar_id;
        $reservasi->status = 'pending';
        $reservasi->save();
        return redirect()->route('reservasi.index')->with('success', 'Reservasi berhasil diperbarui.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservasi $reservasi)
    {
        $user = auth()->user();
        $kamar = Kamar::all();
        if ($user->role == 'admin') {
            $reservasi = Reservasi::with('kamar')->findOrFail($reservasi->id);
        } else {
            $reservasi = Reservasi::where('email', $user->email)->with('kamar')->findOrFail($reservasi->id);
        }
        return view('reservasi.show', compact('reservasi', 'kamar', 'user'));
    }
    /**
     * Download the reservation receipt.
     */
    public function downloadReceipt($id)
    {
        $mpdf = new \Mpdf\Mpdf();
        $reservasi = Reservasi::with('kamar')->findOrFail($id);
        $mpdf->WriteHTML(view('reservasi.show', [
            'reservasi' => $reservasi,
        ]));
        $mpdf->Output('receipt_' . $reservasi->bukti_bayar . '.pdf', 'I'); // Download the PDF


    }


    /**
     * Approve the reservation.
     */
    public function confirm($id)
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('reservasi.index')->with('error', 'You do not have permission to approve this reservation.');
        }
        $reservasi = Reservasi::findOrFail($id);
        $reservasi->status = 'confirmed';
        $reservasi->updated_by = auth()->user()->name;
        $reservasi->save();

        // Update kamar availability
        $kamar = Kamar::find($reservasi->kamar_id);
        if ($kamar) {
            $kamar->jmlhkamar -= 1; // Decrease the number of available kamars
            $kamar->save();
        }

        return redirect()->route('reservasi.index')->with('success', 'Reservasi berhasil diterima.');
    }

    /**
     * Check in the reservation.
     */
    public function checkin($id)
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('reservasi.index')->with('error', 'You do not have permission to check in this reservation.');
        }
        $reservasi = Reservasi::findOrFail($id);
        $reservasi->status = 'checkin';
        $reservasi->updated_by = auth()->user()->name;
        $reservasi->save();
        return redirect()->route('reservasi.index')->with('success', 'Check-in berhasil.');
    }
    /**
     * Check out the reservation.
     */
    public function checkout($id)
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('reservasi.index')->with('error', 'You do not have permission to check out this reservation.');
        }
        $reservasi = Reservasi::findOrFail($id);
        $reservasi->status = 'checkout';
        $reservasi->updated_by = auth()->user()->name;
        $reservasi->save();

        // Update kamar availability
        $kamar = Kamar::find($reservasi->kamar_id);
        if ($kamar) {
            $kamar->jmlhkamar += 1; // Increase the number of available kamars
            $kamar->save();
        }

        if ($reservasi->status == 'checkout') {

            $riwayat = Riwayat::create([
                'reservasi_id' => $reservasi->id,
            ]);
            $riwayat->save();
        }

        return redirect()->route('reservasi.index')->with('success', 'Check-out berhasil.');
    }

    /**
     * Upload a file for the reservation.
     */
    public function uploadBukti(Request $request, $id)
    {
        $reservasi = Reservasi::findOrFail($id);
        if ($request->hasFile('bukti_bayar')) {
            $file = $request->file('bukti_bayar');
            $filename = 'HHR' . mt_rand(1000000000, 9999999999) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('buktiPembayaran'), $filename);
            $reservasi->bukti_bayar = $filename;
            $reservasi->save();
        }
        return redirect()->route('reservasi.index')->with('success', 'Bukti pembayaran berhasil diunggah.');
    }

    /**
     * Cancel the reservation.
     */
    public function cancelled($id)
    {
        $reservasi = Reservasi::findOrFail($id);
        if ($reservasi->status != 'pending') {
            return redirect()->route('reservasi.index')->with('error', 'Reservasi tidak dapat dibatalkan karena sudah dalam status ' . $reservasi->status);
        }
        $reservasi->status = 'cancelled';
        $reservasi->updated_by = auth()->user()->name;
        $reservasi->save();

        return redirect()->route('reservasi.index')->with('success', 'Reservasi dibatalkan.');
    }
}
