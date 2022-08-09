@extends('layouts.app', ['activePage' => 'eligibility_payer', 'titlePage' => __('Eligibility Payer')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="col-md-12">

            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#addNewPayer">
                Add New Payer
            </button>

            <div class="card">

                <div class="card-header card-header-warning">
                    <h4 class="card-title font-weight-bold">Eligibility Payers</h4>
                </div>

                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table">
                            <thead class="text-warning">
                                <th class="font-weight-bold text-center">
                                    #
                                </th>
                                <th class="font-weight-bold">
                                    Payer ID
                                </th>
                                <th class="font-weight-bold">
                                    Payer Name
                                </th>
                                <th class="font-weight-bold text-center">
                                    Actions
                                </th>
                            </thead>
                            <tbody>
                                @foreach($eligibility_payers as $payer)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $payer->payer_id }}</td>
                                    <td>{{ $payer->payer_name }}</td>
                                    <td class="p-0 text-center">
                                        <button class="btn btn-sm btn-warning" data-id="{{ $payer->id }}" data-payer-id="{{ $payer->payer_id }}" data-payer-name="{{ $payer->payer_name }}" onclick="editEligibilityPayer(this)">Edit</button>
                                        <form action="{{ route('eligibility-payer.destroy', $payer->id) }}" method="post" class="d-inline">@csrf @method('DELETE')
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

<div class="modal fade" id="addNewPayer" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Payer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-ethnicityel="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addNewPayerForm" method="post" action="{{ route('eligibility-payer.store') }}">
                    @csrf
                    <div class="form-group">
                        <span>Eligibility Payer ID</span>
                        <input type="integer" name="payer_id" class="form-control" placeholder="Enter ethnicity name">
                    </div>
                    <div class="form-group">
                        <span>Eligibility Payer Name</span>
                        <input type="text" name="payer_name" class="form-control" placeholder="Enter ethnicity name">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" form="addNewPayerForm" class="btn btn-warning">Save</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editPayer" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Ethnicity</h5>
                <button type="button" class="close" data-dismiss="modal" aria-ethnicityel="Close" onclick="closeModal()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editPayerForm" method="post" action="{{ route('eligibility-payer.update', 0) }}">
                    @csrf @method('PUT')
                    <input type="hidden" name="id">
                    <div class="form-group">
                        <span>Eligibility Payer ID</span>
                        <input type="integer" name="payer_id" class="form-control" placeholder="Enter ethnicity name">
                    </div>
                    <div class="form-group">
                        <span>Eligibility Payer Name</span>
                        <input type="text" name="payer_name" class="form-control" placeholder="Enter ethnicity name">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeModal()">Close</button>
                <button type="submit" form="editPayerForm" class="btn btn-warning">Update</button>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    function editEligibilityPayer(elm) {
        console.log(elm.dataset)

        $('input[name="id"]').val(elm.dataset.id)
        $('input[name="payer_id"]').val(elm.dataset.payerId)
        $('input[name="payer_name"]').val(elm.dataset.payerName)
        $("#editPayer").modal('show')
    }

    function closeModal() {
        $("#editPayer").modal('hide')
    }
</script>