@extends('layouts.laundry-layout')
@section('title')
    Laundry | Dashboard
@endsection
@section('laundry-content')
<div class="container-fluid mt-5 ">
        <section>

            <div class="card pl-3 py-3 ">
                <h1>Dashboard</h1>
            </div>

        </section>
        <!-- Section: Main panel -->
        <section class="mb-3">

          <!-- Card -->
          <div class="card card-cascade narrower">



            <!-- Section: Table -->
            <section>

              <!-- Top Table UI -->
              <div class=" px-4">
                <div class="row mt-3">
                   <!-- Grid column -->
                   <div class="col-xl-6 col-md-6">
                      <h3><strong>Staffs List 3</strong> </h3>

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
                    <table class="table table-hover mb-0 text-center table-stripped">

                      <!-- Table head -->
                      <thead class="">
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
                          {{-- @foreach ($partners as $partner) --}}
                          <tr>

                              <th scope="row">asd</th>
                              <td>asd</td>
                              <td>asd</td>
                              <td>asd</td>
                              <td><a href="/admin/partners/"><i class="fa fa-eye" title="view"></i></a></td>
                              <td><a href="/admin/partners/asd/edit"><i class="fa fa-pencil-alt" title="edit"></i></a></td>
                              <td>
                                
                                asd
                             </td>
                            </tr>
                          {{-- @endforeach --}}


                      </tbody>
                      <!-- Table body -->

                    </table>
                    <!-- Table -->

                  </div>

                  <hr class="my-0">

                  <!-- Bottom Table UI -->
                  <div class="d-flex justify-content-between">


                    {{-- {{$partners->links()}} --}}
                    <div class="my-4">
                      {{-- <h5>{{$partners->lastItem()  }} out of {{$partners->total()}}</h5> --}}
                    </div>
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

         <!-- Section: Main panel -->
         <section class="mb-3">

                <!-- Card -->
                <div class="card card-cascade narrower">



                  <!-- Section: Table -->
                  <section>

                    <!-- Top Table UI -->
                    <div class=" px-4">
                      <div class="row mt-3">
                         <!-- Grid column -->
                         <div class="col-xl-6 col-md-6">
                            <h3><strong>Orders list</strong> </h3>

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
                            <thead class="">
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
                                {{-- @foreach ($partners as $partner) --}}
                                <tr>

                                    <th scope="row">asd</th>
                                    <td>asd</td>
                                    <td>asd</td>
                                    <td>asd</td>
                                    <td><a href="/admin/partners/"><i class="fa fa-eye" title="view"></i></a></td>
                                    <td><a href="/admin/partners/asd/edit"><i class="fa fa-pencil-alt" title="edit"></i></a></td>
                                    <td>
                                        {{-- <a >
                                        <i class="fa fa-trash-alt"  title="delete"
                                          data-userid={{$partner->id}} data-username="{{$partner->user->username}}" data-toggle="modal" data-target="#delete">
                                        </i>
                                      </a> --}}
                                      asd
                                   </td>
                                  </tr>
                                {{-- @endforeach --}}


                            </tbody>
                            <!-- Table body -->

                          </table>
                          <!-- Table -->

                        </div>

                        <hr class="my-0">

                        <!-- Bottom Table UI -->
                        <div class="d-flex justify-content-between">


                          {{-- {{$partners->links()}} --}}
                          <div class="my-4">
                            {{-- <h5>{{$partners->lastItem()  }} out of {{$partners->total()}}</h5> --}}
                          </div>
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
