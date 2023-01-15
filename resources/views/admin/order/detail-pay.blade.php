@extends('layout.layout-admin')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Halaman Konfirmasi</h1>

    <div class="card shadow mb-4 col">
        <div class="card-header py-3 row">
            Detail Data order
        </div>
        <div class="card-body">
            <img class="img img-detail rounded" src="{{ $order->image }}">
            <br><br>

            <h5 class="donation-title">Nama Customer : {{ $order->customer->user->name }}</h5>
            <div class="amount-info my-1">
                <p style="font-size: 15px">
                    <b>Reservasi : </b> {{ date('d M Y', strtotime($order->checkin_date)) }} -
                    {{ date('d M Y', strtotime($order->checkout_date)) }}
                    ({{ $order->day }} day)
                </p>
                <p style="font-size: 15px">
                    <b>Total : Rp.</b>{{ number_format($order->total) }}
                </p>
                <p style="font-size: 15px">
                    <b>Status : </b> {{ $order->status }}
                </p>
            </div>

            <div class="mt-2 text-left">
                <form action="{{ route('order-admin.confirm', $order->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-success">Konfirmasi Pembayaran</button>
                </form>
            </div>

            <div class="mt-2 text-right">
                <a href="{{ route('order-admin.list') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>

        @if (Session::get('fail') !== null)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Berhasil, </strong> {{ Session::get('fail') }}.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div>
@endsection
