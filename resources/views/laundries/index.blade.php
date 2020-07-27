@extends('admin.index')

@section('title')
    Admin | Laundry List
@endsection
@section('admin-content')
  <div class="container-fluid mb-5 pb-5">
    <section class="mb-5">
      <div class="card card-cascade narrower">
        <div class="px-4 pt-3 ">   
          <h1><strong>Laundries List</strong> </h1>   
          <hr>   
        </div>
        @if($errors->any())
          <div class="container">
              @include('inc.flash')
          </div>
        @endif
        <div class="card card-cascade narrower z-depth-0 ">
          <div class="px-4">
            <div class="table-responsive">
              <table class="table table-hover mb-0 text-center">
                <thead class="thead-dark">
                  <tr >
                    <th><a>Owner<i class="fas fa-sort ml-1"></i></a></th>
                    <th class="th-lg"><a>Name <i class="fas fa-sort ml-1"></i></a></th>
                    <th class="th-lg"><a>Pricing<i class="fas fa-sort ml-1"></i></a></th>
                    <th class="th-lg"><a>Branches<i class="fas fa-sort ml-1"></i></a></th>   
                  </tr>
                </thead>
                <tbody>
                  @foreach ($laundries as $laundry)
                    <tr>                      
                      <th scope="row">{{$laundry->owner()}}</th>
                      <td>{{$laundry->laundryName()}}</td>
                      <td>25.00/kg </td>
                      <td><a href="{{route('branch.index',[$laundry])}}" class="btn btn-sm btn-primary">view</a></td>
                    </tr>
                  @endforeach   
                </tbody>
              </table>
            </div>
            <hr class="my-0">
            <div class="d-flex justify-content-between">
                {{$laundries->links()}}
              <div class="my-4">
                <h5> {{$laundries->lastItem()}} out of {{$laundries->total()}}</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection

@section('admin-script')
   
@endsection


  
