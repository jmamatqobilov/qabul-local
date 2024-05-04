@extends('layouts.inner')

@section('pageTitle', __('Edit Profile Page'))

@section('content')
@section('navigation')
    {!! $navigation !!}
@endsection

@section('pageTitle', $title)

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="ex-card">
                <h3 class="ex-card-title text-success">
                    <i data-feather="{!! $icon !!}" width="25" height="25" class="mr-2"></i> {{ $title }}
                </h3>
                <form method="POST" action="{{route('delete-profile-image', ['id' => Auth::user()->id])}}">
                    @csrf
                    @method('PUT')
                    <button type="submit"
                            class="btn-label bg-success delete-button ml-3">{{__('Delete photo')}}</button>
                </form>
                <form method="POST" action="{{ route('profile.change') }}" class="login-content__form"
                      accept-charset="UTF-8" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-4 login-group">
                                <label for="email">{{ __('E-Mail Address') }}</label>
                                <div class="input-prepend">
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ $user->email ?: old('email') }}" required autocomplete="email"
                                           autofocus>
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
                                <label for="director_fio">{{ __('Directors Name') }}</label>
                                <div class="input-prepend">
                                    <input id="text" type="text"
                                           class="form-control @error('director_fio') is-invalid @enderror"
                                           name="director_fio" value="{{ $user->director_fio ?: old('director_fio') }}"
                                           autocomplete="director_fio">
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
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-4 login-group">
                                <div class="row ml-0">
                                    <label for="photo">{{ __('Profile photo') }}</label>
                                </div>
                                <div class="input-prepend">
                                    <input type="file" class="form-control @error('photo') is-invalid @enderror"
                                           name="photo">
                                    <div class="input-prepend__icon">
                                        <i data-feather="image"></i>
                                    </div>
                                    @error('photo')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-4 login-group">
                                <label for="address">{{ __('Company Address') }}</label>
                                <div class="input-prepend">
                                    <input id="text" type="text"
                                           class="form-control @error('address') is-invalid @enderror" name="address"
                                           value="{{ $user->address ?: old('address') }}" autocomplete="address">
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
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-4 login-group">
                                <label for="license">{{ __('License Number') }}</label>
                                <div class="input-prepend">
                                    <input id="text" type="text"
                                           class="form-control @error('license') is-invalid @enderror" name="license"
                                           value="{{ $user->license ?: old('license') }}" autocomplete="license">
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
                        <div class="col-md-6">
                            <div class="form-group mb-4 login-group">
                                <label for="current_password">{{ __('validation.attributes.current_password') }}</label>
                                <div class="input-prepend">
                                    <input id="current_password" type="password"
                                           class="form-control @error('current_password') is-invalid @enderror"
                                           name="current_password" autocomplete="off">
                                    <div class="input-prepend__icon">
                                        <i data-feather="key"></i>
                                    </div>
                                    @error('current_password')
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
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           autocomplete="off">
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
                                    <input id="password-confirm" type="password"
                                           class="form-control @error('password_confirmation') is-invalid @enderror"
                                           name="password_confirmation" autocomplete="off">
                                    <div class="input-prepend__icon">
                                        <i data-feather="check-circle"></i>
                                    </div>
                                    @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-6 offset-md-3">
                            <div class="login-actions">
                                <input type="hidden" name="_method" value="PUT">
                                <button type="submit" class="btn btn-success btn-block btn-round">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <x-entrys-list/>
@endsection
