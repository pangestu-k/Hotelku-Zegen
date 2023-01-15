@extends('layout.layout-pdf')

@section('content')
    <div class="container mt-5">

        <h1>Data Transaksi di Hotelku</h1>

        <div class="table-responsive mt-4">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Customer</th>
                        <th>Checkin</th>
                        <th>Checkout</th>
                        <th>Total</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i = 1; @endphp
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td><b>{{ $order->customer->user->name }}</b></td>
                            <th>{{ date('d M Y', strtotime($order->checkin_date)) }}</th>
                            <th>{{ date('d M Y', strtotime($order->checkout_date)) }}</th>
                            <th>Rp. {{ number_format($order->total) }}</th>
                            <td>{{ $order->status }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="text-right">
                <p>
                    <b>Total : Rp.</b> {{ number_format($total) }}
                </p>
            </div>
        </div>
    </div>
@endsection
