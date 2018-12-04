@extends('backend.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light ">
                @include('backend.partials.forms.form_title')
                <div class="portlet-body">
                    <div class="m-heading-1 border-green m-bordered">
                        <h3>Important Information</h3>
                        <p>
                            Roles are very important for the application.
                        </p>
                        <p> Some Information about roles.
                            <a class="btn red btn-outline" href="http://datatables.net/" target="_blank">the official
                                documentation</a>
                        </p>
                    </div>
                    <table id="dataTable" class="table table-striped table-bordered table-hover" cellspacing="0">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>title_ar</th>
                            <th>title_en</th>
                            <th>image</th>
                            <th>url</th>
                            <th>order</th>
                            <th>active</th>
                            <th>on_menu_desktop</th>
                            <th>on_menu_mobile</th>
                            <th>on_footer</th>
                            <th>action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>id</th>
                            <th>title_ar</th>
                            <th>title_en</th>
                            <th>image</th>
                            <th>url</th>
                            <th>order</th>
                            <th>active</th>
                            <th>on_menu_desktop</th>
                            <th>on_menu_mobile</th>
                            <th>on_footer</th>
                            <th>action</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($elements as $element)
                            <tr>
                                <td> {{$element->id}}</td>
                                <td> {{$element->title_ar}} </td>
                                <td> {{$element->title_en}} </td>
                                <td><img src="{{ asset('storage/uploads/images/thumbnail/'.$element->image) }}" alt=""
                                         class="img-sm"></td>
                                <td><a href="{{ $element->url }}" class="btn btn-default">{{ $element->title_en }}</a>
                                </td>
                                <td>{{ $element->order }}</td>
                                <td>
                                    <span class="label {{ activeLabel($element->active) }}">{{ activeText($element->active) }}</span>
                                </td>
                                <td>
                                    <span class="label {{ activeLabel($element->on_menu_desktop) }}">{{ activeText($element->on_menu_desktop,'Desktop') }}</span>
                                </td>
                                <td>
                                    <span class="label {{ activeLabel($element->on_menu_mobile) }}">{{ activeText($element->on_menu_mobile,'Mobile') }}</span>
                                </td>
                                <td>
                                    <span class="label {{ activeLabel($element->on_footer) }}">{{ activeText($element->on_footer,'Footer') }}</span>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn green btn-xs btn-outline dropdown-toggle"
                                                data-toggle="dropdown"> Actions
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu pull-right" role="menu">
                                            <li>
                                                <a href="{{ route('backend.page.edit',$element->id) }}">
                                                    <i class="fa fa-fw fa-edit"></i> Edit</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('backend.activate',['model' => 'page','id' => $element->id]) }}">
                                                    <i class="fa fa-fw fa-check-circle"></i> toggle active</a>
                                            </li>
                                            <li>
                                                <a data-toggle="modal" href="#" data-target="#basic"
                                                   data-title="Delete"
                                                   data-content="Are you sure you want to delete page {{ $element->title_ar }}? "
                                                   data-form_id="delete-{{ $element->id }}"
                                                >
                                                    <i class="fa fa-fw fa-recycle"></i> delete</a>
                                                <form method="post" id="delete-{{ $element->id }}"
                                                      action="{{ route('backend.page.destroy',$element->id) }}">
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