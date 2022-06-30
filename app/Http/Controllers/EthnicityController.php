<?php

namespace App\Http\Controllers;

use App\Models\Ethnicity;
use Illuminate\Http\Request;

class EthnicityController extends Controller
{
    public function index()
    {
        $data['ethnicities'] = Ethnicity::get();
        return view('ethnicity.index')->with($data);
    }

    public function store(Request $request)
    {
        Ethnicity::create([
            'name' => $request->name
        ]);

        return back();
    }

    public function update(Request $request)
    {
        Ethnicity::find($request->ethnicity_id)->update([
            'name' => $request->name
        ]);

        return back();
    }

    public function destroy($ethnicity_id)
    {
        Ethnicity::find($ethnicity_id)->delete();

        return back();
    }
}
