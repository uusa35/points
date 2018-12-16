@extends('backend.layouts.app')
@section('content')
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
                                <label class="control-label">phone</label>
                                <input type="text" id="phone" name="phone" class="form-control" placeholder="phone"
                                       value="{{ $element->phone }}">
                                <span class="help-block"> phone </span>
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">email</label>
                                <input type="text" id="email" name="email" class="form-control" placeholder="email"
                                       value="{{ $element->email }}">
                                <span class="help-block"> email </span>
                            </div>
                        </div>
                        <!--/span-->
                    </div>

                    <div class="row">
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
                                <label class="control-label">description_ar</label>
                                <input type="text" id="description_ar" name="description_ar" class="form-control"
                                       placeholder="description_ar"
                                       value="{{ $element->description_ar }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">description_en</label>
                                <input type="text" id="description_en" name="description_en" class="form-control"
                                       placeholder="description_en"
                                       value="{{ $element->description_en }}">
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
                                <label class="control-label">google_map_url</label>
                                <input type="text" id="google_map_url" name="google_map_url" class="form-control"
                                       placeholder="google_map_url"
                                       value="{{ $element->google_map_url }}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="control-label">facebook_url</label>
                                <input type="text" id="facebook_url" name="facebook_url" class="form-control"
                                       placeholder="facebook_url"
                                       value="{{ $element->facebook_url }}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="control-label">twitter_url</label>
                                <input type="text" id="twitter_url" name="twitter_url" class="form-control"
                                       placeholder="twitter_url"
                                       value="{{ $element->twitter_url }}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="control-label">instagram_url</label>
                                <input type="text" id="instagram_url" name="instagram_url" class="form-control"
                                       placeholder="instagram_url"
                                       value="{{ $element->instagram_url }}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="control-label">google_url</label>
                                <input type="text" id="google_url" name="google_url" class="form-control"
                                       placeholder="google_url"
                                       value="{{ $element->google_url }}">
                                <span class="help-block"> google_url </span>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="control-label">youtube_url</label>
                                <input type="text" id="youtube_url" name="youtube_url" class="form-control"
                                       placeholder="youtube_url"
                                       value="{{ $element->youtube_url }}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="control-label">linkin_url</label>
                                <input type="text" id="linkin_url" name="linkin_url" class="form-control"
                                       placeholder="linkin_url"
                                       value="{{ $element->linkin_url }}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="control-label">site_url</label>
                                <input type="text" id="site_url" name="site_url" class="form-control"
                                       placeholder="site_url"
                                       value="{{ $element->site_url }}">
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
                            <!--/span-->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="file" class="form-control" name="logo" placeholder="logo">
                                    <label for="form_control_1">logo Image - ['500', '500']</label>
                                    <div class="help-block text-left">
                                        W * H - Best fit 500 x 500 pixels
                                    </div>
                                    <img src="{{ asset('storage/uploads/images/thumbnail/'.$element->logo) }}" alt=""
                                         class="img-sm">
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
                                         class="img-sm">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="file" class="form-control" name="path" placeholder="path">
                                    <label for="form_control_1">path </label>
                                    <div class="help-block text-left">
                                        pdf Only
                                    </div>
                                    <img src="{{ asset('storage/uploads/images/thumbnail/'.$element->path) }}" alt=""
                                         class="img-sm">
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

