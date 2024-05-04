@extends('layouts.inner')

@section('navigation')
    {!! $navigation !!}
@endsection

@section('pageTitle', $title)

{{-- this section moved to layout --}}
{{--@section('addHeadScripts')--}}
{{--    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=261b165b-6a5b-447e-9efd-f9290d336262" type="text/javascript"></script>--}}
{{--@endsection--}}

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="ex-card px-0">
                <div class="table-list">
                    <div class="title-content">
                        <div class="row justify-content-between">
                            <div class="col-6">
                                <h3 class="table-list-title text-primary-2n">
{{--                                    @dd($title)--}}
                                    <i data-feather="{!! $icon !!}" class="mr-2"></i> {!! $title !!}
                                </h3>
                            </div>
                        </div>
                    </div>
                    <x-objects-on-map/>
                </div>
            </div>
        </div>
    </div>
@endsection
