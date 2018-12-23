</br>
<div class="portlet grey-cascade box">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-cogs"></i>{{ trans('general.transactions_history') }}
        </div>
    </div>
    <div class="portlet-body">
        <div class="table-responsive">
            @if($elements->isNotEmpty())
                <table class="table table-hover table-bordered table-striped"
                       id="differentDataTable-{{ rand() }}">
                    <thead>
                    <tr>
                        <th>{{ trans('general.id') }}</th>
                        <th>{{ trans('general.title') }}</th>
                        <th>{{ trans('general.name') }}</th>
                        <th>{{ trans('general.points') }}</th>
                        <th>{{ trans('general.complete') }}</th>
                        <th>{{ trans('general.service') }}</th>
                        <th>{{ trans('general.action') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($elements as $element)
                        <tr>
                            <td>{{ $element->id }}</td>
                            <td>{{ $element->title }}</td>
                            <td>{{ $element->name }}</td>
                            <td>{{ $element->points }}</td>
                            <td>
                                    <span
                                        class="label {{ activeLabel($element->is_complete) }}">{{ activeText($element->is_complete,'Completed') }}</span>
                            </td>
                            <td>{{ $element->service->slug }}</td>
                            <td>{{ $element->client->name }}</td>
                            <td>
                                <div class="btn-group pull-right">
                                    <button type="button"
                                            class="btn green btn-sm btn-outline dropdown-toggle"
                                            data-toggle="dropdown"> {{ trans('general.actions') }}
                                        <i class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li>
                                            <a href="{{ route('backend.order.show',$element->id) }}">
                                                <i class="fa fa-fw fa-eye"></i> {{ trans('general.view') }}
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
                    {{ $elements->render() }}
                @endif
            @else
                <div class="alert alert-info">{{ trans('general.no_orders') }}</div>
            @endif
        </div>
    </div>
</div>
