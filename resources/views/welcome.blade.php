@extends('layout.layout')

@section('content')
    <div class="container main-content my-4">
        <div class="slider">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('assets/image/banner/banner-1.jpg') }}" class="d-block w-100 rounded">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('assets/image/banner/banner-2.jpg') }}" class="d-block w-100 rounded">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('assets/image/banner/banner-3.jpg') }}" class="d-block w-100 rounded">
                    </div>
                </div>
            </div>
        </div>

        <br>

        <div class="category row gap-3" style="width: 100% !important; margin-left:2px">

            <a class="col bg-white rounded justify-content-center align-content-center"
                href="{{ route('donation.index') }}">
                <div class="text-center" style="margin-top:13.5px;">
                    <div class="img-category">
                        <img src="{{ asset('assets/image/kategori/standar.png') }}" width="40px" height="40px">
                    </div>
                    <div class="text-category">
                        <p>Standar</p>
                    </div>
                </div>
            </a>

            <a class="col bg-white rounded justify-content-center align-content-center"
                href="{{ route('donation.index') }}">
                <div class="text-center" style="margin-top:13.5px;">
                    <div class="img-category">
                        <img src="{{ asset('assets/image/kategori/superior.png') }}" width="40px" height="40px">
                    </div>
                    <div class="text-category">
                        <p>Superior</p>
                    </div>
                </div>
            </a>

            <a class="col bg-white rounded justify-content-center align-content-center"
                href="{{ route('donation.index') }}">
                <div class="text-center" style="margin-top:13.5px;">
                    <div class="img-category">
                        <img src="{{ asset('assets/image/kategori/luxury.png') }}" width="40px" height="40px">
                    </div>
                    <div class="text-category">
                        <p>Deluxe</p>
                    </div>
                </div>
            </a>

            <a class="col bg-white rounded justify-content-center align-content-center" href="{{ route('about') }}">
                <div class="text-center" style="margin-top:13.5px;">
                    <div class="img-category">
                        <img src="{{ asset('assets/image/kategori/information.png') }}" width="40px" height="40px">
                    </div>
                    <div class="text-category">
                        <p>Tentang Kami</p>
                    </div>
                </div>
            </a>
        </div>

        <br>

        <div class="banner-content" style="width: 100% !important">
            <div class="room row" style="width: 100% !important; margin-left: 4.5px">
                <div class="col-5 bg-success rounded-start campaign-banner-1" style="height: 210px">
                    <img class="image-campagn-banner rounded" src="{{ asset('assets/image/room/standar-room.webp') }}">
                </div>
                <div class="col bg-dark rounded-end text-white p-3" style="height: 210px">
                    <h5 class="room-title">Kamar d-12</h5>
                    <p style="font-weight: lighter; font-size: 15px; margin-top:20px">Tipe : Standar | Lantai : 1</p>
                    <div class="amount-info my-1">
                        <p style="font-size: 15px">
                            <b>Rp. 300,000</b> <i>/malam</i>.
                        </p>
                    </div>
                </div>
            </div>

            <br>

            <div class="room row" style="width: 100% !important; margin-left: 4.5px">
                <div class="col-5 bg-success rounded-start campaign-banner-1" style="height: 210px">
                    <img class="image-campagn-banner rounded" src="{{ asset('assets/image/room/superior-room.webp') }}">
                </div>
                <div class="col bg-dark rounded-end text-white p-3" style="height: 210px">
                    <h5 class="room-title">Kamar d-12</h5>
                    <p style="font-weight: lighter; font-size: 15px; margin-top:20px">Tipe : Standar | Lantai : 1</p>
                    <div class="amount-info my-1">
                        <p style="font-size: 15px">
                            <b>Rp. 300,000</b> <i>/malam</i>.
                        </p>
                    </div>
                </div>
            </div>

            <br>

            <div class="room row" style="width: 100% !important; margin-left: 4.5px">
                <div class="col-5 bg-success rounded-start campaign-banner-1" style="height: 210px">
                    <img class="image-campagn-banner rounded" src="{{ asset('assets/image/room/delux-room.webp') }}">
                </div>
                <div class="col bg-dark rounded-end text-white p-3" style="height: 210px">
                    <h5 class="room-title">Kamar d-12</h5>
                    <p style="font-weight: lighter; font-size: 15px; margin-top:20px">Tipe : Standar | Lantai : 1</p>
                    <div class="amount-info my-1">
                        <p style="font-size: 15px">
                            <b>Rp. 300,000</b> <i>/malam</i>.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
