@extends('layout.navbar')

@section('content')
<div class="container my-4 d-flex" style="gap: 20px;">
    <!-- Bagian Check In/Out -->
    <div class="flex-grow-1" style="background-color: #f3cf30; padding: 20px; border-radius: 10px;">
        <h3 class="text-center mb-4" style="color: #000000;">Check In/Out</h3>
        <!-- Tombol Tambah -->
        <div class="mb-3 text-end">
            <a href="#" class="btn btn-dark">Tambah Transaksi</a>
        </div>

        <!-- Tabel Transaksi Kamar -->
        <div class="table-responsive p-3" style="border-radius: 10px; background-color: rgba(255, 255, 255, 0.87); box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Tipe Kamar</th>
                        <th>Nomor Kamar</th>
                        <th>Check-In - Check-Out</th>
                        <th align="center">Harga / Malam</th>
                        <th align="center">Total Harga</th>
                        <th align="center">Status</th>
                        <th align="center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Contoh data statis, ganti dengan @foreach jika sudah ada data dari controller --}}
                    <tr>
                        <td align="center">1</td>
                        <td align="center">Kamar Standar</td>
                        <td align="center">101</td>
                        <td align="center">2024-06-01 - 2024-06-03</td>
                        <td align="center">Rp 500.000</td>
                        <td align="center">Rp 1.000.000</td>
                        <td align="center"><span class="badge bg-success">Selesai</span></td>
                        <td align="center">
                            <a href="#" class="btn btn-warning btn-sm">Edit</a>
                        </td>
                    </tr>
                    {{-- End contoh data --}}
                </tbody>
            </table>
        </div>
    </div>

    <!-- Informasi Akun -->
    <div class="account-info p-4" style="width: 300px; background-color: #bbbbbb; border-radius: 10px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);">
        <h5 class="text-center">Informasi Akun</h5>
        <hr>
        <p><strong>Nama:</strong> {{ Auth::user()->name }}</p>
        <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
        {{-- <p><strong>Status:</strong> Pegawai</p> --}}
        <a href="#" class="btn btn-warning w-100">Edit Profil</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
@endsection
