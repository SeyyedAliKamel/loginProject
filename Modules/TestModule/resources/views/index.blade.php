@extends('testmodule::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>Module: {!! config('testmodule.name') !!}</p>
@endsection
