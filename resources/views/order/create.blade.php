
@extends('layouts.app')
@section('title','netWash | Order')
@section('content')
<div class="container">
  <h2>Create new order</h2>
  <form action="/order" method="POST">
  @csrf
  <div class="form-group">
  <label for="laundry">Laundry</label>
      <select class="form-control  @error('laundry') is-invalid @enderror" id="laundry"  value="{{ old('laundry') }}" name="laundry" >
        <option  value =0 >choose laundry</option>
        @foreach($laundries as $laundry)
            <option value="{{$laundry->name}}">{{$laundry->name}}</option>

        @endforeach
      </select>
      @error('laundry')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
  </div>
    <div class="form-group">
      <label for="service">Service type</label>
      <select class="form-control  @error('service') is-invalid @enderror" id="service"  value="{{ old('service') }}" name="service" >
        <option  value= 0>choose service</option>
        <option value=1>wash and fold</option>
        <option value=2> fold</option>
      </select>
      @error('service')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
    </div>
   
    <div class="form-group ">
        <label for="kilo">{{ __('Kilo') }}</label>

       
            <input id="kilo" type="number" class="form-control @error('kilo') is-invalid @enderror" name="kilo" value="{{ old('kilo') }}" min=1 max=7 autocomplete="kilo">
            @error('kilo')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
    
    </div>

    <div class="form-group pmd-textfield pmd-textfield-floating-label">
        <label class="control-label" for="pickupdate">Pick-up Date</label>
        <input type="text" class="form-control  @error('pickupdate') is-invalid @enderror" id="pickupdate"  value="{{ old('pickupdate') }}" required  name="pickupdate" >
        
  </div>
  
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

@endsection


@section('script')
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>



<script>
	// Date picker only
	$('#pickupdate').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'yyyy-mm-dd '
        });
</script>
@endsection