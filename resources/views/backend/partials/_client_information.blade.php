<div class="portlet blue-hoki box">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-cogs"></i>{{ trans('general.client_information') }}
        </div>
        <div class="actions">
            @if(auth()->user()->id === $element->id)
                <a href="{{ route('backend.user.edit', $element->id) }}" class="btn btn-default btn-sm">
                    <i class="fa fa-pencil"></i> {{ trans('general.edit') }} </a>
            @endif
        </div>

    </div>
    <div class="portlet-body">
        <div class="row static-info">
            <div class="col-md-5 name"> {{ trans('general.name') }}:</div>
            <div class="col-md-7 value"> {{ $element->name  }}</div>
        </div>
        <div class="row static-info">
            <div class="col-md-5 name"> {{ trans('general.email') }}:</div>
            <div class="col-md-7 value"> {{ $element->email }}</div>
        </div>
        <div class="row static-info">
            <div class="col-md-5 name"> {{ trans('general.caption') }}:</div>
            <div class="col-md-7 value"> {{ $element->caption }}</div>
        </div>
        <div class="row static-info">
            <div class="col-md-5 name"> {{ trans('general.phone') }}:</div>
            <div class="col-md-7 value"> {{ $element->phone }}</div>
        </div>
        <div class="row static-info">
            <div class="col-md-5 name"> {{ trans('general.mobile') }}:</div>
            <div class="col-md-7 value"> {{ $element->mobile }}</div>
        </div>
    </div>
</div>
