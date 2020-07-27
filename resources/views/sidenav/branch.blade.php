<!-- Sidebar navigation -->
<div id="slide-out" class="side-nav  fixed">
    <ul class="custom-scrollbar">
      <!-- Logo -->
      <li>
        <div class="waves-light">
          <div class="card testimonial-card">
              <div class="card-up indigo "></div>           
              <div class="avatar mx-auto white view overlay card-img-top" >          
                  <img src="{{ Auth::user()->customer->image->path   ?? asset('img/logo.png') }}" class="rounded-circle "  alt="customer profile picture">
              </div>
              <div class="card-body text-dark">
                <h4 class="card-title">{{Auth::user()->userProfile->name ?:'none'}}</h4>             
              </div>          
            </div>
        </div>
      </li>
      <li>
        <ul class="collapsible collapsible-accordion">
            <li>
                <a href="/laundry" class="waves-effect arrow-r"><i class="fas fa-chevron-right"></i> Dashboard</a>
               
            </li>
          <li>
            <a href="/laundry/profile" class="waves-effect arrow-r"><i class="fas fa-chevron-right"></i> Profile</a>
           
          </li>
          <li>
            <a href="{{route('branch.waitingList',[Auth::user()->staff->branch->laundry,Auth::user()->staff->branch])}}" class="waves-effect arrow-r"><i class="fas fa-chevron-right"></i>Waiting List</a>
           
          </li>
          <li><a class="collapsible-header waves-effect arrow-r"><i class="far fa-hand-pointer"></i> Customers<i
                class="fas fa-angle-down rotate-icon"></i></a>
            <div class="collapsible-body">
              <ul class="list-unstyled">
                <li><a href="/laundry/orders" class="waves-effect">Orders</a>
                </li>
                <li><a href="#" class="waves-effect">For authors</a>
                </li>
              </ul>
            </div>
          </li>
          <li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-eye"></i> Price Categories<i class="fas fa-angle-down rotate-icon"></i></a>
            <div class="collapsible-body">
              <ul class="list-unstyled">
                  <li>
                    {{-- <a href="/laundry/category/create/{{Auth::user()->partner->laundry->id}}" class="waves-effect">Add Category  <i class="fa fa-plus ml-5 text-dark"></i>  </a> --}}
                
                    
                  </li> 
                {{-- @if ($user->laundry->categories->isEmpty())
                  <li><a href="#" class="waves-effect">No categories </a>  </li> 
                @else
                  @foreach ($user->laundry->categories as $category)
                    <li><a href="#" class="waves-effect">{{$category->name}}</a></li> 
                  @endforeach  
                @endif --}}
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