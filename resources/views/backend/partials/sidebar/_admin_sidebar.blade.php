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
</li>
