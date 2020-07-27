<!-- Sidebar navigation -->
<div id="slide-out" class="side-nav  fixed">
  <ul class="custom-scrollbar">
    <li>
      <div class="waves-light">
        <div class="card testimonial-card">
            <div class="card-up indigo "></div>           
            <div class="avatar mx-auto white view overlay card-img-top" >          
                <img src="{{ Auth::user()->customer->image->path   ?? 'https://via.placeholder.com/150' }}" class="rounded-circle "  alt="customer profile picture">
            </div>
            <div class="card-body text-dark">
              <h4 class="card-title">{{Auth::user()->userProfile->name ?:'none'}}</h4>             
            </div>          
          </div>
      </div>
    </li>
    <li>
      <ul class="list-group-flush">
          <li class="list-group-item">
              <a href="{{route('customers.dashboard')}}" class="waves-effect arrow-r"><i class="fas fa-home mr-3"></i> Dashboard</a>             
          </li>
          <li class="list-group-item">
            <a href="{{ route('customers.profile',[Auth::user()->customer]) }}" class="waves-effect arrow-r"><i class="fas fa-user mr-3"></i> Profile</a>
          </li>
      </ul>
    </li>
  </ul>
  <div class="sidenav-bg mask-strong"></div>
</div>