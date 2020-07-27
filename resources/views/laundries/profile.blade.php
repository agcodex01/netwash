@extends('layouts.app')
@section('title')
    {{ $laundry->laundryName() }} | Profile
@endsection
@section('header')
 <header>
    <div id="home" class="view jarallax" data-jarallax='{"speed": 0.1}' style="background-image: url({{asset('img/llorem-logo.png')}}); background-repeat: no-repeat; background-size: cover; background-position: center center;">
        <div class="mask rgba-stylish-light">
          <div class="container h-100 d-flex justify-content-between align-items-end">
            <div class="row pt-5 mt-3">
              <div class="col-md-12 mb-3">
                <div class="intro-info-content ">
                  <h1 class="display-3 white-text mb-5 wow fadeInDown" data-wow-delay="0.3s">{{ $laundry->laundryName() }}</h1>
                  <h5 class="text-uppercase white-text mb-5 font-weight-bold wow fadeInDown" data-wow-delay="0.3s">Lorem
                    ipsum dolor sit amet consectetur. </h5>
                    <a class="btn btn-rounded btn-primary btn-lg  wow fadeInDown" data-wow-delay="0.3s">Order Now</a>
                    <a class="btn btn-rounded btn-success btn-lg  wow fadeInDown" data-wow-delay="0.3s"><i class="fa fa-pencil-alt"></i> Edit </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
 </header>
@endsection

