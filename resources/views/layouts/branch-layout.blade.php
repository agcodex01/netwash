@extends('layouts.app')

@section('title')
    Branch | Dashboard
@endsection

@section('style')
    <style>
        .counter.counter-lg {
            right: -15px;
            top: -10px !important;
        }
    </style>
    @yield('branch-style')
@endsection

@section('sidenav')
    @include('sidenav.branch')
@endsection

@section('nav')
   @include('navigation.branch')
@endsection

@section('content')
    @yield('branch-content')
@endsection

@section('script')
    @yield('branch-script')
@endsection
