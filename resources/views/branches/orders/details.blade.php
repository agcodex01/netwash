@extends('layouts.branch-layout')
@section('title','Branch | Orders')
@section('branch-content')
  <x-orders.details :order="$order" />
@endsection