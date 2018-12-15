<li class="nav-item {{ activeItem('order') }}">
    <a href="{{ route('backend.order.index',['is_paid' => true]) }}" class="nav-link nav-toggle">
        <i class="fa fa-fw fa-newspaper-o"></i>
        <span class="title">{{ trans('general.orders') }}</span>
        <span class="selected"></span>
        <span class="arrow open"></span>
    </a>
    <ul class="sub-menu">
        <li class="nav-item start ">
            <a href="{{ route('backend.order.index',['is_complete' => true]) }}"
               class="nav-link ">
                <i class="icon-plus"></i>
                <span class="title">{{ trans('general.completed_orders') }}</span>
            </a>
        </li>
        <li class="nav-item start ">
            <a href="{{ route('backend.order.index',['is_complete' => false]) }}"
               class="nav-link ">
                <i class="icon-plus"></i>
                <span class="title">{{ trans('general.on_progress_orders') }}</span>
            </a>
        </li>
        <li class="nav-item start ">
            <a href="{{ route('backend.order.index',['is_paid' => false]) }}"
               class="nav-link ">
                <i class="icon-plus"></i>
                <span class="title">{{ trans('general.unpaid_orders_history') }}</span>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item {{ activeItem('file') }}">
    <a href="{{ route('backend.file.index') }}" class="nav-link nav-toggle">
        <i class="fa fa-fw fa-file"></i>
        <span class="title">{{ trans('general.my_files') }}</span>
        <span class="selected"></span>
        <span class="arrow open"></span>
    </a>
    </li>
<li class="nav-item {{ activeItem('point') }}">
    <a href="{{ route('backend.point.index') }}" class="nav-link nav-toggle">
        <i class="fa fa-fw fa-dollar"></i>
        <span class="title">{{ trans('general.my_points') }}</span>
        <span class="selected"></span>
        <span class="arrow open"></span>
    </a>
</li>
<li class="nav-item {{ activeItem('user') }}">
    <a href="{{ route('backend.user.show',auth()->id()) }}" class="nav-link nav-toggle">
        <i class="fa fa-fw fa-user-circle"></i>
        <span class="title">{{ trans('general.my_profile') }}</span>
        <span class="selected"></span>
        <span class="arrow open"></span>
    </a>
</li>
