@extends('admin.layout.main')
@section('content')
{{ __('static.dashboard') }}
@if(session()->has('user'))
 {{Auth::user()->firstName}}
@endif
@endsection