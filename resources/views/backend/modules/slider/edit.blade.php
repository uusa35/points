@extends('backend.layouts.app')
@section('content')
    <div class="clearfix"></div>
    <div class="portlet-body form">
        <div class="col-lg-12 col-lg-push-4">
            <img class="img-responsive img-thumbnail img-sm" src="{{ asset('storage/uploads/images/medium/'.$element->image) }}"
                 alt="">
        </div>
        <form role="form" method="post" action="{{ route('backend.admin.slider.update',$element->id) }}"
              enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" value="patch"/>
            <div class="form-body">
                <div class="form-group form-md-line-input">
                    <input type="text" class="form-control" name="caption_ar" value={{$element->caption_ar}}>
                    <label for="form_control_1">Slide caption Ar *</label>
                    <span class="help-block">please enter proper title</span>
                </div>
            </div>
            <div class="form-body">
                <div class="form-group form-md-line-input">
                    <input type="text" class="form-control" name="caption_en" value={{ $element->caption_en }}>
                    <label for="form_control_1">Slide caption En*</label>
                    <span class="help-block">please enter proper title</span>
                </div>
            </div>
            <div class="form-body">
                <div class="form-group form-md-line-input">
                    <input type="text" class="form-control" name="order" value={{ $element->order }}>
                    <label for="form_control_1">Slide order *</label>
                    <span class="help-block">Slider Order</span>
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
                    <input type="file" class="form-control" name="image" placeholder="...">
                    <label for="form_control_1">Slide Image*</label>
                    <span class="help-block">slider Image only JPG / PNG is accepted -best fit w / h '1905', '750'</span>
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




            <div class="form-actions noborder text-right">
                <button type="submit" class="btn blue">Submit</button>
                <button href="{{ url()->previous() }}" class="btn default">Cancel</button>
            </div>
        </form>
    </div>
@endsection
