@extends('backend.layouts.app')
@section('content')
    @include('backend.partials.breadcrumbs')
    @include('backend.partials._order_steps')
    <div class="portlet box blue">
        @include('backend.partials.forms.form_title')
        <div class="portlet-body form">
            <form class="horizontal-form" role="form" method="POST" action="{{ route('backend.order.store') }}"
                  enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="service_id" value="{{ session()->get('service_id')}}">
                <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                <div class="form-body">
                    <div class="row center-block">
                        <div class="col-lg-6 col-lg-push-3">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h5>{{ trans('general.order_information') }}</h5>
                                </div>
                                <div class="panel-body">
                                    <div class="col-md-12">
                                        <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                                            <label for="title"
                                                   class="control-label">{{ trans('general.order_title') }}</label>
                                            <input id="title" type="text" class="form-control" name="title"
                                                   value="{{ old('title') }}"
                                                   placeholder="title" required autofocus>
                                            @if ($errors->has('title'))
                                                <span class="help-block">
                                <strong>
                                    {{ $errors->first('title') }}
                                </strong>
                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    @if(session()->get('order_lang')=='ar')
                                        <div class="col-md-12">
                                            <div class="form-group {{ $errors->has('name_ar') ? ' has-error' : '' }}">
                                                <label for="name_ar"
                                                       class="control-label">{{ trans('general.name_ar') }}</label>
                                                <input id="name_ar" type="text" class="form-control" name="name_ar"
                                                       value="{{ old('name_ar') }}"
                                                       placeholder="name_ar" autofocus>
                                                @if ($errors->has('name_ar'))
                                                    <span class="help-block">
                                <strong>
                                    {{ $errors->first('name_ar') }}
                                </strong>
                            </span>
                                                @endif
                                            </div>
                                        </div>
                                    @elseif(session()->get('order_lang')=='en')
                                        <div class="col-md-12">
                                            <div class="form-group {{ $errors->has('name_en') ? ' has-error' : '' }}">
                                                <label for="name_en"
                                                       class="control-label">{{ trans('general.name_en') }}</label>
                                                <input id="name_en" type="text" class="form-control" name="name_en"
                                                       value="{{ old('name_en') }}"
                                                       placeholder="name_en" autofocus>
                                                @if ($errors->has('name_en'))
                                                    <span class="help-block">
                                <strong>
                                    {{ $errors->first('name_en') }}
                                </strong>
                            </span>
                                                @endif
                                            </div>
                                        </div>
                                    @else
                                        <div class="col-md-12">
                                            <div class="form-group {{ $errors->has('name_en') ? ' has-error' : '' }}">
                                                <label for="name_en"
                                                       class="control-label">{{ trans('general.name_en') }}</label>
                                                <input id="name_en" type="text" class="form-control" name="name_en"
                                                       value="{{ old('name_en') }}"
                                                       placeholder="name_en" autofocus>
                                                @if ($errors->has('name_en'))
                                                    <span class="help-block">
                                            <strong>
                                                {{ $errors->first('name_en') }}
                                            </strong>
                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group {{ $errors->has('name_ar') ? ' has-error' : '' }}">
                                                <label for="name_ar"
                                                       class="control-label">{{ trans('general.name_ar') }}</label>
                                                <input id="name_ar" type="text" class="form-control" name="name_ar"
                                                       value="{{ old('name_ar') }}"
                                                       placeholder="name_ar" autofocus>
                                                @if ($errors->has('name_ar'))
                                                    <span class="help-block">
                                <strong>
                                    {{ $errors->first('name_ar') }}
                                </strong>
                            </span>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                    <div class="col-md-12">
                                        <div class="form-group {{ $errors->has('slogan') ? ' has-error' : '' }}">
                                            <label for="slogan" class="control-label">{{ trans('general.slogan') }}</label>
                                            <input id="slogan" type="text" class="form-control" name="slogan"
                                                   value="{{ old('slogan') }}"
                                                   placeholder="slogan" autofocus>
                                            @if ($errors->has('slogan'))
                                                <span class="help-block">
                                <strong>
                                    {{ $errors->first('slogan') }}
                                </strong>
                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h5>{{ trans('general.social_media') }}</h5>
                                </div>
                                <div class="panel-body">
                                    <div class="col-md-12">
                                        <div class="form-group{{ $errors->has('website') ? ' has-error' : '' }}">
                                            <label for="website" class="control-label">{{ trans('general.website') }}</label>
                                            <input id="website" type="text" class="form-control" name="website"
                                                   placeholder="website --> http://google.com"
                                                   value="{{ old('website') }}" autofocus>
                                            @if ($errors->has('website'))
                                                <span class="help-block">
                                                <strong>
                                                    {{ $errors->first('website') }}
                                                </strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group{{ $errors->has('facebook') ? ' has-error' : '' }}">
                                            <label for="facebook" class="control-label">{{ trans('general.facebook') }} </label>
                                            <input id="facebook" type="text" class="form-control" name="facebook"
                                                   value="{{ old('facebook') }}"
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

                                    <div class="col-md-12">
                                        <div class="form-group{{ $errors->has('instagram') ? ' has-error' : '' }}">
                                            <label for="instagram"
                                                   class="control-label">{{ trans('general.instagram') }} </label>
                                            <input id="instagram" type="text" class="form-control" name="instagram"
                                                   value="{{ old('instagram') }}"
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
                                    <div class="col-md-12">
                                        <div class="form-group{{ $errors->has('youtube') ? ' has-error' : '' }}">
                                            <label for="youtube" class="control-label">{{ trans('general.youtube') }} </label>
                                            <input id="youtube" type="text" class="form-control" name="youtube"
                                                   value="{{ old('youtube') }}"
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
                                    <div class="col-md-12">
                                        <div class="form-group{{ $errors->has('twitter') ? ' has-error' : '' }}">
                                            <label for="twitter" class="control-label">{{ trans('general.twitter') }} </label>
                                            <input id="twitter" type="text" class="form-control" name="twitter"
                                                   value="{{ old('twitter') }}"
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
                                </div>
                            </div>

                            {{--<div class="col-md-12">--}}
                            {{--<div class="form-group">--}}
                            {{--<label class="control-label">Client *</label>--}}
                            {{--<select class="bs-select form-control" name="user_id" required>--}}
                            {{--@foreach($activeClients as $client)--}}
                            {{--<option value="{{ $client->id }}">{{ $client->name }}</option>--}}
                            {{--@endforeach--}}
                            {{--</select>--}}
                            {{--</div>--}}
                            {{--</div>--}}



                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    {{ trans('general.phones') }}
                                </div>
                                <div class="panel-body">
                                    <div class="col-md-12">
                                        <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                                            <label for="mobile" class="control-label">{{ trans('general.mobile') }} </label>
                                            <input id="mobile" type="text" class="form-control" name="mobile"
                                                   value="{{ old('mobile') }}"
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
                                    <div class="col-md-12">
                                        <div class="form-group{{ $errors->has('phone_one') ? ' has-error' : '' }}">
                                            <label for="phone_one"
                                                   class="control-label">{{ trans('general.phone_one') }} </label>
                                            <input id="phone_one" type="text" class="form-control" name="phone_one"
                                                   value="{{ old('phone_one') }}"
                                                   placeholder="phone_one" autofocus>
                                            @if ($errors->has('phone_one'))
                                                <span class="help-block">
                                <strong>
                                    {{ $errors->first('phone_one') }}
                                </strong>
                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group{{ $errors->has('phone_two') ? ' has-error' : '' }}">
                                            <label for="phone_two"
                                                   class="control-label">{{ trans('general.phone_two') }} </label>
                                            <input id="phone_two" type="text" class="form-control" name="phone_two"
                                                   value="{{ old('phone_two') }}"
                                                   placeholder="phone_two" autofocus>
                                            @if ($errors->has('phone_two'))
                                                <span class="help-block">
                                <strong>
                                    {{ $errors->first('phone_two') }}
                                </strong>
                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-12">
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


                                    <div class="col-md-12">
                                        <div class="form-group{{ $errors->has('whatsapp') ? ' has-error' : '' }}">
                                            <label for="whatsapp" class="control-label">{{ trans('general.whatsapp') }} </label>
                                            <input id="whatsapp" type="text" class="form-control" name="whatsapp"
                                                   value="{{ old('whatsapp') }}"
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
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    {{ trans('general.order_notes') }}
                                </div>
                                <div class="panel-body">
                                    @if(session()->get('order_lang') =='ar')
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="description"
                                                       class="control-label">{{ trans('general.description')}}</label>
                                                <textarea type="text" class="form-control" id="description_ar"
                                                          name="description_ar"
                                                          aria-multiline="true"
                                                          maxlength="500">{{ old('description_ar') }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="notes_ar" class="control-label">{{ trans('general.notes')}}</label>
                                                <textarea type="notes_ar" class="form-control" id="notes_ar" name="notes_ar"
                                                          aria-multiline="true"
                                                          maxlength="500">{{ old('notes_ar') }}</textarea>
                                            </div>
                                        </div>
                                    @elseif(session()->get('order_lang')=='en')

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="description"
                                                       class="control-label">{{ trans('general.description')}}</label>
                                                <textarea type="text" class="form-control" id="description_en"
                                                          name="description_en"
                                                          aria-multiline="true"
                                                          maxlength="500">{{ old('description_en') }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="notes_en" class="control-label">{{ trans('general.notes')}}</label>
                                                <textarea type="notes_en" class="form-control" id="notes_en" name="notes_en"
                                                          aria-multiline="true"
                                                          maxlength="500">{{ old('notes_en') }}</textarea>
                                            </div>
                                        </div>
                                    @else

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="description"
                                                       class="control-label">{{ trans('general.description')}}</label>
                                                <textarea type="text" class="form-control" id="description_ar"
                                                          name="description_ar"
                                                          aria-multiline="true"
                                                          maxlength="500">{{ old('description_ar') }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="notes_ar" class="control-label">{{ trans('general.notes')}}</label>
                                                <textarea type="notes_ar" class="form-control" id="notes_ar" name="notes_ar"
                                                          aria-multiline="true"
                                                          maxlength="500">{{ old('notes_ar') }}</textarea>
                                            </div>
                                        </div>


                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="description"
                                                       class="control-label">{{ trans('general.description')}}</label>
                                                <textarea type="text" class="form-control" id="description_en"
                                                          name="description_en"
                                                          aria-multiline="true"
                                                          maxlength="500">{{ old('description_en') }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="notes_en" class="control-label">{{ trans('general.notes')}}</label>
                                                <textarea type="notes_en" class="form-control" id="notes_en" name="notes_en"
                                                          aria-multiline="true"
                                                          maxlength="500">{{ old('notes_en') }}</textarea>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    {{ trans("general.colors") }}
                                </div>
                                <div class="panel-body">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class=" control-label">{{ trans('general.preffered_colors')}} 1</label>
                                            <input type="text" id="hue-demo" name="preferred_colors_1" class="form-control demo"
                                                   data-control="hue" value="{{ old('preferred_colors_1') }}">
                                        </div>

                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class=" control-label">{{ trans('general.preffered_colors')}} 2</label>
                                            <input type="text" id="hue-demo" name="preferred_colors_2" class="form-control demo"
                                                   data-control="hue" value="{{ old('preferred_colors_2') }}">
                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class=" control-label">{{ trans('general.preffered_colors')}} 3 </label>

                                            <input type="text" id="hue-demo" name="preferred_colors_3" class="form-control demo"
                                                   data-control="hue" value="{{ old('preferred_colors_3') }}">
                                        </div>

                                    </div>


                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class=" control-label">{{ trans('general.unwanted_colors') }} 1</label>
                                            <input type="text" id="hue-demo-1" name="unwanted_colors_1"
                                                   class="form-control demo"
                                                   data-control="hue" value="{{ old('unwanted_colors_1') }}">
                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class=" control-label">{{ trans('general.unwanted_colors') }} 2</label>

                                            <input type="text" id="hue-demo-2" name="unwanted_colors_2"
                                                   class="form-control demo"
                                                   data-control="hue" value="{{ old('unwanted_colors_2') }}">
                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">{{ trans('general.unwatched_colors') }} 3</label>
                                            <input type="text" id="hue-demo-3" name="unwanted_colors_3"
                                                   class="form-control demo"
                                                   data-control="hue" value="{{ old('unwanted_colors_3') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    {{ trans('general.maps') }}
                                </div>
                                <div class="panel-body">
                                    <div class="col-lg-12" style="padding: 20px;">
                                        <div id="map" style="width : 100%; min-height: 250px;"></div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">{{ trans('general.address_ar') }}</label>
                                            <input id="address" name="address_ar" type="textbox" value="{{ old("address_ar") }}"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">{{ trans('general.address_en') }}</label>
                                            <input id="address" name="address_en" type="textbox" value="Sydney, NSW"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="control-label"></label>
                                            <input type="button" class="btn btn-info form-control"
                                                   value="{{ trans('general.get_location_by_address') }}"
                                                   onclick="codeAddress()">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <iframe
                                            src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d129277.816522649!2d47.89305411946607!3d29.218744454083627!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2skw!4v1545291408070"
                                            width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="longitude"
                                                   class="control-label">{{ trans('general.google_map_url') }}</label>
                                            <input id="google_map_url" type="text" class="form-control" name="google_map_url"
                                                   value="{{ old('google_map_url') }}"
                                                   placeholder="google_map_url" autofocus>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{--<div class="col-md-2">--}}
                            {{--<div class="form-group">--}}
                            {{--<label for="longitude"--}}
                            {{--class="control-label">{{ trans('general.longitude') }}</label>--}}
                            {{--<input id="longitude" type="text" class="form-control" name="longitude"--}}
                            {{--value="{{ old('longitude') }}"--}}
                            {{--placeholder="longitude" autofocus>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="col-md-2">--}}
                            {{--<div class="form-group">--}}
                            {{--<label for="latitude" class="control-label">{{ trans('general.latitude') }}</label>--}}
                            {{--<input id="latitude" type="text" class="form-control" name="latitude"--}}
                            {{--value="{{ old('latitude') }}"--}}
                            {{--placeholder="latitude" autofocus>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                        </div>
                        <div class="col-lg-12">
                            @include('backend.partials.forms._btn-group')
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

