<div class="page-bar">
    <ul class="page-breadcrumb">
        @section('breadcrumbs')
            @if(!isset($element) && !isset($elements))
                {{ Breadcrumbs::render(Route::currentRouteName()) }}
            @elseif(isset($elements))
                {{ Breadcrumbs::render(Route::currentRouteName(), $elements) }}
            @elseif(isset($element))
                {{ Breadcrumbs::render(Route::currentRouteName(), $element) }}
            @endif
        @show
    </ul>
    <div class="page-toolbar">
        <div class="btn-group pull-right">
            <button type="button" class="btn btn-fit-height grey-salt dropdown-toggle" data-toggle="dropdown"
                    data-hover="dropdown" data-delay="1000" data-close-others="true"> {{ trans('general.actions') }}
                <i class="fa fa-angle-down"></i>
            </button>
            <ul class="dropdown-menu pull-right" role="menu">
                <li>
                    <a href="{{ route('backend.home') }}">
                        <i class="icon-user-following"></i> {{ trans('general.dashboard') }}</a>
                </li>
                <li>
                    <a href="{{ route('frontend.home') }}">
                        <i class="icon-home"></i> {{ trans('general.home') }}</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="{{ route('backend.setting.index') }}">
                        <i class="icon-settings"></i> {{ trans('general.settings') }}</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- END PAGE HEADER-->