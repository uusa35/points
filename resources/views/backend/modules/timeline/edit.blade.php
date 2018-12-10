@extends('backend.layouts.app')
@section('content')
    <div class="portlet box blue">
        @include('backend.partials.forms.form_title')
        <div class="portlet-body form">
            <form class="horizontal-form" role="form" method="POST"
                  action="{{ route('backend.timeline.update', $element->id) }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="put">
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-6">
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
                        <div class="col-md-6">
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
                            <div class="form-group">
                                <label for="form_control_1">Main file</label>
                                <input type="file" class="form-control" name="path" placeholder="file">
                                <div class="help-block text-left">
                                    files shall not exceed 10 MB
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Project *</label>
                                <select class="bs-select form-control" name="project_id" required>
                                    @foreach($activeProjects as $project)
                                        <option value="{{ $project->id }}" {{ $project->id === $element->project_id ? 'selected' : null }}>{{ $project->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description" class="control-label">{{ trans('general.description_ar') }}</label>
                                <textarea type="text" class="form-control" id="description_ar" name="description_ar"
                                          aria-multiline="true" maxlength="500">{{ $element->description_ar }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description" class="control-label">{{ trans('general.description_en') }}</label>
                                <textarea type="text" class="form-control" id="description_en" name="description_en"
                                          aria-multiline="true" maxlength="500">{{ $element->description_en }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
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
                        <div class="col-md-4">
                            <div class="form-group{{ $errors->has('start_date') ? ' has-error' : '' }}">
                                <label for="start_date" class="control-label">start_date</label>
                                <input id="start_date"
                                       type="date"
                                       class="form-control"
                                       name="start_date"
                                       value="{{ $element->start_date->format('Y-m-d') }}"
                                       placeholder="name in arabic"
                                       required
                                       autofocus>
                                @if ($errors->has('start_date'))
                                    <span class="help-block">
                                        <strong>
                                            {{ $errors->first('start_date') }}
                                        </strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group{{ $errors->has('end_date') ? ' has-error' : '' }}">
                                <label for="end_date" class="control-label">end_date </label>
                                <input id="end_date"
                                       type="date"
                                       class="form-control"
                                       name="end_date"
                                       value="{{ $element->end_date->format('Y-m-d') }}"
                                       placeholder="name in english"
                                       required
                                       autofocus>
                                @if ($errors->has('end_date'))
                                    <span class="help-block">
                                        <strong>
                                            {{ $errors->first('end_date') }}
                                        </strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        {{--<div class="col-md-4">--}}
                            {{--<div class="form-group">--}}
                                {{--<label class="control-label sbold">notification</label></br>--}}
                                {{--<label class="radio-inline">--}}
                                    {{--<input type="radio" name="notification" id="optionsRadios1"--}}
                                           {{--{{ $element->notification ? 'checked' : null  }}--}}
                                           {{--value="1"> notification </label>--}}
                                {{--<label class="radio-inline">--}}
                                    {{--<input type="radio" name="notification" id="optionsRadios2"--}}
                                           {{--{{ !$element->notification ? 'checked' : null  }}--}}
                                           {{--value="0"> N/A</label>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    </div>

                    @include('backend.partials.forms._btn-group')
                </div>
            </form>
        </div>
    </div>
@endsection