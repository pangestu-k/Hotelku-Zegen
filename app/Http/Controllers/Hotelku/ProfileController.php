<?php

namespace App\Http\Controllers\Hotelku;

use App\Models\User;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.profile');
    }

    public function editProfile()
    {
        return view('profile.ubah-profile');
    }

    public function editProfileStore()
    {
        $this->validate(request(), [
            'name' => 'required',
            'phone_number' => 'required',
        ]);

        try {
            DB::transaction(function () {
                $user = User::where('email', auth()->user()->email)->first();
                $user->update([
                    'name' => request()->name,
                ]);

                $customer = Customer::where('user_id', auth()->id())->first();
                $customer->update([
                    'phone_number' => request()->phone_number,
                    'address' => request()->address,
                ]);
            });

            return redirect()->back()->with('success', ['profile' => 'Profile anda berhasil di update.']);
        } catch (QueryException $errror) {
            return view('errror-page');
        }
    }

    public function editPassword()
    {
        return view('profile.ubah-password');
    }

    public function editPasswordStore()
    {
        $this->validate(request(), [
            'oldPass' => 'required',
            'password' => 'required|min:6',
        ]);

        try {
            if (Hash::check(request()->oldPass, auth()->user()->password) == false) {
                return back()->with('fail', ['password' => 'Password lama anda salah']);
            }

            $user = User::where('email', auth()->user()->email)->first();
            $user->update([
                'password' => Hash::make(request()->password)
            ]);

            return redirect()->back()->with('success', ['passowrd' => 'Password anda berhasil di update.']);
        } catch (QueryException $errror) {
            return view('errror-page');
        }
    }

    public function logout()
    {
        try {
            Auth::logout();
            return redirect()->route('profile');
        } catch (QueryException $errror) {
            return view('errror-page');
        }
    }

    public function addPhoto()
    {
        $this->validate(request(), [
            'photo' => 'required|mimes:png,jpg,jpeg,gif'
        ]);

        try {
            if (request()->file('photo') !== null) {
                if (auth()->user()->image == null) {
                    $image = base64_encode(file_get_contents(request()->file('photo')->path()));

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
                    $img_name = 'user-' . time() . '.png';
                    if (is_dir(public_path('assets/image/profile/user')) == false) {
                        mkdir(public_path('assets/image/profile/user'));
                    }
                    $img_file = public_path('assets/image/profile/user/' . $img_name);
                    imagepng($im, $img_file, 0);
                    $photo = url('assets/image/profile/user/' . $img_name);

                    $user = User::where('email', auth()->user()->email)->first();
                    $user->update([
                        'image' => $photo
                    ]);
                } else {
                    // update gambar
                    $current_photo = auth()->user()->image;
                    $current_photo = explode(url('') . '/', $current_photo);
                    $current_photo = end($current_photo);

                    // delete gambar if file exist
                    if (file_exists(public_path($current_photo)) == true) {
                        unlink($current_photo);
                    }

                    $image = base64_encode(file_get_contents(request()->file('photo')->path()));

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
                    $img_name = 'user-' . time() . '.png';
                    if (is_dir(public_path('assets/image/profile/user')) == false) {
                        mkdir(public_path('assets/image/profile/user'));
                    }
                    $img_file = public_path('assets/image/profile/user/' . $img_name);
                    imagepng($im, $img_file, 0);
                    $photo = url('assets/image/profile/user/' . $img_name);

                    $user = User::where('email', auth()->user()->email)->first();
                    $user->update([
                        'image' => $photo
                    ]);
                }
            }

            return redirect()->back()->with('success-addPhoto', 'Add Photo success');
        } catch (QueryException $errror) {
            return view('errror-page');
        }
    }
}
