@extends('backend.layouts.app')
@section('content')
    <div class="clearfix"></div>
    <div class="portlet-body form">
        <form role="form" method="post" action="{{ route('backend.slider.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-body">
                <div class="form-group form-md-line-input">
                    <input type="text" class="form-control" name="caption_ar" placeholder="...">
                    <label for="caption_ar">Slide Title Ar *</label>
                    <span class="help-block">please enter proper caption</span>
                </div>
            </div>
            <div class="form-body">
                <div class="form-group form-md-line-input">
                    <input type="text" class="form-control" name="caption_en" placeholder="...">
                    <label for="caption_en">Slide Title En*</label>
                    <span class="help-block">please enter proper caption</span>
                </div>
            </div>
            <div class="form-body">
                <div class="form-group form-md-line-input">
                    <input type="text" class="form-control" name="url" placeholder="...">
                    <label for="url">Slide URL*</label>
                    <span class="help-block">full link is only allowed ('http://google.com')</span>
                </div>
            </div>
            <div class="form-body">
                <div class="form-group form-md-line-input">
                    <input type="text" class="form-control" name="order" placeholder="...">
                    <label for="order">Slide Order*</label>
                    <span class="help-block">slider Order is a number</span>
                </div>
            </div>
            <div class="form-body">
                <div class="form-group form-md-line-input">
                    <input type="file" class="form-control" name="image" placeholder="...">
                    <label for="image">Slide Image*</label>
                    <span class="help-block">slider Image only JPG / PNG is accepted -best fit ['750', '1334']</span>
                </div>
            </div>
            <div class="form-body">
                <div class="form-group form-md-line-input">
                    <input type="file" class="form-control" name="bg" placeholder="...">
                    <label for="bg">Slide Background*</label>
                    <span class="help-block">slider Image only JPG / PNG is accepted -best fit ['750', '1334']</span>
                </div>
            </div>
            <div class="form-body">
                <div class="form-group form-md-line-input">
                    <input type="file" class="form-control" name="bg" placeholder="...">
                    <label for="bg">Slide Bg*</label>
                    <span class="help-block">slider Image only JPG / PNG is accepted -best fit ['1440', '400']</span>
                </div>
            </div>

            <div class="form-body">
                <div class="form-group form-md-line-input">
                    <input type="text" class="form-control" name="content_ar" placeholder="...">
                    <label for="content_ar">Slide content Ar *</label>
                    <span class="help-block">please enter proper content</span>
                </div>
            </div>
            <div class="form-body">
                <div class="form-group form-md-line-input">
                    <input type="text" class="form-control" name="content_en" placeholder="...">
                    <label for="content_en">Slide content En*</label>
                    <span class="help-block">please enter proper content</span>
                </div>
            </div>

            <div class="form-body">
                <div class="md-radio-inline">
                    <div class="md-radio">
                        <input type="radio" id="radio53" name="active" value="1" class="md-radiobtn" checked>
                        <label for="radio53">
                            <span></span>
                            <span class="check"></span>
                            <span class="box"></span> Active</label>
                    </div>
                    <div class="md-radio">
                        <input type="radio" id="radio54" name="active" value="0" class="md-radiobtn">
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
                        <input type="radio" id="radio53" name="is_splash" value="1" class="md-radiobtn" checked>
                        <label for="radio53">
                            <span></span>
                            <span class="check"></span>
                            <span class="box"></span> is splash</label>
                    </div>
                    <div class="md-radio">
                        <input type="radio" id="radio54" name="is_splash" value="0" class="md-radiobtn">
                        <label for="radio54">
                            <span></span>
                            <span class="check"></span>
                            <span class="box"></span> N/A</label>
                    </div>
                </div>
            </div>


            @include('backend.partials.forms._btn-group')
        </form>
    </div>
@endsection
