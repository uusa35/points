@extends('backend.layouts.app')
@section('content')
    <div class="portlet box blue">
        @include('backend.partials.forms.form_title')
        <div class="portlet-body form">
            <!-- BEGIN FORM-->
            <form action="{{ route('backend.governate.update',$element->id) }}" role="form" method="post"
                  class="horizontal-form">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="patch">
                <div class="form-body">
                    <h3 class="form-section">Edit {{ $element->name }} Governate</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Name Arabic</label>
                                <input type="text" id="name_ar" name="name_ar" class="form-control"
                                       placeholder="Country name in arabic" value="{{ $element->name_ar }}"
                                       required>
                                <span class="help-block"> Country is unique </span>
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Name English</label>
                                <input type="text" id="name_en" name="name_en" class="form-control"
                                       value="{{ $element->name_en }}"
                                       placeholder="name en" required>
                                {{--<span class="help-block"> This field has error. </span>--}}
                            </div>
                        </div>
                        <!--/span-->
                    </div>

                    <!--/row-->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label sbold">Is Active</label>
                                    <div class="radio-list">
                                        <label class="radio-inline">
                                            <input type="radio" name="active" id="optionsRadios1"
                                                   value="1" {{ $element->active ? 'checked' : null }}> Active </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="active" id="optionsRadios2"
                                                   value="0" {{ $element->active  ? null : 'checked'}}> Not
                                            Active</label>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Country</label>
                                    <select class="form-control" name="country_id">
                                        @foreach($countries as $country)
                                            <option value="{{ $country->id }}" {{ $country->id === $element->country_id ? 'selected' : null }}>{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                    </div>
                    <!--/row-->

                    <div class="row">
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">order</label>
                                <input type="text" id="order" name="order" class="form-control" placeholder="order"
                                       value="{{ $element->order }}"
                                       required>
                                <span class="help-block"> ex. 1  (order is the sequence of the countries that shall appear on app List of Countries in Home Interface)</span>
                            </div>
                        </div>
                        <!--/span-->
                    </div>
            </form>
        @include('backend.partials.forms._btn-group')
        <!-- END FORM-->
        </div>
    </div>
    </div>
@endsection
