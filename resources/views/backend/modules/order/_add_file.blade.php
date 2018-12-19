<div class="modal fade" id="order-file" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <form class="horizontal-form" role="form" method="POST" action="{{ route('backend.order.store') }}"
                      enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="service_id" value="{{ session()->get('service_id')}}">
                    <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form_control_1">{{ trans('general.image') }}</label>
                                <input type="file" class="form-control" name="image" placeholder="image">
                                <div class="help-block text-left">
                                    {{ trans('message.image_general_instructions') }}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('notes') ? ' has-error' : '' }}">
                                <label for="notes" class="control-label">{{ trans('general.notes') }}</label>
                                <input id="notes" type="text" class="form-control" name="notes"
                                       value="{{ old('notes') }}"
                                       placeholder="{{ trans('general.notes') }}" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group {{ $errors->has('name_ar') ? ' has-error' : '' }}">
                                <label for="name_ar" class="control-label">{{ trans('general.name_ar') }}</label>
                                <input id="name_ar" type="text" class="form-control" name="name_ar"
                                       value="{{ old('name_ar') }}"
                                       placeholder="{{ trans('general.name_ar') }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group {{ $errors->has('name_en') ? ' has-error' : '' }}">
                                <label for="name_en" class="control-label">{{ trans('general.name_en') }}</label>
                                <input id="name_en" type="text" class="form-control" name="name_en"
                                       value="{{ old('name_en') }}"
                                       placeholder="{{ trans('general.name_en') }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group {{ $errors->has('caption_ar') ? ' has-error' : '' }}">
                                <label for="caption_ar" class="control-label">{{ trans('general.caption_ar') }}</label>
                                <input id="caption_ar" type="text" class="form-control" name="caption_ar"
                                       value="{{ old('caption_ar') }}"
                                       placeholder="{{ trans('general.caption_ar') }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group {{ $errors->has('caption_en') ? ' has-error' : '' }}">
                                <label for="caption_en" class="control-label">{{ trans('general.caption_en') }}</label>
                                <input id="caption_en" type="text" class="form-control" name="caption_en"
                                       value="{{ old('caption_en') }}"
                                       placeholder="{{ trans('general.caption_en') }}">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn dark btn-outline"
                    data-dismiss="modal">{{ trans('general.close') }}</button>
            <button type="submit" class="btn red modal-save">{{ trans('general.save') }}</button>
        </div>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
</div>
