@extends('backend.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light ">
                @include('backend.partials.forms.form_title',['title' => trans('general.my_files')])
                <div class="blog-page blog-content-1">
                    @if($element->images->isNotEmpty())
                        @include('backend.partials.gallery',['elements' => $element->images])
                    @else
                        <div class="alert alert-info">
                            {{ trans('message.no_images_yet_added_to_your_order') }}
                            <a href="{{ route('backend.file.create',['type' => 'order', 'id' => $element->id]) }}"
                               class="btn">{{ trans('general.add_images_files_to_your_order') }}</a>
                        </div>
                    @endif
                        <br>
                    @if($element->files->isNotEmpty())
                        @include('backend.partials.files',['elements' => $element->files])
                    @else
                        <div class="alert">{{ trans('general.no_files') }}</div>
                    @endif
                </div>

            </div>
        </div>
    </div>
@endsection
