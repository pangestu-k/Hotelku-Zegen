<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function list()
    {
        $types = Type::orderBy('id', 'ASC')->paginate(10);
        return view('admin.type.list', compact('types'));
    }
}
