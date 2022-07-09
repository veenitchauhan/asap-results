@extends('layouts.app', ['activePage' => 'collection', 'titlePage' => __('Locations')])

@section('content')
<div class="content">

    <patient-collection inline-template>
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="alert alert-secondary" role="alert">
                    This saving process is under development for insurance policy Varification, Discovery and Eligibility Verification
                </div>

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
                        <h4 class="card-title font-weight-bold">Add Patient Collection</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('collection.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id">
                            <div class="form-group row">
                                <div class="label col-3 offset-1">Clinic Req #: </div>
                                <input type="text" name="clinic_req_number" value="{{ $patient->clinic_req_number }}" class="form-control col-6 px-3" placeholder="Clinic Req#">
                            </div>
                            <div class="form-group required row">
                                <div class="label col-3 offset-1">Select Test Type: </div>
                                <select name="test_type_id" onchange="getSymptoms(this)" class="col-6 custom-select">
                                    <option value="" selected>--Select--</option>
                                    @foreach($test_types as $test_type)
                                    @if($test_type->id == $patient->test_type_id)
                                    <option value="{{ $test_type->id }}" selected>{{ $test_type->name }}</option>
                                    @else
                                    <option value="{{ $test_type->id }}">{{ $test_type->name }}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>

                            <div id="test_type_symptoms" class="form-group row">
                                <div class="label col-3 offset-1">Symptoms: </div>
                                <select multiple name="symptoms[]" id="symptoms" data-symptoms="{{ $patient->symptoms }}" class="col-6 offset-4 custom-select">
                                    @foreach($symptoms as $symptom)
                                    <option value="{{ $symptom->id }}">{{ $symptom->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group row">
                                <div class="label col-3 offset-1">Location: </div>
                                <select name="lab_id" class="col-6 custom-select">
                                    <option value="" selected>--Select--</option>
                                    @foreach($locations as $location)
                                    <option value="{{ $location->id }}">{{ $location->location_name }}</option>
                                    @if($location->id == $patient->lab_id)
                                    <option value="{{ $location->id }}" selected>{{ $location->location_name }}</option>
                                    @else
                                    <option value="{{ $location->id }}">{{ $location->location_name }}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group required required row">
                                <div class="label col-3 offset-1">First Name: </div>
                                <input type="text" name="first_name" value="{{  $patient->first_name }}" class="form-control col-6 px-3" placeholder="First Name">
                            </div>
                            <div class="form-group required required row">
                                <div class="label col-3 offset-1">Last Name: </div>
                                <input type="text" name="last_name" value="{{  $patient->last_name }}" class="form-control col-6 px-3" placeholder="Last Name">
                            </div>
                            <div class="form-group required row">
                                <div class="label col-3 offset-1">DOB: </div>
                                <input type="date" name="date_of_birth" value="{{  $patient->date_of_birth }}" class="form-control col-6 px-3" placeholder="Enter DOB">
                            </div>
                            <div class="form-group row">
                                <div class="label col-3 offset-1">Is Minor: </div>
                                <input name="is_minor" @if($patient->is_minor) checked @endif type="checkbox" data-on="Yes" data-off="No" data-toggle="toggle" data-onstyle="warning" data-size="xs">
                            </div>
                            <div class="form-group required row">
                                <div class="label col-3 offset-1">Gender: </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="customRadio" name="gender" @if($patient->gender == 'male') checked @endif value="male">
                                    <label class="custom-control-label" for="customRadio">Male</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="customRadio2" name="gender" @if($patient->gender == 'female') checked @endif value="female">
                                    <label class="custom-control-label" for="customRadio2">Female</label>
                                </div>
                            </div>
                            <div class="form-group required row">
                                <div class="label col-3 offset-1">Address: </div>
                                <input type="text" name="address" value="{{ $patient->address }}" id="address" class="form-control col-6 px-3">
                            </div>
                            <div class="form-group required row">
                                <div class="label col-3 offset-1">Address 2: </div>
                                <input type="text" name="address_2" value="{{ $patient->address_2 }}" class="form-control col-6 px-3" placeholder="Address 2">
                            </div>
                            <div class="form-group required row">
                                <div class="label col-3 offset-1">City: </div>
                                <input type="text" name="city" value="{{ $patient->city }}" class="form-control col-6 px-3" placeholder="City">
                            </div>
                            <div class="form-group required row">
                                <div class="label col-3 offset-1">State: </div>
                                <input type="text" name="state" value="{{ $patient->state }}" class="form-control col-6 px-3" placeholder="State">
                            </div>
                            <div class="form-group required row">
                                <div class="label col-3 offset-1">Zipcode: </div>
                                <input type="text" name="zipcode" value="{{ $patient->zipcode }}" class="form-control col-6 px-3" placeholder="Zipcode">
                            </div>
                            <div class="form-group required row">
                                <div class="label col-3 offset-1">Phone Number: </div>
                                <input type="text" name="phone_number" value="{{ $patient->phone_number }}" class="form-control col-6 px-3" placeholder="Enter Phone Number">
                            </div>
                            <div class="form-group required row">
                                <div class="label col-3 offset-1">Email ID: </div>
                                <input type="email" name="email_id" value="{{ $patient->email_id }}" class="form-control col-6 px-3" placeholder="Enter Email ID">
                            </div>
                            <div class="form-group required row">
                                <div class="label col-3 offset-1">Choose Race: </div>
                                <select name="race_id" class="col-6 custom-select">
                                    <option value="" selected>--Select--</option>
                                    @foreach($races as $race)
                                    @if($race->id == $patient->race_id)
                                    <option value="{{ $race->id }}" selected>{{ $race->name }}</option>
                                    @else
                                    <option value="{{ $race->id }}">{{ $race->name }}</option>
                                    @endif
                                    <option value="{{ $race->id }}">{{ $race->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group required row">
                                <div class="label col-3 offset-1">Choose Ethnicity: </div>
                                <select name="ethnicity_id" class="col-6 custom-select">
                                    <option selected>--Select--</option>
                                    @foreach($ethnicities as $ethnicity)
                                    @if($ethnicity->id == $patient->ethnicity_id)
                                    <option value="{{ $ethnicity->id }}" selected>{{ $ethnicity->name }}</option>
                                    @else
                                    <option value="{{ $ethnicity->id }}">{{ $ethnicity->name }}</option>
                                    @endif
                                    <option value="{{ $ethnicity->id }}">{{ $ethnicity->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group required row">
                                <div class="label col-3 offset-1">SSN/Driver/Passport ID/Other: </div>
                                <select name="proof_id" class="col-6 custom-select">
                                    <option value="" selected>--Select--</option>
                                    <option value="1" @if($patient->proof_id == 1) selected @endif>SSN</option>
                                    <option value="2" @if($patient->proof_id == 2) selected @endif>Driver</option>
                                    <option value="3" @if($patient->proof_id == 3) selected @endif>Passport ID</option>
                                    <option value="4" @if($patient->proof_id == 4) selected @endif>Other</option>
                                </select>
                            </div>
                            <!-- <div class="form-group required row">
                                <div class="label col-3 offset-1">Select ID No.: </div>
                                <input type="text" name="id" class="form-control col-6 px-3" placeholder="00000000">
                            </div> -->
                            <div class="form-group required row">
                                <div class="label col-3 offset-1">State listed on selected ID: </div>
                                <input type="text" name="state_code" value="{{ $patient->state_code }}" class="form-control col-6 px-3" placeholder="State Code">
                            </div>
                            <div class="form-group required row">
                                <div class="label col-3 offset-1">Insurance Provider: </div>
                                <input type="text" name="insurance_provider" value="{{ $patient->insurance_provider }}" class="form-control col-6 px-3" placeholder="Insurance Provider">
                            </div>
                            <div class="form-group required row">
                                <div class="label col-3 offset-1">Insurance Policy #: </div>
                                <input type="text" name="insurance_policy_number" value="{{ $patient->insurance_policy_number }}" class="form-control col-5 px-3" placeholder="Insurance Policy #">
                                <button type="button" class="btn btn-sm btn-warning">Verify</button>
                            </div>

                            <!-- <div class="form-group required row">
                                <div class="label col-3 offset-1">Insurance Eligibility Verification #: </div>
                                <input type="text" name="eligibility" class="form-control col-6 px-3" placeholder="Validate Insurance Number">
                            </div>
                            <div class="form-group required row">
                                <div class="label col-3 offset-1">Insurance Discovery: </div>
                                <input type="text" name="insurance" class="form-control col-6 px-3" placeholder="Insurance Discovery">
                            </div> -->
                            <div class="form-group row">
                                <div class="label col-3 offset-1">First Test? </div>
                                <div class="custom-control custom-switch">
                                    <input name="first_test" @if($patient->first_test) checked @endif type="checkbox" data-on="Yes" data-off="No" data-toggle="toggle" data-onstyle="warning" data-size="xs">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="label col-3 offset-1">Are you pregnant? </div>
                                <div class="custom-control custom-switch">
                                    <input name="pregnant" @if($patient->pregnant) checked @endif type="checkbox" data-on="Yes" data-off="No" data-toggle="toggle" data-onstyle="warning" data-size="xs">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="label col-3 offset-1">Do you work in healthcare? </div>
                                <div class="custom-control custom-switch">
                                    <input name="healthcare" @if($patient->healthcare) checked @endif type="checkbox" data-on="Yes" data-off="No" data-toggle="toggle" data-onstyle="warning" data-size="xs">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="label col-3 offset-1">Are you symptomatic as defined by the CDC? </div>
                                <div class="custom-control custom-switch">
                                    <input name="symptomatic" @if($patient->symptomatic) checked @endif type="checkbox" data-on="Yes" data-off="No" data-toggle="toggle" data-onstyle="warning" data-size="xs">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="label col-3 offset-1">Do you live in a congregate care setting? </div>
                                <div class="custom-control custom-switch">
                                    <input name="congregate" @if($patient->congregate) checked @endif type="checkbox" data-on="Yes" data-off="No" data-toggle="toggle" data-onstyle="warning" data-size="xs">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="label col-3 offset-1">Were you hospitalized? </div>
                                <div class="custom-control custom-switch">
                                    <input name="hospitalized" @if($patient->hospitalized) checked @endif type="checkbox" data-on="Yes" data-off="No" data-toggle="toggle" data-onstyle="warning" data-size="xs">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="label col-3 offset-1">Were you admitted to the ICU? </div>
                                <div class="custom-control custom-switch">
                                    <input name="admitted" @if($patient->hospitalized) checked @endif type="checkbox" data-on="Yes" data-off="No" data-toggle="toggle" data-onstyle="warning" data-size="xs">
                                </div>
                            </div>

                            <div class="row m-1">
                                <div class="label col-3 offset-1 pt-3">SSN/Driver/Passport File (JPG, PNG)</div>
                                <img src="" id="proofImg" alt="profile Pic" style="height: 100px;" class="col-3">
                                <div class="input-group col-3 pt-2">
                                    <div class="custom-file">
                                        <input type="file" name="proof" id="proofFile">
                                    </div>
                                </div>
                            </div>

                            <div class="row m-1 mt-2">
                                <div class="label col-3 offset-1 pt-3">Insurance Card Front (JPG, PNG)</div>
                                <img src="" id="insuranceImg" alt="profile Pic" style="height: 100px;" class="col-3">
                                <div class="input-group col-3 pt-2">
                                    <div class="custom-file">
                                        <input type="file" name="insurance_card_front" id="insuranceFile">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group required row">
                                <div class="label col-3 offset-1">Sample Collect Date: </div>
                                <input type="datetime-local" name="sample_collect_datetime" value="{{ $patient->sample_collect_datetime }}" class="form-control col-6 px-3" placeholder="Enter DOB">
                            </div>

                            <div class="form-group row">
                                <div class="label col-3 offset-1">
                                    <button type="button" class="btn btn-warning" onclick="showSignatureBox()">
                                        Open Signature Box
                                    </button>
                                </div>
                                <div id="signature-image-field" class="input-group col-6 border pt-2">
                                    <img src="" alt="">
                                </div>
                                <input type="hidden" name="signature">
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

<div class="modal fade" id="signatureBox" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Race</h5>
                <button type="button" class="close" onclick="hideSignatureBox()" aria-raceel="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="signatureBoxForm" class="signature-pad-form">
                    <canvas height="100" width="465" class="signature-pad"></canvas>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="hideSignatureBox()">Close</button>
                <button type="button" class="btn clear-button">Clear</button>
                <button type="submit" form="signatureBoxForm" class="btn btn-warning">Save</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('js/signature.js')}}"></script>
<script>
    $(function() {
        $('#insuranceFile').change(function() {
            let imageFile = new FileReader();
            imageFile.onload = function(e) {
                $('#insuranceImg').attr('src', e.target.result);
            }
            imageFile.readAsDataURL(this.files[0]);
        })

        $('#proofFile').change(function() {
            let imageFile = new FileReader();
            imageFile.onload = function(e) {
                $('#proofImg').attr('src', e.target.result);
            }
            imageFile.readAsDataURL(this.files[0]);
        })
    });

    function showSignatureBox() {
        $('#signatureBox').modal('show')
    }

    function hideSignatureBox() {
        $('#signatureBox').modal('hide')
    }

    function setSelected() {
        let symptoms = document.getElementById('symptoms').dataset.symptoms
        var symptomsArr = symptoms.split(",");
        $("#symptoms").val(symptomsArr);
    }
    setSelected()

    $('#symptoms').multiselect({
        columns: 2,
        placeholder: 'Select Symptoms',
        minHeight: 0
    });

    function getSymptoms(testType) {
        $('#test_type_symptoms').show()
        $.ajax({
            'type': "POST",
            'dataType': 'json',
            'url': "{{url('api/symptoms')}}",
            'data': {
                "test_type_id": testType.value
            },
            'success': function(symptoms) {
                $('#symptoms').multiselect('loadOptions', symptoms);
            }
        });
    }

    $(document).ready(function() {
        let autocomplete = new google.maps.places.Autocomplete((document.getElementById('address')), {
            types: ['geocode']
        })

        google.maps.event.addListener(autocomplete, "place_changed", function() {
            var place = autocomplete.getPlace()

            var address = place.formatted_address;
            var latitude = place.geometry.location.lat();
            var longitude = place.geometry.location.lng();
            var latlng = new google.maps.LatLng(latitude, longitude);
            var geocoder = (geocoder = new google.maps.Geocoder());
            geocoder.geocode({
                latLng: latlng
            }, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[0]) {
                        var address = results[0].formatted_address;
                        var zipcode =
                            results[0].address_components[
                                results[0].address_components.length - 1
                            ].long_name;
                        var country =
                            results[0].address_components[
                                results[0].address_components.length - 2
                            ].long_name;
                        var state =
                            results[0].address_components[
                                results[0].address_components.length - 3
                            ].long_name;
                        var city =
                            results[0].address_components[
                                results[0].address_components.length - 4
                            ].long_name;

                        console.log(address)

                        $('input[name=address_2]').val(address)

                        $('input[name=city]').val(city)
                        $('input[name=state]').val(state)
                        $('input[name=zipcode]').val(zipcode)
                    }
                }
            })
        })
    })
</script>
@endsection