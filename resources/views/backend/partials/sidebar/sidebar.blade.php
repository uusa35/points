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
            @can('super')
                @include('backend.partials.sidebar._super_sidebar')

            @elsecan('admin')
                @include('backend.partials.sidebar._admin_sidebar')
            @elsecan('onlyClient')
                @include('backend.partials.sidebar._client_sidebar')
            @elsecan('onlyDesigner')
                @include('backend.partials.sidebar._designer_sidebar')
            @endcan


            {{--<li class="nav-item">--}}
            {{--<a href="javascript:;" class="nav-link nav-toggle">--}}
            {{--<i class="icon-folder"></i>--}}
            {{--<span class="title">Multi Level Menu</span>--}}
            {{--<span class="arrow "></span>--}}
            {{--</a>--}}
            {{--<ul class="sub-menu">--}}
            {{--<li class="nav-item">--}}
            {{--<a href="javascript:;" class="nav-link nav-toggle">--}}
            {{--<i class="icon-settings"></i> Item 1--}}
            {{--<span class="arrow"></span>--}}
            {{--</a>--}}
            {{--<ul class="sub-menu">--}}
            {{--<li class="nav-item">--}}
            {{--<a href="?p=dashboard-2" target="_blank" class="nav-link">--}}
            {{--<i class="icon-user"></i> Arrow Toggle--}}
            {{--<span class="arrow nav-toggle"></span>--}}
            {{--</a>--}}
            {{--<ul class="sub-menu">--}}
            {{--<li class="nav-item">--}}
            {{--<a href="#" class="nav-link">--}}
            {{--<i class="icon-power"></i> Sample Link 1</a>--}}
            {{--</li>--}}
            {{--<li class="nav-item">--}}
            {{--<a href="#" class="nav-link">--}}
            {{--<i class="icon-paper-plane"></i> Sample Link 1</a>--}}
            {{--</li>--}}
            {{--<li class="nav-item">--}}
            {{--<a href="#" class="nav-link">--}}
            {{--<i class="icon-star"></i> Sample Link 1</a>--}}
            {{--</li>--}}
            {{--</ul>--}}
            {{--</li>--}}
            {{--<li class="nav-item">--}}
            {{--<a href="#" class="nav-link">--}}
            {{--<i class="icon-camera"></i> Sample Link 1</a>--}}
            {{--</li>--}}
            {{--<li class="nav-item">--}}
            {{--<a href="#" class="nav-link">--}}
            {{--<i class="icon-link"></i> Sample Link 2</a>--}}
            {{--</li>--}}
            {{--<li class="nav-item">--}}
            {{--<a href="#" class="nav-link">--}}
            {{--<i class="icon-pointer"></i> Sample Link 3</a>--}}
            {{--</li>--}}
            {{--</ul>--}}
            {{--</li>--}}
            {{--<li class="nav-item">--}}
            {{--<a href="?p=dashboard-2" target="_blank" class="nav-link">--}}
            {{--<i class="icon-globe"></i> Arrow Toggle--}}
            {{--<span class="arrow nav-toggle"></span>--}}
            {{--</a>--}}
            {{--<ul class="sub-menu">--}}
            {{--<li class="nav-item">--}}
            {{--<a href="#" class="nav-link">--}}
            {{--<i class="icon-tag"></i> Sample Link 1</a>--}}
            {{--</li>--}}
            {{--<li class="nav-item">--}}
            {{--<a href="#" class="nav-link">--}}
            {{--<i class="icon-pencil"></i> Sample Link 1</a>--}}
            {{--</li>--}}
            {{--<li class="nav-item">--}}
            {{--<a href="#" class="nav-link">--}}
            {{--<i class="icon-graph"></i> Sample Link 1</a>--}}
            {{--</li>--}}
            {{--</ul>--}}
            {{--</li>--}}
            {{--<li class="nav-item">--}}
            {{--<a href="#" class="nav-link">--}}
            {{--<i class="icon-bar-chart"></i> Item 3 </a>--}}
            {{--</li>--}}
            {{--</ul>--}}
            {{--</li>--}}
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>
