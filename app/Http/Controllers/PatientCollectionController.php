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
        PatientCollection::create([
            'clinic_req_number' => $request->clinic_req_number,
            'test_type_id' => 1,
            'lab_id' => 1,
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
            'race_id' => 1,
            'ethnicity_id' => 1,
            'proof_id' => 1,
            'state_code' => 12345,
            'insurance_provider' => $request->insurance_provider,
            'insurance_policy_number' => 123456,
        ]);

        return redirect()->route('collection.index');
    }
}
