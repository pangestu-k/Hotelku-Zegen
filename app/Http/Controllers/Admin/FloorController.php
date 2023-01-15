<?php

namespace App\Http\Controllers\Admin;

use App\Models\Floor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;

class FloorController extends Controller
{
    public function list()
    {
        $floors = Floor::orderBy('name', 'ASC')->paginate(10);
        return view('admin.floor.list', compact('floors'));
    }

    public function store()
    {
        $this->validate(request(), [
            'name' => 'required'
        ]);

        try {
            $floor = Floor::create([
                'name' => request()->name
            ]);

            return back()->with('success', 'data Lantai Berhasil di tambahkan');
        } catch (QueryException $error) {
            return view('errror-page');
        }
    }

    public function delete($id)
    {
        try {
            $floor = Floor::find($id);

            if ($floor == null) {
                return back()->with('fail', 'data Lantai gagal dihapus');
            }

            $floor->delete();

            return back()->with('success', 'data Lantai Berhasil di hapus');
        } catch (QueryException $error) {
            return view('errror-page');
        }
    }

    public function edit($id)
    {
        $floor = Floor::find($id);
        return view('admin.floor.edit', compact('floor'));
    }

    public function update($id)
    {
        $this->validate(request(), [
            'name' => 'required'
        ]);

        try {
            $floor = Floor::find($id);

            if ($floor == null) {
                return back()->with('fail', 'data Lantai gagal dihapus');
            }

            $floor->update([
                'name' => request()->name
            ]);

            return redirect()->route('floor.list')->with('success', 'data Lantai Berhasil di edit');
        } catch (QueryException $error) {
            return view('errror-page');
        }
    }
}
