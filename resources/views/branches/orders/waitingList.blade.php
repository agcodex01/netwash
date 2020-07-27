@extends('layouts.branch-layout')
@section('title','Branch | Waiting List')
@section('branch-content')
    <x-branch.waitinglist :orders="$orders" :ordersWashIn="$ordersWashIn"/>
@endsection