<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="portlet grey-cascade box">
            <div class="portlet-title">
                <div class="caption">
                    @include('backend.partials.forms.form_title',['title' => $title ])
                </div>
                <div class="actions">
                    {{--<a href="{{ route('backend.version.create') }}"--}}
                    {{--class="btn btn-default btn-sm">--}}
                    {{--<i class="fa fa-pencil"></i> {{ trans('general.add_new_version') }} </a>--}}
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered table-striped"
                           id="moreDataTable-{{ rand() }}"
                    >
                        <thead>
                        <tr>
                            <th>{{ trans('general.id') }}</th>
                            <th>{{ trans('general.name') }}</th>
                            <th>{{ trans('general.role') }}</th>
                            <th>{{ trans('general.active') }}</th>
                            <th>{{ trans('general.action') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($elements as $element)
                            <tr>
                                <td>{{ $element->id }}</td>
                                <td>{{ $element->name }}</td>
                                <td>{{ $element->role->slug }}</td>
                                <td>
                                    <span
                                        class="label {{ activeLabel($element->active) }}">{{ activeText($element->active) }}
                                    </span>
                                </td>
                                <td>
                                    <div class="btn-group pull-right">
                                        <button type="button"
                                                class="btn green btn-sm btn-outline dropdown-toggle"
                                                data-toggle="dropdown"> {{ trans('general.actions') }}
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu pull-right" role="menu">
                                            <li>
                                                <a href="{{ route('backend.user.show',$element->id) }}">
                                                    <i class="fa fa-fw fa-eye"></i>{{ trans('general.profile') }}
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @if($elements->render())
                        {{  $elements->render() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
