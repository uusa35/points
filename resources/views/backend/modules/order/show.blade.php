@extends('backend.layouts.app')
@section('content')
    @include('backend.partials.breadcrumbs')
    <div class="tabbable-line">
        <ul class="nav nav-tabs nav-tabs-lg">
            <li class="active">
                <a href="#tab_1" data-toggle="tab"> {{ trans('general.details') }} </a>
            </li>
            <li>
                <a href="#tab_2" data-toggle="tab"> {{ trans('general.job_related') }}
                    <span class="badge badge-success"></span>
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab_1">
                <div class="row">
                    <div class="col-md-8 col-sm-12">
                        @include('backend.partials._order_details')
                    </div>
                    <div class="col-md-4 col-sm-12">
                        @include('backend.partials._client_information',['element' => $element->client])
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6"></div>
                    <div class="col-md-6">
                        <div class="well">
                            <div class="row static-info align-reverse">
                                <div class="col-md-8 name"> {{ trans('general.total_cost') }}:</div>
                                <div class="col-md-3 value"> {{ $element->points }} {{ trans('general.points') }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                @if(!$element->is_complete)
                    @if($files->isNotEmpty())
                        @include('backend.partials.files',['elements' => $files])
                    @else
                        <div class="alert alert-warning">{{ trans('general.no_files') }}</div>
                    @endif
                    @if($images->isNotEmpty())
                        @include('backend.partials.files_gallery',['elements' => $images])
                    @else
                        <div class="alert alert-info">{{ trans('general.no_images') }}</div>
                    @endif
                @else
                    <div class="alert alert-info">
                        {{ trans('message.this_order_is_complete_please_check_my_files_page_in_order_to_view_your_files') }}
                    </div>
                @endif
            </div>

            <zdiv class="tab-pane" id="tab_2">
                {{--@if(!$element->is_complete)--}}
                @if($element->job)
                    @include('backend.partials._job_details',['element' => $element->job])
                    @if($element->job->versions->isNotEmpty())
                        @include('backend.partials._version_details',['elements' => $element->job->versions])
                    @endif
                    {{--@else--}}
                    {{--<div class="alert alert-info">{{ trans('message.this_job_does_not_exist') }}</div>--}}
                    {{--@endif--}}
                @else
                    <div class="alert alert-info">
                        {{ trans('message.this_order_is_complete_please_check_my_files_page_in_order_to_view_your_files') }}
                    </div>
            @endif
        </div>

    </div>
    @include('backend.partials._comments')
    </div>
@endsection
