<?php

namespace App\Http\Controllers;

use App\Models\Lab;
use Illuminate\Http\Request;

class LabController extends Controller
{
    public function index()
    {
        $data['labs'] = Lab::get();
        return view('lab.index')->with($data);
    }

    public function store(Request $request)
    {
        Lab::create([
            'name' => $request->name
        ]);

        return back();
    }

    public function update(Request $request)
    {
        Lab::find($request->lab_id)->update([
            'name' => $request->name
        ]);

        return back();
    }

    public function destroy($lab_id)
    {
        Lab::find($lab_id)->delete();

        return back();
    }
}
