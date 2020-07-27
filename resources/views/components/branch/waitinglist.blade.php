<div class="container mt-5">
    <div class="row">
        <div class="card col-lg-5  p-0 mr-3 ">
            <div class="card-header indigo text-white text-center">
                Waiting List
            </div>
            <div class="card-body">
                <ul class="list-group-flush pl-0">
                    @if ($orders->count() == 0)
                        <li class="list-group-item "><p>No order in waiting list..</p></li>
                    @endif
                    @foreach ($orders as $order )
                        <li class="list-group-item d-flex justify-content-between align-items-center ">  
                           
                            <p class="pt-4">Order ID: {{ $order->id }}  </p>    
                               
                            <form action="{{ route('branch.order.washIn',$order) }}" method="post">
                                @csrf
                                @method('PUT')
                                
                                <button type="submit" class="btn btn-sm btn-primary m-0">Wash in</button>
                            </form>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="card col-lg-5 p-0">
            <div class="card-header indigo text-white text-center">
                Currently Washing
            </div>
            <div class="card-body">
                <ul class="list-group-flush pl-0">
                    @foreach ($ordersWashIn as $order)
               
                        <li class="list-group-item d-flex justify-content-between align-items-center ">
                            <p class="pt-4">Order ID: {{ $order->id }}</p>
                         
                            <form action="{{ route('branch.order.markAsDone',$order) }}" method="post">
                                @csrf
                                @method('PUT')
                        
                                <button type="submit" class="btn btn-sm btn-primary">Mark as done</button>
                            </form> 
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

    </div>
</div>