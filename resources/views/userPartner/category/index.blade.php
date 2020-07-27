@extends('laundry.index')

@section('laundry-content')
    <div class="container row">
   
        <!-- Material form subscription -->
<div class="card col-lg-6 p-0 mx-auto">

    <h5 class="card-header info-color white-text text-center py-4">
        <strong>Category List </strong>
    </h5>

    <!--Card content-->
    <div class="card-body ">
            <div class="accordion md-accordion" id="category" role="tablist" aria-multiselectable="true">
                    @foreach ($categories as $category)

                    <div class="card">
                    
                            <!-- Card header -->
                            <div class="card-header" role="tab" id="{{$category->id}}">
                              <a class="collapsed" data-toggle="collapse" data-parent="#category" href="#{{$category->name}}"
                                aria-expanded="false" aria-controls="{{$category->name}}">
                                <h5 class="mb-0">
                                        {{$category->name}}<i class="fas fa-angle-down rotate-icon"></i>
                                </h5>
                              </a>
                            </div>
                          
                            <!-- Card body -->
                            <div id="{{$category->name}}" class="collapse " role="tabpanel" aria-labelledby="{{$category->id}}"
                              data-parent="#category">
                              <div class="card-body">
                                  @if (!$category->prices->isEmpty() )
                                    @foreach ($category->prices as $price)
                                        <p><strong>{{$price->description}} </strong>  {{$price->cost}}/ kg.</p>
                                        <hr>  
                                    @endforeach
                                  @else
                                  <p>No Price list</p>
                                  @endif
                                 
                              
                              </div>
                              <button  class="btn btn-sm btn-primary rounded text-center" 
                              data-toggle="modal" data-catid={{$category->id}}  data-target="#addPrice">Add price list</button>
                            </div>
                          
                          </div>
                          <!-- Accordion card -->
                        
                    @endforeach
                    <!-- Accordion card -->
                   
                    
                   
                    
            </div>
                    <!-- Accordion wrapper -->
    </div>
    </div>

</div>
<!-- Material form subscription -->
    </div>

<div class="modal fade" id="addPrice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Price</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form action="/laundry/category/price" method="POST">
    <div class="modal-body">
      
            @csrf
            <input type="hidden" name="category_id" id="category_id">
            <div class="md-form">
                <input type="text" class="form-control" name="description" id="description" value>
                <label for="description">Price Description</label>
            </div>
            <div class="md-form">
                <input type="text" class="form-control" name="cost" id="cost">
                <label for="cost">Price cost</label>
            </div>
        
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
</form>
    </div>
</div>
          </div>
@endsection

@section('laundry-script')
    <script>
    
        $('#addPrice').on('shown.bs.modal', function (event) {

        var button = $(event.relatedTarget);
        var catid = button.data('catid');
        console.log(catid);

        var modal = $(this);
        console.log(modal);

        modal.find('#category_id').val(catid);

        });
    </script>
@endsection