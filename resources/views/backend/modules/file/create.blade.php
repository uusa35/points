@extends('backend.layouts.app')

@section('content')
    @include('backend.partials.breadcrumbs')
    @if(request()->type === 'order')
    @include('backend.partials._order_steps')
    @endif
    <div class="portlet box blue">
        @include('backend.partials.forms.form_title')
        <div class="portlet-body form">
            <div class="form-body">
                <div class="row text-center">
                        {{--<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 center-block">--}}
                            {{--<a class="dashboard-stat dashboard-stat-v2 blue-ebonyclay" data-toggle="modal" href="#"--}}
                               {{--data-target="#order-image" data-title="{{ trans('general.image') }}">--}}
                                {{--<div class="visual">--}}
                                    {{--<i class="fa fa-money"></i>--}}
                                {{--</div>--}}
                                {{--<div class="details">--}}
                                    {{--<div class="number">--}}
                                        {{--<span data-counter="counterup" data-value="10"></span>--}}
                                    {{--</div>--}}
                                    {{--<div class="desc ">{{ trans('general.add_image') }}</div>--}}
                                {{--</div>--}}
                            {{--</a>--}}
                        {{--</div>--}}
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 col-lg-push-4">
                            <a href="#"
                               data-toggle="modal" href="#"
                               data-target="#order-file" data-title="{{ trans('general.file') }}"
                            >
                                <img src="{{ asset('img/elements/upload.jpg') }}" alt="" class="img-responsive">
                            </a>
                        </div>
                        {{--<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">--}}
                            {{--<a class="dashboard-stat dashboard-stat-v2 green-dark"--}}
                               {{--data-toggle="modal" href="#"--}}
                               {{--data-target="#order-file" data-title="{{ trans('general.file') }}"--}}
                            {{-->--}}
                                {{--<div class="visual">--}}
                                    {{--<i class="fa fa-money"></i>--}}
                                {{--</div>--}}
                                {{--<div class="details">--}}
                                    {{--<div class="number">--}}
                                        {{--<span data-counter="counterup" data-value="10"></span>--}}
                                    {{--</div>--}}
                                    {{--<div class="desc ">{{ trans('general.add_file') }}</div>--}}
                                {{--</div>--}}
                            {{--</a>--}}
                        {{--</div>--}}
                </div>
                @include('backend.modules.order._add_file')
{{--                @include('backend.modules.order._add_image')--}}
            </div>
            <div class="form-actions right">
                {{--<button type="button" class="btn default">Cancel</button>--}}
                <a href="{{ route('backend.home') }}" class="btn btn-danger">{{ trans('general.skip_to_home_page') }}</a>
                {{--<button type="submit" class="btn btn-success">--}}
                    {{--<i class="fa fa-check"></i> {{ trans('general.save') }}--}}
                {{--</button>--}}
            </div>
        </div>
    </div>
    <div class="row">
            @include('backend.partials.files',['elements' => $files])
            @include('backend.partials.files_gallery',['elements' => $images])
    </div>
@endsection


