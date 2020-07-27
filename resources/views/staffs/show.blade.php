@extends('admin.index')

@section('admin-content')
    <div class="container row">
   
        <!-- Material form subscription -->
<div class="card col-lg-6 p-0 mx-auto">

    <h3 class="card-header info-color white-text text-center  py-4">
        <strong>Customer info :</strong>
    </h3>

    <!--Card content-->
    <div class="card-body ">

       
        <ul class="list-group">
            
             <li class="list-group-item d-flex justify-content-between align-items-end p-2">
                     <strong> Name : </strong> 
               <span class=" ">{{$user->name}}</span>
             </li>
             <li class="list-group-item d-flex justify-content-between align-items-end p-2">
                     <strong> Username : </strong> 
               <span class=" ">{{$user->username}}</span>
             </li>
             <li class="list-group-item d-flex justify-content-between align-items-end p-2">
                     <strong> Email : </strong> 
               <span class=" ">{{$user->email}}</span>
             </li>
             <li class="list-group-item d-flex justify-content-between align-items-end p-2">
                     <strong> Address : </strong> 
               <span class=" ">{{$user->address ? : 'None'}}</span>
             </li>
             <li class="list-group-item d-flex justify-content-between align-items-end p-2">
                     <strong> Address : </strong> 
               <span class=" ">{{$user->address ? : 'None'}}</span>
             </li>
           </ul>

       
            

            <!-- Sign in button -->
   
            
            <a href="/admin/customers/{{$user->id}}/edit" class="btn btn-success rounded my-4 z-depth-0  waves-effect">edit</a>
            <input type="submit" class="btn btn-danger rounded my-4 z-depth-0  waves-effect" value="delete" 
            data-userid={{$user->id}} data-username="{{$user->username}}" data-toggle="modal" data-target="#delete" >
   

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
                
                    <p id="removeid" >Are you sure you want to remove</p>
                    <input type="hidden" name="userid" id="userid" value="">
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
            
            console.log(modal.find('#removeid').text(modal.find('#removeid').text() + " " + username))
        });
      
    </script>
@endsection
