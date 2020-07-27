@extends('layouts.customer-layout')
@section('customer-style')
    <style>
        
        .button:hover{
            cursor: pointer;
        }
        input[type="text"]:read-only {
            background: #ffffff;
        }
    </style>   
@endsection
@section('customer-content')
    <div class="container-fluid  py-5 my-5">
        <div class="card col-lg-6 p-0 mx-auto">

            <h5 class="card-header info-color white-text text-center py-4">
                <strong>Create New Order </strong>
            </h5>

            <!--Card content-->
            <div class="card-body ">
                <form method="POST" action="{{route('orders.store',[Auth::user()->customer])}}">
                    @csrf
                    <div class="md-form ">
                        <select class="mdb-select colorful-select dropdown-info  mx-2 mt-3 md-dropdown  @error('branch') is-invalid border border-danger @enderror" id="branch" name="branch" value="{{ old('branch') }}"  searchable="Search here..">

                            @if($selectedBranch !=null)
                                <option value={{$selectedBranch->id}} selected>{{$selectedBranch->laundry->laundryProfile->name . ' | '. $selectedBranch->city}}</option>
                            @else
                                <option value=0 disabled selected>choose laundry</option>
                            @endif
                            @foreach($branches as $branch)
                                @if ($selectedBranch == null || $selectedBranch->id != $branch->id)
                                    <option value="{{$branch->id}}" >{{$branch->laundry->laundryProfile->name . ' | '. $branch->city}}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('branch')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="md-form mt-3">
                        <select class="mdb-select colorful-select dropdown-info mx-2 md-form mt-3 md-dropdown  @error('service') is-invalid  border border-danger @enderror"
                            id="service" name="service" value="{{ old('service') }}" >
                            <option value=0 disabled selected>choose service</option>

                        </select>
                        @error('service')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="md-form mt-3">
                        <select class="mdb-select colorful-select dropdown-info mx-2 md-form mt-3 md-dropdown  @error('transportation') is-invalid border border-danger @enderror" id="transportation" name="transportation" value="{{ old('transportation') }}" >
                            <option value=0 disabled selected>choose transport type</option>
                            <option value="Walk In">Walk In</option>
                            <option value="Pick-up"> Pick-up</option>
                        </select>
                        @error('transportation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="md-form mt-3">
                        <input type="text" id="pickup_location" name="pickup_location"  class="form-control @error('pickup_location') is-invalid @enderror" autocomplete="pickup_location" value="{{ old('pickup_location') ?? Auth::user()->customer->profile()->city . ' '.  Auth::user()->customer->profile()->street }}"   min="1" max="7">
                        <label for="pickup_location">Pickup Location</label>

                        @error('pickup_location')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="md-form mt-3">
                        <input type="text" id="dropin_location" name="dropin_location"  class="form-control @error('dropin_location') is-invalid @enderror" autocomplete="dropin_location" value="{{ old('dropin_location') ?? Auth::user()->customer->profile()->city . ' '.  Auth::user()->customer->profile()->street }}"   min="1" max="7">
                        <label for="dropin_location">Drop-in Location</label>

                        @error('dropin_location')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <label for="kilo">Kilo</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <div id="plus" class="input-group-text button"> +</div>
                        </div>
                        <input type="text" class="form-control @error('kilo') is-invalid @enderror py-0" id="kilo" name="kilo" value=1 readonly>
                        <div id="minus" class="input-group-append button">
                            <span class="input-group-text"><strong>-</strong></span>
                        </div>
                        @error('kilo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="md-form mt-3">
                        <input placeholder="choose pick-up date or Arrival date" type="text" id="pickupdate" name="pickupdate"  class="form-control datepicker @error('pickupdate') is-invalid @enderror" autocomplete  value="{{ old('pickupdate') }}"  >
                        <label for="pickupdate">Pick-up Date</label>

                        @error('pickupdate')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                    <button type="submit" class="btn btn-info col m-0 btn-rounded">order</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('customer-script')
   <script>
        $(document).ready(function () { 
            let selectedBranch = $("select#branch").children("option:selected").val();
            if(selectedBranch > 0){
                $.get(`/laundry/branch/${selectedBranch}/services`,function (data) {
                    $.each(data, function () { 
                        $("select#service").append(`<option value='${this.name}'> ${this.name}</option>`);
                    });        
                });
            }
    
            $('select#branch').change(function () { 
                let selectedBranch = $(this).children("option:selected").val();
                var servicetoRemove = $('select#service').find('option:not(:first)');
                    if($(servicetoRemove).val() != undefined){
                        $(servicetoRemove).remove()
                    }
                $.get(`/laundry/branch/${selectedBranch}/services`,function (data) {
                    $.each(data, function () { 
                        $("select#service").append(`<option value='${this.name}'> ${this.name}</option>`);
                    });        
                });
            });

            $('#plus').click(function () { 
                let kilo = parseInt($('#kilo').val()) 
                if(kilo <= 6){
                    $('#kilo').val(kilo + 1);
                }else{
                    toastr["warning"]("Maximum is only up to 7 kilo");
                }  
            });

             $('#minus').click(function () { 
                let kilo = parseInt($('#kilo').val()) 
                if(kilo > 1){
                    $('#kilo').val(kilo - 1);
                } 
            });


        });
   </script>
@endsection
