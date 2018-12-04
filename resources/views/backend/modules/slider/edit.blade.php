@extends('backend.layouts.app')
@section('content')
    <div class="clearfix"></div>
    <div class="portlet-body form">
        <div class="col-lg-12 col-lg-push-4">
            <img class="img-responsive img-thumbnail img-sm" src="{{ asset('storage/uploads/images/medium/'.$element->image) }}"
                 alt="">
        </div>
        <form role="form" method="post" action="{{ route('backend.slider.update',$element->id) }}"
              enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" value="patch"/>
            <div class="form-body">
                <div class="form-group form-md-line-input">
                    <input type="text" class="form-control" name="title_ar" value={{$element->title_ar}}>
                    <label for="form_control_1">Slide Title Ar *</label>
                    <span class="help-block">please enter proper title</span>
                </div>
            </div>
            <div class="form-body">
                <div class="form-group form-md-line-input">
                    <input type="text" class="form-control" name="title_en" value={{ $element->title_en }}>
                    <label for="form_control_1">Slide Title En*</label>
                    <span class="help-block">please enter proper title</span>
                </div>
            </div>
            <div class="form-body">
                <div class="form-group form-md-line-input">
                    <input type="text" class="form-control" name="url" value="{{ $element->url }}" placeholder="...">
                    <label for="form_control_1">Slide URL*</label>
                    <span class="help-block">full link is only allowed ('http://google.com')</span>
                </div>
            </div>
            <div class="form-body">
                <div class="form-group form-md-line-input">
                    <input type="text" class="form-control" name="order" value="{{ $element->order }}"
                           placeholder="...">
                    <label for="form_control_1">Slide Order*</label>
                    <span class="help-block">slider Order is a number</span>
                </div>
            </div>
            <div class="form-body">
                <div class="form-group form-md-line-input">
                    <input type="file" class="form-control" name="image" placeholder="...">
                    <label for="form_control_1">Slide Image*</label>
                    <span class="help-block">slider Image only JPG / PNG is accepted -best fit ['750', '1334']</span>
                </div>
            </div>
            <div class="form-body">
                <div class="form-group form-md-line-input">
                    <input type="file" class="form-control" name="bg" placeholder="...">
                    <label for="form_control_1">Slide bg*</label>
                    <span class="help-block">slider Image only JPG / PNG is accepted -best fit ['750', '1334']</span>
                </div>
            </div>

            <div class="form-body">
                <div class="md-radio-inline">
                    <div class="md-radio">
                        <input type="radio" id="radio53" name="active" value="1"
                               class="md-radiobtn" {{ $element->active ? 'checked' : null }}>
                        <label for="radio53">
                            <span></span>
                            <span class="check"></span>
                            <span class="box"></span> Active</label>
                    </div>
                    <div class="md-radio">
                        <input type="radio" id="radio54" name="active" value="0"
                               class="md-radiobtn" {{ $element->active ? null : 'checked' }}>
                        <label for="radio54">
                            <span></span>
                            <span class="check"></span>
                            <span class="box"></span> N/A</label>
                    </div>
                </div>
            </div>

            <div class="form-body">
                <div class="md-radio-inline">
                    <div class="md-radio">
                        <input type="radio" id="radio55" name="is_splash" value="1"
                               class="md-radiobtn" {{ $element->is_splash ? 'checked' : null }}>
                        <label for="radio55">
                            <span></span>
                            <span class="check"></span>
                            <span class="box"></span> is splash</label>
                    </div>
                    <div class="md-radio">
                        <input type="radio" id="radio56" name="is_splash" value="0"
                               class="md-radiobtn" {{ $element->is_splash ? null : 'checked' }}>
                        <label for="radio56">
                            <span></span>
                            <span class="check"></span>
                            <span class="box"></span> N/A</label>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="form-body">
                    <div class="form-group form-md-line-input">
                        <input type="text" class="form-control" name="content_ar" placeholder="...">
                        <label for="content_ar">Slide content Ar *</label>
                        <span class="help-block">{!! $element->content_ar !!}</span>
                    </div>
                </div>
                <div class="form-body">
                    <div class="form-group form-md-line-input">
                        <input type="text" class="form-control" name="content_en" placeholder="...">
                        <label for="content_en">Slide content En*</label>
                        <span class="help-block">{!! $element->content_en !!}</span>
                    </div>
                </div>
            </div>



            <div class="form-actions noborder text-right">
                <button type="submit" class="btn blue">Submit</button>
                <button href="{{ url()->previous() }}" class="btn default">Cancel</button>
            </div>
        </form>
    </div>
@endsection