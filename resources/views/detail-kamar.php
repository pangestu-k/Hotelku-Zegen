@extends('layout.layout')

@section('content')
    <div class="container main-content my-4">
        <div class="main-donate-layer rounded text-white p-3" style="background-color: black">

            <img class="img img-detail rounded" src="{{ asset('assets/image/campaign/uluran-tangan.jpg') }}">
            <br><br>

            <h5 class="donation-title">Pahala tak terputus, Wakaf Alquran Untuk pondok Tahfidz</h5>
            <div class="progress my-2" style="margin-top: -10px">
                <div class="progress-bar bg-warning" role="progressbar" aria-label="Warning example" style="width: 75%"
                    aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <div class="amount-info my-1">
                <p style="font-size: 15px">
                    <b>Rp. 300,000</b> <i>terkumpul dari <b>Rp. 1,500,000</b>
                </p>
            </div>
            <div class="expired" style="text-align:right; margin-top: 5px">
                <p>
                <p><b>123</b> hari tersisa</p>
                </p>
            </div>

            <div class="w-100">
                <a href="" class="btn btn-warning w-100 rounded">
                    Donasi Sekarang
                </a>
            </div>
        </div>

        <br>
        <div class="rounded card bg-dark text-white p-3">
            <div class="card-header" style="border-bottom: grey 1px solid">
                <h4>
                    Donatur
                </h4>
            </div>

            <div class="card-body" style="font-style: normal">
                <div class="row p-4 rounded" style="background-color: grey">
                    <div class="col-4">
                        <img class="img rounded-pill" src="{{ asset('assets/image/logo/logo.jpeg') }}" width="50%"
                            height="auto">
                    </div>

                    <div class="col-8">
                        <p>
                            <b>
                                Muhammad Rizky P
                            </b>
                        </p>

                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae qui nemo, obcaecati a iste
                            aliquam. Qui quidem iure quis et voluptas dolorum quam alias earum aspernatur, officiis iste
                            inventore sint!
                        </p>

                        <br>

                        <div style="text-align: right">
                            <i>
                                {{ date('Y-m-d H:i:s') }}
                            </i>
                        </div>
                    </div>
                </div>

                <br>

                <div class="row p-4 rounded" style="background-color: grey">
                    <div class="col-4">
                        <img class="img rounded-pill" src="{{ asset('assets/image/logo/logo.jpeg') }}" width="50%"
                            height="auto">
                    </div>

                    <div class="col-8">
                        <p>
                            <b>
                                Muhammad Rizky P
                            </b>
                        </p>

                        <p>
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptas omnis ullam molestiae officia
                            repudiandae sed porro repellat quia excepturi laborum quidem sunt, ea necessitatibus nam quo
                            enim dolores accusantium aut?
                        </p>

                        <div style="text-align: right">
                            <i>
                                {{ date('Y-m-d H:i:s') }}
                            </i>
                        </div>
                    </div>
                </div>

                <br>

                <div class="row p-4 rounded" style="background-color: grey">
                    <div class="col-4">
                        <img class="img rounded-pill" src="{{ asset('assets/image/logo/logo.jpeg') }}" width="50%"
                            height="auto">
                    </div>

                    <div class="col-8">
                        <p>
                            <b>
                                Muhammad Rizky P
                            </b>
                        </p>

                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid fuga ad, quas magnam
                            praesentium dolor maxime. Explicabo eligendi veniam sed similique provident temporibus, ea,
                            perspiciatis nam autem nemo repudiandae! Nisi optio assumenda harum voluptatum nesciunt quas
                            minima voluptatem doloremque, sunt, itaque distinctio. Accusantium facilis voluptatem
                            exercitationem commodi. Deserunt, inventore id.
                        </p>

                        <div style="text-align: right">
                            <i>
                                {{ date('Y-m-d H:i:s') }}
                            </i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>

        <div class="rounded card bg-dark text-white p-3">
            <div class="card-header" style="border-bottom: grey 1px solid">
                <h4>
                    Penggalang Dana
                </h4>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <img class="img rounded-pill" src="{{ asset('assets/image/logo/logo.jpeg') }}" width="100%"
                            height="auto">
                    </div>

                    <div class="col-8">
                        <p>
                            <b>
                                Ilman Nafi'an Center
                            </b>
                        </p>

                        <p>
                            Sebuah proses long life education, yang akan memudahkan Menghafal Al Qur’an sesuai genetika, ETC
                            mencetak pengajar Al Qur’an yang mempunyai hafalan mutqin, yang menciptakan amalan Qur’an dalam
                            kehidupannya sehari-hari.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
