@extends('backend.layouts.app')
@section('content')
    @include('backend.partials.breadcrumbs')
    <div class="portlet box blue">
        @include('backend.partials.forms.form_title')
        <div class="portlet-body form">
            <form class="horizontal-form" role="form" method="POST"
                  action="{{ route('backend.job.store') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="order_id" value="{{ request()->order_id }}">
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description" class="control-label">description arabic</label>
                                <textarea type="text" class="form-control" id="description" name="description"
                                          aria-multiline="true" maxlength="500">{{ old('description') }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="notes" class="control-label">notes</label>
                                <textarea type="text" class="form-control" id="notes" name="notes"
                                          aria-multiline="true" maxlength="500">{{ old('notes') }}</textarea>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label sbold">{{ trans('general.active') }}</label>
                                <div class="radio-list">
                                    <label class="radio-inline">
                                        <input type="radio" name="active" id="optionsRadios1" value="1" checked> {{ trans('active')
                                    }}
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="active" id="optionsRadios2" value="0"> {{
                                    trans('general.not_active') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label sbold">{{ trans('general.is_complete') }}</label>
                                <div class="radio-list">
                                    <label class="radio-inline">
                                        <input type="radio" name="is_complete" id="optionsRadios1" value="1"> {{ trans('is_complete')
                                    }}
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="is_complete" id="optionsRadios2" value="0" checked> {{
                                    trans('general.not_is_complete') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('backend.partials.forms._btn-group')
                </div>
            </form>
        </div>
    </div>
@endsection
