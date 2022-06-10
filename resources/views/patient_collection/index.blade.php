@extends('layouts.app', ['activePage' => 'collection', 'titlePage' => __('Locations')])

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
                                    Government Issued ID
                                </th>
                                <th class="font-weight-bold">
                                    Patient ID
                                </th>
                                <th class="font-weight-bold">
                                    Name
                                </th>
                                <th class="font-weight-bold">
                                    Clinic
                                </th>
                                <th class="font-weight-bold">
                                    Barcode
                                </th>
                                <th class="font-weight-bold">
                                    Zipcode
                                </th>
                                <th class="font-weight-bold">
                                    Date & time
                                </th>
                            </thead>
                            <tbody>
                                <tr>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection