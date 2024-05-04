@extends('layouts.inner')

@section('navigation')
    {!! $navigation !!}
@endsection

@section('pageTitle', $title)

@section('content')

    <x-ukn-stats-of-direction/>
    <x-stats-by-directions/>

@endsection
