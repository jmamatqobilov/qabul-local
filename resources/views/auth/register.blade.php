@extends('layouts.login')

@section('pageTitle', __('Register'))

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
                        <i data-feather="user" class="mr-2"></i>
                        {{ __('Register') }}
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
            <form method="POST" action="{{ route('register') }}" class="login-content__form">
                @csrf
                <div class="row">
                    <div class="col-md-6">
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
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-4 login-group">
                            <label for="company_name">{{ __('Company Name') }}</label>
                            <div class="input-prepend">
                                <input id="company_name" type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" value="{{ old('company_name') }}" required autocomplete="company_name">
                                <div class="input-prepend__icon">
                                    <i data-feather="globe"></i>
                                </div>
                                @error('company_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-4 login-group">
                            <label for="director_fio">{{ __('Directors Name') }}</label>
                            <div class="input-prepend">
                                <input id="text" type="text" class="form-control @error('director_fio') is-invalid @enderror" name="director_fio" value="{{ old('director_fio') }}" required autocomplete="director_fio">
                                <div class="input-prepend__icon">
                                    <i data-feather="edit-3"></i>
                                </div>
                                @error('director_fio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-4 login-group">
                            <label for="inn">{{ __('INN') }}</label>
                            <div class="input-prepend">
                                <input id="text" type="text" class="form-control @error('inn') is-invalid @enderror" name="inn" value="{{ old('inn') }}" required autocomplete="inn">
                                <div class="input-prepend__icon">
                                    <i data-feather="clipboard"></i>
                                </div>
                                @error('inn')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-4 login-group">
                            <label for="address">{{ __('Company Address') }}</label>
                            <div class="input-prepend">
                                <input id="text" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address">
                                <div class="input-prepend__icon">
                                    <i data-feather="map"></i>
                                </div>
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-4 login-group">
                            <label for="license">{{ __('License Number') }}</label>
                            <div class="input-prepend">
                                <input id="text" type="text" class="form-control @error('license') is-invalid @enderror" name="license" value="{{ old('license') }}" autocomplete="license">
                                <div class="input-prepend__icon">
                                    <i data-feather="award"></i>
                                </div>
                                @error('license')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-4 login-group">
                            <label for="password">{{ __('Password') }}</label>
                            <div class="input-prepend">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                <div class="input-prepend__icon">
                                    <i data-feather="lock"></i>
                                </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-4 login-group">
                            <label for="lcNumber">{{ __('Confirm Password') }}</label>
                            <div class="input-prepend">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                <div class="input-prepend__icon">
                                    <i data-feather="check-circle"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-6 offset-md-3">
                        <div class="login-actions">
                            <button type="submit" class="btn btn-success btn-block btn-round">
                                {{ __('Register') }}
                            </button>
                            <div class="text-center mt-4 font-size_md">
                                <a href="{{ route('login') }}" class="text-success">{{ __('Login') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
