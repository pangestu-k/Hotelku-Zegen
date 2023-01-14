<?php

namespace App\Http\Controllers\Hotelku;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function register_store()
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|confirmed|min:6',
        ]);

        try {
            User::create([
                'nama' => request()->name,
                'email' => request()->email,
                'password' => Hash::make(request()->password),
                'role' => 'user'
            ]);

            Auth::attempt(request()->only('email', 'password'));
            return redirect()->route('profile');
        } catch (QueryException $errror) {
            return view('errror-page');
        }
    }

    public function login_store()
    {
        $this->validate(request(), [
            'email' => 'required',
        ]);

        try {
            $user = User::where('email', request()->email)->first();
            if ($user == null) {
                return back()->with('fail', ['email' => 'Email anda belum terdaftar.'])->with('email', request()->email);
            } else {
                if (Hash::check(request()->password, $user->password)) {
                    Auth::attempt(request()->only('email', 'password'));
                    return redirect()->route('welcome');
                } else {
                    return back()->with('fail', ['password' => 'Password yang anda masukan salah'])->with('email', request()->email);
                }
            }
        } catch (QueryException $errror) {
            return view('errror-page');
        }
    }
}
