@extends('layout.layout')

@section('content')
    <div class="container main-content my-4" style="padding-right: 23px">
        <br><br><br>
        <div class="banner-content" style="width: 100% !important">
            <div class="profile row" style="width: 100% !important; margin-left: 4.5px">
                <div class="col-12 profie-banner rounded text-white text-center p-4"
                    style="height: 220px;background: black;position: relative;">

                    @php
                        if (auth()->user()->image == null || auth()->user()->image == '') {
                            $image = asset('assets/image/profile/guest.png');
                        } else {
                            $image = auth()->user()->image;
                        }
                    @endphp

                    <img src="{{ $image }}" class="img avatar-thumbnail rounded-circle" style="object-fit: cover;"
                        alt="" width="200px" height="200px">
                    <p class="text-dark edit-text bg-warning" id="edit-text">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path
                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                            <path fill-rule="evenodd"
                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                        </svg>
                    </p>
                    <h2 style="margin-top: 25px; color:whitesmoke" class="font-weight-bold">{{ auth()->user()->name }}</h2>
                </div>
            </div>
        </div>
        <br>

        <div class="banner-content text-center" style="width: 100% !important">
            <a href="#">
                <div class="donation row bg-dark rounded text-white" style="width: 100% !important; margin-left: 4.5px;">
                    <div class="col-3" style="height: 80px; line-height: 60px">
                        <div class="bg-warning rounded" style="height: 60px; width: 60px; margin-top:10px">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="black"
                                class="bi bi-cash-coin" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z" />
                                <path
                                    d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z" />
                                <path
                                    d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z" />
                                <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z" />
                            </svg>
                        </div>
                    </div>
                    <div style="height: 80px; line-height: 80px;font-size:20px" class="col-6">
                        Pesanan Saya
                    </div>
                    <div style="height: 80px; line-height: 80px" class="col-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-arrow-right arrow-profile" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                        </svg>
                    </div>
                </div>
            </a>

            <br>
            <a href="{{ route('editProfile.get') }}">
                <div class="donation row bg-dark rounded text-white" style="width: 100% !important; margin-left: 4.5px;">
                    <div class="col-3" style="height: 80px; line-height: 60px">
                        <div class="bg-warning rounded" style="height: 60px; width: 60px; margin-top:10px">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="black"
                                class="bi bi-person-fill" viewBox="0 0 16 16">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                            </svg>
                        </div>
                    </div>
                    <div style="height: 80px; line-height: 80px;font-size:20px" class="col-6">
                        Ubah Profile
                    </div>
                    <div style="height: 80px; line-height: 80px" class="col-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-arrow-right arrow-profile" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                        </svg>
                    </div>
                </div>
            </a>

            <br>
            <a href=" {{ route('editPassword.get') }} ">
                <div class="donation row bg-dark rounded text-white" style="width: 100% !important; margin-left: 4.5px;">
                    <div class="col-3" style="height: 80px; line-height: 60px">
                        <div class="bg-warning rounded" style="height: 60px; width: 60px; margin-top:10px">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="black"
                                class="bi bi-key-fill" viewBox="0 0 16 16">
                                <path
                                    d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                            </svg>
                        </div>
                    </div>
                    <div style="height: 80px; line-height: 80px;font-size:20px" class="col-6">
                        Ubah Password
                    </div>
                    <div style="height: 80px; line-height: 80px" class="col-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-arrow-right arrow-profile" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                        </svg>
                    </div>
                </div>
            </a>

            <br>

            <a href="javascript:void(0)" id="a-submit">
                <div class="donation row bg-dark rounded-pill text-white"
                    style="width: 100% !important; margin-left: 4.5px;">
                    <div class="col rounded-pill text-white"
                        style="height: 55px; line-height: 55px; background:maroon; font-size: 20px">
                        Logout
                        <svg xmlns="http://www.w3.org/2000/svg" style="margin-left: 10px" width="25" height="25"
                            fill="white" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z" />
                            <path fill-rule="evenodd"
                                d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
                        </svg>
                    </div>
                </div>
            </a>

            <form action="{{ route('user.logout') }}" method="POST" id="form-logout"
                onsubmit="return confirm('Anda Yakin Ingin Keluar ?')">
                @csrf
                <button type="submit" id="b-submit" class="d-none"></button>
            </form>
        </div>
    </div>
    <button type="button" id="modal-upload" class="btn btn-warning rounded-pill d-none" data-bs-toggle="modal"
        data-bs-target="#upload" data-bs-whatever="@mdo">Upload Photo</button>

    <div class="modal fade" id="upload" tabindex="-1" aria-labelledby="uploadLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark text-white">
                    <h5 class="modal-title" id="exampleModalLabel">Upload Foto Profile</h5>
                    <button type="button" class="btn-light" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if ($errors->any())
                        <div class="alert bg-danger alert-dismissible fade show" role="alert">
                            <ul style="text-align: left">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                    <form action="{{ route('addPhoto.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="file-upload">
                            <button class="file-upload-btn" type="button"
                                onclick="$('.file-upload-input').trigger( 'click' )">Pilih
                                Gambar</button>

                            <div class="image-upload-wrap">
                                <input class="file-upload-input" required type='file' id="upload-image"
                                    onchange="readURL(this);" accept="image/*" name="photo" />
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
            document.getElementById("a-submit").addEventListener("click", function(event) {
                event.preventDefault()
                document.getElementById('b-submit').click();
            });

            document.getElementById("edit-text").addEventListener("click", function(event) {
                document.getElementById('modal-upload').click();
            });

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
