@extends('laundry.index');


@section('laundry-content')
<div class="container mb-5">
    
  <div class="row">
    <div class="col-md-6 mx-auto  mb-5">
        @include('inc.flash')
    <!-- Card -->
<div class="card ">

<!-- Card image -->
<img class="card-img-top" height="300px" src="https://mdbootstrap.com/img/Photos/Others/images/43.jpg" alt="Card image cap"  >

<!-- Card content -->
<div class="card-body p-0">

 <!-- Classic tabs -->
<div class="classic-tabs" >

<ul class="nav tabs-indigo  rounded-0  d-flex justify-content-center " id="myClassicTabShadow" role="tablist" >
  <li class="nav-item " style="margin-left:0px;" >
    <a class="nav-link  waves-light active show" id="profile-tab-classic-shadow" data-toggle="tab" href="#profile-classic-shadow"
      role="tab" aria-controls="profile-classic-shadow" aria-selected="true">Profile</a>
  </li>
  <li class="nav-item">
    <a class="nav-link waves-light" id="pricing-tab-classic-shadow" data-toggle="tab" href="#pricing-classic-shadow"
      role="tab" aria-controls="pricing-classic-shadow" aria-selected="false">Pricing</a>
  </li>
  <li class="nav-item">
    <a class="nav-link waves-light" id="services-tab-classic-shadow" data-toggle="tab" href="#services-classic-shadow"
      role="tab" aria-controls="services-classic-shadow" aria-selected="false">Services</a>
  </li>
  <li class="nav-item">
    <a class="nav-link  waves-light" id="contact-tab-classic-shadow" data-toggle="tab" href="#contact-classic-shadow"
      role="tab" aria-controls="contact-classic-shadow" aria-selected="false">Contact</a>
  </li>
  <li class="nav-item">
    <a class="nav-link  waves-light" id="about-tab-classic-shadow" data-toggle="tab" href="#about-classic-shadow"
      role="tab" aria-controls="about-classic-shadow" aria-selected="false">About</a>
  </li>
</ul>

<div class="tab-content card" id="myClassicTabContentShadow">
  <div class="tab-pane fade active show" id="profile-classic-shadow" role="tabpanel" aria-labelledby="profile-tab-classic-shadow">
    <ul class="list-group">
        <li class="list-group-item d-flex justify-content-between align-item-end ">
          <strong>Laundry Name : </strong>
          <span>{{$laundry->name?:'none'}}</span>
        </li>
        <li class="list-group-item ">
          <strong>Tag Line : </strong>
          <p class="text-justify">temporary tagline Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel id voluptate voluptatum sunt eveniet excepturi corporis aliquam cumque doloremque qui culpa, vero aspernatur commodi reiciendis ad iusto facilis totam pariatur!</p>
        </li>
        <li class="list-group-item d-flex justify-content-between align-item-end">
          <strong><strong>Location : </strong> </strong>
          <span>{{$laundry->location?:'none'}}</span>
        </li>
    </ul>

     
    <a href="/laundry/profile/{{$laundry->id}}/edit" class="btn btn-primary rounded w-100 mt-2 m-0">Edit</a>
    
  </div>
 
  <div class="tab-pane fade" id="pricing-classic-shadow" role="tabpanel" aria-labelledby="pricing-tab-classic-shadow">
    <!--Accordion wrapper-->
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
                  
                 <button  class="btn btn-sm btn-primary rounded text-center" 
              data-toggle="modal" data-catid={{$category->id}}  data-target="#addPrice">Add price list</button>
              
              </div>
              
            </div>
          
          </div>
          <!-- Accordion card -->
        
    @endforeach
</div>
<!-- Accordion wrapper -->
  </div>
  <div class="tab-pane fade" id="services-classic-shadow" role="tabpanel" aria-labelledby="services-tab-classic-shadow">
    <p>services </p>
  </div>
  <div class="tab-pane fade" id="contact-classic-shadow" role="tabpanel" aria-labelledby="contact-tab-classic-shadow">
    <p>contact</p>
  </div>
  <div class="tab-pane fade" id="about-classic-shadow" role="tabpanel" aria-labelledby="about-tab-classic-shadow">
    <p>about</p>
  </div>
</div>

</div>
<!-- Classic tabs -->

  

</div>

</div>
<!-- Card -->
    </div>
  </div>
</div>


@endsection