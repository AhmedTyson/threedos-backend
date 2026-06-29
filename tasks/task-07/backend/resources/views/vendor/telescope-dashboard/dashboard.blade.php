@extends('telescope-dashboard::layout')

@section('content')
    <div
        id="telescope-dashboard"
        data-config="{{ json_encode($config) }}"
        data-translations="{{ json_encode($translations) }}"
    ></div>
@endsection
