@extends('layouts.app')

@section('content')
    <div class="row justify-content-md-center">
        @include('frontend.partials.slider')
    </div>
    <div class="row justify-content-md-center" style="padding: 100px;">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h5>{{ trans("general.logos_from_our_designs") }}</h5>
                </div>
                <div class="card-body text-center">
                    <img src="{{ asset('img/logos.png') }}" class="img-fluid text-center" alt="{{ $settings->name }}">
                </div>
            </div>
        </div>
    </div>
    {{--@include('frontend.partials._home_tabs')--}}
@endsection
