<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function list()
    {
        $customers = User::where('role', 'user')->with('customer')->orderBy('id', 'DESC')->paginate(10);

        return view('admin.customer.list', compact('customers'));
    }

    public function store()
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required|numeric',
        ]);

        try {
            // DB::transaction(function () {
            $user = User::create([
                'name' => request()->name,
                'email' => request()->email,
                'role' => 'user',
                'password' => Hash::make('password')
            ]);

            $customer = Customer::create([
                'user_id' => $user->id,
                'phone_number' => request()->phone_number,
                'address' => request()->address,
            ]);
            // });

            return back()->with('success', 'data Kamar Berhasil di tambahkan');
        } catch (QueryException $error) {
            return $error;
            return view('errror-page');
        }
    }

    public function delete($id)
    {
        try {
            $customer = User::find($id);

            if ($customer == null) {
                return back()->with('fail', 'data kamar gagal dihapus');
            }

            $customer->delete();

            return back()->with('success', 'data Kamar Berhasil di hapus');
        } catch (QueryException $error) {
            return view('errror-page');
        }
    }

    public function show($id)
    {
        $customer = User::with('customer')->find($id);
        return view('admin.customer.show', compact('customer'));
    }
}
