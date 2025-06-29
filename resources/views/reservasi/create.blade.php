@extends('layout.navbar')

@section('content')
    <style>
        body {
            background-image: url('{{ asset('temp/img/hotel2.jpeg') }}');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            backdrop-filter: blur(5px);
        }
    </style>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-6">
            {{-- Card Detail Kamar --}}
            @if(request()->has('room_id') && isset($room) && $room->count())
                @php $detail = $room->first(); @endphp
                <div class="card mb-4 shadow" style="border-radius: 16px;">
                    <img src="{{ asset('temp/img/' . ($detail->jeniskamar == 'Smart Room Double' ? 'double.jpeg' : ($detail->jeniskamar == 'Smart Room Twin' ? 'twin.jpeg' : 'suite.jpeg'))) }}" class="card-img-top" alt="{{ $detail->jeniskamar }}" style="border-top-left-radius: 16px; border-top-right-radius: 16px; height: 220px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">{{ ucfirst($detail->jeniskamar) }}</h5>
                        <p class="card-text mb-1"><strong>Harga:</strong> Rp{{ number_format($detail->harga, 0, ',', '.') }}</p>
                        <p class="card-text mb-1"><strong>Fasilitas:</strong> {{ $detail->catatan ?? '-' }}</p>
                    </div>
                </div>
            @endif
            <div class="card shadow-sm border-0" style="border-radius: 16px;">
                <div class="card-body p-4">
                    <h2 class="mb-4 text-center fw-bold">Buat Reservasi Baru</h2>
                    <form action="{{ route('reservasi.store') }}" method="POST" autocomplete="off">
                        @csrf
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control rounded-pill" id="nama" name="nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="nohp" class="form-label">Nomor Handphone</label>
                            <input type="number" class="form-control rounded-pill" id="nohp" name="nohp" required>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="checkin" class="form-label">Check-in</label>
                                <input type="date" class="form-control rounded-pill" id="checkin" name="checkin" required min="{{ now()->format('Y-m-d') }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="checkout" class="form-label">Check-out</label>
                                <input type="date" class="form-control rounded-pill" id="checkout" name="checkout" required min="{{now()->addDay(1)->format('Y-m-d')}}">
                            </div>
                        </div>
                        <div class="mb-4">
                            @if(request()->has('room_id') && isset($room) && $room->count())
                                <input type="number" hidden name="room_id" value="{{ $room->first()->id }}">
                                <label class="form-label">Tipe Kamar</label>
                                <input type="text" class="form-control rounded-pill" value="{{ ucfirst($room->first()->jeniskamar) }}" disabled>
                            @else
                                <label for="room_id" class="form-label">Tipe Kamar</label>
                                <select class="form-control rounded-pill" id="room_id" name="room_id" required>
                                    <option value="" disabled selected>Pilih tipe kamar</option>
                                    @foreach($room as $r)
                                        <option value="{{ $r->id }}">{{ ucfirst($r->jeniskamar) }} - {{$r->catatan}}</option>
                                    @endforeach
                                </select>
                            @endif
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-lg btn-dark rounded-pill shadow-sm">Reservasi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
