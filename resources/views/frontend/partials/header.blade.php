<div class="col-sm">
    @if (Route::has('login'))
        <div class="links">
            @auth
                <a style="font-size: 25px;" href="{{ route('home') }}">{{ trans('general.home') }}</a>
                <a style="font-size: 25px;" href="{{ url('/logout') }}"
                   onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <i class="icon-key"></i> {{ trans('general.logout') }} </a>
            @else
                @if (Route::has('login') || Route::has('register'))
                    <a style="font-size: 25px;" href="{{ route('home') }}">{{ trans('general.home') }}</a>
                @endif
                @if (Route::has('register') && auth()->check())
                    <a style="font-size: 25px;" href="{{ route('register') }}">{{ trans('general.register') }}</a>
                @endif
            @endauth
            {{--<a href="{{ route('frontend.language.change',app()->isLocale('ar') ? 'en' : 'ar') }}">{{ trans('general.switch_lang') }}</a>--}}
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
    @guest
        <div class="links" style="margin-right: 0px; margin-left: 0px;">
            <form class="form-inline" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group mb-4">
                    <label for="staticEmail2" class="sr-only">{{ trans('general.email') }}</label>
                    <input id="email" type="email"
                           placeholder="{{ trans('general.email') }}"
                           class="form-control form-control-lg {{ $errors->has('email') ? ' is-invalid' : '' }}"
                           name="email" value="{{ old('email') }}" required autofocus>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif

                </div>
                <div class="form-group mx-sm-3 mb-4">
                    <label for="inputPassword2" class="sr-only">{{ trans('general.password') }}</label>
                    <input id="password" type="password"
                           placeholder="{{ trans('general.password') }}"
                           class="form-control form-control-lg {{ $errors->has('password') ? ' is-invalid' : '' }}"
                           name="password" required>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                    @endif
                </div>
                <button type="submit" class="btn btn-lg btn-outline-info mb-4">{{ trans('general.login') }}</button>
            </form>
        </div>
    @endguest
</div>
