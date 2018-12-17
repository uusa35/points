@extends('backend.layouts.app')
@section('content')
    <div class="portlet box blue">
        @include('backend.partials.forms.form_title')
        <div class="portlet-body form">
            <form class="horizontal-form" role="form" method="POST"
                  action="{{ route('backend.job.update', $element->id) }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="put">
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group {{ $errors->has('reference_id') ? ' has-error' : '' }}">
                                <label for="reference_id" class="control-label">reference_id</label>
                                <input id="reference_id"
                                       type="text"
                                       class="form-control"
                                       name="reference_id"
                                       value="{{ $element->reference_id }}"
                                       placeholder="reference_id"
                                       required autofocus>
                                @if ($errors->has('reference_id'))
                                    <span class="help-block">
                                        <strong>
                                            {{ $errors->first('reference_id') }}
                                        </strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group {{ $errors->has('name_ar') ? ' has-error' : '' }}">
                                <label for="name_ar" class="control-label">Name Arabic*</label>
                                <input id="name_ar"
                                       type="text"
                                       class="form-control"
                                       name="name_ar"
                                       value="{{ $element->name_ar }}"
                                       placeholder="name_ar"
                                       required autofocus>
                                @if ($errors->has('name_ar'))
                                    <span class="help-block">
                                        <strong>
                                            {{ $errors->first('name_ar') }}
                                        </strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group{{ $errors->has('name_en') ? ' has-error' : '' }}">
                                <label for="name_en" class="control-label">Name English*</label>
                                <input id="name_en"
                                       type="text"
                                       class="form-control"
                                       name="name_en"
                                       value="{{ $element->name_en }}"
                                       placeholder="name in english"
                                       required autofocus>
                                @if ($errors->has('name_en'))
                                    <span class="help-block">
                                        <strong>
                                            {{ $errors->first('name_en') }}
                                        </strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('ip_cam_url') ? ' has-error' : '' }}">
                                <label for="ip_cam_url" class="control-label">ip_cam_url Website</label>
                                <input id="ip_cam_url"
                                       type="text"
                                       class="form-control"
                                       name="ip_cam_url"
                                       placeholder="website --> http://google.com"
                                       value="{{ $element->ip_cam_url }}"
                                       autofocus>
                                @if ($errors->has('ip_cam_url'))
                                    <span class="help-block">
                                        <strong>
                                            {{ $errors->first('ip_cam_url') }}
                                        </strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="form_control_1">Main Image</label>
                                <input type="file" class="form-control" name="image" placeholder="image">
                                <div class="help-block text-left">
                                    W * H - Best fit 1024 x 800 pixels
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('caption_ar') ? ' has-error' : '' }}">
                            <label for="caption_ar" class="control-label">caption_ar Arabic</label>
                            <input id="caption_ar"
                                   type="text"
                                   class="form-control"
                                   name="caption_ar"
                                   value="{{ $element->caption_ar }}"
                                   placeholder="caption_ar"
                                   autofocus>
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
                        <div class="form-group{{ $errors->has('caption_en') ? ' has-error' : '' }}">
                            <label for="caption_en" class="control-label">caption_en English</label>
                            <input id="caption_en"
                                   type="text"
                                   class="form-control"
                                   name="caption_en"
                                   value="{{ $element->caption_en }}"
                                   placeholder="name in english"
                                   autofocus>
                            @if ($errors->has('caption_en'))
                                <span class="help-block">
                                        <strong>
                                            {{ $errors->first('caption_en') }}
                                        </strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="description" class="control-label">description arabic</label>
                            <textarea type="text" class="form-control" id="description_ar" name="description_ar"
                                      aria-multiline="true"
                                      maxlength="500">{{ $element->description_ar }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="description" class="control-label">description english</label>
                            <textarea type="text" class="form-control" id="description_en" name="description_en"
                                      aria-multiline="true"
                                      maxlength="500">{{ $element->description_en }}</textarea>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label sbold">active</label></br>
                            <label class="radio-inline">
                                <input type="radio" name="active" id="optionsRadios1"
                                       {{ $element->active ? 'checked' : null  }}
                                       value="1"> active </label>
                            <label class="radio-inline">
                                <input type="radio" name="active" id="optionsRadios2"
                                       {{ !$element->active ? 'checked' : null  }}
                                       value="0"> not_Active</label>
                        </div>
                    </div>
                </div>

            @include('backend.partials.forms._btn-group')
        </div>
        </form>
    </div>
    </div>
@endsection
