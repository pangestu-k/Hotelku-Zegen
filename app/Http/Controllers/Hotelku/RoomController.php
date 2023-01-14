<?php

namespace App\Http\Controllers\Hotelku;

use App\Models\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoomController extends Controller
{
    public function room()
    {
        $rooms = Room::with('type')->inRandomOrder()->get();

        return view('room.room', compact('rooms'));
    }

    public function room_category($id)
    {
        $rooms = Room::where('type_id', $id)->with('type')->inRandomOrder()->get();

        return view('room.room', compact('rooms'));
    }

    public function detail($id)
    {
        $room = Room::find($id);

        return view('room.detail-kamar', compact('room'));
    }
}
