@extends('layout.layout')

@section('content')
    <div class="container main-content my-4">
        @if ($donations->count() !== 0)
            @foreach ($donations as $donation)
                <div class="donation row" style="width: 100% !important; margin-left: 4.5px">
                    <div class="col-5 bg-dark rounded-start campaign-banner-1" style="height: 210px">
                        <img class="image-campagn-banner rounded" src="{{ $donation->campaign->gambar }}">
                    </div>
                    <div class="col bg-dark rounded-end text-white p-3" style="height: 210px">
                        <h5 class="donation-title">{{ $donation->campaign->judul }}</h5>
                        <p style="font-weight: lighter; font-size: 15px; margin-top:20px">
                            Nominal Donasi Anda : <br>
                            <b style="font-weight: bold !important">
                                Rp. {{ number_format($donation->jumlah) }}
                            </b>
                        </p>

                        @if ($donation->status == 'confirmed')
                            <button type="button" class="btn btn-success rounded-pill">Selesai</button>
                        @elseif($donation->status == 'fail')
                            <button type="button" class="btn btn-danger rounded-pill">Expired</button>
                        @else
                            <button type="button" class="btn btn-warning rounded-pill" data-bs-toggle="modal"
                                data-bs-target="#exampleModal" data-bs-whatever="@mdo">Konfirmasi</button>
                        @endif

                    </div>
                </div>
            @endforeach
        @else
            <div class="alert bg-dark text-white alert-dismissible fade show" role="alert">
                <p>
                    Anda Belum Memiliki Donasi Apapun 😊, Mau Ikutan Donasi <br><br>
                    <a href="{{ route('donation.index') }}" class="btn btn-primary">
                        Donasi
                    </a>
                </p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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
                    <form>
                        <div class="file-upload">
                            <button class="file-upload-btn" type="button"
                                onclick="$('.file-upload-input').trigger( 'click' )">Pilih
                                Gambar</button>

                            <div class="image-upload-wrap">
                                <input class="file-upload-input" type='file' id="upload-image" onchange="readURL(this);"
                                    accept="image/*" />
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
                    </form>
                </div>
                <div class="modal-footer bg-dark">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-warning">Kirim</button>
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
