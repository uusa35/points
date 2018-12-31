@extends('backend.layouts.app')
@section('content')
    @include('backend.partials.breadcrumbs')
    @include('backend.partials._order_steps')
    <div class="portlet box blue">
        @include('backend.partials.forms.form_title')
        <div class="portlet-body form">
            <form class="horizontal-form" role="form" method="POST" action="{{ route('backend.order.store') }}"
                  enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="service_id" value="{{ session()->get('service_id') }}">
                <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                <div class="form-body">
                    @if(session()->get('order_lang') == 'ar')
                        @include('backend.modules.order._order_create_ar')
                    @elseif(session()->get('order_lang') == 'en')
                        @include('backend.modules.order._order_create_ar')
                    @else
                        @include('backend.modules.order._order_create_both')
                    @endif
                </div>
            </form>
        </div>
    </div>
@endsection

