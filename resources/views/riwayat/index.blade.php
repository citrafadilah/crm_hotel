@extends('layout.navbar')

@section('content')
    <div class="container py-5">
            @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" style="border-radius: 16px;">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 16px;">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

        <h2 class="mb-4 text-center" style="color: black;">Riwayat Pemesanan</h2>
        <div class="text-center mb-4">
                @if (auth()->user()->role === 'admin')
                    <a href="{{ url('riwayat-print') }}" class="btn btn-warning mb-4"
                        style="background: #FFD600; color: #111; border-radius: 16px;">Cetak Laporan</a>
                @endif
            <div class="table-responsive" style="max-height: 500px; overflow-y: auto; border-radius: 16px; background: #111;">
                <table class="table table-hover" style="background: #222; border-radius: 16px">
                    <thead class="text-center" style="background: #FFD600; color: #111; border-radius: 16px">
                        <tr style="background: #FFD600; color: #111;">
                            <th>#</th>
                            <th>Nama Tamu</th>
                            <th>Kamar</th>
                            <th>Tanggal Check-in</th>
                            <th>Tanggal Check-out</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody class="text-white">
                        @foreach ($riwayat as $index => $riwayat)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $riwayat->reservasi->nama }}</td>
                                <td>{{ $riwayat->reservasi->kamar->jeniskamar }}
                                    <br>
                                    <span class="badge text-light" style="font-size: 0.8em;">
                                        {{ $riwayat->reservasi->kamar->catatan }}
                                    </span>

                                </td>
                                <td>{{ $riwayat->reservasi->checkin }}</td>
                                <td>{{ $riwayat->reservasi->checkout }}</td>
                                <td>Rp. {{ number_format($riwayat->reservasi->total, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection

    @push('styles')
        <style>
            body {
                background: #111;
            }

            .table thead th {
                border: none;
            }

            .table tbody tr {
                transition: background 0.2s;
            }
        </style>
    @endpush
