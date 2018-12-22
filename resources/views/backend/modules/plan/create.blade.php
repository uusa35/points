@extends('backend.layouts.app')
@section('content')
    @include('backend.partials.breadcrumbs')
<div class="portlet box blue">
    @include('backend.partials.forms.form_title')

    <div class="portlet-body form">
        <form class="horizontal-form" role="form" method="POST" action="{{ route('backend.admin.plan.store') }}"
            enctype="multipart/form-data">
            @csrf
            <div class="form-body">
                
            <div class="row">
                    <div class="col-md-4">
                        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="control-label">{{ trans('general.name') }}</label>
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}"
                                placeholder="name" autofocus>
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
                            <label for="slug_ar" class="control-label">{{ trans('general.slug_ar') }}</label>
                            <input id="slug_ar" type="text" class="form-control" name="slug_ar" value="{{ old('slug_ar') }}"
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



                    <div class="col-md-4">
                        <div class="form-group {{ $errors->has('slug_en') ? ' has-error' : '' }}">
                            <label for="slug_en" class="control-label">{{ trans('general.slug_en') }}</label>
                            <input id="slug_en" type="text" class="form-control" name="slug_en" value="{{ old('slug_en') }}"
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

                </div>




                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="form_control_1">{{ trans('general.image') }}</label>
                            <input type="file" class="form-control" name="image" placeholder="image">
                            <div class="help-block text-left">
                                W H - Best fit 250 x 250 pixels
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="form_control_1">{{ trans('general.path') }}</label>
                            <input type="file" class="form-control" name="path" placeholder="path">

                        </div>
                    </div>


                    <div class="col-md-4">
                        <div class="form-group">
                            <label class=" control-label">{{ trans('general.color')}}</label>
                            <input type="text" id="hue-demo" name="color" class="form-control demo" data-control="hue"
                                value="#ff6161">
                        </div>

                    </div>


                </div>


                <div class="row">


                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="bonus" class="control-label">{{ trans('general.bonus')}} </label>
                            <input id="bonus" type="text" class="form-control" name="bonus" value="{{ old('bonus') }}"
                                placeholder="bonus" autofocus>
                            @if ($errors->has('bonus'))
                            <span class="help-block">
                                <strong>
                                    {{ $errors->first('bonus') }}
                                </strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="points" class="control-label">{{ trans('general.points')}} </label>
                            <input id="points" type="text" class="form-control" name="points" value="{{ old('points') }}"
                                placeholder="points" autofocus>
                            @if ($errors->has('points'))
                            <span class="help-block">
                                <strong>
                                    {{ $errors->first('points') }}
                                </strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label sbold">{{ trans('general.apply_bonus') }}</label>
                            <div class="radio-list">
                                <label class="radio-inline">
                                    <input type="radio" name="apply_bonus" id="optionsRadios1" value="1"> {{ trans('apply_bonus')
                                    }}
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="apply_bonus" id="optionsRadios2" value="0"> {{
                                    trans('general.not_apply_bonus') }}
                                </label>
                            </div>
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


                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="description" class="control-label">{{ trans('general.description_ar') }}</label>
                            <textarea type="text" class="form-control" id="description_ar" name="description_ar"
                                aria-multiline="true" maxlength="500">{{ old('description_ar') }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="description" class="control-label">{{ trans('general.descirption_en') }}</label>
                            <textarea type="text" class="form-control" id="description_en" name="description_en"
                                aria-multiline="true" maxlength="500">{{ old('description_en') }}</textarea>
                        </div>
                    </div>
                </div>

            </div>
            @include('backend.partials.forms._btn-group')
        </form>
    </div>
</div>
@endsection
