<!DOCTYPE html>
<!--[if IE 8]>
<html lang="{{ app()->getLocale() }}" class="ie8 no-js">
<![endif]-->
<!--[if IE 9]>
<html lang="{{ app()->getLocale() }}" class="ie9 no-js">
<![endif]-->
<html lang="{{ app()->getLocale() }}" dir="{{ app()->isLocale('ar') ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8"/>
    <title>{{ env('APP_NAME') }}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    @section('title')
        <title>{{ config('app.name') .' '. $settings->name_ar .' '. $settings->name_en }}</title>
    @show
    <meta name="description" content="{{ trans('general.meta_description') . $settings->name_ar . $settings->name_en . trans('general.app_keywords')}}">
    <meta name="keywords" content="{{ trans('general.app_keywords') }}"/>
    <meta name="author" content="{{ trans('general.app_author') }}">
    <meta name="country" content="{{ $settings->country }}">
    <meta name="mobile" content="{{ $settings->mobile }}">
    <meta name="phone" content="{{ $settings->phone }}">
    <meta name="logo" content="{{ asset(env('LARGE').$settings->logo) }}">
    <meta name="email" content="{{ $settings->email }}">
    <meta name="address" content="{{ $settings->address }}">
    <meta name="name" content="{{ $settings->company }}">
    <meta name="lang" content="{{ app()->getLocale() }}">
    <meta name="google-site-verification" content="hk7_iuTCtc_EiXLSBSoMzQs-K7-Ru-MuIB9DYHVlnbk" />
    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('images/logo.ico') }}"/>
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset(env('THUMBNAIL').$settings->logo) }}">
    <link href="{{ asset(env('THUMBNAIL').$settings->logo) }}" rel="shortcut icon" type="image/jpg">
    @section('styles')
        @include('backend.partials.styles')
    @show
</head>

{{--<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white page-md">--}}
<body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-md" onload="initialize()">
{{--<body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-sidebar-closed">--}}
{{--<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">--}}
@auth
    @include('backend.partials.nav')
    @include('backend.partials._confirm_delete_modal')
@endauth
<div class="clearfix"></div>
<div class="page-container">
    @include('backend.partials.sidebar.sidebar')
    <div class="page-content-wrapper">
        <div class="page-content" style="min-height: 800px;">
            @include('backend.partials.notifications')
            @include('backend.partials._confirm_delete_modal')
            @section('content')
            @show
        </div>
    </div>
    @include('backend.partials.footer')
</div>
@section('scripts')
    @include('backend.partials.scripts')
@show
</body>
</html>
