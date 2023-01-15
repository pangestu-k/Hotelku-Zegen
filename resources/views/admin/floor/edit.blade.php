@extends('layout.layout-admin')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Halaman Edit</h1>

    <div class="card shadow mb-4 col">
        <div class="card-header py-3 row">
            Edit Data Lantai
        </div>
        <div class="card-body">
            @if (Session::get('fail') !== null)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Berhasil, </strong> {{ Session::get('fail') }}.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <form action="{{ route('floor.update', $floor->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="input-group mb-3">
                    <input type="number" class="form-control" name="name" value="{{ $floor->name }}"
                        placeholder="Cukup masukan angka lantai" required>
                </div>
        </div>
        <div class="modal-footer">
            <a href="{{ route('floor.list') }}" class="btn btn-secondary" data-dismiss="modal">Kembali</a>
            <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
