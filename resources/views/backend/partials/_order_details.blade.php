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
            <div class="col-md-5 name"> {{ trans('general.order_number') }} #:</div>
            <div class="col-md-7 value"> {{ $element->id }}
                <span class="label label-info label-sm"> {{ trans('general.email_confirmation_was_sent') }}</span>
            </div>
        </div>
        <div class="row static-info">
            <div class="col-md-5 name"> {{ trans('general.name') }}:</div>
            <div class="col-md-7 value"> {{ $element->name }}</div>
        </div>
        <div class="row static-info">
            <div class="col-md-5 name"> {{ trans('general.created_at') }}:</div>
            <div class="col-md-7 value"> {{ $element->created_at->diffForHumans() }}</div>
        </div>
        <div class="row static-info">
            <div class="col-md-5 name"> {{ trans('general.order_status') }}:</div>
            <div class="col-md-7 value">
                <span class="label label-success"> {{ trans('general.'.$element->status) }}</span>
            </div>
        </div>
        <div class="row static-info">
            <div class="col-md-5 name"> {{ trans('general.total_cost') }}</div>
            <div class="col-md-7 value"> {{ trans('general.points') }} {{ $element->points }}</div>
        </div>
        <div class="row static-info">
            <div class="col-md-5 name"> {{ trans('general.service_name') }}:</div>
            <div class="col-md-7 value"> {{ $element->service->slug }}</div>
        </div>
        <div class="row static-info">
            <div class="col-md-5 name"> {{ trans('general.service_caption') }}:</div>
            <div class="col-md-7 value"> {{ $element->service->caption }}</div>
        </div>

        <div class="row static-info">
            <div class="col-md-5 name"> {{ trans('general.job_order') }}:</div>
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
        <div class="row static-info">
            <div class="col-md-5 name"> {{ trans('general.add_more_files') }}:</div>
            <div class="col-md-7 value">
                <a href="{{ route('backend.file.create',['type' => 'order', 'id' => $element->id]) }}"
                   class="btn btn-info">{{ trans('general.add_more_files') }}</a>
            </div>
        </div>
    </div>
</div>
