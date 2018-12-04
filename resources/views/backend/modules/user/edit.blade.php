@extends('backend.layouts.app')
@section('content')
    <div class="portlet box blue">
        @include('backend.partials.forms.form_title')
        <div class="portlet-body form">
            <form class="horizontal-form" role="form" method="POST"
                  action="{{ route('backend.user.update', $element->id) }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="put">
                <div class="form-body">
                    <h3 class="form-section">{{ trans('general.create_user') }}</h3>
                    {{--name arabic / name english --}}
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group{{ $errors->has('name_ar') ? ' has-error' : '' }}">
                                <label for="name_ar" class="control-label">{{ trans('general.name_ar') }}</label>
                                <input id="name_ar"
                                       type="text"
                                       class="form-control"
                                       name="name_ar"
                                       value="{{ $element->name_ar }}"
                                       placeholder="name in arabic"
                                       autofocus>
                                @if ($errors->has('name_ar'))
                                    <span class="help-block">
                                        <strong>
                                            {{ $errors->first('name_ar') }}
                                        </strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group{{ $errors->has('name_en') ? ' has-error' : '' }}">
                                <label for="name_en" class="control-label">{{ trans('general.name_en') }}</label>
                                <input id="name_en"
                                       type="text"
                                       class="form-control"
                                       name="name_en"
                                       value="{{ $element->name_en }}"
                                       placeholder="name in english"
                                       autofocus>
                                @if ($errors->has('name_en'))
                                    <span class="help-block">
                                        <strong>
                                            {{ $errors->first('name_en') }}
                                        </strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="control-label">email </label>
                                <input id="email"
                                       type="text"
                                       class="form-control"
                                       name="email"
                                       value="{{ $element->email }}"
                                       placeholder="email"
                                       required autofocus>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>
                                            {{ $errors->first('email') }}
                                        </strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                                <label for="mobile" class="control-label">{{ trans('general.mobile') }}</label>
                                <input id="mobile"
                                       type="text"
                                       class="form-control"
                                       name="mobile"
                                       value="{{ $element->mobile }}"
                                       placeholder="mobile"
                                       autofocus>
                                @if ($errors->has('mobile'))
                                    <span class="help-block">
                                        <strong>
                                            {{ $errors->first('mobile') }}
                                        </strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('device_id') ? ' has-error' : '' }}">
                                <label for="device_id" class="control-label">{{ trans('general.device_id') }}</label>
                                <input id="device_id"
                                       type="text"
                                       class="form-control"
                                       name="device_id"
                                       value="{{ $element->device_id }}"
                                       placeholder="device_id"
                                       autofocus>
                                @if ($errors->has('device_id'))
                                    <span class="help-block">
                                        <strong>
                                            {{ $errors->first('device_id') }}
                                        </strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">{{ trans('general.role') }} </label>
                                <select class="bs-select form-control" name="role_id" required autofocus>
                                    <option value="">{{ trans('general.select_role') }}</option>
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}" {{ $element->role_id == $role->id ? 'selected' : null  }}>
                                            {{ $role->name }} - {{ $role->slug }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="form_control_1">{{ trans('general.logo') }}</label>
                                <input type="file" class="form-control" name="logo" placeholder="logo">
                                <div class="help-block text-left">
                                    W H - Best fit 250 x 250 pixels
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <img src="{{ asset('storage/uploads/images/thumbnail/'.$element->logo) }}" alt=""
                                 class="img-sm img-thumbnail">
                        </div>

                        <div class="col-md-3">
                            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                <label for="phone" class="control-label">phone </label>
                                <input id="phone"
                                       type="text"
                                       class="form-control"
                                       name="phone"
                                       value="{{ $element->phone }}"
                                       placeholder="phone"
                                       autofocus>
                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>
                                            {{ $errors->first('phone') }}
                                        </strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('address_ar') ? ' has-error' : '' }}">
                                <label for="address_ar" class="control-label">{{ trans('general.address_ar') }}</label>
                                <input id="address_ar"
                                       type="text"
                                       class="form-control"
                                       name="address_ar"
                                       value="{{ $element->address_ar }}"
                                       placeholder="name in arabic"
                                       autofocus>
                                @if ($errors->has('address_ar'))
                                    <span class="help-block">
                                        <strong>
                                            {{ $errors->first('address_ar') }}
                                        </strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('address_en') ? ' has-error' : '' }}">
                                <label for="address_en" class="control-label">{{ trans('general.address_en') }}</label>
                                <input id="address_en"
                                       type="text"
                                       class="form-control"
                                       name="address_en"
                                       value="{{ $element->address_en }}"
                                       placeholder="name in english"
                                       autofocus>
                                @if ($errors->has('address_en'))
                                    <span class="help-block">
                                        <strong>
                                            {{ $errors->first('address_en') }}
                                        </strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('caption_ar') ? ' has-error' : '' }}">
                                <label for="caption_ar" class="control-label">{{ trans('general.caption_ar') }}</label>
                                <input id="caption_ar"
                                       type="text"
                                       class="form-control"
                                       name="caption_ar"
                                       value="{{ $element->caption_ar }}"
                                       placeholder="caption_ar arabic"
                                       autofocus>
                                @if ($errors->has('caption_ar'))
                                    <span class="help-block">
                                        <strong>
                                            {{ $errors->first('caption_ar') }}
                                        </strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('caption_en') ? ' has-error' : '' }}">
                                <label for="caption_en" class="control-label">{{ trans('general.caption_en') }}</label>
                                <input id="caption_en"
                                       type="text"
                                       class="form-control"
                                       name="caption_en"
                                       value="{{ $element->caption_en }}"
                                       placeholder="caption_en arabic"
                                       autofocus>
                                @if ($errors->has('caption_en'))
                                    <span class="help-block">
                                        <strong>
                                            {{ $errors->first('caption_en') }}
                                        </strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description" class="control-label">{{ trans('general.description_ar') }}</label>
                                <textarea type="text" class="form-control" id="description_ar" name="description_ar"
                                          aria-multiline="true"
                                          maxlength="500">{{ $element->description_ar }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description" class="control-label">{{ trans('general.description_en') }}</label>
                                <textarea type="text" class="form-control" id="description_en" name="description_en"
                                          aria-multiline="true"
                                          maxlength="500">{{ $element->description_ar }}</textarea>
                            </div>
                        </div>
                    </div>


                    @include('backend.partials.forms._btn-group')
                </div>
            </form>
        </div>
    </div>
@endsection