@extends('admin.index')

 @section('title','Admin | Partners')
     

  @section('admin-content')
    <div class="container-fluid">
      <!-- Section: Main panel -->
      <section class="mb-5">

        <!-- Card -->
        <div class="card card-cascade narrower">

          <!-- Section: Chart -->
          <section>

            <!-- Grid row -->
            <div class="row">

              <!-- Grid column -->
              <div class="col-xl-5 col-lg-12 mr-0 pb-2">

                <!-- Card image -->
                <div class="view view-cascade gradient-card-header light-blue lighten-1">
                  <h2 class="h2-responsive mb-0 font-weight-500">Partners</h2>
                </div>

                <!-- Card content -->
                <div class="card-body card-body-cascade pb-0">

                  <!-- Panel data -->
                  <div class="row py-3 pl-4">

                    <!-- First column -->
                    <div class="col-md-6">

                      <!-- Date select -->
                      <p class="lead"><span class="badge info-color p-2">Data range</span></p>
                      <select class="mdb-select colorful-select dropdown-info md-form">
                        <option value="" disabled selected>Choose time period</option>
                        <option value="1">Today</option>
                        <option value="2">Yesterday</option>
                        <option value="3">Last 7 days</option>
                        <option value="3">Last 30 days</option>
                        <option value="3">Last week</option>
                        <option value="3">Last month</option>
                      </select>

                      <!-- Date pickers -->
                      <p class="lead pt-3 pb-4"><span class="badge info-color p-2">Custom date</span></p>
                      <div class="md-form">
                        <input placeholder="Selected date" type="text" id="from" class="form-control datepicker">
                        <label for="date-picker-example">From</label>
                      </div>
                      <div class="md-form">
                        <input placeholder="Selected date" type="text" id="to" class="form-control datepicker">
                        <label for="date-picker-example">To</label>
                      </div>

                    </div>
                    <!-- First column -->

                    <!-- Second column -->
                    <div class="col-md-6 text-center pl-xl-2 my-md-0 my-3">

                      <!-- Summary -->
                      <p>Total sales: <strong>2000$</strong>
                        <button type="button" class="btn btn-info btn-sm p-2" data-toggle="tooltip" data-placement="top"
                          title="Total sales in the given period"><i class="fas fa-question"></i></button>
                      </p>
                      <p>Average sales: <strong>100$</strong>
                        <button type="button" class="btn btn-info btn-sm p-2 mr-0" data-toggle="tooltip"
                          data-placement="top" title="Average daily sales in the given period"><i
                            class="fas fa-question"></i></button>
                      </p>

                      <!-- Change chart -->
                      <span class="min-chart my-4" id="chart-sales" data-percent="76"><span
                          class="percent"></span></span>
                      <h5>
                        <span class="badge red accent-2 p-2">Change <i class="fas fa-arrow-circle-up ml-1"></i></span>
                        <button type="button" class="btn btn-info btn-sm p-2" data-toggle="tooltip" data-placement="top"
                          title="Percentage change compared to the same period in the past"><i
                            class="fas fa-question"></i>
                        </button>
                      </h5>

                    </div>
                    <!-- Second column -->

                  </div>
                  <!-- Panel data -->

                </div>
                <!-- Card content -->

              </div>
              <!-- Grid column -->

              <!-- Grid column -->
              <div class="col-xl-7 col-lg-12 mb-4 pb-2">

                <!-- Chart -->
                <div class="view view-cascade gradient-card-header blue-gradient">

                  <canvas id="lineChart" height="175"></canvas>

                </div>

              </div>
              <!-- Grid column -->

            </div>
            <!-- Grid row -->

          </section>
          <!-- Section: Chart -->

          <!-- Section: Table -->
          <section>

            <!-- Top Table UI -->
            <div class="mb-5 px-4">
              <div class="row">
                 <!-- Grid column -->
                 <div class="col-xl-6 col-md-6">
                    <h1><strong>Partners List</strong> </h1>
                    
                  </div>
                  <div class="col-xl-6  col-md-6 text-right">
                      <a href="/admin/partners/create" class="btn btn-info  ">  Add Partner <i class="fa fa-plus"></i></a>
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
                        <th><a>ID<i class="fas fa-sort ml-1"></i></a></th>
                        <th class="th-lg"><a>Name <i class="fas fa-sort ml-1"></i></a></th>
                        <th class="th-lg"><a>Username<i class="fas fa-sort ml-1"></i></a></th>
                        <th class="th-lg"><a>Email<i class="fas fa-sort ml-1"></i></a></th>
                        <th class="th-lg text-center" colspan="3">Action</th>
                      </tr>
                    </thead>
                    <!-- Table head -->

                    <!-- Table body -->
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                        
                            <th scope="row">{{$user->id}}</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->username}}</td>
                            <td>{{$user->email}}</td>
                            <td><a href="/admin/partners/{{$user->id}}"><i class="fa fa-eye" title="view"></i></a></td>
                            <td><a href="/admin/partners/{{$user->id}}/edit"><i class="fa fa-pencil-alt" title="edit"></i></a></td>
                            <td><a >
                                <i class="fa fa-trash-alt"  title="delete" 
                                  data-userid={{$user->id}} data-username="{{$user->username}}" data-toggle="modal" data-target="#delete">
                                </i>
                              </a>
                           </td>
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
                  <nav class="my-4">
                    <ul class="pagination pagination-circle pg-blue mb-0">

                      <!--First-->
                      <li class="page-item disabled clearfix d-none d-md-block"><a class="page-link">First</a></li>

                      <!-- Arrow left -->
                      <li class="page-item disabled">
                        <a class="page-link" aria-label="Previous">
                          <span aria-hidden="true">&laquo;</span>
                          <span class="sr-only">Previous</span>
                        </a>
                      </li>

                      <!-- Numbers -->
                      <li class="page-item active"><a class="page-link">1</a></li>
                      <li class="page-item"><a class="page-link">2</a></li>
                      <li class="page-item"><a class="page-link">3</a></li>
                      <li class="page-item"><a class="page-link">4</a></li>
                      <li class="page-item"><a class="page-link">5</a></li>

                      <!-- Arrow right -->
                      <li class="page-item">
                        <a class="page-link" aria-label="Next">
                          <span aria-hidden="true">&raquo;</span>
                          <span class="sr-only">Next</span>
                        </a>
                      </li>

                      <!-- First -->
                      <li class="page-item clearfix d-none d-md-block"><a class="page-link">Last</a></li>

                    </ul>
                  </nav>
                  <!-- Pagination -->

                </div>
                <!-- Bottom Table UI -->

              </div>

            </div>
            <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Remove partners</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="/admin/partners/delete" method="POST">

                      @csrf
                      @method('DELETE')
                      
                    <div class="modal-body">
                        <div class="text-center">
                          <p >Are you sure you want to remove</p><p class="font-weigthbold"  id="removeid" ></p>
                        <input type="hidden" name="userid" id="userid" value="">
                        </div>
                        
                    </div>
                    <div class="modal-footer ">
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
            console.log(userid);
            var username = button.data('username');
            console.log(username);
            var modal = $(this);
            
            

            modal.find('#userid').val(userid);
            
            modal.find('#removeid').html('<strong>' + username+ '</strong>')
  
            



        });
        
      
    </script>
@endsection


  

</body>

</html>
