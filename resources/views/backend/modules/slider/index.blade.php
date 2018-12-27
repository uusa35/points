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
                            {{ trans('message.backend_slider_index_message') }}
                        </p>
                    </div>
                    <table id="dataTable" class="table table-striped table-bordered table-hover" cellspacing="0"
                           width="100%">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>url</th>
                            <th>order</th>
                            <th>image</th>
                            <th>active</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>url</th>
                            <th>order</th>
                            <th>active</th>
                            <th>image</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($elements as $element)
                            <tr>
                                <td>{{ $element->id }}</td>
                                <td>
                                    {{ str_limit($element->url,20,'..') }}
                                </td>
                                <td>{{ $element->order }}</td>
                                <td>
                                    <img src="{{ asset(env('THUMBNAIL').$element->image) }}" alt=""
                                         class="img-responsive" style="max-height: 80px; max-width:100px;">
                                </td>
                                <td>
                                    <span
                                        class="label {{ activeLabel($element->active) }}">{{ activeText($element->active) }}</span>
                                </td>
                                <td>{{ $element->created_at->diffForHumans() }}</td>
                                <td>
                                    <div class="btn-group pull-right">
                                        <button type="button" class="btn green btn-sm btn-outline dropdown-toggle"
                                                data-toggle="dropdown"> Actions
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu pull-right" role="menu">
                                            <li>
                                                <a href="{{ route('backend.admin.slider.edit',$element->id) }}">
                                                    <i class="fa fa-fw fa-user"></i>edit</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('backend.admin.activate',['model' => 'slider','id' => $element->id]) }}">
                                                    <i class="fa fa-fw fa-check-circle"></i> toggle active</a>
                                            </li>
                                            <li>
                                                <form method="post"
                                                      action="{{ route('backend.admin.slider.destroy',$element->id) }}">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="_method" value="delete"/>
                                                    <button type="submit" class="btn btn-outline btn-sm red">
                                                        <i class="fa fa-remove"></i>delete slide
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
