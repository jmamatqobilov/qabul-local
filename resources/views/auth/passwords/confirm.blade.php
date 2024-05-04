@extends('layouts.login')

@section('pageTitle', __('Confirm Password'))

@section('content')
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
                        <i data-feather="check" class="mr-2"></i>
                        {{ __('Confirm Password') }}
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
        <div class="login-form__content login-content">
            {{ __('Please confirm your password before continuing.') }}
            <form method="POST" action="{{ route('password.confirm') }}" class="login-content__form needs-validation" novalidate>
                @csrf
                <div class="form-group mb-4 login-group">
                    <label for="password">{{ __('Password') }}</label>
                    <div class="input-prepend">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        <div class="input-prepend__icon">
                            <i data-feather="mail"></i>
                        </div>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="login-actions mt-4">
                    <button type="submit" class="btn btn-success btn-block btn-round">
                        {{ __('Confirm Password') }}
                    </button>
                    @if (Route::has('password.request'))
                        <div class="text-center mt-4 font-size_md">
                            <a class="text-success" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                        </div>
                    @endif
                </div>
            </form>
        </div>
    </div>
@endsection
