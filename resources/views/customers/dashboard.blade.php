@extends('layouts.customer-layout')

@section('customer-content')
  <div class="container-fluid col-lg-9  pt-5  mb-5">
    <div class="row">
      <div class="col-12">
        <h3>Laundry Branches </h3>
        <hr>
      </div>
      @foreach ($branches as $branch)
        <div class="col-lg-6 mb-3">
          <div class="card h-100 ">
            <div class="view overlay">
              <img class="card-img-top" src="{{ asset('img/logo.png') }}" alt="Card image cap">
              <a>
                <div class="mask flex-center rgba-indigo-light">
                    <a href="{{ route('laundries.profile',[$branch->laundry]) }}" class="btn btn-rounded  btn-primary">View Profile</a>
                </div>
              </a>
            </div>
            <!-- Card content -->
            <div class="card-body">  
              <h4 class="card-title">{{ $branch->laundryName() .' | ' . $branch->city  }}</h4>
              <p><strong>Branch type : </strong> {{ $branch->type ? 'Main' : 'Sub branch' }}</p>
              <p><strong>Pricing : </strong>&#x20b1;25.00/kilo</p>
              <button class="btn btn-indigo btn-rounded w-100 btnReviews" >Reviews</button>
              <div class="container reviews" >
                <p>User</p>
              </div>
              <hr>
              <!-- Text -->
              <label for="location"><strong>Location :</strong></label>
              <p class="card-text" id="location"> {{ $branch->street }}</p>
              <!-- Link -->
              <div class="d-flex align-items-end justify-content-center">
                <a href="{{ route('orders.create',[Auth::user()->customer,$branch]) }}" class="btn btn-outline-primary rounded  w-100" data-toggle="tooltip" data-placement="top" title="Wash with this laundry">
                  Wash In <i class="fa fa-truck text-primary" aria-hidden="true"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div> 
  </div>
@endsection

@section('customer-script')
  <script>

      $(document).ready(function () {
        $('.reviews').hide();  
        $('.btnReviews').click(function () { 
            $(this).closest('div.card-body').find('div.reviews').toggle()
        });
      });
  </script>
@endsection