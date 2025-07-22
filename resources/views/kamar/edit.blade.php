@extends('layout.navbar')

@section('content')
<div class="container my-5">
    <h2>Edit Kamar</h2>
    <form action="{{ route('kamar.update', $kamar->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="jeniskamar" class="form-label">Jenis Kamar</label>
            <input type="text" class="form-control" id="jeniskamar" name="jeniskamar" value="{{ old('jeniskamar', $kamar->jeniskamar) }}" required style="border-radius: 16px;">
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" value="{{ old('harga', $kamar->harga) }}" required style="border-radius: 16px;">
        </div>
        <div class="mb-3">
            <label for="jmlhorang" class="form-label">Jumlah Orang</label>
            <input type="number" class="form-control" id="jmlhorang" name="jmlhorang" value="{{ old('jmlhorang', $kamar->jmlhorang) }}" required style="border-radius: 16px;">
        </div>
        <div class="mb-3">
            <label for="catatan" class="form-label">Catatan</label>
            <textarea class="form-control" id="catatan" name="catatan" rows="3">{{ old('catatan', $kamar->catatan) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="jmlhkamar" class="form-label">Jumlah Kamar</label>
            <input type="number" class="form-control" id="jmlhkamar" name="jmlhkamar" value="{{ old('jmlhkamar', $kamar->jmlhkamar) }}" required style="border-radius: 16px;">
        </div>
        <button type="submit" class="btn btn-warning" style="border-radius: 16px">Update Kamar</button>
        <a href="{{ route('kamar.index') }}" class="btn btn-secondary" style="background-color: black; border-radius: 16px">Cancel</a>
    </form>
</div>
@endsection
