@extends('layouts.app', ['activePage' => 'collection', 'titlePage' => __('Patient Eligibility')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header card-header-warning">
                <h4 class="card-title font-weight-bold">Patient Eligibility</h4>
            </div>

            <div class="card-body">
                @if(isset($eligibility->errors))
                    <h2 class="text-danger">Not Valid Token</h2>
                @else

                    <div class="form-group row">
                        <div class="font-weight-bold col-2 text-right">First Name: </div>
                        <div class="col-6">{{ $eligibility->eligibilityResponse->payer->providers->provider->subscribers->subscriber->firstName }}</div>
                    </div>
                    <div class="form-group row">
                        <div class="font-weight-bold col-2 text-right">Last Name: </div>
                        <div class="col-6">{{ $eligibility->eligibilityResponse->payer->providers->provider->subscribers->subscriber->lastName }}</div>
                    </div>
                    <div class="form-group row">
                        <div class="font-weight-bold col-2 text-right">DOB: </div>
                        <div class="col-6">{{ $eligibility->eligibilityResponse->payer->providers->provider->subscribers->subscriber->dateOfBirthString }}</div>
                    </div>
                    <div class="form-group row">
                        <div class="font-weight-bold col-2 text-right">Insurance ID: </div>
                        <div class="col-6">{{ $eligibility->eligibilityResponse->payer->providers->provider->subscribers->subscriber->identifier }}</div>
                    </div>

                    @if(isset($eligibility->eligibilityResponse->payer->providers->provider->subscribers->subscriber->address1))
                    <div class="form-group row">
                        <div class="font-weight-bold col-2 text-right">Address: </div>
                        <div class="col-6">{{ $eligibility->eligibilityResponse->payer->providers->provider->subscribers->subscriber->address1 }} - {{ $eligibility->eligibilityResponse->payer->providers->provider->subscribers->subscriber->address2 }}</div>
                    </div>
                    <div class="form-group row">
                        <div class="font-weight-bold col-2 text-right">City: </div>
                        <div class="col-6">{{ $eligibility->eligibilityResponse->payer->providers->provider->subscribers->subscriber->city }}</div>
                    </div>
                    <div class="form-group row">
                        <div class="font-weight-bold col-2 text-right">State: </div>
                        <div class="col-6">{{ $eligibility->eligibilityResponse->payer->providers->provider->subscribers->subscriber->state }}</div>
                    </div>
                    <div class="form-group row">
                        <div class="font-weight-bold col-2 text-right">ZipCode: </div>
                        <div class="col-6">{{ $eligibility->eligibilityResponse->payer->providers->provider->subscribers->subscriber->zip }}</div>
                    </div>
                    @endif

                    @if(count($eligibility->eligibilityResponse->eligibilityBenefits->eligibilityBenefit) > 0)
                        <div class="form-group row">
                            <div class="font-weight-bold col-2 text-right">Eligible: </div>
                            <div class="col-6 font-weight-bold text-success">Eligible for these services</div>
                        </div>

                        @foreach($eligibility->eligibilityResponse->eligibilityBenefits->eligibilityBenefit as $benefit)
                            @if(isset($benefit->serviceTypeCodeDefinition))
                                <div class="form-group row">
                                    <div class="font-weight-bold col-2 text-right">Service: </div>
                                    <div class="col-6">{{ $benefit->serviceTypeCodeDefinition }}</div>
                                </div>
                            @else
                            @endif
                        @endforeach
                    @else
                        <div class="form-group row">
                            <div class="font-weight-bold col-2 text-right">Eligible: </div>
                            <div class="col-6 text-danger">Not Eligible</div>
                        </div>
                    @endif
                    
                @endif
            </div>
        </div>
    </div>
</div>
@endsection