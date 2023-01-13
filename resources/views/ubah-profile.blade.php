@extends('layout.layout')

@section('content')
    <div class="container main-content my-4" style="padding-right: 23px">
        <div class="card p-4 rounded">
            <div class="card-header bg-dark text-white">
                Ubah Profil
            </div>

            <div class="card-body">
                <form action="{{ route('editProfile.store') }}">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email*</label>
                        <input type="email" class="form-control" placeholder="example : ilman@gmail.com" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Nama*</label>
                        <input type="password" class="form-control" placeholder="example : Hamba Allah">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-warning rounded-pill" style="width: 80%">Selesai</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
