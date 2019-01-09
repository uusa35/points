@extends('backend.layouts.app')
@section('content')
    @include('backend.partials.breadcrumbs')
    @include('backend.partials._order_steps')
    <div class="portlet box blue">
        @include('backend.partials.forms.form_title')
        <div class="portlet-body form">
            <form class="horizontal-form" role="form" method="POST" action="{{ route('backend.order.store') }}"
                  enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="service_id" value="{{ session()->get('service_id') }}">
                <input type="hidden" name="lang" value="{{ app()->getLocale() }}">
                <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                <div class="form-body">
                    <div class="row center-block">
                        <div class="col-lg-6 col-lg-push-3">
                            @include("backend.partials.forms._order_title_notes")
                            {{--@if(session()->get('order_lang') == 'ar')--}}
                            @include('backend.modules.order._order_create_ar')
                            {{--@elseif(session()->get('order_lang') == 'en')--}}
                            {{--                                @include('backend.modules.order._order_create_en')--}}
                            {{--@else--}}
                            {{--@include('backend.modules.order._order_create_both')--}}
                            {{--@endif--}}
                            @if($service && $service->show_address)
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        {{ trans('general.address') }}
                                    </div>
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">{{ trans('general.address') }}</label>
                                                <input id="address" name="address" type="textbox"
                                                       value="{{ old("address") }}"
                                                       class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @include('backend.partials.forms._btn-group')
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

