<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
    <!-- END SIDEBAR -->
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-hover-submenu page-sidebar-menu-closed"
            data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <li class="nav-item {{ activeItem('order') }}">
                <a href="{{ route('backend.client.order.index',['status' => 'on_progress']) }}" class="nav-link nav-toggle">
                    <i class="fa fa-fw fa-newspaper-o"></i>
                    <span class="title">{{ trans('general.orders') }}</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start ">
                        <a href="{{ route('backend.designer.order.index',['status' => 'on_progress']) }}"
                           class="nav-link ">
                            <i class="icon-plus"></i>
                            <span class="title">{{ trans('general.on_progress_orders') }}</span>
                        </a>
                    </li>
                    <li class="nav-item start ">
                        <a href="{{ route('backend.designer.order.index',['status' => 'is_complete']) }}"
                           class="nav-link ">
                            <i class="icon-plus"></i>
                            <span class="title">{{ trans('general.completed_orders') }}</span>
                        </a>
                    </li>
                    <li class="nav-item start ">
                        <a href="{{ route('backend.designer.order.index') }}"
                           class="nav-link ">
                            <i class="icon-plus"></i>
                            <span class="title">{{ trans('general.all_projects') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>
