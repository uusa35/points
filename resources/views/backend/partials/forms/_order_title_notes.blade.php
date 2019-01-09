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
                <textarea type="notes_ar" class="form-control" id="notes"
                          name="notes"
                          aria-multiline="true"
                          rows="6"
                          maxlength="500">{{ old('notes') }}</textarea>
            </div>
        </div>
    </div>
</div>
