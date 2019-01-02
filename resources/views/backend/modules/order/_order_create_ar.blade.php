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
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="notes_ar"
                               class="control-label">{{ trans('general.notes')}}</label>
                        <textarea type="notes_ar" class="form-control" id="notes_ar"
                                  name="notes_ar"
                                  aria-multiline="true"
                                  maxlength="500">{{ old('notes_ar') }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        @include('backend.partials.forms._order_show_colors')

        @include('backend.partials.forms._order_show_socials')
        @include('backend.partials.forms._order_show_socials')
        @include('backend.partials.forms._order_show_logo_style')




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
    </div>
    <div class="col-lg-12">
        @include('backend.partials.forms._btn-group')
    </div>
</div>
