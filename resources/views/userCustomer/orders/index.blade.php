
@extends('layouts.customer-layout')
@section('title','netWash | Order')


@section('customer-content')
@include('inc.flash')
<div class="container">
<div class="d-flex justify-content-between align-items-center p-2 ">

        <h2 class="pt-2">Order</h2>
        <a href="{{route('orders.create',[Auth::user()->customer])}}" class="btn btn-primary rounded ">create <span><i class="fa fa-plus"></i></span></a>
</div>
<div class="table-responsive">
 <!--Table-->
 <table  class="table table-hover text-center">
 <!--Table head-->
   <thead class="table-dark">
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
       <th class="th-lg" colspan="3">Actions</th>
     </tr>
   </thead>
   <!--Table head-->
   <!--Table body-->
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
       @if (!$order->status )
        <td >

          <form action="{{route('order.destroy',[$order])}}" method="post">
            @method('DELETE')
            @csrf
            <a href="{{route('order.edit',[$order])}}" ><i class="fa fa-pencil-alt text-success mr-5" data-toggle="tooltip" data-placement="top" title="Edit your order"></i></a>
            <button type="submit" class=" border bordered-none"><i class="fa fa-trash text-danger" data-toggle="tooltip" data-placement="top" title="Delete your order"></i></button>
          </form>

        </td>


       @else

       <td><a href="#edit" class="btn btn-sm btn-warning btn-rounded m-0">Checkout</a></td>
       @endif



     </tr>
   @endforeach

   </tbody>
   <!--Table body-->
 </table>
 <!--Table-->
</div>
</div>

@endsection


