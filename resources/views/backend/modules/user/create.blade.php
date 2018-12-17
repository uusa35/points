@extends('backend.layouts.app')
@section('content')
<div class="portlet box blue">
    @include('backend.partials.forms.form_title')
    <div class="portlet-body form">
        <form class="horizontal-form" role="form" method="POST" action="{{ route('backend.admin.user.store') }}"
            enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="api_token" value="{{ str_random(rand(10,99)) }}">
            <div class="form-body">
                <h3 class="form-section">{{ trans('general.create_user') }}</h3>
                {{--name arabic / name english --}}
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group{{ $errors->has('name_ar') ? ' has-error' : '' }}">
                            <label for="name_ar" class="control-label">{{ trans('general.name_ar') }}</label>
                            <input id="name_ar" type="text" class="form-control" name="name_ar" value="{{ old('name_ar') }}"
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
                            <input id="name_en" type="text" class="form-control" name="name_en" value="{{ old('name_en') }}"
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
                            <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}"
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

                {{-- password + confirm password --}}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="control-label">{{ trans('general.password') }} </label>
                            <input id="password" type="password" class="form-control" name="password" placeholder="password"
                                required autofocus>
                            @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>
                                    {{ $errors->first('password') }}
                                </strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password_confirmation" class="control-label">{{
                                trans('general.password_confirmation') }} </label>
                            <input id="password_confirmation" type="password" class="form-control" name="password_confirmation"
                                placeholder="password_confirmation" required autofocus>
                            @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                <strong>
                                    {{ $errors->first('password_confirmation') }}
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
                                <option value="{{ $role->id }}"
                                    {{ request()->role == $role->name ? 'selected' : null  }}>{{ $role->name }}
                                    - {{ $role->slug }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>



                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('caption_ar') ? ' has-error' : '' }}">
                            <label for="caption_ar" class="control-label">{{ trans('general.caption_ar') }}</label>
                            <input id="caption_ar" type="text" class="form-control" name="caption_ar" value="{{ old('caption_ar') }}"
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
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('caption_en') ? ' has-error' : '' }}">
                            <label for="caption_en" class="control-label">{{ trans('general.caption_en') }}</label>
                            <input id="caption_en" type="text" class="form-control" name="caption_en" value="{{ old('caption_en') }}"
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
                            <label for="description" class="control-label">{{ trans('general.description_ar') }}</label>
                            <textarea type="text" class="form-control" id="description_ar" name="description_ar"
                                aria-multiline="true" maxlength="500">{{ old('description_ar') }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="description" class="control-label">{{ trans('general.descirption_en') }}</label>
                            <textarea type="text" class="form-control" id="description_en" name="description_en"
                                aria-multiline="true" maxlength="500">{{ old('description_en') }}</textarea>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('service_ar') ? ' has-error' : '' }}">
                            <label for="service_ar" class="control-label">{{ trans('general.service_ar') }}</label>
                            <input id="service_ar" type="text" class="form-control" name="service_ar" value="{{ old('service_ar') }}"
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
                            <input id="service_en" type="text" class="form-control" name="service_en" value="{{ old('service_en') }}"
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
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('address_ar') ? ' has-error' : '' }}">
                            <label for="address_ar" class="control-label">{{ trans('general.address_ar') }}</label>
                            <input id="address_ar" type="text" class="form-control" name="address_ar" value="{{ old('address_ar') }}"
                                placeholder="address_ar arabic" autofocus>
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
                            <input id="address_en" type="text" class="form-control" name="address_en" value="{{ old('address_en') }}"
                                placeholder="address_en arabic" autofocus>
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
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="form_control_1">{{ trans('general.logo') }}</label>
                            <input type="file" class="form-control" name="logo" placeholder="logo">
                            <div class="help-block text-left">
                                W H - Best fit 250 x 250 pixels
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group{{ $errors->has('website') ? ' has-error' : '' }}">
                            <label for="website" class="control-label">{{ trans('general.website') }} </label>
                            <input id="website" type="text" class="form-control" name="website" value="{{ old('website') }}"
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
                            <input id="facebook" type="text" class="form-control" name="facebook" value="{{ old('facebook') }}"
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
                            <input id="instagram" type="text" class="form-control" name="instagram" value="{{ old('instagram') }}"
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
                            <input id="youtube" type="text" class="form-control" name="youtube" value="{{ old('youtube') }}"
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
                            <input id="twitter" type="text" class="form-control" name="twitter" value="{{ old('twitter') }}"
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
                            <input id="mobile" type="text" class="form-control" name="mobile" value="{{ old('mobile') }}"
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
                            <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}"
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
                            <input id="fax" type="text" class="form-control" name="fax" value="{{ old('fax') }}"
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
                            <input id="whatsapp" type="text" class="form-control" name="whatsapp" value="{{ old('whatsapp') }}"
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
                    <div class="col-md-3">
                        <div class="form-group{{ $errors->has('iphone') ? ' has-error' : '' }}">
                            <label for="iphone" class="control-label">{{ trans('general.iphone') }} </label>
                            <input id="iphone" type="text" class="form-control" name="iphone" value="{{ old('iphone') }}"
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

                    <div class="col-md-3">
                        <div class="form-group{{ $errors->has('android') ? ' has-error' : '' }}">
                            <label for="android" class="control-label">{{ trans('general.android') }} </label>
                            <input id="android" type="text" class="form-control" name="android" value="{{ old('android') }}"
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

                </div>











                @include('backend.partials.forms._btn-group')
            </div>
        </form>
    </div>
</div>
@endsection
