@extends('layouts.app')

@section('nav')
{{-- @include('navigation.user') --}}
@endsection
@section('content')
<div class="container mt-2 pr-4 pl-4">
    <div class="row justify-content-center">
        <div class="card profile-card md-50 col-lg-5 ">
            <form class="md-form">
                <!-- Avatar -->
                <div class="avatar z-depth-1-half mb-2">
                    <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(10).jpg" class="rounded-circle w-100" alt="First sample avatar image">              
                </div>
                <div class="file-field col-lg-8 mx-auto">
                    <a class="btn-floating amber darken-2 mt-0 float-left">
                        <i class="fas fa-cloud-upload-alt" aria-hidden="true"></i>
                        <input type="file" multiple id="image">
                    </a>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder="Select Image">
                    </div>
                </div>
                <div class="card-body ">
                
                    <ul class=" list-unstyled">
                        <li><strong>Username: </strong><input type="text" value="old" class="form-control"></li>
                        <li><strong>Bio: </strong><input type="text" value="old" class="form-control"></li>
                        <li><strong>E-mail address: </strong><input type="email" value="old" class="form-control"></li>

                        <li><strong>Phone number: </strong><input type="text" value="old" class="form-control"></li>

                        <li><strong>Fullname: </strong><input type="text" value="old" class="form-control"></li>

                        <li><strong>Location: </strong><input type="text" value="old" class="form-control"></li>

                        <li class="d-flex justify-content-end" >
                            <button type="reset" class="btn btn-danger  btn-sm rounded "><i class="fa fa-times"></i> cancel</button>
                            <button type="submit" class="btn btn-primary  btn-sm rounded"><i class="fa fa-user-edit"></i> Save</button>
                        
                       </li>
                    </ul>

                </div>
        </form>
    </div>
</div>

</div>

@endsection

@section('script')

<script>
    $('input[type="file"]').change(function(e){
            var fileName = e.target.files[0].name;
            console.log(fileName);
            $('.validate').val(fileName);
    });
</script>

@endsection