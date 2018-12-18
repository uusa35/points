@extends('backend.layouts.app')
@section('content')
    <div class="portlet box blue">
        @include('backend.partials.forms.form_title')
        <div class="portlet-body form">
            <form class="horizontal-form" role="form" method="POST"
                  action="{{ route('backend.version.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group {{ $errors->has('notes') ? ' has-error' : '' }}">
                                <label for="notes" class="control-label">{{ trans('general.notes') }}</label>
                                <input id="notes"
                                       type="text"
                                       class="form-control"
                                       name="notes"
                                       value="{{ old('notes') }}"
                                       placeholder="notes"
                                       required autofocus>
                                @if ($errors->has('notes'))
                                    <span class="help-block">
                                        <strong>
                                            {{ $errors->first('notes') }}
                                        </strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="description" class="control-label">{{ trans('general.description') }}</label>
                                <input id="description"
                                       type="text"
                                       class="form-control"
                                       name="description"
                                       value="{{ old('description') }}"
                                       placeholder="description"
                                       required autofocus>
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>
                                            {{ $errors->first('description') }}
                                        </strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                       
                        <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label sbold">{{ trans('general.active') }}</label>
                            <div class="radio-list">
                                <label class="radio-inline">
                                    <input type="radio" name="active" id="optionsRadios1" value="1"> {{ trans('active')
                                    }}
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="active" id="optionsRadios2" value="0"> {{
                                    trans('general.not_active') }}
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
