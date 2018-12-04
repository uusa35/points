@extends('backend.layouts.app')
@section('content')
    <div class="portlet box blue">
        @include('backend.partials.forms.form_title')
        <div class="portlet-body form">
            <form class="horizontal-form" role="form" method="POST"
                  action="{{ route('backend.payment.update',$element->id) }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="put">
                <div class="form-body">
                    <div class="row">
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
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="form_control_1">Main file</label>
                                <input type="file" class="form-control" name="path" placeholder="file">
                                <div class="help-block text-left">
                                    files shall not exceed 10 MB
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('due_date') ? ' has-error' : '' }}">
                                <label for="due_date" class="control-label">due_date</label>
                                <input id="due_date"
                                       type="date"
                                       class="form-control"
                                       name="due_date"
                                       value="{{ $element->due_date->format('Y-m-d') }}"
                                       placeholder="name in arabic"
                                       required
                                       autofocus>
                                @if ($errors->has('due_date'))
                                    <span class="help-block">
                                        <strong>
                                            {{ $errors->first('due_date') }}
                                        </strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('date_received') ? ' has-error' : '' }}">
                                <label for="date_received" class="control-label">date_received </label>
                                <input id="date_received"
                                       type="date"
                                       class="form-control"
                                       name="date_received"
                                       value="{{ $element->due_date->format('Y-m-d') }}"
                                       placeholder="name in english"
                                       required
                                       autofocus>
                                @if ($errors->has('date_received'))
                                    <span class="help-block">
                                        <strong>
                                            {{ $errors->first('date_received') }}
                                        </strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group{{ $errors->has('reference_no') ? ' has-error' : '' }}">
                                <label for="reference_no" class="control-label">reference no</label>
                                <input id="reference_no"
                                       type="text"
                                       class="form-control"
                                       name="reference_no"
                                       value="{{ $element->reference_no }}"
                                       placeholder="reference no"
                                       autofocus>
                                @if ($errors->has('reference_no'))
                                    <span class="help-block">
                                        <strong>
                                            {{ $errors->first('reference_no') }}
                                        </strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                                <label for="amount" class="control-label">amount *</label>
                                <input id="amount"
                                       type="text"
                                       class="form-control"
                                       name="amount"
                                       value="{{ $element->amount }}"
                                       placeholder="name in english"
                                       required autofocus>
                                @if ($errors->has('amount'))
                                    <span class="help-block">
                                        <strong>
                                            {{ $errors->first('amount') }}
                                        </strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Project *</label>
                                <select class="bs-select form-control" name="project_id" required>
                                    @foreach($activeProjects as $project)
                                        <option value="{{ $project->id }}" {{ $project->id === $element->project_id  ? 'selected' : null }}>{{ $project->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description" class="control-label">description</label>
                                <textarea type="text" class="form-control" id="description" name="description"
                                          aria-multiline="true" maxlength="500">{{ $element->description }}</textarea>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-3">
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