@extends('layouts.app', ['activePage' => 'collection', 'titlePage' => __('Patient Collection')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="col-md-12">

            <a href="{{ route('collection.create') }}">
                <button type="button" class="btn btn-warning">Add Collection</button>
            </a>
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#searchPatientModal">
                Search Box
            </button>
            <button type="button" class="btn btn-warning">
                SEARCH INSURANCE
            </button>

            <div class="col-3 float-right">
                <div class="input-group no-border">
                    <input type="text" value="" class="form-control selector" placeholder="Search...">
                    <i class="material-icons mt-2">search</i>
                </div>
            </div>

            <div class="card">

                <div class="card-header card-header-warning">
                    <h4 class="card-title font-weight-bold">Collections List</h4>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <input type="hidden" id="patient_collection" data-patient-collection="{{ $patient_collection }}">
                        <table class="table">
                            <thead class="text-warning">
                                <th class="font-weight-bold">
                                    Test Type
                                </th>
                                <th class="font-weight-bold">
                                    Req #
                                </th>
                                <th class="font-weight-bold">
                                    Name
                                </th>
                                <th class="font-weight-bold">
                                    Address
                                </th>
                                <th class="font-weight-bold">
                                    Date & time
                                </th>
                                <th class="font-weight-bold text-center">
                                    Action
                                </th>
                            </thead>
                            <tbody>
                                @foreach($patient_collection as $patient)
                                <tr>
                                    <td>{{ $patient->test_type->name }}</td>
                                    <td>{{ $patient->clinic_req_number }}</td>
                                    <td>{{ $patient->first_name }} {{ $patient->last_name }} ({{ $patient->age }})</td>
                                    <td>{{ $patient->address }}</td>
                                    <td>{{ $patient->created_at->format('d-M, Y H:m'); }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('collection.show', $patient->id) }}">
                                            <i class="material-icons text-warning" style="vertical-align:unset;">visibility</i>
                                        </a>
                                        <a href="{{ route('collection.edit', $patient->id) }}">
                                            <i class="material-icons" style="vertical-align:unset;">edit</i>
                                        </a>
                                        <a href="{{ route('collection.retest', $patient->id) }}">
                                            <i class="material-icons" style="vertical-align:unset;">bug_report</i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="searchPatientModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <img src="{{ url('/img/logo-green-100x74.png') }}" class="mx-auto">
            </div>
            <div class="modal-body pt-0">
                <form id="searchPatientForm" action="{{ route('collection.search') }}" method="post" class="m-0" target="_blank">@csrf
                    <div class="form-group required row">
                        <span class="col-4">First Name:</span>
                        <div class="col-8">
                            <input type="text" name="first_name" class="form-control" placeholder="First Name">
                        </div>
                    </div>
                    <div class="form-group required row">
                        <span class="col-4">Last Name:</span>
                        <div class="col-8">
                            <input type="text" name="last_name" class="form-control" placeholder="Last Name">
                        </div>
                    </div>
                    <div class="form-group required row">
                        <span class="col-4">Date of Birth:</span>
                        <div class="col-8">
                            <input type="date" name="date_of_birth" class="form-control" placeholder="Date of Birth">
                        </div>
                    </div>
                    <div class="form-group required row">
                        <span class="col-4">Insurance ID:</span>
                        <div class="col-8">
                            <input type="text" name="insurance_id" class="form-control" placeholder="Insurance ID">
                        </div>
                    </div>
                    <div class="form-group row">
                        <span class="col-4">Eligibility Payers:</span>
                        <div class="col-8">
                            <select name="payer_id" class="custom-select">
                                <option value="">-- Select Payer --</option>
                                @foreach($eligibility_payers as $payer)
                                <option value="{{ $payer->payer_id }}">{{ $payer->payer_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- <div class="form-group row">
                        <span class="col-4">Collection Site:</span>
                        <div class="col-8">
                            <select name="location_id" class="custom-select">
                                <option value="">-- Select Collection Site --</option>
                                @foreach($locations as $location)
                                <option value="{{ $location->id }}">{{ $location->location_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div> -->
                    <button type="submit" name="action" value="rotating" class="btn btn-warning w-100">SEARCH RETURING PATIENT</button>
                    <button type="submit" name="action" value="eligibility" class="btn btn-warning w-100">Search PATIENT ELIGIBILITY</button>
                </form>
                <button class="btn btn-warning w-100">Search PATIENT DISCOVERY</button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(function() {
        let patients = JSON.parse(document.getElementById('patient_collection').dataset.patientCollection)
        patients = $.map(patients, function(value, key) {
            return {
                label: value.first_name + ' ' + value.last_name,
                value: value.id
            }
        })

        $(".selector").autocomplete({
            source: patients,
            select: function(event, ui) {
                let id = ui.item.value
                window.location.href = "collection/" + id;
            }
        });
    });

    function searchPatientEligibilty() {
        console.log('calling api')
        console.log($('#searchPatientForm').serializeArray())
        let data = $('#searchPatientForm').serialize()
        let url = "{{ url('api/eligibilty') }}"
        $.post(url, data);
    }
</script>
@endsection