@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="card-deck">

      @can('is-admin')
      <div class="card col-3" style="min-width: 20rem;">
        <a href="{{ route('user.index') }}">
          <div class="card-body text-center">
            <i class="material-icons text-warning">groups</i>
            <h5 class="card-title font-weight-bold">Staff</h5>
            <p class="card-text text-dark">Staff Members: {{ $staff_count }}</p>
          </div>
        </a>
      </div>
      @endcan

      <div class="card col-3" style="min-width: 20rem;">
        <a href="{{ route('location.index') }}">
          <div class="card-body text-center">
            <i class="material-icons text-warning">navigation</i>
            <h5 class="card-title font-weight-bold">Locations</h5>
            <p class="card-text text-dark">Locations: {{ $locations_count }}</p>
          </div>
        </a>
      </div>

      <div class="card col-3" style="min-width: 20rem;">
        <a href="{{ route('collection.index') }}">
          <div class="card-body text-center">
            <i class="material-icons text-warning">workspaces</i>
            <h5 class="card-title font-weight-bold">Patient Collections</h5>
            <p class="card-text text-dark">Patients: {{ $patients_count }}</p>
          </div>
        </a>
      </div>

      <div class="card col-3" style="min-width: 20rem;">
        <a href="{{ route('profile.edit') }}">
          <div class="card-body text-center">
            <i class="material-icons text-warning">settings</i>
            <h5 class="card-title font-weight-bold">Settings</h5>
            <p class="card-text text-dark">Edit profile and change password</p>
          </div>
        </a>
      </div>

    </div>
  </div>
</div>
@endsection