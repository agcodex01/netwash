@extends('admin.index')
@section('title')
    Admin | Dashboard
@endsection
 
  @section('admin-content')
    <div class="container-fluid my-5 pb-5">

      <!-- Section: Intro -->
      <section class="mt-md-4 pt-md-2 mb-5 pb-4 " >

        <!-- Grid row -->
        <div class="row">

            <!-- Grid column -->
          <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">

            <!-- Card -->
            <div class="card card-cascade cascading-admin-card">

              <!-- Card Data -->
              <div class="admin-up">
                <a type="button" href="{{route('customers.index')}}">
                <i class="far fa-user primary-color mr-3 z-depth-2"></i>
              </a>
                <div class="data">
                  <p class="text-uppercase">Customers</p>
                  <h4 class="font-weight-bold dark-grey-text">{{$customers->count()}}</h4>
                </div>
              </div>

              <!-- Card content -->
              <div class="card-body card-body-cascade">
                <div class="progress mb-3">
                  <div class="progress-bar bg-primary" role="progressbar" style="width: 25%" aria-valuenow="25"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="card-text">Better than last week (25%)</p>
              </div>

            </div>
            <!-- Card -->

          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">

            <!-- Card -->
            <div class="card card-cascade cascading-admin-card">

              <!-- Card Data -->
              <div class="admin-up">
                <a href="/admin/partners">
                    <i class="fas fa-users warning-color mr-3 z-depth-2"></i>
                </a>
                <div class="data">
                  <p class="text-uppercase">Partners</p>
                  <h4 class="font-weight-bold dark-grey-text">{{$partners->count()}}</h4>
                </div>
              </div>

              <!-- Card content -->
              <div class="card-body card-body-cascade">
                <div class="progress mb-3">
                  <div class="progress-bar red accent-2" role="progressbar" style="width: 25%" aria-valuenow="25"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="card-text">Worse than last week (25%)</p>
              </div>

            </div>
            <!-- Card -->

          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-xl-3 col-md-6 mb-md-0 mb-4">

            <!-- Card -->
            <div class="card card-cascade cascading-admin-card">

              <!-- Card Data -->
              <div class="admin-up">
                
                <a type="button" href="{{ route('staffs.index')}}">
                  <i class="fas fa-chart-pie light-blue lighten-1 mr-3 z-depth-2"></i>
               
                </a>
                <div class="data">
                  <p class="text-uppercase">Staffs</p>
                  <h4 class="font-weight-bold dark-grey-text">{{$staffs->count()}}</h4>
                </div>
              </div>

              <!-- Card content -->
              <div class="card-body card-body-cascade">
                <div class="progress mb-3">
                  <div class="progress-bar red accent-2" role="progressbar" style="width: 75%" aria-valuenow="75"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="card-text">Worse than last week (75%)</p>
              </div>

            </div>
            <!-- Card -->

          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-xl-3 col-md-6 mb-0">

            <!-- Card -->
            <div class="card card-cascade cascading-admin-card">

              <!-- Card Data -->
              <div class="admin-up">
                <a href="">
                    <i class="fas fa-chart-bar red accent-2 mr-3 z-depth-2"></i>

                </a>
                <div class="data">
                  <p class="text-uppercase">Request</p>
                  <h4 class="font-weight-bold dark-grey-text">2000</h4>
                </div>
              </div>

              <!-- Card content -->
              <div class="card-body card-body-cascade">
                <div class="progress mb-3">
                  <div class="progress-bar bg-primary" role="progressbar" style="width: 25%" aria-valuenow="25"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="card-text">Better than last week (25%)</p>
              </div>

            </div>
            <!-- Card -->

          </div>
          <!-- Grid column -->

        </div>
        <!-- Grid row -->

      </section>
      <!-- Section: Intro -->

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
                <div class="view view-cascade gradient-card-header light-blue lighten-1 p-3">
                  <h2 class="h2-responsive mb-0 font-weight-500 ">Customers</h2>
                </div>

               

              </div>
              <!-- Grid column -->

           

            </div>
            <!-- Grid row -->

          </section>
          <!-- Section: Chart -->

          <!-- Section: Table -->
          <section>


            <div class="card card-cascade narrower z-depth-0">

            

              <div class="px-4">

                <div class="table-responsive">

                  <!--Table-->
                  <table class="table table-hover  mb-0 ">

                    <!-- Table head -->
                    <thead class="thead-dark">
                      <tr>
                      
                        <th class="th-lg"><a>Name <i class="fas fa-sort ml-1"></i></a></th>
                        <th class="th-lg"><a>Username<i class="fas fa-sort ml-1"></i></a></th>
                        <th class="th-lg"><a>Email<i class="fas fa-sort ml-1"></i></a></th>
                        <th class="th-lg"><a>Address<i class="fas fa-sort ml-1"></i></a></th>
                      </tr>
                    </thead>
                    <!-- Table head -->

                    <!-- Table body -->
                    <tbody>
                    @foreach ($customers->take(5) as $customer)
                    <tr>
                     
                      <td>{{$customer->user->userProfile->name}}</td>
                      <td>{{$customer->user->username}}</td>
                      <td>{{$customer->user->email}}</td>
                      <td>{{$customer->user->userProfile->city . $customer->user->userProfile->street}}</td>
                  
                    </tr>
                    @endforeach
                   
                   
                     
                     
                    </tbody>
                    <!-- Table body -->

                  </table>
                  <!-- Table -->

                </div>

                <hr class="my-0">

                <!-- Bottom Table UI -->
                <div class="d-flex justify-content-between py-3 ">

                  <!-- Name -->
                 <a href="{{route('customers.index')}}" class="btn btn-sm btn-outline-primary btn-rounded">Show More <i class="fa fa-arrow-right"></i></a>

               

                </div>
                <!-- Bottom Table UI -->

              </div>

            </div>

          </section>
          <!--Section: Table-->

          

        </div>
        <!-- Card -->

      </section>
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
                  <div class="view view-cascade gradient-card-header light-blue lighten-1 p-3">
                    <h2 class="h2-responsive mb-0 font-weight-500">Partners</h2>
                  </div>
  
                 
  
                </div>
                <!-- Grid column -->
  
             
  
              </div>
              <!-- Grid row -->
  
            </section>
            <!-- Section: Chart -->
  
            <!-- Section: Table -->
            <section>
  
  
              <div class="card card-cascade narrower z-depth-0">
  
              
  
                <div class="px-4">
  
                  <div class="table-responsive">
  
                    <!--Table-->
                    <table class="table table-hover  mb-0 ">
  
                      <!-- Table head -->
                      <thead class="thead-dark">
                        <tr>
                        
                          <th class="th-lg"><a>Name <i class="fas fa-sort ml-1"></i></a></th>
                          <th class="th-lg"><a>Username<i class="fas fa-sort ml-1"></i></a></th>
                          <th class="th-lg"><a>Email<i class="fas fa-sort ml-1"></i></a></th>
                          <th class="th-lg"><a>Address<i class="fas fa-sort ml-1"></i></a></th>
                          <th class="th-lg"><a>Laundry<i class="fas fa-sort ml-1"></i></a></th>
                        </tr>
                      </thead>
                      <!-- Table head -->
  
                      <!-- Table body -->
                      <tbody>
                      @foreach ($partners->take(5) as $partner)
                      <tr>
                       
                        <td>{{$partner->user->userProfile->name}}</td>
                        <td>{{$partner->user->username}}</td>
                        <td>{{$partner->user->email}}</td>
                        <td>{{$partner->user->userProfile->city . $partner->user->userProfile->street}}</td>
                        <td>{{$partner->laundry->laundryProfile->name}}</td>
                    
                      </tr>
                      @endforeach
                     
                     
                       
                       
                      </tbody>
                      <!-- Table body -->
  
                    </table>
                    <!-- Table -->
  
                  </div>
  
                  <hr class="my-0">
  
                  <!-- Bottom Table UI -->
                  <div class="d-flex justify-content-between py-3 ">
  
                    <!-- Name -->
                   <a href="{{route('partners.index')}}" class="btn btn-sm btn-outline-primary btn-rounded">Show More <i class="fa fa-arrow-right"></i></a>
  
                 
  
                  </div>
                  <!-- Bottom Table UI -->
  
                </div>
  
              </div>
  
            </section>
            <!--Section: Table-->
  
            
  
          </div>
          <!-- Card -->
  
        </section>

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
                    <div class="view view-cascade gradient-card-header light-blue lighten-1 p-3">
                      <h2 class="h2-responsive mb-0 font-weight-500">Staffs</h2>
                    </div>
    
                   
    
                  </div>
                  <!-- Grid column -->
    
               
    
                </div>
                <!-- Grid row -->
    
              </section>
              <!-- Section: Chart -->
    
              <!-- Section: Table -->
              <section>
    
    
                <div class="card card-cascade narrower z-depth-0">
    
                
    
                  <div class="px-4">
    
                    <div class="table-responsive">
    
                      <!--Table-->
                      <table class="table table-hover  mb-0 ">
    
                        <!-- Table head -->
                        <thead class="thead-dark">
                          <tr>
                          
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
                          <td>{{$staff->user->userProfile->city . $staff->user->userProfile->street}}</td>
                          <td>{{$staff->branch->laundry->laundryProfile->name}}</td>
                          <td>{{$staff->branch->city . ', '. $staff->branch->street}}</td>
                      
                        </tr>
                        @endforeach
                       
                       
                         
                         
                        </tbody>
                        <!-- Table body -->
    
                      </table>
                      <!-- Table -->
    
                    </div>
    
                    <hr class="my-0">
    
                    <!-- Bottom Table UI -->
                    <div class="d-flex justify-content-between py-3 ">
    
                      <!-- Name -->
                     <a href="{{route('staffs.index')}}" class="btn btn-sm btn-outline-primary btn-rounded">Show More <i class="fa fa-arrow-right"></i></a>
    
                   
    
                    </div>
                    <!-- Bottom Table UI -->
    
                  </div>
    
                </div>
    
              </section>
              <!--Section: Table-->
    
              
    
            </div>
            <!-- Card -->
    
          </section>

   

    </div>
    @endsection
  <!-- Main layout -->
</body>

</html>
