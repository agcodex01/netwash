@extends('admin.index')

@section('admin-content')
    <div class="container row">
   
        <!-- Material form subscription -->
<div class="card col-lg-6 p-0 mx-auto">

    <h5 class="card-header info-color white-text  py-4">
        <strong>{{$user->name}}/laundry :</strong>
    </h5>

    <!--Card content-->
    <div class="card-body ">

       
           {{-- <div class="row">
               <div class="col-6 "><h4></h4></div>
               <div class="col-6 "> <h5 class="pt-1">/h5></div>
               <div class="col-6 "><h4>Username : </h4></div>
               <div class="col-6 "> <h5 class="pt-1">{{$user->username}}</h5></div>
               <div class="col-6 "><h4>Email : </h4></div>
               <div class="col-6 "> <h5 class="pt-1">{{$user->email}}</h5></div>
               <div class="col-6 "><h4>Role : </h4></div>
               <div class="col-6 "> <h5 class="pt-1">Partner</h5></div>
           </div> --}}

           <ul class="list-group">

                <li class="list-group-item d-flex justify-content-between align-items-end p-2">
                        <strong> Name : </strong> 
                  <span class=" ">{{$user->laundry->name ?:'none'}}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-end p-2">
                        <strong> Description : </strong> 
                  <span class=" ">{{$user->laundry->description ?:'none'}}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-end p-2">
                        <strong> Location : </strong> 
                  <span class=" ">{{$user->laundry->location ?:'none'}}</span>
                </li>
                {{-- <li class="list-group-item d-flex justify-content-between align-items-center">
                  Dapibus ac facilisis in
                  <span class="badge badge-primary badge-pill">2</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  Morbi leo risus
                  <span class="badge badge-primary badge-pill">1</span>
                </li> --}}
              </ul>
 
       
            

            <!-- Sign in button -->
   
            <div class="text-right">
                    <a href="/admin/partners/laundry/{{$user->id}}/edit" class="btn  btn-success rounded my-4 z-depth-0  waves-effect">edit</a>
            </div>
            
   

        <!-- Form -->

    </div>

    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Remove customer</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="/admin/customers/delete" method="POST">

                  @csrf
                  @method('DELETE')
                  
                <div class="modal-body">
                
                        <div class="modal-body">
                                <div class="text-center">
                                  <p >Are you sure you want to remove</p><p class="font-weigthbold"  id="removeid" ></p>
                                <input type="hidden" name="userid" id="userid" value="">
                                </div>
                                
                     </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary rounded my-2 z-depth-0  waves-effect" data-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-primary rounded my-2 z-depth-0  waves-effect">Delete</button>
                </div>
              </form>
              </div>
            </div>
          </div>

</div>
<!-- Material form subscription -->
    </div>
@endsection

@section('admin-script')
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
