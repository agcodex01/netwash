@extends('layouts.app')
@section('nav')
  @include('navigation.admin')
@endsection
   

@section('sidenav')
  @include('sidenav.admin')
@endsection


  <!-- Main layout -->
    @section('content')
        @yield('admin-content')  
    @endsection
  <!-- Main layout -->

 

@section('script')
  @yield('admin-script')
@endsection

</body>

</html>
