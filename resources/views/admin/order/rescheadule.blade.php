@extends('layout.layout-admin')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Halaman Rescheadule</h1>

    <div class="card shadow mb-4 col">
        <div class="card-header py-3 row">
            Detail Data Reservasu
        </div>
        <div class="card-body">
            <div class="amount-info my-1">
                <p style="font-size: 15px">
                    <b>Reservasi Awal : </b> {{ date('d M Y', strtotime($order->checkin_date)) }} -
                    {{ date('d M Y', strtotime($order->checkout_date)) }}
                    ({{ $order->day }} day)
                </p>
                <p style="font-size: 15px">
                    <b>Pengajuan Rescheadule ke : </b> {{ date('d M Y', strtotime($order->rescheadule)) }}
                </p>
            </div>

            <div class="mt-2 text-left">
                <form action="{{ route('order-admin.rescheadule_confirm', $order->id) }}" class="d-inline mr-3"
                    method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-success">Konfirmasi Rescheadule</button>
                </form>

                <form action="{{ route('order-admin.ignore_rescheadule', $order->id) }}" class="d-inline" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-danger">Tolak Rescheadule</button>
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
