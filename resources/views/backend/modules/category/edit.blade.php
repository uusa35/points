@extends('backend.layouts.app')

@section('content')
    <div class="portlet box blue">
        @include('backend.partials.forms.form_title')
        <div class="portlet-body form">
            <form class="horizontal-form" role="form" method="POST"
                  action="{{ route('backend.admin.category.update', $element->id) }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="put">
                <input type="hidden" name="parent_id" value="0">
                <div class="form-body">
                    <h3 class="form-section">{{ trans('general.edit_category') }}</h3>
                    {{--name arabic / name english --}}
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="control-label">{{ trans('general.name') }} *</label>
                                <input id="name"
                                       type="text"
                                       class="form-control"
                                       name="name"
                                       value="{{ $element->name }}"
                                       placeholder="name in arabic"
                                       required autofocus>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>
                                            {{ $errors->first('name') }}
                                        </strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group {{ $errors->has('slug_ar') ? ' has-error' : '' }}">
                                <label for="slug_ar" class="control-label">{{ trans('general.name_ar') }}*</label>
                                <input id="slug_ar"
                                       type="text"
                                       class="form-control"
                                       name="slug_ar"
                                       value="{{ $element->slug_ar }}"
                                       placeholder="name in arabic"
                                       required autofocus>
                                @if ($errors->has('slug_ar'))
                                    <span class="help-block">
                                        <strong>
                                            {{ $errors->first('slug_ar') }}
                                        </strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group{{ $errors->has('slug_en') ? ' has-error' : '' }}">
                                <label for="slug_en" class="control-label">{{ trans('general.name_en') }}*</label>
                                <input id="slug_en"
                                       type="text"
                                       class="form-control"
                                       name="slug_en"
                                       value="{{ $element->slug_en }}"
                                       placeholder="name in english"
                                       required autofocus>
                                @if ($errors->has('slug_en'))
                                    <span class="help-block">
                                        <strong>
                                            {{ $errors->first('slug_en') }}
                                        </strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form_control_1">{{ trans('general.image') }}</label>
                                <input type="file" class="form-control" name="image" placeholder="image">
                                <div class="help-block text-left">
                                    {{ trans('message.image_general_instructions') }}
                                </div>
                            </div>
                            <img src="{{ asset(env('THUMBNAIL').$element->image) }}" alt="" class="img-xs">
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form_control_1">{{ trans('general.path') }}</label>
                                <input type="file" class="form-control" name="path" placeholder="path">
                                <div class="help-block text-left">
                                    {{ trans('message.path_general_instructions') }}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group{{ $errors->has('order') ? ' has-error' : '' }}">
                                <label for="order" class="control-label">{{ trans('general.order') }} *</label>
                                <input id="order"
                                       type="number"
                                       class="form-control"
                                       name="order"
                                       value="{{ $element->order }}"
                                       placeholder="order"
                                       maxlength="2"
                                       autofocus>
                                @if ($errors->has('order'))
                                    <span class="help-block">
                                        <strong>
                                            {{ $errors->first('order') }}
                                        </strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <hr>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label sbold">{{ trans('general.active') }}</label></br>
                                <label class="radio-inline">
                                    <input type="radio" name="active" id="optionsRadios3" {{ $element->active ? 'checked' : null  }}
                                           value="1"> active</label>
                                <label class="radio-inline">
                                    <input type="radio" name="active" id="optionsRadios4" {{ !$element->active ? 'checked' : null  }}
                                           value="0">{{ trans('general.not_active') }}</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label sbold">{{ trans('general.files') }}</label></br>
                                <label class="radio-inline">
                                    <input type="radio" name="is_files" id="optionsRadios3" {{ $element->is_files ? 'checked' : null  }}
                                           value="1"> files</label>
                                <label class="radio-inline">
                                    <input type="radio" name="is_files" id="optionsRadios4" {{ !$element->is_files ? 'checked' : null  }}
                                           value="0">{{ trans('general.not_files') }}</label>
                            </div>
                        </div>
                    </div>
                    @include('backend.partials.forms._btn-group')
                </div>
            </form>
        </div>
    </div>
@endsection
