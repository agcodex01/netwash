@extends('customer.index')

@section('customer-content')
<div class="container p-5  mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card pb-5">
                <div class="card-header bg-white text-center">
                   <h2> Laundry Branches</h2>
                </div>

                <div class="card-body ">
            
        
                        @foreach ($branches as $branch)

                            <div class="container-fluid position-relative">
                                <img src="https://mdbootstrap.com/img/Others/documentation/3.jpg" alt="pic" class="img-fluid ">
                                    <div class="w-75 text-white position-absolute pl-3 bg-gradient-dark" style="bottom:10%;">
                                            <h4>{{ $branch->laundry->laundryProfile->name }}</h4>
                                            <p> <strong>Location :</strong> {{ $branch->address }}</p>
                                            <a href="#" class="btn btn-sm btn-primary">View</a>
                                            <a href="{{route('order.create',[$branch->id])}}" class="btn btn-sm btn-success">Book</a>
                                    </div>
                                
                                <hr>
                            </div>
                            
                        @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
