@extends('backend.layouts.app')
@section('content')
    @include('backend.partials.breadcrumbs')
    @include('backend.partials._order_steps')
    <div class="portlet box blue">
        @include('backend.partials.forms.form_title',['title' => trans('general.assign_job_to_designers')])
        <div class="portlet-body form">
            <form method="post" action="{{ route('backend.admin.order.make.assign', $element->id) }}"
                  class="horizontal-form">
                @csrf
                <input type="hidden" name="order_id" value="{{ $element->id }}">
                <div class="form-body">
                    <h3 class="form-section">{{ $element->name }}</h3>
                    <div class="row">
                        <div class="col-lg-12">
                            @if(!$designers->isEmpty())
                                <div class="form-group">
                                    <label class="control-label">designers*</label>
                                    <select multiple="multiple" class="multi-select" id="my_multi_select3"
                                            name="designers[]">
                                        @foreach($designers as $designer)
                                            <option
                                                value="{{ $designer->id }}" {{ in_array($designer->id,$element->job->designers->pluck('id')->toArray(),true) ? 'selected' : null }}>{{ $designer->name }} - {{ $designer->id }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @else
                                <div
                                    class="label label-warning">{{ trans('message.there_is_no_active_designers') }}</div>
                            @endif
                        </div>
                    </div>
                </div>
                @include('backend.partials.forms._btn-group')
            </form>
        </div>
    </div>
@endsection

