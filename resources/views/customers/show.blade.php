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
               <span class=" ">{{$customer->user->userProfile->name}}</span>
             </li>
             <li class="list-group-item d-flex justify-content-between align-items-end p-2">
                     <strong> Username : </strong> 
               <span class=" ">{{$customer->user->username}}</span>
             </li>
             <li class="list-group-item d-flex justify-content-between align-items-end p-2">
                     <strong> Email : </strong> 
               <span class=" ">{{$customer->user->email}}</span>
             </li>
             <li class="list-group-item d-flex justify-content-between align-items-end p-2">
                     <strong> Address : </strong> 
               <span class=" ">{{$customer->user->userProfile->address ? : 'None'}}</span>
             </li>
           
           </ul>

       
            

            <!-- Sign in button -->
   
            
            <a href="/admin/customers/{{$customer->id}}/edit" class="btn btn-success rounded my-4 z-depth-0  waves-effect">edit</a>
           

        <!-- Form -->

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
