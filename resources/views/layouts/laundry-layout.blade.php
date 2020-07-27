@extends('layouts.app')

@section('title')
    Laundry | Dashboard
@endsection

@section('sidenav')
    @include('sidenav.laundry')
@endsection

@section('nav')
   @include('navigation.laundry')
@endsection

@section('content')
    @yield('laundry-content')
@endsection

@section('script')
    @yield('laundry-script')
@endsection