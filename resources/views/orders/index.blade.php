@extends('layouts.customer-layout')
@section('title','Customer | Orders')
@section('customer-content')
<div class="container mt-5">
  <div class="d-flex justify-content-between align-items-center p-2 ">

        <h2 class="pt-2">Orders</h2>
        <a href="{{route('orders.create',[Auth::user()->customer])}}" class="btn btn-primary rounded ">create <span><i class="fa fa-plus"></i></span></a>
  </div>
  <div class="table-responsive">
    <table  class="table table-hover text-center">
      <thead class="thead-dark">
        <tr>
          <th class="th-lg">Laundry</th>
          <th class="th-lg">Service</th>
          <th class="th-lg">Transport</th>
          <th class="th-lg">Pickup Location</th>
          <th class="th-lg">Dropin Location</th>
          <th class="th-lg">Kilo</th>
          <th class="th-lg">Pickup Date</th>
          <th class="th-lg">Total</th>
          <th class="th-lg">Status</th>
      
        </tr>
      </thead>
      <tbody>
        @foreach($orders as $order)
          <tr>
            <td>{{$order->branch->laundry->laundryProfile->name}}</td>
            <td>{{$order->service}}</td>
            <td>{{$order->transportation}}</td>
            <td>{{$order->pickup_location}}</td>
            <td>{{$order->dropin_location}}</td>
            <td>{{$order->kilo}} kg.</td>
            <td>{{$order->pickupdate}}</td>
            <td>&#8369; {{ $order->kilo * 25}}.00 </td>
            <td>
                @if(!$order->status)
                  pending...
                @elseif($order->status && !$order->washed && !$order->done)
                  Waiting ... 
                @elseif($order->status && $order->washed && !$order->done)
                  Washing <span ><i class="fas fa-cog fa-spin"></i></span>
                @elseif($order->status && $order->washed && $order->done)
                  Done <span> <i class="fa fa-check" aria-hidden="true"></i></span>
                @endif
            </td>
          
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection




