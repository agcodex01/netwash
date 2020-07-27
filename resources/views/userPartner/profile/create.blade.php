@extends('layouts.app')

@section('nav')
@include('navigation.user')
@endsection
@section('content')
<div class="container mt-2 pr-4 pl-4">
    <div class="row justify-content-center">
        <div class="card profile-card md-50 col-lg-5 ">
            <form class="md-form" action="/laundry/profile/{{$laundry->id}}" method="POST"> 
                @csrf
                @method('PUT')
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
                        <input class="file-path validate" type="text" placeholder="Select Logo">
                    </div>
                </div>
                <div class="card-body ">
                
                    <ul class="list-unstyled">
                        <li>
                            <!-- Material input -->
                            <div class="md-form">
                                <input type="text" id="name" name="name" class="form-control" value="{{$laundry->name ?:'none'}}">
                                <label for="name"><strong>Name :</strong></label>
                            </div>
                        </li>
                        <li>
                            {{-- <strong>Tag line : </strong>
                            {{-- <input type="text" value="old" class="form-control"> --}}
                            {{-- <textarea name="tagline" id="" cols="30" rows="10" class="form-control p-2 "></textarea> --}} 
                            <div class="md-form mb-4 ">
                                <textarea id="tagline" class="md-textarea form-control" rows="2" style="resize: none;"></textarea>
                                <label for="tagline"><strong>Tagline :</strong></label>
                            </div>
                        </li>
                        <li>
                            <div class="md-form">
                                <input type="text" id="location" name="location" class="form-control" value="{{$laundry->location?:'none'}}">
                                <label for="laction"><strong>Location :</strong></label>
                            </div>
                        </li>

                       

                        <li class="d-flex justify-content-center" >
                            <button type="reset" class="btn btn-danger btn-rounded "><i class="fa fa-times"></i> cancel</button>
                            <button type="submit" class="btn btn-primary btn-rounded"><i class="fa fa-user-edit"></i> Update</button>
                        
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