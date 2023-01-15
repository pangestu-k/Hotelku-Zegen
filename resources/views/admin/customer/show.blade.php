@extends('layout.layout-admin')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Halaman Detail</h1>

    <div class="card shadow mb-4 col">
        <div class="card-header py-3 row">
            Detail Data customer
        </div>
        <div class="card-body">
            <img class="img img-detail rounded"
                src="{{ $customer->image == null || $customer->image == '' ? asset('assets/image/profile/guest.png') : $customer->image }}">
            <br><br>

            <h5 class="donation-title">Nama : {{ $customer->name }}</h5>
            <div class="amount-info my-1">
                <p style="font-size: 15px">
                    <b>Email : </b> <i> {{ $customer->email }} </i>
                </p>
                <p style="font-size: 15px">
                    <b>Telp : </b> {{ $customer->customer->phone_number }}
                </p>
                <p style="font-size: 15px">
                    <b>Alamat : </b>{!! $customer->customer->address == null || $customer->customer->address == ''
                        ? '-'
                        : $customer->customer->address !!}
                </p>
            </div>

            <div class="mt-2 text-right">
                <a href="{{ route('customer.list') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
@endsection
