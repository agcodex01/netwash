@extends('admin.index')


  @section('admin-content')
    <div class="container mt-5">
      <section class="mb-5">
        <div class="card card-cascade narrower">
          <section>
            <div class="mb-5 px-4">
              <div class="row pt-4">
                 <!-- Grid column -->
                 <div class="col-xl-6 col-md-6 pt-2">
                    <h4>
                      <a href="{{url()->previous()}}">
                        <i class="fas fa-chevron-left"></i>
                      </a> &nbsp;<strong>{{$laundryName }}</strong>/ braches list </h4>
                  </div>
                  <div class="col-xl-6 col-md-6 text-right ">
                      <button  class="btn btn-sm btn-info " data-id="{{ $laundry->id }}" data-toggle="modal" data-target="#addBranch">Add Branch <i class="fa fa-plus"></i> </button>
                  </div>
              </div>
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
                        <th><a>Type<i class="fas fa-sort ml-1"></i></a></th>
                        <th><a>Address<i class="fas fa-sort ml-1"></i></a></th>
                        <th class="th-lg"><a>Staffs<i class="fas fa-sort ml-1"></i></a></th>
                        <th class="th-lg text-center">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($branches as $branch)
                        <tr>
                            <th>{{$branch->type ? 'Main' : 'Sub Branch'}}</th>
                            <th>{{$branch->city . ', '. $branch->street}}</th>
                            <td>
                              <a href="/branches" class="btn btn-sm btn-primary">Staffs</a>
                            </td>
                            <td>
                             <form action="#" method="post">
                               @csrf
                               @method('DELETE')
                               <button type="submit" class="btn btn-sm btn-danger m-0">Delete</button>
                             </form>
                            </td>
                          </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
                <hr class="my-0">
                <div class="d-flex justify-content-between">
                      {{$branches->links()}}
                  <div class="my-4">
                    <h5> {{$branches->lastItem()}} out of {{$branches->total()}}</h5>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Remove customer</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="/admin/customers/delete" method="POST">
                      @csrf
                      @method('DELETE')

                    <div class="modal-body">
                        <div class="text-center">
                            <p >Are you sure you want to remove</p><p class="font-weigthbold"  id="removeid" ></p>
                          <input type="hidden" name="userid" id="userid" value="">
                          </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary rounded my-2 z-depth-0  waves-effect" data-dismiss="modal">Cancel</button>
                      <button type="submit" class="btn btn-primary rounded my-2 z-depth-0  waves-effect">Delete</button>
                    </div>
                  </form>
                  </div>
                </div>
              </div>
          </section>
        </div>
      </section>
    </div>
  <div class="modal fade" id="addBranch" tabindex="-1" role="dialog" aria-labelledby="addBranchLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addBranchLabel">Add Branch</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body p-2">
            <form action="{{ route('branches.store') }}" method="post">
              @csrf
              <input type="hidden" id="laundry" name="laundry">
    
              <div class="md-form md-outline ">
                <input id="city" class="form-control form-control-lg" type="text" name="city">
                <label for="city">City</label>
              </div>
              <div class="md-form md-outline ">
                <input id="street" class="form-control form-control-lg" type="text" name="street">
                <label for="street">Street</label>
              </div>
              <div class="md-form ">
                <select class="mdb-select colorful-select dropdown-info mx-2 md-form mt-3 md-dropdown"
                    id="type" name="type">
                    <option value=0 selected>Sub Branch</option>
                    <option value=1>Main</option>
                  
                </select>
              </div>
          </div>
          <div class="modal-footer">
            <div class="container pl-0">
              <button type="reset" class="btn  btn-secondary rounded" data-dismiss="modal">Close</button>
              <button type="submit" class="btn  btn-primary rounded">Create</button>
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>
@endsection
  <!-- Main layout -->



@section('admin-script')
    <script>

        $('#addBranch').on('shown.bs.modal', function (event) {

            var button = $(event.relatedTarget);
            var id = button.data('id');
            var modal = $(this);
            modal.find('#laundry').val(id);
        });

    </script>
@endsection




</body>

</html>
