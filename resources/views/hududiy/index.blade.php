@extends('layouts.inner')

@section('navigation')
     {!! $navigation !!}
@endsection

@section('pageTitle', __('Dashboard'))

@section('content')
    <x-entry-badge/>
    <x-user-tiles-by-directions/>
    <x-ukn-stats-of-direction/>
@endsection
