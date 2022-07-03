@extends('layouts.app', ['activePage' => 'collection', 'titlePage' => __('Patient Collection')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="col-md-12">

            <a href="{{ route('collection.create') }}">
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#addNewUserModal">
                    Add Collection
                </button>
            </a>
            
            <div class="card">

                <div class="card-header card-header-warning">
                    <h4 class="card-title font-weight-bold">Collections List</h4>
                </div>

                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table">
                            <thead class="text-warning">
                                <th class="font-weight-bold">
                                    Collection ID
                                </th>
                                <th class="font-weight-bold">
                                    Test Type
                                </th>
                                <th class="font-weight-bold">
                                    Clinic Req #
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
                                    <td>{{ $patient->created_at }}</td>
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
@endsection