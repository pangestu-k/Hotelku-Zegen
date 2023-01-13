@extends('layout.layout-email')

@section('content')
    <form class="login100-form validate-form">
        <span class="login100-form-title p-b-26">
            Selamat Datang
        </span>
        <span class="login100-form-title p-b-48">
            <img src="{{ asset('assets/image/kategori/standar.png') }}" alt="" height="50px" width="50px">
        </span>

        <div class="wrap-input100 validate-input" data-validate="Valid email is: a@b.c">
            <input class="input100" type="text" name="nama">
            <span class="focus-input100" data-placeholder="nama"></span>
        </div>

        <div class="wrap-input100 validate-input" data-validate="Valid email is: a@b.c">
            <input class="input100" type="text" name="email">
            <span class="focus-input100" data-placeholder="Email"></span>
        </div>

        <div class="wrap-input100 validate-input" data-validate="Valid email is: a@b.c">
            <input class="input100" type="number" name="telp">
            <span class="focus-input100" data-placeholder="telp"></span>
        </div>

        <div class="wrap-input100 validate-input" data-validate="Valid email is: a@b.c">
            <input class="input100" type="text" name="alamat">
            <span class="focus-input100" data-placeholder="alamat (optional)"></span>
        </div>

        <div class="wrap-input100 validate-input" data-validate="Enter password">
            <input class="input100" type="password" name="pass">
            <span class="focus-input100" data-placeholder="Password"></span>
        </div>

        <div class="wrap-input100 validate-input" data-validate="Enter password">
            <input class="input100" type="password_confirm" name="pass">
            <span class="focus-input100" data-placeholder="Konfirmasi Password"></span>
        </div>

        <div class="container-login100-form-btn">
            <div class="wrap-login100-form-btn">
                <div class="login100-form-bgbtn"></div>
                <button class="login100-form-btn">
                    Masuk
                </button>
            </div>
        </div>

        <div class="text-center p-t-115">
            <span class="txt1">
                Punya Akun?
            </span>

            <a class="txt2" href="{{ route('login') }}">
                Masuk
            </a>
        </div>
    </form>
@endsection
