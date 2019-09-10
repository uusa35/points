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
    @can('isAdmin')
    @include('frontend.partials.main_links')
    @section('content')
        @show
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
