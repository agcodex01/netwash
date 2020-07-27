@extends('layouts.app') 

@section('title')
    Customer | Dashboard
@endsection

@section('style')
    <style>
        .dot {
            
            font-size:8px !important;
         
            background-color: blue;
            border-radius: 50%;
            display: inline-block;
        }

        .sec{
            position: relative;
            right: -15px;
            top:-24px;
        }

        .counter.counter-lg {
            
            right: -15px;
            top: -10px !important;
        }

        .notifications{
            position:fixed;
            z-index :4 !important;
            top :81px;
        }
        @media only screen and (max-width: 600px) {
           .notifications{
                position:fixed;
                top :65px !important;
            }
            img.w-50{
                width : 100% !important
            }
        }
    </style>
    @yield('customer-style')
@endsection

@section('sidenav')
    @include('sidenav.customer')
@endsection

@section('nav')
   @include('navigation.customer')
@endsection

@section('content')
    @yield('customer-content')
@endsection

@section('script')
    <script>
        $('.notifications').hide();
        $(document).ready(function () {
             toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "md-toast-top-center",
                "preventDuplicates": true,
                "onclick": null,
                "showDuration": 300,
                "hideDuration": 1000,
                "timeOut": 5000,
                "extendedTimeOut": 1003,
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            
            $('#notificationBtn').click(function () {   
                $('.notifications').toggle();
            });
        });
        
    </script>
    @yield('customer-script')
@endsection