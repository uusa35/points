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
