
@extends('customer.index')

<!-- Main layout -->
  @section('customer-content')
  

        
<div class="card col-lg-6 p-0 mx-auto">

      <h5 class="card-header info-color white-text text-center py-4">
          <strong>Edit Order </strong>
      </h5>
    
      <!--Card content-->
      <div class="card-body ">
    
              <form method="POST" action="{{route('order.update',[$order])}}">
                     @method('PUT')
                      @csrf
    
                        <div class="md-form mt-3">
                             
                                <select class="mdb-select colorful-select dropdown-info  mx-2 mt-3 md-dropdown  @error('branch') is-invalid @enderror"
                                    id="branch" name="branch" value="{{ old('branch') }}" autofocus searchable="Search here..">

                                    @foreach($branches as $branch)

                                        @if ($order->branch->id != $branch->id)
                                            <option value={{$branch->id }} >{{$branch->laundry->laundryProfile->name}}</option>
                                        @else
                                            <option value={{$order->branch->id }} selected>{{$order->branch->laundry->laundryProfile->name}}</option>
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
                                <select class="mdb-select colorful-select dropdown-info mx-2 md-form mt-3 md-dropdown  @error('service') is-invalid @enderror"
                                    id="service" name="service" value="{{ old('service') }}" autofocus>
                                    <option value=0 disabled selected>choose service</option>
                                    <option value="wash and fold"  {{ $order->service == "wash and fold"? 'selected' : ''}}>wash and fold</option>
                                    <option value="fold" {{ $order->service == "fold"? 'selected' : ''}}> fold</option>
                            
                                </select>
                                @error('service')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                               @enderror
                        </div>
                        <div class="md-form mt-3">
                          <select class="mdb-select colorful-select dropdown-info mx-2 md-form mt-3 md-dropdown  @error('transportation') is-invalid @enderror"
                              id="transportation" name="transportation" value="{{ old('transportation') }}" autofocus>
                              <option value=0 disabled selected>choose transport type</option>
                              <option value="Walk In" {{ $order->transportation == "Walk In" ? 'selected' : ''}}>Walk In</option>
                              <option value="Pick-up" {{ $order->transportation == "Pick-up" ? 'selected' : ''}}> Pick-up</option>
                      
                          </select>
                          @error('transportation')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                      
    
                      <div class="md-form mt-3">
                              <input type="text" id="pickup_location" name="pickup_location"  class="form-control @error('pickup_location') is-invalid @enderror" autocomplete="pickup_location" value="{{ $order->pickup_location}}" autofocus  min="1" max="7">
                              <label for="pickup_location">Pickup Location</label>
                           
                              @error('pickup_location')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
      
                      </div>

                      <div class="md-form mt-3">
                              <input type="text" id="dropin_location" name="dropin_location"  class="form-control @error('dropin_location') is-invalid @enderror" autocomplete="dropin_location" value="{{ $order->dropin_location}}" autofocus  min="1" max="7">
                              <label for="dropin_location">Drop-in Location</label>
                           
                              @error('dropin_location')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
      
                      </div>
                      
    
                      
                      <div class="md-form mt-3">
                              <input type="number" id="kilo" name="kilo"  class="form-control @error('kilo') is-invalid @enderror" autocomplete="kilo" value="{{ $order->kilo }}" autofocus  min="1" max="7">
                              <label for="kilo">Kilo</label>
                           
                              @error('kilo')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
      
                      </div>
    
                      <div class="md-form mt-3">
                              <input placeholder="choose pick-up date or Arrival date" type="text" 
                              id="pickupdate" name="pickupdate"  class="form-control datepicker @error('pickupdate') is-invalid @enderror" 
                              autocomplete="pickupdate" value="{{ $order->pickupdate}}" autofocus >
                              <label for="pickupdate">Pick-up Date</label>
                           
                              @error('pickupdate')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
      
                      </div>
    
                     
    
    
                      <button type="submit" class="btn btn-info col m-0 btn-rounded">update</button>
    
                     
                  </form>
          <!-- Form -->
    
      </div>
    
    </div>
    <!-- Material form subscription -->
      </div>
  @endsection


<!-- Main layout -->




