@extends('layout.navbar')

@section('content')
<div class="container-fluid py-5">
    <h1>Daftar Akun</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $key => $user)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
                <td>
                    <a href="{{ route('akun.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit Akun</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
