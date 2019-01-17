@if($service  && $service->show_socials)
    <div class="panel panel-default">
        <div class="panel-heading">
            <h5>{{ trans('general.social_media') }}</h5>
        </div>
        <div class="panel-body">
            <div class="col-md-12">
                <div class="form-group{{ $errors->has('website') ? ' has-error' : '' }}">
                    <label for="website"
                           class="control-label">{{ trans('general.website') }}</label>
                    <input id="website" type="text" class="form-control" name="website"
                           placeholder="website --> http://google.com"
                           value="{{ old('website') ? old('website') : auth()->user()->website}}" autofocus>
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
                    <label for="facebook"
                           class="control-label">{{ trans('general.facebook') }} </label>
                    <input id="facebook" type="text" class="form-control" name="facebook"
                           value="{{ old('facebook') ? old("facebook") : auth()->user()->facebook }}"
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
                           value="{{ old('instagram') ? old('instagram') : auth()->user()->instagram  }}"
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
                    <label for="youtube"
                           class="control-label">{{ trans('general.youtube') }} </label>
                    <input id="youtube" type="text" class="form-control" name="youtube"
                           value="{{ old('youtube') ? old('youtube') : auth()->user()->youtube }}"
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
                    <label for="twitter"
                           class="control-label">{{ trans('general.twitter') }} </label>
                    <input id="twitter" type="text" class="form-control" name="twitter"
                           value="{{ old('twitter') ? old('twitter') : auth()->user()->twitter }}"
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
@endif
