@extends('backend.layouts.app')

@section('content')
    @include('backend.partials.breadcrumbs')
    <div class="portlet light ">
        @include('backend.partials.forms.form_title')
        <div class="portlet-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="m-heading-1 border-green m-bordered">
                        <h3>{{ trans('general.instructions') }}</h3>
                        <p>
                            {{ trans('message.backend_setting_index_message') }}
                        </p>
                    </div>
                    <div class="col-lg-12">
                        <h3 class="text-uppercase">{{ trans('general.settings') }}</h3>
                        <hr>
                        <a href="{{ route('backend.admin.setting.edit',$element->id) }}"
                           class="btn btn-primary pull-right">{{ trans('general.edit') }}</a>
                        <div class="col-md-8">
                            <table class="table table-striped">
                                <tbody>
                                <tr>
                                    <td>{{ trans('general.arabic_name') }}</td>
                                    <td>{{ $element->name_ar }}</td>
                                </tr>
                                <tr>
                                    <td>{{ trans('general.english_name') }}</td>
                                    <td>{{ $element->name_en }}</td>
                                </tr>
                                <tr>
                                    <td>{{ trans('general.phone') }}</td>
                                    <td>{{ $element->phone }}</td>
                                </tr>
                                <tr>
                                    <td>{{ trans('general.mobile') }}</td>
                                    <td>{{ $element->mobile }}</td>
                                </tr>
                                <tr>
                                    <td>{{ trans('general.email') }}</td>
                                    <td>{{ $element->email }}</td>
                                </tr>
                                <tr>
                                    <td>{{ trans('general.address_ar') }}</td>
                                    <td>{{ $element->address_ar }}</td>
                                </tr>
                                <tr>
                                    <td>{{ trans('general.address_en') }}</td>
                                    <td>{{ $element->address_en }}</td>
                                </tr>
                                <tr>
                                    <td>{{ trans('general.latitude') }}</td>
                                    <td>{{ $element->latitude }}</td>
                                </tr>
                                <tr>
                                    <td>{{ trans('general.longitude') }}</td>
                                    <td>{{ $element->longitude }}</td>
                                </tr>
                                <tr>
                                    <td>{{ trans('general.description_a') }}</td>
                                    <td>{{ $element->description_ar}}</td>
                                </tr>
                                <tr>
                                    <td>{{ trans('general.description_e') }}</td>
                                    <td>{{ $element->description_en}}</td>
                                </tr>
                                <tr>
                                    <td>{{ trans('general.on_home_speech_a') }}</td>
                                    <td>{{ $element->on_home_speech_ar}}</td>
                                </tr>

                                <tr>
                                    <td>{{ trans('general.on_home_speech_e') }}</td>
                                    <td>{{ $element->on_home_speech_en}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-lg-4">
                            <h5>logo</h5>
                            <img src="{{ asset('storage/uploads/images/medium/'.$element->logo) }}"
                                 alt="" class="img-responsive img-thumbnail">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
