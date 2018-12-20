@extends('backend.layouts.app')

@section('content')
    @include('backend.partials._order_statistics')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h4>{{ trans('general.designers') }}</h4>
                </div>
                <div class="panel-body">
                    @can('onlyAdmin')
                        @foreach($designers as $element)
                            <div class="col-lg-3"
                                 style="width: 24% !important; height : 400px; border: 1px solid lightgrey; margin: 5px;">
                                <div class="portlet light profile-sidebar-portlet ">
                                    <!-- SIDEBAR USERPIC -->
                                    <div class=" text-center">
                                        <img src="{{ asset(env('THUMBNAIL').$element->logo) }}"
                                             style="width: 100px; height : auto;"
                                             class="img-rounded img-sm img-thumbnail"
                                             alt="{{ $element->name }}"></div>
                                    <!-- END SIDEBAR USERPIC -->
                                    <!-- SIDEBAR USER TITLE -->
                                    <hr>
                                    <div class="profile-usertitle">
                                        <div class="profile-usertitle-name text-center"> {{ $element->name }}</div>
                                        <div class="profile-usertitle-name text-center"> {{ $element->email }}</div>
                                        <div class="profile-usertitle-job text-center"> {{ $element->caption }}</div>
                                    </div>
                                    <hr>
                                    <!-- END SIDEBAR USER TITLE -->
                                    <!-- SIDEBAR MENU -->
                                    <div class="profile-usermenu">
                                        <ul class="nav">
                                            <li>
                                                <a href="{{ route('backend.user.show',$element->id) }}">
                                                    <i class="icon-user"></i> {{ trans('general.profile') }}</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- END MENU -->
                                </div>
                            </div>
                        @endforeach
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="col-lg-4 pull-right">
                                    {{ $designers->render() }}
                                </div>
                            </div>
                        </div>
                    @endcan
                </div>
            </div>
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
