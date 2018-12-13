@extends('backend.layouts.app')

@section('content')
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
                            <th>{{ trans('general.start_date') }}</th>
                            <th>{{ trans('general.on_progress') }}</th>
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
                            <th>{{ trans('general.start_date') }}</th>
                            <th>{{ trans('general.on_progress') }}</th>
                            <th>{{ trans('general.Action') }}</th>
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
                                <td>{{ $element->created_at->diffForHumans() }}</td>
                                <td>
                                    <span
                                        class="label {{ activeLabel($element->on_progress) }}">{{ activeText($element->on_progress) }}</span>
                                </td>
                                <td>
                                    <div class="btn-group pull-right">
                                        <button type="button" class="btn green btn-sm btn-outline dropdown-toggle"
                                                data-toggle="dropdown"> {{ trans('general.actions') }}
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu pull-right" role="menu">
                                            @can('client')
                                                <li>
                                                    <a href="{{ route('backend.admin.order.show',$element->id) }}">
                                                        <i class="fa fa-fw fa-edit"></i>{{ trans('general.view_details') }}
                                                    </a>
                                                </li>
                                            @endcan
                                            @if(auth()->user()->isAdmin)
                                                <li>
                                                    <a data-toggle="modal" href="#" data-target="#basic"
                                                       data-title="Delete"
                                                       data-content="Are you sure you want to delete this order ? "
                                                       data-form_id="delete-{{ $element->id }}"
                                                    >
                                                        <i class="fa fa-fw fa-recycle"></i> {{ trans('general.delete') }}
                                                    </a>
                                                    <form method="post" id="delete-{{ $element->id }}"
                                                          action="{{ route('backend.admin.order.destroy',$element->id) }}">
                                                        @csrf
                                                        <input type="hidden" name="_method" value="delete"/>
                                                        <button type="submit" class="btn btn-del hidden">
                                                            <i class="fa fa-fw fa-times-circle"></i> {{ trans('general.delete') }}
                                                        </button>
                                                    </form>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
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
