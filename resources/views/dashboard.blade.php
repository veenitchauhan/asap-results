@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="card-deck">

      <div class="card col-3" style="min-width: 20rem;" data-toggle="modal" data-target="#addNewLocation">
        <!-- <a href="{{ route('collection.index') }}"> -->
        <div class="card-body text-center">
          <!-- <i class="material-icons text-warning">workspaces</i> -->
          <h5 class="card-title font-weight-bold">Collections</h5>
          <p class="card-text text-dark">Patients: {{ $patients_count }}</p>
        </div>
        <!-- </a> -->
      </div>

      <div class="card col-3" style="min-width: 20rem;">
        <a href="#">
          <div class="card-body text-center">
            <!-- <i class="material-icons text-warning">navigation</i> -->
            <h5 class="card-title font-weight-bold">Insurance Eligibility</h5>
            <p class="card-text text-dark"></p>
          </div>
        </a>
      </div>

      <div class="card col-3" style="min-width: 20rem;">
        <a href="#">
          <div class="card-body text-center">
            <!-- <i class="material-icons text-warning">navigation</i> -->
            <h5 class="card-title font-weight-bold">Insurance Discovery</h5>
            <p class="card-text text-dark"></p>
          </div>
        </a>
      </div>

      <div class="card col-3" style="min-width: 20rem;">
        <a href="#">
          <div class="card-body text-center">
            <!-- <i class="material-icons text-warning">navigation</i> -->
            <h5 class="card-title font-weight-bold">Reports</h5>
            <p class="card-text text-dark"></p>
          </div>
        </a>
      </div>

      <div class="card col-3" style="min-width: 20rem;">
        <a href="#">
          <div class="card-body text-center">
            <!-- <i class="material-icons text-warning">navigation</i> -->
            <h5 class="card-title font-weight-bold">Test Type</h5>
            <p class="card-text text-dark"></p>
          </div>
        </a>
      </div>

      <div class="card col-3" style="min-width: 20rem;">
        <a href="#">
          <div class="card-body text-center">
            <!-- <i class="material-icons text-warning">navigation</i> -->
            <h5 class="card-title font-weight-bold">Orders</h5>
            <p class="card-text text-dark"></p>
          </div>
        </a>
      </div>

      <div class="card col-3" style="min-width: 20rem;">
        <a href="#">
          <div class="card-body text-center">
            <!-- <i class="material-icons text-warning">navigation</i> -->
            <h5 class="card-title font-weight-bold">Results</h5>
            <p class="card-text text-dark"></p>
          </div>
        </a>
      </div>

      <div class="card col-3" style="min-width: 20rem;">
        <a href="#">
          <div class="card-body text-center">
            <!-- <i class="material-icons text-warning">navigation</i> -->
            <h5 class="card-title font-weight-bold">Laboratories</h5>
            <p class="card-text text-dark"></p>
          </div>
        </a>
      </div>

    </div>
  </div>
</div>

<div class="modal fade" id="addNewLocation" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Location and Laboratory</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="form-group row">
          <div class="label col-4">Location: </div>
          <select name="lab_id" class="col-8 custom-select">
            <option value="" selected>--Select--</option>
            @foreach($locations as $location)
            <option value="{{ $location->id }}">{{ $location->location_name }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group row">
          <div class="label col-4">Laboratory: </div>
          <select name="lab_id" class="col-8 custom-select">
            <option value="" selected>--Select--</option>
            @foreach($labs as $lab)
            <option value="{{ $lab->id }}">{{ $lab->name }}</option>
            @endforeach
          </select>
        </div>

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="{{ route('collection.index') }}">
          <button class="btn btn-warning">Next</button>
        </a>
      </div>
    </div>
  </div>
</div>
@endsection