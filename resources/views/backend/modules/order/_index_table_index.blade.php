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
                            <th>{{ trans('general.title') }}</th>
                            <th>{{ trans('general.name') }}</th>
                            <th>{{ trans('general.client') }}</th>
                            <th>{{ trans('general.created_at') }}</th>
                            <th>{{ trans('general.is_paid') }}</th>
                            <th>{{ trans('general.Action') }}</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>{{ trans('general.id') }}</th>
                            <th>{{ trans('general.title') }}</th>
                            <th>{{ trans('general.name') }}</th>
                            <th>{{ trans('general.client') }}</th>
                            <th>{{ trans('general.created_at') }}</th>
                            <th>{{ trans('general.is_paid') }}</th>
                            <th>{{ trans('general.Action') }}</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($elements as $element)
                        <tr>
                            <td>{{ $element->id }}</td>
                            <td>{{ $element->title }}</td>
                            <td>{{ $element->name }}</td>
                            <td>{{ $element->client->name }}</td>
                            <td>{{ $element->created_at->diffForHumans() }}</td>
                            <td>
                                    <span
                                        class="label {{ activeLabel($element->is_paid) }}">{{ activeText($element->is_paid) }}</span>
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
                                        @elsecan('order.update', $element)
                                        @if(!$element->is_complete)
                                        <li>
                                            <a href="{{ route('backend.order.edit',$element->id) }}">
                                                <i class="fa fa-fw fa-edit"></i>{{ trans('general.edit') }}
                                            </a>
                                        </li>
                                        @endif
                                        @endcan
                                        @can('order.view',$element)
                                        <li>
                                            <a href="{{ route('backend.order.show',$element->id) }}">
                                                <i class="fa fa-fw fa-edit"></i>{{ trans('general.view_details') }}
                                            </a>
                                        </li>
                                        @endcan
                                        @can('job.create',$element)
                                        <li>
                                            <a href="{{ route('backend.job.create',['order_id' => $element->id]) }}">
                                                <i class="fa fa-fw fa-edit"></i>{{ trans('general.create_new_job_for_this_order') }}
                                            </a>
                                        </li>
                                        @endcan
                                        @if($element->job)
                                        @can('job.update', $element->job)
                                        <li>
                                            <a href="{{ route('backend.job.edit',$element->job->id) }}">
                                                <i class="fa fa-fw fa-edit"></i>{{ trans('general.edit_current_job') }}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('backend.job.show',$element->job->id) }}">
                                                <i class="fa fa-fw fa-eye-slash"></i>{{ trans('general.view_job') }}
                                            </a>
                                        </li>
                                        @endcan
                                        @endif
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
