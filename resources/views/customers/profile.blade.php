@extends('layouts.customer-layout')

@section('customer-style')
   
@endsection
@section('customer-content')
    <div class="container-fluid col-md-6 mt-5 mb-5 pb-3">
        @include('inc.flash')
       <!-- Card -->
        <div class="card testimonial-card">

            <!-- Background color -->
            <div class="card-up indigo lighten-1 "></div>
        
            <!-- Avatar -->
            <div class="avatar mx-auto white view overlay card-img-top" style="width:200px">
                <img src="{{ $customer->image->path  ?? 'https://via.placeholder.com/150' }}" class="rounded-circle "  alt="woman avatar">
                <div class="mask flex-center rgba-indigo-strong ">
                    <button id="update"  class="btn btn-sm btn-rounded  btn-primary">update</button>
                </div>
            </div>
           
            <!-- Content -->
            <div class="card-body">
                <form id="profileUpdate" class="md-form col-md-8 mb-5 mx-auto" action="{{ route('customers.profile.picture.update',[$customer]) }}"  method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') 
                   <div class="row">
                        <div class="col-10 ">
                            <div class="file-field ">
                                <a class="btn-floating pink lighten-1 mt-0 float-left">
                                    <i class="fas fa-paperclip" aria-hidden="true"></i>
                                    <input type="file" id="profile" name="profile" accept="image/x-png,image/gif,image/jpeg" >
                                </a>
                                <div class="file-path-wrapper ">
                                    <input class="file-path validate" type="text" placeholder="Upload one or more files" readonly>
                                </div>
                            </div>
                        </div>
                        <div class=" col-2 ">
                            <span>
                                <button class="btn-floating border border-0  btn-flat m-0 pl-0" data-toggle="tooltip" data-placement="top" title="Update Profile Picture">
                                    <i class="fas fa-save"></i>
                                </button>
                            </span>
                            
                        </div>
                    </div>
                </form>
               
                <h4 class="card-title mb-3 "><i class="fas fa-angle-double-left"></i> {{ $customer->user->username }} <i class="fas fa-angle-double-right"></i></h4>

                <ul class="list-group list-group-flush">
                    <li class="list-group-item border-top-0 text-left ">
                       <p><strong>Name : </strong> {{ $customer->user->userProfile->name }}</p>
                    </li>
                    <li class="list-group-item border-bottom ">
                        <form action="{{ route('customers.profile.city.update',[$customer]) }}" method="post">
                            @csrf
                            @method('PUT')  
                            <div class="md-form input-group mb-0">
                                <input type="text" class="form-control border border-0" id="city" name="city" value="{{ $customer->user->userProfile->city }}" aria-label="City"  autocomplete="off" required>
                                <label for="city">City </label>
                                <div class="input-group-append">
                                    <span class="input-group-text md-addon">
                                        <i class="fa fa-pencil-alt"></i>
                                    </span>
                                    <span class="input-group-text md-addon">
                                        <button type="submit" class="btn-floating border border-0 btn-sm btn-flat" data-toggle="tooltip" data-placement="top" title="Update City">
                                            <i class="fas fa-save"></i>
                                        </button>
                                    </span>
                                </div>
                            </div> 
                        </form>              
                    </li>
                    <li class="list-group-item border-bottom ">
                        <form action="{{ route('customers.profile.street.update',[$customer]) }}" method="post">
                            @csrf
                            @method('PUT') 
                            <div class="md-form input-group mb-0">
                               
                                <input type="text" class="form-control border border-0" id="street" name="street" value="{{ $customer->user->userProfile->street }}" aria-label="Street" autocomplete="off"  required>
                                <label for="street">Street </label>
                                <div class="input-group-append">
                                    <span class="input-group-text md-addon">
                                        <i class="fa fa-pencil-alt"></i>
                                    </span>
                                    <span class="input-group-text md-addon">
                                        <button type="submit" class="btn-floating border border-0 btn-sm btn-flat" data-toggle="tooltip" data-placement="top" title="Update Street">
                                            <i class="fas fa-save"></i>
                                        </button>
                                    </span>
                                </div>
                            </div> 
                        </form>              
                    </li>
                </ul>
                <h3 class="card-title mt-5 mb-3">Contact Info</h3>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item border-top-0 text-left ">
                        <form action="{{ route('customers.profile.email.update',[$customer]) }}" method="post">
                            @csrf
                            @method('PUT') 
                            <div class="md-form input-group mb-0">
                                <input type="email" class="form-control border border-0" id="email" name="email" value="{{ $customer->user->email }}" aria-label="Email" autocomplete="off" >
                                <label for="email">Email </label>
                                <div class="input-group-append">
                                    <span class="input-group-text md-addon">
                                        <i class="fa fa-pencil-alt"></i>
                                    </span>
                                    <span class="input-group-text md-addon">
                                        <button type="submit" class="btn-floating border border-0 btn-sm btn-flat" data-toggle="tooltip" data-placement="top" title="Update Email">
                                            <i class="fas fa-save"></i>
                                        </button>
                                    </span>
                                </div>
                            </div> 
                        </form>              
                    </li>
                    <li class="list-group-item border-bottom ">
                        <form action="{{ route('customers.profile.phoneNumber.update',[$customer]) }}" method="post">
                            @csrf
                            @method('PUT') 
                            <div class="md-form input-group mb-0">
                                <input type="text" class="form-control border border-0" id="phone_number" name="phone_number" value="{{ $customer->user->userProfile->phone_number }}" aria-label="Phone Number" autocomplete="off" >
                                <label for="phone_number">Contact Number </label>
                                <div class="input-group-append">
                                    <span class="input-group-text md-addon">
                                        <i class="fa fa-pencil-alt"></i>
                                    </span>
                                    <span class="input-group-text md-addon">
                                        <button type="submit" class="btn-floating border border-0 btn-sm btn-flat" data-toggle="tooltip" data-placement="top" title="Update Number">
                                            <i class="fas fa-save"></i>
                                        </button>
                                    </span>
                                </div>
                            </div> 
                        </form>              
                    </li>
                </ul>
            </div>
        </div>
        <!-- Card -->
    </div>
