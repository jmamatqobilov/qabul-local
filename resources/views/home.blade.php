@extends('layouts.app')

@section('navigation')
    {!! $navigation !!}
@endsection

@section('content')

    <x-user-tiles-by-directions/>

@endsection
