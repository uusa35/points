@extends('backend.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light ">
                @include('backend.partials.forms.form_title')
                <div class="portlet-body">
                    <div class="m-heading-1 border-green m-bordered">
                        <h3>{{ trans('general.notifications') }}</h3>
                        <p> {{ trans('message.backend_notification_index') }}</p>
                    </div>
                    <table id="dataTable" class="table table-striped table-bordered table-hover" cellspacing="0"
                           width="100%">
                        <thead>
                        <tr>
                            <th>{{ trans('general.id') }}</th>
                            <th>{{ trans('general.title') }}</th>
                            <th>{{ trans('general.type') }}</th>
                            <th>{{ trans('general.path') }}</th>
                            <th>{{ trans('general.project') }}</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>{{ trans('general.id') }}</th>
                            <th>{{ trans('general.title') }}</th>
                            <th>{{ trans('general.type') }}</th>
                            <th>{{ trans('general.path') }}</th>
                            <th>{{ trans('general.project') }}</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($elements as $element)
                            <tr>
                                <td>{{ $element->id }}</td>
                                <td>{{ $element->title }}</td>
                                <td>{{ $element->type }}</td>
                                <td>
                                    <a href="{{ asset('storage/uploads/files/'.$element->path) }}"
                                       class="btn btn-info">{{ trans('general.view') }}</a>
                                </td>
                                <td>
                                    @if($element->project)
                                        {{ $element->project->name }}
                                    @else
                                        <span class="label label-warning">N/A</span>
                                    @endif
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