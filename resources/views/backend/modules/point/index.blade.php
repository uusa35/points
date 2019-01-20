@extends('backend.layouts.app')
@section('content')
    @include('backend.partials.breadcrumbs')
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
                                            <h2 class="no-margin">{{ $plan->slug }}</h2>
                                        </div>
                                        <div class="arrow-down border-top-black"></div>
                                        <div class="price-table-pricing">
                                            <h3>
                                                {{ $plan->price }}
                                                <span
                                                    class="price-sign" style="padding: 20px;">{{ trans('general.kwd') }}</span>
                                            </h3>
                                            <p>{{ $plan->slug }}</p>
                                            @if($plan->apply_bonus)
                                                <div
                                                    class="price-ribbon">{{ trans('general.bonus') }} {{ $plan->bonus }} {{ trans('general.points') }}</div>
                                            @endif
                                        </div>
                                        <div class="price-table-content">
                                            <div class="row mobile-padding">
                                                <div class="col-xs-12 text-center mobile-padding">
                                                    <p style="min-height: 150px;">
                                                        {{ $plan->description }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="arrow-down arrow-grey"></div>
                                        <div class="price-table-footer">
                                            <Form action="{{ route('web.payment.create') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $plan->id }}">
                                                <button type="submit" class="btn price-button sbold uppercase" style="width : 80%; background-color : {{ $plan->color }}">{{ trans('general.buy_now') }}
                                                </button>
                                            </Form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
            @include('backend.partials._transactions',['elements' => $transactions])
        </div>
    </div>
@endsection
