@extends('layout.layout')

@section('content')
    <div class="container main-content my-4">
        @php
            $count_room = count($rooms);
        @endphp

        @foreach ($rooms as $room)
            <a href="#">
                <div class="room row" style="width: 100% !important; margin-left: 4.5px">
                    <div class="col-5 bg-success rounded-start campaign-banner-1" style="height: 210px">
                        <img class="image-campagn-banner rounded" src="{{ $room->image }}">
                    </div>
                    <div class="col bg-dark rounded-end text-white p-3" style="height: 210px">
                        <h5 class="room-title">Kamar {{ $room->name }} </h5>
                        <p style="font-weight: lighter; font-size: 15px; margin-top:20px">Tipe :
                            {{ $room->type->name }} |
                            Lantai : {{ $room->floor_id }}</p>
                        <div class="amount-info my-1">
                            <p style="font-size: 15px">
                                <b>Rp. {{ number_format($room->price) }}</b> <i>/malam</i>.
                            </p>
                        </div>
                    </div>
                </div>
            </a>


            @if ($loop->iteration !== $count_room)
                <br>
            @endif
        @endforeach
    </div>
@endsection
