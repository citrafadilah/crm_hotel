@extends('layout.navbar')

@section('content')
<div class="container my-5" style="border-radius: 16px; background-color: #f3cf30; padding: 20px;">
    <h1>Daftar Kamar</h1>
    <a href="{{ route('room.create') }}" class="btn btn-warning mb-3" style="border-radius: 16px; border-color: black">Tambah Kamar</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table text-light table-bordered" style="border-radius: 16px; overflow: hidden; background-color: black;">
        <thead>
            <tr>
                <th>No</th>
                <th>jenis Kamar</th>
                <th>Harga</th>
                <th>Catatan</th>
                <th>Jumlah Kamar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($room as $index => $room)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $room->jeniskamar }}</td>
                <td>Rp{{ number_format($room->harga, 0, ',', '.') }}</td>
                <td>{{ $room->catatan }}</td>
                <td>{{ $room->jmlhkamar }}</td>
                <td>
                    <a href="{{ route('room.edit', $room->id) }}" class="btn btn-warning btn-sm" style="border-radius: 16px; background-color: #f3cf30;">Edit</a>
                    <form action="{{ route('room.destroy', $room->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm text-light" style="border-radius: 16px; background-color: #ff0000" onclick="return confirm('Yakin hapus kamar ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">Tidak ada data kamar.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
