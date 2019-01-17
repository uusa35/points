@extends('backend.layouts.app')

@section('content')
    @if($elements->isNotEmpty())
        @include('backend.partials.breadcrumbs')
        <div class="row">
            <div class="col-md-12">
            @can('onlyClient')
                @include('backend.partials._order_statistics')
            @endcan
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light ">
                    @include('backend.partials.forms.form_title')
                    <div class="portlet-body">
                        <div class="m-heading-1 border-green m-bordered">
                            <h3>{{ trans('general.instructions') }}</h3>
                            <p>
                                {!! trans('message.order_index_message') !!}
                            </p>
                        </div>
                        <table id="dataTable" class="table table-striped table-bordered table-hover" cellspacing="0"
                               width="100%">
                            {{--<table class="table table-striped table-bordered table-hover order-column" id="dataTable">--}}
                            <thead>
                            <tr>
                                <th>{{ trans('general.id') }}</th>
                                <th>{{ trans('general.title') }}</th>
                                <th>{{ trans('general.service_name') }}</th>
                                <th>{{ trans('general.category_name') }}</th>
                                <th>{{ trans('general.created_at') }}</th>
                                <th>{{ trans('general.is_complete') }}</th>
                                <th>{{ trans('general.view_order') }}</th>
                                <th>{{ trans('general.view_job') }}</th>
                                <th>{{ trans('general.view_last_version') }}</th>
                                <th>{{ trans('general.designers') }}</th>
                                <th>{{ trans('general.Action') }}</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>{{ trans('general.id') }}</th>
                                <th>{{ trans('general.title') }}</th>
                                <th>{{ trans('general.service_name') }}</th>
                                <th>{{ trans('general.category_name') }}</th>
                                <th>{{ trans('general.created_at') }}</th>
                                <th>{{ trans('general.is_complete') }}</th>
                                <th>{{ trans('general.view_order') }}</th>
                                <th>{{ trans('general.view_job') }}</th>
                                <th>{{ trans('general.view_last_version') }}</th>
                                <th>{{ trans('general.designers') }}</th>
                                <th>{{ trans('general.Action') }}</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($elements as $element)
                                <tr>
                                    <td>{{ $element->id }}</td>
                                    <td>{{ str_limit($element->title,15) }}</td>
                                    <td>{{ str_limit($element->service->name,15) }}</td>
                                    <td>{{ str_limit($element->service->category->slug,15) }}</td>
                                    <td>{{ $element->created_at->diffForHumans() }}</td>
                                    <td>
                                    <span
                                        class="label {{ activeLabel($element->is_complete) }}">{{ activeText($element->is_complete) }}</span>
                                    </td>
                                    <td>
                                        <a class="btn btn-warning"
                                           href="{{ route("backend.order.show", $element->id) }}"><i
                                                class="fa fa-fw fa-eye"></i></a>
                                    </td>
                                    <td>
                                        @if($element->job)
                                            @can('job.view', $element->job)
                                                <a class="btn btn-info"
                                                   href="{{ route("backend.job.show", $element->id) }}"><i
                                                        class="fa fa-fw fa-eye"></i></a>
                                            @else
                                                <div class="alert alert-danger">
                                                    {{ trans('general.you_not_enrolled_in_job') }}
                                                </div>
                                            @endcan
                                        @endif
                                    </td>
                                    <td>
                                        @if($element->job && $element->job->versions->isNotEmpty())
                                            @can('job.view', $element->job)
                                                <a class="btn btn-info"
                                                   href="{{ route("backend.version.show", $element->job->versions->last()->id) }}"><i
                                                        class="fa fa-fw fa-eye"></i></a>
                                            @else
                                                <div class="alert alert-danger">
                                                    {{ trans('general.you_not_enrolled_in_job') }}
                                                </div>
                                            @endcan
                                        @else
                                            <div class="alert alert-danger">
                                                {{ trans('general.no_versions_yet') }}
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        @if($element->job->designers->isNotEmpty())
                                            <ul>
                                                @foreach($element->job->designers as $designer)
                                                    <li>{{ $designer->name }}</li>
                                                @endforeach
                                            </ul>
                                        @else
                                            <span class="label label-warning"></span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group pull-right">
                                            <button type="button" class="btn green btn-sm btn-outline dropdown-toggle"
                                                    data-toggle="dropdown"> {{ trans('general.actions') }}
                                                <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu pull-right" role="menu">
                                                @can('isAdmin')
                                                    <li>
                                                        <a href="{{ route('backend.admin.order.show',$element->id) }}">
                                                            <i class="fa fa-fw fa-edit"></i>{{ trans('general.view_details') }}
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('backend.admin.order.assign',$element->id) }}">
                                                            <i class="fa fa-fw fa-user-plus"></i>{{ trans('general.assign_this_job_to_designers') }}
                                                        </a>
                                                    </li>
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
                                                @endcan
                                                @can('order.view',$element)
                                                    <li>
                                                        <a href="{{ route('backend.order.show',$element->id) }}">
                                                            <i class="fa fa-fw fa-edit"></i>{{ trans('general.view_details') }}
                                                        </a>
                                                    </li>
                                                    @if(!$element->is_complete)
                                                        <li>
                                                            <a href="{{ route('backend.order.edit',$element->id) }}">
                                                                <i class="fa fa-fw fa-edit"></i>{{ trans('general.edit') }}
                                                            </a>
                                                        </li>
                                                    @endif
                                                @endcan
                                                @can('job.create',$element)
                                                    <li>
                                                        <a href="{{ route('backend.job.create',['order_id' => $element->id]) }}">
                                                            <i class="fa fa-fw fa-edit"></i>{{ trans('general.create_new_job_for_this_order') }}
                                                        </a>
                                                    </li>
                                                @endcan
                                                @if($settings->auto_enrollment)
                                                    <li>
                                                        <a href="{{ route('backend.job.enroll',$element->job->id) }}">
                                                            <i class="fa fa-fw fa-edit"></i>{{ trans('general.toggle_enroll') }}
                                                        </a>
                                                    </li>
                                                @endif
                                                @can('job.update', $element->job)
                                                    <li>
                                                        <a href="{{ route('backend.job.edit',$element->job->id) }}">
                                                            <i class="fa fa-fw fa-edit"></i>{{ trans('general.edit_current_job') }}
                                                        </a>
                                                    </li>
                                                @endcan
                                                @can('job.view', $element->job)
                                                    <li>
                                                        <a href="{{ route('backend.job.show',$element->job->id) }}">
                                                            <i class="fa fa-fw fa-eye"></i>{{ trans('general.view_job') }}
                                                        </a>
                                                    </li>
                                                @endcan
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
    @else
        <div class="alert alert-danger">{{ trans('message.no_orders') }}</div>
    @endif
@endsection
