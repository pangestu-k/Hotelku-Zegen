<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Hotelku.com | Aplikasi Reservasi Hotel</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/image/logo/logo.png') }}" />

    <link href="{{ asset('assets/admin-page/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet"
        type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link href="{{ asset('assets/added/file-added.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin-page/css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body id="page-top" onload="window.print()">
    <div id="wrapper">
        @yield('content')
    </div>

    <script src="{{ asset('assets/admin-page/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/admin-page/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/admin-page/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/admin-page/js/sb-admin-2.min.js') }}"></script>
</body>

</html>
