<div class="container-fluid my-5 ">
    <div class="card card-cascade narrower z-depth-0 ">
        <div class="mb-2 mt-3 px-4">
            @include('inc.flash')  
            <div class="row">         
                <div class="col-xl-6 col-md-6">
                    <h4>
                        <a href="{{url()->previous()}}"><i class="fas fa-chevron-left"></i></a> &nbsp;
                        <strong>{{Auth::user()->staff->branch->city }}</strong>/orders 
                    </h4>    
                </div>  
                <div class="col-xl-6 col-md-6 text-right pr-5">
                    <h4><a href="{{ route('branch.waitingList',[Auth::user()->staff->branch->laundry , Auth::user()->staff->branch]) }}">Waiting list </a> </h4>    
                </div>  
            </div>  
        </div>
        <div class="px-4">
            <div class="table-responsive">
                <table class="table table-hover mb-0 text-center">
        
                    <!-- Table head -->
                    <thead class="thead-dark">
                        <tr >
                        <th class="th-lg"><a>Order ID<i class="fas fa-sort ml-1"></i></a></th>
                        <th>Date Ordered</th>
                        <th>Status</th>
                        <th>Status Update</th>
                        <th class="th-lg">Response</th>
                        
                        </tr>
                    </thead>
                    <!-- Table head -->
            
                    <!-- Table body -->
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td class="pt-4" >
                                    <a href="{{ route('order.details',$order) }}"  data-toggle="tooltip" data-placement="top" title="view order details">{{ $order->id }}</a>
                                </td>
                            
                                <td class="pt-4"> {{ $order->created_at->diffForHumans() }}</td>
                                <td class="pt-4">
                                    @if(!$order->status)
                                        pending...
                                    @elseif($order->status && !$order->washed && !$order->done)
                                        Waiting ... 
                                    @elseif($order->status && $order->washed && !$order->done)
                                        Washing <span ><i class="fas fa-cog fa-spin"></i></span>
                                    @elseif($order->status && $order->washed && $order->done)
                                        Done <span> <i class="fa fa-check" aria-hidden="true"></i></span>
                                    @endif
                                </td>
                                <td>
                                   
                                    <select class="mdb-select md-form m-0 status-upadate" data-order="{{ $order }}" >
                                            <option value="" disabled selected>Choose your option</option>
                                            <option value="1" {{ $order->washed ? 'disabled' : '' }}>Wash In</option>
                                            <option value="2" {{ ($order->done || !$order->washed)  ? 'disabled' : '' }}>Mark As Done</option>
                                    </select>
                                   
                                </td>
                                <td>
                                    @if (!$order->status )
                                        <div class="d-flex justify-content-center">
                                        <form action="{{route('order.accepted',[$order])}}" method="post">
                                                @method('PUT')
                                                @csrf
                                                <button type="submit" class="btn btn-sm {{$order->status ? 'btn-success':'btn-info'}}  rounded"> {{$order->status ? 'Accepted':'Accept'}}</button>
                                            </form>
                                            <form action="{{route('order.declined',[$order])}}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-danger rounded "> Decline</button>
                                        </form>    
                                    </div> 
                                    
                                       
                                    @endif                                         
                                </td>
                            </tr>
                        @endforeach   
                    </tbody> 
                </table> 
            </div>    
            <hr class="my-0">
            <div class="d-flex justify-content-between">
                {{ $orders->links() }}
                <h5 class="mt-4">{{ $orders->lastItem() }} of {{ $orders->total() }} </h5>
            </div>
        </div>
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
            <form action="/laundry/orders/delete" method="POST">

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
