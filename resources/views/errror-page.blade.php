<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Hotelku.com | Aplikasi Reservasi Hotel</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700" rel="stylesheet">

    <link rel="icon" type="image/png" href="{{ asset('assets/image/logo/logo.png') }}" />

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/added/error-page.css') }}" />

</head>

<body>

    <div id="notfound">
        <div class="notfound">
            <div class="notfound-404">
                <h1>4<span>0</span>0</h1>
            </div>
            <p>Ups, Ada suatu masalah silahkan kembali ke halaman Awal.</p>
            <a href="{{ route('welcome') }}">Home Page</a>
        </div>
    </div>

</body>

</html>
