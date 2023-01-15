@extends('layout.layout-admin')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Halaman Order</h1>

    <div class="card shadow mb-4 col">
        <div class="card-header py-3 row">
            <div class="col-6">
                <h6 class="m-0 font-weight-bold text-primary">Data Order di Hotelku</h6>
            </div>
        </div>
        <div class="card-body">
            @if (Session::get('success') !== null)
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Berhasil, </strong> {{ Session::get('success') }}.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if (Session::get('fail') !== null)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Berhasil, </strong> {{ Session::get('fail') }}.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Customer</th>
                            <th>Checkin</th>
                            <th>Checkout</th>
                            <th>Total</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Customer</th>
                            <th>Checkin</th>
                            <th>Checkout</th>
                            <th>Total</th>
                            <th>Status</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @php $i = 1; @endphp
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td><b>{{ $order->customer->user->name }}</b></td>
                                <th>{{ date('d M Y', strtotime($order->checkin_date)) }}</th>
                                <th>{{ date('d M Y', strtotime($order->checkout_date)) }}</th>
                                <th>Rp. {{ number_format($order->total) }}</th>
                                <td>
                                    @if ($order->status == 'confirmed')
                                        <button type="button" class="btn btn-success">
                                            Selesai
                                        </button>
                                    @elseif ($order->status == 'waiting')
                                        <a href="{{ route('order-admin.detail', $order->id) }}"
                                            class="btn btn-primary">Konfirmasi</a>
                                    @elseif ($order->status == 'rescheadule')
                                        <a href="{{ route('order-admin.rescheadule', $order->id) }}"
                                            class="btn btn-secondary">Rescheadule</a>
                                    @else
                                        <button type="button" class="btn btn-warning">Pending</button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{ $orders->links() }}

        @push('additional-js')
            <script>
                ClassicEditor
                    .create(document.querySelector('#address'))
                    .catch(error => {
                        console.error(error);
                    });
            </script>
        @endpush
    @endsection
