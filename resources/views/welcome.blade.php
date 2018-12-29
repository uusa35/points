<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ env('APP_NAME') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    @section('title')
        <title>{{ config('app.name') .' '. $settings->name_ar .' '. $settings->name_en }}</title>
    @show
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
            margin: 0;
        }

        .full-height {
            width: 100%;
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
<div class="container-fluid">
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}">{{ trans('general.home') }}</a>
                    <a href="{{ url('/logout') }}"
                       onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <i class="icon-key"></i> {{ trans('general.logout') }} </a>
                @else
                    <a href="{{ route('login') }}">{{ trans('general.login') }}</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">{{ trans('general.register') }}</a>
                    @endif
                    <a href="{{ route('frontend.language.change','en') }}">{{ trans('general.switch_lang') }}</a>
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
                        <a href="{{ route('backend.home') }}">{{ trans('general.dashboard') }}</a>
                        <a href="{{ route('backend.admin.order.index') }}">{{ trans('general.orders') }}</a>
                        <a href="{{ route('backend.admin.setting.index') }}">{{ trans('general.settings') }}</a>
                        <a href="{{ route('backend.admin.category.index') }}">{{ trans('general.categories') }}</a>
                        <a href="{{ route('backend.admin.service.index') }}">{{ trans('general.services') }}</a>
                    @elsecan('onlyDesigner')
                        <a href="{{ route('backend.order.index') }}">Orders & {{ trans('general.my_jobs') }}</a>
                        <a href="{{ route('backend.user.show', auth()->id()) }}">My {{ trans('general.my_profile') }}</a>
                    @elsecan('onlyClient')
                        <a href="{{ route('backend.order.index') }}">My {{ trans('general.orders') }}</a>
                        <a href="{{ route('backend.point.index') }}">{{ trans('general.recharge') }}</a>
                        <a href="{{ route('backend.user.show', auth()->id()) }}">My {{ trans('general.my_profile') }}</a>
                        <a href="{{ route('backend.file.show', auth()->id()) }}">My {{ trans('general.my_files') }}</a>
                    @endif
                @endauth
            </div>
        </div>
    </div>

    <div class="row justify-content-md-center">
        <div class="col">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    @foreach($sliders as $slider)
                        <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}"
                            class="{{ $loop->first ? 'active' : null  }}"></li>
                    @endforeach
                </ol>
                <div class="carousel-inner">
                    @foreach($sliders as $slider)
                        <div class="carousel-item {{ $loop->first ? 'active' : null  }}">
                            <img class="d-block w-100"
                                 src="{{ asset(env('LARGE').$slider->image) }}"
                                 alt="{{ $slider->caption }}">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>{{ $slider->caption }}</h5>
                            </div>
                        </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">{{ trans('general.previous') }}</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">{{ trans('general.next') }}</span>
                </a>
            </div>
        </div>
    </div>
    <div class="row justify-content-md-center" style="padding: 100px;">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h5>{{ $settings->title_one }}</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">{{ $settings->section_one }}</p>
                    {{--<a href="#" class="btn btn-primary">Go somewhere</a>--}}
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h5>{{ $settings->title_two }}</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">{{ $settings->section_two }}</p>
                    {{--<a href="#" class="btn btn-primary">Go somewhere</a>--}}
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">{{ $settings->title_three }}</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">{{ $settings->section_three }}</p>
                    {{--<a href="#" class="btn btn-primary">Go somewhere</a>--}}
                </div>
            </div>
        </div>
    </div>
</div>

<form id="logout-form" action="{{ url('/logout') }}" method="POST"
      style="display: none;">
    {{ csrf_field() }}
</form>
<script>
    window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
    ]); ?>
</script>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
