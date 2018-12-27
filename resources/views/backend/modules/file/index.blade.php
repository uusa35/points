@extends('backend.layouts.app')

@section('content')
    @include('backend.partials.breadcrumbs')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
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
                                                    <div class="blog-post-meta">
                                                        <i class="fa fa-fw fa-paint-brush font-blue"></i>
                                                        {{--<a href="javascript:;">{{ $element->services->count() }} {{ trans('general.services_available') }}</a>--}}
                                                    </div>
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
                @if($element->orders)
                <div class="portlet-body">
                    <div class="m-heading-1 border-green m-bordered">
                        <h3>{{ trans('general.instructions') }}</h3>
                        <p>
                            {{ trans('message.backend_files_index_message') }}
                        </p>
                    </div>
                    <table id="dataTable" class="table table-striped table-bordered table-hover" cellspacing="0"
                           width="100%">
                        {{--<table class="table table-striped table-bordered table-hover order-column" id="dataTable">--}}
                        <thead>
                        <tr>
                            <th>{{ trans('general.id') }}</th>
                            <th>{{ trans('general.name_ar') }}</th>
                            <th>{{ trans('general.name_en') }}</th>
                            <th>{{ trans('general.client') }}</th>
                            <th>{{ trans('general.service_name') }}</th>
                            <th>{{ trans('general.category_name') }}</th>
                            <th>{{ trans('general.Action') }}</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>{{ trans('general.id') }}</th>
                            <th>{{ trans('general.name_ar') }}</th>
                            <th>{{ trans('general.name_en') }}</th>
                            <th>{{ trans('general.client') }}</th>
                            <th>{{ trans('general.service_name') }}</th>
                            <th>{{ trans('general.category_name') }}</th>
                            <th>{{ trans('general.view_files') }}</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($element->orders as $element)
                            <tr>
                                <td>{{ $element->id }}</td>
                                <td>{{ $element->name_ar }}</td>
                                <td>{{ $element->name_en }}</td>
                                <td>{{ $element->client->name }}</td>
                                <td>{{ $element->service->name }}</td>
                                <td>{{ $element->service->category->slug }}</td>
                                <td>
                                    <a href="{{ route('backend.file.show', $element->id) }}"
                                       class="btn btn-success">{{ trans('general.view_files') }}</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                    @else
                    <div class="alert alert-warning">{{ trans('general.no_orders') }}</div>
                @endif
            </div>
        </div>
    </div>
@endsection
