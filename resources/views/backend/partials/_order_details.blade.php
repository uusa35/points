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
            <div class="col-md-5 name"> {{ trans('general.created_at') }}:</div>
            <div class="col-md-7 value"> {{ $element->created_at->diffForHumans() }}</div>
        </div>
        <div class="row static-info">
            <div class="col-md-5 name"> {{ trans('general.order_status') }}:</div>
            <div class="col-md-7 value">
                <span class="label label-warning"> {{ trans('general.'.$element->status) }}</span>
            </div>
        </div>
        <div class="row static-info">
            <div class="col-md-5 name"> {{ trans('general.grand_total') }}</div>
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
    </div>
</div>
