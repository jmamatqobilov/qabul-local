@extends('layouts.login')

@section('pageTitle', __('Verify Your Email Address'))

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
                        {{ __('Verify Your Email Address') }}
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
            @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    {{ __('A fresh verification link has been sent to your email address.') }}
                </div>
            @endif
            <p>
                {{ __('Before proceeding, please check your email for a verification link.') }}
            </p>
            <div>
                {{ __('If you did not receive the email') }},
                <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <button type="submit" class="btn btn-success btn-block btn-round">{{ __('click here to request another') }}</button>.
                </form>
            </div>
        </div>
    </div>
@endsection
