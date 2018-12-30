@extends('backend.layouts.app')
@section('content')
    @include('backend.partials.breadcrumbs')
    <div class="portlet box blue">
        @include('backend.partials.forms.form_title')
        <div class="portlet-body form">
            <form class="horizontal-form" role="form" method="post"
                  action="{{ route('backend.user.update', $element->id) }}" enctype="multipart/form-data">
                @csrf
                {{--<input type="hidden" name="api_token" value="{{ str_random(rand(10,99)) }}">--}}
                <input type="hidden" name="user_id" value="{{ $element->id }}">
                <input type="hidden" name="_method" value="patch">
                <div class="form-body">
                    <h3 class="form-section">{{ trans('general.edit_user') }}</h3>
                    {{--name arabic / name english --}}
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                <label for="username" class="control-label">{{ trans('general.username') }}</label>
                                <input id="username" type="text" class="form-control" name="username"
                                       value="{{ $element->username }}"
                                       placeholder="username in arabic" autofocus>
                                @if ($errors->has('username'))
                                    <span class="help-block">
                                <strong>
                                    {{ $errors->first('username') }}
                                </strong>
                            </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group{{ $errors->has('name_ar') ? ' has-error' : '' }}">
                                <label for="name_ar" class="control-label">{{ trans('general.name_ar') }}</label>
                                <input id="name_ar" type="text" class="form-control" name="name_ar"
                                       value="{{ $element->name_ar }}"
                                       placeholder="name in arabic" autofocus>
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
                                <input id="name_en" type="text" class="form-control" name="name_en"
                                       value="{{ $element->name_en }}"
                                       placeholder="name in english" autofocus>
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
                                <input id="email" type="text" class="form-control" name="email"
                                       value="{{ $element->email }}"
                                       placeholder="email" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                <strong>
                                    {{ $errors->first('email') }}
                                </strong>
                            </span>
                                @endif
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">{{ trans('general.role') }} </label>
                                <select class="bs-select form-control" name="role_id" required autofocus>
                                    <option value="">{{ trans('general.select_role') }}</option>
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}"
                                            {{ $role->id === $element->role_id ? 'selected' : null  }}>{{ $role->name }}
                                            - {{ $role->slug }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group{{ $errors->has('caption_ar') ? ' has-error' : '' }}">
                                <label for="caption_ar" class="control-label">{{ trans('general.caption_ar') }}</label>
                                <input id="caption_ar" type="text" class="form-control" name="caption_ar"
                                       value="{{ $element->caption_ar }}"
                                       placeholder="caption_ar arabic" autofocus>
                                @if ($errors->has('caption_ar'))
                                    <span class="help-block">
                                <strong>
                                    {{ $errors->first('caption_ar') }}
                                </strong>
                            </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group{{ $errors->has('caption_en') ? ' has-error' : '' }}">
                                <label for="caption_en" class="control-label">{{ trans('general.caption_en') }}</label>
                                <input id="caption_en" type="text" class="form-control" name="caption_en"
                                       value="{{ $element->caption_en }}"
                                       placeholder="caption_en arabic" autofocus>
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
                                <label for="description"
                                       class="control-label">{{ trans('general.description_ar') }}</label>
                                <textarea type="text" class="form-control" id="description_ar" name="description_ar"
                                          aria-multiline="true"
                                          maxlength="500">{{ $element->description_ar }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description"
                                       class="control-label">{{ trans('general.descirption_en') }}</label>
                                <textarea type="text" class="form-control" id="description_en" name="description_en"
                                          aria-multiline="true"
                                          maxlength="500">{{ $element->description_en }}</textarea>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('service_ar') ? ' has-error' : '' }}">
                                <label for="service_ar" class="control-label">{{ trans('general.service_ar') }}</label>
                                <input id="service_ar" type="text" class="form-control" name="service_ar"
                                       value="{{ $element->service_ar }}"
                                       placeholder="service_ar arabic" autofocus>
                                @if ($errors->has('service_ar'))
                                    <span class="help-block">
                                <strong>
                                    {{ $errors->first('service_ar') }}
                                </strong>
                            </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('service_en') ? ' has-error' : '' }}">
                                <label for="service_en" class="control-label">{{ trans('general.service_en') }}</label>
                                <input id="service_en" type="text" class="form-control" name="service_en"
                                       value="{{ $element->service_en }}"
                                       placeholder="service_en arabic" autofocus>
                                @if ($errors->has('service_en'))
                                    <span class="help-block">
                                <strong>
                                    {{ $errors->first('service_en') }}
                                </strong>
                            </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="form_control_1">{{ trans('general.logo') }}</label>
                                <input type="file" class="form-control" name="logo" placeholder="logo">
                                <div class="help-block text-left">
                                    {{ trans('general.message_logo') }}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="form_control_1">{{ trans('general.card') }}</label>
                                <input type="file" class="form-control" name="card" placeholder="card">
                                <div class="help-block text-left">
                                    {{ trans('general.message_card') }}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="form_control_1">{{ trans('general.roll_up') }}</label>
                                <input type="file" class="form-control" name="roll_up" placeholder="roll_up">
                                <div class="help-block text-left">
                                    {{ trans('general.message_roll_up') }}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="form_control_1">{{ trans('general.instagram_theme') }}</label>
                                <input type="file" class="form-control" name="theme" placeholder="theme">
                                <div class="help-block text-left">
                                    {{ trans('general.message_instagram_theme') }}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="form_control_1">{{ trans('general.letterhead') }}</label>
                                <input type="file" class="form-control" name="letterhead" placeholder="letterhead">
                                <div class="help-block text-left">
                                    {{ trans('general.message_letterhead') }}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="form_control_1">{{ trans('general.envelope') }}</label>
                                <input type="file" class="form-control" name="envelope" placeholder="envelope">
                                <div class="help-block text-left">
                                    {{ trans('general.message_envelope') }}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="form_control_1">{{ trans('general.profile') }}</label>
                                <input type="file" class="form-control" name="profile" placeholder="profile">
                                <div class="help-block text-left">
                                    {{ trans('general.message_profile') }}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="form_control_1">{{ trans('general.path') }} </label>
                                <input type="file" class="form-control" name="path" placeholder="path">
                                <div class="help-block text-left">
                                    {{ trans('message.upload_files') }}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group{{ $errors->has('website') ? ' has-error' : '' }}">
                                <label for="website" class="control-label">{{ trans('general.website') }} </label>
                                <input id="website" type="text" class="form-control" name="website"
                                       value="{{ $element->website }}"
                                       placeholder="website" autofocus>
                                @if ($errors->has('website'))
                                    <span class="help-block">
                                <strong>
                                    {{ $errors->first('website') }}
                                </strong>
                            </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group{{ $errors->has('facebook') ? ' has-error' : '' }}">
                                <label for="facebook" class="control-label">{{ trans('general.facebook') }} </label>
                                <input id="facebook" type="text" class="form-control" name="facebook"
                                       value="{{ $element->facebook }}"
                                       placeholder="facebook" autofocus>
                                @if ($errors->has('facebook'))
                                    <span class="help-block">
                                <strong>
                                    {{ $errors->first('facebook') }}
                                </strong>
                            </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group{{ $errors->has('instagram') ? ' has-error' : '' }}">
                                <label for="instagram" class="control-label">{{ trans('general.instagram') }} </label>
                                <input id="instagram" type="text" class="form-control" name="instagram"
                                       value="{{ $element->instagram }}"
                                       placeholder="instagram" autofocus>
                                @if ($errors->has('instagram'))
                                    <span class="help-block">
                                <strong>
                                    {{ $errors->first('instagram') }}
                                </strong>
                            </span>
                                @endif
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group{{ $errors->has('youtube') ? ' has-error' : '' }}">
                                <label for="youtube" class="control-label">{{ trans('general.youtube') }} </label>
                                <input id="youtube" type="text" class="form-control" name="youtube"
                                       value="{{ $element->youtube }}"
                                       placeholder="youtube" autofocus>
                                @if ($errors->has('youtube'))
                                    <span class="help-block">
                                <strong>
                                    {{ $errors->first('youtube') }}
                                </strong>
                            </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group{{ $errors->has('twitter') ? ' has-error' : '' }}">
                                <label for="twitter" class="control-label">{{ trans('general.twitter') }} </label>
                                <input id="twitter" type="text" class="form-control" name="twitter"
                                       value="{{ $element->twitter }}"
                                       placeholder="twitter" autofocus>
                                @if ($errors->has('twitter'))
                                    <span class="help-block">
                                <strong>
                                    {{ $errors->first('twitter') }}
                                </strong>
                            </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                                <label for="mobile" class="control-label">{{ trans('general.mobile') }} </label>
                                <input id="mobile" type="text" class="form-control" name="mobile"
                                       value="{{ $element->mobile }}"
                                       placeholder="mobile" autofocus>
                                @if ($errors->has('mobile'))
                                    <span class="help-block">
                                <strong>
                                    {{ $errors->first('mobile') }}
                                </strong>
                            </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                <label for="phone" class="control-label">{{ trans('general.phone') }} </label>
                                <input id="phone" type="text" class="form-control" name="phone"
                                       value="{{ $element->phone }}"
                                       placeholder="phone" autofocus>
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
                        <div class="col-md-3">
                            <div class="form-group{{ $errors->has('fax') ? ' has-error' : '' }}">
                                <label for="fax" class="control-label">{{ trans('general.fax') }} </label>
                                <input id="fax" type="text" class="form-control" name="fax" value="{{ $element->fax }}"
                                       placeholder="fax" autofocus>
                                @if ($errors->has('fax'))
                                    <span class="help-block">
                                <strong>
                                    {{ $errors->first('fax') }}
                                </strong>
                            </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group{{ $errors->has('whatsapp') ? ' has-error' : '' }}">
                                <label for="whatsapp" class="control-label">{{ trans('general.whatsapp') }} </label>
                                <input id="whatsapp" type="text" class="form-control" name="whatsapp"
                                       value="{{ $element->whatsapp }}"
                                       placeholder="whatsapp" autofocus>
                                @if ($errors->has('whatsapp'))
                                    <span class="help-block">
                                <strong>
                                    {{ $errors->first('whatsapp') }}
                                </strong>
                            </span>
                                @endif
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group{{ $errors->has('iphone') ? ' has-error' : '' }}">
                                    <label for="iphone" class="control-label">{{ trans('general.iphone') }} </label>
                                    <input id="iphone" type="text" class="form-control" name="iphone"
                                           value="{{ $element->iphone }}"
                                           placeholder="iphone" autofocus>
                                    @if ($errors->has('iphone'))
                                        <span class="help-block">
                                <strong>
                                    {{ $errors->first('iphone') }}
                                </strong>
                            </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group{{ $errors->has('android') ? ' has-error' : '' }}">
                                <label for="android" class="control-label">{{ trans('general.android') }} </label>
                                <input id="android" type="text" class="form-control" name="android"
                                       value="{{ $element->android }}"
                                       placeholder="android" autofocus>
                                @if ($errors->has('android'))
                                    <span class="help-block">
                                <strong>
                                    {{ $errors->first('android') }}
                                </strong>
                            </span>
                                @endif
                            </div>
                        </div>
                        @can('onlySuper')
                            <div class="col-md-3">
                                <div class="form-group{{ $errors->has('balance') ? ' has-error' : '' }}">
                                    <label for="balance" class="control-label">{{ trans('general.balance') }} </label>
                                    <input id="balance" type="text" class="form-control" name="balance"
                                           value="{{ $element->balance->points }}"
                                           placeholder="balance" autofocus>
                                    @if ($errors->has('balance'))
                                        <span class="help-block">
                                <strong>
                                    {{ $errors->first('balance') }}
                                </strong>
                            </span>
                                    @endif
                                </div>
                            </div>
                        @endcan

                        {{--<div class="col-lg-12" style="padding: 20px;">--}}
                        {{--<div id="map" style="width : 100%; min-height: 250px;"></div>--}}
                        {{--</div>--}}
                        {{--<div class="col-lg-1">--}}
                        {{--<div class="form-group">--}}
                        {{--<label class="control-label"></label>--}}
                        {{--<input type="button" class="btn btn-info form-control"--}}
                        {{--value="{{ trans('general.get_location_by_address') }}"--}}
                        {{--onclick="codeAddress()">--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">{{ trans('general.address_ar') }}</label>
                                <input id="address" name="address_ar" type="textbox" value="{{ old("address_ar") }}"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">{{ trans('general.address_en') }}</label>
                                <input id="address" name="address_en" type="textbox" value="{{ old('address_en') }}"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="longitude"
                                       class="control-label">{{ trans('general.longitude') }}</label>
                                <input id="longitude" type="text" class="form-control" name="longitude"
                                       value="{{ old('longitude') ? old('longitude') : auth()->user()->longitude}}"
                                       placeholder="longitude" autofocus/>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="latitude" class="control-label">{{ trans('general.latitude') }}</label>
                                <input id="latitude" type="text" class="form-control" name="latitude"
                                       value="{{ old('latitude') ? old('latitude') : auth()->user()->latitude }}"
                                       placeholder="latitude" autofocus/>
                            </div>
                        </div>

                    </div>
                    @include('backend.partials.forms._btn-group')
                </div>
            </form>
        </div>
    </div>
@endsection
