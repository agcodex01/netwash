<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title','Netwash')</title>
        <link rel="icon" href="{{asset('img/logo.png')}}" type="image/icon">

        <!-- Font Awesome -->
          <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">

          <link href="{{ asset('mdb/css/bootstrap.min.css') }}" rel="stylesheet">
          <link href="{{ asset('mdb/css/mdb.min.css') }}" rel="stylesheet">
          {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
        <!-- Your custom styles (optional) -->
        <style>
            html,
            body,
            header,
            .jarallax {
            height: 700px;
            }

                      /* width */
          .scroll::-webkit-scrollbar {
              width: 8px;
              height:8px;
            
            }
            
            /* Track */
            .scroll::-webkit-scrollbar-track {
              background: transparent;
            }
            
            /* Handle */
            .scroll::-webkit-scrollbar-thumb {
              background: rgb(65, 64, 64);
              border-radius: 5px;
              
            }
            
            /* Handle on hover */
            .scroll::-webkit-scrollbar-thumb:hover {
              background: rgb(49, 47, 47);
            }
            @media (max-width: 740px) {
            html,
            body,
            header,
            .jarallax {
                height: 100vh;
            }
            }
            @media (min-width: 800px) and (max-width: 850px) {
            html,
            body,
            header,
            .jarallax {
                height: 100vh;
            }
            }
          </style>
        @yield('style')
      </head>
      <body  class="about-page white-skin">

         @yield('nav')
         @yield('header')

        @yield('sidenav')

        <main id="app"  class="pt-5">
            @yield('content')
        </main>



        <!-- Footer -->
<footer class="page-footer fixed-bottom text-center mt-5 indigo ">
<!-- Copyright -->
<div class="footer-copyright  py-3 text-center">
  <div class="container-fluid">
    &copy; 2019 Copyright: <a href="#"> Laundry.Net </a>

  </div>
</div>
<!-- Copyright -->

</footer>


    <!-- Scripts -->
    <script src="{{ asset('mdb/js/jquery-3.4.1.min.js') }}" ></script>
    <script src="{{ asset('mdb/js/popper.min.js') }}" ></script>
    <script src="{{ asset('mdb/js/bootstrap.min.js') }}" ></script>

    <script src="{{ asset('mdb/js/mdb.min.js') }}" ></script>
     {{-- <script src="{{ asset('js/app.js') }}" ></script> --}}
    <!-- Additional Scripts -->
    <!-- Initializations -->
  <script>
      new WOW().init();
    // SideNav Initialization
    $(".button-collapse").sideNav();

    // var container = document.querySelector('.custom-scrollbar');
    // var ps = new PerfectScrollbar(container, {
    //   wheelSpeed: 2,
    //   wheelPropagation: true,
    //   minScrollbarLength: 20
    // });

    // Data Picker Initialization
    $('.datepicker').pickadate({
      format : 'yyyy-mm-dd'
    });

    // $('timepicker').timepicker();

    // Material Select Initialization
    $(document).ready(function () {
      $('.mdb-select').materialSelect();
    });

    // Tooltips Initialization
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })

  </script>

  <!-- Charts -->
  <script>
    // Small chart
    $(function () {
      $('.min-chart#chart-sales').easyPieChart({
        barColor: "#FF5252",
        onStep: function (from, to, percent) {
          $(this.el).find('.percent').text(Math.round(percent));
        }
      });
    });

    // // Main chart
    // var ctxL = document.getElementById("lineChart").getContext('2d');
    // var myLineChart = new Chart(ctxL, {
    //   type: 'line',
    //   data: {
    //     labels: ["January", "February", "March", "April", "May", "June", "July"],
    //     datasets: [{
    //       label: "My First dataset",
    //       fillColor: "#fff",
    //       backgroundColor: 'rgba(255, 255, 255, .3)',
    //       borderColor: 'rgba(255, 255, 255)',
    //       data: [0, 10, 5, 2, 20, 30, 45],
    //     }]
    //   },
    //   options: {
    //     legend: {
    //       labels: {
    //         fontColor: "#fff",
    //       }
    //     },
    //     scales: {
    //       xAxes: [{
    //         gridLines: {
    //           display: true,
    //           color: "rgba(255,255,255,.25)"
    //         },
    //         ticks: {
    //           fontColor: "#fff",
    //         },
    //       }],
    //       yAxes: [{
    //         display: true,
    //         gridLines: {
    //           display: true,
    //           color: "rgba(255,255,255,.25)"
    //         },
    //         ticks: {
    //           fontColor: "#fff",
    //         },
    //       }],
    //     }
    //   }
    // });


  </script>

    @yield('script')

</body>
</html>