@endsection

@section('customer-script')
    <script>
        $(document).ready(function () {
           
            $('#profileUpdate').hide();
            $('span button.btn-floating ').hide();
            $('span i.fa-pencil-alt').hide()

            $('.list-group-item').find('form input ').focus(function(){
                $(this).closest('div.md-form').find('i.fa-pencil-alt').hide();
                $(this).closest('div.md-form').find('button.btn-floating').show();
            })

            $('.list-group-item ').find('form input').focusout(function(){
                $(this).closest('li').find('button.btn-floating ').hide('slow');
            });  
            
            $('.list-group-item').find('form input').keydown(function (e) { 
                $(this).closest('div.md-form').find('button.btn-floating').show();
            });
            $('.list-group-item ').hover(function () {
                if(!$(this).find('form input').is(":focus")) {
                    $(this).find('span i.fa-pencil-alt').show();
                }         
            }, function () {
                $(this).find('span i.fa-pencil-alt').hide();
            }); 
            $('#profile').change(function(e){
                var file = e.target.files[0];
                var fileType = file["type"];
                var validImageTypes = ["image/gif", "image/jpeg", "image/png"];
                if ($.inArray(fileType, validImageTypes) < 0) {
                    toastr["error"]("File is not valid  Select image only")
                    $(this).val('')
                    $('.validate').val('select again');
                }else{
                    $(this).closest('div.row').find('span button.btn-floating ').show(1000,'swing')
                    $('.validate').val(file.name);
                }
                
                
            });

            $('#update').click(function () { 
                $('#profileUpdate').show(500,'swing');
            });

            // Restricts input for the set of matched elements to the given inputFilter function.
            (function($) {
                $.fn.inputFilter = function(inputFilter) {
                    return this.on("input keydown keyup mousedown mouseup focus hover", function() {
                        $(this).closest('div').find('span i.fa-pencil-alt').hide();
                        $(this).closest('li').hover(function(){
                            $(this).closest('div').find('span i.fa-pencil-alt').hide();
                        });
                        if (inputFilter(this.value)) {
                            this.oldValue = this.value;
                            this.oldSelectionStart = this.selectionStart;
                            this.oldSelectionEnd = this.selectionEnd;
                            $(this).closest('div').find('span button.btn-floating').show();
                        } else if (this.hasOwnProperty("oldValue")) {
                            this.value = this.oldValue;
                            this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
                        } else {
                            this.value = "";
                        }
                    });
                };
            }(jQuery)); 

            

            $("#phone_number").inputFilter(function(value) {
                
                return /^\d*$/.test(value);    // Allow digits only, using a RegExp
            });
        });
    </script>
@endsection
