@extends('backend.layouts.app')
@section('content')
    <div class="portlet box blue">
        @include('backend.partials.forms.form_title')
        <div class="portlet-body form">
            <!-- BEGIN FORM-->
            <form method="post" action="{{ route('backend.admin.role.update', $element->id) }}" class="horizontal-form">
                @csrf
                <input type="hidden" name="_method" value="patch">
                <div class="form-body">
                    <h3 class="form-section">{{ $element->name }} {{ trans('general.role_name') }}</h3>
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
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class=" control-label">color</label>
                                <div class="col-md-6">
                                    <input type="text" id="hue-demo" name="color" class="form-control demo"
                                           data-control="hue" value="{{ $element->color }}">
                                </div>
                            </div>

                        </div>
                    </div>
                    <!--/row-->
                    <div class="row">
                        <div class="col-md-12">
                            <!--/span-->
                            @if(auth()->user()->isSuper)
                                    <div class="col-lg-12">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4>{{ trans('general.controls') }}</h4>
                                            </div>
                                            <div class="panel-body">
                                                <div class="col-md-4">
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
                                                <div class="col-md-4">
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
                                                <div class="col-md-4">
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
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label sbold">{{ trans('general.is_client') }}</label>
                                                        <div class="radio-list">
                                                            <label class="radio-inline">
                                                                <input type="radio" name="is_client" id="optionsRadios3"
                                                                       value="1" {{ $element->is_client ? 'checked' : null }}>
                                                                {{ trans('general.client') }}</label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="is_client" id="optionsRadios4"
                                                                       value="0" {{ $element->is_client  ? null : 'checked'}}>
                                                                {{ trans('general.not_client') }}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label sbold">{{ trans('general.is_designer') }}</label>
                                                        <div class="radio-list">
                                                            <label class="radio-inline">
                                                                <input type="radio" name="is_designer" id="optionsRadios3"
                                                                       value="1" {{ $element->is_designer ? 'checked' : null }}>
                                                                {{ trans('general.designer') }}</label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="is_designer" id="optionsRadios4"
                                                                       value="0" {{ $element->is_designer  ? null : 'checked'}}>
                                                                {{ trans('general.not_designer') }}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label sbold">Is Visible</label>
                                                        <div class="radio-list">
                                                            <label class="radio-inline">
                                                                <input type="radio" name="is_visible" id="optionsRadios5"
                                                                       value="1" {{ $element->is_visible ? 'checked' : null }}>
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
                                            </div>
                                        </div>
                                    </div>
                            @endif
                        </div>

                        <!--/span-->
                    </div>
                    <!--/row-->
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

