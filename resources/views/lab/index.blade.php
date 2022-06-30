@extends('layouts.app', ['activePage' => 'lab', 'titlePage' => __('Labs')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="col-md-12">

            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#addNewLab">
                Add New Lab
            </button>

            <div class="card">

                <div class="card-header card-header-warning">
                    <h4 class="card-title font-weight-bold">Labs</h4>
                </div>

                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table">
                            <thead class="text-warning">
                                <th class="font-weight-bold text-center">
                                    Lab ID
                                </th>
                                <th class="font-weight-bold">
                                    Name
                                </th>
                                <th class="font-weight-bold text-center">
                                    Actions
                                </th>
                            </thead>
                            <tbody>
                                @foreach($labs as $lab)
                                <tr>
                                    <td class="text-center">{{ $lab->id }}</td>
                                    <td>{{ $lab->name }}</td>
                                    <td class="p-0 text-center">
                                        <button class="btn btn-sm btn-warning" data-id="{{ $lab->id }}" data-name="{{ $lab->name }}" onclick="editTestType(this)">Edit</button>
                                        <form action="{{ route('lab.destroy', $lab->id) }}" method="post" class="d-inline">@csrf @method('DELETE')
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

<div class="modal fade" id="addNewLab" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Lab</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addNewLabForm" method="post" action="{{ route('lab.store') }}">
                    @csrf
                    <div class="form-group">
                        <label>Lab Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter lab name">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" form="addNewLabForm" class="btn btn-warning">Save</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editTestType" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Lab</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeModal()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editTestTypeForm" method="post" action="{{ route('lab.update', 0) }}">@csrf @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label>Lab Name</label>
                        <input type="hidden" name="lab_id">
                        <input type="text" name="name" class="form-control" placeholder="Enter lab name">
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
        $('input[name="lab_id"]').val(elm.dataset.id)
        $('input[name="name"]').val(elm.dataset.name)
        $("#editTestType").modal('show')
    }

    function closeModal() {
        $("#editTestType").modal('hide')
    }
</script>