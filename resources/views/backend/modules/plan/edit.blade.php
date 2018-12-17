@extends('backend.layouts.app')
@section('content')
    <div class="portlet box blue">
        @include('backend.partials.forms.form_title')
        <div class="portlet-body form">
            <!-- BEGIN FORM-->
            <form method="post" action="{{ route('backend.admin.plan.update', $element->id) }}" class="horizontal-form">
                @csrf
                <input type="hidden" name="_method" value="patch">
                <div class="form-body">
                    <h3 class="form-section">{{ $element->name }}</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">{{ trans('general.role_name') }}</label>
                                <input type="text" id="name" name="name" class="form-control" placeholder="{{ trans('general.role_name') }}"
                                       value="{{ $element->name }}" disabled>
                                <span class="help-block"> {{ trans('message.role_must_be_unique') }} </span>
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">{{ trans('general.slug_arabic') }}</label>
                                <input type="text" id="slug_ar" name="slug_ar" class="form-control"
                                       placeholder="slug ar" value="{{ $element->slug_ar }}">
                                {{--<span class="help-block"> This field has error. </span>--}}
                            </div>
                        </div>
                        <!--/span-->
                    </div>
                    <!--/row-->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">{{ trans("general.slug_english") }}</label>
                                <input type="text" id="slug_ar" name="slug_en" class="form-control"
                                       placeholder="slug en" value="{{ $element->slug_en }}">
                                {{--<span class="help-block"> This field has error. </span>--}}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">{{ trans('general.order') }}</label>
                                <input type="text" id="order" name="order" class="form-control" placeholder="{{ trans('general.order') }}"
                                       value="{{ $element->order }}">
                                <span class="help-block"> {{ trans('message.role_must_be_unique') }} </span>
                            </div>
                        </div>
                        {{--<div class="col-md-6">--}}
                            {{--<div class="form-group">--}}
                            {{--<label class="control-label">Icon</label>--}}
                            {{--<select class="form-control" name="icon">--}}
                            {{--@foreach($icons as $k => $v)--}}
                            {{--<option value="{{ $v }}" {{ $element->icon == $v ? 'selected' : null }}>{{ $v }}</option>--}}
                            {{--@endforeach--}}
                            {{--</select>--}}
                            {{--<span class="help-block"> <a target="_blank" href="https://fontawesome.com/cheatsheet"--}}
                            {{--class="">Check Visual Icons </a></span>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        <!--/span-->
                    </div>
                    <!--/row-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label sbold">{{ trans('general.active') }}</label>
                                    <div class="radio-list">
                                        <label class="radio-inline">
                                            <input type="radio" name="active" id="optionsRadios1"
                                                   value="1" {{ $element->active ? 'checked' : null }}> {{ trans('active') }}
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="active" id="optionsRadios2"
                                                   value="0" {{ $element->active  ? null : 'checked'}}> {{ trans('general.not_active') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                            @if(auth()->user()->isSuper)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label sbold">{{ trans('general.is_super_admin') }}</label>
                                        <div class="radio-list">
                                            <label class="radio-inline">
                                                <input type="radio" name="is_super" id="optionsRadios3"
                                                       value="1" {{ $element->is_super ? 'checked' : null }}> {{ trans('general.super_admin') }}
                                                Attributes</label>
                                            <label class="radio-inline">
                                                <input type="radio" name="is_super" id="optionsRadios4"
                                                       value="0" {{ $element->is_super  ? null : 'checked'}}> {{ trans('general.not_super_admin') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label sbold">{{ trans('admin') }}</label>
                                        <div class="radio-list">
                                            <label class="radio-inline">
                                                <input type="radio" name="is_admin" id="optionsRadios3"
                                                       value="1" {{ $element->is_admin ? 'checked' : null }}> {{ trans('general.admin') }}
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="is_admin" id="optionsRadios4"
                                                       value="0" {{ $element->is_admin  ? null : 'checked'}}> {{ trans('general.not_admin') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4>{{ trans('general.modules_visible_for_each_role') }}</h4>
                                            </div>
                                            <div class="panel-body">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label sbold">{{ trans('general.drawings') }}</label>
                                                        <div class="radio-list">
                                                            <label class="radio-inline">
                                                                <input type="radio" name="drawings" id="optionsRadios3"
                                                                       value="1" {{ $element->drawings ? 'checked' : null }}>
                                                                show drawings</label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="drawings" id="optionsRadios4"
                                                                       value="0" {{ $element->drawings  ? null : 'checked'}}>
                                                                hide drawings
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label sbold">{{ trans('general.documents') }}</label>
                                                        <div class="radio-list">
                                                            <label class="radio-inline">
                                                                <input type="radio" name="documents" id="optionsRadios3"
                                                                       value="1" {{ $element->documents ? 'checked' : null }}>
                                                                show documents</label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="documents" id="optionsRadios4"
                                                                       value="0" {{ $element->documents  ? null : 'checked'}}>
                                                                hide documents
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label sbold">{{ trans('general.phases') }}</label>
                                                        <div class="radio-list">
                                                            <label class="radio-inline">
                                                                <input type="radio" name="phases" id="optionsRadios3"
                                                                       value="1" {{ $element->phases ? 'checked' : null }}> {{ trans("general.show_phases") }}
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="phases" id="optionsRadios4"
                                                                       value="0" {{ $element->phases  ? null : 'checked'}}> {{ trans('general.hide_phases') }}
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label sbold">{{ trans('general.payments') }}</label>
                                                        <div class="radio-list">
                                                            <label class="radio-inline">
                                                                <input type="radio" name="payments" id="optionsRadios3"
                                                                       value="1" {{ $element->payments ? 'checked' : null }}> {{ trans('general.show_payments') }}
                                                                payments
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="payments" id="optionsRadios4"
                                                                       value="0" {{ $element->payments  ? null : 'checked'}}> {{ trans('general.hide_payments') }}
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label sbold">{{ trans('general.galleries') }}</label>
                                                        <div class="radio-list">
                                                            <label class="radio-inline">
                                                                <input type="radio" name="galleries" id="optionsRadios3"
                                                                       value="1" {{ $element->galleries ? 'checked' : null }}> {{ trans('general.show_gallaires') }}
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="galleries" id="optionsRadios4"
                                                                       value="0" {{ $element->galleries  ? null : 'checked'}}> {{ trans('general.hide_galleries') }}
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label sbold">{{ trans('general.subcontractors') }}</label>
                                                        <div class="radio-list">
                                                            <label class="radio-inline">
                                                                <input type="radio" name="subcontractors"
                                                                       id="optionsRadios3"
                                                                       value="1" {{ $element->subcontractors ? 'checked' : null }}> {{ trans('general.show_subcontractors') }}
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="subcontractors"
                                                                       id="optionsRadios4"
                                                                       value="0" {{ $element->subcontractors  ? null : 'checked'}}>{{ trans('general.hide_subcontractors') }}
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label sbold">{{ trans('general.timelines') }}</label>
                                                        <div class="radio-list">
                                                            <label class="radio-inline">
                                                                <input type="radio" name="timelines" id="optionsRadios3"
                                                                       value="1" {{ $element->timelines ? 'checked' : null }}>{{ trans('general.show_timelines') }}
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="timelines" id="optionsRadios4"
                                                                       value="0" {{ $element->timelines  ? null : 'checked'}}> {{ trans('general.hide_phases') }}
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label sbold">{{ trans('general.reports') }}</label>
                                                        <div class="radio-list">
                                                            <label class="radio-inline">
                                                                <input type="radio" name="reports" id="optionsRadios3"
                                                                       value="1" {{ $element->reports ? 'checked' : null }}>
                                                                {{ trans('general.show_reports') }}
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="reports" id="optionsRadios4"
                                                                       value="0" {{ $element->reports  ? null : 'checked'}}>
                                                                {{ trans('general.hide_reports') }}
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label sbold">{{ trans('general.consultants') }}</label>
                                                        <div class="radio-list">
                                                            <label class="radio-inline">
                                                                <input type="radio" name="consultants"
                                                                       id="optionsRadios3"
                                                                       value="1" {{ $element->consultants ? 'checked' : null }}>
                                                                {{ trans('general.show_consultants') }}
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="consultants"
                                                                       id="optionsRadios4"
                                                                       value="0" {{ $element->consultants  ? null : 'checked'}}>
                                                                {{ trans('general.hide_consultants') }}
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label sbold">{{ trans('general.livecam') }}</label>
                                                        <div class="radio-list">
                                                            <label class="radio-inline">
                                                                <input type="radio" name="livecam" id="optionsRadios3"
                                                                       value="1" {{ $element->livecam ? 'checked' : null }}>
                                                                {{ trans("general.show_livecam") }}
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="livecam" id="optionsRadios4"
                                                                       value="0" {{ $element->livecam  ? null : 'checked'}}>
                                                                {{ trans("general.hide_livecam") }}
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if(auth()->user()->isAdmin)
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label sbold">{{ trans('general.is_client') }}</label>
                                        <div class="radio-list">
                                            <label class="radio-inline">
                                                <input type="radio" name="is_client" id="optionsRadios3"
                                                       value="1" {{ $element->is_client ? 'checked' : null }}>
                                                {{ trans('general.show_client') }}</label>
                                            <label class="radio-inline">
                                                <input type="radio" name="is_client" id="optionsRadios4"
                                                       value="0" {{ $element->is_client  ? null : 'checked'}}>
                                                {{ trans('general._hide_clients') }}</label>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <!--/span-->
                    </div>
                    <!--/row-->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label sbold">Is Visible</label>
                                    <div class="radio-list">
                                        <label class="radio-inline">
                                            <input type="radio" name="is_visible" id="optionsRadios5"
                                                   value="1" {{ $element->visible ? 'checked' : null }}>
                                            Visible
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="is_visible" id="optionsRadios6"
                                                   value="0" {{ $element->is_visible ? null : 'checked'}}>
                                            Not
                                            Visible</label>
                                    </div>
                                    <span class="help-block"> Visible Means that this role shall appear on Application (ex. admin is invisible)</span>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                {{--<div class="form-group">--}}
                                {{--<label class="control-label sbold">Is Company</label>--}}
                                {{--<div class="radio-list">--}}
                                {{--<label class="radio-inline">--}}
                                {{--<input type="radio" name="is_company" id="optionsRadios7"--}}
                                {{--value="1" {{ $element->is_company ? 'checked' : null }}> Company--}}
                                {{--Attributes</label>--}}
                                {{--<label class="radio-inline">--}}
                                {{--<input type="radio" name="is_company" id="optionsRadios8"--}}
                                {{--value="0" {{ $element->is_company  ? null : 'checked'}}> No Company--}}
                                {{--Attributes</label>--}}
                                {{--</div>--}}
                                {{--<span class="help-block"> Role that has companies attributes (ex. branches) </span>--}}
                                {{--</div>--}}
                            </div>
                        </div>
                        <!--/span-->
                    </div>
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="form-group">
                                <label>Caption ar</label>
                                <input type="text" name="caption_ar" class="form-control"
                                       value="{{ $element->caption_ar }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Caption en </label>
                                <input type="text" name="caption_en" class="form-control"
                                       value="{{ $element->caption_en }}">
                            </div>
                        </div>
                        {{--<div class="form-group">--}}
                        {{--<label class="control-label">Hue (default)</label>--}}
                        {{--<div class="col-md-3">--}}
                        {{--<input type="text" name="color" id="hue-demo" class="form-control demo" data-control="hue" value="{{ $element->color }}">--}}
                        {{--</div>--}}
                    </div>
                </div>
                {{--<div class="form-actions right">--}}
                {{--<button type="button" class="btn default" href="{{ redirect()->back() }}">Cancel</button>--}}
                {{--<button type="submit" class="btn blue">--}}
                {{--<i class="fa fa-check"></i> Save--}}
                {{--</button>--}}
                {{--</div>--}}
                @include('backend.partials.forms._btn-group')
            </form>
            <!-- END FORM-->
        </div>
    </div>
@endsection

