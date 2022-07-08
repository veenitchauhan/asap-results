<?php

namespace App\Http\Controllers;

use App\Models\Lab;
use App\Models\Location;
use App\Models\PatientCollection;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $data['labs'] = Lab::get();
        $data['locations'] = Location::get();
        $data['staff_count'] = User::where('is_admin', 0)->count();
        $data['locations_count'] = Location::count();
        $data['patients_count'] = PatientCollection::count();
        return view('dashboard')->with($data);
    }
}
