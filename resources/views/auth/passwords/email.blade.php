@extends('layouts.login')

@section('pageTitle', __('Reset Password'))

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
                        <i data-feather="refresh-ccw" class="mr-2"></i>
                        {{ __('Reset Password') }}
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
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="login-form__content login-content">
            <form method="POST" action="{{ route('password.email') }}" class="login-content__form needs-validation" novalidate>
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
                <div class="login-actions mt-4">
                    <button type="submit" class="btn btn-success btn-block btn-round">
                            {{ __('Send Password Reset Link') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
