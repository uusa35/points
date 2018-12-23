@extends('backend.layouts.app')

@section('content')
@include('backend.partials.breadcrumbs')
<div class="portlet box blue">
    @include('backend.partials.forms.form_title')
    <div class="portlet-body form">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 text-center">
                    <img style="margin: 5%" class="img-responsive" src="{{ asset(env('THUMBNAIL').$settings->logo) }}"
                        alt="{{ $settings->name }}">
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Reset Password') }}</div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('backend.reset') }}">
                                @csrf
                                <input type="hidden" name="role_id" value="{{ $user->role->id }}">
                                
                                <div class="form-group row">

                                    <div class="col-md-4">
                                    <label for="email" class="control-label">{{ __('E-Mail
                                        Address') }}</label>

                                
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                            name="email" value="{{ $email ?? old('email') }}" required autofocus>

                                        @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>    

                                    <div class="col-md-4">
                                    <label for="password" class="control-label">{{
                                        __('Password')
                                        }}</label>
                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                            name="password" required>

                                        @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                   

                                    <div class="col-md-4">
                                    <label for="password-confirm" class="control-label">{{
                                        __('Confirm Password') }}</label>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                            required>
                                          
                                    </div>
                                </div>

                                

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Reset Password') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
