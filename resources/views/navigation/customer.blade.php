
    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar double-nav  indigo " >
      <!-- SideNav slide-out button -->
      <div class="nav nav-item ">
        <a href="#" data-activates="slide-out" class="nav-link button-collapse avatar pl-0 ml-0">
          <img src="{{ Auth::user()->customer->image->path   ?? 'https://via.placeholder.com/150' }}"  class="rounded-circle z-depth-0" width="40" height="40" alt="profile image" >
        </a>
      </div>
      <!-- Breadcrumb-->
      <div class="breadcrumb-dn mr-auto text-white" >
         <p><strong>Laundry.Net</strong> </p> 
       
      </div>

      <!--Navbar links-->
      <ul class="nav navbar-nav nav-flex-icons ml-auto  ">

        <!-- Dropdown -->
        <li class="nav-item">      
          <a class="nav-link text-light" href="{{route('customers.dashboard')}}" >          
              <i class="fas fa-home "></i>
            <span class="d-none d-md-inline-block">Home</span>
          </a>
        </li>
        <li class="nav-item">      
          <a class="nav-link text-light" href="#" id="notificationBtn" >          
              
              <i class="fas fa-bell mr-2"><span class="counter counter-lg py-1 rounded-circle"> {{ Auth::user()->customer->notifications->count() }} </span></i>
              
              <span class="d-none d-md-inline-block">Notifications</span>
          </a> 
        </li>
        <li class="nav-item">
            <a class="nav-link waves-effect" href="{{ route('customers.orders',[Auth::user()->customer]) }}">
                
              <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                <span class="clearfix d-none d-sm-inline-block">Order</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link waves-effect" href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();"> <span class="d-none d-md-inline-block">Logout</span> <i class="fa fa-sign-out-alt"></i></a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>



      </ul>
      <!--/Navbar links-->
    </nav>
    <div class="container-fluid notifications  mx-auto " >
        <ul class="list-group-flush p-0 col-md-8 mx-auto scroll" style="max-height:500px;overflow-y:auto">
            <li class="list-group-item head text-light bg-dark">
              <div class="row">
                <div class="col-lg-12 col-sm-12 col-12">
                  <span>Notifications {{ Auth::user()->customer->notifications->count() }}</span>
                  <a href="" class="float-right text-light">Mark all as read</a>
                </div>
            </li>
            @foreach (Auth::user()->customer->notifications as $notification)
              <li class="list-group-item  ">
                <div class="row">
                  <div class="col-lg-3 col-sm-3 col-3 text-center">
                    <img src="http://via.placeholder.com/150x150" class="w-50 rounded-circle logo">
                  </div>    
                  <div class="col-lg-9 col-sm-9 col-9">
                    <strong class="text-info">{{ $notification->data['laundry_name']}}</strong>
                    <div>
                      {{ $notification->data['message'] }}
                    </div>
                    <small class="text-warning">27.11.2015, 15:00</small>
                  </div>    
                </div>
              </li>  
            @endforeach
            <li class="list-group-item footer bg-dark text-center">
              <a href="" class="text-light">View All</a>
            </li>
          </ul>
    </div>
    
