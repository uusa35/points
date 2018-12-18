<div class="row">
    <div class="col-sm-4 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
            <div class="visual">
                <i class="fa fa-money"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup" data-value="10">{{ $totalClientActiveOrders }}</span>
                </div>
                <div class="desc ">{{ trans('general.total_active_jobs') }}</div>
            </div>
        </a>
    </div>
    <div class="col-sm-4 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 green" href="#">
            <div class="visual">
                <i class="fa fa-user-circle"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup" data-value="10">{{ $totalClientOnProgressOrders }}</span>
                </div>
                <div class="desc">{{ trans('general.total_on_progress_jobs') }}</div>
            </div>
        </a>
    </div>
    @if($totalLastVersionFiles->isNotEmpty())
        <div class="col-sm-4 col-xs-12">
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
