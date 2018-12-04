@extends('backend.layouts.app')
@section('content')
    <div class="clearfix"></div>
    <div class="portlet-body form">
        <form class="form-horizontal" role="form" method="POST" action="{{ route('backend.branch.store') }}">
            {{ csrf_field() }}
            <input type="hidden" name="user_id" value={{ $user_id }}>
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">Name*</label>
                <div class="col-md-6">
                    <input id="name"
                           type="text"
                           class="form-control"
                           name="name"
                           placeholder="name"
                           required autofocus>
                    @if ($errors->has('name'))
                        <span class="help-block">
                    <strong>
                        {{ $errors->first('name') }}
                    </strong>
                </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                <label for="mobile" class="col-md-4 control-label">mobile*</label>
                <div class="col-md-6">
                    <input id="mobile"
                           type="text"
                           class="form-control"
                           name="mobile"
                           placeholder="mobile"
                           required autofocus>
                    @if ($errors->has('mobile'))
                        <span class="help-block">
                    <strong>
                        {{ $errors->first('mobile') }}
                    </strong>
                </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                <label for="phone" class="col-md-4 control-label">phone*</label>
                <div class="col-md-6">
                    <input id="phone"
                           type="text"
                           class="form-control"
                           name="phone"
                           placeholder="phone"
                           required autofocus>
                    @if ($errors->has('phone'))
                        <span class="help-block">
                    <strong>
                        {{ $errors->first('phone') }}
                    </strong>
                </span>
                    @endif
                </div>
            </div>


            @include('backend.partials.forms._btn-group')
        </form>
    </div>
@endsection