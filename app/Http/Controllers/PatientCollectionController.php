<?php

namespace App\Http\Controllers;

use App\Models\EligibilityPayer;
use App\Models\Ethnicity;
use App\Models\Lab;
use App\Models\Location;
use App\Models\PatientCollection;
use App\Models\Race;
use App\Models\Symptom;
use App\Models\TestType;
use Illuminate\Http\Request;

class PatientCollectionController extends Controller
{
    public function index()
    {
        $data['locations'] = Location::get();
        $data['eligibility_payers'] = EligibilityPayer::orderBy('payer_name')->get();
        $data['patient_collection'] = PatientCollection::get();
        return view('patient_collection.index')->with($data);
    }

    public function search(Request $request)
    {
        // dd($request->all());
        switch ($request->action) {
            case 'eligibility':
                $data['eligibility'] = $this->searchEligibility($request);
                // dd($data['eligibility']);
                // dd(isset($data['eligibility']->errors));
                return view('patient_collection.search.eligibility')->with($data);
                break;

            default:
                $data = $this->searchPatient($request);
                break;
        }

        // return view('patient_collection.index')->with($data);
    }

    private function searchPatient($request)
    {
        $data['locations'] = Location::get();

        $where = [];
        $patient_collection = PatientCollection::query();

        if ($request->first_name) {
            $where['first_name'] = $request->first_name;
            $patient_collection->orWhere('first_name', 'LIKE', '%' . $request->first_name . '%');
        }
        if ($request->last_name) {
            $where['last_name'] = $request->last_name;
            $patient_collection->orWhere('last_name', 'LIKE', '%' . $request->last_name . '%');
        }
        if ($request->date_of_birth) {
            $where['date_of_birth'] = $request->date_of_birth;
            $patient_collection->orWhere('date_of_birth', 'LIKE', '%' . $request->date_of_birth . '%');
        }
        if ($request->location_id) {
            $where['lab_id'] = $request->location_id;
            $patient_collection->orWhere('lab_id', 'LIKE', '%' . $request->location_id . '%');
        }

        if (count($where) > 0) {
            $data['patient_collection'] = $patient_collection->distinct()->get();
        } else {
            $data['patient_collection'] = PatientCollection::get();
        }

        return $data;
    }

