@extends('backend.layouts.app')
@section('content')
    <div class="portlet box blue">
        @include('backend.partials.forms.form_title')
        <div class="portlet-body">
            @if($paymentPlans->isNotEmpty())
                <div class="pricing-content-1">
                    <div class="row">
                        @foreach($paymentPlans as $plan)
                            <div class="col-md-4">
                                <div class="price-column-container border-active">
                                    <div class="price-table-head bg-green">
                                        <h2 class="no-margin">{{ $plan->name }}</h2>
                                    </div>
                                    <div class="arrow-down border-top-green"></div>
                                    <div class="price-table-pricing">
                                        <h3>
                                            <span class="price-sign">$</span>59</h3>
                                        <p>per month</p>
                                        <div class="price-ribbon">Popular</div>
                                    </div>
                                    <div class="price-table-content">
                                        <div class="row mobile-padding">
                                            <div class="col-xs-3 text-right mobile-padding">
                                                <i class="icon-user-follow"></i>
                                            </div>
                                            <div class="col-xs-9 text-left mobile-padding">20 Members</div>
                                        </div>
                                        <div class="row mobile-padding">
                                            <div class="col-xs-3 text-right mobile-padding">
                                                <i class="icon-drawer"></i>
                                            </div>
                                            <div class="col-xs-9 text-left mobile-padding">500GB Storage</div>
                                        </div>
                                        <div class="row mobile-padding">
                                            <div class="col-xs-3 text-right mobile-padding">
                                                <i class="icon-cloud-download"></i>
                                            </div>
                                            <div class="col-xs-9 text-left mobile-padding">Cloud Syncing</div>
                                        </div>
                                        <div class="row mobile-padding">
                                            <div class="col-xs-3 text-right mobile-padding">
                                                <i class="icon-refresh"></i>
                                            </div>
                                            <div class="col-xs-9 text-left mobile-padding">Daily Backups</div>
                                        </div>
                                    </div>
                                    <div class="arrow-down arrow-grey"></div>
                                    <div class="price-table-footer">
                                        <button type="button" class="btn green price-button sbold uppercase">Sign Up
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
            @if($elements->isNotEmpty())
                @include('backend.partials._transactions')
            @endif
        </div>
    </div>
@endsection
