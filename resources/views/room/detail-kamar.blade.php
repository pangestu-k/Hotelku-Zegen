@extends('layout.layout')

@section('content')
    <div class="container main-content my-4">
        <div class="main-donate-layer rounded text-white p-3" style="background-color: black">

            <img class="img img-detail rounded" src="{{ $room->image }}">
            <br><br>

            <h5 class="donation-title">Kamar {{ $room->name }}</h5>
            <div class="amount-info my-1">
                <p style="font-size: 15px">
                    <b>Tipe Kamar : </b> <i> {{ $room->type->name }} </i>
                </p>
                <p style="font-size: 15px">
                    <b>Harga : Rp.</b>{{ number_format($room->price) }} <i>/malam</i>
                </p>
            </div>

            <div class="expired" style="text-align:right; margin-top: 5px">
                <p>
                <p>Lantai <b>1</b></p>
                </p>
            </div>

            <div class="w-100">
                <a href="{{ route('order.room', $room->id) }}" class="btn btn-success w-100 rounded">
                    Booking Sekarang
                </a>
            </div>
        </div>

        <br>
        <div class="rounded card bg-dark text-white p-3">
            <div class="card-header" style="border-bottom: grey 1px solid">
                <h4>
                    Deskripsi Kamar
                </h4>
            </div>

            <div class="card-body" style="font-style: normal">
                <div class="row p-4 rounded" style="background-color: grey">
                    <div class="col-12">
                        {!! $room->desc !!}
                    </div>
                </div>
            </div>
        </div>
        <br>
    </div>
@endsection
