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
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <link rel="shortcut icon" href="{{ asset('img/logo.ico') }}"/>
    <link href="{{ asset('img/logo.png') }}" rel="shortcut icon" type="image/png">
    @section('styles')
        @include('backend.partials.styles')
    @show
</head>

{{--<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white page-md">--}}
<body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-md">
{{--<body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-sidebar-closed">--}}
{{--<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">--}}
@include('backend.partials.nav')
@include('backend.partials._confirm_delete_modal')
<div class="clearfix"></div>
<div class="page-container">
    @include('backend.partials.sidebar')
    <div class="page-content-wrapper">
        <div class="page-content" style="min-height: 800px;">
            @include('backend.partials.breadcrumbs')
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