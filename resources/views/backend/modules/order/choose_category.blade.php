@extends('backend.layouts.app')
@section('content')
    @include('backend.partials.breadcrumbs')
    @include('backend.partials.forms.form_title')
    <div class="blog-page blog-content-1">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="blog-banner blog-container" style="padding: 10px;">
                            <h2 class="blog-title">
                                <a href="javascript:;">{{ trans('general.our_categories') }}</a>
                            </h2>
                            <p class="text-center">
                                {{ trans('message.choose_category_message') }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach($elements as $element)
                        <div class="col-md-4" style="height: 400px;">
                            <div class="blog-post-sm bordered blog-container">
                                <div class="blog-img-thumb">
                                    <a href="{{ route('backend.order.choose.service', ['category_id' => $element->id]) }}">
                                        <img src="{{ asset(env('LARGE').$element->image) }}"/>
                                    </a>
                                </div>
                                <div class="blog-post-content">
                                    <h2 class="blog-title blog-post-title">
                                        <a href="{{ route('backend.order.choose.service', ['category_id' => $element->id]) }}">{{ $element->slug }}</a>
                                    </h2>
                                    <p class="blog-post-desc"> {{ $element->description  }}</p>
                                    <p class="text-center">
                                        {{ $element->caption }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
