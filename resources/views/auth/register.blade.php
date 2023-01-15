@extends('layout.layout-auth')

@section('content')
    @if (Session::get('fail') !== null)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close text-right" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <ul style="text-align: left">
                    @foreach (Session::get('fail') as $key => $value)
                        <li>{{ $value }}</li>
                    @endforeach
                </ul>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close text-right" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <ul>
                Mungkin ada Input yg salah Silahkan periksa kembali kesamaan password dan lain-lain.
            </ul>
        </div>
    @endif

    <form class="login100-form" action=" {{ route('user.register') }} " method="POST">
        @csrf
        <span class="login100-form-title p-b-26">
            Selamat Datang
        </span>
        <span class="login100-form-title p-b-48">
            <img src="{{ asset('assets/image/kategori/standar.png') }}" alt="" height="50px" width="50px">
        </span>

        <div class="wrap-input100">
            <input class="input100" type="text" name="name" {{ old('name') }} required>
            <span class="focus-input100" data-placeholder="nama"></span>
        </div>

        <div class="wrap-input100">
            <input class="input100" type="email" name="email" required>
            <span class="focus-input100" data-placeholder="Email"></span>
        </div>

        <div class="wrap-input100">
            <input class="input100" type="number" name="phone_number" required>
            <span class="focus-input100" data-placeholder="phone_number"></span>
        </div>

        <div class="wrap-input100" data-validate="Enter password">
            <input class="input100" type="password" name="password" required>
            <span class="focus-input100" data-placeholder="Password"></span>
        </div>

        <div class="wrap-input100" data-validate="Enter password">
            <input class="input100" type="password" name="password_confirmation" required>
            <span class="focus-input100" data-placeholder="Konfirmasi Password"></span>
        </div>

        <div class="container-login100-form-btn">
            <div class="wrap-login100-form-btn">
                <div class="login100-form-bgbtn"></div>
                <button class="login100-form-btn">
                    Daftar
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
