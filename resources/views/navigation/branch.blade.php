
    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar double-nav  indigo " >
        <!-- SideNav slide-out button -->
        <div class="float-left">
          <a href="#" data-activates="slide-out" class="button-collapse"><i class="fas fa-bars text-white"></i></a>
        </div>
        <!-- Breadcrumb-->
        <div class="breadcrumb-dn mr-auto text-white" >
          <p><strong>{{Auth::user()->staff->branch->laundry->laundryProfile->name ?:'none'}}</strong> </p>
        </div>
  
        <!--Navbar links-->
        <ul class="nav navbar-nav nav-flex-icons ml-auto  ">
  
          <!-- Dropdown -->
          <li class="nav-item dropdown notifications-nav">
            <a class="nav-link  waves-effect"  aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-bell mr-2"><span class="counter counter-lg py-1 rounded-circle">1</span></i>
              <span class="d-none d-md-inline-block">Notifications</span>
            </a>
           
          </li>
          
          <li class="nav-item">
            <a href="{{route('branch.orders',[Auth::user()->staff->branch->laundry,Auth::user()->staff->branch])}}" class="nav-link waves-effect">
              <i class="fa fa-shopping-cart mr-2" aria-hidden="true">
                <span class="counter counter-lg py-1 rounded-circle">1</span>
              </i><span class="clearfix d-none d-sm-inline-block">Orders</span></a>
          </li>
          <li class="nav-item ">
          <a class="nav-link waves-effect" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                       document.getElementById('logout-form').submit();"> <span class="d-none d-md-inline-block">Logout</span><i class="fa fa-sign-out-alt" aria-hidden="true"></i></a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
            
          </li>
          
  
        </ul>
        <!--/Navbar links-->
      </nav>
      <!--Navbar -->
  