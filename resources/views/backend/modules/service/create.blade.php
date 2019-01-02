@extends('backend.layouts.app')
@section('content')
    @include('backend.partials.breadcrumbs')
    <div class="portlet box blue">
        @include('backend.partials.forms.form_title')
        <div class="portlet-body form">
            <form class="horizontal-form" role="form" method="POST" action="{{ route('backend.admin.service.store') }}"
                  enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-body">
                        <div class="col-md-4">
                            <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="control-label">{{ trans("general.name") }}*</label>
                                <input id="name" type="text" class="form-control" name="name"
                                       value="{{ old('name') }}"
                                       placeholder="name" required autofocus>
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
                                <label for="slug_ar" class="control-label">{{ trans("general.slug_ar") }}*</label>
                                <input id="slug_ar" type="text" class="form-control" name="slug_ar"
                                       value="{{ old('slug_ar') }}"
                                       placeholder="slug_ar" autofocus required>
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
                            <div class="form-group {{ $errors->has('slug_en') ? ' has-error' : '' }}">
                                <label for="slug_en" class="control-label">{{ trans("general.slug_en") }}*</label>
                                <input id="slug_en" type="text" class="form-control" name="slug_en"
                                       value="{{ old('slug_en') }}"
                                       placeholder="slug_en" autofocus required>
                                @if ($errors->has('slug_en'))
                                    <span class="help-block">
                                <strong>
                                    {{ $errors->first('slug_en') }}
                                </strong>
                            </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="form_control_1">{{ trans('general.image') }}</label>
                                <input type="file" class="form-control" name="image" placeholder="image" required>
                                <div class="help-block text-left">
                                    {{ trans('general.message_image') }}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="form_control_1">{{ trans('general.file') }}</label>
                                <input type="file" class="form-control" name="path" placeholder="path">
                                <div class="help-block text-left">
                                    {{ trans('general.message_path') }}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('caption_ar') ? ' has-error' : '' }}">
                                <label for="caption_ar" class="control-label">{{ trans("general.caption_ar") }}</label>
                                <input id="caption_ar" type="text" class="form-control" name="caption_ar"
                                       value="{{ old('caption_ar') }}"
                                       placeholder="caption_ar" autofocus>
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
                            <div class="form-group {{ $errors->has('caption_en') ? ' has-error' : '' }}">
                                <label for="caption_en" class="control-label">{{ trans("general.caption_en") }}</label>
                                <input id="caption_en" type="text" class="form-control" name="caption_en"
                                       value="{{ old('caption_en') }}"
                                       placeholder="caption_en" autofocus>
                                @if ($errors->has('caption_en'))
                                    <span class="help-block">
                                <strong>
                                    {{ $errors->first('caption_en') }}
                                </strong>
                            </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('duration') ? ' has-error' : '' }}">
                                <label for="duration" class="control-label">{{ trans("general.duration") }}</label>
                                <input id="duration" type="text" class="form-control" name="duration"
                                       value="{{ old('duration') }}"
                                       placeholder="duration" autofocus>
                                @if ($errors->has('duration'))
                                    <span class="help-block">
                                <strong>
                                    {{ $errors->first('duration') }}
                                </strong>
                            </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('order') ? ' has-error' : '' }}">
                                <label for="order" class="control-label">{{ trans("general.order") }}</label>
                                <input id="order" type="text" class="form-control" name="order"
                                       placeholder="order --> http://google.com"
                                       value="{{ old('order') }}" autofocus>
                                @if ($errors->has('order'))
                                    <span class="help-block">
                                <strong>
                                    {{ $errors->first('order') }}
                                </strong>
                            </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label"> {{ trans("general.category") }}*</label>
                                <select class="bs-select form-control" name="category_id" required>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->slug }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description"
                                       class="control-label"> {{ trans("general.description_english") }}</label>
                                <textarea type="text" class="form-control" id="description_en"
                                          name="description_en"
                                          aria-multiline="true"
                                          maxlength="500">{{ old('description_en') }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description"
                                       class="control-label"> {{ trans("general.description_arabic") }}</label>
                                <textarea type="text" class="form-control" id="description_ar"
                                          name="description_ar"
                                          aria-multiline="true"
                                          maxlength="500">{{ old('description_ar') }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('points') ? ' has-error' : '' }}">
                                <label for="points" class="control-label">{{ trans("general.points ") }}</label>
                                <input id="points" type="text" class="form-control" name="points"
                                       value="{{ old('points') }}"
                                       placeholder="points" autofocus required>
                                @if ($errors->has('points'))
                                    <span class="help-block">
                                <strong>
                                    {{ $errors->first('points') }}
                                </strong>
                            </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('sale_points') ? ' has-error' : '' }}">
                                <label for="sale_points"
                                       class="control-label">{{ trans("general.sale_points") }}</label>
                                <input id="sale_points" type="text" class="form-control" name="sale_points"
                                       value="{{ old('sale_points') }}"
                                       placeholder="sale_points" autofocus required>
                                @if ($errors->has('sale_points'))
                                    <span class="help-block">
                                        <strong>
                                            {{ $errors->first('sale_points') }}
                                        </strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label sbold">{{ trans("general.on_sale") }}</label>
                                <div class="radio-list">
                                    <label class="radio-inline">{{ trans("general.on_sale") }}</label>
                                    <input type="radio" name="on_sale" id="optionsRadios1" value="1">
                                    <label class="radio-inline">N/{{ trans("general.A") }}</label>
                                    <input type="radio" name="on_sale" id="optionsRadios2" value="0" checked>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label sbold">{{ trans("general.show_colors") }}</label>
                                <div class="radio-list">
                                    <label class="radio-inline">{{ trans("general.show_colors") }}</label>
                                    <input type="radio" name="show_colors" id="optionsRadios2" value="1">
                                    <label class="radio-inline">hide {{ trans("general.colors") }}</label>
                                    <input type="radio" name="show_colors" id="optionsRadios3" value="0" checked>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label sbold">{{ trans("general.show_socials") }}</label>
                                <div class="radio-list">
                                    <label class="radio-inline">{{ trans("general.show_socials") }}</label>
                                    <input type="radio" name="show_socials" id="optionsRadios4" value="1">
                                    <label class="radio-inline">  {{ trans("general.hide_socials") }}</label>
                                    <input type="radio" name="show_socials" id="optionsRadios5" value="0" checked>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label sbold">{{ trans("general.show_phones") }}</label>
                                <div class="radio-list">
                                    <label class="radio-inline">{{ trans("general.show_phones") }}</label>
                                    <input type="radio" name="show_phones" id="optionsRadios6" value="1">
                                    <label class="radio-inline"> {{ trans("general.hide_phones") }}</label>
                                    <input type="radio" name="show_phones" id="optionsRadios7" value="0" checked>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label sbold">{{ trans("general.show_logo_style") }}</label>
                                <div class="radio-list">
                                    <label class="radio-inline">{{ trans("general.show_logo_style") }}</label>
                                    <input type="radio" name="show_logo_style" id="optionsRadios8" value="1">
                                    <label class="radio-inline"> hide {{ trans("general.logos ") }}</label>
                                    <input type="radio" name="show_logo_style" id="optionsRadios9" value="0" checked>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label sbold">{{ trans("general.show_address") }}</label>
                                <div class="radio-list">
                                    <label class="radio-inline">{{ trans("general.show_address") }}</label>
                                    <input type="radio" name="show_address" id="optionsRadios10" value="1">
                                    <label class="radio-inline">hide {{ trans("general.address") }}</label>
                                    <input type="radio" name="show_address" id="optionsRadios11" value="0" checked>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                @include('backend.partials.forms._btn-group')
            </form>
        </div>
    </div>
@endsection

