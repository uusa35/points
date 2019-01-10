<div class="portlet yellow-crusta box">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-cogs"></i>{{ trans('general.version_details') }}
        </div>
        <div class="actions">
            @if($element)
                @can('version.edit', $element->id)
                    <a href="{{ route('backend.version.edit',$element->id) }}" class="btn btn-default btn-sm">
                        <i class="fa fa-pencil"></i> {{ trans('general.edit') }}</a>
                @endcan
                @can('version.create',$element->job)
                    <a href="{{ route('backend.version.create',['job_id' => $element->job->id]) }}"
                       class="btn btn-default btn-sm">
                        <i class="fa fa-pencil"></i> {{ trans('general.create_new_version') }}</a>
                @endcan
            @endif
        </div>
    </div>
    <div class="portlet-body">
        <div class="row static-info">
            <div class="col-md-5 name"> {{ trans('general.version_id') }} #:</div>
            <div class="col-md-7 value"> {{ $element->id }}
                <span class="label label-info label-sm"> {{ trans('general.email_confirmation_was_sent') }}</span>
            </div>
        </div>
        <div class="row static-info">
            <div class="col-md-5 name"> {{ trans('general.version_order_number') }}:</div>
            <div class="col-md-7 value"> {{ $element->job->order->id }}</div>
        </div>
        <div class="row static-info">
            <div class="col-md-5 name"> {{ trans('general.description') }}:</div>
            <div class="col-md-7 value"> {{ $element->description }}</div>
        </div>
        <div class="row static-info">
            <div class="col-md-5 name"> {{ trans('general.notes') }}:</div>
            <div class="col-md-7 value"> {{ $element->notes }}</div>
        </div>
        <div class="row static-info">
            <div class="col-md-5 name"> {{ trans('general.created_at') }}:</div>
            <div class="col-md-7 value"> {{ $element->created_at->diffForHumans() }}</div>
        </div>
        <div class="row static-info">
            <div class="col-md-5 name"> {{ trans('general.job') }}:</div>
            <div class="col-md-7 value">
                <a href="{{ route('backend.job.show', $element->job_id) }}" class="btn btn-info">{{ trans('general.back_to_job') }}</a>
            </div>
        </div>
        <div class="row static-info">
            <div class="col-md-5 name"> {{ trans('general.version_status') }}:</div>
            <div class="col-md-7 value">
                <span
                    class="label label-{{ $element->is_complete ? 'success' : 'warning'  }}"> {{ activeText($element->is_complete,'Complete') }}</span>
            </div>
        </div>
        @if(!$element->is_complete)
            <div class="row static-info">
                <div class="col-md-5 name"> {{ trans('general.add_images_or_files') }}:</div>
                <div class="col-md-7 value">
                    <a class="btn btn-success"
                       href="{{ route('backend.file.create', ['type' => 'version', 'id' => $element->id]) }}">{{ trans('general.add_more_files') }}</a>
                </div>
            </div>
        @endif
    </div>
</div>
