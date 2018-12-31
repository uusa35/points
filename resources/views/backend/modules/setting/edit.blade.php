@extends('backend.layouts.app')
@section('content')
    @include('backend.partials.breadcrumbs')
    <div class="portlet box blue">
        @include('backend.partials.forms.form_title')
        <div class="portlet-body form">
            <!-- BEGIN FORM-->
            <form method="post" action="{{ route('backend.admin.setting.update', $element->id) }}" class="horizontal-form"  enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="patch">
                <div class="form-body">
                    <h3 class="form-section">App Settings</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">name_ar</label>
                                <input type="text" id="name_ar" name="name_ar" class="form-control"
                                       placeholder="name_ar"
                                       value="{{ $element->name_ar }}">
                                <span class="help-block"> name_ar </span>
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">name_en</label>
                                <input type="text" id="name_en" name="name_en" class="form-control"
                                       placeholder="name_en"
                                       value="{{ $element->name_en }}">
                                <span class="help-block"> name_en </span>
                            </div>
                        </div>
                        <!--/span-->
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">info_email</label>
                                <input type="text" id="info_email" name="info_email" class="form-control" placeholder="info_email"
                                       value="{{ $element->info_email }}">
                                <span class="help-block"> info_email </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">support_email</label>
                                <input type="text" id="support_email" name="support_email" class="form-control" placeholder="support_email"
                                       value="{{ $element->support_email }}">
                                <span class="help-block"> support_email </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">admin_email</label>
                                <input type="text" id="admin_email" name="admin_email" class="form-control" placeholder="admin_email"
                                       value="{{ $element->admin_email }}">
                                <span class="help-block"> admin_email </span>
                            </div>
                        </div>
                        <!--/span-->
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">phone</label>
                                <input type="text" id="phone" name="phone" class="form-control" placeholder="phone"
                                       value="{{ $element->phone }}">
                                <span class="help-block"> phone </span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">mobile</label>
                                <input type="text" id="mobile" name="mobile" class="form-control" placeholder="mobile"
                                       value="{{ $element->mobile }}">
                                <span class="help-block"> mobile </span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">fax</label>
                                <input type="text" id="fax" name="fax" class="form-control" placeholder="fax"
                                       value="{{ $element->fax }}">
                                <span class="help-block"> fax </span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">whatsapp</label>
                                <input type="text" id="whatsapp" name="whatsapp" class="form-control" placeholder="whatsapp"
                                       value="{{ $element->whatsapp }}">
                                <span class="help-block"> whatsapp </span>
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">longitude</label>
                                <input type="text" id="longitude" name="longitude" class="form-control"
                                       placeholder="longitude"
                                       value="{{ $element->longitude }}">
                                <span class="help-block"> longitude </span>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">latitude</label>
                                <input type="text" id="latitude" name="latitude" class="form-control"
                                       placeholder="latitude"
                                       value="{{ $element->latitude }}">
                                <span class="help-block"> latitude </span>
                            </div>
                        </div>
                        <!--/span-->
                    </div>
                    <!--/row-->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">title_one_ar</label>
                                <input type="text" id="title_one_ar" name="title_one_ar" class="form-control"
                                       placeholder="title_one_ar"
                                       value="{{ $element->title_one_ar }}">
                                <span class="help-block"> title_one_ar </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">title_one_en</label>
                                <input type="text" id="title_one_en" name="title_one_en" class="form-control"
                                       placeholder="title_one_en"
                                       value="{{ $element->title_one_en }}">
                                <span class="help-block"> title_one_en </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="section_one"
                                       class="control-label">section_one ar</label>
                                <textarea type="text" class="form-control" id="section_one_ar"
                                          name="section_one_ar"
                                          aria-multiline="true"
                                          maxlength="500">{{ $element->section_one_ar }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="section_one"
                                       class="control-label">section_one en</label>
                                <textarea type="text" class="form-control" id="section_one_en"
                                          name="section_one_en"
                                          aria-multiline="true"
                                          maxlength="500">{{ $element->section_one_en }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">title_two_ar</label>
                                <input type="text" id="title_two_ar" name="title_two_ar" class="form-control"
                                       placeholder="title_two_ar"
                                       value="{{ $element->title_two_ar }}">
                                <span class="help-block"> title_two_ar </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">title_two_en</label>
                                <input type="text" id="title_two_en" name="title_two_en" class="form-control"
                                       placeholder="title_two_en"
                                       value="{{ $element->title_two_en }}">
                                <span class="help-block"> title_two_en </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="section_two_ar"
                                       class="control-label">section_two ar</label>
                                <textarea type="text" class="form-control" id="section_two_ar"
                                          name="section_two_ar"
                                          aria-multiline="true"
                                          maxlength="500">{{ $element->section_two_ar }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="section_one_en"
                                       class="control-label">section_two en</label>
                                <textarea type="text" class="form-control" id="section_one_en"
                                          name="section_one_en"
                                          aria-multiline="true"
                                          maxlength="500">{{ $element->section_one_en }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">title_three_ar</label>
                                <input type="text" id="title_three_ar" name="title_three_ar" class="form-control"
                                       placeholder="title_three_ar"
                                       value="{{ $element->title_three_ar }}">
                                <span class="help-block"> title_three_ar </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">title_three_en</label>
                                <input type="text" id="title_three_en" name="title_three_en" class="form-control"
                                       placeholder="title_three_en"
                                       value="{{ $element->title_three_en }}">
                                <span class="help-block"> title_three_en </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="section_three_ar"
                                       class="control-label">section_three ar</label>
                                <textarea type="text" class="form-control" id="section_three_ar"
                                          name="section_three_ar"
                                          aria-multiline="true"
                                          maxlength="500">{{ $element->section_three_ar }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="section_three_en"
                                       class="control-label">section_three en</label>
                                <textarea type="text" class="form-control" id="section_three_en"
                                          name="section_three_en"
                                          aria-multiline="true"
                                          maxlength="500">{{ $element->section_three_en }}</textarea>
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
                                <label for="on_home_speech"
                                       class="control-label">{{ trans('general.on_home_speech')}}</label>
                                <textarea type="text" class="form-control" id="on_home_speech_ar"
                                          name="on_home_speech_ar"
                                          aria-multiline="true"
                                          maxlength="500">{{ $element->on_home_speech_ar }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="on_home_speech"
                                       class="control-label">{{ trans('general.on_home_speech')}}</label>
                                <textarea type="text" class="form-control" id="on_home_speech_en"
                                          name="on_home_speech_en"
                                          aria-multiline="true"
                                          maxlength="500">{{ $element->on_home_speech_en }}</textarea>
                            </div>
                        </div>
                        <!--/span-->
                    </div>

                    <!--/row-->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">address_ar</label>
                                <input type="text" id="address_ar" name="address_ar" class="form-control"
                                       placeholder="address_ar"
                                       value="{{ $element->address_ar }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">address_en</label>
                                <input type="text" id="address_en" name="address_en" class="form-control"
                                       placeholder="address_en"
                                       value="{{ $element->address_en }}">
                            </div>
                        </div>
                        <!--/span-->
                    </div>


                    <!--/row-->
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="control-label">video</label>
                                <input type="text" id="video" name="video" class="form-control"
                                       placeholder="video"
                                       value="{{ $element->video }}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="control-label">google_map_url</label>
                                <input type="text" id="google_map_url" name="google_map_url" class="form-control"
                                       placeholder="google_map_url"
                                       value="{{ $element->google_map_url }}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="control-label">facebook</label>
                                <input type="text" id="facebook" name="facebook" class="form-control"
                                       placeholder="facebook"
                                       value="{{ $element->facebook }}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="control-label">twitter</label>
                                <input type="text" id="twitter" name="twitter" class="form-control"
                                       placeholder="twitter"
                                       value="{{ $element->twitter }}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="control-label">instagram</label>
                                <input type="text" id="instagram" name="instagram" class="form-control"
                                       placeholder="instagram"
                                       value="{{ $element->instagram }}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="control-label">google</label>
                                <input type="text" id="google" name="google" class="form-control"
                                       placeholder="google"
                                       value="{{ $element->google }}">
                                <span class="help-block"> google </span>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="control-label">youtube</label>
                                <input type="text" id="youtube" name="youtube" class="form-control"
                                       placeholder="youtube"
                                       value="{{ $element->youtube }}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="control-label">linkin</label>
                                <input type="text" id="linkin" name="linkin" class="form-control"
                                       placeholder="linkin"
                                       value="{{ $element->linkin }}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="control-label">website</label>
                                <input type="text" id="website" name="website" class="form-control"
                                       placeholder="website"
                                       value="{{ $element->website }}">
                            </div>
                        </div>
                        <!--/span-->
                    </div>


                    <!--/row-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label sbold">maintenance_mode</label>
                                    <div class="radio-list">
                                        <label class="radio-inline">
                                            <input type="radio" name="maintenance_mode" id="optionsRadios1"
                                                   value="1" {{ $element->maintenance_mode ? 'checked' : null }}>
                                            maintenance_mode </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="maintenance_mode" id="optionsRadios2"
                                                   value="0" {{ $element->maintenance_mode  ? null : 'checked'}}>
                                            N/A</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label sbold">auto_enrollment</label>
                                    <div class="radio-list">
                                        <label class="radio-inline">
                                            <input type="radio" name="auto_enrollment" id="optionsRadios1"
                                                   value="1" {{ $element->auto_enrollment ? 'checked' : null }}>
                                            auto_enrollment </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="auto_enrollment" id="optionsRadios2"
                                                   value="0" {{ $element->auto_enrollment  ? null : 'checked'}}>
                                            N/A</label>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="file" class="form-control" name="logo" placeholder="logo">
                                    <label for="form_control_1">logo Image - ['500', '500']</label>
                                    <div class="help-block text-left">
                                        W * H - Best fit 500 x 500 pixels
                                    </div>
                                    <img src="{{ asset('storage/uploads/images/thumbnail/'.$element->logo) }}" alt=""
                                         class="img-xs">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="file" class="form-control" name="zapper" placeholder="zapper">
                                    <label for="form_control_1">zapper Image - ['500', '500']</label>
                                    <div class="help-block text-left">
                                        W * H - Best fit 500 x 500 pixels
                                    </div>
                                    <img src="{{ asset('storage/uploads/images/thumbnail/'.$element->zapper) }}" alt=""
                                         class="img-xs">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="file" class="form-control" name="qr" placeholder="qr">
                                    <label for="form_control_1">qr Image - ['500', '500']</label>
                                    <div class="help-block text-left">
                                        W * H - Best fit 500 x 500 pixels
                                    </div>
                                    <img src="{{ asset('storage/uploads/images/thumbnail/'.$element->qr) }}" alt=""
                                         class="img-xs">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="file" class="form-control" name="path" placeholder="path">
                                    <label for="form_control_1">path </label>
                                    <div class="help-block text-left">
                                        pdf Only
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--/span-->
                    </div>
                    <!--/row-->
                </div>
                {{--<div class="form-actions right">--}}
                {{--<button type="button" class="btn default" href="{{ redirect()->back() }}">Cancel</button>--}}
                {{--<button type="submit" class="btn blue">--}}
                {{--<i class="fa fa-check"></i> Save--}}
                {{--</button>--}}
                {{--</div>--}}
                @include('backend.partials.forms._btn-group')
            </form>
            <!-- END FORM-->
        </div>
    </div>
@endsection

