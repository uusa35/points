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
                            {{ trans('message.backend_user_index_message') }}
                        </p>
                    </div>
                    @if($elements->isEmpty())
                        <div class="alert alert-danger">
                            {{ trans('message.this_module_is_empty') }}
                        </div>
                    @endif
                    <table id="dataTable" class="table table-striped table-bordered table-hover" cellspacing="0">
                        <thead>
                        <tr>
                            <th>{{ trans('general.id') }}</th>
                            <th>{{ trans('general.name') }}</th>
                            <th>{{ trans('general.logo') }}</th>
                            <th>{{ trans('general.email') }}</th>
                            <th>{{ trans('general.role') }}</th>
                            <th>{{ trans('general.balance') }}</th>
                            <th>{{ trans('general.active') }}</th>
                            <th>{{ trans('general.created_at') }}</th>
                            <th>{{ trans('general.action') }}</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>{{ trans('general.id') }}</th>
                            <th>{{ trans('general.name') }}</th>
                            <th>{{ trans('general.logo') }}</th>
                            <th>{{ trans('general.email') }}</th>
                            <th>{{ trans('general.role') }}</th>
                            <th>{{ trans('general.balance') }}</th>
                            <th>{{ trans('general.active') }}</th>
                            <th>{{ trans('general.created_at') }}</th>
                            <th>{{ trans('general.action') }}</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($elements as $element)
                            <tr>
                                <td>{{ $element->id }}</td>
                                <td>{{ $element->name_ar }}</td>
                                <td><img src="{{ asset('storage/uploads/images/thumbnail/'.$element->logo) }}"
                                         class="img-sm" alt="">
                                </td>
                                <td>
                                    {{ $element->email }}
                                </td>
                                <td>
                                    <span class="label {{ activeLabel($element->active) }}"
                                          style="background-color: {{ $element->role->color }}">{{ activeText($element->active,$element->role->name ) }}</span>
                                </td>
                                <td>
                                    <span class="label label-primary">
                                    {{ $element->balance->points }} {{ trans('general.points') }}
                                    </span>
                                </td>
                                <td>
                                    <span
                                        class="label {{ activeLabel($element->active) }}">{{ activeText($element->active) }}</span>
                                </td>
                                <td>{{ $element->created_at->diffForHumans() }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn green btn-xs btn-outline dropdown-toggle"
                                                data-toggle="dropdown"> Actions
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu pull-right" role="menu">
                                            <li>
                                                <a href="{{ route('backend.admin.user.edit',$element->id) }}">
                                                    <i class="fa fa-fw fa-edit"></i> Edit User</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('backend.reset.password',['email' => $element->email]) }}">
                                                    <i class="fa fa-fw fa-edit"></i> {{ trans('general.reset_password') }}
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('backend.admin.activate',['model' => 'user','id' => $element->id]) }}">
                                                    <i class="fa fa-fw fa-check-circle"></i> toggle active</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $elements->render() }}
            </div>
        </div>
    </div>
@endsection
