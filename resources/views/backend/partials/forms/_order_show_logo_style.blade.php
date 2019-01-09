@if($service && $service->show_logo_style)
    <div class="panel panel-default">
        <div class="panel-heading">
            {{ trans('general.logo_style') }}
        </div>
        <div class="panel-body">
            <div class="col-md-4 text-center center-block">
                <div class="col-lg-12 form-logo">
                    <img src="{{ asset('img/apple.jpeg') }}" alt="iphone" class="img-responsive img-sm form-logos center-block">
                </div>
                <div class="form-group">
                    <div class="radio-list">
                        <label class="radio-inline">
                            <input type="radio" name="logo_style" id="optionsRadios1" value="apple"
                                   checked> iphone</label>
                    </div>
                </div>
            </div>

            <div class="col-md-4 text-center center-block">
                <div class="col-lg-12 form-logo">
                    <img src="{{ asset('img/google.jpeg') }}" alt="iphone" class="img-responsive img-sm form-logos center-block">
                </div>
                <div class="form-group">
                    <div class="radio-list">
                        <label class="radio-inline">
                            <input type="radio" name="logo_style" id="optionsRadios1" value="google"
                                   checked> google</label>
                    </div>
                </div>
            </div>

            <div class="col-md-4 text-center center-block">
                <div class="col-lg-12 form-logo">
                    <img src="{{ asset('img/starbucks.jpeg') }}" alt="starbucks" class="img-responsive img-sm form-logos center-block">
                </div>
                <div class="form-group">
                    <div class="radio-list">
                        <label class="radio-inline">
                            <input type="radio" name="logo_style" id="optionsRadios1" value="starbucks"
                                   checked> starbucks</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
