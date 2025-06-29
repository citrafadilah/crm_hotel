@extends('layout.navbar')

@section('content')
<div class="container my-5">
    <h2>Tambah Kamar</h2>
    <form action="{{ route('room.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="jeniskamar" class="form-label">Jenis Kamar</label>
            <input type="text" class="form-control" id="jeniskamar" name="jeniskamar" required style="border-radius: 16px;">
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" required style="border-radius: 16px;" onkeydown="return event.key !== '.' && event.key !== ',';">
        </div>
        <div class="mb-3">
            <label for="jmlhorang" class="form-label">Jumlah Orang</label>
            <input type="number" class="form-control" id="jmlhorang" name="jmlhorang" required style="border-radius: 16px;">
        </div>
        <div class="mb-3">
            <label for="catatan" class="form-label">Catatan</label>
            <textarea class="form-control" id="catatan" name="catatan" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="jmlhkamar" class="form-label">Jumlah Kamar</label>
            <input type="number" class="form-control" id="jmlhkamar" name="jmlhkamar" required style="border-radius: 16px;">
        </div>
        <button type="submit" class="btn btn-warning" style="border-radius: 16px">Simpan</button>
        <a href="{{ route('room.index') }}" class="btn btn-secondary" style="background-color: black; border-radius: 16px;">Batal</a>
    </form>
</div>
@endsection
