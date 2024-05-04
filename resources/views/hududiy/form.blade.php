@extends('layouts.inner')

@section('addScripts')
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=261b165b-6a5b-447e-9efd-f9290d336262" type="text/javascript"></script>
    <script src="{{ asset('js/map.js') }}" defer></script>
@endsection

@section('navigation')
    {!! $navigation !!}
@endsection

@section('pageTitle', $title)

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="ex-card">
                <h3 class="ex-card-title text-success">
                    <i data-feather="plus" width="25" height="25" class="mr-2"></i> {!! $title !!}
                </h3>
                {!! $content !!}
            </div>
        </div>
    </div>
    @if(isset($useDictionary))
        <x-documents/>
    @endif
@endsection
