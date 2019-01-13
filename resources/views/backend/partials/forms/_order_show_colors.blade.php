@if($service && $service->show_colors)
    <div class="panel panel-default">
        <div class="panel-heading">
            {{ trans("general.choose_colors_you_prefer_and_unwanted_colors") }}
        </div>
        <div class="panel-body">
            <div class="col-md-4">
                <div class="form-group">
                    <label class=" control-label">{{ trans('general.preffered_colors')}}
                        1</label>
                    <input type="text" id="hue-demo" name="preferred_colors_1"
                           class="form-control demo"
                           data-control="hue" value="{{ old('preferred_colors_1') }}">
                </div>

            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label class=" control-label">{{ trans('general.preffered_colors')}}
                        2</label>
                    <input type="text" id="hue-demo" name="preferred_colors_2"
                           class="form-control demo"
                           data-control="hue" value="{{ old('preferred_colors_2') }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class=" control-label">{{ trans('general.preffered_colors')}}
                        3 </label>

                    <input type="text" id="hue-demo" name="preferred_colors_3"
                           class="form-control demo"
                           data-control="hue" value="{{ old('preferred_colors_3') }}">
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label class=" control-label">{{ trans('general.unwanted_colors') }}
                        1</label>
                    <input type="text" id="hue-demo-1" name="unwanted_colors_1"
                           class="form-control demo"
                           data-control="hue" value="{{ old('unwanted_colors_1') }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class=" control-label">{{ trans('general.unwanted_colors') }}
                        2</label>

                    <input type="text" id="hue-demo-2" name="unwanted_colors_2"
                           class="form-control demo"
                           data-control="hue" value="{{ old('unwanted_colors_2') }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">{{ trans('general.unwatched_colors') }}
                        3</label>
                    <input type="text" id="hue-demo-3" name="unwanted_colors_3"
                           class="form-control demo"
                           data-control="hue" value="{{ old('unwanted_colors_3') }}">
                </div>
            </div>
        </div>
    </div>
@endif
