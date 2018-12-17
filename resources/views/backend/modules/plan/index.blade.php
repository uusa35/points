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
                            {{ trans('message.backend_role_index_message') }}
                        </p>
                    </div>
                    <table id="dataTable" class="table table-striped table-bordered table-hover" cellspacing="0"
                           width="100%">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>name</th>
                            <th>slug_ar</th>
                            <th>slug_en</th>
                            <th>is_admin</th>
                            <th>is_client</th>
                            <th>is_designer</th>
                            <th>visible</th>
                            <th>active</th>
                            <th>color</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>id</th>
                            <th>name</th>
                            <th>slug_ar</th>
                            <th>slug_en</th>
                            <th>is_admin</th>
                            <th>is_client</th>
                            <th>is_designer</th>
                            <th>visible</th>
                            <th>active</th>
                            <th>color</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($elements as $element)
                            <tr>
                                <td>{{ $element->id }}</td>
                                <td>{{ $element->name }}</td>
                                <td>{{ $element->slug_ar }}</td>
                                <td>{{ $element->slug_en }}</td>
                                <td>
                                    <span
                                        class="label {{ activeLabel($element->is_admin) }}">{{ activeText($element->is_admin,'Yes') }}</span>
                                </td>
                                <td>
                                    <span
                                        class="label {{ activeLabel($element->is_client) }}">{{ activeText($element->is_client,'Yes') }}</span>
                                </td>
                                <td>
                                    <span
                                        class="label {{ activeLabel($element->is_designer) }}">{{ activeText($element->is_designer,'Yes') }}</span>
                                </td>
                                <td>
                                    <span
                                        class="label {{ activeLabel($element->is_visible) }}">{{ activeText($element->is_visible,'Yes') }}</span>

                                </td>
                                <td>
                                    <span
                                        class="label {{ activeLabel($element->active) }}">{{ activeText($element->active) }}</span>
                                </td>
                                <td>
                                    <span class="label {{ activeLabel($element->active) }}"
                                          style="background-color: {{ $element->color }}">{{ $element->name }}</span>
                                </td>
                                <td>
                                    <div class="btn-group pull-right">
                                        <button type="button" class="btn green btn-sm btn-outline dropdown-toggle"
                                                data-toggle="dropdown"> Actions
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu pull-right" role="menu">
                                            <li>
                                                <a href="{{ route('backend.admin.plan.edit',$element->id) }}">
                                                    <i class="fa fa-fw fa-user"></i>edit</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('backend.admin.activate',['model' => 'role','id' => $element->id]) }}">
                                                    <i class="fa fa-fw fa-check-circle"></i> toggle active</a>
                                            </li>
                                            <li>
                                                <a data-toggle="modal" href="#" data-target="#basic"
                                                   data-title="Delete"
                                                   data-content="Are you sure you want to delete {{ $element->name  }}? "
                                                   data-form_id="delete-{{ $element->id }}"
                                                >
                                                    <i class="fa fa-fw fa-recycle"></i> delete</a>
                                                <form method="post" id="delete-{{ $element->id }}"
                                                      action="{{ route('backend.admin.plan.destroy',$element->id) }}">
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
                </div>
            </div>
        </div>
    </div>
@endsection
