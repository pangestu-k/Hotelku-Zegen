<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Http\Controllers\Controller;

class PdfController extends Controller
{
    public function generatePdf()
    {
        $orders = Order::where('status', 'confirmed')->with('customer', 'room')->orderBy('id', 'DESC')->get();
        $total = Order::where('status', 'confirmed')->sum('total');

        return view('admin.pdf.pdf-load', compact('orders', 'total'));
    }
}
