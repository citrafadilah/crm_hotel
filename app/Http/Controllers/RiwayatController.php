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
        if (auth()->user()->email != 'palembang.reservasion@hayohotels.com') {
            return redirect()->route('riwayat.index')->with('error', 'Tidak memiliki akses!.');
        }

        $riwayat = Riwayat::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->get();
        $totalpendapatan = Reservasi::where('status', 'checkout')
            ->whereMonth('updated_at', date('m'))
            ->whereYear('updated_at', date('Y'))
            ->sum('total');
        return view('riwayat.show', compact('riwayat',));
    }

    public function print()
    {
        if (auth()->user()->email != 'palembang.reservasion@hayohotels.com') {
            return redirect()->route('riwayat.index')->with('error', 'Tidak memiliki akses!.');
        }

        $mpdf = new \Mpdf\Mpdf();
        $riwayat = Riwayat::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->get();
        $totalpendapatan = Reservasi::where('status', 'checkout')
            ->whereMonth('updated_at', date('m'))
            ->whereYear('updated_at', date('Y'))
            ->sum('total');
        $html = view("riwayat.show", ['riwayat' => $riwayat], ['totalpendapatan' => $totalpendapatan])->render();
        $mpdf->WriteHTML($html);
        $mpdf->Output('riwayat_' . date('Y_m') . '.pdf', 'I');
    }
}
