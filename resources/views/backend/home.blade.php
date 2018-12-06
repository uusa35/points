@extends('backend.layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
                <div class="visual">
                    <i class="fa fa-money"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="10">10000</span>
                    </div>
                    <div class="desc ">{{ trans('total_active_projects') }}</div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 green" href="#">
                <div class="visual">
                    <i class="fa fa-user-circle"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="10">10000</span>
                    </div>
                    <div class="desc">{{ trans('general.total_active_clients') }}</div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 red" href="#">
                <div class="visual">
                    <i class="fa fa-bar-chart-o"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="10">10000</span></div>
                    <div class="desc">{{ trans('general.total_active_subcontractors') }}</div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 purple" href="#">
                <div class="visual">
                    <i class="fa fa-globe"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="10">10000</span>
                    </div>
                    <div class="desc">{{ trans('general.total_active_consultants') }}</div>
                </div>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="portlet box red">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>{{ trans('general.instructions') }}
                    </div>
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#portlet_tab_1" data-toggle="tab"> {{ trans('general.tab_1') }}</a>
                        </li>
                        <li>
                            <a href="#portlet_tab_2" data-toggle="tab"> {{ trans('general.tab_2') }} </a>
                        </li>
                        <li class="">
                            <a href="#portlet_tab_3" data-toggle="tab"> {{ trans('general.tab_3') }} </a>
                        </li>
                    </ul>
                </div>
                <div class="portlet-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="portlet_tab_1">
                            <div class="portlet-body">
                                <div class="scroller" style="height:200px" data-rail-visible="1"
                                     data-rail-color="yellow" data-handle-color="#a1b2bd">
                                    <p>
                                        {{ trans('message.tab_1') }}
                                    </p>

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="portlet_tab_2">
                            <div class="scroller" style="height:200px" data-rail-visible="1" data-rail-color="yellow"
                                 data-handle-color="#a1b2bd">
                                <p>
                                    {{ trans('message.tab_2') }}
                                </p>
                            </div>
                        </div>
                        <div class="tab-pane" id="portlet_tab_3">
                            <div class="scroller" style="height:200px" data-rail-visible="1"
                                 data-rail-color="yellow" data-handle-color="#a1b2bd">
                                <p>
                                    {{ trans('message.tab_3') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>{{ trans('general.instructions') }}
                    </div>
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#portlet_tab_4" data-toggle="tab"> {{ trans('general.tab_4') }} </a>
                        </li>
                        <li>
                            <a href="#portlet_tab_5" data-toggle="tab"> {{ trans('general.tab_5') }} </a>
                        </li>
                        <li class="">
                            <a href="#portlet_tab_6" data-toggle="tab"> {{ trans('general.tab_6') }} </a>
                        </li>
                    </ul>
                </div>
                <div class="portlet-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="portlet_tab_4">
                            <div class="portlet-body">
                                <div class="scroller" style="height:200px" data-rail-visible="1"
                                     data-rail-color="yellow" data-handle-color="#a1b2bd">
                                    <p>
                                        {{ trans('message.tab_4') }}
                                    </p>

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="portlet_tab_5">
                            <div class="scroller" style="height:200px" data-rail-visible="1" data-rail-color="yellow"
                                 data-handle-color="#a1b2bd">
                                <p>
                                    {{ trans('message.tab_5') }}
                                </p>
                            </div>
                        </div>
                        <div class="tab-pane" id="portlet_tab_6">
                            <div class="scroller" style="height:200px" data-rail-visible="1"
                                 data-rail-color="yellow" data-handle-color="#a1b2bd">
                                <p>
                                    {{ trans('message.tab_6') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
