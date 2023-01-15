@extends('layout.layout-admin')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Halaman Customer</h1>

    <div class="card shadow mb-4 col">
        <div class="card-header py-3 row">
            <div class="col-6">
                <h6 class="m-0 font-weight-bold text-primary">Data Customer di Hotelku</h6>
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
                            <th>Gambar</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Telp</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Gambar</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Telp</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @php $i = 1; @endphp
                        @foreach ($customers as $customer)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td class="text-center"><img
                                        src="{{ $customer->image == null || $customer->image == '' ? asset('assets/image/profile/guest.png') : $customer->image }}"
                                        alt="gambar Customer" width="40%" height="40%"></td>
                                <td><b>{{ $customer->name }}</b></td>
                                <th>{{ $customer->email }}</th>
                                <th>{{ $customer->customer->phone_number }}</th>
                                <td>
                                    <form class="mb-3" action="{{ route('customer.delete', $customer->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            onclick="return confirm('Anda Yakin ingin Menghapus Data ini ?')"
                                            class="btn btn-danger rounded">Hapus Data</button>
                                    </form>
                                    <a href="{{ route('customer.show', $customer->id) }}" class="btn btn-success">Detail
                                        Data</a>
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
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Customer</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('customer.store') }}" method="POST">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="name"
                                    placeholder="Masukan Nama customer" required>
                            </div>

                            <div class="input-group mb-3">
                                <input type="email" class="form-control" name="email"
                                    placeholder="Masukan Email customer" required>
                            </div>

                            <div class="input-group mb-3">
                                <input type="number" class="form-control" name="phone_number"
                                    placeholder="No Telp Customer" required>
                            </div>

                            <div class="my-3">
                                <label for="address">Alamat Customer (optional) : </label>
                                <textarea name="address" id="address"></textarea>
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

        {{ $customers->links() }}

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
