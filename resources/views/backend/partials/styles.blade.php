@if (app()->isLocale('ar'))
    <link href="{{ mix('css/backend-rtl.css') }}" rel="stylesheet">
@else
    <link href="{{ mix('css/backend.css') }}" rel="stylesheet">
@endif
@auth
    <style type="text/css">
        .page-header.navbar,.page-header.navbar .page-logo {
            background-color: {{ auth()->user()->role->color }};
        }
    </style>
@endauth
