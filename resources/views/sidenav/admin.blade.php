<!-- Sidebar navigation -->
<div id="slide-out" class="side-nav">
  <ul class="custom-scrollbar">
    <!-- Logo -->
    <li>
      <div class="logo-wrapper  waves-light">
        <a href="#" ><img src="https://mdbootstrap.com/img/logo/mdb-transparent.png" class="img-fluid flex-center"></a>
      </div>
    </li>
    <!--/. Logo -->
    <!--Social-->
    <li class="p-3">
        <h4 class="text-dark d-flex justify-content-center text-uppercase p-1 font-weight-bold">Admin</h4>
    </li>
    <!--/Social-->

    <!-- Side navigation links -->
    <li>
      <ul class="collapsible collapsible-accordion">
        <li>
          <a href="/admin" class="waves-effect arrow-r"><i class="fas fa-chevron-right"></i> Dashboard</a>
        </li>
        <li>
            <a href="{{route('laundry.index')}}" class="waves-effect arrow-r"><i class="fas fa-chevron-right"></i> Laundries</a>
        </li>
        <li>
          <a href="#" class="waves-effect arrow-r"><i class="fas fa-chevron-right"></i> Orders</a>
        </li>
        <li><a class="collapsible-header waves-effect arrow-r"><i class="far fa-hand-pointer"></i> Users<i
              class="fas fa-angle-down rotate-icon"></i></a>
          <div class="collapsible-body">
            <ul class="list-unstyled">
              <li>
                <a href="{{route('customers.index')}}" class="waves-effect">Customers</a>
              </li>
              <li>
                <a href="{{route('partners.index')}}" class="waves-effect">Partners</a>
              </li>
              <li>
                  <a href="{{route('staffs.index')}}" class="waves-effect">Staffs</a>
                </li>
            </ul>
          </div>
        </li>
        <li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-eye"></i> About<i class="fas fa-angle-down rotate-icon"></i></a>
          <div class="collapsible-body">
            <ul class="list-unstyled">
              <li><a href="#" class="waves-effect">Introduction</a>
              </li>
              <li><a href="#" class="waves-effect">Monthly meetings</a>
              </li>
            </ul>
          </div>
        </li>
        <li><a class="collapsible-header waves-effect arrow-r"><i class="far fa-envelope"></i> Contact me<i class="fas fa-angle-down rotate-icon"></i></a>
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