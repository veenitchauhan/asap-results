<?php

namespace App\Http\Controllers;

use App\Models\PatientCollection;
use Illuminate\Http\Request;

class PatientCollectionController extends Controller
{
    public function index()
    {
        $data['patient_collection'] = PatientCollection::get();
        return view('patient_collection.index')->with($data);
    }

    public function create()
    {
        return view('patient_collection.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'gender' => 'required',
            'clinic_req_number' => 'required',
            'test_type_id' => 'required',
            'lab_id' => 'required',
        ]);

        if (isset($validator) && $validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        PatientCollection::create([
            'clinic_req_number' => $request->clinic_req_number,
            'test_type_id' => $request->test_type_id,
            'lab_id' => $request->lab_id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
            'address' => $request->address,
            'address_2' => $request->address_2,
            'city' => $request->city,
            'state' => $request->state,
            'zipcode' => $request->zipcode,
            'phone_number' => $request->phone_number,
            'email_id' => $request->email_id,
            'race_id' => $request->race_id,
            'ethnicity_id' => $request->ethnicity_id,
            'proof_id' => $request->proof_id,
            'state_code' => $request->state_code,
            'insurance_provider' => $request->insurance_provider,
            'insurance_policy_number' => $request->insurance_policy_number,
        ]);

        return redirect()->route('collection.index');
    }
}
