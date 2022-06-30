<?php

namespace App\Http\Controllers;

use App\Models\Race;
use Illuminate\Http\Request;

class RaceController extends Controller
{
    public function index()
    {
        $data['races'] = Race::get();
        return view('race.index')->with($data);
    }

    public function store(Request $request)
    {
        Race::create([
            'name' => $request->name
        ]);

        return back();
    }

    public function update(Request $request)
    {
        Race::find($request->race_id)->update([
            'name' => $request->name
        ]);

        return back();
    }

    public function destroy($race_id)
    {
        Race::find($race_id)->delete();

        return back();
    }
}
