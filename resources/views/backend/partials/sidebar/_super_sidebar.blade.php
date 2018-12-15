<li class="nav-item {{ activeItem('user') }}">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="icon-users"></i>
        <span class="title">{{ trans('general.users') }}</span>
        <span class="selected"></span>
        <span class="arrow open"></span>
    </a>
    <ul class="sub-menu">
        @foreach($roles as $r)
            <li class="nav-item start ">
                <a href="{{ route('backend.admin.user.index', ['role_id' => $r->id]) }}"
                   class="nav-link ">
                    <i class="icon-user-following"></i>
                    <span class="title">{{ $r->name }}</span>
                </a>
            </li>
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
    <a href="{{ route('backend.file.index') }}" class="nav-link nav-toggle">
        <i class="fa fa-fw fa-file"></i>
        <span class="title">{{ trans('general.my_files') }}</span>
        <span class="selected"></span>
        <span class="arrow open"></span>
    </a>
    <a href="{{ route('backend.point.index') }}" class="nav-link nav-toggle">
        <i class="fa fa-fw fa-dollar"></i>
        <span class="title">{{ trans('general.my_points') }}</span>
        <span class="selected"></span>
        <span class="arrow open"></span>
    </a>
    <a href="{{ route('backend.admin.setting.show', auth()->user()->id) }}" class="nav-link nav-toggle">
        <i class="fa fa-fw fa-gears"></i>
        <span class="title">{{ trans('general.settings') }}</span>
        <span class="selected"></span>
        <span class="arrow open"></span>
    </a>
</li>
