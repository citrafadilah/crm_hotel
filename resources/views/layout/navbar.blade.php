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


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg navbar-light shadow sticky-top p-0" style="background-color: #000;">
        <!-- Logout Button Menu -->
        <a href="@if (Auth::check() && Auth::user()->role == 'admin') {{ url('dbadmin') }} @elseif(Auth::check() && Auth::user()->role == 'user') {{ url('') }} @else / @endif"
            class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 text-warning d-flex align-items-center">
                <img src="{{ asset('temp/img/hayo-logo.png') }}" alt="Hotel Logo" style="width: 40px; height: 40px;"
                    class="me-2">
                <span style="font-size: 24px;">HAYO HOTEL</span>
            </h2>
        </a>
        @if (Auth::check())
            <i class="fa fa-user text-white" style="font-size: 1.5rem; margin-right: 10px;"></i>
            @php
                $greetings = [
                    'en' => 'Welcome back',
                    'id' => 'Selamat datang kembali',
                    'fr' => 'Bon retour',
                    'de' => 'Willkommen zurück',
                    'es' => 'Bienvenido de nuevo',
                    'jp' => 'お帰りなさい',
                    'ar' => 'مرحبًا بعودتك',
                    'zh' => '欢迎回来',
                    'ru' => 'С возвращением',
                    'ko' => '다시 오신 것을 환영합니다',
                ];
                $keys = array_keys($greetings);
                $selected = $keys[array_rand($keys)];
            @endphp
            <span class="text-white fw-semibold">
                {{ $greetings[$selected] }}, {{ Auth::user()->name }}
            </span>
            </div>
        @endif
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="{{ url('') }}" class="nav-item nav-link {{ Request::is('') ? 'active' : '' }}">Home</a>
                @if(Auth::check() && Auth::user()->role == 'admin')
                    <a href="{{ url('dbadmin') }}" class="nav-item nav-link {{ Request::is('dbadmin') ? 'active' : '' }}">Dashboard</a>
                @elseif(Auth::check() && Auth::user()->role == 'user')
                    <a href="{{ url('dbuser') }}" class="nav-item nav-link {{ Request::is('dbuser') ? 'active' : '' }}">Dashboard</a>
                @endif
                <a href="{{ url('reservasi') }}" class="nav-item nav-link {{ Request::is('reservasi') ? 'active' : '' }}">Reservasi</a>
                <a href="{{url('riwayat')}}" class="nav-item nav-link {{ Request::is('riwayat') ? 'active' : '' }}">Riwayat</a>
                <a href="{{ url('akun') }}" class="nav-item nav-link {{ Request::is('akun') ? 'active' : '' }}">Akun</a>
            </div>
        </div>
        <form method="POST" action="{{ route('logout') }}" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-warning btn-outline-default align-items-center"
                style="border-radius: 24px; margin-right: 32px">
                <i class="fa fa-sign-out-alt ms-2" style="margin-right: 8px;"></i>
                <span style="font-size: 1rem; color: blacks;">Logout</span>
            </button>
        </form>
    </nav>
    <!-- Navbar End -->

    @yield('content')


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-warning btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


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
