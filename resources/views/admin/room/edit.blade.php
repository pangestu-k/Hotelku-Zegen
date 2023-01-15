@extends('layout.layout-admin')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Halaman Edit</h1>

    <div class="card shadow mb-4 col">
        <div class="card-header py-3 row">
            Edit Data Kamar
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
            <form action="{{ route('room-admin.update', $room->id) }}" enctype="multipart/form-data" method="POST">
                @csrf
                @method('PUT')
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="old-name" value="Kamar : {{ $room->name }}" readonly>
                </div>

                <div class="input-group mb-3">
                    <input type="number" class="form-control" name="name"
                        placeholder="Masukan Nomber Kamar Jika ingin mengubah | ex : 123">
                </div>

                <div class="input-group mb-3">
                    <select name="type_id" class="form-control">
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}" {{ $room->type_id == $type->id ? 'selected' : '' }}>
                                {{ $type->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="input-group mb-3">
                    <select name="floor_id" class="form-control">
                        @foreach ($floors as $floor)
                            <option value="{{ $floor->id }}" {{ $room->floor_id == $floor->id ? 'selected' : '' }}>Lantai
                                {{ $floor->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="input-group mb-3">
                    <input type="number" class="form-control" name="price" placeholder="Harga kamar"
                        value="{{ $room->price }}" required>
                </div>

                <div class="file-upload">
                    <button class="file-upload-btn" type="button"
                        onclick="$('.file-upload-input').trigger( 'click' )">Pilih
                        Gambar</button>

                    <div class="image-upload-wrap">
                        <input class="file-upload-input" type='file' id="upload-image" onchange="readURL(this);"
                            accept="image/*" name="photo" />
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
                        @if ($room->desc == null || $room->desc == '')
                            <textarea name="desc" id="desc"></textarea>
                        @else
                            <textarea name="desc" id="desc">{{ $room->desc }}</textarea>
                        @endif
                    </div>
                </div>

                <div class="card-footer text-right">
                    <a href="{{ route('room-admin.list') }}" class="btn btn-secondary" data-dismiss="modal">Kembali</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
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

            ClassicEditor
                .create(document.querySelector('#desc'))
                .catch(error => {
                    console.error(error);
                });
        </script>
    @endpush
@endsection
