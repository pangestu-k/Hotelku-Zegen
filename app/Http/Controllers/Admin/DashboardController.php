<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $total = Order::where('status', 'confirmed')->orWhere('status', 'rescheadule')->sum('total');
        $pending = Order::where('status', 'pending')->get()->count();
        $waiting = Order::where('status', 'waiting')->get()->count();
        $confirmed = Order::where('status', 'confirmed')->get()->count();
        $rescheadule = Order::where('status', 'rescheadule')->get()->count();

        return view('admin.dashboard', compact('total', 'pending', 'waiting', 'confirmed', 'rescheadule'));
    }
}
