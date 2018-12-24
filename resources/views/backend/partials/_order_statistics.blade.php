{{--<div class="row">--}}
{{--<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">--}}
{{--<div class="dashboard-stat2 ">--}}
{{--<div class="display">--}}
{{--<div class="number">--}}
{{--<h3 class="font-green-sharp">--}}
{{--<span data-counter="counterup" data-value="7800">0</span>--}}
{{--<small class="font-green-sharp">$</small>--}}
{{--</h3>--}}
{{--<small>TOTAL PROFIT</small>--}}
{{--</div>--}}
{{--<div class="icon">--}}
{{--<i class="icon-pie-chart"></i>--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="progress-info">--}}
{{--<div class="progress">--}}
{{--<span style="width: 76%;" class="progress-bar progress-bar-success green-sharp">--}}
{{--<span class="sr-only">76% progress</span>--}}
{{--</span>--}}
{{--</div>--}}
{{--<div class="status">--}}
{{--<div class="status-title"> progress </div>--}}
{{--<div class="status-number"> 76% </div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">--}}
{{--<div class="dashboard-stat2 ">--}}
{{--<div class="display">--}}
{{--<div class="number">--}}
{{--<h3 class="font-red-haze">--}}
{{--<span data-counter="counterup" data-value="1349">0</span>--}}
{{--</h3>--}}
{{--<small>NEW FEEDBACKS</small>--}}
{{--</div>--}}
{{--<div class="icon">--}}
{{--<i class="icon-like"></i>--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="progress-info">--}}
{{--<div class="progress">--}}
{{--<span style="width: 85%;" class="progress-bar progress-bar-success red-haze">--}}
{{--<span class="sr-only">85% change</span>--}}
{{--</span>--}}
{{--</div>--}}
{{--<div class="status">--}}
{{--<div class="status-title"> change </div>--}}
{{--<div class="status-number"> 85% </div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">--}}
{{--<div class="dashboard-stat2 ">--}}
{{--<div class="display">--}}
{{--<div class="number">--}}
{{--<h3 class="font-blue-sharp">--}}
{{--<span data-counter="counterup" data-value="567"></span>--}}
{{--</h3>--}}
{{--<small>NEW ORDERS</small>--}}
{{--</div>--}}
{{--<div class="icon">--}}
{{--<i class="icon-basket"></i>--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="progress-info">--}}
{{--<div class="progress">--}}
{{--<span style="width: 45%;" class="progress-bar progress-bar-success blue-sharp">--}}
{{--<span class="sr-only">45% grow</span>--}}
{{--</span>--}}
{{--</div>--}}
{{--<div class="status">--}}
{{--<div class="status-title"> grow </div>--}}
{{--<div class="status-number"> 45% </div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">--}}
{{--<div class="dashboard-stat2 ">--}}
{{--<div class="display">--}}
{{--<div class="number">--}}
{{--<h3 class="font-purple-soft">--}}
{{--<span data-counter="counterup" data-value="276"></span>--}}
{{--</h3>--}}
{{--<small>NEW USERS</small>--}}
{{--</div>--}}
{{--<div class="icon">--}}
{{--<i class="icon-user"></i>--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="progress-info">--}}
{{--<div class="progress">--}}
{{--<span style="width: 57%;" class="progress-bar progress-bar-success purple-soft">--}}
{{--<span class="sr-only">56% change</span>--}}
{{--</span>--}}
{{--</div>--}}
{{--<div class="status">--}}
{{--<div class="status-title"> change </div>--}}
{{--<div class="status-number"> 57% </div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
<div class="row">
    @can('onlyAdmin')
        @if($totalActiveClientCompletedOrders)
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a class="dashboard-stat dashboard-stat-v2 yellow-casablanca" href="#">
                    <div class="visual">
                        <i class="fa fa-money"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup"
                                  data-value="10">{{ $totalActiveClientCompletedOrders }}</span>
                        </div>
                        <div class="desc ">{{ trans('general.total_active_completed_orders') }}</div>
                    </div>
                </a>
            </div>
        @endif
        @if($totalActiveClientOnProgressOrders)
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a class="dashboard-stat dashboard-stat-v2 purple-intense" href="#">
                    <div class="visual">
                        <i class="fa fa-money"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup"
                                  data-value="10">{{ $totalActiveClientOnProgressOrders->count() }}</span>
                        </div>
                        <div class="desc ">{{ trans('general.total_active_paid_on_progress_orders') }}</div>
                    </div>
                </a>
            </div>
        @endif
        @if($totalSuccessfulTransactions)
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a class="dashboard-stat dashboard-stat-v2 green-dark" href="#">
                    <div class="visual">
                        <i class="fa fa-money"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup"
                                  data-value="10">{{ $totalSuccessfulTransactions }}</span>
                        </div>
                        <div class="desc ">{{ trans('general.total_successful_transactions') }}</div>
                    </div>
                </a>
            </div>
        @endif
    @endcan
    @can('onlyClient')
        @if($totalClientActiveOrders)
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
                    <div class="visual">
                        <i class="fa fa-money"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup" data-value="10">{{ $totalClientActiveOrders }}</span>
                        </div>
                        <div class="desc ">{{ trans('general.total_active_paid_jobs') }}</div>
                    </div>
                </a>
            </div>
        @endif
        @if($totalClientOnProgressOrders)
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a class="dashboard-stat dashboard-stat-v2 green" href="#">
                    <div class="visual">
                        <i class="fa fa-bar-chart-o"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup" data-value="10">{{ $totalClientOnProgressOrders }}</span>
                        </div>
                        <div class="desc">{{ trans('general.total_on_progress_jobs') }}</div>
                    </div>
                </a>
            </div>
        @endif
        @if($totalClientCompletedOrders)
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a class="dashboard-stat dashboard-stat-v2 purple" href="#">
                    <div class="visual">
                        <i class="fa fa-bar-chart-o"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup" data-value="10">{{ $totalClientCompletedOrders }}</span>
                        </div>
                        <div class="desc">{{ trans('general.total_completed_orders') }}</div>
                    </div>
                </a>
            </div>
        @endif
        @if($totalLastVersionFiles->isNotEmpty())
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a class="dashboard-stat dashboard-stat-v2 red" href="#">
                    <div class="visual">
                        <i class="fa fa-bar-chart-o"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                    <span data-counter="counterup" data-value="10">{{
                    $totalLastVersionFiles->pluck('images')->flatten()->unique()->count() +
                      $totalLastVersionFiles->pluck('images')->flatten()->unique()->count()
                      }}</span></div>
                        <div class="desc">{{ trans('general.total_files_of_completed_orders') }}</div>
                    </div>
                </a>
            </div>
        @endif
    @endcan
</div>
