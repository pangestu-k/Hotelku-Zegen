<?php

namespace App\Http\Controllers\Admin;

use App\Models\Room;
use App\Models\Type;
use App\Models\Floor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;

class RommAdminController extends Controller
{
    public function list()
    {
        $rooms = Room::with('type')->orderBy('id', 'DESC')->paginate(10);
        $floors = Floor::all();
        $types = Type::all();
        return view('admin.room.list', compact('rooms', 'floors', 'types'));
    }

    public function store()
    {
        $this->validate(request(), [
            'name' => 'required|numeric',
            'price' => 'required|numeric',
            'type_id' => 'required',
            'floor_id' => 'required',
        ]);

        try {
            $image = request()->file('photo');
            $photo = $this->addPhoto(null, $image);

            $tipe_name = Type::where('id', request()->type_id)->first('name')->name;
            $name = substr($tipe_name, '0', 2) . '-' . request()->name;

            $room = Room::create([
                'name' => $name,
                'price' => request()->price,
                'type_id' => request()->type_id,
                'floor_id' => request()->floor_id,
                'image' => $photo,
                'desc' => request()->desc,
            ]);

            return back()->with('success', 'data Kamar Berhasil di tambahkan');
        } catch (QueryException $error) {
            return view('errror-page');
        }
    }

    public function update($id)
    {
        $this->validate(request(), [
            'price' => 'required|numeric',
            'type_id' => 'required',
            'floor_id' => 'required',
        ]);

        try {
            $room = Room::find($id);

            $image = request()->file('photo');
            $photo = $this->addPhoto($room->image, $image);

            if (request()->name == null || request()->name == "") {
                $name = $room->name;
            } else {
                $tipe_name = Type::where('id', request()->type_id)->first('name')->name;
                $name = substr($tipe_name, '0', 2) . '-' . request()->name;
            }

            if ($room == null) {
                return back()->with('fail', 'data kamar gagal dihapus');
            }

            $room->update([
                'name' => $name,
                'price' => request()->price,
                'type_id' => request()->type_id,
                'floor_id' => request()->floor_id,
                'image' => $photo,
                'desc' => request()->desc,
            ]);

            return redirect()->route('room-admin.list')->with('success', 'data Kamar Berhasil di tambahkan');
        } catch (QueryException $error) {
            return view('errror-page');
        }
    }

    public function edit($id)
    {
        $room = Room::find($id);
        $floors = Floor::all();
        $types = Type::all();
        return view('admin.room.edit', compact('room', 'floors', 'types'));
    }

    public function delete($id)
    {
        try {
            $room = Room::find($id);

            // update gambar
            $current_photo = $room->image;
            $current_photo = explode(url('') . '/', $current_photo);
            $current_photo = end($current_photo);

            if ($room == null) {
                return back()->with('fail', 'data kamar gagal dihapus');
            }

            // delete gambar if file exist
            if (file_exists(public_path($current_photo)) == true) {
                unlink($current_photo);
            }

            $room->delete();

            return back()->with('success', 'data Kamar Berhasil di hapus');
        } catch (QueryException $error) {
            return view('errror-page');
        }
    }

    public function show($id)
    {
        $room = Room::with('floor', 'type')->find($id);
        return view('admin.room.show', compact('room'));
    }

    public function addPhoto($old_image, $new_image)
    {
        if ($new_image !== null) {
            if ($old_image == null || $old_image == "") {
                $image = base64_encode(file_get_contents($new_image->path()));

                // Obtain the original content (usually binary data)
                $bin = base64_decode($image);
                $decoded = base64_decode($image, true);

                // image verify check
                if (!is_string($image) || false === $decoded) {
                    return response()->json([
                        'status' => false,
                        'msg' => 'invalid format image'
                    ], 422);
                }

                // Load GD resource from binary data
                $im = imageCreateFromString($bin);

                if (!$im) {
                    return response()->json([
                        'status' => false,
                        'msg' => 'file is not an image'
                    ], 406);
                }

                // Specify the location where you want to save the image
                $img_name = 'room-' . time() . '.png';
                if (is_dir(public_path('assets/image/room/service')) == false) {
                    mkdir(public_path('assets/image/room/service'));
                }
                $img_file = public_path('assets/image/room/service/' . $img_name);
                imagepng($im, $img_file, 0);
                $photo = url('assets/image/room/service/' . $img_name);
            } else {
                // update gambar
                $current_photo = $old_image;
                $current_photo = explode(url('') . '/', $current_photo);
                $current_photo = end($current_photo);

                // delete gambar if file exist
                if (file_exists(public_path($current_photo)) == true) {
                    unlink($current_photo);
                }

                $image = base64_encode(file_get_contents($new_image->path()));

                // Obtain the original content (usually binary data)
                $bin = base64_decode($image);
                $decoded = base64_decode($image, true);

                // image verify check
                if (!is_string($image) || false === $decoded) {
                    return response()->json([
                        'status' => false,
                        'msg' => 'invalid format image'
                    ], 422);
                }

                // Load GD resource from binary data
                $im = imageCreateFromString($bin);

                if (!$im) {
                    return response()->json([
                        'status' => false,
                        'msg' => 'file is not an image'
                    ], 406);
                }

                // Specify the location where you want to save the image
                $img_name = 'room-' . time() . '.png';
                if (is_dir(public_path('assets/image/room/service')) == false) {
                    mkdir(public_path('assets/image/room/service'));
                }
                $img_file = public_path('assets/image/room/service/' . $img_name);
                imagepng($im, $img_file, 0);
                $photo = url('assets/image/room/service/' . $img_name);
            }
        } else {
            $photo = $old_image;
        }
        return $photo;
    }
}
