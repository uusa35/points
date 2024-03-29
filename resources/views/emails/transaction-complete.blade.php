@component('mail::message')
    <div style="width : 100%">
        <div style="text-align: {{ app()->isLocale('ar') ? 'right' : 'left' }}">
            {{ trans('general.date') }} : {{ Carbon\Carbon::today()->format('d/m/Y') }}
        </div>

        # {{ trans('general.order_number') }}{{ $element->id }}<br>
        <hr>
        <strong
            style="direction: {{ app()->isLocale('ar') ? 'rtl' : 'ltr' }}; float: {{ app()->isLocale('ar') ? 'right' : 'left' }};"> {{ trans('general.gentlemen') }}
            / {{ $user->name }}</strong><br>
            style="direction: {{ app()->isLocale('ar') ? 'rtl' : 'ltr' }}; float: {{ app()->isLocale('ar') ? 'right' : 'left' }};"> {{ trans('general.mobile') }}
            / {{ $user->mobile }}</strong>
        <br>
        <hr>
        @component('mail::table')
            | {{ trans('general.name') }} |{{ trans('general.price') }} |{{ trans('general.qty') }}
            |{{ trans('general.description') }}  |{{ trans('general.has_bouns') }}  |{{ trans('general.bouns') }}  |
            | -------------:|| -------------:|| -------------:|| -------------:||
            -------------:|-------------:|-------------:|-------------:|
            | {{ $element->payment_plan->name }}|{{ $element->payment_plan->price }}|{{ 1 }}
            |{{ $element->payment_plan->slug }}
            |{{ $element->payment_plan->apply_bouns ? trnas('general.has_bouns') : trans('general.no_bouns') }}
            |{{ $element->payment_plan->apply_bouns ? $element->payment_plan->points : trans('general.no_points') }}|
            | | | | | {{ trans("general.amount_paid") }}        |     {{ $element->payment_plan->price }}        |
            | | | | | {{ trans("general.points_added") }}
            |     {{ $element->payment_plan->apply_bouns ? $element->PriceWithBonus : $element->payment_plan->price }}|
        @endcomponent
        {{--@component('mail::table')--}}
        {{--| Prices       | {{ $element->title }}         | S.  |--}}
        {{--| ------------- |:-------------:| --------:|--}}
        {{--| {{ $element->price }}         |--}}
        {{--<div style="direction: rtl !important;">{!! $element->content !!}</div>           | 1         |--}}
        {{--| {{ $element->total  }}        | total             |           |--}}
        {{--| {{ $element->discount  }}     | discount         |           |--}}
        {{--| {{ $element->net_total  }}    | net total         |           |--}}
        {{--@endcomponent--}}
        {{--</hr>--}}

        @component('mail::panel')
            <div style="font-size: large; font-weight: bold; direction: rtl !important;">
                {!! trans('message.we_received_your_order_order_shall_be_reviewed_thank_your_for_choosing_our_service') !!}
            </div>
        @endcomponent

        @component('mail::button', ['url' => env('APP_URL'),'class' => 'button-black'])
            <strong>{{ env('APP_NAME') }}</strong>
        @endcomponent


        <div style="text-align: center; width: 100%; float: left; font-weight: bolder;">
            {{ trans('general.with_our_regards') }}<br>
            {{ env('APP_NAME') }}
        </div>
    </div>
@endcomponent
