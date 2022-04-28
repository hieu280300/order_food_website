
</html>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="DashboardKit is made using Bootstrap 5 design framework. Download the free admin template & use it for your project.">
    <meta name="keywords" content="DashboardKit, Dashboard Kit, Dashboard UI Kit, Bootstrap 5, Admin Template, Admin Dashboard, CRM, CMS, Free Bootstrap Admin Template">
    <meta name="author" content="DashboardKit ">

    <!-- Favicon icon -->
    <link rel="icon" href="{{asset('admin/assets/images/favicon.svg')}}" type="image/x-icon">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <!-- font css -->
    <link rel="stylesheet" href="{{asset('admin/assets/fonts/feather.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/fonts/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/fonts/material.css')}}">

    <!-- vendor css -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/profile_shop.css')}}" id="main-style-link">
    <title>Food Store</title>

   @include('frontend.layouts.css')
<style>
    .home{
        display:flex;
        padding-top: 80px;
    }
</style>
    </head>

    <body  data-spy="scroll" data-target="#myScrollspy" data-offset="1">

    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
      <div class="preloader-inner">
        <span class="dot"></span>
        <div class="dots">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
    </div>
    <!-- ***** Preloader End ***** -->


    <!-- ***** Header Area Start ***** -->
   @include('frontend.layouts.header')

    <!-- ***** Header Area End ***** -->

    <!-- ***** Main Banner Area Start ***** -->
    <div class="home">
        @include('frontend.shop.nabar_shop')
        @yield('content')
    </div>
    <!-- ***** Testimonials Item End ***** -->

    <!-- ***** Footer Start ***** -->

@include('frontend.layouts.footer')
    <!-- jQuery -->
    @include('frontend.layouts.js')
  </body>
  {{-- <script src="{{asset('admin/assets/js/vendor-all.min.js')}}"></script> --}}
  <script src="{{asset('admin/assets/js/plugins/bootstrap.min.js')}}"></script>
  <script src="{{asset('admin/assets/js/plugins/feather.min.js')}}"></script>
  {{-- <script src="{{asset('admin/assets/js/pcoded.min.js')}}"></script> --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
  <script src="assets/js/plugins/clipboard.min.js"></script>
  <script src="assets/js/uikit.min.js"></script>
<script src="assets/js/plugins/apexcharts.min.js"></script>

{{-- <script src="{{asset('admin/assets/js/pages/dashboard-sale.js')}}"></script> --}}
</html>
