<?php

namespace App\Http\Controllers;

use App\Models\Ethnicity;
use App\Models\Lab;
use App\Models\Location;
use App\Models\PatientCollection;
use App\Models\Race;
use App\Models\TestType;
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
        $data['test_types'] = TestType::get();
        $data['locations'] = Location::get();
        $data['races'] = Race::get();
        $data['ethnicities'] = Ethnicity::get();
        return view('patient_collection.create')->with($data);
    }

    public function store(Request $request)
    {
        $proof_filename = null;
        if ($request->file('proof')) {
            $proof_filename = $request->file('proof')->store('proofs');
        }

        $insurance_card_front_filename = null;
        if ($request->file('insurance_card_front')) {
            $insurance_card_front_filename = $request->file('insurance_card_front')->store('insurance_card_fronts');
        }

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

        // dd($request->all());
        PatientCollection::create([
            'clinic_req_number' => $request->clinic_req_number,
            'test_type_id' => $request->test_type_id,
            'lab_id' => $request->lab_id,
            'symptoms' => implode(',', $request->symptoms),
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
            'race_id' => $request->race,
            'ethnicity_id' => $request->ethnicity,
            'proof_id' => $request->proof_id,
            'state_code' => $request->state_code,
            'insurance_provider' => $request->insurance_provider,
            'insurance_policy_number' => $request->insurance_policy_number,
            'first_test' => $request->first_test ? 1 : 0,
            'pregnant' => $request->pregnant ? 1 : 0,
            'healthcare' => $request->healthcare ? 1 : 0,
            'symptomatic' => $request->symptomatic ? 1 : 0,
            'congregate' => $request->congregate ? 1 : 0,
            'hospitalized' => $request->hospitalized ? 1 : 0,
            'admitted' => $request->admitted ? 1 : 0,
            'proof_filename' => $proof_filename,
            'insurance_card_front_filename' => $insurance_card_front_filename,
            'sample_collect_datetime' => $request->sample_collect_datetime
        ]);

        return redirect()->route('collection.index');
    }
}
