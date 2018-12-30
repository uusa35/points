@if($elements->isNotEmpty())
    <div class="portlet light portlet-fit ">
        <div class="portlet-body">
            <div class="mt-element-list">
                <div class="mt-list-head list-default green-haze">
                    <div class="row">
                        <div class="col-xs-8">
                            <div class="list-head-title-container">
                                <h3 class="list-title uppercase sbold">{{ trans('general.list_of_files') }}</h3>
                                <div class="list-date">{{ trans('general.member_since') }} : {{ $element->created_at->diffForHumans() }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-list-container list-default">
                    <div class="mt-list-title uppercase">{{ trans('general.my_files_list') }}</div>
                    <ul>
                        @foreach($elements as $file)
                            <li class="mt-list-item">
                                <div class="list-icon-container done">
                                    <a href="{{ asset(env('FILES').$file->path) }}" target="_blank">
                                        <i class="fa fa-fw fa-file"></i>
                                    </a>
                                </div>
                                <div class="list-datetime">{{ $file->created_at->diffForHumans() }}
                                </div>
                                <div class="list-datetime">
                                    <a data-toggle="modal" href="#" data-target="#basic"
                                       data-title="Delete"
                                       data-content="Are you sure you want to delete image ? "
                                       data-form_id="delete-{{ $file->id }}"
                                       class="btn red uppercase"
                                    >
                                        <i class="fa fa-fw fa-recycle"></i> {{ trans('general.delete') }}</a>
                                    <form method="post" id="delete-{{ $file->id }}"
                                          action="{{ route('backend.file.destroy',$file->id) }}">
                                        @csrf
                                        <input type="hidden" name="_method" value="delete"/>
                                        <button type="submit" class="btn btn-del hidden">
                                            <i class="fa fa-fw fa-times-circle"></i> {{ trans('general.delete') }}
                                        </button>
                                    </form>
                                </div>
                                <div class="list-item-content">
                                    <h3 class="uppercase bold">
                                        <a target="_blank"
                                           href="{{ asset(env('FILES').$file->path) }}">{{ $file->name ? $file->name : null  }}</a>
                                    </h3>
                                    <p>{{ $file->extension ? $file->extension : null }}</p>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@else
    <div class="alert alert-warning">
        {{ trans('general.no_files') }}
    </div>
@endif
