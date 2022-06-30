@extends('layouts.app', ['activePage' => 'ethnicity', 'titlePage' => __('Ethnicitys')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="col-md-12">

            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#addNewethnicity">
                Add New Ethnicity
            </button>

            <div class="card">

                <div class="card-header card-header-warning">
                    <h4 class="card-title font-weight-bold">Ethnicitys</h4>
                </div>

                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table">
                            <thead class="text-warning">
                                <th class="font-weight-bold text-center">
                                    Ethnicity ID
                                </th>
                                <th class="font-weight-bold">
                                    Name
                                </th>
                                <th class="font-weight-bold text-center">
                                    Actions
                                </th>
                            </thead>
                            <tbody>
                                @foreach($ethnicities as $ethnicity)
                                <tr>
                                    <td class="text-center">{{ $ethnicity->id }}</td>
                                    <td>{{ $ethnicity->name }}</td>
                                    <td class="p-0 text-center">
                                        <button class="btn btn-sm btn-warning" data-id="{{ $ethnicity->id }}" data-name="{{ $ethnicity->name }}" onclick="editTestType(this)">Edit</button>
                                        <form action="{{ route('ethnicity.destroy', $ethnicity->id) }}" method="post" class="d-inline">@csrf @method('DELETE')
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

<div class="modal fade" id="addNewethnicity" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Ethnicity</h5>
                <button type="button" class="close" data-dismiss="modal" aria-ethnicityel="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addNewethnicityForm" method="post" action="{{ route('ethnicity.store') }}">
                    @csrf
                    <div class="form-group">
                        <ethnicityel>Ethnicity Name</ethnicityel>
                        <input type="text" name="name" class="form-control" placeholder="Enter ethnicity name">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" form="addNewethnicityForm" class="btn btn-warning">Save</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editTestType" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Ethnicity</h5>
                <button type="button" class="close" data-dismiss="modal" aria-ethnicityel="Close" onclick="closeModal()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editTestTypeForm" method="post" action="{{ route('ethnicity.update', 0) }}">@csrf @method('PUT')
                    @csrf
                    <div class="form-group">
                        <ethnicityel>Ethnicity Name</ethnicityel>
                        <input type="hidden" name="ethnicity_id">
                        <input type="text" name="name" class="form-control" placeholder="Enter ethnicity name">
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
        $('input[name="ethnicity_id"]').val(elm.dataset.id)
        $('input[name="name"]').val(elm.dataset.name)
        $("#editTestType").modal('show')
    }

    function closeModal() {
        $("#editTestType").modal('hide')
    }
</script>