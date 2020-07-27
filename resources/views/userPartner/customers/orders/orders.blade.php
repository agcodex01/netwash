@extends('laundry.index')
@section('laundry-content')


 
<div class="card card-cascade narrower z-depth-0 ">

  
 <!-- Top Table UI -->
 <div class="mb-2 mt-3 px-4">
    @include('inc.flash')  
  <div class="row">
     <!-- Grid column -->

     
     <div class="col-xl-6 col-md-6">
       
        <h4><a href="{{url()->previous()}}"><i class="fas fa-chevron-left"></i></a> &nbsp;<strong>{{$customerOrders[0]->name}}</strong>/orders </h4>
        
      </div>
     
  </div>
   
</div>
    <div class="px-4">

      <div class="table-responsive">

        <!--Table-->
        <table class="table table-hover mb-0 text-center">

          <!-- Table head -->
          <thead class="thead-dark">
            <tr >
              <th><a>Order ID<i class="fas fa-sort ml-1"></i></a></th>
              <th class="th-lg"><a>Service type <i class="fas fa-sort ml-1"></i></a></th>
              <th class="th-lg"><a>Total Kilo<i class="fas fa-sort ml-1"></i></a></th>
              <th class="th-lg"><a>Pickup Date<i class="fas fa-sort ml-1"></i></a></th>
              <th class="th-lg"><a>Order Date<i class="fas fa-sort ml-1"></i></a></th>
  
              <th class="th-lg text-center" colspan="2">Action</th>
            </tr>
          </thead>
          <!-- Table head -->

          <!-- Table body -->
          <tbody>
              @foreach ($customerOrders as $customerOrder)
              <tr>
              
                <th scope="row">{{$customerOrder->id}}</th>
      
                <td>{{$customerOrder->service}}</td>
                <td>{{$customerOrder->kilo}}</td>
                <td>{{$customerOrder->pickupdate}}</td>
                <td>{{$customerOrder->created_at}}</td>
                
                  <td><a href="/laundry/customer/order/{{$customerOrder->id}}/edit"><i class="fa fa-pencil-alt" title="edit"></i></a></td>
                  <td><a >
                      <i class="fa fa-trash-alt"  title="delete" 
                        data-userid={{$customerOrder->id}} data-username="{{$customerOrder->name}}" data-toggle="modal" data-target="#delete">
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

      <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Remove partners</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="/laundry/orders/delete" method="POST">

                @csrf
                @method('DELETE')
                
              <div class="modal-body">
                  <div class="text-center">
                    <p >Are you sure you want to remove</p><p class="font-weigthbold"  id="removeid" ></p>
                  <input type="hidden" name="userid" id="userid" value=>
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
@endsection
@section('laundry-script')
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


