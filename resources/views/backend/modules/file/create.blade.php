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
                <div class="row center-block">
                    <div class="col-lg-6 col-lg-push-3">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 center-block">
                            <a class="dashboard-stat dashboard-stat-v2 blue-ebonyclay" data-toggle="modal" href="#"
                               data-target="#order-image" data-title="{{ trans('general.image') }}">
                                <div class="visual">
                                    <i class="fa fa-money"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value="10"></span>
                                    </div>
                                    <div class="desc ">{{ trans('general.add_image') }}</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <a class="dashboard-stat dashboard-stat-v2 green-dark" data-toggle="modal" href="#"
                               data-target="#order-file" data-title="{{ trans('general.file') }}">
                                <div class="visual">
                                    <i class="fa fa-money"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value="10"></span>
                                    </div>
                                    <div class="desc ">{{ trans('general.add_file') }}</div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                @include('backend.modules.order._add_file')
                @include('backend.modules.order._add_image')
            </div>
            @include('backend.partials.forms._btn-group')
            <div class="row">
                <div class="col-lg-12">
                    @if($element->images->isNotEmpty())
                        @include('backend.partials._images_details',['elements' => $element->images])
                    @else
                        <div class="alert alert-info">{{ trans('general.no_images_uploaded') }}</div>
                    @endif
                </div>
                <div class="col-lg-12">
                    @if($element->files->isNotEmpty())
                        @include('backend.partials._files_details',['elements' => $element->files])
                    @else
                        <div class="alert alert-info">{{ trans('general.no_files_uploaded') }}</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection


