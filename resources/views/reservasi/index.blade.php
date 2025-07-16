@extends('layout.navbar')

@section('content')
    <div class="container py-5">
        <div class="alert alert-info mb-4" style="border-radius: 16px;">
            <strong>Informasi Rekening Pembayaran:</strong><br>
            Bank: BCA<br>
            No. Rekening: 1234567890<br>
            Atas Nama: Hayo Hotel Palembang<br>
        </div>
        <div class="my-2" align="right">
            <a href="{{ url('riwayat') }}" class="btn btn-secondary" style="border-radius: 16px;">
                    <i class="bi bi-clock-history"></i> Riwayat
            </a>
        </div>
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold">Reservasi Kamar Hotel</h2>
            <a href="{{ route('reservasi.create') }}" class="btn btn-lg btn-warning" style="border-radius: 16px;">
                <i class="bi bi-plus-circle"></i> Tambah Reservasi
            </a>
        </div>
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
        <div class="card shadow-sm bg-warning" style="border-radius: 16px;">
            <div class="card-body">
                <table class="table table-hover align-center text-light"
                    style="border-radius: 16px; background-color: black;">
                    <thead class="text-center">
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>Nomor Telpon</th>
                            <th>Tipe Kamar</th>
                            <th>Tanggal Check-in</th>
                            <th>Tanggal Check-out</th>
                            <th>Total Harga</th>
                            <th>Bukti Pembayaran</th>
                            <th>Status</th>
                            @if(Auth::check() && Auth::user()->role == 'admin')
                                <th>Updated By</th>
                            @endif
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider align-middle text-center table-striped">
                        @forelse($reservasi as $index => $reservasi)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $reservasi->nama }}</td>
                                <td>{{ $reservasi->nohp }}</td>
                                <td>{{ $reservasi->room->jeniskamar }}

                                    <br>
                                    <span class="badge text-light" style="font-size: 0.8em;">
                                        {{ $reservasi->room->catatan}}
                                    </span>

                                </td>

                                <td>{{ $reservasi->checkin }}</td>
                                <td>{{ $reservasi->checkout }}</td>
                                <td>Rp{{ number_format($reservasi->total, 0, ',', '.') }}
                                </td>
                                <td>
                                    @if ($reservasi->bukti_bayar)
                                        <a href="{{ asset('buktiPembayaran/' . $reservasi->bukti_bayar) }}" target="_blank"
                                            class="btn btn-sm btn-info">
                                            <i class="bi bi-file-earmark-pdf"></i> Lihat Bukti
                                        </a>
                                    @else
                                        <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal"
                                            data-bs-target="#uploadBuktiModal{{ $reservasi->id }}">
                                            <i class="bi bi-upload"></i> Upload Bukti
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="uploadBuktiModal{{ $reservasi->id }}" tabindex="-1"
                                            aria-labelledby="uploadBuktiLabel{{ $reservasi->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="{{ route('reservasi.uploadBukti', $reservasi->id) }}"
                                                        method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="uploadBuktiLabel{{ $reservasi->id }}">Upload Bukti
                                                                Pembayaran</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <input type="file" name="bukti_bayar"
                                                                accept="application/pdf,image/*" required
                                                                class="form-control mb-2">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-success">
                                                                <i class="bi bi-upload"></i> Upload
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    @if ($reservasi->status == 'confirmed')
                                        <span class="badge bg-success" style="border-radius: 16px;">Confirmed</span>
                                    @elseif($reservasi->status == 'checkin')
                                        <span class="badge bg-primary" style="border-radius: 16px;">Check-in</span>
                                    @elseif($reservasi->status == 'checkout')
                                        <span class="badge bg-danger text-dark"
                                            style="border-radius: 16px;">Check-out</span>
                                    @else
                                        <span class="badge bg-secondary"
                                            style="border-radius: 16px;">{{ ucfirst($reservasi->status) }}</span>
                                    @endif
                                </td>
                                @if(Auth::check() && Auth::user()->role == 'admin')
                                    <td>
                                        @if ($reservasi->updated_by)
                                            {{ $reservasi->updated_by }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                @endif
                                <td>
                                    @if (auth()->user()->role == 'admin' || auth()->user()->email == $reservasi->email || $reservasi->status == 'pending')
                                        <a href="{{ route('reservasi.edit', $reservasi->id) }}"
                                            class="btn btn-sm btn-warning">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                    @endif
                                    @if (auth()->user()->role == 'user' && auth()->user()->email == $reservasi->email && $reservasi->status == 'pending')
                                        <form action="{{ route('reservasi.cancelled', $reservasi->id) }}" method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('Yakin ingin membatalkan reservasi ini?')">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="bi bi-x-circle"></i> Batalkan
                                            </button>
                                        </form>
                                    @endif
                                    @if (auth()->user()->role == 'admin')
                                        @if ($reservasi->status == 'pending')
                                            <form action="{{ route('reservasi.confirm', $reservasi->id) }}" method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Yakin ingin mengkonfirmasi reservasi ini?')">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-success">
                                                    <i class="bi bi-check2"></i> Konfirmasi
                                                </button>
                                            </form>
                                            <form action="{{ route('reservasi.cancelled', $reservasi->id) }}" method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Yakin ingin menolak reservasi ini?')">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="bi bi-x-circle"></i> Tolak
                                                </button>
                                            </form>
                                        @elseif($reservasi->status == 'confirmed')
                                            <form action="{{ route('reservasi.checkin', $reservasi->id) }}" method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Yakin ingin check-in reservasi ini?')">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-primary">
                                                    <i class="bi bi-door-open"></i> Check-in
                                                </button>
                                            </form>
                                        @elseif($reservasi->status == 'checkin')
                                            <form action="{{ route('reservasi.checkout', $reservasi->id) }}" method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Yakin ingin check-out reservasi ini?')">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="bi bi-door-closed"></i> Check-out
                                                </button>
                                            </form>
                                        @endif
                                    @endif
                                    @if ($reservasi->status == 'confirmed' || $reservasi->status == 'checkin' || $reservasi->status == 'checkout')
                                        <a href="{{ route('reservasi.downloadReceipt', $reservasi->id) }}" class="btn btn-sm btn-secondary">
                                            <i class="bi bi-download"></i> Download Receipt
                                        </a>
                                    @else
                                        <span class="text-warning small d-block mt-2">*Belum dikonfirmasi</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted">Belum ada data reservasi.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="mt-3">
                    {{-- {{ $reservasi->links() }} --}}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
@endpush
