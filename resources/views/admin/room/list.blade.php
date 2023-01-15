@extends('layout.layout-admin')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Halaman kamar</h1>

    <div class="card shadow mb-4 col">
        <div class="card-header py-3 row">
            <div class="col-6">
                <h6 class="m-0 font-weight-bold text-primary">Data kamar di Hotelku</h6>
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
                            <th>Tipe</th>
                            <th>Lantai</th>
                            <th>Harga</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Gambar</th>
                            <th>Nama</th>
                            <th>Tipe</th>
                            <th>Lantai</th>
                            <th>Harga</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @php $i = 1; @endphp
                        @foreach ($rooms as $room)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td class="text-center"><img src="{{ $room->image }}" alt="gambar kamar" width="70%"
                                        height="70%"></td>
                                <td>kamar <b>{{ $room->name }}</b></td>
                                <th>{{ $room->type->name }}</th>
                                <th>{{ $room->floor->name }}</th>
                                <th>Rp. {{ number_format($room->price) }}</th>
                                <td>
                                    <a href="{{ route('room-admin.edit', $room->id) }}"
                                        class="btn btn-warning rounded mb-3">Edit
                                        Data</a>
                                    <form class="mb-3" action="{{ route('room-admin.delete', $room->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            onclick="return confirm('Anda Yakin ingin Menghapus Data ini ?')"
                                            class="btn btn-danger rounded">Hapus Data</button>
                                    </form>
                                    <a href="{{ route('room-admin.show', $room->id) }}" class="btn btn-success">Detail
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
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data kamar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('room-admin.store') }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="number" class="form-control" name="name"
                                    placeholder="Masukan Nomer Kamar | ex : 123" required>
                            </div>

                            <div class="input-group mb-3">
                                <select name="type_id" class="form-control">
                                    @foreach ($types as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="input-group mb-3">
                                <select name="floor_id" class="form-control">
                                    @foreach ($floors as $floor)
                                        <option value="{{ $floor->id }}">Lantai {{ $floor->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="input-group mb-3">
                                <input type="number" class="form-control" name="price" placeholder="Harga kamar"
                                    required>
                            </div>

                            <div class="file-upload">
                                <button class="file-upload-btn" type="button"
                                    onclick="$('.file-upload-input').trigger( 'click' )">Pilih
                                    Gambar</button>

                                <div class="image-upload-wrap">
                                    <input class="file-upload-input" type='file' id="upload-image"
                                        onchange="readURL(this);" accept="image/*" name="photo" required />
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

                                <div class="my-3">
                                    <label for="desc">Deskripsi Kamar (optional) : </label>
                                    <textarea name="desc" id="desc"></textarea>
                                </div>

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

        {{ $rooms->links() }}

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

                ClassicEditor
                    .create(document.querySelector('#desc'))
                    .catch(error => {
                        console.error(error);
                    });
            </script>
        @endpush
    @endsection
