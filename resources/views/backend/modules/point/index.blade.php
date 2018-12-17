@extends('backend.layouts.app')
@section('content')
    <div class="portlet box blue">
        @include('backend.partials.forms.form_title')
        <div class="portlet-body">
            @if($paymentPlans->isNotEmpty())
                <div class="pricing-content-1">
                    <div class="row">
                        <div class="col-lg-10 col-lg-push-1">
                            @foreach($paymentPlans as $plan)
                                <div class="col-md-4">
                                    <div class="price-column-container border-active">
                                        <div class="price-table-head" style="background-color: {{ $plan->color  }};">
                                            <h2 class="no-margin">{{ $plan->name }}</h2>
                                        </div>
                                        <div class="arrow-down border-top-black"></div>
                                        <div class="price-table-pricing">
                                            <h3>
                                                <span
                                                    class="price-sign">{{ trans('general.kwd') }}</span>{{ $plan->price }}
                                            </h3>
                                            <p>{{ $plan->slug }}</p>
                                            @if($plan->apply_bonus)
                                                <div
                                                    class="price-ribbon">{{ trans('general.bonus') }} {{ $plan->bonus }} {{ trans('general.points') }}</div>
                                            @endif
                                        </div>
                                        <div class="price-table-content">
                                            <div class="row mobile-padding">
                                                <div class="col-xs-3 text-right mobile-padding">
                                                    <i class="icon-user-follow"></i>
                                                </div>
                                                <div class="col-xs-9 text-left mobile-padding">
                                                    {{ $plan->description }}
                                                </div>
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
                </div>
            @endif
            @include('backend.partials._transactions')
        </div>
    </div>
@endsection
