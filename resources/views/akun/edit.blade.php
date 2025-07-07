@extends('layout.navbar')

@section('content')
<div class="container mt-5">
    <h2>Edit Akun</h2>
    <form action="{{ route('akun.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required>
        </div>

        {{-- <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
        </div> --}}

        <div class="mb-3">
            <label for="password" class="form-label">Password (Kosongkan jika tidak ingin mengubah)</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="mb-3">
            <label for="hp" class="form-label">Nomor Handphone</label>
            <input type="text" class="form-control" id="hp" name="hp" value="{{ old('hp', $user->hp) }}" required>
        </div>
        <button type="submit" class="btn btn-warning" style="border-radius: 16px">Simpan Perubahan</button>
        <a href="{{ route('akun.index') }}" class="btn btn-dark" style="background-color: #000; border-radius: 16px">Batal</a>
    </form>
</div>
@endsection
