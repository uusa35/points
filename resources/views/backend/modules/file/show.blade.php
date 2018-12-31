@extends('backend.layouts.app')
@section('content')
    @include('backend.partials.breadcrumbs')
    <div class="tabbable-line">
        <ul class="nav nav-tabs nav-tabs-lg">
            <li class="'active">
                <a href="#tab_1" data-toggle="tab"> {{ trans('general.images') }} </a>
            </li>
            <li class="'active">
                <a href="#tab_2" data-toggle="tab"> {{ trans('general.pdfs') }} </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab_1">
                @if($element->job->versions->last()->images->isNotEmpty())
                    @include('backend.partials.gallery',['elements' => $element->images])
                @endif
            </div>
            <div class="tab-pane" id="tab_2">
                @if($element->job->versions->last()->files->isNotEmpty())
                    @include('backend.partials.files',['elements' => $element->files])
                @else
                    <div class="alert">{{ trans('general.no_files') }}</div>
                @endif
            </div>
        </div>
    </div>
@endsection
