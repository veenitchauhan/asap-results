@extends('layouts.app', ['activePage' => 'collection', 'titlePage' => __('Locations')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="col-md-12">

            <a href="{{ route('collection.index') }}">
                <button type="button" class="btn btn-secondry" data-toggle="modal" data-target="#addNewUserModal">
                    Back
                </button>
            </a>

            <div class="card">

                <div class="card-header card-header-warning">
                    <h4 class="card-title font-weight-bold">Add Patient Collection</h4>
                </div>

                <div class="card-body">
                <form>
					@method('PUT') @csrf
					<input type="hidden" name="id">
					<div class="form-group">
						<label>Clinic Req #: </label>
						<input type="text" name="" class="form-control" placeholder="Clinic Req#">
					</div>
					<div class="form-group">
						<label>Select Test Type: </label>
						<input type="ematextil" name="contant_person" class="form-control" placeholder="Enter name of contact person">
					</div>
					<div class="form-group">
						<label>LAB: </label>
						<input type="ematextil" name="contact_number" class="form-control" placeholder="Enter contact number">
					</div>
					<div class="form-group">
						<label>First Name: </label>
						<input type="ematextil" name="clinic" class="form-control" placeholder="Enter name of clinic">
					</div>
					<div class="form-group">
						<label>Last Name: </label>
						<input type="ematextil" name="timezone" class="form-control" placeholder="Enter timezone">
					</div>
					<div class="form-group">
						<label>DOB: </label>
						<input type="ematextil" name="timezone" class="form-control" placeholder="Enter timezone">
					</div>
					<div class="form-group">
						<label>Is Minor: </label>
						<input type="ematextil" name="timezone" class="form-control" placeholder="Enter timezone">
					</div>
					<div class="form-group">
						<label>Gender: </label>
						<input type="ematextil" name="timezone" class="form-control" placeholder="Enter timezone">
					</div>
					<div class="form-group">
						<label>Address: </label>
						<input type="ematextil" name="timezone" class="form-control" placeholder="Enter timezone">
					</div>
					<div class="form-group">
						<label>Address 2: </label>
						<input type="ematextil" name="timezone" class="form-control" placeholder="Enter timezone">
					</div>
					<div class="form-group">
						<label>City: </label>
						<input type="ematextil" name="timezone" class="form-control" placeholder="Enter timezone">
					</div>
					<div class="form-group">
						<label>State: </label>
						<input type="ematextil" name="timezone" class="form-control" placeholder="Enter timezone">
					</div>
					<div class="form-group">
						<label>Zip: </label>
						<input type="ematextil" name="timezone" class="form-control" placeholder="Enter timezone">
					</div>
					<div class="form-group">
						<label>Phone Number: </label>
						<input type="ematextil" name="timezone" class="form-control" placeholder="Enter timezone">
					</div>
					<div class="form-group">
						<label>Email: </label>
						<input type="ematextil" name="timezone" class="form-control" placeholder="Enter timezone">
					</div>
					<div class="form-group">
						<label>Choose Race: </label>
						<input type="ematextil" name="timezone" class="form-control" placeholder="Enter timezone">
					</div>
					<div class="form-group">
						<label>Choose Ethnicity: </label>
						<input type="ematextil" name="timezone" class="form-control" placeholder="Enter timezone">
					</div>
					<div class="form-group">
						<label>SSN/Driver/Passport ID/Other: </label>
						<input type="ematextil" name="timezone" class="form-control" placeholder="Enter timezone">
					</div>
					<div class="form-group">
						<label>Select ID No.: </label>
						<input type="ematextil" name="timezone" class="form-control" placeholder="Enter timezone">
					</div>
					<div class="form-group">
						<label>State listed on selected ID: </label>
						<input type="ematextil" name="timezone" class="form-control" placeholder="Enter timezone">
					</div>
					<div class="form-group">
						<label>Insurance Provider: </label>
						<input type="ematextil" name="timezone" class="form-control" placeholder="Enter timezone">
					</div>
					<div class="form-group">
						<label>Insurance Policy #: </label>
						<input type="ematextil" name="timezone" class="form-control" placeholder="Enter timezone">
					</div>
					<div class="form-group">
						<label>Insurance Eligibility Verification #: </label>
						<input type="ematextil" name="timezone" class="form-control" placeholder="Enter timezone">
					</div>
					<div class="form-group">
						<label>Insurance Discovery: </label>
						<input type="ematextil" name="timezone" class="form-control" placeholder="Enter timezone">
					</div>
				</form>

                </div>

            </div>

        </div>
    </div>
</div>
@endsection