<?php

namespace App\Http\Controllers;

use App\Models\TestType;
use Illuminate\Http\Request;

class TestTypeController extends Controller
{
    public function index()
    {
        $data['test_types'] = TestType::get();
        return view('test_type.index')->with($data);
    }

    public function store(Request $request)
    {
        TestType::create([
            'name' => $request->name
        ]);

        return back();
    }

    public function update(Request $request)
    {
        TestType::find($request->test_type_id)->update([
            'name' => $request->name
        ]);

        return back();
    }

    public function destroy($test_type_id)
    {
        TestType::find($test_type_id)->delete();

        return back();
    }
}
