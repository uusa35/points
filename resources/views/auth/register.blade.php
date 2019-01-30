@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 text-center">
                <img style="margin: 5%" class="img-responsive" src="{{ asset(env('THUMBNAIL').$settings->logo) }}"
                     alt="{{ $settings->name }}">
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">
                        {{ trans('general.register') }}
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group row">

                                <div class="col-md-6">
                                    <input id="username" type="text"
                                           class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                           name="username" value="{{ old('username') }}" required autofocus>

                                    @if ($errors->has('username'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <label for="username" class="col-md-4 col-form-label text-md-right">{{ trans('general.name') }}</label>
                            </div>

                            <div class="form-group row">

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                           class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                           name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-right">{{ trans('general.email') }}</label>

                            </div>

                            <div class="form-group row">


                                <div class="col-md-6">
                                    <input id="mobile" type="mobile"
                                           class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}"
                                           name="mobile" value="{{ old('mobile') }}" required>

                                    @if ($errors->has('mobile'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <label for="mobile"
                                       class="col-md-4 col-form-label text-md-right">{{ trans('general.mobile') }}</label>
                            </div>

                            <div class="form-group row">


                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                           name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-right">{{ trans('general.password') }}</label>
                            </div>

                            <div class="form-group row">


                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required>
                                </div>
                                <label for="password-confirm"
                                       class="col-md-4 col-form-label text-md-right">{{ trans('general.confirm_assword') }}</label>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-push-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ trans('general.Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
