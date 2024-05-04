@extends('layouts.inner')

@section('navigation')
    {!! $navigation !!}
@endsection

@section('pageTitle', $title)

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="ex-card">
                <h3 class="ex-card-title">
                    <i data-feather="plus" width="25" height="25" class="mr-2"></i> {!! $title !!}
                </h3>
                {!! $content !!}
            </div>
        </div>
    </div>
@endsection
