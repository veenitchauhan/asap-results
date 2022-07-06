@extends('layouts.public', ['activePage' => 'location', 'titlePage' => __('Locations')])

@section('content')
<div class="container" style="height: auto;">
    <div class="row align-items-center">
        <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
            <form class="form" method="POST" action="{{ route('login') }}">
                @csrf

                <div class="card card-login card-hidden mb-3">
                    <div class="card-header card-header-warning text-center">
                        <h4 class="card-title"><strong>{{ __('Location and Lab') }}</strong></h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="label col-4">Locations: </div>
                            <select name="lab_id" class="col-8 custom-select">
                                <option value="" selected>--Select--</option>
                                @foreach($locations as $location)
                                <option value="{{ $location->id }}">{{ $location->location_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group row">
                            <div class="label col-4">Labs: </div>
                            <select name="lab_id" class="col-8 custom-select">
                                <option value="" selected>--Select--</option>
                                @foreach($labs as $lab)
                                <option value="{{ $lab->id }}">{{ $lab->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="card-footer justify-content-center">
                        <button type="submit" class="btn btn-warning btn-link btn-lg">{{ __('Next') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection