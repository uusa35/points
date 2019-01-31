<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('frontend.partials.head')
    @section('styles')
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ mix('css/frontend-custom.css') }}">
        @if(app()->isLocale('ar'))
            <link rel="stylesheet" href="{{ mix('css/frontend-custom-ar.css') }}">
        @else
            <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        @endif
    @show
</head>
<body>
<div class="container-fluid">
    <div class="row">
        @include('frontend.partials.header')
    </div>
    @include('frontend.partials.main_links')
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
