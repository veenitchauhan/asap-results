@extends('layouts.app', ['activePage' => 'test_type', 'titlePage' => __('Symptoms')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="col-md-12">

            <a href="{{ route('test_type.index') }}">
                <button type="button" class="btn">
                    Back
                </button>
            </a>
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#addNewSymptom">
                Add New Symptom
            </button>

            <div class="card">

                <div class="card-header card-header-warning">
                    <h4 class="card-title font-weight-bold">Symptoms: {{ $test_type->name }}</h4>
                </div>

                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table">
                            <thead class="text-warning">
                                <th class="font-weight-bold text-center">
                                    Symptom ID
                                </th>
                                <th class="font-weight-bold">
                                    Name
                                </th>
                                <th class="font-weight-bold text-center">
                                    Actions
                                </th>
                            </thead>
                            <tbody>
                                @foreach($symptoms as $symptom)
                                <tr>
                                    <td class="text-center">{{ $symptom->id }}</td>
                                    <td>{{ $symptom->name }}</td>
                                    <td class="p-0 text-center">
                                        <button class="btn btn-sm btn-warning" data-id="{{ $symptom->id }}" data-name="{{ $symptom->name }}" onclick="editSymptom(this)">Edit</button>
                                        <form action="{{ route('symptom.destroy', $symptom->id) }}" method="post" class="d-inline">@csrf @method('DELETE')
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

<div class="modal fade" id="addNewSymptom" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Symptom</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addNewSymptomForm" method="post" action="{{ route('symptom.store') }}">
                    @csrf
                    <input type="hidden" name="test_type_id" value="{{ $test_type->id }}">
                    <div class="form-group">
                        <label>Symptom Name</label>
                        <input type="text" name="name" class="form-control text-capitalize" placeholder="Enter symptom name">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" form="addNewSymptomForm" class="btn btn-warning">Save</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editSymptom" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Symptom</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeModal()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editSymptomForm" method="post" action="{{ route('symptom.update', 0) }}">@csrf @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label>Test Type Name</label>
                        <input type="hidden" name="symptom_id">
                        <input type="text" name="name" class="form-control" placeholder="Enter test type name">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeModal()">Close</button>
                <button type="submit" form="editSymptomForm" class="btn btn-warning">Update</button>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    function editSymptom(elm) {
        console.log(elm.dataset)
        $('input[name="symptom_id"]').val(elm.dataset.id)
        $('input[name="name"]').val(elm.dataset.name)
        $("#editSymptom").modal('show')
    }

    function closeModal() {
        $("#editSymptom").modal('hide')
    }
</script>