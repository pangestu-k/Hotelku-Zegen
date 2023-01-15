<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;

class OrderAdminController extends Controller
{
    public function list()
    {
        $orders = Order::with('customer', 'room')->orderBy('id', 'DESC')->paginate(10);

        return view('admin.order.list', compact('orders'));
    }

    public function detail_pay($id)
    {
        $order = Order::with('customer')->find($id);
        return view('admin.order.detail-pay', compact('order'));
    }

    public function confirm_payment($id)
    {
        try {
            $order = Order::find($id);

            if ($order == null) {
                return back()->with('fail', 'data Order gagal dikonfirmasi');
            }

            $order->update([
                'status' => 'confirmed'
            ]);

            return redirect()->route('order-admin.list')->with('success', 'Pembayaran berhasil di konfirmasi');
        } catch (QueryException $error) {
            return view('errror-page');
        }
    }

    public function rescheadule($id)
    {
        $order = Order::with('customer')->find($id);
        return view('admin.order.rescheadule
        ', compact('order'));
    }

    public function rescheadule_confirm($id)
    {
        try {
            $order = Order::find($id);

            if ($order == null) {
                return back()->with('fail', 'data Rescheadule gagal dikonfirmasi');
            }

            $order->update([
                'status' => 'confirmed',
                'checkin_date' => $order->rescheadule,
                'checkout_date' => Carbon::create($order->rescheadule, 'asia/jakarta')->addDay($order->day),
                'rescheadule' => '',
            ]);

            return redirect()->route('order-admin.list')->with('success', 'Rescheadule berhasil di konfirmasi');
        } catch (QueryException $error) {
            return view('errror-page');
        }
    }

    public function ignore_rescheadule($id)
    {
        try {
            $order = Order::find($id);

            if ($order == null) {
                return back()->with('fail', 'data Rescheadule gagal dikonfirmasi');
            }

            $order->update([
                'status' => 'confirmed',
                'rescheadule' => ''
            ]);

            return redirect()->route('order-admin.list')->with('success', 'Rescheadule berhasil di konfirmasi');
        } catch (QueryException $error) {
            return view('errror-page');
        }
    }
}