@section('content')
     <!-- Main Layout -->
  <main>

    <div class="container">

      <!-- Section: Team v.3 -->
      <section class="section team-section wow fadeIn" data-wow-delay="0.3s">

        <!-- Section heading -->
        <h2 class="text-center my-5 h1"> Our Branches</h2>

        <!-- Section description -->
        <p class="text-center mb-5 w-responsive mx-auto">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
          Fugit, error amet numquam iure provident voluptate esse quasi, veritatis totam voluptas nostrum quisquam eum
          porro a pariatur veniam.</p>

        <!-- Grid row -->
        <div class="row mb-lg-4 text-center text-md-left">
          @foreach ($laundry->branches as $branch)
          <!-- Grid column -->
          <div class="col-lg-6 col-md-12 mb-4">

            <div class="col-md-6 float-left">
              <div class="avatar mx-auto">
                <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(27).jpg" class="z-depth-1" alt="First sample avatar image">
              </div>
            </div>

            <div class="col-md-6 float-right">
              <h4 class="mt-md-0 mt-4"><strong>{{ $branch->city }}</strong></h4>
              <h6 class="font-weight-bold grey-text mb-4">{{ $branch->type ? 'Main' : 'Sub Branch' }}</h6>
              <label><strong>Location :</strong></label>
              <p class="grey-text">{{ $branch->street }}</p>

              <!-- Facebook -->
              <a href="{{ route('orders.create',[Auth::user()->customer ?? Auth::user()->partner ,$branch]) }}" class="btn btn-outline-primary w-100">  Wash In <i class="fa fa-truck"></i></a>
           
            </div>

          </div>
          @endforeach
          <!-- Grid column -->
        </div>
        <!-- Grid row -->
      </section>
      <!-- Section: Team v.3 -->

      <hr class="my-5">

      <!-- Section: Features v.1 -->
      <section class="text-center wow fadeIn" data-wow-delay="0.3s">

        <!-- Section heading -->
        <h1 class="my-5 h1">We create awesome products</h1>

        <!-- Section description -->
        <p class="mb-5 w-responsive mx-auto lead grey-text">Lorem ipsum dolor sit amet, consectetur
          adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>

        <!-- Grid row -->
        <div class="row">

          <!-- Grid column -->
          <div class="col-md-4 mb-md-0 mb-4">
            <i class="fas fa-4x fa-chart-area pink-text"></i>
            <h4 class="font-weight-bold my-4">Analytics</h4>
            <p class="grey-text mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit maiores nam,
              aperiam minima assumenda deleniti hic.</p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-4 mb-md-0 mb-4">
            <i class="fas fa-4x fa-pencil-alt cyan-text"></i>
            <h4 class="font-weight-bold my-4">Design</h4>
            <p class="grey-text mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit maiores nam,
              aperiam minima assumenda deleniti hic.</p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-4 mb-md-0 mb-4">
            <i class="fas fa-4x fa-laptop indigo-text"></i>
            <h4 class="font-weight-bold my-4">Development</h4>
            <p class="grey-text mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit maiores nam,
              aperiam minima assumenda deleniti hic.</p>
          </div>
          <!-- Grid column -->

        </div>
        <!-- Grid row -->

      </section>
      <!-- Section: Features v.1 -->

      <hr class="my-5">

      <!-- Section: Gallery -->
      <section class="wow fadeIn" data-wow-delay="0.3s">

        <!-- Section heading -->
        <h1 class="text-center my-5 h1">Our work</h1>

        <!-- Section description -->
        <p class="text-center mb-5 w-responsive mx-auto">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
          do eiusmod tempor incididunt ut labore et dolore aliqua. Ut enim ad minim veniam.</p>

        <div class="row">
          <div class="col-md-12">

            <div id="mdb-lightbox-ui"></div>

            <div class="mdb-lightbox">

              <figure class="col-md-4">
                <a href="https://mdbootstrap.com/img/Photos/Horizontal/People/12-col/img%20(132).jpg" data-size="1600x1067">
                  <img src="https://mdbootstrap.com/img/Photos/Horizontal/People/12-col/img%20(132).jpg" class="img-fluid z-depth-1" />
                </a>
              </figure>

              <figure class="col-md-4">
                <a href="https://mdbootstrap.com/img/Photos/Horizontal/Work/12-col/img%20(40).jpg" data-size="1600x1067">
                  <img src="https://mdbootstrap.com/img/Photos/Horizontal/Work/6-col/img%20(40).jpg" class="img-fluid z-depth-1" />
                </a>
              </figure>

              <figure class="col-md-4">
                <a href="https://mdbootstrap.com/img/Photos/Horizontal/Work/12-col/img%20(14).jpg" data-size="1600x1067">
                  <img src="https://mdbootstrap.com/img/Photos/Horizontal/Work/12-col/img%20(14).jpg" class="img-fluid z-depth-1" />
                </a>
              </figure>

            </div>

          </div>

        </div>

      </section>
      <!-- Section: Gallery -->
      <hr class="my-5">
       <!-- Section: Pricing v.3 -->
       <section class="text-center wow fadeIn" data-wow-delay="0.3s">

            <!-- Section heading -->
            <h1 class="text-center my-5 h1 display-4">Pricing</h1>

            <!-- Section description -->
            <p class="mb-5 w-responsive mx-auto white-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit, error amet numquam iure provident voluptate esse quasi, veritatis totam voluptas nostrum quisquam eum porro a pariatur veniam.</p>

            <!-- Grid row -->
            <div class="row">

              <!-- Grid column -->
              <div class="col-lg-4 col-md-12 mb-4">

                <!-- Card -->
                <div class="card hoverable">
                  <div class="card-body">

                    <h5>Basic plan</h5>
                    <div class="d-flex justify-content-center mt-3">
                      <div class="card-circle d-flex justify-content-center align-items-center">
                        <i class="fas fa-home"></i>
                      </div>
                    </div>

                    <h2 class="font-weight-bold my-3">59$</h2>
                    <p class="grey-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa pariatur id nobis accusamus deleniti cumque hic laborum.</p>
                    <a class="btn btn-light-blue btn-rounded">Buy now</a>

                  </div>
                </div>
                <!-- Card -->

              </div>
              <!-- Grid column -->

              <!-- Grid column -->
              <div class="col-lg-4 col-md-12 mb-4">

                <!-- Card -->
                <div class="card purple-gradient hoverable text-white">
                  <div class="card-body">

                    <h5>Premium plan</h5>
                    <div class="d-flex justify-content-center mt-3">
                      <div class="card-circle d-flex justify-content-center align-items-center">
                        <i class="fas fa-users white-text"></i>
                      </div>
                    </div>

                    <h2 class="font-weight-bold my-3">79$</h2>
                    <p>Esse corporis saepe laudantium velit adipisci cumque iste ratione facere non distinctio cupiditate sequi atque.</p>
                    <a class="btn btn-outline-white btn-rounded">Buy now</a>

                  </div>
                </div>
                <!-- Card -->

              </div>
              <!-- Grid column -->

              <!-- Grid column -->
              <div class="col-lg-4 col-md-12 mb-4">

                <!-- Card -->
                <div class="card hoverable">
                  <div class="card-body">

                    <h5>Advanced plan</h5>
                    <div class="d-flex justify-content-center mt-3">
                      <div class="card-circle d-flex justify-content-center align-items-center">
                        <i class="fas fa-chart-bar"></i>
                      </div>
                    </div>

                    <h2 class="font-weight-bold my-3">99$</h2>
                    <p class="grey-text">At ab ea a molestiae corrupti numquam quo beatae minima ratione mag accusanti repellat eveniet quia vitae.</p>
                    <a class="btn btn-light-blue btn-rounded">Buy now</a>

                  </div>
                </div>
                <!-- Card -->

              </div>
              <!-- Grid column -->

            </div>
            <!-- Grid row -->

          </section>
          <!-- Section: Pricing v.3 -->

      <hr class="my-5">

      <!-- Section: Contact v.2 -->
      <section class="section pb-4 wow fadeIn" data-wow-delay="0.3s">

        <!-- Section heading -->
        <h2 class="text-center my-5 h1">Contact us</h2>

        <!-- Section description -->
        <p class="text-center mb-5 w-responsive mx-auto">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
          Fugit, error amet numquam iure provident voluptate esse quasi, veritatis totam voluptas nostrum quisquam eum
          porro a pariatur accusamus veniam.</p>

        <div class="row">

          <!-- Grid column -->
          <div class="col-md-8 col-xl-9">
            <form>

              <!-- Grid row -->
              <div class="row">

                <!-- Grid column -->
                <div class="col-md-6">
                  <div class="md-form mb-0">
                    <input type="text" id="contact-name" class="form-control">
                    <label for="contact-name" class="">Your name</label>
                  </div>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-6">
                  <div class="md-form mb-0">
                    <input type="text" id="contact-email" class="form-control">
                    <label for="contact-email" class="">Your email</label>
                  </div>
                </div>
                <!-- Grid column -->

              </div>
              <!-- Grid row -->

              <!-- Grid row -->
              <div class="row">
                <div class="col-md-12">
                  <div class="md-form mb-0">
                    <input type="text" id="contact-Subject" class="form-control">
                    <label for="contact-Subject" class="">Subject</label>
                  </div>
                </div>
              </div>
              <!-- Grid row -->

              <!-- Grid row -->
              <div class="row mb-4">

                <!-- Grid column -->
                <div class="col-md-12">

                  <div class="md-form mb-0">
                    <textarea type="text" id="contact-message" class="md-textarea form-control" rows="3"></textarea>
                    <label for="contact-message">Your message</label>
                  </div>

                </div>
              </div>
              <!-- Grid row -->

            </form>

            <div class="text-center text-md-left mb-4">
              <a class="btn btn-light-blue">Send</a>
            </div>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-4 col-xl-3">
            <ul class="contact-icons list-unstyled text-center">
              <li><i class="fas fa-map-marker-alt fa-2x"></i>
                <p>San Francisco, CA 94126, USA</p>
              </li>

              <li><i class="fas fa-phone fa-2x"></i>
                <p>+ 01 234 567 89</p>
              </li>

              <li><i class="fas fa-envelope fa-2x"></i>
                <p>contact@mdbootstrap.com</p>
              </li>
            </ul>
          </div>
          <!-- Grid column -->

        </div>

      </section>
      <!-- Section: Contact v.2 -->

    </div>

  </main>
  <!-- Main Layout -->
@endsection

@section('script')
   <script>
       new WOW().init();
   </script>
@endsection
