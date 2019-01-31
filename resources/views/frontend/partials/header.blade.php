<div class="col-sm">
    @guest
        <div class="links">
            <form class="form-inline" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group mb-4">
                    <label for="staticEmail2" class="sr-only">Email</label>
                    <input id="email" type="email"
                           placeholder="{{ trans('general.email') }}"
                           class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                           name="email" value="{{ old('email') }}" required autofocus>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif

                </div>
                <div class="form-group mx-sm-3 mb-4">
                    <label for="inputPassword2" class="sr-only">Password</label>
                    <input id="password" type="password"
                           placeholder="{{ trans('general.password') }}"
                           class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                           name="password" required>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary mb-3">{{ trans('general.login') }}</button>
            </form>
        </div>
    @endif
</div>
<div class="col-sm">
    <div class="title m-b-md text-center">
        <img style="max-width: 120px;" src="{{ asset(env('THUMBNAIL').$settings->logo) }}"
             alt="{{ $settings->name }}">
    </div>
</div>
<div class="col-sm">
    @if (Route::has('login'))
        <div class="links">
            @auth
                <a href="{{ route('home') }}">{{ trans('general.home') }}</a>
                <a href="{{ url('/logout') }}"
                   onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <i class="icon-key"></i> {{ trans('general.logout') }} </a>
            @else
                {{--                        <a href="{{ route('login') }}">{{ trans('general.login') }}</a>--}}

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">{{ trans('general.register') }}</a>
                @endif
            @endauth
            {{--<a href="{{ route('frontend.language.change',app()->isLocale('ar') ? 'en' : 'ar') }}">{{ trans('general.switch_lang') }}</a>--}}
        </div>
    @endif
</div>
