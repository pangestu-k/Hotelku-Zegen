@extends('layout.layout')

@section('content')
    <div class="container main-content my-4">
        @if ($orders->count() !== 0)
            @php
                $count_order = count($orders);
            @endphp

            @foreach ($orders as $order)
                <div class="donation row" style="width: 100% !important; margin-left: 4.5px">
                    <div class="col-5 bg-dark rounded-start campaign-banner-1" style="height: 280px">
                        <img class="image-campagn-banner rounded" src="{{ $order->room->image }}">
                    </div>
                    <div class="col bg-dark rounded-end text-white p-3" style="height: 280px">
                        <h5 class="donation-title">Pemesanan Kamar {{ $order->room->name }}</h5>
                        @if ($order->status == 'rescheadule')
                            <p>
                                Ajuan Rescheadule ke : {{ date('d M Y', strtotime($order->rescheadule)) }}
                            </p>
                            <p>
                                Reservasi : {{ date('d M Y', strtotime($order->checkin_date)) }} -
                                {{ date('d M Y', strtotime($order->checkout_date)) }}
                            </p>
                        @else
                            <p>
                                Reservasi untuk : {{ date('d M Y', strtotime($order->checkin_date)) }}
                            </p>
                            <p>
                                Tanggal Checkout : {{ date('d M Y', strtotime($order->checkout_date)) }}
                            </p>
                        @endif
                        <p style="font-weight: lighter; font-size: 15px; margin-top:20px">
                            Total Transaksi : <br>
                            <b style="font-weight: bold !important">
                                Rp. {{ number_format($order->total) }}
                            </b>
                        </p>
                        <br>

                        @if ($order->status == 'confirmed')
                            <button type="button" class="btn btn-success rounded-pill"
                                onclick="alert('Transaksi Sudah Selesai Silahkan Menikmati Fasilitas Hotel Kami')">
                                Berhasil</button>
                            <a href="{{ route('order.resheadule_get', $order->id) }}"
                                class="btn btn-secondary rounded-pill">
                                Ingin Rescheadule ?
                            </a>
                        @elseif($order->status == 'rescheadule')
                            <button type="button" class="btn btn-primary rounded-pill"
                                onclick="alert('Menunggu Konfirmasi Admin')">Menunggu Konfirmasi Admin</button>
                        @elseif($order->status == 'waiting')
                            <button type="button" class="btn btn-primary rounded-pill"
                                onclick="alert('Menunggu Konfirmasi Admin')">Menunggu Konfirmasi Admin</button>
                        @else
                            <button type="button" class="btn btn-warning rounded-pill" data-bs-toggle="modal"
                                data-bs-target="#exampleModal" data-bs-whatever="@mdo">Kirimkan Bukti Transfer</button>
                        @endif

                    </div>
                </div>

                @if ($loop->iteration !== $count_order)
                    <br>
                @endif
            @endforeach
        @else
            <div class="alert bg-dark text-white alert-dismissible fade show" role="alert">
                <p>
                    Anda Belum Memiliki Pesanan Apapun 😊, Yuk Langsung Pesan <br><br>
                    <a href="{{ route('welcome') }}" class="btn btn-success">
                        Booking
                    </a>
                </p>
            </div>
        @endif

    </div>

    {{-- Modal Pembayaran --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark text-white">
                    <h5 class="modal-title" id="exampleModalLabel">Kirim Bukti Pembayaran</h5>
                    <button type="button" class="btn-light" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('order.confirm', isset($order->id) ? $order->id : 1) }}"
                        enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="file-upload">
                            <button class="file-upload-btn" type="button"
                                onclick="$('.file-upload-input').trigger( 'click' )">Pilih
                                Gambar</button>

                            <div class="image-upload-wrap">
                                <input name="photo" class="file-upload-input" type='file' id="upload-image"
                                    onchange="readURL(this);" accept="image/*" />
                                <div class="drag-text">
                                    <h3>Drag & drop File Gambar yang Akan Dikirimkan</h3>
                                </div>
                            </div>
                            <div class="file-upload-content">
                                <img class="file-upload-image" src="#" alt="your image" />
                                <div class="image-title-wrap">
                                    <button type="button" onclick="removeUpload()" class="remove-image">Remove <span
                                            class="image-title">Uploaded Image</span></button>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer bg-dark">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-warning">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('additional-js')
        <script>
            function readURL(input) {
                if (input.files && input.files[0]) {

                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('.image-upload-wrap').hide();

                        $('.file-upload-image').attr('src', e.target.result);
                        $('.file-upload-content').show();

                        $('.image-title').html(input.files[0].name);
                    };

                    reader.readAsDataURL(input.files[0]);

                } else {
                    removeUpload();
                }
            }

            function removeUpload() {
                $('.file-upload-input').replaceWith($('.file-upload-input').clone());
                $('.file-upload-content').hide();
                $('.image-upload-wrap').show();
                $('#upload-image').val('')
            }
            $('.image-upload-wrap').bind('dragover', function() {
                $('.image-upload-wrap').addClass('image-dropping');
            });
            $('.image-upload-wrap').bind('dragleave', function() {
                $('.image-upload-wrap').removeClass('image-dropping');
            });
        </script>
    @endpush
@endsection
