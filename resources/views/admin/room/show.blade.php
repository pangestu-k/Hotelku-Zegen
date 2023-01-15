@extends('layout.layout-admin')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Halaman Detail</h1>

    <div class="card shadow mb-4 col">
        <div class="card-header py-3 row">
            Detail Data Kamar
        </div>
        <div class="card-body">
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
                <p style="font-size: 15px">
                    <b>Lantai : </b> Lantai 1
                </p>
                <p style="font-size: 15px">
                    {!! $room->desc !!}
                </p>
            </div>

            <div class="mt-2 text-right">
                <a href="{{ route('room-admin.list') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
@endsection
