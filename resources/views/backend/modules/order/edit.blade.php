@extends('backend.layouts.app')
@section('content')
    @include('backend.partials.breadcrumbs')
    <div class="portlet box blue">
        @include('backend.partials.forms.form_title')
        <div class="portlet-body form">
            <form class="horizontal-form" role="form" method="POST"
                  action="{{ route('backend.project.update', $element->id) }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="put">
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group {{ $errors->has('reference_id') ? ' has-error' : '' }}">
                                <label for="reference_id" class="control-label">reference_id</label>
                                <input id="reference_id"
                                       type="text"
                                       class="form-control"
                                       name="reference_id"
                                       value="{{ $element->reference_id }}"
                                       placeholder="reference_id"
                                       required autofocus>
                                @if ($errors->has('reference_id'))
                                    <span class="help-block">
                                        <strong>
                                            {{ $errors->first('reference_id') }}
                                        </strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group {{ $errors->has('name_ar') ? ' has-error' : '' }}">
                                <label for="name_ar" class="control-label">Name Arabic*</label>
                                <input id="name_ar"
                                       type="text"
                                       class="form-control"
                                       name="name_ar"
                                       value="{{ $element->name_ar }}"
                                       placeholder="name_ar"
                                       required autofocus>
                                @if ($errors->has('name_ar'))
                                    <span class="help-block">
                                        <strong>
                                            {{ $errors->first('name_ar') }}
                                        </strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group{{ $errors->has('name_en') ? ' has-error' : '' }}">
                                <label for="name_en" class="control-label">Name English*</label>
                                <input id="name_en"
                                       type="text"
                                       class="form-control"
                                       name="name_en"
                                       value="{{ $element->name_en }}"
                                       placeholder="name in english"
                                       required autofocus>
                                @if ($errors->has('name_en'))
                                    <span class="help-block">
                                        <strong>
                                            {{ $errors->first('name_en') }}
                                        </strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('ip_cam_url') ? ' has-error' : '' }}">
                                <label for="ip_cam_url" class="control-label">ip_cam_url Website</label>
                                <input id="ip_cam_url"
                                       type="text"
                                       class="form-control"
                                       name="ip_cam_url"
                                       placeholder="website --> http://google.com"
                                       value="{{ $element->ip_cam_url }}"
                                       autofocus>
                                @if ($errors->has('ip_cam_url'))
                                    <span class="help-block">
                                        <strong>
                                            {{ $errors->first('ip_cam_url') }}
                                        </strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Client *</label>
                                <select class="bs-select form-control" name="user_id" required>
                                    @foreach($activeClients as $client)
                                        <option value="{{ $client->id }}" {{ $element->user_id == $client->id ? 'selected' : null  }}>{{ $client->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group{{ $errors->has('start_date') ? ' has-error' : '' }}">
                                <label for="start_date" class="control-label">start_date</label>
                                <input id="start_date"
                                       type="date"
                                       class="form-control"
                                       name="start_date"
                                       value="{{ $element->start_date->format('Y-m-d') }}"
                                       placeholder="name in arabic"
                                       required
                                       autofocus>
                                @if ($errors->has('start_date'))
                                    <span class="help-block">
                                        <strong>
                                            {{ $errors->first('start_date') }}
                                        </strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group{{ $errors->has('end_date') ? ' has-error' : '' }}">
                                <label for="end_date" class="control-label">end_date </label>
                                <input id="end_date"
                                       type="date"
                                       class="form-control"
                                       name="end_date"
                                       value="{{ $element->end_date->format('Y-m-d') }}"
                                       placeholder="name in english"
                                       required
                                       autofocus>
                                @if ($errors->has('end_date'))
                                    <span class="help-block">
                                        <strong>
                                            {{ $errors->first('end_date') }}
                                        </strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="form_control_1">Main Image</label>
                                <input type="file" class="form-control" name="image" placeholder="image">
                                <div class="help-block text-left">
                                    W * H - Best fit 1024 x 800 pixels
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <hr>
                        <div class="col-lg-3">
                            @if(!$activeCategories->isEmpty())
                                <div class="form-group">
                                    <label class="control-label">Categories</label>
                                    <select multiple="multiple" class="multi-select" id="my_multi_select1"
                                            name="categories[]">
                                        @foreach($activeCategories as $category)
                                            <option value="{{ $category->id }}"
                                                    {{ in_array($category->id,$element->categories->pluck('id')->toArray()) ? 'selected' : null  }} style="background-color: {{ $category->isParent ? 'lightblue' : null  }}">{{ $category->name }}</option>
                                            @if(!$category->children->isEmpty())
                                                @foreach($category->children as $child)
                                                    <option value="{{ $child->id }}"
                                                            {{ in_array($child->id,$element->categories->pluck('id')->toArray()) ? 'selected' : null  }}  style="padding-left: 15px">{{ $child->name }}</option>
                                                    @if(!$child->children->isEmpty())
                                                        @foreach($child->children as $subChild)
                                                            <option value="{{ $subChild->id }}"
                                                                    {{ in_array($subChild->id,$element->categories->pluck('id')->toArray()) ? 'selected' : null  }}  style="padding-left: 35px">{{ $subChild->name }}</option>
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            @else
                                <div class="label label-warning">{{ trans('message.there_are_no_categories') }}</div>
                            @endif
                        </div>

                        <div class="col-lg-3">
                            @if(!$activeSubContractors->isEmpty())
                                <div class="form-group">
                                    <label class="control-label">SubContractors</label>
                                    <select multiple="multiple" class="multi-select" id="my_multi_select2"
                                            name="subContractors[]">
                                        @foreach($activeSubContractors as $contractor)
                                            <option value="{{ $contractor->id }}" {{ in_array($contractor->id,$element->subcontractors->pluck('id')->toArray(),true) ? 'selected' : null }}>{{ $contractor->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @else
                                <div class="label label-warning">{{ trans('message.there_are_no_active_clients') }}</div>
                            @endif
                        </div>

                        <div class="col-lg-3">
                            @if(!$activeConsultants->isEmpty())
                                <div class="form-group">
                                    <label class="control-label">Consultants*</label>
                                    <select multiple="multiple" class="multi-select" id="my_multi_select3"
                                            name="consultants[]">
                                        @foreach($activeConsultants as $consultant)
                                            <option value="{{ $consultant->id }}" {{ in_array($consultant->id,$element->consultants->pluck('id')->toArray(),true) ? 'selected' : null }}>{{ $consultant->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @else
                                <div class="label label-warning">{{ trans('message.there_is_no_active_consultants') }}</div>
                            @endif
                        </div>
                        <div class="col-lg-3">
                            @if(!$activeSuppliers->isEmpty())
                                <div class="form-group">
                                    <label class="control-label">Suppliers*</label>
                                    <select multiple="multiple" class="multi-select" id="my_multi_select4"
                                            name="suppliers[]">
                                        @foreach($activeSuppliers as $supplier)
                                            <option value="{{ $supplier->id }}" {{ in_array($supplier->id,$element->suppliers->pluck('id')->toArray(),true) ? 'selected' : null }}>{{ $supplier->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @else
                                <div class="label label-warning">{{ trans('message.there_is_no_active_suppliers') }}</div>
                            @endif
                        </div>
                    </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('caption_ar') ? ' has-error' : '' }}">
                                <label for="caption_ar" class="control-label">caption_ar Arabic</label>
                                <input id="caption_ar"
                                       type="text"
                                       class="form-control"
                                       name="caption_ar"
                                       value="{{ $element->caption_ar }}"
                                       placeholder="caption_ar"
                                       autofocus>
                                @if ($errors->has('caption_ar'))
                                    <span class="help-block">
                                        <strong>
                                            {{ $errors->first('caption_ar') }}
                                        </strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('caption_en') ? ' has-error' : '' }}">
                                <label for="caption_en" class="control-label">caption_en English</label>
                                <input id="caption_en"
                                       type="text"
                                       class="form-control"
                                       name="caption_en"
                                       value="{{ $element->caption_en }}"
                                       placeholder="name in english"
                                       autofocus>
                                @if ($errors->has('caption_en'))
                                    <span class="help-block">
                                        <strong>
                                            {{ $errors->first('caption_en') }}
                                        </strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description" class="control-label">description arabic</label>
                                <textarea type="text" class="form-control" id="description_ar" name="description_ar"
                                          aria-multiline="true"
                                          maxlength="500">{{ $element->description_ar }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description" class="control-label">description english</label>
                                <textarea type="text" class="form-control" id="description_en" name="description_en"
                                          aria-multiline="true"
                                          maxlength="500">{{ $element->description_en }}</textarea>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label sbold">active</label></br>
                                <label class="radio-inline">
                                    <input type="radio" name="active" id="optionsRadios1"
                                           {{ $element->active ? 'checked' : null  }}
                                           value="1"> active </label>
                                <label class="radio-inline">
                                    <input type="radio" name="active" id="optionsRadios2"
                                           {{ !$element->active ? 'checked' : null  }}
                                           value="0"> not_Active</label>
                            </div>
                        </div>
                    </div>

                    @include('backend.partials.forms._btn-group')
                </div>
            </form>
        </div>
    </div>
@endsection
