
    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar double-nav  indigo " >
      <!-- SideNav slide-out button -->
      <div class="float-left">
        <a href="#" data-activates="slide-out" class="button-collapse"><i class="fas fa-bars"></i></a>
      </div>
      <!-- Breadcrumb-->
      <div class="breadcrumb-dn mr-auto text-white" >
        <p><strong>Laundry.Net</strong> </p>
      </div>

      <!--Navbar links-->
      <ul class="nav navbar-nav nav-flex-icons ml-auto  ">

        <!-- Dropdown -->
        <li class="nav-item dropdown notifications-nav">
          <a class="nav-link dropdown-toggle waves-effect" id="navbarDropdownMenuLink" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <span class="badge red">3</span> <i class="fas fa-bell"></i>
            <span class="d-none d-md-inline-block">Notifications</span>
          </a>
          <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="#">
              <i class="fas fa-money mr-2" aria-hidden="true"></i>
              <span>New order received</span>
              <span class="float-right"><i class="far  fa-clock" aria-hidden="true"></i> 13 min</span>
            </a>
            <a class="dropdown-item" href="#">
              <i class="fas fa-money mr-2" aria-hidden="true"></i>
              <span>New order received</span>
              <span class="float-right"><i class="far  fa-clock" aria-hidden="true"></i> 33 min</span>
            </a>
            <a class="dropdown-item" href="#">
              <i class="fas fa-line-chart mr-2" aria-hidden="true"></i>
              <span>Your campaign is about to end</span>
              <span class="float-right"><i class="far  fa-clock" aria-hidden="true"></i> 53 min</span>
            </a>
          </div>
        </li>
        
        <li class="nav-item">
          <a class="nav-link waves-effect">
            <span class="badge red">4</span> 
            <i class="fa fa-shopping-cart" aria-hidden="true"></i><span class="clearfix d-none d-sm-inline-block">&nbsp; Orders</span></a>
        </li>
        <li class="nav-item ">
        <a class="nav-link waves-effect" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"> Log Out &nbsp; <i class="fa fa-sign-out-alt" aria-hidden="true"></i></a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          
        </li>
        

      </ul>
      <!--/Navbar links-->
    </nav>
    <!--Navbar -->
