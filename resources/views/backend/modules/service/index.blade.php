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
                            <th>slug</th>
                            <th>duration</th>
                            <th>image</th>
                            <th>path</th>
                            <th>order</th>
                            <th>on_sale</th>
                            <th>points</th>
                            <th>active</th>
                            <th>category_id</th>
                            <th>action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>id</th>
                            <th>name</th>
                            <th>slug</th>
                            <th>duration</th>
                            <th>image</th>
                            <th>path</th>
                            <th>order</th>
                            <th>on_sale</th>
                            <th>points</th>
                            <th>active</th>
                            <th>category_id</th>
                            <th>action</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($elements as $element)
                            <tr>
                                <td>{{ $element->id }}</td>
                                <td>{{ $element->name }}</td>
                                <td>{{ $element->slug }}</td>
                                <td>{{ $element->duration }}</td>
                                <td><img class="img-xs" src="{{ asset(env('THUMBNAIL').$element->image) }}" alt=""></td>
                                <td><a class="btn btn-info"
                                       href="{{ asset(env('FILES').$element->path ) }}">{{ trans('general.view') }}</a>
                                </td>
                                <td>{{ $element->order }}</td>
                                <td>
                                    <span
                                        class="label {{ activeLabel($element->on_sale) }}">{{ activeText($element->on_sale,'Yes') }}</span>
                                </td>
                                <td>{{ $element->on_sale ? $element->sale_points : $element->points }}</td>
                                <td>
                                    <span
                                        class="label {{ activeLabel($element->active) }}">{{ activeText($element->active,'Yes') }}</span>
                                </td>
                                <td>{{ $element->category->slug }}</td>
                                <td>
                                    <div class="btn-group pull-right">
                                        <button type="button" class="btn green btn-sm btn-outline dropdown-toggle"
                                                data-toggle="dropdown"> Actions
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu pull-right" role="menu">
                                            <li>
                                                <a href="{{ route('backend.admin.service.edit',$element->id) }}">
                                                    <i class="fa fa-fw fa-user"></i>edit</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('backend.admin.activate',['model' => 'service','id' => $element->id]) }}">
                                                    <i class="fa fa-fw fa-check-circle"></i> toggle active</a>
                                            </li>
                                            <li>
                                            <li>
                                                <a data-toggle="modal" href="#" data-target="#basic"
                                                   data-title="Delete"
                                                   data-content="Are you sure you want to delete this order ? "
                                                   data-form_id="delete-{{ $element->id }}"
                                                >
                                                    <i class="fa fa-fw fa-recycle"></i> {{ trans('general.delete') }}
                                                </a>
                                                <form method="post" id="delete-{{ $element->id }}"
                                                      action="{{ route('backend.admin.service.destroy',$element->id) }}">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="delete"/>
                                                    <button type="submit" class="btn btn-del hidden">
                                                        <i class="fa fa-fw fa-times-circle"></i> {{ trans('general.delete') }}
                                                    </button>
                                                </form>
                                            </li>
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
