@extends('normal-view.layout.base')

{{-- @include('normal-view.layout.navbar') --}}
@include('normal-view.layout.dashboard')

@section('title')
    Dashboard
@endsection

@section('content')
    <p>This is a sample dashboard for normal users </p>
@endsection
