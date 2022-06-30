@extends('layouts.app', ['activePage' => 'race', 'titlePage' => __('Races')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="col-md-12">

            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#addNewrace">
                Add New Race
            </button>

            <div class="card">

                <div class="card-header card-header-warning">
                    <h4 class="card-title font-weight-bold">Races</h4>
                </div>

                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table">
                            <thead class="text-warning">
                                <th class="font-weight-bold text-center">
                                    Race ID
                                </th>
                                <th class="font-weight-bold">
                                    Name
                                </th>
                                <th class="font-weight-bold text-center">
                                    Actions
                                </th>
                            </thead>
                            <tbody>
                                @foreach($races as $race)
                                <tr>
                                    <td class="text-center">{{ $race->id }}</td>
                                    <td>{{ $race->name }}</td>
                                    <td class="p-0 text-center">
                                        <button class="btn btn-sm btn-warning" data-id="{{ $race->id }}" data-name="{{ $race->name }}" onclick="editTestType(this)">Edit</button>
                                        <form action="{{ route('race.destroy', $race->id) }}" method="post" class="d-inline">@csrf @method('DELETE')
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

<div class="modal fade" id="addNewrace" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Race</h5>
                <button type="button" class="close" data-dismiss="modal" aria-raceel="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addNewraceForm" method="post" action="{{ route('race.store') }}">
                    @csrf
                    <div class="form-group">
                        <raceel>Race Name</raceel>
                        <input type="text" name="name" class="form-control" placeholder="Enter race name">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" form="addNewraceForm" class="btn btn-warning">Save</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editTestType" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Race</h5>
                <button type="button" class="close" data-dismiss="modal" aria-raceel="Close" onclick="closeModal()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editTestTypeForm" method="post" action="{{ route('race.update', 0) }}">@csrf @method('PUT')
                    @csrf
                    <div class="form-group">
                        <raceel>Race Name</raceel>
                        <input type="hidden" name="race_id">
                        <input type="text" name="name" class="form-control" placeholder="Enter race name">
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
        $('input[name="race_id"]').val(elm.dataset.id)
        $('input[name="name"]').val(elm.dataset.name)
        $("#editTestType").modal('show')
    }

    function closeModal() {
        $("#editTestType").modal('hide')
    }
</script>