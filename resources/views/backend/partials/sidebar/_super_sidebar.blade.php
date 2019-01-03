<li class="nav-item {{ activeItem('user') }}">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="icon-users"></i>
        <span class="title">{{ trans('general.users') }}</span>
        <span class="selected"></span>
        <span class="arrow open"></span>
    </a>
    <ul class="sub-menu">
        @foreach($roles as $r)
            @if($r->is_super && auth()->user()->isSuper)
                <li class="nav-item start ">
                    <a href="{{ route('backend.admin.user.index', ['role_id' => $r->id]) }}"
                       class="nav-link ">
                        <i class="icon-user-following"></i>
                        <span class="title">{{ $r->name }}</span>
                    </a>
                </li>
            @elseif(!$r->is_super)
                <li class="nav-item start ">
                    <a href="{{ route('backend.admin.user.index', ['role_id' => $r->id]) }}"
                       class="nav-link ">
                        <i class="icon-user-following"></i>
                        <span class="title">{{ $r->name }}</span>
                    </a>
                </li>
            @endif
        @endforeach
    </ul>
</li>
<li class="nav-item {{ activeItem('role') }}">
    <a href="{{ route('backend.admin.role.index') }}" class="nav-link nav-toggle">
        <i class="icon-layers"></i>
        <span class="title">{{ trans('general.roles') }}</span>
        <span class="selected"></span>
        <span class="arrow open"></span>
    </a>
    {{--<ul class="sub-menu">--}}
        {{--<li class="nav-item start ">--}}
            {{--<a href="{{ route('backend.admin.role.index') }}"--}}
               {{--class="nav-link ">--}}
                {{--<i class="icon-users"></i>--}}
                {{--<span class="title">{{ trans('general.roles') }}</span>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="nav-item start ">--}}
            {{--<a href="{{ route('backend.admin.privilege.index') }}"--}}
               {{--class="nav-link ">--}}
                {{--<i class="icon-layers"></i>--}}
                {{--<span class="title">{{ trans('general.privileges') }}</span>--}}
            {{--</a>--}}
        {{--</li>--}}
    {{--</ul>--}}
</li>
<li class="nav-item {{ activeItem('plan') }}">
    <a href="{{ route('backend.admin.plan.index') }}" class="nav-link nav-toggle">
        <i class="icon-credit-card"></i>
        <span class="title">{{ trans('general.payment_plans') }}</span>
        <span class="selected"></span>
        <span class="arrow open"></span>
    </a>
</li>
<li class="nav-item {{ activeItem('order') }}">
    <a href="{{ route('backend.admin.order.index') }}" class="nav-link nav-toggle">
        <i class="fa fa-fw fa-newspaper-o"></i>
        <span class="title">{{ trans('general.orders') }}</span>
        <span class="selected"></span>
        <span class="arrow open"></span>
    </a>
    <ul class="sub-menu">
        <li class="nav-item start ">
            <a href="{{ route('backend.admin.order.index',['is_paid' => true]) }}"
               class="nav-link ">
                <i class="icon-plus"></i>
                <span class="title">{{ trans('general.paid_orders') }}</span>
            </a>
        </li>
        <li class="nav-item start ">
            <a href="{{ route('backend.admin.order.index',['jobs' => false]) }}"
               class="nav-link ">
                <i class="icon-plus"></i>
                <span class="title">{{ trans('general.paid_orders_that_do_not_yet_have_jobs') }}</span>
            </a>
        </li>
        <li class="nav-item start ">
            <a href="{{ route('backend.admin.order.index',['is_complete' => true]) }}"
               class="nav-link ">
                <i class="icon-plus"></i>
                <span class="title">{{ trans('general.completed_orders') }}</span>
            </a>
        </li>
        <li class="nav-item start ">
            <a href="{{ route('backend.admin.order.index',['is_complete' => false]) }}"
               class="nav-link ">
                <i class="icon-plus"></i>
                <span class="title">{{ trans('general.on_progress') }}</span>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item {{ activeItem('point') }}">
    <a href="{{ route('backend.point.index') }}" class="nav-link nav-toggle">
        <i class="fa fa-fw fa-dollar"></i>
        <span class="title">{{ trans('general.my_points') }}</span>
        <span class="selected"></span>
        <span class="arrow open"></span>
    </a>
</li>
<li class="nav-item {{ activeItem('category') }}">
    <a href="{{ route('backend.admin.category.index') }}" class="nav-link nav-toggle">
        <i class="fa fa-fw fa-sort"></i>
        <span class="title">{{ trans('general.categories') }}</span>
        <span class="selected"></span>
        <span class="arrow open"></span>
    </a>
</li>
<li class="nav-item {{ activeItem('service') }}">
    <a href="{{ route('backend.admin.service.index') }}" class="nav-link nav-toggle">
        <i class="fa fa-fw fa-product-hunt"></i>
        <span class="title">{{ trans('general.services') }}</span>
        <span class="selected"></span>
        <span class="arrow open"></span>
    </a>
</li>
<li class="nav-item {{ activeItem('setting') }}">
    <a href="{{ route('backend.admin.setting.show', auth()->user()->id) }}" class="nav-link nav-toggle">
        <i class="fa fa-fw fa-gears"></i>
        <span class="title">{{ trans('general.settings') }}</span>
        <span class="selected"></span>
        <span class="arrow open"></span>
    </a>
</li>
<li class="nav-item {{ activeItem('slider') }}">
    <a href="{{ route('backend.admin.slider.index') }}" class="nav-link nav-toggle">
        <i class="fa fa-fw fa-slideshare"></i>
        <span class="title">{{ trans('general.sliders') }}</span>
        <span class="selected"></span>
        <span class="arrow open"></span>
    </a>
</li>
