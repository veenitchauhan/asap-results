@extends('layouts.app', ['activePage' => 'collection', 'titlePage' => __('Patient Collection')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="col-md-12">

            <a href="{{ route('collection.create') }}">
                <button type="button" class="btn btn-warning">Add Collection</button>
            </a>
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#searchPatientModal">
                Search
            </button>

            <div class="card">

                <div class="card-header card-header-warning">
                    <h4 class="card-title font-weight-bold">Collections List</h4>
                </div>

                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table">
                            <thead class="text-warning">
                                <th class="font-weight-bold">
                                    ID
                                </th>
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
                                    <td class="text-center">{{ $patient->id }}</td>
                                    <td>{{ $patient->test_type->name }}</td>
                                    <td>{{ $patient->clinic_req_number }}</td>
                                    <td>{{ $patient->first_name }} {{ $patient->last_name }}</td>
                                    <td>{{ $patient->address }}</td>
                                    <td>{{ $patient->created_at->format('d-M, Y H:m'); }}</td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-warning">View</button>
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
                <!-- <button type="button" class="close" data-dismiss="modal" aria-raceel="Close">
                    <span aria-hidden="true">&times;</span>
                </button> -->
                <img src="{{ url('/img/logo-green-100x74.png') }}" class="mx-auto">
            </div>
            <div class="modal-body pt-0">
                <a href="{{ route('collection.create') }}">
                    <button class="btn btn-warning w-100">CREATE PATIENT</button>
                </a>
                <form id="searchPatientForm" action="{{ route('collection.search') }}" method="post" class="m-0">@csrf
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
                            <input type="date" name="date_of_birth" class="form-control" placeholder="First Name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <span class="col-4">Collection Site:</span>
                        <div class="col-8">
                            <select name="location_id" class="custom-select">
                                <option value="">-- Select Collection Site --</option>
                                @foreach($locations as $location)
                                <option value="{{ $location->id }}">{{ $location->location_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-warning w-100">SEARCH RETURING PATIENT</button>
                </form>
                <div class="text-center">- Or -</div>
                <button class="btn btn-warning w-100">PATIENT ELIGIBILITY</button>
                <div class="text-center">- Or -</div>
                <button class="btn btn-warning w-100">PATIENT DISCOVERY</button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" form="searchPatientForm" class="btn btn-warning">Search</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
@if(session()->has('show_script'))
<script>
    $('#searchPatientModal').modal('show')
</script>
@endif
@endsection