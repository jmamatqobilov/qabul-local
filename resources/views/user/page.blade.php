@extends('layouts.inner')

@section('navigation')
    {!! $navigation !!}
@endsection

@section('pageTitle', $title)

@if(isset($use_map) && $use_map)
    @section('addScripts')
        <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=261b165b-6a5b-447e-9efd-f9290d336262" type="text/javascript"></script>
        <script src="{{ asset('js/map.js') }}" defer></script>
    @endsection
@endif

@section('content')
    <div class="row">
         <div class="col-md-12">
            <div class="ex-card px-0">
                <div class="table-list">
                    <div class="title-content">
                        <div class="row justify-content-between">
                            <div class="col-6">
                                <h3 class="table-list-title text-primary-2n">
                                    <i data-feather="{!! $icon !!}" class="mr-2"></i> {!! $title !!}
                                </h3>
                            </div>
                            <div class="col-6 d-flex">
                                @if(isset($hasButtons))
                                    <div class="text-md-right">
                                        @foreach($hasButtons as $button)
                                            <a href="{{ $button['link'] }}" class="btn-label {!! $button['class'] !!}">
                                                {!! __($button['name']) !!}
                                                <div class="btn-label__icon">
                                                    <i data-feather="{{ $button['icon'] }}"></i>
                                                </div>
                                            </a>
                                        @endforeach
                                    </div>
                                @endif
                                @if(isset($hasHiddens))
                                    <div class="can-toggle demo-rebrand-2 ml-sm-auto">
                                        <form method="GET">
                                            <input id="e" name="show-complete" type="checkbox"@if(request()->filled('show-complete') && request()->get('show-complete') == 'on') checked="true"@endif>
                                            <label for="e">
                                                <div class="can-toggle__switch ml-auto" data-checked="{{ __('Complete') }}" data-unchecked="{{ __('In process') }}"></div>
                                            </label>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    {!! $content !!}
                </div>
            </div>
        </div>
    </div>
@endsection
