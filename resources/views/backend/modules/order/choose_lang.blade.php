@extends('backend.layouts.app')
@section('content')
    @include('backend.partials.breadcrumbs')
    <div class="portlet box blue">
        @include('backend.partials.forms.form_title')
        <div class="portlet-body">
            <div class="mt-element-step">
                <div class="row step-background">
                    <div class="mt-step-desc">
                        <div class="font-dark bold uppercase">{{ trans('general.choose_your_order_language') }}</div>
                        <div class="caption-desc font-grey-cascade">{{ trans('message.order_language_message') }}
                        </div>
                        <br/></div>
                    <div class="col-md-4 bg-grey-steel mt-step-col">
                        <div class="mt-step-title uppercase font-grey-cascade">
                            <a href="{{ route('backend.order.create',['lang' => 'ar']) }}" class="btn btn-info">
                                {{ trans('general.arabic_only') }}
                            </a>
                        </div>
                        <div class="mt-step-content font-grey-cascade">{{ trans('message.arabic_only') }}</div>

                    </div>
                    <div class="col-md-4 bg-grey-steel mt-step-col active">
                        <div class="mt-step-title uppercase font-grey-cascade">
                            <a href="{{ route('backend.order.create',['lang' => 'en']) }}" class="btn btn-warning">
                                {{ trans('general.english_only') }}
                            </a>
                        </div>
                        <div class="mt-step-content font-grey-cascade">{{ trans('message.english_only') }}</div>
                    </div>
                    <div class="col-md-4 bg-grey-steel mt-step-col">
                        <div class="mt-step-title uppercase font-grey-cascade">
                            <a href="{{ route('backend.order.create',['lang' => 'both']) }}" class="btn btn-danger">
                                {{ trans('general.arabic_and_english') }}
                            </a>
                        </div>
                        <div class="mt-step-content font-grey-cascade">{{ trans('message.arabic_and_english') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
