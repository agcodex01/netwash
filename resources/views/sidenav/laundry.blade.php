<!-- Sidebar navigation -->
<div id="slide-out" class="side-nav  fixed">
    <ul class="custom-scrollbar">
      <!-- Logo -->
      <li>
          <div class="waves-light">
              <div class="card testimonial-card">
                  <div class="card-up indigo "></div>           
                  <div class="avatar mx-auto white view overlay card-img-top" >          
                      <img src="{{ Auth::user()->partner->laundry->image->path   ?? 'https://via.placeholder.com/150' }}" class="rounded-circle "  alt="customer profile picture">
                  </div>
                  <div class="card-body text-dark">
                    <h4 class="card-title">{{Auth::user()->partner->user->userProfile->name ?:'none'}}</h4>             
                  </div>          
                </div>
            </div>
      </li>
      <!--/. Logo -->
      <!--Social-->
      <li>
          <h4 class="text-dark d-flex justify-content-center text-uppercase p-1 font-weight-bold">{{Auth::user()->partner->laundry->laundryProfile->name ?:'none'}}</h4>
      </li>
      <!--/Social-->
      <!--Search Form-->

      <!--/.Search Form-->
      <!-- Side navigation links -->
      <li>
        <ul class="collapsible collapsible-accordion">
            <li>
                <a href="{{ route('laundries.dashboard') }}" class="waves-effect arrow-r"><i class="fas fa-chevron-right"></i> Dashboard</a>

            </li>
          <li>
          <a href="{{ route('laundries.profile',[Auth::user()->partner->laundry]) }}" class="waves-effect arrow-r"><i class="fas fa-chevron-right"></i> Profile</a>

          </li>
          <li><a class="collapsible-header waves-effect arrow-r"><i class="far fa-hand-pointer"></i> Customers<i
                class="fas fa-angle-down rotate-icon"></i></a>
            <div class="collapsible-body">
              <ul class="list-unstyled">
                <li><a href="{{route('laundry.orders.index',[Auth::user()->partner->laundry])}}" class="waves-effect">Orders</a>
                </li>
                <li><a href="#" class="waves-effect">For authors</a>
                </li>
              </ul>
            </div>
          </li>
          <li>
              <a href="{{ route('services.index',[Auth::user()->partner->laundry]) }}" class="collapsible-header waves-effect arrow-r"><i class="fas fa-eye"></i>Services</a>
          </li>
          <li>
            <a class="collapsible-header waves-effect arrow-r"><i class="far fa-envelope"></i> Contact me<i class="fas fa-angle-down rotate-icon"></i></a>
            <div class="collapsible-body">
              <ul class="list-unstyled">
                <li><a href="#" class="waves-effect">FAQ</a>
                </li>
                <li><a href="#" class="waves-effect">Write a message</a>
                </li>
                <li><a href="#" class="waves-effect">FAQ</a>
                </li>
                <li><a href="#" class="waves-effect">Write a message</a>
                </li>
                <li><a href="#" class="waves-effect">FAQ</a>
                </li>
                <li><a href="#" class="waves-effect">Write a message</a>
                </li>
                <li><a href="#" class="waves-effect">FAQ</a>
                </li>
                <li><a href="#" class="waves-effect">Write a message</a>
                </li>
              </ul>
            </div>
          </li>
        </ul>
      </li>
      <!--/. Side navigation links -->
    </ul>
    <div class="sidenav-bg mask-strong"></div>
  </div>
  <!--/. Sidebar navigation -->
