@extends('layouts.app')

@section('title')
    Staff | Dashboard
@endsection

@section('sidenav')
    @include('sidenav.staff')
@endsection

@section('nav')
   @include('navigation.staff')
@endsection

@section('content')
    @yield('staff-content')
@endsection