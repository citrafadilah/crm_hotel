@extends('layout.navbar')

@section('title', 'Profil Pengguna')

@section('content')
<div class="container mt-5 mb-5">
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

    <div class="row d-flex justify-content-center">
        <div class="col-md-8 col-lg-7">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body p-4 p-md-5">

                    {{-- Profile Header with Avatar --}}
                    <div class="d-flex align-items-center mb-4">
                        <div>
                            <h3 class="fw-bold mb-0">{{ Auth::user()->name }}</h3>
                            <p class="text-muted mb-0">{{ Auth::user()->email }}</p>
                        </div>
                    </div>

                    <hr>

                    {{-- Profile Details --}}
                    <div class="mt-4">
                        <h5 class="mb-3">Detail Akun</h5>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <p class="text-muted mb-0">
                                <i class="fas fa-calendar-alt fa-fw me-2"></i>Tanggal Bergabung
                            </p>
                            <p class="fw-bold mb-0">{{ Auth::user()->created_at->format('d F Y') }}</p>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="text-muted mb-0">
                                <i class="fas fa-check-circle fa-fw me-2"></i>Status Akun
                            </p>
                            <span class="badge bg-success-subtle text-success-emphasis rounded-pill">Aktif</span>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <p class="text-muted mb-0">
                            <i class="fas fa-bed fa-fw me-2"></i>Total Reservasi
                        </p>
                        <p class="fw-bold mb-0">{{ $reservasi ?? 0 }}</p>
                    </div>
                    {{-- Actions --}}
                    <div class="mt-5 text-center">
                        <a href="{{route('profile.edit', Auth()->user()->id)}}" class="btn btn-warning rounded-pill px-4">
                            <i class="fas fa-pencil-alt me-2"></i>Edit Profil
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
