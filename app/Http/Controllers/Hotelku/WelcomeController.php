<?php

namespace App\Http\Controllers\Hotelku;

use App\Models\Room;
use App\Models\Type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WelcomeController extends Controller
{
    public function index()
    {
        $rooms = Room::with('type')->inRandomOrder()->get();
        $types = Type::orderBy('id', 'ASC')->get();
        return view('welcome', compact('rooms', 'types'));
    }
}
