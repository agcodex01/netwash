@extends('laundry.index')

@section('laundry-content')
    <div class="container row">
   
        <!-- Material form subscription -->
<div class="card col-lg-4 p-0 mx-auto">

    <h5 class="card-header info-color white-text text-center py-4">
        <strong>Add Category </strong>
    </h5>

    <!--Card content-->
    <div class="card-body ">

            <form method="POST" action="/laundry/category/{{$laundry->id}}">
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

                    <button type="submit" class="btn btn-info w-100 m-0">add</button>

                   
                </form>
        <!-- Form -->

    </div>

</div>
<!-- Material form subscription -->
    </div>
@endsection