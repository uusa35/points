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
                        <div class="col-sm-4" style="height: 400px;">
                            <div class="blog-post-sm bordered blog-container">
                                <div class="blog-img-thumb">
                                    <a href="{{ route('backend.order.choose.lang', ['service_id' => $element->id]) }}">
                                        <img src="{{ asset(env('LARGE').$element->image) }}"/>
                                    </a>
                                </div>
                                <div class="blog-post-content">
                                    <h2 class="blog-title blog-post-title">
                                        <a href="{{ route('backend.order.choose.lang', ['service_id' => $element->id]) }}">{{ $element->slug }}</a>
                                    </h2>
                                    <p class="blog-post-desc"> {{ $element->description  }}</p>
                                    <p class="text-center">
                                        {{ $element->caption }}
                                    </p>
                                    <h4 class="text-center">
                                        {{ $element->apply_bonus ? $element->sale_points : $element->points }} {{ trans('general.points') }}
                                    </h4>
                                    <div class="blog-post-foot">
                                        {{--<div class="blog-post-meta">--}}
                                            {{--<i class="fa fa-fw fa-dot-circle-o font-blue"></i>--}}
                                            {{--<a href="javascript:;">{{ $element->points }} {{ trans('general.points') }}</a>--}}
                                        {{--</div>--}}
                                        {{--@if($element->on_sale)--}}
                                            {{--<div class="blog-post-meta">--}}
                                                {{--<i class="icon-bubble font-blue"></i>--}}
                                                {{--<a href="javascript:;">{{ $element->sale_points}}</a>--}}
                                            {{--</div>--}}
                                        {{--@endif--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
