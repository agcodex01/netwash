
@extends('layouts.app')
@section('title','netWash | Order')
@section('content')
<div class="container">
<div class="d-flex justify-content-between align-items-center p-2 ">
 
        <h2 class="pt-2">Order</h2>
        <a href="{{route('order.create')}}" class="btn btn-primary ">create <span><i class="fa fa-plus"></i></span></a>
</div>
<div class="table-responsive">
 <!--Table-->
 <table id="tablePreview" class="table table-bordered table-hover table-sm text-center">
 <!--Table head-->
   <thead>
     <tr>
    
       <th>Laundry</th>
       <th>Service type</th>
       <th># Kilo</th>
       <th>Pickedup Date</th>
       <th>Stataus</th>
     </tr>
   </thead>
   <!--Table head-->
   <!--Table body-->
   <tbody>
   @foreach($orders as $order)
     <tr>
     
       <td>{{$order->laundry}}</td>

       <td>{{$order->service}}</td>
       <td>{{$order->kilo}}</td>
       <td>{{$order->pickupdate}}</td>
       <td>Processing</td>
     </tr>
   @endforeach
    
   </tbody>
   <!--Table body-->
 </table>
 <!--Table-->
</div>
</div>

@endsection


@section('script')
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>



<script>
	// Date picker only
	$('#pickupdate').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'yyyy-mm-dd '
        });
</script>
@endsection