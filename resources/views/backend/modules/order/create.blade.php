@extends('backend.layouts.app')
@section('content')
    @include('backend.partials.breadcrumbs')
    @include('backend.partials._order_steps')
    <div class="portlet box blue">
        @include('backend.partials.forms.form_title')
        <div class="portlet-body form">
            <form class="horizontal-form" role="form" method="POST" action="{{ route('backend.order.store') }}"
                  id="order-create"
                  enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="service_id" value="{{ session()->get('service_id') }}">
                <input type="hidden" name="lang" value="{{ app()->getLocale() }}">
                <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                <div class="form-body">
                    <div class="row center-block">
                        <div class="col-lg-6 col-lg-push-3">
                            @include("backend.partials.forms._order_title_notes")
                            {{--@if(session()->get('order_lang') == 'ar')--}}
                            @include('backend.modules.order._order_create_ar')
                            {{--@elseif(session()->get('order_lang') == 'en')--}}
                            {{--                                @include('backend.modules.order._order_create_en')--}}
                            {{--@else--}}
                            {{--@include('backend.modules.order._order_create_both')--}}
                            {{--@endif--}}
                            @if($service && $service->show_address)
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        {{ trans('general.address') }}
                                    </div>
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">{{ trans('general.address') }}</label>
                                                <input id="address" name="address" type="textbox"
                                                       value="{{ old("address") }}"
                                                       class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @include('backend.partials.forms._order_show_phones')
                            <div class="form-actions text-center">
                                {{--<button type="button" class="btn default">Cancel</button>--}}
                                <a href="{!! route('backend.home') !!}"
                                   class="btn btn-danger">{{ trans('general.cancel') }}</a>

                                <a class="btn btn-info"
                                   data-toggle="modal" href="#" data-target="#order"
                                   data-title="{{ trans('general.confirm_create_order') }}"
                                   data-content="{{ trans('message.create_order_confirmation_message',['points' => $service->finalPoints]) }}"
                                   data-form_id="order-create"
                                >
                                    <i class="fa fa-fw fa-check-square"></i> {{ trans('general.confirm_create_order') }}
                                </a>
                                <div class="modal fade" id="order" tabindex="-1" role="basic" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-hidden="true"></button>
                                                <h4 class="modal-title"></h4>
                                            </div>
                                            <div class="modal-body"></div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn red btn-outline"
                                                        data-dismiss="modal">{{ trans('general.cancel') }}</button>
                                                <button type="button"
                                                        class="btn green modal-save">{{ trans('general.confirm_create_order') }}</button>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
