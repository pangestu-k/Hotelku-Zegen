<!DOCTYPE html>
<html lang="en">

<head>
    <title>Hotelku.com | Aplikasi Reservasi Hotel</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('assets/image/logo/logo.png') }}" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/login-page/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/login-page/fonts/iconic/css/material-design-iconic-font.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/login-page/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/login-page/css/main.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
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
</body>

</html>
