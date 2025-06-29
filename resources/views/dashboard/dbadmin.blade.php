@extends('layout.navbar')

@section('content')
    <!-- Dashboard Content -->
    <div class="container-fluid py-5" style=" min-height: 100vh;">
        <div class="row g-4 justify-content-center">
            <div class="row mt-4">
                <div class="col text-end">
                    <a href="{{ url('room') }}" class="btn btn-warning btn-lg" style="border-radius: 12px;">
                        <i class="bi bi-gear-fill me-2"></i>Manajemen Kamar
                    </a>
                </div>
            </div>
            <!-- Statistik Hari Ini -->
            <!-- Kamar Terpakai -->
            <div class="col-5">
                <div class="card border-0 shadow-lg" style="background: #f3cf30; color: #ffffff; border-radius: 18px;">
                    <div class="card-body text-center">
                        <div class="mb-3">
                            <i class="bi bi-person-check-fill" style="font-size: 2.5rem;"></i>
                        </div>
                        <h5 class="card-title fw-bold text-white">Kamar Terpakai</h5>
                        <p class="card-text display-4 fw-bold mb-0">{{ $reservasibaru }}</p>
                    </div>
                </div>
            </div>
            <!-- Kamar Tersedia -->
            <div class="col-5">
                <div class="card border-0 shadow-lg" style="background: #00b34d; color: #ffffff; border-radius: 18px;">
                    <div class="card-body text-center">
                        <div class="mb-3">
                            <i class="bi bi-door-open-fill" style="font-size: 2.5rem;"></i>
                        </div>
                        <h5 class="card-title fw-bold text-white">Kamar Tersedia</h5>
                        <div class="d-flex justify-content-center gap-3">
                            <div class="me-4">
                                <div class="d-flex flex-column align-items-center">
                                    <span class="fw-semibold">Double</span>
                                    <span class="fw-bold fs-3">{{ $availableDouble }}</span>
                                </div>
                            </div>
                            <div>
                                <div class="d-flex flex-column align-items-center">
                                    <span class="fw-semibold">Twin</span>
                                    <span class="fw-bold fs-3">{{ $availableTwin }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card border-0 shadow-lg" style="background: #007bff; color: #ffffff; border-radius: 18px;">
                    <div class="card-body text-center">
                        <div class="mb-3">
                            <i class="bi bi-box-arrow-in-right" style="font-size: 2.5rem;"></i>
                        </div>
                        <h5 class="card-title fw-bold text-white">Check-in Hari Ini</h5>
                        <p class="card-text display-4 fw-bold mb-0">{{ $checkin }}</p>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card border-0 shadow-lg" style="background: #6610f2; color: #ffffff; border-radius: 18px;">
                    <div class="card-body text-center">
                        <div class="mb-3">
                            <i class="bi bi-box-arrow-right" style="font-size: 2.5rem;"></i>
                        </div>
                        <h5 class="card-title fw-bold text-white">Check-out Hari Ini</h5>
                        <p class="card-text display-4 fw-bold mb-0">{{ $checkout }}</p>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card border-0 shadow-lg" style="background: #fd7e14; color: #ffffff; border-radius: 18px;">
                    <div class="card-body text-center">
                        <div class="mb-3">
                            <i class="bi bi-calendar-plus-fill" style="font-size: 2.5rem;"></i>
                        </div>
                        <h5 class="card-title fw-bold text-white">Reservasi Baru</h5>
                        <p class="card-text display-4 fw-bold mb-0">{{ $reservasibaru }}</p>
                    </div>
                </div>
            </div>
            <!-- Card Pengumuman -->
            <div class="row mt-5 justify-content-center">
                <div class="col-12">
                    <div class="card border-0 shadow-xl"
                        style="background: #000000 80%; color: #f3cf30; border-radius: 22px;">
                        <div class="card-body py-5">
                            <h4 class="card-title fw-bold mb-4 text-center" style="color: inherit;">Berita / Pengumuman</h4>
                            <div class="row g-4">
                                <!-- Pengumuman 1 -->
                                <div class="col-md-6">
                                    <div class="card border-4 shadow-sm h-100"
                                        style="background: rgba(0,0,0,0.85); color: #f3cf30; border: 2px solid #f3cf30; border-radius: 15px;">
                                        <div class="card-body text-center">
                                            <h5 class="card-title fw-bold text-white">Pengumuman 1</h5>
                                            <p class="card-text">Isi pengumuman pertama.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Pengumuman 2 -->
                                <div class="col-md-6">
                                    <div class="card border-4 shadow-sm h-100"
                                        style="background: rgba(0,0,0,0.85); color: #f3cf30; border: 2px solid #f3cf30; border-radius: 15px;">
                                        <div class="card-body text-center">
                                            <h5 class="card-title fw-bold text-white">Pengumuman 2</h5>
                                            <p class="card-text">Isi pengumuman kedua.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap Icons CDN -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    @endsection
