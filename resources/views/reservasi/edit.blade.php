@extends('layout.navbar')

@section('content')
<div class="container mt-5">
    <h2>Edit Reservasi</h2>
    <form action="{{ route('reservasi.update', $reservasi->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Tamu</label>
            <input type="text" class="form-control" id="nama" name="nama" style="border-radius: 16px" value="{{ old('nama', $reservasi->nama) }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" style="border-radius: 16px" value="{{ old('email', $reservasi->email) }}" required>
        </div>

        <div class="mb-3">
            <label for="nohp" class="form-label">Nomor Handphone</label>
            <input type="number" class="form-control" id="nohp" name="nohp" style="border-radius: 16px" value="{{ old('nohp', $reservasi->nohp) }}" required>
        </div>

        <div class="mb-3">
            <label for="checkin" class="form-label">Tanggal Check-in</label>
            <input type="date" class="form-control" id="checkin" name="checkin" style="border-radius: 16px" value="{{ old('checkin', $reservasi->checkin) }}" required>
        </div>

        <div class="mb-3">
            <label for="checkout" class="form-label">Tanggal Check-out</label>
            <input type="date" class="form-control" id="checkout" name="checkout" style="border-radius: 16px" value="{{ old('checkout', $reservasi->checkout) }}" required>
        </div>

        <div class="mb-3">
            <label for="kamar_id" class="form-label">Tipe Kamar</label>
            <select class="form-control" id="kamar_id" name="kamar_id" style="border-radius: 16px" required>
                <option value="" disabled selected>Pilih tipe kamar</option>
                @foreach($kamar as $kamar)
                    <option value="{{ $kamar->id }}" {{ old('kamar_id', $reservasi->kamar_id) == $kamar->id ? 'selected' : '' }}>
                        {{ ucfirst($kamar->jeniskamar) }} - Rp{{ number_format($kamar->harga, 0, ',', '.') }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3" hidden>
            <label for="jumlah_tamu" class="form-label">Jumlah Tamu</label>
            <input type="number" class="form-control" id="jumlah_tamu" name="jumlah_tamu" style="border-radius: 16px" value="{{ old('jumlah_tamu', $reservasi->jumlah_tamu) }}" required>
        </div>
        <button type="submit" class="btn btn-warning" style="border-radius: 16px">Update</button>
        <a href="{{ route('reservasi.index') }}" class="btn btn-secondary" style="border-radius: 16px">Batal</a>
    </form>
</div>
@endsection
