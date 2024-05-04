<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/favicon.png') }}"/>
    <title>@yield('pageTitle') - {{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/libs/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/libs/libs.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/fonts.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css') }}">
</head>
<body>
<div class="login-page d-flex flex-column justify-content-center align-items-center">
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
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.js') }}"></script>
<script src="{{ asset('assets/js/feather.min.js') }}"></script>
<script src="{{ asset('assets/js/libs.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
<script>
    feather.replace()
</script>
</body>
</html>
