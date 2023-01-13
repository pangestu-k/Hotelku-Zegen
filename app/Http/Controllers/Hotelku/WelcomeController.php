<?php

namespace App\Http\Controllers\Hotelku;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function __construct()
    {
        if (auth()->user() !== null) {
            return redirect()->route('login')->send();
        }
    }

    public function index()
    {
        return view('welcome');
    }
}
