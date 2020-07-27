@extends('laundry.index')

@section('laundry-content')
    <div class="container row">
   
        <!-- Material form subscription -->
<div class="card col-lg-6 p-0 mx-auto">

    <h5 class="card-header info-color white-text  text-center py-4">
        <strong>Edit Customer order info :</strong>
    </h5>

    <!--Card content-->
    <div class="card-body ">

        <!-- Form -->
        <form  style="color: #757575;" action="/laundry/customer/order/{{$order->id}}" method="POST">
            @csrf
            @method('PUT')
            <div class="text-center">
            <!-- Name -->
                <div class="md-form mt-3">
                    <input type="text" id="service" name="service" class="form-control" value="{{$order->service}}">
                    <label for="name">Service type</label>
                </div>
                <div class="md-form mt-3">
                    <input type="text" id="kilo" name="kilo" class="form-control" value="{{$order->kilo}}">
                    <label for="username">Kilo</label>
                </div>

                <!-- E-mai -->
                <div class="md-form">
                        <input type="text" 
                        id="pickupdate" name="pickupdate"  class="form-control datepicker " 
                        autocomplete="pickupdate" value="{{$order->pickupdate }}"  >
                        <label for="pickupdate">Pick-up Date</label>
                </div>
              
            </div>
            

            <!-- Sign in button -->

            <button type="submit" class="btn btn-success  rounded my-4 z-depth-0  waves-effect">edit</button>
           
            <a href="{{url()->previous()}}" class="btn btn-danger rounded my-4 z-depth-0  waves-effect">cancel</a>

        </form>
        <!-- Form -->

    </div>

</div>
<!-- Material form subscription -->
    </div>
@endsection

