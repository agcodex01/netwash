@extends('admin.index')

 
  @section('admin-content')
    <div class="container-fluid">
      <!-- Section: Main panel -->
      <section class="mb-5">

        <!-- Card -->
        <div class="card card-cascade narrower">

        

          <!-- Section: Table -->
          <section>

            <!-- Top Table UI -->
            <div class="mb-5 px-4">
              <div class="row pt-4">
                 <!-- Grid column -->
                 <div class="col-xl-6 col-md-6 ">
                    <h1><strong>Staffs List</strong> </h1>
                    
                  </div>
                  <div class="col-xl-6 col-md-6 text-right">
                      <a href="/admin/customers/create" class="btn btn-info "> <i class="fa fa-plus"></i> Add Staff</a>
                  </div>
                  
              </div>
               
            </div>
            <div class="container">
                @include('inc.flash')
            </div>

            
            <!-- Top Table UI -->

            <div class="card card-cascade narrower z-depth-0 ">

             

              <div class="px-4">

                <div class="table-responsive">

                  <!--Table-->
                  <table class="table table-hover mb-0 text-center">

                    <!-- Table head -->
                    <thead class="thead-dark">
                      <tr >
                          <th class="th-lg"><a>Name <i class="fas fa-sort ml-1"></i></a></th>
                          <th class="th-lg"><a>Username<i class="fas fa-sort ml-1"></i></a></th>
                          <th class="th-lg"><a>Email<i class="fas fa-sort ml-1"></i></a></th>
                          <th class="th-lg"><a>Address<i class="fas fa-sort ml-1"></i></a></th>
                          <th class="th-lg"><a>Laundry<i class="fas fa-sort ml-1"></i></a></th>
                          <th class="th-lg"><a>Branch<i class="fas fa-sort ml-1"></i></a></th>
                      </tr>
                    </thead>
                    <!-- Table head -->

                    <!-- Table body -->
                    <tbody>
                        @foreach ($staffs as $staff)
                        <tr>
                        
                            <td>{{$staff->user->userProfile->name}}</td>
                            <td>{{$staff->user->username}}</td>
                            <td>{{$staff->user->email}}</td>
                            <td>{{$staff->user->userProfile->city . $staff->user->userProfile->street  }}</td>
                            <td>{{$staff->branch->laundry->laundryProfile->name}}</td>
                            <td>{{$staff->branch->city}}</td>
                           
                          </tr>
                        @endforeach
                     
                      
                    </tbody>
                    <!-- Table body -->

                  </table>
                  <!-- Table -->

                </div>

                <hr class="my-0">

                <!-- Bottom Table UI -->
                <div class="d-flex justify-content-between">
                   

                  <!-- Pagination -->
             
  
                  {{$staffs->links()}}
                     
                  <!-- Pagination -->
                  <div class="my-4">
                    <h5> {{$staffs->lastItem()}} out of {{$staffs->total()}}</h5>
                  </div>
                

                </div>
                <!-- Bottom Table UI -->

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
          <!--Section: Table-->

        </div>
        <!-- Card -->

      </section>
      <!-- Section: Main panel -->


    </div>
    @endsection
  <!-- Main layout -->

 

@section('admin-script')
    <script>
    
        $('#delete').on('shown.bs.modal', function (event) {

            var button = $(event.relatedTarget);
            var userid = button.data('userid');
            var username = button.data('username');          
            var modal = $(this);
          
            modal.find('#userid').val(userid);
            
            modal.find('#removeid').html('<strong>' + username+ '</strong>')
           
            



        });
      
    </script>
@endsection


  

</body>

</html>
