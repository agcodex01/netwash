@extends('layouts.app')

@section('nav')
@include('navigation.user')
@endsection
@section('content')
<div class="container mt-3 pr-4 pl-4">
<div class="row justify-content-center">

<div class="card profile-card md-50 col-lg-6 col-sm-1">

<!-- Avatar -->
<div class="avatar z-depth-1-half mb-4">
  <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(10).jpg" class="rounded-circle w-100" alt="First sample avatar image">
</div>

<div class="card-body  pt-0 mt-0">
  <!-- Name -->
  <div class="text-center">
    <h3 class="mb-3 font-weight-bold"><strong>User name</strong></h3>
    <h6 class="font-weight-bold blue-text mb-4">About yourself</h6>
  </div>

  <ul class="striped list-unstyled">
    <li><strong>E-mail address:</strong> a.doe@example.com</li>

    <li><strong>Phone number:</strong> +1 234 5678 90</li>

    <li><strong>Fullname:</strong> Lorem ipsum</li>

    <li><strong>Location:</strong>Talamban, Cebu City</li>

    <li class="text-center"><a href="{{url('profile/create')}}" class="btn btn-primary btn-sm rounded">Update profile</a></li>
  </ul>

</div>

</div>
</div>

</div>

@endsection