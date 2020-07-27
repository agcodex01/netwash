@extends('laundry.index')
@section('title','Customer detail')
    

@section('laundry-content')
    <div class="container row">
   
        <!-- Material form subscription -->
<div class="card col-lg-6 p-0 mx-auto">
        
    <div class="card-header  white-text py-4 d-flex justify-content-start align-items-center " >
            <a href="{{url()->previous()}}" class="mr-5" ><i class="fas fa-arrow-left text-white waves-effect p-2" style="font-size:24px"></i></a>
            <h3 class="text-center  ml-5"><strong >Customer Info</strong></h3>
    </div>
    

    <!--Card content-->
    <div class="card-body ">
            <ul class="list-group ">
               <div class="container-fluid d-flex justify-content-between align-items-end p-0 mb-2">
               
                       <h3>Personal</h3>
            
                        <a href="/laundry/customer/orders/{{$user->id}}" class="btn btn-rounded button btn-info " >Orders >></a>  
               </div>
                <li class="list-group-item d-flex justify-content-between align-items-end p-3">
                        <strong> Name : </strong> 
                  <span class=" ">{{$user->name}}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-end p-3">
                        <strong> Username : </strong> 
                  <span class=" ">{{$user->username}}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-end p-3">
                        <strong> Email : </strong> 
                  <span class=" ">{{$user->email}}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-end p-3">
                        <strong> Address : </strong> 
                  <span class=" ">{{$user->address ? : 'None'}}</span>
                </li>
                
              </ul>
 
       
            

            <!-- Sign in button -->
   
            <div class="container-fluid p-0  ">
 
                    <button class="btn  btn-danger m-0 mt-2 w-100 rounded  waves-effect" value="delete" 
                    data-userid={{$user->id}} data-username="{{$user->username}}" data-toggle="modal" data-target="#delete" >delete</button>
            </div>
            
   

        <!-- Form -->

    </div>

    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content  ">
                <div class="modal-header ">
                  <h5 class="modal-title " id="exampleModalLabel">Remove customer</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="/laundry/customers/delete" method="POST">

                  @csrf
                  @method('DELETE')
                  
                <div class="modal-body">
                
                        <div class="modal-body p-2">
                                <div class="text-center">
                                  <p >Are you sure you want to remove</p><p class="font-weigthbold"  id="removeid" ></p>
                                <input type="hidden" name="userid" id="userid" value="">
                                </div>
                                
                     </div>
                </div>
                <div class="modal-footer text-left">
                  <button type="button" class="btn btn-secondary w-50 rounded my-2 z-depth-0  waves-effect" data-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-primary  w-50 rounded my-2 z-depth-0  waves-effect">Delete</button>
                </div>
              </form>
              </div>
            </div>
          </div>

</div>
<!-- Material form subscription -->
    </div>
@endsection

@section('laundry-script')
    <script>
    
        $('#delete').on('shown.bs.modal', function (event) {

            var button = $(event.relatedTarget);
            var userid = button.data('userid');
            console.log(userid);
            var username = button.data('username');
            console.log(username);
            var modal = $(this);
            console.log(modal);

            modal.find('#userid').val(userid);
            
            modal.find('#removeid').html('<strong>' + username+ '</strong>')
        });
      
    </script>
@endsection
