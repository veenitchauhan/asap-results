@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'home', 'title' => __('ASAP Results')])

@section('content')
<div class="container" style="height: auto;">
  <div class="row justify-content-center">
      <div class="col-lg-7 col-md-8" style="margin-top: 150px;">
          <h1 class="text-white text-center">{{ __('Welcome to ASAP Results.') }}</h1>
      </div>
  </div>
</div>
@endsection
