@extends('layouts.app', ['activePage' => 'location', 'titlePage' => __('Locations')])

@section('content')
<div class="content">
	<div class="container-fluid">
		<div class="col-md-12">
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
@endsection