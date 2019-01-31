<div class="flex-center position-ref full-height">

    <div class="content">
        {{--<div class="row">--}}
        {{--<div class="col">--}}
        {{--<p class="text-center">--}}
        {{--{{ $settings->on_home_speech }}--}}
        {{--</p>--}}
        {{--</div>--}}
        {{--</div>--}}

        <div class="links">
            @auth
                @can('isAdmin')
                    <a class="btn btn-outline-light btn-lg" href="{{ route('backend.home') }}"
                       role="button"> {{ trans('general.dashboard') }}</a>
                    <a class="btn btn-outline-light btn-lg"
                       href="{{ route('backend.admin.order.index') }}">{{ trans('general.orders') }}</a>
                    <a class="btn btn-outline-light btn-lg"
                       href="{{ route('backend.admin.setting.index') }}">{{ trans('general.settings') }}</a>
                    <a class="btn btn-outline-light btn-lg"
                       href="{{ route('backend.admin.category.index') }}">{{ trans('general.categories') }}</a>
                    <a class="btn btn-outline-light btn-lg"
                       href="{{ route('backend.admin.service.index') }}">{{ trans('general.services') }}</a>
                @elsecan('onlyDesigner')
                    <a class="btn btn-outline-light btn-lg" href="{{ route('backend.order.index') }}">Orders
                        & {{ trans('general.my_jobs') }}</a>
                    <a class="btn btn-outline-light btn-lg"
                       href="{{ route('backend.user.show', auth()->id()) }}">My {{ trans('general.my_profile') }}</a>
                @elsecan('onlyClient')
                    <a class="btn btn-outline-light btn-lg"
                       href="{{ route('backend.order.index') }}">My {{ trans('general.orders') }}</a>
                    <a class="btn btn-outline-light btn-lg"
                       href="{{ route('backend.point.index') }}">{{ trans('general.recharge') }}</a>
                    <a class="btn btn-outline-light btn-lg"
                       href="{{ route('backend.user.show', auth()->id()) }}">My {{ trans('general.my_profile') }}</a>
                    <a class="btn btn-outline-light btn-lg"
                       href="{{ route('backend.file.show', auth()->id()) }}">My {{ trans('general.my_files') }}</a>
                @endif
            @endauth
        </div>
    </div>
</div>