    public function searchEligibility($request)
    {
        // $this->getAccessTokenJWT();
        // dd($request->all());
        $token = $_ENV['BEARER_TOKEN'];
        $authorization = "Authorization: Bearer $token";

        $host = 'https://api.abilitynetwork.com/v1/eligibilities';
        $username = 'joel@asap-results.com';
        $password = 'Asap@123*';

        // $first_name = "james";
        // $last_name = "treadwell";
        // $date_of_birth = "1972-12-24";
        // $insurance_id = "117530589";
        // $payer_id = 10351;

        $first_name = $request->first_name;
        $last_name = $request->last_name;
        $date_of_birth = $request->date_of_birth;
        $insurance_id = $request->insurance_id;
        $payer_id = (int)$request->payer_id;

        $post = [
            "eligibilityRequest" => [
                "provider" => [
                    "npi" => 1902846306,
                    "lastName" => "ASAP Results, LLC"
                ],
                "subscriber" => [
                    "memberIdentifier" => $insurance_id,
                    "firstName" => $first_name,
                    "lastName" => $last_name,
                    "dateOfBirth" => $date_of_birth
                ],
                "serviceDates" => [
                    "start" => "2021-11-15"
                ],
                "serviceTypeCodes" => [
                    "serviceTypeCode" => ["30"]
                ],
                "payerIdentifier" => $payer_id
            ]
        ];
        $patientRecord = json_encode($post);

        // echo '<pre>';
        // echo $patientRecord;
        // die;

        $ch = curl_init($host);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', $authorization));
        curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $patientRecord);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $return = curl_exec($ch);
        $result = json_decode($return);
        curl_close($ch);
        return $result;
    }

    private function getAccessTokenJWT()
    {
        $host = "https://idp.myabilitynetwork.com/connect/token";
        $client_id = 'asap-results';
        $client_secret = 'm4deQGq54IwbuAXOFEbFdA==';

        $data = [
            'grant_type' => 'password',
            'username' => 'joel@asap-results.com',
            'password' => 'Asap@123*',
            'scope' => 'openid+ability:accessapi'
        ];
        $post_data = json_encode($data);

        $ch = curl_init($host);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_USERPWD, $client_id . ":" . $client_secret);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $return = curl_exec($ch);
        curl_close($ch); 

        dd($return);
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
        // dd($request->all());
        $proof_filename = null;
        if ($request->file('proof')) {
            $proof_filename = $request->file('proof')->store('public/proofs');
        }

        $insurance_card_front_filename = null;
        if ($request->file('insurance_card_front')) {
            $insurance_card_front_filename = $request->file('insurance_card_front')->store('public/insurance_card_fronts');
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
            'race_id' => $request->race_id,
            'ethnicity_id' => $request->ethnicity_id,
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
            'proof_filename' => str_replace("public", "storage", $proof_filename),
            'insurance_card_front_filename' => str_replace("public", "storage", $insurance_card_front_filename),
            'sample_collect_datetime' => $request->sample_collect_datetime,
            'signature' => $request->signature
        ]);

        return redirect()->route('collection.index');
    }

    public function edit($patient_id)
    {
        $data['test_types'] = TestType::get();
        $data['locations'] = Location::get();
        $data['races'] = Race::get();
        $data['ethnicities'] = Ethnicity::get();
        $data['patient'] = PatientCollection::find($patient_id);
        $data['symptoms'] = Symptom::where('test_type_id', $data['patient']->test_type_id)->get();
        return view('patient_collection.edit')->with($data);
    }

    public function retest($patient_id)
    {
        $data['test_types'] = TestType::get();
        $data['locations'] = Location::get();
        $data['races'] = Race::get();
        $data['ethnicities'] = Ethnicity::get();
        $data['patient'] = PatientCollection::find($patient_id);
        $data['symptoms'] = Symptom::where('test_type_id', $data['patient']->test_type_id)->get();
        return view('patient_collection.re-test')->with($data);
    }

    public function show($patiend_id)
    {
        $data['patient'] = PatientCollection::find($patiend_id);
        return view('patient_collection.show')->with($data);
    }

    public function update(Request $request, $patiend_id)
    {
        $updates = $request->except(['_token', 'id', '_method']);

        if ($request->symptoms) {
            $updates['symptoms'] = implode(',', $request->symptoms);
        }

        if ($request->is_minor) {
            $updates['is_minor'] = $request->is_minor ? 1 : 0;
        }
        if ($request->first_test) {
            $updates['first_test'] = $request->first_test ? 1 : 0;
        }
        if ($request->pregnant) {
            $updates['pregnant'] = $request->pregnant ? 1 : 0;
        }
        if ($request->healthcare) {
            $updates['healthcare'] = $request->healthcare ? 1 : 0;
        }
        if ($request->symptomatic) {
            $updates['symptomatic'] = $request->symptomatic ? 1 : 0;
        }
        if ($request->congregate) {
            $updates['congregate'] = $request->congregate ? 1 : 0;
        }
        if ($request->hospitalized) {
            $updates['hospitalized'] = $request->hospitalized ? 1 : 0;
        }
        if ($request->admitted) {
            $updates['admitted'] = $request->admitted ? 1 : 0;
        }

        if ($request->file('proof')) {
            $updates['proof_filename'] = str_replace("public", "storage", $request->file('proof')->store('public/proofs'));
            unset($updates['proof']);
        }
        if ($request->file('insurance_card_front')) {
            $updates['insurance_card_front_filename'] = str_replace("public", "storage", $request->file('insurance_card_front')->store('public/insurance_card_fronts'));
            unset($updates['insurance_card_front']);
        }

        if (!$request->signature) {
            unset($updates['signature']);
        }

        PatientCollection::find($patiend_id)->update($updates);

        return redirect()->route('collection.index');
    }

    public function api_check_eligibilty(Request $request)
    {
        $eligible = true;
        return $eligible;
    }
}
