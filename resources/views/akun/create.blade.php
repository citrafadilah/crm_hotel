@extends('layout.navbar')

@section('content')
<div class="container py-5">
    <h1>Buat Akun Baru</h1>
    <form action="{{ route('akun.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" name="name" id="name" class="form-control" style="border-radius: 16px" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" style="border-radius: 16px" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" style="border-radius: 16px" required>
        </div>
        <div class="form-group">
            <label for="role">Role</label>
            <select name="role" id="role" class="form-control" style="border-radius: 16px" required>
                <option value="admin">Admin</option>
            </select>
        </div>
        <button type="submit" class="btn btn-warning" style="border-radius: 16px">Simpan</button>
    </form>
</div>
@endsection