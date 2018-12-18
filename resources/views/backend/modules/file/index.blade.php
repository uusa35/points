@extends('backend.layouts.app')

@section('content')
    @include('backend.partials.breadcrumbs')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light ">
                @include('backend.partials.forms.form_title')
                <div class="portlet-body">
                    <div class="m-heading-1 border-green m-bordered">
                        <h3>{{ trans('general.instructions') }}</h3>
                        <p>
                            {{ trans('message.backend_order_index_message') }}
                        </p>
                    </div>
                    <table id="dataTable" class="table table-striped table-bordered table-hover" cellspacing="0"
                           width="100%">
                        {{--<table class="table table-striped table-bordered table-hover order-column" id="dataTable">--}}
                        <thead>
                        <tr>
                            <th>{{ trans('general.id') }}</th>
                            <th>{{ trans('general.name_ar') }}</th>
                            <th>{{ trans('general.name_en') }}</th>
                            <th>{{ trans('general.client') }}</th>
                            <th>{{ trans('general.service_name') }}</th>
                            <th>{{ trans('general.category_name') }}</th>
                            <th>{{ trans('general.Action') }}</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>{{ trans('general.id') }}</th>
                            <th>{{ trans('general.name_ar') }}</th>
                            <th>{{ trans('general.name_en') }}</th>
                            <th>{{ trans('general.client') }}</th>
                            <th>{{ trans('general.service_name') }}</th>
                            <th>{{ trans('general.category_name') }}</th>
                            <th>{{ trans('general.view_files') }}</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($elements as $element)
                            <tr>
                                <td>{{ $element->id }}</td>
                                <td>{{ $element->name_ar }}</td>
                                <td>{{ $element->name_en }}</td>
                                <td>{{ $element->client->name }}</td>
                                <td>{{ $element->service->name }}</td>
                                <td>{{ $element->service->category->slug }}</td>
                                <td>
                                    <a href="{{ route('backend.file.show', $element->id) }}" class="btn btn-success">{{ trans('general.view_files') }}</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $elements->render() }}
                </div>
            </div>
        </div>
    </div>
@endsection
