@extends('backend.layouts.app')


@section('content')
    <div class="portlet box blue">
        @include('backend.partials.forms.form_title')
        <div class="portlet-body form">
            <form class="horizontal-form" role="form" method="POST"
                  action="{{ route('backend.tag.update', $element->id) }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="put">
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="control-label">Name Arabic*</label>
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
                                <label for="slug_ar" class="control-label">Slug Arabic*</label>
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
                                <label for="slug_en" class="control-label">Slug English*</label>
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
                </div>
                @include('backend.partials.forms._btn-group')
            </form>
        </div>
    </div>
@endsection
