@if($service && $service->show_phones)
    <div class="panel panel-default">
        <div class="panel-heading">
            {{ trans('general.phones') }}
        </div>
        <div class="panel-body">
            <div class="col-md-12">
                <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                    <label for="mobile"
                           class="control-label">{{ trans('general.mobile') }} </label>
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
                    <input id="fax" type="text" class="form-control" name="fax"
                           value="{{ old('fax') }}"
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
                    <label for="whatsapp"
                           class="control-label">{{ trans('general.whatsapp') }} </label>
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
@endif
