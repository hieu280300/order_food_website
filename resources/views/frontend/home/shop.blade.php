@extends('frontend.layouts.master')
@section('title', 'Home')

@push('css')
@endpush
@section('content')

    <div class="main-banner" id="top">
        <video autoplay muted loop id="bg-video">
            <source src="{{asset('frontend/assets/images/video.mp4')}}" type="video/mp4" />
        </video>

        <div class="video-overlay header-text">
            <div class="caption">

                <h2>Best <em>Food stores</em> in town</h2>
                {{-- <div class="main-button">
                    <a href="contact.html">Contact us</a>
                </div> --}}
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

   <!-- ***** Cars Starts ***** -->
    <section class="section" id="trainers">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2>Our <em>Food stores</em></h2>
                        <img src="{{asset('frontend/assets/images/line-dec.png')}}" alt="">
                    </div>
                </div>

            </div>
            <form action="" method="post" >
            <div class="row">
                {{-- <div class="col-lg-4 col-sm-8 col-md-6 col-xs-12 col-md-offset-3">
                    <h5 class="h5">Search</h5>
                    <div class="contact-form">
                        <form id="search_form" name="gs" method="GET" action="#">
                          <input type="text" name="q" class="searchText" placeholder="Search..." autocomplete="on">
                        </form>
                    </div>
                </div> --}}

                <div class="col-lg-4 col-sm-8 col-md-6 col-xs-12 col-md-offset-3 input-group mb-3">
                        @csrf
                        <input type="text" class="form-control searchText" name="name_shop" placeholder="Search for Stores. . . " aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="main-button">
                            <button type="submit" name="submit">Search</button>
                        </div>
                </div>
            </div>
        </form>

            <div class="row">

                @foreach ($shops as $shop)
                <div class="col-lg-4">
                    <div class="trainer-item">
                        <div class="image-thumb">
                            <img src="{{$shop['image']}}" alt="">
                        </div>
                        <div class="down-content">
                            @if ($shop['time_open']>$shop['time_close'])
                                @if (($shop['time_open']< $time+24) && ( $time-12< $shop['time_close']))
                                    <i class="fa fa-clock-o" style="color: green">  </i><span style="color: green; margin-left:5px"> Đang mở cửa </span>

                                @else
                                    <i class="fa fa-clock-o" style="color:#ed563b"></i><span style="color:#ed563b; margin-left:5px"> Đang đóng cửa </span>
                                @endif
                            @else
                                @if (($shop['time_open']< $time) && ( $time< $shop['time_close']))
                                    <i class="fa fa-clock-o" style="color: green">  </i><span style="color: green; margin-left:5px"> Đang mở cửa </span>

                                @else
                                    <i class="fa fa-clock-o" style="color:#ed563b"></i><span style="color:#ed563b; margin-left:5px"> Đang đóng cửa </span>
                                @endif
                            @endif

                            <span>
                                {{$shop['time_open']}} - {{$shop['time_close']}}
                            </span>

                            <h4>{{$shop['name']}}</h4>

                            <p>Địa chỉ: {{$shop['address']}}</p>

                            <div class="main-button">
                            @if ($shop['time_open']>$shop['time_close'])
                                @if (($shop['time_open']< $time+24) && ( $time-12< $shop['time_close']))
                                    <a href="{{url('products')}}/{{$shop['id']}}">Xem sản phẩm</a>

                                @else
                                    <a href="{{url('shopclose')}}/{{$shop['id']}}">Đóng cửa</a>
                                @endif
                            @else
                                @if (($shop['time_open']< $time) && ( $time< $shop['time_close']))
                                    <a href="{{url('products')}}/{{$shop['id']}}">Xem sản phẩm</a>

                                @else
                                    <a href="{{url('shopclose')}}/{{$shop['id']}}">Đóng cửa</a>
                                @endif
                            @endif

                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- ***** Cars Ends ***** -->

    {{-- <section class="section section-bg" id="schedule" style="background-image: url(assets/images/about-fullscreen-1-1920x700.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading dark-bg">
                        <h2>Read <em>About Us</em></h2>
                        <img src="assets/images/line-dec.png" alt="">
                        <p>Nunc urna sem, laoreet ut metus id, aliquet consequat magna. Sed viverra ipsum dolor, ultricies fermentum massa consequat eu.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="cta-content text-center">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore deleniti voluptas enim! Provident consectetur id earum ducimus facilis, aspernatur hic, alias, harum rerum velit voluptas, voluptate enim! Eos, sunt, quidem.</p>

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto nulla quo cum officia laboriosam. Amet tempore, aliquid quia eius commodi, doloremque omnis delectus laudantium dolor reiciendis non nulla! Doloremque maxime quo eum in culpa mollitia similique eius doloribus voluptatem facilis! Voluptatibus, eligendi, illum. Distinctio, non!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ***** Blog Start ***** -->
    <section class="section" id="our-classes">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2>Read our <em>Blog</em></h2>
                        <img src="assets/images/line-dec.png" alt="">
                        <p>Nunc urna sem, laoreet ut metus id, aliquet consequat magna. Sed viverra ipsum dolor, ultricies fermentum massa consequat eu.</p>
                    </div>
                </div>
            </div>
            <div class="row" id="tabs">
              <div class="col-lg-4">
                <ul>
                  <li><a href='#tabs-1'>Lorem ipsum dolor sit amet, consectetur adipisicing.</a></li>
                  <li><a href='#tabs-2'>Aspernatur excepturi magni, placeat rerum nobis magnam libero! Soluta.</a></li>
                  <li><a href='#tabs-3'>Sunt hic recusandae vitae explicabo quidem laudantium corrupti non adipisci nihil.</a></li>
                  <div class="main-rounded-button"><a href="blog.html">Read More</a></div>
                </ul>
              </div>
              <div class="col-lg-8">
                <section class='tabs-content'>
                  <article id='tabs-1'>
                    <img src="assets/images/blog-image-1-940x460.jpg" alt="">
                    <h4>Lorem ipsum dolor sit amet, consectetur adipisicing.</h4>

                    <p><i class="fa fa-user"></i> John Doe &nbsp;|&nbsp; <i class="fa fa-calendar"></i> 27.07.2020 10:10 &nbsp;|&nbsp; <i class="fa fa-comments"></i>  15 comments</p>

                    <p>Phasellus convallis mauris sed elementum vulputate. Donec posuere leo sed dui eleifend hendrerit. Sed suscipit suscipit erat, sed vehicula ligula. Aliquam ut sem fermentum sem tincidunt lacinia gravida aliquam nunc. Morbi quis erat imperdiet, molestie nunc ut, accumsan diam.</p>
                    <div class="main-button">
                        <a href="blog-details.html">Continue Reading</a>
                    </div>
                  </article>
                  <article id='tabs-2'>
                    <img src="assets/images/blog-image-2-940x460.jpg" alt="">
                    <h4>Aspernatur excepturi magni, placeat rerum nobis magnam libero! Soluta.</h4>
                    <p><i class="fa fa-user"></i> John Doe &nbsp;|&nbsp; <i class="fa fa-calendar"></i> 27.07.2020 10:10 &nbsp;|&nbsp; <i class="fa fa-comments"></i>  15 comments</p>
                    <p>Integer dapibus, est vel dapibus mattis, sem mauris luctus leo, ac pulvinar quam tortor a velit. Praesent ultrices erat ante, in ultricies augue ultricies faucibus. Nam tellus nibh, ullamcorper at mattis non, rhoncus sed massa. Cras quis pulvinar eros. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                    <div class="main-button">
                        <a href="blog-details.html">Continue Reading</a>
                    </div>
                  </article>
                  <article id='tabs-3'>
                    <img src="assets/images/blog-image-3-940x460.jpg" alt="">
                    <h4>Sunt hic recusandae vitae explicabo quidem laudantium corrupti non adipisci nihil.</h4>
                    <p><i class="fa fa-user"></i> John Doe &nbsp;|&nbsp; <i class="fa fa-calendar"></i> 27.07.2020 10:10 &nbsp;|&nbsp; <i class="fa fa-comments"></i>  15 comments</p>
                    <p>Fusce laoreet malesuada rhoncus. Donec ultricies diam tortor, id auctor neque posuere sit amet. Aliquam pharetra, augue vel cursus porta, nisi tortor vulputate sapien, id scelerisque felis magna id felis. Proin neque metus, pellentesque pharetra semper vel, accumsan a neque.</p>
                    <div class="main-button">
                        <a href="blog-details.html">Continue Reading</a>
                    </div>
                  </article>
                </section>
              </div>
            </div>
        </div>
    </section> --}}
    <!-- ***** Blog End ***** -->
@endsection
