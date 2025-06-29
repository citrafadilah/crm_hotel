<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>E-Booking Hotel - Hayo Hotel Palembang</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('temp/img/hayo-logo.png') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('temp/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('temp/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('temp/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('temp/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-white" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg navbar-light shadow sticky-top p-0" style="background-color: #000;">
        <a href="/" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 text-warning d-flex align-items-center">
                <img src="{{ asset('temp/img/hayo-logo.png') }}" alt="Hotel Logo" style="width: 40px; height: 40px;"
                    class="me-2">
                <span style="font-size: 24px;">HAYO HOTEL</span> <!-- Ukuran teks lebih kecil dari logo -->
                <span class="ms-2" style="font-size: 18px;"> <!-- Ukuran bintang lebih kecil -->
                    <i class="fa fa-star text-warning"></i>
                    <i class="fa fa-star text-warning"></i>
                    <i class="fa fa-star text-warning"></i>
                </span>
            </h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
            style="border-color: white;">
            <span class="navbar-toggler-icon"
                style="background-image: url('data:image/svg+xml;charset=utf8,%3Csvg viewBox=\'0 0 30 30\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cpath stroke=\'rgba(255, 255, 255, 1)\' stroke-width=\'2\' stroke-linecap=\'round\' stroke-miterlimit=\'10\' d=\'M4 7h22M4 15h22M4 23h22\'/%3E%3C/svg%3E');"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="#home" class="nav-item nav-link active">Home</a>
                <a href="#roomin" class="nav-item nav-link">Room & Suites</a>
                <a href="#mice" class="nav-item nav-link">Mice & Dining</a>
                <a href="#about" class="nav-item nav-link">About Us</a>
                <a href="#testimonial" class="nav-item nav-link">Testimonial</a>
                <a href="#contact" class="nav-item nav-link">Contact</a>
                @if (auth()->check() && auth()->user()->role == 'admin')
                    <a href="{{ url('dbadmin') }}" class="btn btn-warning py-4 px-lg-5 d-none d-lg-block">Dashboard<i
                            class="fa fa-arrow-right ms-3"></i></a>
                @elseif (auth()->check() && auth()->user()->role == 'user')
                    <a href="{{ url('dbuser') }}" class="btn btn-warning py-4 px-lg-5 d-none d-lg-block">Booking Now<i
                            class="fa fa-arrow-right ms-3"></i></a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-warning py-4 px-lg-5 d-none d-lg-block">Booking Now<i
                            class="fa fa-arrow-right ms-3"></i></a>
                @endif
            </div>
    </nav>
    <!-- Navbar End -->


    <!-- Carousel Start -->
    <div id="home" class="container-fluid p-0 mb-5">
        <div class="owl-carousel header-carousel position-relative">
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="{{ asset('temp/img/hotel.jpeg') }}" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                    style="background: rgba(24, 29, 56, .7);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-sm-10 col-lg-8">
                                <h5 class="text-warning text-uppercase mb-3 animated slideInDown">Welcome to Hayo Hotel
                                    Palembang</h5>
                                <h1 class="display-3 text-white animated slideInDown">Discover Elegance at Our Hotel
                                </h1>
                                <p class="fs-5 text-white mb-4 pb-2">Sambutlah pengalaman tak terlupakan di Hotel Hayo
                                    Palembang, di mana kemewahan dan kenyamanan berpadu sempurna. Dari arsitektur megah
                                    hingga pelayanan terbaik, kami siap memberikan pengalaman terbaik untuk Anda.</p>
                                <a href=""
                                    class="btn btn-warning py-md-3 px-md-5 me-3 animated slideInLeft">Explore Hotel</a>
                                <a href="" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Book
                                    Your Stay</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="{{ asset('temp/img/kamarhotel.jpeg') }}" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                    style="background: rgba(24, 29, 56, .7);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-sm-10 col-lg-8">
                                <h5 class="text-warning text-uppercase mb-3 animated slideInDown">Hayo Hotel Rooms</h5>
                                <h1 class="display-3 text-white animated slideInDown">Experience Comfort and Elegance
                                </h1>
                                <p class="fs-5 text-white mb-4 pb-2">Nikmati kenyamanan sempurna di kamar kami yang
                                    mewah. Setiap kamar dirancang untuk memberikan suasana yang hangat, dengan tempat
                                    tidur nyaman dan pemandangan memukau yang akan membuat Anda merasa benar-benar
                                    dimanjakan.</p>
                                <a href="#roomin"
                                    class="btn btn-warning py-md-3 px-md-5 me-3 animated slideInLeft">View Rooms</a>
                                <a href="" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Book
                                    Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- Service Start -->
    <div id="roomin" class="container-xxl py-5" style="background-color: #f3cf30;">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title text-center text-white px-3">Categories</h6>
                <h1 class="mb-5 text-dark">Our Rooms</h1>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-4 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item text-center"
                        style="background-color: #000000; padding: 20px; border-radius: 10px;">
                        <div style="position: relative; width: 400px; height: 400px; margin: 0 auto;">
                            <div
                                style="background-image: url('{{ asset('temp/img/double.jpeg') }}'); background-size: cover; background-position: center; border-radius: 5px; width: 100%; height: 100%;">
                            </div>
                            <div class="text-white"
                                style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); font-size: 20px; font-weight: bold;">
                                Smart Room Double</div>
                        </div>
                    </div>
                </div>
                <div class="col-4 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item text-center"
                        style="background-color: #000000; padding: 20px; border-radius: 10px;">
                        <div style="position: relative; width: 400px; height: 400px; margin: 0 auto;">
                            <div
                                style="background-image: url('{{ asset('temp/img/twin.jpeg') }}'); background-size: cover; background-position: center; border-radius: 5px; width: 100%; height: 100%;">
                            </div>
                            <div class="text-white"
                                style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); font-size: 20px; font-weight: bold;">
                                Smart Room Twin</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->

    <!-- About Start -->
    <div id="mice" class="container-xxl py-5" style="background-color: #f3cf30;">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title text-center px-3">Categories</h6>
                <h1 class="mb-5">Mice and Dining</h1>
            </div>
            <div class="row g-3">
                <div class="col-lg-7 col-md-6">
                    <div class="row g-3">
                        <div class="col-lg-12 col-md-12 wow zoomIn" data-wow-delay="0.1s">
                            <a class="position-relative d-block overflow-hidden" href="">
                                <img class="img-fluid" src="{{ asset('temp/img/business2.jpg') }}" alt="">
                                <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3"
                                    style="margin: 1px;">
                                    <h5 class="m-0">Business Facilities</h5>
                                    {{-- <small class="text-warning">49 Courses</small> --}}
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-12 wow zoomIn" data-wow-delay="0.3s">
                            <a class="position-relative d-block overflow-hidden" href="">
                                <img class="img-fluid" src="{{ asset('temp/img/resto_hotel.jpg') }}" alt="">
                                <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3"
                                    style="margin: 1px;">
                                    <h5 class="m-0">Ruang Prasmanan</h5>
                                    {{-- <small class="text-warning">49 Courses</small> --}}
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-12 wow zoomIn" data-wow-delay="0.5s">
                            <a class="position-relative d-block overflow-hidden" href="">
                                <img class="img-fluid" src="{{ asset('temp/img/double.jpeg') }}" alt="">
                                <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3"
                                    style="margin: 1px;">
                                    <h5 class="m-0">Kamar Lengkap</h5>
                                    {{-- <small class="text-warning">35 Courses</small> --}}
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 wow zoomIn" data-wow-delay="0.7s" style="min-height: 350px;">
                    <a class="position-relative d-block h-100 overflow-hidden" href="">
                        <img class="img-fluid position-absolute w-100 h-100" src="{{ asset('temp/img/mknan.jpg') }}"
                            alt="" style="object-fit: cover;">
                        <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3"
                            style="margin:  1px;">
                            <h5 class="m-0">Food & Drink</h5>
                            {{-- <small class="text-warning">49 Courses</small> --}}
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Categories Start -->
    <div id="about" class="container-xxl py-5 category" style="background-color: #000000;">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="img-fluid position-absolute w-100 h-100"
                            src="{{ asset('temp/img/greating.jpg') }}" alt="" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="section-title text-start text-white pe-3">About Us</h6> <!-- Ubah hitam jadi putih -->
                    <h1 class="mb-4 text-white">Welcome to Hayo Hotel</h1> <!-- Ubah hitam jadi putih -->
                    <p class="mb-4 text-white">"The Best Family and Business Hotel"</p> <!-- Ubah hitam jadi putih -->

                    <div class="row gy-2 gx-4 mb-4">
                        <div class="col-sm-6">
                            <p class="mb-0 text-white"><i class="fa fa-arrow-right text-white me-2"></i>Free Wi-Fi</p>
                            <!-- Ubah hitam jadi putih -->
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0 text-white"><i class="fa fa-arrow-right text-white me-2"></i>Accessible</p>
                            <!-- Ubah hitam jadi putih -->
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0 text-white"><i class="fa fa-arrow-right text-white me-2"></i>Laundry
                                service</p> <!-- Ubah hitam jadi putih -->
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0 text-white"><i class="fa fa-arrow-right text-white me-2"></i>Room service
                            </p> <!-- Ubah hitam jadi putih -->
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0 text-white"><i class="fa fa-arrow-right text-white me-2"></i>Paid breakfast
                            </p> <!-- Ubah hitam jadi putih -->
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0 text-white"><i class="fa fa-arrow-right text-white me-2"></i>Restaurant</p>
                            <!-- Ubah hitam jadi putih -->
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0 text-white"><i class="fa fa-arrow-right text-white me-2"></i>Free parking
                            </p> <!-- Ubah hitam jadi putih -->
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0 text-white"><i class="fa fa-arrow-right text-white me-2"></i>Bar</p>
                            <!-- Ubah hitam jadi putih -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Categories Start -->


        <!-- Courses Start -->
        <div class="container-xxl py-5" style="background-color: #000000;">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title text-center text-warning px-3">List Online Book</h6>
                    <h1 class="mb-5 text-white">Popular Booking</h1>
                </div>
                <div class="row g-4 justify-content-center">
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="course-item bg-light">
                            <div class="position-relative overflow-hidden">
                                <img class="img-fluid" src="{{ asset('temp/img/onlinebook1.jpg') }}" alt="">
                                <div
                                    class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                                    <a href="https://www.tiket.com/hotel/indonesia/hayo-hotel-palembang-509001662968078771"
                                        class="flex-shrink-0 btn btn-sm btn-warning px-3 border-end"
                                        style="border-radius: 30px 0 0 30px;">Read More</a>
                                    <a href="https://www.tiket.com/hotel/indonesia/hayo-hotel-palembang-509001662968078771"
                                        class="flex-shrink-0 btn btn-sm btn-warning px-3"
                                        style="border-radius: 0 30px 30px 0;">Book Now</a>
                                </div>
                            </div>
                            <div class="text-center p-4 pb-0">
                                <h3 class="mb-0">Rp.239.772</h3>
                                <div class="mb-3">
                                    <small class="fa fa-star text-warning"></small>
                                    <small class="fa fa-star text-warning"></small>
                                    <small class="fa fa-star text-warning"></small>
                                    <small class="fa fa-star text-warning"></small>
                                    <small class="fa fa-star-half text-warning"></small>
                                    <small>(368)</small>
                                </div>
                                <h5 class="mb-4">tiket.com</h5>
                            </div>
                            {{-- <div class="d-flex border-top">
                                <small class="flex-fill text-center border-end py-2"><i
                                        class="fa fa-user-tie text-warning me-2"></i>John Doe</small>
                                <small class="flex-fill text-center border-end py-2"><i
                                        class="fa fa-clock text-warning me-2"></i>1.49 Hrs</small>
                                <small class="flex-fill text-center py-2"><i
                                        class="fa fa-user text-warning me-2"></i>5388
                                    Booked</small>
                            </div> --}}
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="course-item bg-light">
                            <div class="position-relative overflow-hidden">
                                <img class="img-fluid" src="{{ asset('temp/img/onlinebook2.png') }}" alt="">
                                <div
                                    class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                                    <a href="https://www.agoda.com/id-id/hayo-hotel-by-cordela_5/hotel/palembang-id.html?site_id=1922865&tag=e4d8fc69-3b71-4f38-8757-40e9d3ed4d6f&gad_source=1&gad_campaignid=22020133637&gbraid=0AAAAA9_WXQrga5I5WLjMeXJrHdeNOifNH&gclid=Cj0KCQjwsNnCBhDRARIsAEzia4BsRbGAmFY6WPEurDmhi87WQn-1tLUrCY4z0gDy8ePvei4sWfFKxJUaAtrREALw_wcB&ds=nInyAsLBkcL4Wuiy"
                                        class="flex-shrink-0 btn btn-sm btn-warning px-3 border-end"
                                        style="border-radius: 30px 0 0 30px;">Read More</a>
                                    <a href="https://www.agoda.com/id-id/hayo-hotel-by-cordela_5/hotel/palembang-id.html?site_id=1922865&tag=e4d8fc69-3b71-4f38-8757-40e9d3ed4d6f&gad_source=1&gad_campaignid=22020133637&gbraid=0AAAAA9_WXQrga5I5WLjMeXJrHdeNOifNH&gclid=Cj0KCQjwsNnCBhDRARIsAEzia4BsRbGAmFY6WPEurDmhi87WQn-1tLUrCY4z0gDy8ePvei4sWfFKxJUaAtrREALw_wcB&ds=nInyAsLBkcL4Wuiy"
                                        class="flex-shrink-0 btn btn-sm btn-warning px-3"
                                        style="border-radius: 0 30px 30px 0;">Book Now</a>
                                </div>
                            </div>
                            <div class="text-center p-4 pb-0">
                                <h3 class="mb-0">Rp.415.000</h3>
                                <div class="mb-3">
                                    <small class="fa fa-star text-warning"></small>
                                    <small class="fa fa-star text-warning"></small>
                                    <small class="fa fa-star text-warning"></small>
                                    <small class="fa fa-star text-warning"></small>
                                    <small class="fa fa-star text-warning"></small>
                                    <small>(413)</small>
                                </div>
                                <h5 class="mb-4">agoda</h5>
                            </div>
                            {{-- <div class="d-flex border-top">
                                <small class="flex-fill text-center border-end py-2"><i
                                        class="fa fa-user-tie text-warning me-2"></i>John Doe</small>
                                <small class="flex-fill text-center border-end py-2"><i
                                        class="fa fa-clock text-warning me-2"></i>1.49 Hrs</small>
                                <small class="flex-fill text-center py-2"><i
                                        class="fa fa-user text-warning me-2"></i>2540
                                    Booked</small>
                            </div> --}}
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="course-item bg-light">
                            <div class="position-relative overflow-hidden">
                                <img class="img-fluid" src="{{ asset('temp/img/onlinebook3.jpg') }}" alt="">
                                <div
                                    class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                                    <a href="https://www.traveloka.com/id-id/hotel/indonesia/hayo-hotel-palembang-by-pribadi-group-9000002456325"
                                        class="flex-shrink-0 btn btn-sm btn-warning px-3 border-end"
                                        style="border-radius: 30px 0 0 30px;">Read More</a>
                                    <a href="https://www.traveloka.com/id-id/hotel/indonesia/hayo-hotel-palembang-by-pribadi-group-9000002456325"
                                        class="flex-shrink-0 btn btn-sm btn-warning px-3"
                                        style="border-radius: 0 30px 30px 0;">Book Now</a>
                                </div>
                            </div>
                            <div class="text-center p-4 pb-0">
                                <h3 class="mb-0">Rp.234.808</h3>
                                <div class="mb-3">
                                    <small class="fa fa-star text-warning"></small>
                                    <small class="fa fa-star text-warning"></small>
                                    <small class="fa fa-star text-warning"></small>
                                    <small class="fa fa-star text-warning"></small>
                                    <small class="fa fa-star text-warning"></small>
                                    <small>(199)</small>
                                </div>
                                <h5 class="mb-4">traveloka</h5>
                            </div>
                            {{-- <div class="d-flex border-top">
                                <small class="flex-fill text-center border-end py-2"><i
                                        class="fa fa-user-tie text-warning me-2"></i>John Doe</small>
                                <small class="flex-fill text-center border-end py-2"><i
                                        class="fa fa-clock text-warning me-2"></i>1.49 Hrs</small>
                                <small class="flex-fill text-center py-2"><i
                                        class="fa fa-user text-warning me-2"></i>3562
                                    Booked</small>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Courses End -->

        <!-- Testimonial Start -->
        <div id="testimonial" class="container-xxl py-5 wow fadeInUp" style="background-color: #f3cf30;"
            data-wow-delay="0.1s">
            <div class="container">
                <div class="text-center">
                    <h6 class="section-title bg-black text-center text-white px-3">Testimonial</h6>
                    <h1 class="mb-5 text-white">Our Testimony!</h1>
                </div>
                <div class="owl-carousel testimonial-carousel position-relative">
                    <div class="testimonial-item text-center">
                        {{-- <img class="border rounded-circle p-2 mx-auto mb-3"
                        src="{{ asset('temp/img/testimonial-2.jpg') }}" style="width: 80px; height: 80px;"> --}}
                        <h4 class="mb-0 text-white">M Yahya F.</h4>
                        {{-- <p class="text-white">Profession</p> --}}
                        <div class="testimonial-text bg-dark text-center p-4">
                            <p class="mb-0 text-white">2 X menginap di hayo hotel dan recommended. Akses ke hotel mudah
                                dan kondisi kamar yang nyaman serta staff yang ramah jadi tempat yang menyenangkan untuk
                                singgah.</p>
                        </div>
                    </div>
                    <div class="testimonial-item text-center">
                        {{-- <img class="border rounded-circle p-2 mx-auto mb-3"
                        src="{{ asset('temp/img/testimonial-1.jpg') }}" style="width: 80px; height: 80px;"> --}}
                        <h4 class="mb-0 text-white">I***m</h4>
                        {{-- <p class="text-white">Profession</p> --}}
                        <div class="testimonial-text bg-dark text-center p-4">
                            <p class="mb-0 text-white">Staff nya ramah, makanannya enak-enak dan kamar nya bersih,
                                tenang dan WiFi nya juga kenceng. Pokoknya recommended deeh.</p>
                        </div>
                    </div>
                    <div class="testimonial-item text-center">
                        {{-- <img class="border rounded-circle p-2 mx-auto mb-3"
                        src="{{ asset('temp/img/testimonial-3.jpg') }}" style="width: 80px; height: 80px;"> --}}
                        <h4 class="mb-0 text-white">Fahdina G. A.</h4>
                        {{-- <p class="text-white">Profession</p> --}}
                        <div class="testimonial-text bg-dark text-center p-4">
                            <p class="mb-0 text-white">Pelayanannya oke bgtt, sgala macem request tamu hotel dipenuhi dengan baikk! Tempatnya bersihh no minuss.</p>
                        </div>
                </div>
            </div>
            <!-- Testimonial End -->


            <!-- Footer Start -->
            <div id="contact"
                class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn d-flex justify-content-center align-items-center flex-column"
                data-wow-delay="0.1s">
                <div class="container py-5">
                    <div class="row g-5">
                        {{-- <div class="col-lg-3 col-md-6">
                        <h4 class="text-white mb-3">Quick Link</h4>
                        <a class="btn btn-link" href="">About Us</a>
                        <a class="btn btn-link" href="">Contact Us</a>
                        <a class="btn btn-link" href="">Privacy Policy</a>
                        <a class="btn btn-link" href="">Terms & Condition</a>
                        <a class="btn btn-link" href="">FAQs & Help</a>
                    </div> --}}
                        <div class="col-lg-4 col-md-6">
                            <h4 class="text-white mb-3">Contact</h4>
                            <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Jl. Malaka IV No.16, Bukit
                                Sangkal, Kec. Kalidoni, Kota Palembang, Sumatera Selatan 30114</p>
                            <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>(+62) 812-9295-7700</p>
                            <p class="mb-2"><i class="fa fa-envelope me-3"></i>palembang.reservasion@hayohotels.com
                            </p>
                            <div class="d-flex pt-2">
                                <a class="btn btn-outline-light btn-social"
                                    href="https://tiktok.com/@hayohotel.palembang"><i class="fab fa-tiktok"></i></a>
                                <a class="btn btn-outline-light btn-social"
                                    href="https://instagram.com/hayohotel.palembang"><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <h4 class="text-white mb-3">Gallery</h4>
                            <div class="row g-2 pt-2">
                                <div class="col-4">
                                    <img class="img-fluid bg-light p-1" src="{{ asset('temp/img/business.jpeg') }}"
                                        alt="">
                                </div>
                                <div class="col-4">
                                    <img class="img-fluid bg-light p-1" src="{{ asset('temp/img/business2.jpg') }}"
                                        alt="">
                                </div>
                                <div class="col-4">
                                    <img class="img-fluid bg-light p-1" src="{{ asset('temp/img/hotel.jpeg') }}"
                                        alt="">
                                </div>
                                <div class="col-4">
                                    <img class="img-fluid bg-light p-1" src="{{ asset('temp/img/twin.jpeg') }}"
                                        alt="">
                                </div>
                                <div class="col-4">
                                    <img class="img-fluid bg-light p-1" src="{{ asset('temp/img/resto_hotel.jpg') }}"
                                        alt="">
                                </div>
                                <div class="col-4">
                                    <img class="img-fluid bg-light p-1" src="{{ asset('temp/img/double.jpeg') }}"
                                        alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="copyright">
                        <div class="row">
                            <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                                &copy; <a class="border-bottom text-light">Hotel Hayo Palembang</a>, All Right
                                Reserved.

                                <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                                {{-- Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a> --}}
                            </div>
                            {{-- <div class="col-md-6 text-center text-md-end">
                            <div class="footer-menu">
                                <a href="">Home</a>
                                <a href="">Cookies</a>
                                <a href="">Help</a>
                                <a href="">FQAs</a>
                            </div>
                        </div> --}}
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->


            <!-- Back to Top -->
            <a href="#" class="btn btn-lg btn-warning btn-lg-square back-to-top"><i
                    class="bi bi-arrow-up"></i></a>


            <!-- JavaScript Libraries -->
            <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
            <script src="{{ asset('temp/lib/wow/wow.min.js') }}"></script>
            <script src="{{ asset('temp/lib/easing/easing.min.js') }}"></script>
            <script src="{{ asset('temp/lib/waypoints/waypoints.min.js') }}"></script>
            <script src="{{ asset('temp/lib/owlcarousel/owl.carousel.min.js') }}"></script>

            <!-- Template Javascript -->
            <script src="{{ asset('temp/js/main.js') }}"></script>
</body>

</html>
