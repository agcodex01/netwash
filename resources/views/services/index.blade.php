@extends('layouts.laundry-layout')


  @section('laundry-content')
  <div class="container  mt-5">



<div class="card shadow-4 p-2 mb-3 d-flex flex-row align-items-end ">
    <h3 class="mr-3">Services list </h3> <button class="btn btn-sm  btn-primary" data-laundryid={{ $laundry->id }} data-toggle="modal" data-target="#addService"> Add Service <i class="fa fa-plus"></i></button>
</div>
<!-- Classic tabs -->

<div class="card  classic-tabs border rounded pt-1">

  @if (!$services->isEmpty())
    <ul class="nav tabs-primary nav-justified " id="advancedTab" role="tablist">
      @foreach ($services as $key => $service)
        <li class="nav-item">
          <a class="nav-link {{ $key == 0 ? 'active show' : ''}} " id="description-tab" data-toggle="tab" href="#{{ $service->subName }}" role="tab" aria-controls="{{ $service->name }}" aria-selected="true">{{ $service->name }}</a>
        </li>
      @endforeach
    </ul>

    <div class="tab-content" id="advancedTabContent">
      @foreach ($services as $key => $service)      
        <div class="tab-pane fade {{ $key == 0 ? 'show active' : ''}}" id="{{ $service->subName }}" role="tabpanel" aria-labelledby="description-tab">
            @if (!$service->prices->isEmpty()) 
              <table class="table table-hover table-striped table-bordered mt-3">
                <thead>
                  <th>Price Description</th>
                  <th>Amount</th>
                </thead>
                <tbody>
                  @foreach ($service->prices as  $price) 
                    <tr>
                      <th scope="row" class="w-150  h6">{{ $price->priceDescription }}</th>
                      <td><em>{{ $price->amount }}</em></td>
                    </tr>
                  @endforeach
                </tbody>
              </table>  
            @else
              <div class="container p-3">
                <p>This service has no pricing</p>
              </div>
            @endif
            <div class="container">
              <button class="btn btn-primary rounded" data-serviceid={{ $service->id }} data-toggle="modal" data-target="#addPricing">Add Pricing <i class="fa fa-plus"></i></button>
            </div>
        </div>     
      @endforeach
    </div>
  @else
    <div class="container p-3">
      <p>No Service</p>
    </div>
  @endif
</div>


    


      <!-- Classic tabs -->


      {{-- add SErvice to laundry --}}
<div class="modal fade" id="addService" tabindex="-1" role="dialog" aria-labelledby="addServiceLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addServiceLabel">Add Service</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-2">
        <form action="{{ route('services.store') }}" method="post">
          @csrf
          <input type="hidden" id="laundry" name="laundry">

          <div class="md-form md-outline ">
            <input id="service" class="form-control form-control-lg" type="text" name="service">
            <label for="service">Service Name</label>
          </div>
        
      </div>
      <div class="modal-footer">
        <div class="container">
          <button type="reset" class="btn  btn-secondary rounded" data-dismiss="modal">Close</button>
          <button type="submit" class="btn  btn-primary rounded">Create</button>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="addPricing" tabindex="-1" role="dialog" aria-labelledby="addPricingLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addPricingLabel">Create New Pricing</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('services.add_price') }}" method="post">
          @csrf
          <input type="hidden" id="service" name="service">
          <div class="md-form md-outline ">
            <input id="priceDescription" class="form-control form-control-lg" type="text" name="priceDescription">
            <label for="priceDescription">Price Description</label>
          </div>
          <div class="md-form md-outline ">
            <input id="amount" class="form-control form-control-lg" type="number" name="amount">
            <label for="amount">Amount</label>
          </div>
       
      </div>
      <div class="modal-footer">
          <div class="container">
            <button type="reset" class="btn btn-sm btn-secondary rounded" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-sm btn-primary rounded">Create</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
    @endsection
  <!-- Main layout -->



@section('laundry-script')
    <script>

        $('#addService').on('shown.bs.modal', function (event) {

            var button = $(event.relatedTarget);
            var laundryId = button.data('laundryid');
          
            var modal = $(this);
         
            modal.find('#laundry').val(laundryId);

        });

        $('#addPricing').on('shown.bs.modal', function (event) {

          var button = $(event.relatedTarget);
          var serviceid = button.data('serviceid');

          var modal = $(this);
      
          modal.find('#service').val(serviceid);

        });

    </script>
@endsection




</body>

</html>
