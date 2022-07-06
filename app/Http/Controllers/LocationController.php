<?php

namespace App\Http\Controllers;

use App\Models\Lab;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['locations'] = Location::get();
        return view('location.index')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        Location::create([
            'location_name' => $request->location_name,
            'contant_person' => $request->contant_person,
            'contact_number' => $request->contact_number,
            'clinic' => $request->clinic,
            'timezone' => $request->timezone,
        ]);

        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Location::find($request->id)->update([
            'location_name' => $request->location_name,
            'contant_person' => $request->contant_person,
            'contact_number' => $request->contact_number,
            'clinic' => $request->clinic,
            'timezone' => $request->timezone,
            'status' => $request->status == 1 ? 1 : 0
        ]);

        return back();
    }

    public function init()
    {
        $data['labs'] = Lab::get();
        $data['locations'] = Location::get();
        return view('location.init')->with($data);
    }
}
