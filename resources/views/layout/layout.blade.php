<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/added/layout.css') }}">

    <title>Hotelku.com | Aplikasi Reservasi Hotel</title>
</head>

<body>
    <div class="header d-flex justify-content-center bg-dark">
        <div class="logo text-light">
            <img class="img rounded-pill" src="{{ asset('assets/image/logo/logo.png') }}" width="40px" height="40px">
        </div>
        <div class="form search">
            <form action="#">
                <input type="text" class="form-control rounded-pill input-search"
                    placeholder="Masukan kata kunci disini">
            </form>
        </div>
    </div>

    <div class="content justify-content-center ml-auto" style="width:100%;">
        @yield('content')
    </div>

    <div class="footer justify-content-center p-3 bg-white">
        <div class="row main-bar">
            <div class="col logo color text-light mx-2">
                <a href="{{ route('welcome') }}">
                    <img src="{{ asset('assets/image/kategori/hut.png') }}" width="30px" height="30px">
                </a>
            </div>
            <div class="col logo color text-light mx-2">
                <a href="{{ route('donation.index') }}">
                    <img src="{{ asset('assets/image/kategori/bed.png') }}" width="30px" height="30px">
                </a>
            </div>
            <div class="col logo color text-light mx-2">
                <a href="{{ route('profile') }}">
                    <img src="{{ asset('assets/image/kategori/user.png') }}" width="30px" height="30px">
                </a>
            </div>
        </div>
    </div>

    @stack('additional-js')
</body>

</html>
