<div class="portlet yellow-crusta box">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-cogs"></i>{{ trans('general.order_details') }}
        </div>
        <div class="actions">
            @if(!$element->job)
                @can('client')
                    <a href="{{ route('backend.client.order.edit') }}" class="btn btn-default btn-sm">
                        <i class="fa fa-pencil"></i> {{ trans('general.edit') }}</a>
                @endcan
            @endif
        </div>
    </div>
    <div class="portlet-body">
        <div class="row static-info">
            <div class="col-md-3 name"> {{ trans('general.order_number') }} #:</div>
            <div class="col-md-7 value"> {{ $element->id }}
                <span class="label label-info label-sm"> {{ trans('general.email_confirmation_was_sent') }}</span>
            </div>
        </div>
        <div class="row static-info">
            <div class="col-md-3 name"> {{ trans('general.name') }}:</div>
            <div class="col-md-7 value"> {{ $element->title }}</div>
        </div>
        <div class="row static-info">
            <div class="col-md-3 name"> {{ trans('general.created_at') }}:</div>
            <div class="col-md-7 value"> {{ $element->created_at->diffForHumans() }}</div>
        </div>
        <div class="row static-info">
            <div class="col-md-3 name"> {{ trans('general.order_status') }}:</div>
            <div class="col-md-7 value">
                <span class="label label-success"> {{ trans('general.'.$element->status) }}</span>
            </div>
        </div>
        @if($element->preferred_colors_1 || $element->preferred_colors_2 || $element->preferred_colors_3)
            <div class="row static-info">
                <div class="col-md-3 name"> {{ trans('general.preferred_colors') }}:</div>
                <div class="col-md-7 value">
                    @if($element->preferred_colors_1)
                        <a class="btn btn-default btn-colors"
                           style="background-color: {{ $element->preferred_colors_1 }};"> {{ $element->preferred_colors_1 }}</a>
                    @endif
                    @if($element->preferred_colors_2)
                        <a class="btn btn-default btn-colors"
                           style="background-color: {{ $element->preferred_colors_2 }};"> {{ $element->preferred_colors_2 }}</a>
                    @endif
                    @if($element->preferred_colors_3)
                        <a class="btn btn-default btn-colors"
                           style="background-color: {{ $element->preferred_colors_3 }};"> {{ $element->preferred_colors_3 }}</a>
                    @endif
                </div>
            </div>
        @endif
        @if($element->unwanted_colors_1 || $element->unwanted_colors_2 || $element->unwanted_colors_3)
            <div class="row static-info">
                <div class="col-md-3 name"> {{ trans('general.unwanted_colors') }}:</div>
                <div class="col-md-7 value">
                    @if($element->unwanted_colors_1)
                        <a class="btn btn-default btn-colors"
                           style="background-color: {{ $element->unwanted_colors_1 }};"> {{ $element->unwanted_colors_1 }}</a>
                    @endif
                    @if($element->unwanted_colors_2)
                        <a class="btn btn-default btn-colors"
                           style="background-color: {{ $element->unwanted_colors_2 }};"> {{ $element->unwanted_colors_2 }}</a>
                    @endif
                    @if($element->unwanted_colors_3)
                        <a class="btn btn-default btn-colors"
                           style="background-color: {{ $element->unwanted_colors_3 }};"> {{ $element->unwanted_colors_3 }}</a>
                    @endif
                </div>
            </div>
        @endif
        <div class="row static-info">
            <div class="col-md-3 name"> {{ trans('general.total_cost') }}</div>
            <div class="col-md-7 value"> {{ trans('general.points') }} {{ $element->points }}</div>
        </div>
        <div class="row static-info">
            <div class="col-md-3 name"> {{ trans('general.service_name') }}:</div>
            <div class="col-md-7 value"> {{ $element->service->slug }}</div>
        </div>
        <div class="row static-info">
            <div class="col-md-3 name"> {{ trans('general.service_caption') }}:</div>
            <div class="col-md-7 value"> {{ $element->service->caption }}</div>
        </div>
        @if($element->facebook)
            <div class="row static-info">
                <div class="col-md-3 name"> {{ trans('general.facebook') }}:</div>
                <div class="col-md-7 value"> {{ $element->facebook }}</div>
            </div>
        @endif
        @if($element->twitter)
            <div class="row static-info">
                <div class="col-md-3 name"> {{ trans('general.twitter') }}:</div>
                <div class="col-md-7 value"> {{ $element->twitter}}</div>
            </div>
        @endif
        @if($element->instagram)
            <div class="row static-info">
                <div class="col-md-3 name"> {{ trans('general.instagram') }}:</div>
                <div class="col-md-7 value"> {{ $element->instagram}}</div>
            </div>
        @endif
        @if($element->youtube)
            <div class="row static-info">
                <div class="col-md-3 name"> {{ trans('general.youtube') }}:</div>
                <div class="col-md-7 value"> {{ $element->youtube}}</div>
            </div>
        @endif
        @if($element->website)
            <div class="row static-info">
                <div class="col-md-3 name"> {{ trans('general.website') }}:</div>
                <div class="col-md-7 value"> {{ $element->website}}</div>
            </div>
        @endif
        @if($element->service->show_logo_style)
            <div class="row static-info">
                <div class="col-md-3 name"> {{ trans('general.show_log_style') }}:</div>
                <div class="col-md-7 value"><img class="img-sm form-logos"
                                                 src="{{ asset('img/'.$element->logo_style.'.jpeg') }}"
                                                 alt="{{ $element->service->slug }}"></div>
            </div>
        @endif

        <div class="row static-info">
            <div class="col-md-3 name"> {{ trans('general.job_order') }}:</div>
            @if($element->job)
                <div class="col-md-7 value">
                    <a href="{{ route("backend.job.show", $element->job->id) }}"
                       class="btn btn-info">{{ trans("general.view_job") }}
                    </a>
                </div>
            @else
                <div class="col-md-7 value">
                    <div class="alert alert-info">{{ trans('general.no_job_created') }}</div>
                </div>
            @endif
        </div>
        @if(!$element->is_complete)
            <div class="row static-info">
                <div class="col-md-3 name"> {{ trans('general.add_more_files') }}:</div>
                <div class="col-md-7 value">
                    <a href="{{ route('backend.file.create',['type' => 'order', 'id' => $element->id]) }}"
                       class="btn btn-info">{{ trans('general.add_more_files') }}</a>
                </div>
            </div>
        @endif
    </div>
</div>
