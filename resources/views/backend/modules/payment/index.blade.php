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
                            {{ trans('message.backend_payment_index_message') }}
                        </p>
                    </div>
                    <table id="dataTable" class="table table-striped table-bordered table-hover" cellspacing="0"
                           width="100%">
                        <thead>
                        <tr>
                            <th>{{ trans('general.id') }}</th>
                            <th>{{ trans('general.reference_no') }}</th>
                            <th>{{ trans('general.name_ar') }}</th>
                            <th>{{ trans('general.path') }}</th>
                            <th>{{ trans('general.amount') }}</th>
                            <th>{{ trans('general.due_date') }}</th>
                            <th>{{ trans('general.date_received') }}</th>
                            <th>{{ trans('general.project_name') }}</th>
                            <th>{{ trans('general.active') }}</th>
                            <th>{{ trans('general.actions') }}</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>{{ trans('general.id') }}</th>
                            <th>{{ trans('general.reference_no') }}</th>
                            <th>{{ trans('general.name_ar') }}</th>
                            <th>{{ trans('general.path') }}</th>
                            <th>{{ trans('general.amount') }}</th>
                            <th>{{ trans('general.due_date') }}</th>
                            <th>{{ trans('general.date_received') }}</th>
                            <th>{{ trans('general.project_name') }}</th>
                            <th>{{ trans('general.active') }}</th>
                            <th>{{ trans('general.actions') }}</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($elements as $element)
                            <tr>
                                <td>{{ $element->id }}</td>
                                <td>{{ $element->reference_no }}</td>
                                <td>{{ $element->name_ar }}</td>
                                <td>
                                    <a href="{{ asset('storage/uploads/files/'.$element->path) }}" class="btn btn-info">{{ trans('general.view') }}</a>
                                </td>
                                <td>{{ $element->amount }}</td>
                                <td> {{ $element->due_date->format('d-m-Y') }}</td>
                                <td> {{ $element->date_received->format('d-m-Y') }}</td>
                                <td>
                                    {{ $element->project->name }}
                                </td>
                                <td>
                                    <span class="label {{ activeLabel($element->active) }}">{{ activeText($element->active) }}</span>
                                </td>
                                <td>
                                    <div class="btn-group pull-right">
                                        <button type="button" class="btn green btn-sm btn-outline dropdown-toggle"
                                                data-toggle="dropdown"> Actions
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu pull-right" role="menu">
                                            <li>
                                                <a href="{{ route('backend.project.index',['user_id' => $element->project->user_id]) }}">
                                                    <i class="fa fa-fw fa-edit"></i>View Project</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('backend.payment.edit',$element->id) }}">
                                                    <i class="fa fa-fw fa-edit"></i>edit</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('backend.activate',['model' => 'payment','id' => $element->id]) }}">
                                                    <i class="fa fa-fw fa-xs fa-check-circle"></i> toggle active</a>
                                            </li>
                                            <li>
                                                <a data-toggle="modal" href="#" data-target="#basic"
                                                   data-title="Delete"
                                                   data-content="Are you sure you want to delete this payment ? "
                                                   data-form_id="delete-{{ $element->id }}"
                                                >
                                                    <i class="fa fa-fw fa-recycle"></i> delete</a>
                                                <form method="post" id="delete-{{ $element->id }}"
                                                      action="{{ route('backend.payment.destroy',$element->id) }}">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="delete"/>
                                                    <button type="submit" class="btn btn-del hidden">
                                                        <i class="fa fa-fw fa-times-circle"></i> delete
                                                    </button>
                                                </form>
                                            </li>
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