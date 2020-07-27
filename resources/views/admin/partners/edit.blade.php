@extends('admin.index')

@section('admin-content')
    <div class="container row">
   
        <!-- Material form subscription -->
<div class="card col-lg-6 p-0 mx-auto">

    <h3 class="card-header info-color white-text text-center py-4">
        <strong>Edit Partner info </strong>
    </h3>

    <!--Card content-->
    <div class="card-body ">

        <!-- Form -->
        <form  style="color: #757575;" action="/admin/customers/{{$user->id}}" method="POST">
            @csrf
            @method('PUT')
            <div class="text-center">
            <!-- Name -->
                <div class="md-form mt-3">
                    <input type="text" id="name" name="name" class="form-control" value="{{$user->name}}">
                    <label for="name">Name</label>
                </div>
                <div class="md-form mt-3">
                    <input type="text" id="username" name="username" class="form-control" value="{{$user->username}}">
                    <label for="username">Username</label>
                </div>

                <!-- E-mai -->
                <div class="md-form">
                    <input type="email" id="email" name="email" class="form-control" value="{{$user->email}}">
                    <label for="email">E-mail</label>
                </div>
              
                    <select name="role" id="role" class="mdb-select md-form">
                      
                            <option value="1" selected>Customer</option>
                            <option value="2">Partner</option>
               
                    </select>
            
            </div>
            

            <!-- Sign in button -->

            <button type="submit" class="btn btn-success rounded my-4 z-depth-0  waves-effect">edit</button>
           
            <a href="/admin/customers/{{$user->id}}" class="btn btn-danger rounded my-4 z-depth-0  waves-effect">cancel</a>

        </form>
        <!-- Form -->

    </div>

</div>
<!-- Material form subscription -->
    </div>
@endsection

