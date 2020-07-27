@extends('admin.index')

@section('admin-content')
    <div class="container row">
   
        <!-- Material form subscription -->
<div class="card col-lg-6 p-0 mx-auto">

    <h5 class="card-header info-color white-text text-center py-4">
        <strong>Add Customer </strong>
    </h5>

    <!--Card content-->
    <div class="card-body ">

            <form method="POST" action="/admin/customers">
                    @csrf

                    <div class="md-form mt-3">
                        <input type="text" id="address" name="address"  class="form-control @error('address') is-invalid @enderror" autocomplete="address" value="{{ old('address') }}" autofocus >
                        <label for="address">Address</label>
                     
                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                    <div class="md-form mt-3">
                        <select class="mdb-select colorful-select dropdown-info mx-2 md-form mt-3 md-dropdown  @error('type') is-invalid border border-danger @enderror"
                            id="type" name="type" value="{{ old('type') }}" autofocus>
                            <option  disabled selected>choose branch type</option>
                            <option value=0>Main</option>
                            <option value=1>Sub Branch</option>
                    
                        </select>
                        @error('type')
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