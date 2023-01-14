<?php

namespace App\Http\Controllers\Hotelku;

use App\Models\Room;
use App\Models\Order;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;

class OrderController extends Controller
{
    public function order_user($id)
    {
        $orders = Order::where('customer_id', $id)->latest()->get();

        return view('order.order-user', compact('orders'));
    }

    public function order_room($id)
    {
        $room = Room::find($id);

        return view('order.order-now', compact('room'));
    }

    public function order_store($id)
    {
        $this->validate(request(), [
            'day' => 'required|numeric',
            'checkin' => 'required|date',
            'total' => 'required',
        ]);

        try {
            $room_price = Room::where('id', $id)->first('price')->price;
            $total = $room_price * request()->day;
            $checkin = request()->checkin;
            Order::create([
                'customer_id' => auth()->user()->customer->id,
                'room_id' => $id,
                'booking_date' => Carbon::now(),
                'day' => request()->day,
                'total' => $total,
                'checkin_date' => $checkin,
                'checkout_date' => Carbon::create($checkin, 'asia/jakarta')->addDay(request()->day),
                'status' => 'pending'
            ]);

            return redirect()->route('order.user', auth()->id());
        } catch (QueryException $error) {
            return view('errror-page');
        }
    }

    public function order_confirm($id)
    {
        $this->validate(request(), [
            'photo' => 'required|mimes:png,jpg,jpeg,gif'
        ]);

        try {
            if (request()->file('photo') !== null) {
                $image = base64_encode(file_get_contents(request()->file('photo')->path()));
                $order = Order::where('id', $id)->first();

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
                $img_name = 'order-' . time() . '.png';
                if (is_dir(public_path('assets/image/order')) == false) {
                    mkdir(public_path('assets/image/order'));
                }
                $img_file = public_path('assets/image/order/' . $img_name);
                imagepng($im, $img_file, 0);
                $photo = url('assets/image/profile/user/' . $img_name);

                $order->update([
                    'image' => $photo,
                    'status' => 'waiting',
                ]);
            }

            return redirect()->back()->with('success-addPhoto', 'Add Photo success');
        } catch (QueryException $error) {
            return view('errror-page');
        }
    }

    public function rescheadule($id)
    {
        $order = Order::find($id);
        return view('order.resheadule', compact('order'));
    }

    public function rescheadule_store($id)
    {
        $this->validate(request(), [
            'rescheadule' => 'required'
        ]);

        try {
            $order = Order::find($id);
            $rescheadule = request()->rescheadule;

            // $first = Carbon::create($order->checkin_date);
            // $check_date = Carbon::create($rescheadule)->between($first, $second);

            if ($rescheadule == $order->checkin_date) {
                return back()->with('fail', ['rescheadule' => 'Ini tanggal yang sama dengan Check In']);
            }

            $order->update([
                'rescheadule' => $rescheadule,
                'status' => 'rescheadule'
            ]);

            return redirect()->route('order.user', auth()->id());
        } catch (QueryException $error) {
            return view('errror-page');
        }
    }
}
