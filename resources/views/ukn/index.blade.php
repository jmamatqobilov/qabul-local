@extends('layouts.inner')

@section('navigation')
    {!! $navigation !!}
@endsection

@section('pageTitle', $title)

@section('content')
    <x-entry-badge/>
    <x-ukn-tiles/>
    <x-stats-by-hududiys/>
@endsection
