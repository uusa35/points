@extends('backend.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
        @include('backend.partials.breadcrumbs')
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light ">
                @include('backend.partials.forms.form_title')
                <div class="portlet-body">
                    <div class="m-heading-1 border-green m-bordered">
                        <h3>{{ trans('general.instructions') }}</h3>
                        <p>
                            {{ trans('message.backend_privilege_index_message') }}
                        </p>
                    </div>
                    <table id="dataTable" class="table table-striped table-bordered table-hover" cellspacing="0"
                           width="100%">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>module_name</th>
                            <th>create</th>
                            <th>update</th>
                            <th>delete</th>
                            <th>view</th>
                            <th>roles</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>id</th>
                            <th>module_name</th>
                            <th>create</th>
                            <th>update</th>
                            <th>delete</th>
                            <th>view</th>
                            <th>roles</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($elements as $element)
                            <tr>
                                <td>{{ $element->id }}</td>
                                <td>{{ $element->module_name }}</td>
                                <td>
                                    <span
                                        class="label {{ activeLabel($element->create) }}">{{ activeText($element->create,trans('general.create')) }}</span>
                                </td>
                                <td>
                                    <span
                                        class="label {{ activeLabel($element->update) }}">{{ activeText($element->update,trans('general.update')) }}</span>
                                </td>
                                <td>
                                    <span
                                        class="label {{ activeLabel($element->delete) }}">{{ activeText($element->delete, trans('general.delete')) }}</span>
                                </td>
                                <td>
                                    <span
                                        class="label {{ activeLabel($element->view) }}">{{ activeText($element->view,trans('general.view')) }}</span>

                                </td>
                                <td>
                                    @if($element->roles->isNotEmpty())
                                        <ul>
                                            @foreach($element->roles as $r)
                                                <li>{{ $r->name }}</li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <div class="alert alert-warning">No Roles</div>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group pull-right">
                                        <button type="button" class="btn green btn-sm btn-outline dropdown-toggle"
                                                data-toggle="dropdown"> Actions
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu pull-right" privilege="menu">
                                            <li>
                                                <a href="{{ route('backend.admin.privilege.edit',$element->id) }}">
                                                    <i class="fa fa-fw fa-user"></i>edit</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('backend.admin.activate',['model' => 'privilege','id' => $element->id]) }}">
                                                    <i class="fa fa-fw fa-check-circle"></i> toggle active</a>
                                            </li>
                                            {{--<li>--}}
                                            {{--<form method="post"--}}
                                            {{--action="{{ route('backend.privilege.destroy',$element->id) }}">--}}
                                            {{--{{ csrf_field() }}--}}
                                            {{--<input type="hidden" name="_method" value="delete"/>--}}
                                            {{--<button type="submit" class="btn btn-outline btn-sm red">--}}
                                            {{--<i class="fa fa-remove"></i>delete--}}
                                            {{--</button>--}}
                                            {{--</form>--}}
                                            {{--</li>--}}
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
@endsection