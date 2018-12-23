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
                        <th>{{ trans('general.reference_id') }}</th>
                        <th>{{ trans('general.is_complete') }}</th>
                        <th>{{ trans('general.action_amount') }}</th>
                        <th>{{ trans('general.payment_plan') }}</th>
                        <th>{{ trans('general.user_id') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($elements as $element)
                        <tr>
                            <td>{{ $element->id }}</td>
                            <td>{{ $element->reference_id }}</td>
                            <td>
                                    <span
                                        class="label {{ activeLabel($element->is_complete) }}">{{ activeText($element->is_complete) }}</span>
                            </td>
                            <td>{{ $element->actual_amount }}</td>
                            <td>{{ $element->payment_plan->name }}</td>
                            <td>{{ $element->user->name }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @if($elements->render())
                    {{ $elements->render() }}
                @endif
            @else
                <div class="alert alert-info">{{ trans('general.no_transactions') }}</div>
            @endif
        </div>
    </div>
</div>
