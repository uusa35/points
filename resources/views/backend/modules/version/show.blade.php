@extends('backend.layouts.app')
@section('content')
    @if($element)
        @include('backend.partials.breadcrumbs')
        <div class="tabbable-line">
            <ul class="nav nav-tabs nav-tabs-lg">
                <li class="active">
                    <a href="#tab_1" data-toggle="tab"> {{ trans('general.details') }} </a>
                </li>
                <li>
                    <a href="#tab_2" data-toggle="tab"> {{ trans('general.uploaded_files') }}
                        <span class="badge badge-success">{{ $element->files->count() }}</span>
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            @include('backend.partials._version_details',['element' => $element])
                        </div>
                        {{--<div class="col-md-6 col-sm-12">--}}
                            {{--@include('backend.partials._order_details',['element' => $element->job->order])--}}
                        {{--</div>--}}
                        {{--<div class="col-md-6 col-sm-12">--}}
                            {{--@include('backend.partials._job_details',['element' => $element->job])--}}
                        {{--</div>--}}
                        @if($images->isNotEmpty())
                            @include('backend.partials.files_gallery',['elements' => $images])
                        @else
                            <div class="alert alert-info">{{ trans('general.no_images') }}</div>
                        @endif
                    </div>
                </div>

                <div class="tab-pane" id="tab_2">
                    @if($files->isNotEmpty())
                        @include('backend.partials.files',['elements' => $files])
                    @else
                        <div class="alert alert-warning">{{ trans('general.no_files') }}</div>
                    @endif
                </div>
            </div>
            @include('backend.partials._comments')
        </div>
    @else
        <div class="alert alert-danger">{{ trans('message.this_version_does_not_exist') }}</div>
    @endif
@endsection
