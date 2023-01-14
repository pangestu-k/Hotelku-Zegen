@extends('layout.layout')

@section('content')
    <div class="container main-content my-4" style="padding-right: 23px">
        <div class="card p-4 rounded">
            <div class="card-header bg-dark text-white">
                Kamar {{ $room->name }}
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

                <form action="{{ route('order.store', $room->id) }}" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <label for="day">Berapa Hari : </label>
                        </span>
                        <input class="form-control" type="number" value="1" id="day" name="day"
                            placeholder="Jumlah Hari" required>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <label for="checkin">Check in : </label>
                        </span>
                        <input class="form-control" type="date" id="checkin" value="{{ date('Y-m-d') }}" name="checkin"
                            required>
                    </div>

                    <input type="hidden" id="i-hidden" value="{{ $room->price }}">

                    <br><br>

                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-wallet2" viewBox="0 0 16 16">
                                <path
                                    d="M12.136.326A1.5 1.5 0 0 1 14 1.78V3h.5A1.5 1.5 0 0 1 16 4.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 13.5v-9a1.5 1.5 0 0 1 1.432-1.499L12.136.326zM5.562 3H13V1.78a.5.5 0 0 0-.621-.484L5.562 3zM1.5 4a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z" />
                            </svg>
                        </span>
                        <input class="form-control bg-light number-separator" type="text" value="{{ $room->price }}"
                            id="total" name="total" readonly placeholder="Total Transaksi" required>
                    </div>

                    <br>

                    <div class="text-center">
                        <button type="submit" class="btn btn-success rounded-pill" style="width: 80%">Booking</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

    @push('additional-js')
        <script>
            $("#day").change(function() {
                let total = $(this).val() * $("#i-hidden").val()
                $("#total").val(total)

                easyNumberSeparator({
                    selector: '.number-separator',
                })

                easyNumberSeparator({
                    selector: '.number-separator',
                    separator: ','
                })
            });

            easyNumberSeparator({
                selector: '.number-separator',
            })

            easyNumberSeparator({
                selector: '.number-separator',
                separator: ','
            })
        </script>
    @endpush
@endsection
