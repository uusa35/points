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
                            {{ trans('message.backend_project_index_message') }}
                        </p>
                    </div>
                    <table id="dataTable" class="table table-striped table-bordered table-hover" cellspacing="0"
                           width="100%">
                        <thead>
                        <tr>
                            <th>{{ trans('general.id') }}</th>
                            <th>{{ trans('general.reference_id') }}</th>
                            <th>{{ trans('general.name_ar') }}</th>
                            <th>{{ trans('general.name_en') }}</th>
                            <th>{{ trans('general.ip_cam_url') }}</th>
                            <th>{{ trans('general.image') }}</th>
                            <th>{{ trans('general.client') }}</th>
                            {{--<th>{{ trans('general.category') }}</th>--}}
                            {{--<th>{{ trans('general.start_date') }}</th>--}}
                            <th>{{ trans('general.end_date') }}</th>
                            <th>{{ trans('general.active') }}</th>
                            <th>{{ trans('general.Action') }}</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>{{ trans('general.id') }}</th>
                            <th>{{ trans('general.reference_id') }}</th>
                            <th>{{ trans('general.name_ar') }}</th>
                            <th>{{ trans('general.name_en') }}</th>
                            <th>{{ trans('general.ip_cam_url') }}</th>
                            <th>{{ trans('general.image') }}</th>
                            <th>{{ trans('general.client') }}</th>
                            {{--<th>{{ trans('general.category') }}</th>--}}
                            {{--<th>{{ trans('general.start_date') }}</th>--}}
                            <th>{{ trans('general.end_date') }}</th>
                            <th>{{ trans('general.active') }}</th>
                            <th>{{ trans('general.Action') }}</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($elements as $element)
                            <tr>
                                <td>{{ $element->id }}</td>
                                <td>{{ $element->reference_id }}</td>
                                <td>{{ $element->name_ar }}</td>
                                <td>{{ $element->name_en }}</td>
                                <td>
                                    @if($element->ip_cam_url)
                                        <a href="{{ $element->ip_cam_url }}" class="btn btn-default">
                                            {{ trans('general.view_cam_url') }}
                                        </a>
                                    @else
                                        <span class="label label-danger">No Cam</span>
                                    @endif

                                </td>
                                <td><img src="{{ asset('storage/uploads/images/thumbnail/'.$element->image) }}"
                                         class="img-xs" alt="">
                                </td>
                                <td>{{ $element->client->name }}</td>
                                {{--<td>--}}
                                    {{--@if(!$element->categories->isEmpty())--}}
                                        {{--<ul>--}}
                                            {{--@foreach($element->categories as $cat)--}}
                                                {{--@if(!$cat->children->isEmpty())--}}
                                                    {{--<li>--}}
                                                        {{--<span class="label label-sm label-{{ $cat->parent_id === 0  ? 'danger' : 'info' }}">{{ $cat->name }}</span>--}}
                                                    {{--</li>--}}
                                                {{--@else--}}
                                                    {{--<li style="padding-left: 10px;">{{ $cat->name }}</li>--}}
                                                {{--@endif--}}
                                            {{--@endforeach--}}
                                        {{--</ul>--}}
                                    {{--@else--}}
                                        {{--<span class="label label-danger">No Categories</span>--}}
                                    {{--@endif--}}
                                {{--</td>--}}
                                {{--<td>{{ $element->start_date->format('y-m-d') }}</td>--}}
                                <td>{{ $element->end_date->format('y-m-d') }}</td>
                                <td>
                                    <span class="label {{ activeLabel($element->active) }}">{{ activeText($element->active) }}</span>
                                </td>
                                <td>
                                    <div class="btn-group pull-right">
                                        <button type="button" class="btn green btn-sm btn-outline dropdown-toggle"
                                                data-toggle="dropdown"> {{ trans('general.actions') }}
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu pull-right" role="menu">
                                            <li>
                                                <a href="{{ route('backend.project.show',$element->id) }}">
                                                    <i class="fa fa-fw fa-edit"></i>{{ trans('general.view_details') }}</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('backend.project.edit',$element->id) }}">
                                                    <i class="fa fa-fw fa-edit"></i>{{ trans('general.edit') }}</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('backend.activate',['model' => 'project','id' => $element->id]) }}">
                                                    <i class="fa fa-fw fa-xs fa-check-circle"></i> {{ trans('general.toggle_active') }}</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('backend.report.index',['project_id' => $element->id]) }}">
                                                    <i class="fa fa-fw fa-pencil-square"></i> {{ trans('general.reports') }}</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('backend.phase.index',['project_id' => $element->id]) }}">
                                                    <i class="icon-layers"></i> {{ trans('general.phases') }}</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('backend.timeline.index',['project_id' => $element->id]) }}">
                                                    <i class="icon-layers"></i> {{ trans('general.timeline') }}</a>
                                            </li>
                                            {{--@if($element->galleries->isEmpty())--}}
                                            <li>
                                                <a href="{{ route('backend.gallery.create',['id' => $element->id, 'type' => 'project' , 'element_id' => $element->id]) }}"
                                                   target="_blank">
                                                    <i class="fa fa-fw fa-plus-square-o"></i> {{ trans('general.create_Gallery') }}</a>
                                            </li>
                                            {{--@else--}}
                                            <li>
                                                <a href="{{ route('backend.gallery.index',['type' => 'project', 'element_id' => $element->id ,'project_id' => $element->id]) }}">
                                                    <i class="fa fa-fw fa-image"></i> {{ trans('general.galleries') }}</a>
                                            </li>
                                            {{--@endif--}}
                                            <li>
                                                <a href="{{ route('backend.drawing.index',['project_id' => $element->id]) }}">
                                                    <i class="fa fa-fw fa-hacker-news"></i> {{ trans('general.drawings') }}</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('backend.document.index',['project_id' => $element->id]) }}">
                                                    <i class="fa fa-fw fa-paper-plane"></i> {{ trans('general.documents') }}</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('backend.payment.index',['project_id' => $element->id]) }}">
                                                    <i class="fa fa-fw fa-credit-card"></i> {{ trans('general.payments') }}</a>
                                            </li>
                                            <li>
                                                <a data-toggle="modal" href="#" data-target="#basic"
                                                   data-title="Delete"
                                                   data-content="Are you sure you want to delete this project ? "
                                                   data-form_id="delete-{{ $element->id }}"
                                                >
                                                    <i class="fa fa-fw fa-recycle"></i> {{ trans('general.delete') }}</a>
                                                <form method="post" id="delete-{{ $element->id }}"
                                                      action="{{ route('backend.project.destroy',$element->id) }}">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="delete"/>
                                                    <button type="submit" class="btn btn-del hidden">
                                                        <i class="fa fa-fw fa-times-circle"></i> {{ trans('general.delete') }}
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