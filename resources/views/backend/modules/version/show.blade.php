@extends('backend.layouts.app')
@section('content')
    @if($element)
        @include('backend.partials.breadcrumbs')
        <div class="tabbable-line">
            <ul class="nav nav-tabs nav-tabs-lg">
                <li class="active">
                    <a href="#tab_1" data-toggle="tab"> {{ trans('general.details') }} </a>
                </li>
                <li>
                    <a href="#tab_2" data-toggle="tab"> {{ trans('general.uploaded_files') }}
                        <span class="badge badge-success">{{ $element->files->count() }}</span>
                    </a>
                </li>
                <li>
                    <a href="#tab_3" data-toggle="tab"> {{ trans('general.job_related') }}
                        <span class="badge badge-success"></span>
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            {{ trans('general.description') }}
                        </div>
                        <div class="panel-body">
                            <p>
                                {{ $element->description }}
                            </p>
                        </div>
                    </div>
                    <p>
                    </p>
                    @if($element->images->isNotEmpty())
                        @include('backend.partials.gallery',['elements' => $element->images])
                    @endif
                </div>

                <div class="tab-pane" id="tab_2">
                    @if($element->files->isNotEmpty())
                        @include('backend.partials.files',['elements' => $element->files])
                    @else
                        <div class="alert">{{ trans('general.no_files') }}</div>
                    @endif
                </div>

                <div class="tab-pane" id="tab_3">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="portlet yellow-crusta box">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-cogs"></i>{{ trans('general.order_details') }}
                                    </div>
                                    <div class="actions">

                                        <a href="#" class="btn btn-default btn-sm">
                                            <i class="fa fa-pencil"></i> {{ trans('general.edit') }}</a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="row static-info">
                                        <div class="col-md-5 name"> Order #:</div>
                                        <div class="col-md-7 value"> 12313232
                                            <span class="label label-info label-sm"> Email confirmation was sent </span>
                                        </div>
                                    </div>
                                    <div class="row static-info">
                                        <div class="col-md-5 name"> Order Date & Time:</div>
                                        <div class="col-md-7 value"> Dec 27, 2013 7:16:25 PM</div>
                                    </div>
                                    <div class="row static-info">
                                        <div class="col-md-5 name"> Order Status:</div>
                                        <div class="col-md-7 value">
                                            <span class="label label-success"> Closed </span>
                                        </div>
                                    </div>
                                    <div class="row static-info">
                                        <div class="col-md-5 name"> Grand Total:</div>
                                        <div class="col-md-7 value"> $175.25</div>
                                    </div>
                                    <div class="row static-info">
                                        <div class="col-md-5 name"> Payment Information:</div>
                                        <div class="col-md-7 value"> Credit Card</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="portlet blue-hoki box">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-cogs"></i>Customer Information
                                    </div>
                                    <div class="actions">
                                        <a href="javascript:;" class="btn btn-default btn-sm">
                                            <i class="fa fa-pencil"></i> Edit </a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="row static-info">
                                        <div class="col-md-5 name"> Customer Name:</div>
                                        <div class="col-md-7 value"> Jhon Doe</div>
                                    </div>
                                    <div class="row static-info">
                                        <div class="col-md-5 name"> Email:</div>
                                        <div class="col-md-7 value"> jhon@doe.com</div>
                                    </div>
                                    <div class="row static-info">
                                        <div class="col-md-5 name"> State:</div>
                                        <div class="col-md-7 value"> New York</div>
                                    </div>
                                    <div class="row static-info">
                                        <div class="col-md-5 name"> Phone Number:</div>
                                        <div class="col-md-7 value"> 12234389</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="portlet green-meadow box">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-cogs"></i>Billing Address
                                    </div>
                                    <div class="actions">
                                        <a href="javascript:;" class="btn btn-default btn-sm">
                                            <i class="fa fa-pencil"></i> Edit </a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="row static-info">
                                        <div class="col-md-12 value"> Jhon Done
                                            <br> #24 Park Avenue Str
                                            <br> New York
                                            <br> Connecticut, 23456 New York
                                            <br> United States
                                            <br> T: 123123232
                                            <br> F: 231231232
                                            <br></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="portlet red-sunglo box">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-cogs"></i>Shipping Address
                                    </div>
                                    <div class="actions">
                                        <a href="javascript:;" class="btn btn-default btn-sm">
                                            <i class="fa fa-pencil"></i> Edit </a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="row static-info">
                                        <div class="col-md-12 value"> Jhon Done
                                            <br> #24 Park Avenue Str
                                            <br> New York
                                            <br> Connecticut, 23456 New York
                                            <br> United States
                                            <br> T: 123123232
                                            <br> F: 231231232
                                            <br></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6"></div>
                        <div class="col-md-6">
                            <div class="well">
                                <div class="row static-info align-reverse">
                                    <div class="col-md-8 name"> Sub Total:</div>
                                    <div class="col-md-3 value"> $1,124.50</div>
                                </div>
                                <div class="row static-info align-reverse">
                                    <div class="col-md-8 name"> Shipping:</div>
                                    <div class="col-md-3 value"> $40.50</div>
                                </div>
                                <div class="row static-info align-reverse">
                                    <div class="col-md-8 name"> Grand Total:</div>
                                    <div class="col-md-3 value"> $1,260.00</div>
                                </div>
                                <div class="row static-info align-reverse">
                                    <div class="col-md-8 name"> Total Paid:</div>
                                    <div class="col-md-3 value"> $1,260.00</div>
                                </div>
                                <div class="row static-info align-reverse">
                                    <div class="col-md-8 name"> Total Refunded:</div>
                                    <div class="col-md-3 value"> $0.00</div>
                                </div>
                                <div class="row static-info align-reverse">
                                    <div class="col-md-8 name"> Total Due:</div>
                                    <div class="col-md-3 value"> $1,124.50</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            @include('backend.partials._comments')
        </div>
    @else
        <div class="alert alert-danger">{{ trans('message.this_version_does_not_exist') }}</div>
    @endif
@endsection
