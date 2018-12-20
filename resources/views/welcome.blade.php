<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ env('APP_NAME') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    @section('title')
        <title>{{ config('app.name') .' '. $settings->name_ar .' '. $settings->name_en }}</title>
    @show
    <meta name="description"
          content="{{ trans('general.meta_description') . $settings->name_ar . $settings->name_en . trans('general.app_keywords')}}">
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
    <meta name="google-site-verification" content="hk7_iuTCtc_EiXLSBSoMzQs-K7-Ru-MuIB9DYHVlnbk"/>
    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('images/logo.ico') }}"/>
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset(env('THUMBNAIL').$settings->logo) }}">
    <link href="{{ asset(env('THUMBNAIL').$settings->logo) }}" rel="shortcut icon" type="image/jpg">


    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
                <a href="{{ url('/logout') }}"
                   onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <i class="icon-key"></i> {{ trans('general.logout') }} </a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="content">
        <div class="title m-b-md">
            <img style="max-width: 120px;" src="{{ asset(env('THUMBNAIL').$settings->logo) }}"
                 alt="{{ $settings->name }}">
        </div>
        <p class="text-center">
            {{ $settings->on_home_speech }}
        </p>

        <div class="links">
            @auth
                @can('isAdmin')
                    <a href="{{ route('backend.admin.order.index') }}">Orders</a>
                    <a href="{{ route('backend.admin.setting.index') }}">Settings</a>
                    <a href="{{ route('backend.admin.category.index') }}">Categories</a>
                    <a href="{{ route('backend.admin.service.index') }}">Services</a>
                @elsecan('onlyDesigner')
                    <a href="{{ route('backend.order.index') }}">Orders & Jobs</a>
                    <a href="{{ route('backend.user.show', auth()->id()) }}">My Profile</a>
                @elsecan('onlyClient')
                    <a href="{{ route('backend.order.index') }}">My Orders</a>
                    <a href="{{ route('backend.point.index') }}">Recharge</a>
                    <a href="{{ route('backend.user.show', auth()->id()) }}">My Profile</a>
                    <a href="{{ route('backend.file.show', auth()->id()) }}">My Files</a>
                @endif
            @endauth
        </div>
    </div>
</div>
<form id="logout-form" action="{{ url('/logout') }}" method="POST"
      style="display: none;">
    {{ csrf_field() }}
</form>
</body>
</html>
