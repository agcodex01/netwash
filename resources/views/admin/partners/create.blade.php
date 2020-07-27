@extends('admin.index')

@section('admin-content')
    <div class="container row">
   
        <!-- Material form subscription -->
<div class="card col-lg-6 p-0 mx-auto">

    <h5 class="card-header info-color white-text text-center py-4">
        <strong>Add Partner </strong>
    </h5>

    <!--Card content-->
    <div class="card-body ">

            <form method="POST" action="/admin/partners">
                    @csrf

                    <div class="md-form mt-3">
                        <input type="text" id="name" name="name"  class="form-control @error('name') is-invalid @enderror" autocomplete="name" value="{{ old('name') }}" autofocus >
                        <label for="name">Name</label>
                     
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                    
                    <div class="md-form mt-3">
                            <input type="email" id="email" name="email"  class="form-control @error('email') is-invalid @enderror" autocomplete="email" value="{{ old('email') }}" autofocus >
                            <label for="email">Email</label>
                         
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
    
                    </div>

                    <div class="md-form mt-3">
                            <input type="text" id="username" name="username"  class="form-control @error('username') is-invalid @enderror" autocomplete="username" value="{{ old('username') }}" autofocus >
                            <label for="name">Username</label>
                         
                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
    
                    </div>

                    <div class="md-form mt-3">
                            <input type="password" id="password" name="password"  class="form-control @error('password') is-invalid @enderror" autocomplete="password" value="{{ old('password') }}" autofocus >
                            <label for="password">Password</label>
                         
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
    
                    </div>


                    <button type="submit" class="btn btn-info">create</button>

                   
                </form>
        <!-- Form -->

    </div>

</div>
<!-- Material form subscription -->
    </div>
@endsection