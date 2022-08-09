<?php

namespace App\Http\Controllers;

use App\Models\EligibilityPayer;
use Illuminate\Http\Request;

class EligibityPayerController extends Controller
{
    public function index()
    {
        $data['eligibility_payers'] = EligibilityPayer::orderBy('payer_name')->get();
        return view('eligibility_payer.index')->with($data);
    }

    public function store(Request $request)
    {
        EligibilityPayer::create([
            'payer_id' => $request->payer_id,
            'payer_name' => $request->payer_name
        ]);

        return back();
    }

    public function update(Request $request)
    {
        // dd($request->all());
        EligibilityPayer::find($request->id)->update([
            'payer_id' => $request->payer_id,
            'payer_name' => $request->payer_name
        ]);

        return back();
    }

    public function destroy($payer_id)
    {
        EligibilityPayer::find($payer_id)->delete();

        return back();
    }
}
