<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PatientCollectionController extends Controller
{
    public function index()
    {
        return view('patient_collection.index');
    }

    public function create()
    {
        return view('patient_collection.create');
    }
}
