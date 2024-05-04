@extends('layouts.login')

@section('pageTitle', __('Login'))

@section('content')
        <div class="d-flex justify-content-center">
            <img style="width: 120px; top: 0" class="technocorp" src="/assets/img/Logo1.svg" />
        </div>

    <div class="login-form" data-aos="fade-in">
        <div class="login-form__header">
            <div class="login-logo">
                <div class="login-logo__img">
                    <img src="{{ asset('assets/img/logo.png') }}" alt="">
                </div>
                <div class="login-logo__title">O’ZKOMNAZORAT</div>
            </div>
            <div class="row align-items-center justify-content-between">
                <div class="col-auto">
                    <div class="login-form-title">
                        <i data-feather="lock" class="mr-2"></i>
                        {{ __('Login') }}
                    </div>
                </div>
                <div class="col-auto">
                    @switch(app()->getLocale())
                        @case('ru')
                            <a href="{{ route('lang', ['locale'=>'uz']) }}" class="login-lang btn-circle">Uz</a>
                        @break
                        @case('uz')
                            <a href="{{ route('lang', ['locale'=>'ru']) }}" class="login-lang btn-circle">Ru</a>
                        @break
                    @endswitch
                </div>
            </div>
        </div>
        <div class="d-flex">
            <div class="login-form__content login-content">
                <form method="POST" action="{{ route('login') }}" class="login-content__form">
                    @csrf
                    <div class="form-group mb-4 login-group">
                        <label for="email">{{ __('E-Mail Address') }}</label>
                        <div class="input-prepend">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            <div class="input-prepend__icon">
                                <i data-feather="mail"></i>
                            </div>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group login-group">
                        <div class="row">
                            <div class="col-6">
                                <label for="password">{{ __('Password') }}</label>
                            </div>
                            @if (Route::has('password.request'))
                                <div class="col-6 text-right">
                                    <a class="font-size_sm medium text-success" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                </div>
                            @endif
                        </div>
                        <div class="input-prepend mb-2">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            <div class="input-prepend__icon">
                                <i data-feather="lock"></i>
                            </div>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="custom-control-label font-size_sm" for="remember">{{ __('Remember Me') }}</label>
                        </div>
                    </div>
                    <div class="login-actions mt-4">
                        <button type="submit" class="btn btn-success btn-block btn-round">
                            {{ __('Login') }}
                        </button>
                        @if (Route::has('register'))
                            <div class="text-center mt-4 font-size_md">
                                <a class="text-success" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </div>
                        @endif
                    </div>
                </form>
            </div>
{{--            <div class="login-form__content login-content">--}}
{{--                <a href="//qabul.gis.uz" class="login-group btn btn-light d-flex align-items-center flex-column justify-content-center h-100">--}}
{{--                    <img src="{{ asset('assets/img/logo.png') }}" alt="">--}}
{{--                    <span class="login-logo__title">{{ __('Qabul') }}</span>--}}
{{--                </a>--}}
{{--            </div>--}}
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <p style="color: white; position: absolute; bottom: 22px; font-size: 15px;">Axborot tizimi <a style="color: white" href="http://technocorp.uz">Technocorp</a> tomonidan ishlab chiqilgan</p>
    </div>
@endsection
