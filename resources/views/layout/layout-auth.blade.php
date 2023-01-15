<!DOCTYPE html>
<html lang="en">

<head>
    <title>Hotelku.com | Aplikasi Reservasi Hotel</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/image/logo/logo.png') }}" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/login-page/fonts/font-awesome-4.7.0/css/font-awesome.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/login-page/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/login-page/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
</head>

<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                @yield('content')
            </div>
        </div>
    </div>
    <div id="dropDownSelect1"></div>

    <script src="{{ asset('assets/login-page/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('assets/login-page/vendor/animsition/js/animsition.min.js') }}"></script>
    <script src="{{ asset('assets/login-page/vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('assets/login-page/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/login-page/vendor/select2/select2.min.js') }}"></script>
    <script src="{{ asset('assets/login-page/vendor/daterangepicker/moment.js') }}"></script>
    <script src="{{ asset('assets/login-page/vendor/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('assets/login-page/vendor/countdowntime/countdowntime.js') }}"></script>
    <script src="{{ asset('assets/login-page/js/main.js') }}"></script>
</body>

</html>
