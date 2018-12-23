<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="portlet grey-cascade box">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>{{ trans('general.job_versions') }}
                </div>
                <div class="actions">
                    @if(auth()->user()->isDesignerOrAbove)
                        <a href="{{ route('backend.version.create') }}"
                           class="btn btn-default btn-sm">
                            <i class="fa fa-pencil"></i> {{ trans('general.add_new_version') }} </a>
                    @endif
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered table-striped"
                           id="differentDataTable-{{ rand() }}">
                        <thead>
                        <tr>
                            <th>{{ trans('general.id') }}</th>
                            <th>{{ trans('general.notes') }}</th>
                            <th>{{ trans('general.description') }}</th>
                            <th>{{ trans('general.active') }}</th>
                            <th>{{ trans('general.is_complete') }}</th>
                            {{--<th>{{ trans('general.is_client_viewed') }}</th>--}}
                            {{--<th>{{ trans('general.is_designer_viewed') }}</th>--}}
                            <th>{{ trans('general.job_id') }}</th>
                            <th>{{ trans('general.Action') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($elements as $element)
                            <tr>
                                <td>{{ $element->id }}</td>
                                <td>{{ $element->notes }}</td>
                                <td>{{ $element->description }}</td>
                                <td>{{ $element->active }}</td>
                                <td>{{ $element->is_complete }}</td>
                                {{--<td>{{ $element->is_client_viewed }}</td>--}}
                                {{--<td>{{ $element->is_designer_viewed }}</td>--}}
                                <td>{{ $element->job->order->name }}</td>
                                <td>
                                    <div class="btn-group pull-right">
                                        <button type="button"
                                                class="btn green btn-sm btn-outline dropdown-toggle"
                                                data-toggle="dropdown"> {{ trans('general.actions') }}
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu pull-right" role="menu">
                                            <li>
                                                <a href="{{ route('backend.version.show',$element->id) }}">
                                                    <i class="fa fa-fw fa-eye"></i>{{ trans('general.show') }}
                                                </a>
                                            </li>
                                            @can('isDesigner')
                                                <li>
                                                    <a href="{{ route('backend.version.edit',$element->id) }}">
                                                        <i class="fa fa-fw fa-user"></i>{{ trans('general.edit') }}
                                                    </a>
                                                </li>
                                            @endcan
                                            @can('onlyAdmin')
                                                {{--<li>--}}
                                                    {{--<a href="{{ route('backend.admin.activate',['model' => 'version','id' => $element->id]) }}">--}}
                                                        {{--<i class="fa fa-fw fa-check-circle"></i> {{ trans('general.toggle_active') }}--}}
                                                    {{--</a>--}}
                                                {{--</li>--}}
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
