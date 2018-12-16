<?php
/**
 * Created by PhpStorm.
 * User: usama
 * Date: 12/16/18
 * Time: 6:39 PM
 */
@extends('backend.layouts.app')
@section('content')
    <div class="portlet box blue">
        @include('backend.partials.forms.form_title')
        <div class="portlet-body form">
            <form class="horizontal-form" role="form" method="POST" action="{{ route('backend.order.store') }}"
                  enctype="multipart/form-data">
                @csrf
                <div class="form-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <a data-toggle="modal" href="#" data-target="#order-image"
                               data-title="{{ trans('general.image') }}"
                            >{{ trans('general.add_image') }}</a>
                            <a data-toggle="modal" href="#" data-target="#order-file"
                               data-title="{{ trans('general.file') }}"
                            >{{ trans('general.add_file') }}</a>
                        </div>
                    </div>
                    @include('backend.modules.order._add_file')
                    @include('backend.modules.order._add_image')

                </div>
                @include('backend.partials.forms._btn-group')
            </form>
        </div>
    </div>
@endsection


