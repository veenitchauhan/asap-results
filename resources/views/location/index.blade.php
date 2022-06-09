@extends('layouts.app', ['activePage' => 'location', 'titlePage' => __('Locations')])

@section('content')
<div class="content">
	<div class="container-fluid">
		<div class="col-md-12">
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addNewUserModal">
				Add New Location
			</button>
			<div class="card">
				<div class="card-header card-header-primary">
					<h4 class="card-title ">Locations List</h4>
					<!-- <p class="card-category"> Here is a subtitle for this table</p> -->
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table">
							<thead class=" text-primary">
								<th>
									Location Name
								</th>
								<th>
									Contact Person
								</th>
								<th>
									Contact Number
								</th>
								<th>
									Clinic
								</th>
								<th>
									Timezone
								</th>
								<th>
									Status
								</th>
							</thead>
							<tbody>
								<tr>
									<td>
										M_Freelance_PA_JNelson
									</td>
									<td>
										Joel Nelson
									</td>
									<td>
										832-909-9366
									</td>
									<td>
										Havilah Consultants OK UT MA AR PA
									</td>
									<td class="text-primary">
										Eastern
									</td>
									<td class="text-primary">
										<span class="badge badge-primary p-2">InActive</span>
									</td>
								</tr>
								<tr>
									<td>
										M_Precious Moments Daycare_PA_18301_JNELSON
									</td>
									<td>
										Joel Nelson
									</td>
									<td>
										832-909-9366
									</td>
									<td>
										Havilah Consultants OK UT MA AR PA
									</td>
									<td class="text-primary">
										Eastern
									</td>
									<td class="text-primary">
										<span class="badge badge-primary p-2">Active</span>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>

<div class="modal fade" id="addNewUserModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Location</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addNewUserForm" method="post" action="{{ route('user.store') }}">
                    @csrf
                    <div class="form-group">
                        <label>Location Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter location name">
                    </div>
                    <div class="form-group">
                        <label>Contact Person</label>
                        <input type="ematextil" name="email" class="form-control" placeholder="Enter name of contact person">
                    </div>
					<div class="form-group">
                        <label>Contact Number</label>
                        <input type="ematextil" name="email" class="form-control" placeholder="Enter contact number">
                    </div>
					<div class="form-group">
                        <label>Clinic</label>
                        <input type="ematextil" name="email" class="form-control" placeholder="Enter name of clinic">
                    </div>
					<div class="form-group">
                        <label>Timezone</label>
                        <input type="ematextil" name="email" class="form-control" placeholder="Enter timezone">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" form="addNewUserForm" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
@endsection