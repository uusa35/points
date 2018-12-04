@extends('backend.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light ">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase">
                            @section('title')
                                {{ Route::currentRouteName() }} {{ (!is_null(request()->has('type'))) ? request()->type : null }}
                            @show
                        </span>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="m-heading-1 border-green m-bordered">
                        <h3>Important Information</h3>
                        <p>
                            Roles are very important for the application.
                        </p>
                        <p> Some Information about roles.
                            <a class="btn red btn-outline" href="http://datatables.net/" target="_blank">the official documentation</a>
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
                            <th>icon</th>
                            <th>color</th>
                            <th>caption</th>
                            <th>is_admin</th>
                            <th>active</th>
                            <th>visible</th>
                            <th>is_company</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>id</th>
                            <th>name</th>
                            <th>slug_ar</th>
                            <th>slug_en</th>
                            <th>icon</th>
                            <th>color</th>
                            <th>caption</th>
                            <th>is_admin</th>
                            <th>active</th>
                            <th>visible</th>
                            <th>is_company</th>
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
                                <td><i class="fa fa-fw fa-{{ $element->icon }}"></i></td>
                                <td>
                                    <span class="label"
                                          style="background-color: {{ $element->color }}; color : white">{{ $element->color }}</span>
                                </td>
                                <td>{{ $element->caption }}</td>
                                <td>
                                    <span class="label {{ activeLabel($element->is_admin) }}">{{ activeText($element->is_admin,'is_admin') }}</span>
                                </td>
                                <td>
                                    <span class="label {{ activeLabel($element->active) }}">{{ activeText($element->active) }}</span>
                                </td>
                                <td>
                                    <span class="label {{ activeLabel($element->visible) }}">{{ activeText($element->visible,'visible on app') }}</span>

                                </td>
                                <td>
                                    <span class="label {{ activeLabel($element->is_company) }}">{{ activeText($element->is_company,'has company attributes') }}</span>
                                </td>
                                <td>
                                    <div class="btn-group pull-right">
                                        <button type="button" class="btn green btn-sm btn-outline dropdown-toggle"
                                                data-toggle="dropdown"> Actions
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu pull-right" role="menu">
                                            <li>
                                                <a href="{{ route('backend.role.edit',$element->id) }}">
                                                    <i class="fa fa-fw fa-user"></i>edit</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('backend.activate',['model' => 'role','id' => $element->id]) }}">
                                                    <i class="fa fa-fw fa-check-circle"></i> toggle active</a>
                                            </li>
                                            <li>
                                                <form method="post"
                                                      action="{{ route('backend.role.destroy',$element->id) }}">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="_method" value="delete"/>
                                                    <button type="submit" class="btn btn-outline btn-sm red">
                                                        <i class="fa fa-remove"></i>delete
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