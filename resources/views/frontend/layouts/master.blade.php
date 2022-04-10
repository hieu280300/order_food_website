
</html>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <title>Food Store</title>

   @include('frontend.layouts.css')

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
    <div>
        @yield('content')
    </div>
    <!-- ***** Testimonials Item End ***** -->

    <!-- ***** Footer Start ***** -->

@include('frontend.layouts.footer')
    <!-- jQuery -->
    @include('frontend.layouts.js')
  </body>
</html>
