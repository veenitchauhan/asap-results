@extends('layouts.app', ['activePage' => 'location', 'titlePage' => __('Locations')])

@section('content')
<div class="content">
	<div class="container-fluid">
		<div class="col-md-12">
			<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#addNewLocation">
				Add New Location
			</button>
			<div class="card">
				<div class="card-header card-header-warning">
					<h4 class="card-title font-weight-bold">Locations List</h4>
					<!-- <p class="card-category"> Here is a subtitle for this table</p> -->
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table">
							<thead class="text-warning">
								<th class="font-weight-bold">
									Location Name
								</th>
								<th class="font-weight-bold">
									Contact Person
								</th>
								<th class="font-weight-bold">
									Contact Number
								</th>
								<th class="font-weight-bold">
									Clinic
								</th>
								<th class="font-weight-bold">
									Timezone
								</th>
								<th class="font-weight-bold">
									Status
								</th>
								<th class="font-weight-bold text-center">
									Actions
								</th>
							</thead>
							<tbody>
								@foreach($locations as $location)
								<tr>
									<td>
										{{ $location->location_name }}
									</td>
									<td>
										{{ $location->contant_person }}
									</td>
									<td>
										{{ $location->contact_number }}
									</td>
									<td>
										{{ $location->clinic }}
									</td>
									<td>
										{{ $location->timezone }}
									</td>
									<td class="text-warning">
										@if($location->status == 1)
										<span class="badge badge-info p-2">Active</span>
										@else
										<span class="badge badge-danger p-2">InActive</span>
										@endif
									</td>
									<td class="text-warning text-center">
										<button class="btn btn-sm btn-warning" data-location="{{ $location }}" onclick="editLocation(this)">Edit</button>
										<form action="" method="post" class="d-inline">
											<button type="submit" class="btn btn-sm btn-danger">Delete</button>
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

<div class="modal fade" id="addNewLocation" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add New Location</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="addNewLocationForm" method="post" action="{{ route('location.store') }}">
					@csrf
					<div class="form-group">
						<label>Location Name</label>
						<input type="text" name="location_name" class="form-control" placeholder="Enter location name">
					</div>
					<div class="form-group">
						<label>Contact Person</label>
						<input type="ematextil" name="contant_person" class="form-control" placeholder="Enter name of contact person">
					</div>
					<div class="form-group">
						<label>Contact Number</label>
						<input type="ematextil" name="contact_number" class="form-control" placeholder="Enter contact number">
					</div>
					<div class="form-group">
						<label>Clinic</label>
						<input type="ematextil" name="clinic" class="form-control" placeholder="Enter name of clinic">
					</div>
					<div class="form-group">
						<label>Timezone</label>
						<input type="ematextil" name="timezone" class="form-control" placeholder="Enter timezone">
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" form="addNewLocationForm" class="btn btn-warning">Save</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="editLocation" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add New Location</h5>
				<button type="button" class="close" onclick="closeModal()">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="editLocationForm" method="post" action="{{ route('location.update', 1) }}">
					@method('PUT') @csrf
					<input type="hidden" name="id">
					<div class="form-group">
						<label>Location Name</label>
						<input type="text" name="location_name" class="form-control" placeholder="Enter location name">
					</div>
					<div class="form-group">
						<label>Contact Person</label>
						<input type="ematextil" name="contant_person" class="form-control" placeholder="Enter name of contact person">
					</div>
					<div class="form-group">
						<label>Contact Number</label>
						<input type="ematextil" name="contact_number" class="form-control" placeholder="Enter contact number">
					</div>
					<div class="form-group">
						<label>Clinic</label>
						<input type="ematextil" name="clinic" class="form-control" placeholder="Enter name of clinic">
					</div>
					<div class="form-group">
						<label>Timezone</label>
						<input type="ematextil" name="timezone" class="form-control" placeholder="Enter timezone">
					</div>
					<div class="form-check-inline">
						<span>Status: </span>&nbsp;<input type="checkbox" name="status" class="form-check-input" value="1">Active
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeModal()">Close</button>
				<button type="submit" form="editLocationForm" class="btn btn-warning">Save</button>
			</div>
		</div>
	</div>
</div>
@endsection

<script>
	function editLocation(elm) {
		$('#editLocation').modal('show')

		let location = JSON.parse(elm.dataset.location)
		$('#editLocationForm').find("input[name='id']").val(location.id);
		$('#editLocationForm').find("input[name='location_name']").val(location.location_name);
		$('#editLocationForm').find("input[name='contant_person']").val(location.contant_person);
		$('#editLocationForm').find("input[name='contact_number']").val(location.contact_number);
		$('#editLocationForm').find("input[name='clinic']").val(location.clinic);
		$('#editLocationForm').find("input[name='timezone']").val(location.timezone);
		$('#editLocationForm').find("input[name='status']").prop('checked', location.status);
	}

	function closeModal() {
		$('#editLocation').modal('hide')
	}
</script>