@extends('backend.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN PROFILE SIDEBAR -->
            <div class="profile-sidebar">
                <!-- PORTLET MAIN -->
                <div class="portlet light profile-sidebar-portlet ">
                    <!-- SIDEBAR USERPIC -->
                    <div class="profile-userpic text-center">
                        <img src="{{ asset('storage/uploads/images/thumbnail/'.$element->client->logo) }}"
                             class="img-responsive img-thumbnail"
                             alt=""></div>
                    <!-- END SIDEBAR USERPIC -->
                    <!-- SIDEBAR USER TITLE -->
                    <hr>
                    <div class="profile-usertitle">
                        <div class="profile-usertitle-name text-center"> {{ $element->client->name }}</div>
                        <div class="profile-usertitle-job text-center"> {{ $element->client->caption }}</div>
                    </div>
                    <hr>
                    <!-- END SIDEBAR USER TITLE -->
                    <!-- END SIDEBAR BUTTONS -->
                    <!-- SIDEBAR MENU -->
                    <div class="profile-usermenu">
                        <ul class="nav">
                            <li>
                                <a href="{{ route('backend.client.order.index',['user_id' => $element->user_id]) }}">
                                    <i class="icon-user"></i> {{ trans('general.client_projects') }}</a>
                            </li>
                        </ul>
                    </div>
                    <!-- END MENU -->
                </div>
                <!-- END PORTLET MAIN -->
                <!-- PORTLET MAIN -->
                <div class="portlet light ">
                    <!-- STAT -->
                    <div class="row list-separated profile-stat">
                        <div class="col-md-4 col-sm-4 col-xs-6">
                            <div class="uppercase profile-stat-title text-center"> 10</div>
                            <div class="uppercase profile-stat-text text-center"> {{ trans('general.reports') }}</div>
                        </div>
                    </div>
                    <!-- END STAT -->
                    <div>
                        <h4 class="profile-desc-title">{{ trans('general.description') }}</h4>
                        <span class="profile-desc-text"> {{ $element->description }}</span>
                        @if($element->ip_cam_url)
                            <div class="margin-top-20 profile-desc-link">
                                <i class="fa fa-camera"></i>
                                <a href="{{ $element->ip_cam_url }}">{{ trans('general.view_cam') }}</a>
                            </div>
                        @endif
                        @if($element->client->twitter_url)
                            <div class="margin-top-20 profile-desc-link">
                                <i class="fa fa-twitter"></i>
                                <a href="{{ $element->twitter_url }}">{{ trans('general.twitter') }}</a>
                            </div>
                        @endif
                        @if($element->client->facebook_url)
                            <div class="margin-top-20 profile-desc-link">
                                <i class="fa fa-facebook"></i>
                                <a href="{{ $element->facebook_url}}">{{ trans('general.facebook') }}</a>
                            </div>
                        @endif
                        @if($element->client->youtube_url)
                            <div class="margin-top-20 profile-desc-link">
                                <i class="fa fa-youtube"></i>
                                <a href="{{ $element->youtube_url}}">{{ trans('general.youtube') }}</a>
                            </div>
                        @endif
                    </div>
                </div>
                <!-- END PORTLET MAIN -->
            </div>
            <!-- END BEGIN PROFILE SIDEBAR -->
            <!-- BEGIN PROFILE CONTENT -->
            <div class="profile-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet light ">
                            <div class="portlet-title tabbable-line">
                                <div class="caption caption-md">
                                    <i class="icon-globe theme-font hide"></i>
                                    <span class="caption-subject font-blue-madison bold uppercase">{{ trans('general.details') }}
                                        - {{ $element->name }}</span>
                                </div>
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#tab_1_1" data-toggle="tab">{{ trans('general.reports') }}</a>
                                    </li>
                                    <li>
                                        <a href="#tab_1_2" data-toggle="tab">{{ trans('general.documents') }}</a>
                                    </li>
                                    <li>
                                        <a href="#tab_1_3" data-toggle="tab">{{ trans('general.payments') }}</a>
                                    </li>
                                    <li>
                                        <a href="#tab_1_4" data-toggle="tab">{{ trans('general.phases') }}</a>
                                    </li>
                                    <li>
                                        <a href="#tab_1_5" data-toggle="tab">{{ trans('general.drawings') }}</a>
                                    </li>
                                    <li>
                                        <a href="#tab_1_6" data-toggle="tab">{{ trans('general.subcontractors') }}</a>
                                    </li>
                                    <li>
                                        <a href="#tab_1_7" data-toggle="tab">{{ trans('general.consultants') }}</a>
                                    </li>
                                    <li>
                                        <a href="#tab_1_8" data-toggle="tab">{{ trans('general.suppliers') }}</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="portlet-body">
                                <div class="tab-content">
                                    <!-- PERSONAL INFO TAB -->
                                    <div class="tab-pane active" id="tab_1_1">
{{--                                        @include('backend.modules.order._abstracted_table', ['elements' => $element->reports])--}}
                                    </div>
                                    <!-- END PERSONAL INFO TAB -->
                                    <!-- CHANGE AVATAR TAB -->
                                    <div class="tab-pane" id="tab_1_2">
{{--                                        @include('backend.modules.order._abstracted_table', ['elements' => $element->documents])--}}
                                    </div>
                                    <!-- END CHANGE AVATAR TAB -->
                                    <!-- CHANGE PASSWORD TAB -->
                                    <!-- END PRIVACY SETTINGS TAB -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PROFILE CONTENT -->
        </div>
    </div>
@endsection
