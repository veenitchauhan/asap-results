@extends('layouts.app', ['activePage' => 'collection', 'titlePage' => __('Locations')])

@section('content')
<div class="content">

    <patient-collection inline-template>
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="alert alert-secondary" role="alert">
                    This form is under development for input fields, color scheme and backend processing is not done yet.
                </div>

                <a href="{{ route('collection.index') }}">
                    <button type="button" class="btn btn-secondry" data-toggle="modal" data-target="#addNewUserModal">
                        Back
                    </button>
                </a>

                <div class="card">
                    <div class="card-header card-header-warning">
                        <h4 class="card-title font-weight-bold">Add Patient Collection</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('collection.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id">
                            <div class="form-group row">
                                <div class="label col-3 offset-1">Clinic Req #: </div>
                                <input type="text" name="clinic_req_number" class="form-control col-6" placeholder="Clinic Req#">
                            </div>
                            <div class="form-group required row">
                                <div class="label col-3 offset-1">Select Test Type: </div>
                                <select name="test_type" class="col-6 custom-select">
                                    <option selected>--Select--</option>
                                    <option value="">SARS-CoV-2 RT-PCR</option>
                                </select>
                            </div>
                            <div class="form-group row">
                                <div class="label col-3 offset-1">LAB: </div>
                                <select name="lab" class="col-6 custom-select">
                                    <option selected>--Select--</option>
                                    <option value="">ASAP Results</option>
                                </select>
                            </div>
                            <div class="form-group required required row">
                                <div class="label col-3 offset-1">First Name: </div>
                                <input type="text" name="first_name" class="form-control col-6" placeholder="First Name">
                            </div>
                            <div class="form-group required required row">
                                <div class="label col-3 offset-1">Last Name: </div>
                                <input type="text" name="last_name" class="form-control col-6" placeholder="Last Name">
                            </div>
                            <div class="form-group required row">
                                <div class="label col-3 offset-1">DOB: </div>
                                <input type="date" name="date_of_birth" class="form-control col-6" placeholder="Enter DOB">
                            </div>
                            <div class="form-group required row">
                                <div class="label col-3 offset-1">Is Minor: </div>
                                <div class="custom-control custom-switch">
                                    <input name="is_minor" type="checkbox" class="custom-control-input" id="isMinor">
                                    <label class="custom-control-label" for="isMinor">Toggel if Minor</label>
                                </div>
                            </div>
                            <div class="form-group required row">
                                <div class="label col-3 offset-1">Gender: </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="customRadio" name="gender" value="male">
                                    <label class="custom-control-label" for="customRadio">Male</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="customRadio2" name="gender" value="female">
                                    <label class="custom-control-label" for="customRadio2">Female</label>
                                </div>
                            </div>
                            <div class="form-group required row">
                                <div class="label col-3 offset-1">Address: </div>
                                <input type="text" name="address" class="form-control col-6" placeholder="Address">
                            </div>
                            <div class="form-group required row">
                                <div class="label col-3 offset-1">Address 2: </div>
                                <input type="text" name="address_2" class="form-control col-6" placeholder="Address 2">
                            </div>
                            <div class="form-group required row">
                                <div class="label col-3 offset-1">City: </div>
                                <input type="text" name="city" class="form-control col-6" placeholder="City">
                            </div>
                            <div class="form-group required row">
                                <div class="label col-3 offset-1">State: </div>
                                <input type="text" name="state" class="form-control col-6" placeholder="State">
                            </div>
                            <div class="form-group required row">
                                <div class="label col-3 offset-1">Zipcode: </div>
                                <input type="text" name="zipcode" class="form-control col-6" placeholder="Zipcode">
                            </div>
                            <div class="form-group required row">
                                <div class="label col-3 offset-1">Phone Number: </div>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="havePhoneNumber" v-model="havePhoneNumber">
                                    <label class="custom-control-label" for="havePhoneNumber">Have Phone Number?</label>
                                </div>
                            </div>
                            <div v-if="havePhoneNumber" class="form-group required row">
                                <input type="text" name="phone_number" class="form-control col-6 offset-4" placeholder="Enter Phone Number">
                            </div>
                            <div class="form-group required row">
                                <div class="label col-3 offset-1">Email ID: </div>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="haveEmailID" v-model="haveEmailID">
                                    <label class="custom-control-label" for="haveEmailID">Have Email ID?</label>
                                </div>
                            </div>
                            <div  v-if="haveEmailID" class="form-group required row">
                                <input type="text" name="email_id" class="form-control col-6 offset-4" placeholder="Enter Email ID">
                            </div>
                            <div class="form-group required row">
                                <div class="label col-3 offset-1">Choose Race: </div>
                                <select name="race" class="col-6 custom-select">
                                    <option selected>--Select--</option>
                                </select>
                            </div>
                            <div class="form-group required row">
                                <div class="label col-3 offset-1">Choose Ethnicity: </div>
                                <select name="ethnicity" class="col-6 custom-select">
                                    <option selected>--Select--</option>
                                </select>
                            </div>
                            <div class="form-group required row">
                                <div class="label col-3 offset-1">SSN/Driver/Passport ID/Other: </div>
                                <select name="proof" class="col-6 custom-select">
                                    <option selected>--Select--</option>
                                    <option value="ssn">SSN</option>
                                    <option value="driver">Driver</option>
                                    <option value="passport_id">Passport ID</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="form-group required row">
                                <div class="label col-3 offset-1">Select ID No.: </div>
                                <input type="text" name="id" class="form-control col-6" placeholder="00000000">
                            </div>
                            <div class="form-group required row">
                                <div class="label col-3 offset-1">State listed on selected ID: </div>
                                <input type="text" name="state_code" class="form-control col-6" placeholder="State Code">
                            </div>
                            <div class="form-group required row">
                                <div class="label col-3 offset-1">Insurance Provider: </div>
                                <input type="text" name="insurance_provider" class="form-control col-6" placeholder="Insurance Provider">
                            </div>
                            <div class="form-group required row">
                                <div class="label col-3 offset-1">Insurance Policy #: </div>
                                <input type="text" name="insurance_policy" class="form-control col-6" placeholder="Insurance Policy #">
                            </div>
                            <div class="form-group required row">
                                <div class="label col-3 offset-1">Insurance Eligibility Verification #: </div>
                                <input type="text" name="eligibility" class="form-control col-6" placeholder="Validate Insurance Number">
                            </div>
                            <div class="form-group required row">
                                <div class="label col-3 offset-1">Insurance Discovery: </div>
                                <input type="text" name="insurance" class="form-control col-6" placeholder="Insurance Discovery">
                            </div>
                            <div class="form-group required row">
                                <div class="label col-3 offset-1">First Test: </div>
                                <div class="custom-control custom-switch">
                                    <input name="first_test" type="checkbox" class="custom-control-input" id="isFirstTest">
                                    <label class="custom-control-label" for="isFirstTest">Is this your first test</label>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-warning my-auto">Save</button>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </patient-collection>

</div>
@endsection