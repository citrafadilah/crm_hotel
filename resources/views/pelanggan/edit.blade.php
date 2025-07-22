@extends('layout.navbar')

@section('title', 'Edit Pelanggan')

{{-- You may need to add Font Awesome to your main layout for icons to work --}}
@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
@endpush

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-6">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body p-4 p-md-5">
                    <h3 class="card-title text-center fw-bold mb-4">Edit Data Pelanggan</h3>

                    <form action="{{ route('pelanggan.update', $pelanggan->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        {{-- Name Input --}}
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-user fa-fw"></i></span>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $pelanggan->name) }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Email Input --}}
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-envelope fa-fw"></i></span>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $pelanggan->email) }}" required>
                                 @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Phone Number Input --}}
                        <div class="mb-3">
                            <label for="hp" class="form-label">No. Telepon</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-phone fa-fw"></i></span>
                                <input type="tel" class="form-control @error('hp') is-invalid @enderror" id="hp" name="hp" value="{{ old('hp', $pelanggan->hp) }}">
                                @error('hp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Action Buttons --}}
                        <div class="mt-4">
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-warning rounded-pill btn-lg">
                                    <i class="fas fa-save me-2"></i>Update Perubahan
                                </button>
                                <a href="{{ route('pelanggan.index') }}" class="btn btn-outline-secondary rounded-pill">Batal</a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
