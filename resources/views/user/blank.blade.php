@extends('layouts.inner')

@section('navigation')
    {!! $navigation !!}
@endsection

@section('pageTitle', $title)

@if(isset($use_map) && $use_map)
    @section('addScripts')
        <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=261b165b-6a5b-447e-9efd-f9290d336262" type="text/javascript"></script>
    @endsection
@endif

@section('content')
    {!! $content !!}
@endsection
