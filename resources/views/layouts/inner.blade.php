<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/favicon.png') }}"/>
    <title>@yield('pageTitle') - {{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/libs/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/libs/libs.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/fonts.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=261b165b-6a5b-447e-9efd-f9290d336262" type="text/javascript"></script>
</head>
<body>
<div id="wrapper" class="main-page">
    <div class="dashboard-wrapper">
{{--        <marquee behavior="scroll" direction="left" class="dev-informer">{{ __('test_mode') }}</marquee>--}}
        <header class="main-header">
            <nav class="navbar navbar-expand-lg cr-navbar">
                <div class="main-header-title">
                    <a class="navbar-brand d-none d-lg-flex" href="/">
                        <span class="navbar-brand__logo">
                            <img src="{{ asset('assets/img/logo.png') }}" alt="">
                        </span>
                        O’ZKOMNAZORAT
                    </a>
                    <a href="#" class="menu-toggle">
                        <i data-feather="menu"></i>
                    </a>
                </div>
                <div class="main-header__container">
                    <x-search/>
                    <div class="dropdown lang-dropdown d-none d-lg-block">
                        @switch(app()->getLocale())
                            @case('ru')
                            <a href="{{ route('lang', ['locale'=>'uz']) }}" class="btn btn-kit-primary">O'zbekcha</a>
                            @break
                            @case('uz')
                            <a href="{{ route('lang', ['locale'=>'ru']) }}" class="btn btn-kit-primary">Русский</a>
                            @break
                        @endswitch
                    </div>
                    <div class="header-controls ml-auto">
                        <div class="header-controls__list ">
                            <div class="dropdown app-dropdown">
                                <x-notifications/>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown user-dropdown">
                        <a href="#" class="header-user" role="button" id="dropdownUser" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            <div class="header-user__img">
                                @if(isset(Auth::user()->photo))
                                    <img src="{!! '/'.Auth::user()->photo !!}" alt="{{ Auth::user()->company_name }}">
                                @else
                                    <img src="{{ asset('assets/img/Avatar.jpg') }}"
                                         alt="{{ Auth::user()->company_name }}">
                                @endif
                            </div>
                            <i data-feather="chevron-down" class="ml-2" width="15" height="15"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownUser">
                            <a class="dropdown-item" href="{{ route('profile.view') }}"><i data-feather="edit"
                                                                                           class="mr-2" width="20"
                                                                                           height="20"></i> {{ __('Edit') }}
                            </a>
                            <a class="dropdown-item" href="#"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                        data-feather="log-out" class="mr-2" width="20" height="20"></i> {{ __('Exit') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
        <div class="d-flex flex-column justify-content-between sidebar" role="navigation">
            <div class="sidebar-lang d-block d-lg-none">
                <div class="dropdown">
                    @switch(app()->getLocale())
                        @case('ru')
                        <a href="{{ route('lang', ['locale'=>'uz']) }}" class="btn btn-default" id="sidebarMenuButton">O'zbekcha</a>
                        @break
                        @case('uz')
                        <a href="{{ route('lang', ['locale'=>'ru']) }}" class="btn btn-default" id="sidebarMenuButton">Русский</a>
                        @break
                    @endswitch
                </div>
            </div>
            <div class="sidebar-search d-block d-lg-none">
            </div>
            <div class="sidebar-header d-none d-lg-block">
                <div class="sidebar-header__wrap">
                </div>
                <div class="sidebar-avatar">
                    <div class="sidebar-avatar__over">
                        @if(isset(Auth::user()->photo))
                            <div class="sidebar-avatar__img"
                                 style="background-image:url('{!! '/'.Auth::user()->photo !!}')"></div>
                        @else
                            <div class="sidebar-avatar__img"
                                 style="background-image:url({{ asset('assets/img/avatar_big.jpg') }})"></div>
                        @endif
                    </div>
                    <div class="sidebar-avatar__content">
                        @if(isset(Auth::user()->direction))
                            <div class="sidebar-avatar__name">{{ Auth::user()->company_name }}</div>
                            <div class="sidebar-avatar__sub">{{ Auth::user()->direction->name }}</div>
                        @elseif(isset(Auth::user()->territory))
                            <div class="sidebar-avatar__name">{{ Auth::user()->company_name }}</div>
                            <div class="sidebar-avatar__sub">{{ Auth::user()->territory->name }}</div>
                        @else
                            <div class="sidebar-avatar__name">{{ Auth::user()->director_fio }}</div>
                            <div class="sidebar-avatar__sub">{{ Auth::user()->company_name }}</div>
                        @endif
                    </div>
                </div>
            </div>
            @yield('navigation')
            <div class="d-flex flex-column justify-content-center">
                <a class="d-flex justify-content-center" href="http://technocorp.uz" target="_blank">
                    <img class="technocorp" src="/assets/img/technocorp.jpg" />
                </a>
                <div class="d-flex text-center">
                    <p style="color: darkgray">Axborot tizimi <a style="color: darkgray" href="http://technocorp.uz" target="_blank">Technocorp</a> tomonidan ishlab chiqilgan</p>
                </div>
            </div>
        </div>
        <div class="page-wrapper">
            <div class="page-content">
                <div class="container">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</div>
<x-notification/>
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.js') }}"></script>
<script src="{{ asset('assets/js/libs.js') }}"></script>
<script src="{{ asset('assets/js/Chart.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/feather.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
@yield('addScripts')
<script src="{{ asset('js/custom.js') }}" defer></script>
<script>
    feather.replace()
</script>
</body>
</html>
