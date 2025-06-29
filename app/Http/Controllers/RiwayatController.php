<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;
use App\Models\Riwayat;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $riwayat = Riwayat::all();
        $reservasi = Reservasi::where('status', 'checkout')->get();
        $user = auth()->user();
        if ($user->role == 'admin') {
            $riwayat = Riwayat::with('reservasi')->get();
        } else {
            $riwayat = Riwayat::where('reservasi_id', $user->email)->with('reservasi')->get();
        }
        return view('riwayat.index', compact('riwayat', 'reservasi', 'user'));
    }

    public function show()
    {
        $riwayat = Riwayat::all();
        $totalpendapatan = Reservasi::where('status', 'checkout')->sum('total');
        return view('riwayat.show', compact('riwayat',));
    }

    public function print()
    {
        $mpdf = new \Mpdf\Mpdf();
        $riwayat = Riwayat::all();
        $totalpendapatan = Reservasi::where('status', 'checkout')->sum('total');
        $html = view("riwayat.show", ['riwayat' => $riwayat], ['totalpendapatan' => $totalpendapatan])->render();
        $mpdf->WriteHTML($html);
        $mpdf->Output('riwayat_' . date('Y_m') . '.pdf', 'I');
    }
}
