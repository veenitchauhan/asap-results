@extends('layouts.app', ['activePage' => 'collection', 'titlePage' => __('Locations')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="col-md-12">
            <a href="{{ route('collection.index') }}">
                <button type="button" class="btn btn-secondry" data-toggle="modal" data-target="#addNewUserModal">
                    Back
                </button>
            </a>

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="m-0">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="card">
                <div class="card-header card-header-warning">
                    <h4 class="card-title font-weight-bold">Profile: {{ $patient->first_name }} {{ $patient->last_name }}</h4>
                </div>

                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-3 offset-1">Clinic Req #:</dt>
                        <dd class="col-sm-8">{{ $patient->clinic_req_number }}</dd>

                        <dt class="col-sm-3 offset-1">Test Type:</dt>
                        <dd class="col-sm-8">{{ $patient->test_type->name }}</dd>

                        <dt class="col-sm-3 offset-1">Symptoms:</dt>
                        <dd class="col-sm-8">{{ $patient->symptoms }}</dd>

                        <!-- <dt class="col-sm-3 offset-1">Location:</dt>
                        <dd class="col-sm-8">{{ $patient->lab_id }}</dd> -->

                        <dt class="col-sm-3 offset-1">First Name:</dt>
                        <dd class="col-sm-8">{{ $patient->first_name }}</dd>

                        <dt class="col-sm-3 offset-1">Last Name:</dt>
                        <dd class="col-sm-8">{{ $patient->last_name }}</dd>

                        <dt class="col-sm-3 offset-1">DOB:</dt>
                        <dd class="col-sm-8">{{ $patient->date_of_birth }}</dd>

                        <dt class="col-sm-3 offset-1">Is Minor:</dt>
                        <dd class="col-sm-8">{{ $patient->is_minor ? 'Yes' : 'No' }}</dd>

                        <dt class="col-sm-3 offset-1">Gender:</dt>
                        <dd class="col-sm-8">{{ $patient->gender }}</dd>

                        <dt class="col-sm-3 offset-1">Address:</dt>
                        <dd class="col-sm-8">{{ $patient->address }}</dd>

                        <dt class="col-sm-3 offset-1">Address 2:</dt>
                        <dd class="col-sm-8">{{ $patient->address_2 }}</dd>

                        <dt class="col-sm-3 offset-1">City:</dt>
                        <dd class="col-sm-8">{{ $patient->city }}</dd>

                        <dt class="col-sm-3 offset-1">State:</dt>
                        <dd class="col-sm-8">{{ $patient->state }}</dd>

                        <dt class="col-sm-3 offset-1">Zipcode:</dt>
                        <dd class="col-sm-8">{{ $patient->zipcode }}</dd>

                        <dt class="col-sm-3 offset-1">Phone Number:</dt>
                        <dd class="col-sm-8">{{ $patient->phone_number }}</dd>

                        <dt class="col-sm-3 offset-1">Email ID:</dt>
                        <dd class="col-sm-8">{{ $patient->email_id }}</dd>

                        <dt class="col-sm-3 offset-1">Race:</dt>
                        <dd class="col-sm-8">{{ $patient->race->name }}</dd>

                        <dt class="col-sm-3 offset-1">Ethnicity:</dt>
                        <dd class="col-sm-8">{{ $patient->ethnicity->name }}</dd>

                        <!-- <dt class="col-sm-3 offset-1">Proof:</dt>
                        <dd class="col-sm-8">{{ $patient->proof_id }}</dd> -->

                        <dt class="col-sm-3 offset-1">Insurance Provider:</dt>
                        <dd class="col-sm-8">{{ $patient->insurance_provider }}</dd>

                        <dt class="col-sm-3 offset-1">Insurance Policy Number:</dt>
                        <dd class="col-sm-8">{{ $patient->insurance_policy_number }}</dd>

                        <dt class="col-sm-3 offset-1">First Test:</dt>
                        <dd class="col-sm-8">{{ $patient->first_test ? 'Yes' : 'No' }}</dd>

                        <dt class="col-sm-3 offset-1">Pregnant:</dt>
                        <dd class="col-sm-8">{{ $patient->pregnant ? 'Yes' : 'No' }}</dd>

                        <dt class="col-sm-3 offset-1">Works in healthcare:</dt>
                        <dd class="col-sm-8">{{ $patient->healthcare ? 'Yes' : 'No' }}</dd>

                        <dt class="col-sm-3 offset-1">Symptomatic as defined by the CDC:</dt>
                        <dd class="col-sm-8">{{ $patient->symptomatic ? 'Yes' : 'No' }}</dd>

                        <dt class="col-sm-3 offset-1">Lives in congregate care setting:</dt>
                        <dd class="col-sm-8">{{ $patient->congregate ? 'Yes' : 'No' }}</dd>

                        <dt class="col-sm-3 offset-1">Hospitalized:</dt>
                        <dd class="col-sm-8">{{ $patient->hospitalized ? 'Yes' : 'No' }}</dd>

                        <dt class="col-sm-3 offset-1">Admitted to the ICU:</dt>
                        <dd class="col-sm-8">{{ $patient->admitted ? 'Yes' : 'No' }}</dd>

                        <dt class="col-sm-3 offset-1">Proof:</dt>
                        <dd class="col-sm-8">
                            <img src="{{ asset($patient->proof_filename) }}" alt="profile Pic" style="height: 100px;">
                        </dd>

                        <dt class="col-sm-3 offset-1">Insurance Card:</dt>
                        <dd class="col-sm-8">
                            <img src="{{ asset($patient->insurance_card_front_filename) }}" alt="profile Pic" style="height: 100px;">
                        </dd>

                        <dt class="col-sm-3 offset-1">Sample Collect Date:</dt>
                        <dd class="col-sm-8">{{ $patient->sample_collect_datetime }}</dd>
                    </dl>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection