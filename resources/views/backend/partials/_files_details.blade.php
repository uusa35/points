<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="portlet grey-cascade box">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>{{ trans('general.files') }}
                </div>
                <div class="actions">
                    @can('file.create', $element->user)
                        <a href="{{ route('backend.file.create') }}"
                           class="btn btn-default btn-sm">
                            <i class="fa fa-pencil"></i> {{ trans('general.add_new_file') }} </a>
                    @endcan
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered table-striped"
                           id="differentDataTable-{{ rand() }}">
                        <thead>
                        <tr>
                            <th>{{ trans('general.id') }}</th>
                            <th>{{ trans('general.file') }}</th>
                            <th>{{ trans('general.notes') }}</th>
                            <th>{{ trans('general.name') }}</th>
                            <th>{{ trans('general.caption') }}</th>
                            <th>{{ trans('general.type') }}</th>
                            <th>{{ trans('general.user') }}</th>
                            <th>{{ trans('general.Action') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($elements as $element)
                            <tr>
                                <td>{{ $element->id }}</td>
                                <td>
                                    <a class="btn btn-info" href="{{ asset(env('FILES').$element->path) }}">{{ trans('general.view') }}</a>
                                </td>
                                <td>{{ $element->notes }}</td>
                                <td>{{ $element->name }}</td>
                                <td>{{ $element->caption }}</td>
                                <td>{{ $element->imagable_type }}</td>
                                <td>{{ $element->user->name }}</td>
                                <td>
                                    <div class="btn-group pull-right">
                                        <button type="button"
                                                class="btn green btn-sm btn-outline dropdown-toggle"
                                                data-toggle="dropdown"> {{ trans('general.actions') }}
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu pull-right" role="menu">
                                            @can('onlySuper')
                                                <li>
                                                    <a href="{{ route('backend.admin.activate',['model' => 'file','id' => $element->id]) }}">
                                                        <i class="fa fa-fw fa-check-circle"></i> {{ trans('general.toggle_active') }}
                                                    </a>
                                                </li>
                                            @endcan
                                            @can('file.delete', $element)
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
    </div>
</div>
