<?php

namespace App\Http\Controllers;

use App\Models\Symptom;
use App\Models\TestType;
use Illuminate\Http\Request;

class SymptomController extends Controller
{
    public function show($test_type_id)
    {
        $data['test_type'] = TestType::find($test_type_id);
        $data['symptoms'] = Symptom::where('test_type_id', $test_type_id)->get();
        return view('symptom.show')->with($data);
    }

    public function store(Request $request)
    {
        Symptom::create([
            'test_type_id' => $request->test_type_id,
            'name' => $request->name
        ]);

        return back();
    }

    public function update(Request $request)
    {
        Symptom::find($request->symptom_id)->update([
            'name' => $request->name
        ]);

        return back();
    }

    public function destroy($symptom_id)
    {
        Symptom::find($symptom_id)->delete();

        return back();
    }

    public function api_get_symptoms(Request $request)
    {
        $symptoms = Symptom::where('test_type_id', $request->test_type_id)->get();

        $data = [];
        foreach ($symptoms as $symptom) {
            $data[] = [
                'name' => $symptom->name,
                'value' => $symptom->id
            ];
        }

        return $data;
    }
}
