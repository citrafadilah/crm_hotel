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
    <!-- Dashboard Content -->
    <div class="container my-4">
        <div class="row">
            <!-- Service Start -->
            <div id="kamarin" class="container-xxl py-5" style="background-color: #f3cf30; border-radius: 16px;">
                <div class="container">
                    <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                        <h6 class="section-title text-center text-white px-3">Categories</h6>
                        <h1 class="mb-5 text-dark">Our Rooms</h1>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <ul class="list-group wow fadeInUp" data-wow-delay="0.5s">
                                @foreach($kamar as $kamar)
                                <li class="list-group-item d-flex align-items-center"
                                    style="background-color: #000000; color: #fff; border-radius: 10px; margin-bottom: 8px;">
                                    <div
                                        style="width: 160px; height: 160px; background-image: url('{{ asset('temp/img/' . ($kamar->jeniskamar == 'Smart Kamar Double' ? 'double.jpeg' : ($kamar->jeniskamar == 'Smart Kamar Twin' ? 'twin.jpeg' : 'vip_kamar.jpg'))) }}'); background-size: cover; background-position: center; border-radius: 5px; margin-right: 24px;">
                                    </div>
                                    <div class="flex-grow-1">
                                        <div style="font-size: 20px; font-weight: bold;">{{$kamar->jeniskamar}}</div>
                                        <div style="font-size: 14px;">{{$kamar->catatan}}</div>
                                        <div style="font-size: 14px; color: #f3cf30;">
                                            <i class="bi bi-person-fill"></i> {{ $kamar->jmlhorang }}</div>
                                        <div style="font-size: 24px; font-weight: bold; color: #f3cf30;">Rp. {{ number_format($kamar->harga, 0, ',', '.') }}</div>
                                    </div>
                                    <a href="{{ route('reservasi.create', ['kamar_id' => $kamar->id]) }}" class="btn btn-warning ms-3" style="border-radius: 16px">BOOK NOW</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Service End -->
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
@endsection
