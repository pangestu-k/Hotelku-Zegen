@extends('layout.layout-admin')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Halaman Lantai</h1>

    <div class="card shadow mb-4 col">
        <div class="card-header py-3 row">
            <div class="col-6">
                <h6 class="m-0 font-weight-bold text-primary">Data Lantai di Hotelku</h6>
            </div>
            <div class="col-6 text-right">
                <button type="button" class="btn btn-success rounded-pill" data-toggle="modal" data-target="#form">
                    Tambah Data +
                </button>
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
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @php $i = 1; @endphp
                        @foreach ($floors as $floor)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>Lantai {{ $floor->name }}</td>
                                <td>
                                    <a href="{{ route('floor.edit', $floor->id) }}" class="btn btn-warning rounded">Edit
                                        Data</a>
                                    <form action="{{ route('floor.delete', $floor->id) }}" class="d-inline" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            onclick="return confirm('Anda Yakin ingin Menghapus Data ini ?')"
                                            class="btn btn-danger rounded">Hapus Data</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="form" data-backdrop="static" tabindex="-1" role="dialog"
            aria-labelledby="formLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Lantai</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('floor.store') }}" method="POST">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="number" class="form-control" name="name"
                                    placeholder="Cukup masukan angka lantai" required>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{ $floors->links() }}
    @endsection
