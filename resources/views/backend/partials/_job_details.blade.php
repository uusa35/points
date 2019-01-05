<div class="portlet yellow-crusta box">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-cogs"></i>{{ trans('general.job_details') }}
        </div>
        <div class="actions">
            @if($element)
                @can('onlyDesigner')
                    <a href="{{ route('backend.job.edit',$element->id) }}" class="btn btn-default btn-sm">
                        <i class="fa fa-pencil"></i> {{ trans('general.edit') }}</a>
                @endcan
                @can('version.create',$element)
                    <a href="{{ route('backend.version.create',['job_id' => $element->id]) }}"
                       class="btn btn-default btn-sm">
                        <i class="fa fa-pencil"></i> {{ trans('general.create_new_version') }}</a>
                @endcan
            @endif
        </div>
    </div>
    <div class="portlet-body">
        <div class="row static-info">
            <div class="col-md-5 name"> {{ trans('general.job_id') }} #:</div>
            <div class="col-md-7 value"> {{ $element->id }}
                <span class="label label-info label-sm"> {{ trans('general.email_confirmation_was_sent') }}</span>
            </div>
        </div>
        <div class="row static-info">
            <div class="col-md-5 name"> {{ trans('general.job_order_number') }}:</div>
            <div class="col-md-7 value"> {{ $element->order_id }}</div>
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
            <div class="col-md-5 name"> {{ trans('general.job_status') }}:</div>
            <div class="col-md-7 value">
                <span
                    class="label label-{{ $element->is_complete ? 'success' : 'warning'  }}"> {{ activeText($element->is_complete,'Complete') }}</span>
            </div>
        </div>
        <div class="row static-info">
            <div class="col-md-5 name"> {{ trans('general.add_images_or_files') }}:</div>
            <div class="col-md-7 value">
                <a class="btn btn-success"
                   href="{{ route('backend.file.create', ['type' => 'job', 'id' => $element->id]) }}">Add Files /
                    Images</a>
            </div>
        </div>
        <hr>
        <div class="row static-info">
            <div class="col-md-5 name"> {{ trans('general.designers_responsible_for_the_job') }}:</div>
            <div class="col-md-7 value">
                @if($element->designers->isNotEmpty())
                    <ul>
                        @foreach($element->designers as $designer)
                            <li>
                                <span>{{ trans('general.name') }} : {{ $designer->name }} </span>
                                <span>{{ trans('general.designer_id') }} : {{ $designer->id }} </span>
                                <hr>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
</div>
