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
                        <div class="desc ">{{ trans('general.total_active_paid_on_progress_orders') }}</div>
                    </div>
                </a>
            </div>
        @endif
    @endcan
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
</div>
