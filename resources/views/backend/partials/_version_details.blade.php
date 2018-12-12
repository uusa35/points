<div class="portlet grey-cascade box">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-cogs"></i>{{ trans('general.job_versions') }}
        </div>
        <div class="actions">
            @can('designer')
                <a href="{{ route('backend.version.create') }}"
                   class="btn btn-default btn-sm">
                    <i class="fa fa-pencil"></i> {{ trans('general.add_new_version') }} </a>
            @endcan
        </div>
    </div>
    <div class="portlet-body">
        <div class="table-responsive">
            <table class="table table-hover table-bordered table-striped"
                   id="differentDataTable-{{ $element->job->id }}">
                <thead>
                <tr>
                    <th>{{ trans('general.id') }}</th>
                    <th>{{ trans('general.notes') }}</th>
                    <th>{{ trans('general.description') }}</th>
                    <th>{{ trans('general.active') }}</th>
                    <th>{{ trans('general.is_complete') }}</th>
                    <th>{{ trans('general.is_client_viewed') }}</th>
                    <th>{{ trans('general.is_designer_viewed') }}</th>
                    <th>{{ trans('general.job_id') }}</th>
                    <th>{{ trans('general.Action') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($element->job->versions as $v)
                    <tr>
                        <td>{{ $v->id }}</td>
                        <td>{{ $v->notes }}</td>
                        <td>{{ $v->description }}</td>
                        <td>{{ $v->active }}</td>
                        <td>{{ $v->is_complete }}</td>
                        <td>{{ $v->is_client_viewed }}</td>
                        <td>{{ $v->is_designer_viewed }}</td>
                        <td>{{ $v->job->order->name }}</td>
                        <td>
                            <div class="btn-group pull-right">
                                <button type="button"
                                        class="btn green btn-sm btn-outline dropdown-toggle"
                                        data-toggle="dropdown"> {{ trans('general.actions') }}
                                    <i class="fa fa-angle-down"></i>
                                </button>
                                <ul class="dropdown-menu pull-right" role="menu">
                                    @can('designer')
                                        <li>
                                            <a href="{{ route('backend.version.edit',$v->id) }}">
                                                <i class="fa fa-fw fa-user"></i>{{ trans('general.edit') }}
                                            </a>
                                        </li>
                                    @endcan
                                    @can('admin')
                                        <li>
                                            <a href="{{ route('backend.admin.activate',['model' => 'version','id' => $v->id]) }}">
                                                <i class="fa fa-fw fa-check-circle"></i> {{ trans('general.toggle_active') }}
                                            </a>
                                        </li>
                                        <li>
                                            <form method="post"
                                                  action="{{ route('backend.version.destroy',$element->id) }}">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="_method"
                                                       value="delete"/>
                                                <button type="submit"
                                                        class="btn-sm red">
                                                    <i class="fa fa-remove"></i>{{ trans('general.delete') }}
                                                </button>
                                            </form>
                                        </li>
                                    @endcan
                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
