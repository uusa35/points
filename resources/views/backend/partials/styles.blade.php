@if (app()->isLocale('ar'))
    <link href="{{ mix('css/backend-rtl.css') }}" rel="stylesheet">
@else
    <link href="{{ mix('css/backend.css') }}" rel="stylesheet">
@endif