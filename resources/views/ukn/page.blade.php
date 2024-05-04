@extends('layouts.inner')

@section('navigation')
    {!! $navigation !!}
@endsection

@section('pageTitle', $title)

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
                            <div class="col-6">
                                @if(isset($hasHiddens))
                                    <div class="can-toggle demo-rebrand-2 ml-sm-auto">
                                        <form method="GET">
                                            <input id="e" name="show-complete" type="checkbox"@if(request()->filled('show-complete') && request()->get('show-complete') == 'on') checked="true"@endif>
                                            <label for="e">
                                                @if(Auth::user()->is_director && $icon == 'file')
                                                    <div class="can-toggle__switch ml-auto" data-checked="{{ __('All') }}" data-unchecked="{{ __('Action Needed') }}"></div>
                                                @else
                                                    <div class="can-toggle__switch ml-auto" data-checked="{{ __('Complete') }}" data-unchecked="{{ __('In process') }}"></div>
                                                @endif
                                            </label>
                                        </form>
                                    </div>
                                @endif
                                @if(isset($hasButtons))
                                    <div class="text-md-right">
                                        @foreach($hasButtons as $button)
                                            <a href="{{ $button['link'] }}" class="btn-label {!! $button['class'] !!} mb-4">
                                                {!! __($button['name']) !!}
                                                <div class="btn-label__icon">
                                                    <i data-feather="{{ $button['icon'] }}"></i>
                                                </div>
                                            </a>
                                        @endforeach
                                    </div>
                                @endif
                                @if(isset($hasExport))
                                    <a href="{{ route($hasExport, Arr::add(\Request::all(),'option','export')) }}" class="btn-label float-right bg-success mr-3 mb-4">
                                        Excel
                                        <div class="btn-label__icon">
                                            <i data-feather="archive"></i>
                                        </div>
                                    </a>
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
