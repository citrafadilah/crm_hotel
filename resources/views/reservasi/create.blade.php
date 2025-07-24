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
                @if (request()->has('kamar_id') && isset($kamar) && $kamar->count())
                    @php $detail = $kamar->first(); @endphp
                    <div class="card mb-4 shadow" style="border-radius: 16px;">
                        <img src="{{ asset('temp/img/' . ($detail->jeniskamar == 'Smart Kamar Double' ? 'double.jpeg' : ($detail->jeniskamar == 'Smart Kamar Twin' ? 'twin.jpeg' : 'suite.jpeg'))) }}"
                            class="card-img-top" alt="{{ $detail->jeniskamar }}"
                            style="border-top-left-radius: 16px; border-top-right-radius: 16px; height: 220px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">{{ ucfirst($detail->jeniskamar) }}</h5>
                            <p class="card-text mb-1"><strong>Harga:</strong>
                                Rp{{ number_format($detail->harga, 0, ',', '.') }}</p>
                            <p class="card-text mb-1"><strong>Fasilitas:</strong> {{ $detail->catatan ?? '-' }}</p>
                        </div>
                    </div>
                @endif
                <div class="card shadow-sm border-0" style="border-radius: 16px;">
                    <div class="card-body p-4">
                        <h2 class="mb-4 text-center fw-bold">Buat Reservasi Baru</h2>
                        <form action="{{ route('reservasi.store') }}" method="POST" autocomplete="off">
                            @csrf
                            @if (auth()->user()->role == 'admin')
                                <div class="mb-3">
                                    <label for="pelanggan_id" class="form-label">Pilih Pelanggan</label>
                                    <select class="form-control rounded-pill" id="pelanggan_id" name="pelanggan_id" required
                                        onchange="isiDataPelanggan(this)">
                                        <option value="" disabled selected>Pilih pelanggan</option>
                                        @foreach ($allPelanggan as $p)
                                            <option value="{{ $p->id }}" data-nama="{{ $p->name }}"
                                                data-email="{{ $p->email }}" data-nohp="{{ $p->hp }}">
                                                {{ $p->name }} - {{ $p->email }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control rounded-pill" id="nama" name="nama"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control rounded-pill" id="email" name="email"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="nohp" class="form-label">Nomor Handphone</label>
                                    <input type="tel" class="form-control rounded-pill" id="nohp" name="nohp"
                                        required pattern="[0-9]{10,13}"
                                        title="Nomor handphone harus terdiri dari 10 hingga 13 digit angka">
                                </div>
                                <script>
                                    function isiDataPelanggan(select) {
                                        var selected = select.options[select.selectedIndex];
                                        document.getElementById('nama').value = selected.getAttribute('data-nama') || '';
                                        document.getElementById('email').value = selected.getAttribute('data-email') || '';
                                        document.getElementById('nohp').value = selected.getAttribute('data-nohp') || '';
                                    }
                                </script>
                            @else
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control rounded-pill" id="nama" name="nama"
                                        required value="{{ auth()->user()->name }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control rounded-pill" id="email" name="email"
                                        required value="{{ auth()->user()->email }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="nohp" class="form-label">Nomor Handphone</label>
                                    <input type="tel" class="form-control rounded-pill" id="nohp" name="nohp"
                                        required pattern="[0-9]{10,13}"
                                        title="Nomor handphone harus terdiri dari 10 hingga 13 digit angka"
                                        value="{{ auth()->user()->hp ?? '' }}" readonly>
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="checkin" class="form-label">Check-in</label>
                                    <input type="date" class="form-control rounded-pill" id="checkin" name="checkin"
                                        required min="{{ now()->format('Y-m-d') }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="checkout" class="form-label">Check-out</label>
                                    <input type="date" class="form-control rounded-pill" id="checkout" name="checkout"
                                        required min="{{ now()->addDay(1)->format('Y-m-d') }}">
                                </div>
                            </div>
                            <div class="mb-4">
                                @if (request()->has('kamar_id') && isset($kamar) && $kamar->count())
                                    <input type="number" hidden name="kamar_id" value="{{ $kamar->first()->id }}">
                                    <label class="form-label">Tipe Kamar</label>
                                    <input type="text" class="form-control rounded-pill mb-2"
                                        value="{{ ucfirst($kamar->first()->jeniskamar) }}" disabled>
                                    {{-- Tambahan untuk kamar_id2 dan kamar_id3 jika ada --}}
                                    @if (request()->has('kamar_id2') && $kamar->count() > 1)
                                        <input type="number" hidden name="kamar_id2" value="{{ $kamar[1]->id }}">
                                        <input type="text" class="form-control rounded-pill mb-2"
                                            value="{{ ucfirst($kamar[1]->jeniskamar) }}" disabled>
                                    @else
                                        <select class="form-control rounded-pill mb-2" id="kamar_id2" name="kamar_id2">
                                            <option value="" selected>Pilih tipe kamar 2 (opsional)</option>
                                            @foreach ($kamar as $r)
                                                {{-- @if ($r->id != $kamar->first()->id) --}}
                                                <option value="{{ $r->id }}">{{ ucfirst($r->jeniskamar) }} -
                                                    {{ $r->catatan }}</option>
                                                {{-- @endif --}}
                                            @endforeach
                                        </select>
                                    @endif
                                    @if (request()->has('kamar_id3') && $kamar->count() > 2)
                                        <input type="number" hidden name="kamar_id3" value="{{ $kamar[2]->id }}">
                                        <input type="text" class="form-control rounded-pill mb-2"
                                            value="{{ ucfirst($kamar[2]->jeniskamar) }}" disabled>
                                    @else
                                        <select class="form-control rounded-pill mb-2" id="kamar_id3" name="kamar_id3">
                                            <option value="" selected>Pilih tipe kamar 3 (opsional)</option>
                                            @foreach ($kamar as $r)
                                                {{-- @if ($r->id != $kamar->first()->id && (!request()->has('kamar_id2') || $r->id != request('kamar_id2'))) --}}
                                                <option value="{{ $r->id }}">{{ ucfirst($r->jeniskamar) }} -
                                                    {{ $r->catatan }}</option>
                                                {{-- @endif --}}
                                            @endforeach
                                        </select>
                                    @endif
                                    @if (request()->has('kamar_id4') && $kamar->count() > 3)
                                        <input type="number" hidden name="kamar_id4" value="{{ $kamar[3]->id }}">
                                        <input type="text" class="form-control rounded-pill mb-2"
                                            value="{{ ucfirst($kamar[3]->jeniskamar) }}" disabled>
                                    @else
                                        <select class="form-control rounded-pill mb-2" id="kamar_id4" name="kamar_id4">
                                            <option value="" selected>Pilih tipe kamar 4 (opsional)</option>
                                            @foreach ($kamar as $r)
                                                {{-- @if ($r->id != $kamar->first()->id && (!request()->has('kamar_id2') || $r->id != request('kamar_id2')) && (!request()->has('kamar_id3') || $r->id != request('kamar_id3'))) --}}
                                                <option value="{{ $r->id }}">{{ ucfirst($r->jeniskamar) }} -
                                                    {{ $r->catatan }}</option>
                                                {{-- @endif --}}
                                            @endforeach
                                        </select>
                                    @endif
                                @else
                                    <label for="kamar_id" class="form-label">Tipe Kamar</label>
                                    <select class="form-control rounded-pill mb-2" id="kamar_id" name="kamar_id"
                                        required>
                                        <option value="" selected>Pilih tipe kamar 1</option>
                                        @foreach ($kamar as $r)
                                            <option value="{{ $r->id }}">{{ ucfirst($r->jeniskamar) }} -
                                                {{ $r->catatan }}</option>
                                        @endforeach
                                    </select>
                                    <select class="form-control rounded-pill mb-2" id="kamar_id2" name="kamar_id2">
                                        <option value="" selected>Pilih tipe kamar 2 (opsional)</option>
                                        @foreach ($kamar as $r)
                                            <option value="{{ $r->id }}">{{ ucfirst($r->jeniskamar) }} -
                                                {{ $r->catatan }}</option>
                                        @endforeach
                                    </select>
                                    <select class="form-control rounded-pill mb-2" id="kamar_id3" name="kamar_id3">
                                        <option value="" selected>Pilih tipe kamar 3 (opsional)</option>
                                        @foreach ($kamar as $r)
                                            <option value="{{ $r->id }}">{{ ucfirst($r->jeniskamar) }} -
                                                {{ $r->catatan }}</option>
                                        @endforeach
                                    </select>
                                    <select class="form-control rounded-pill mb-2" id="kamar_id4" name="kamar_id4">
                                        <option value="" selected>Pilih tipe kamar 4 (opsional)</option>
                                        @foreach ($kamar as $r)
                                            <option value="{{ $r->id }}">{{ ucfirst($r->jeniskamar) }} -
                                                {{ $r->catatan }}</option>
                                        @endforeach
                                    </select>
                                @endif
                            </div>
                            <div class="d-grid">
                                <button type="submit"
                                    class="btn btn-lg btn-dark rounded-pill shadow-sm">Reservasi</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
