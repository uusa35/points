@extends('backend.layouts.app')

@section('content')
    @include('backend.partials.breadcrumbs')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box blue">
                @include('backend.partials.forms.form_title')
                <div class="portlet-body form">
                    <div class="form-body">
                        <div class="row center-block">
                            <div class="col-lg-6 col-lg-push-3">
                                {{--<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 center-block">--}}
                                    {{--<a class="dashboard-stat dashboard-stat-v2 blue-ebonyclay" data-toggle="modal"--}}
                                       {{--href="#"--}}
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
                                <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                                    <a class="dashboard-stat dashboard-stat-v2 green-dark" data-toggle="modal" href="#"
                                       data-target="#order-file" data-title="{{ trans('general.files') }}">
                                        <div class="visual">
                                            <i class="fa fa-money"></i>
                                        </div>
                                        <div class="details">
                                            <div class="number">
                                                <span data-counter="counterup" data-value="10"></span>
                                            </div>
                                            <div class="desc ">{{ trans('general.add_file_or_image') }}</div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @include('backend.modules.file._add_file')
                        {{--@include('backend.modules.file._add_image')--}}
                    </div>
                </div>
            </div>
            <div class="portlet light ">
                @include('backend.partials.forms.form_title')
                <div class="blog-page blog-content-1">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="blog-banner blog-container" style="padding: 10px;">
                                        <h2 class="blog-title">
                                            <a href="javascript:;">{{ trans('general.my_folder') }}</a>
                                        </h2>
                                        <p class="text-center">
                                            {{ trans('message.profile_my_folder_message') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                @foreach($categories as $element)
                                    <div class="col-sm-4" style="height: 400px;">
                                        <div class="blog-post-sm bordered blog-container">
                                            <div class="blog-img-thumb">
                                                <a href="{{ route('backend.file.show.list', ['type' => 'user', 'id' => auth()->id(), 'category_id' => $element->id]) }}">
                                                    <img src="{{ asset(env('LARGE').$element->image) }}"/>
                                                </a>
                                            </div>
                                            <div class="blog-post-content">
                                                <h2 class="blog-title blog-post-title">
                                                    <a href="{{ route('backend.file.show.list', ['type' => 'user', 'id' => auth()->id(), 'category_id' => $element->id]) }}">{{ $element->slug }}</a>
                                                </h2>
                                                <p class="blog-post-desc"> {{ $element->description  }}</p>
                                                <p class="text-center">
                                                    {{ $element->caption }}
                                                </p>
                                                <div class="blog-post-foot">
                                                    {{--<div class="blog-post-meta">--}}
                                                        {{--<i class="fa fa-fw fa-paint-brush font-blue"></i>--}}
                                                        {{--<a href="javascript:;">{{ auth()->user()->files()->get() }} {{ trans('general.files_count') }}</a>--}}
                                                    {{--</div>--}}
                                                    {{--<div class="blog-post-meta">--}}
                                                    {{--<i class="icon-bubble font-blue"></i>--}}
                                                    {{--<a href="javascript:;">{{ $element->caption }}</a>--}}
                                                    {{--</div>--}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
