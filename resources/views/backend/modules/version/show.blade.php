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
                        <div class="col-md-6 col-sm-6">
                            @include('backend.partials._version_details',['element' => $element])
                        </div>
                        {{--<div class="col-md-6 col-sm-12">--}}
                        {{--@include('backend.partials._order_details',['element' => $element->job->order])--}}
                        {{--</div>--}}
                        {{--<div class="col-md-6 col-sm-12">--}}
                        {{--@include('backend.partials._job_details',['element' => $element->job])--}}
                        {{--</div>--}}
                        @include('backend.partials.files_gallery',['elements' => $images])
                    </div>
                </div>

                <div class="tab-pane" id="tab_2">
                        @include('backend.partials.files',['elements' => $files])
                </div>
            </div>
            @include('backend.partials._comments')
        </div>
    @else
        <div class="alert alert-danger">{{ trans('message.this_version_does_not_exist') }}</div>
    @endif
@endsection
