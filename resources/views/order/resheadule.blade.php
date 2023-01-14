@extends('layout.layout')

@section('content')
    <div class="container main-content my-4" style="padding-right: 23px">
        <div class="card p-4 rounded">
            <div class="card-header bg-dark text-white">
                Resheadule Pesanan
            </div>

            <div class="card-body">
                @if ($errors->any())
                    <div class="alert bg-danger alert-dismissible fade show" role="alert">
                        <ul style="text-align: left">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (Session::get('fail') !== null)
                    <div class="alert bg-danger alert-dismissible fade show" role="alert">
                        <ul style="text-align: left">
                            @foreach (Session::get('fail') as $key => $value)
                                <li>{{ $value }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form action="{{ route('order.resheadule_store', $order->id) }}" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <label for="checkin">Check in : </label>
                        </span>
                        <input class="form-control" type="date" id="rescheadule"
                            value="{{ date('Y-m-d', strtotime($order->checkin_date)) }}" name="rescheadule" readonly
                            required>
                    </div>

                    <input type="hidden" value="{{ $order->checkout_date }}">

                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <label for="checkin">Rescheadule to : </label>
                        </span>
                        <input class="form-control" type="date" id="rescheadule" value="{{ date('Y-m-d') }}"
                            name="rescheadule" required>
                    </div>

                    <br>

                    <div class="text-center">
                        <button type="submit" class="btn btn-success rounded-pill" style="width: 80%">Resheadule</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
