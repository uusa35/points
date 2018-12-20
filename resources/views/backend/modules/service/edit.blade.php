@extends('backend.layouts.app')
@section('content')
    @include('backend.partials.breadcrumbs')
    <div class="portlet box blue">
        @include('backend.partials.forms.form_title')
        <div class="portlet-body form">
            <form class="horizontal-form" role="form" method="POST" action="{{ route('backend.admin.service.update', $element->id) }}"
                  enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="put">
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="control-label">{{ trans('general.order_name') }}</label>
                                <input id="name" type="text" class="form-control" name="name"
                                       value="{{ $element->name }}"
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
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('slug_ar') ? ' has-error' : '' }}">
                                <label for="slug_ar" class="control-label">{{ trans('general.slug_ar') }}</label>
                                <input id="slug_ar" type="text" class="form-control" name="slug_ar"
                                       value="{{ $element->slug_ar }}"
                                       placeholder="slug_ar" autofocus>
                                @if ($errors->has('slug_ar'))
                                    <span class="help-block">
                                <strong>
                                    {{ $errors->first('slug_ar') }}
                                </strong>
                            </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('slug_en') ? ' has-error' : '' }}">
                                <label for="slug_en" class="control-label">{{ trans('general.slug_en') }}</label>
                                <input id="slug_en" type="text" class="form-control" name="slug_en"
                                       value="{{ $element->slug_en }}"
                                       placeholder="slug_en" autofocus>
                                @if ($errors->has('slug_en'))
                                    <span class="help-block">
                                <strong>
                                    {{ $errors->first('slug_en') }}
                                </strong>
                            </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('caption_ar') ? ' has-error' : '' }}">
                                <label for="caption_ar" class="control-label">{{ trans('general.caption_ar') }}</label>
                                <input id="caption_ar" type="text" class="form-control" name="caption_ar"
                                       value="{{ $element->caption_ar }}"
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
                                <label for="caption_en" class="control-label">{{ trans('general.caption_en') }}</label>
                                <input id="caption_en" type="text" class="form-control" name="caption_en"
                                       value="{{ $element->caption_en }}"
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
                                <label for="duration" class="control-label">{{ trans('general.duration') }}</label>
                                <input id="duration" type="text" class="form-control" name="duration"
                                       value="{{ $element->duration }}"
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
                                <label for="order" class="control-label">{{ trans('general.order') }}</label>
                                <input id="order" type="text" class="form-control" name="order"
                                       placeholder="order --> http://google.com"
                                       value="{{ $element->order }}" autofocus>
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
                                <label class="control-label">Category *</label>
                                <select class="bs-select form-control" name="category_id" required>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $element->id === $category->id ? 'selected' : null }}>{{ $category->slug }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group{{ $errors->has('points') ? ' has-error' : '' }}">
                                <label for="points" class="control-label">{{ trans('general.points') }} </label>
                                <input id="points" type="text" class="form-control" name="points"
                                       value="{{ $element->points }}"
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

                        <div class="col-md-3">
                            <div class="form-group{{ $errors->has('sale_points') ? ' has-error' : '' }}">
                                <label for="sale_points"
                                       class="control-label">{{ trans('general.sale_points') }} </label>
                                <input id="sale_points" type="text" class="form-control" name="sale_points"
                                       value="{{ $element->sale_points }}"
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

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description"
                                       class="control-label">{{ trans('general.description')}}</label>
                                <textarea type="text" class="form-control" id="description_en"
                                          name="description_en"
                                          aria-multiline="true"
                                          maxlength="500">{{ $element->description_en }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description"
                                       class="control-label">{{ trans('general.description')}}</label>
                                <textarea type="text" class="form-control" id="description_ar"
                                          name="description_ar"
                                          aria-multiline="true"
                                          maxlength="500">{{ $element->description_ar }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                @include('backend.partials.forms._btn-group')
            </form>
        </div>
    </div>
@endsection

