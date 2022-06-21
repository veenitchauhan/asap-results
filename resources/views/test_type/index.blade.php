@extends('layouts.app', ['activePage' => 'test_type', 'titlePage' => __('Test Types')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="col-md-12">

            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#addTestType">
                Add Test Type
            </button>

            <div class="card">

                <div class="card-header card-header-warning">
                    <h4 class="card-title font-weight-bold">Test Types</h4>
                </div>

                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table">
                            <thead class="text-warning">
                                <th class="font-weight-bold text-center">
                                    Test Type ID
                                </th>
                                <th class="font-weight-bold">
                                    Name
                                </th>
                                <th class="font-weight-bold text-center">
                                    Actions
                                </th>
                            </thead>
                            <tbody>
                                @foreach($test_types as $test_type)
                                <tr>
                                    <td class="text-center">{{ $test_type->id }}</td>
                                    <td>{{ $test_type->name }}</td>
                                    <td class="p-0 text-center">
                                        <a href="{{ route('symptom.show', $test_type->id) }}">
                                            <button class="btn btn-sm">Symptoms: {{ $test_type->symptoms->count() }}</button>
                                        </a>
                                        <button class="btn btn-sm btn-warning" data-id="{{ $test_type->id }}" data-name="{{ $test_type->name }}" onclick="editTestType(this)">Edit</button>
                                        <form action="{{ route('test_type.destroy', $test_type->id) }}" method="post" class="d-inline">@csrf @method('DELETE')
                                            <button class="btn btn-sm btn-danger">Delete</button>
                                        </form>
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

<div class="modal fade" id="addTestType" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Location</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addTestTypeForm" method="post" action="{{ route('test_type.store') }}">
                    @csrf
                    <div class="form-group">
                        <label>Test Type Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter test type name">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" form="addTestTypeForm" class="btn btn-warning">Save</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editTestType" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Location</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeModal()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editTestTypeForm" method="post" action="{{ route('test_type.update', 0) }}">@csrf @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label>Test Type Name</label>
                        <input type="hidden" name="test_type_id">
                        <input type="text" name="name" class="form-control" placeholder="Enter test type name">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeModal()">Close</button>
                <button type="submit" form="editTestTypeForm" class="btn btn-warning">Update</button>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    function editTestType(elm){
        console.log(elm.dataset)
        $('input[name="test_type_id"]').val(elm.dataset.id)
        $('input[name="name"]').val(elm.dataset.name)
        $("#editTestType").modal('show')
    }

    function closeModal() {
        $("#editTestType").modal('hide')
    }
</script>