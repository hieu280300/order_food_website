@extends('frontend.layouts.master')
@section('title', 'Home')

@push('css')
@endpush
@section('content')
    <!-- ***** Header Area End ***** -->

    <!-- ***** Call to Action Start ***** -->
    <section class="section section-bg" id="call-to-action" style="background-image: url({{asset('frontend/assets/images/banner-image-1-1920x500.jpg)')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2>OUR <em>PRODUCTS</em></h2>
                        {{-- <p>Lorem ipsum dolor sit amet, consectetur.</p> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container" style="margin-top:40px">
          {{-- <div class="heading-section">
              <h2>Product Details</h2>
          </div> --}}
          @php
            //   dd($product);
          @endphp
          <div class="row">
            <div class="col-md-6">
              <div id="slider" class="owl-carousel product-slider">
            <div class="item">
                <img src="{{asset($product['thumbnail'])}}" />
            </div>
            {{-- <div class="item">
                <img src="https://i.ytimg.com/vi/PJ_zomNMK_s/maxresdefault.jpg" />
            </div>
            <div class="item">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQI6nUmObt62eDkqNSmIvCN_KkQExtbpJmUbVx_eTh_Y3v3r-Jw" />
            </div>
            <div class="item">
                <img src="https://i.ytimg.com/vi/PJ_zomNMK_s/maxresdefault.jpg" />
            </div>
            <div class="item">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQI6nUmObt62eDkqNSmIvCN_KkQExtbpJmUbVx_eTh_Y3v3r-Jw" />
            </div>
            <div class="item">
                <img src="https://i.ytimg.com/vi/PJ_zomNMK_s/maxresdefault.jpg" />
            </div>
            <div class="item">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQI6nUmObt62eDkqNSmIvCN_KkQExtbpJmUbVx_eTh_Y3v3r-Jw" />
            </div>
          </div>
          <div id="thumb" class="owl-carousel product-thumb">
            <div class="item">
                <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&w=1000&q=80" />
            </div>
            <div class="item">
                <img src="https://i.ytimg.com/vi/PJ_zomNMK_s/maxresdefault.jpg" />
            </div>
            <div class="item">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQI6nUmObt62eDkqNSmIvCN_KkQExtbpJmUbVx_eTh_Y3v3r-Jw" />
            </div>
            <div class="item">
                <img src="https://i.ytimg.com/vi/PJ_zomNMK_s/maxresdefault.jpg" />
            </div>
            <div class="item">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQI6nUmObt62eDkqNSmIvCN_KkQExtbpJmUbVx_eTh_Y3v3r-Jw" />
            </div>
            <div class="item">
                <img src="https://i.ytimg.com/vi/PJ_zomNMK_s/maxresdefault.jpg" />
            </div>
            <div class="item">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQI6nUmObt62eDkqNSmIvCN_KkQExtbpJmUbVx_eTh_Y3v3r-Jw" />
            </div> --}}
            </div>
            </div>
            <script>
                $(document).ready(function(){
                    //vote
                    // $('.ratings_stars').hover(
                    //     // Handles the mouseover
                    //     function() {
                    //         $(this).prevAll().andSelf().addClass('ratings_hover');
                    //         // $(this).nextAll().removeClass('ratings_vote');
                    //     },
                    //     function() {
                    //         $(this).prevAll().andSelf().removeClass('ratings_hover');
                    //         // set_votes($(this).parent());
                    //     }
                    // );

                    $('.ratings_stars').click(function(){
                        var values =  $(this).val();

                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        var check = "{{Auth::check()}}";
                        var idBlog = "{{$product['id']}}";
                        // console.log(check);
                        if(check==1){
                            $.ajax({
                                type:'POST',
                                url:"{{ url('product-detail/stars/rate') }}",
                                data:{
                                    stars: values,
                                    id: idBlog
                                },
                                success:function(data) {
                                }
                            });
                            $('.point_stars').text(values);

                        }else{
                            alert("Vui long dang nhap!");
                        }
                        // if ($(this).hasClass('ratings_over')) {
                        //     $('.ratings_stars').removeClass('ratings_over');
                        //     $(this).prevAll().andSelf().addClass('ratings_over');
                        // } else {
                        //     $(this).prevAll().andSelf().addClass('ratings_over');
                        // }
                        return true;
                    });
                });
            </script>
            <div class="col-md-6">
              <div class="product-dtl">
                {{-- @php
                    {{dd($product->id);}}
                @endphp --}}
                <div class="product-info">
                  <div class="product-name">{{$product->name}}</div>
                  <div class="reviews-counter">
                    <div class="rate">
                        <?php
                            for ($i=5; $i >= 1 ; $i--) {
                            if($i >=$stars){
                        ?>
                        <input class = "ratings_stars" type="radio" id="star{{$i}}" name="rate" value="{{$i}}" checked />
                        <label for="star{{$i}}" title="text"></label>
                        <?php
                            }
                            else {
                        ?>
                            <input class = "ratings_stars" type="radio" id="star{{$i}}" name="rate" value="{{$i}}"  />
                            <label for="star{{$i}}" title="text"></label>
                        <?php
                                }
                            }
                        ?>

                    </div>
                <p class="point_stars">{{$stars}}</p>

              </div>
                  <div class="product-price-discount"><span>{{number_format($product->money)}}</span>đ</div>
                </div>
                <p>{{$product->description}}</p>
                <div class="row">
                  {{-- <div class="col-md-6">
                    <label for="size">Size</label>
                    <select id="size" name="size" class="form-control">
                    <option>S</option>
                    <option>M</option>
                    <option>L</option>
                    <option>XL</option>
                    </select>
                  </div> --}}
                  {{-- <div class="col-md-6">
                    <label for="color">Color</label>
                <select id="color" name="color" class="form-control">
                  <option>Blue</option>
                  <option>Green</option>
                  <option>Red</option>
                </select>
                  </div> --}}
                </div>
                <div class="product-count">
                  <label for="size">Quantity</label>
                  <form action="#" class="display-flex">
                  <div class="qtyminus">-</div>
                  <input type="text" name="quantity" class="qty" value="1" class="qty">
                  <div class="qtyplus">+</div>
              </form>
              <a id = "{{$product->id}}" href="" class="round-black-btn detail-add-to-cart">Add to Cart</a>
                </div>
              </div>
            </div>
          </div>
          <div class="product-info-tabs">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Description</a>
            </li>
            @php
            $resultCMT = json_decode($cmt, true);
            $amountCMT = count($resultCMT);
        @endphp
            <li class="nav-item">
              <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Reviews ({{$amountCMT}})</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
              {{$product->content}}
            </div>
            <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
              <div class="review-heading">REVIEWS</div>


              <p class="mb-20">{{$amountCMT}} Reviews</p>
              <section class='tabs-content'>
                <div class="row">
                    <div class="col-md-6 contact-form">
                        {{-- <h4>Comments</h4> --}}
                        <ul class="features-items">

                            @foreach ($resultCMT as $value_cmt)
                                @if($value_cmt['level']==0)
                                <li>
                                    <div class="feature-item" style="margin-bottom:15px;">
                                        <div class="left-icon">
                                            <img src="{{asset('frontend/assets/images/features-first-icon.png')}}" alt="First One">
                                        </div>
                                        <div class="right-content">
                                            <input type="hidden" class ="id_cmt" value="{{$value_cmt['id']}}">
                                            <?php
                                                        $date = date_create($value_cmt['created_at']);
                                                        // echo $data;

                                                    ?>
                                            <h4>{{$value_cmt['name']}} <small> {{date_format($date,"d.m.Y")}}</small></h4>
                                            <p><em>" {{$value_cmt['comment']}} "</em>

                                            </p>
                                            <a  class="add_cmt" id="form-submit" href="#comment" class="main-button">Replay</a>
                                        </div>

                                    </div>

                                    @foreach ($resultCMT as $repcmt)
                                        @if($value_cmt['id']==$repcmt['level'])

                                        <div class="tabs-content">
                                            <div class="feature-item" style="margin-bottom:15px;">
                                                <div class="left-icon">
                                                    <img src="{{asset('frontend/assets/images/features-first-icon.png')}}" alt="First One">
                                                </div>
                                                <div class="right-content">
                                                    <?php
                                                            $date = date_create($repcmt['created_at']);
                                                        ?>
                                                    <h4>{{$repcmt['name']}} <small> {{date_format($date,"d.m.Y")}}</small></h4>
                                                    <p><em>" {{$repcmt['comment']}} "</em></p>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    @endforeach
                                </li>
                                @endif
                            @endforeach
                            {{-- <li class="feature-item" style="margin-bottom:15px;">
                                <div class="left-icon">
                                    <img src="{{asset('frontend/assets/images/features-first-icon.png')}}" alt="second one">
                                </div>
                                <div class="right-content">
                                    <h4>John Doe <small>27.07.2020 12:10</small></h4>
                                    <p><em>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta numquam maxime voluptatibus, impedit sed! Necessitatibus repellendus sed deleniti id et!"</em></p>
                                    <button type="submit" id="form-submit" class="main-button">Replay</button>
                                </div>
                            </li> --}}
                        </ul>
                    </div>

                    {{-- <div class="col-md-4">
                        <h4>Leave a comment</h4>

                        <div class="contact-form">
                            <form action="" method="post">
                              <div class="row">
                                <div class="col-lg-12">
                                  <fieldset>
                                    <input name="name" type="text" id="name" placeholder="Your Name*" required="">
                                  </fieldset>
                                </div>
                                <div class="col-lg-12">
                                  <fieldset>
                                    <input name="email" type="text" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your Email*" required="">
                                  </fieldset>
                                </div>
                                <div class="col-lg-12">
                                  <fieldset>
                                    <textarea name="message" rows="6" id="message" placeholder="Message" required=""></textarea>
                                  </fieldset>
                                </div>
                                <div class="col-lg-12">
                                  <fieldset>
                                    <button type="submit" id="form-submit" class="main-button">Submit</button>
                                  </fieldset>
                                </div>
                              </div>
                            </form>
                        </div>
                    </div> --}}
                </div>
            </section>
                <div class="form-group">
                    <h4>Leave a comment</h4>



                    <div class="reviews-counter">

                        {{-- <div class="rate">
                            <input type="radio" id="star5" name="rate" value="5" />
                            <label for="star5" title="text">5 stars</label>
                            <input type="radio" id="star4" name="rate" value="4" />
                            <label for="star4" title="text">4 stars</label>
                            <input type="radio" id="star3" name="rate" value="3" />
                            <label for="star3" title="text">3 stars</label>
                            <input type="radio" id="star2" name="rate" value="2" />
                            <label for="star2" title="text">2 stars</label>
                            <input type="radio" id="star1" name="rate" value="1" />
                            <label for="star1" title="text">1 star</label>
                        </div> --}}

                    </div>
                </div>

                <form class="review-form" method="POST" action="{{url('product-detail/post')}}">
                    @csrf
                  <div class="form-group" id="comment">
                    {{-- <input type="hidden" class ="id_cmt" value="{{$value['id']}}"> --}}
                    <input class="id_cmt" type="hidden" name="level" value="0">
                    <input type="hidden" name="id" value="{{$product['id']}}">
                    <label>Your message</label>
                    <textarea  name="message" class="form-control" rows="2"></textarea>
                  </div>
                  {{-- <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <input type="text" name="" class="form-control" placeholder="Name*">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <input type="text" name="" class="form-control" placeholder="Email Id*">
                      </div>
                    </div>
                  </div> --}}
                  <button class="round-black-btn comment" name="submit">Review</button>
                </form>
            </div>
        </div>
      </div>
      {{-- <div style="text-align:center;font-size:14px;padding-bottom:20px;">Get free icon packs for your next project at <a href="http://iiicons.in/" target="_blank" style="color:#ff5e63;font-weight:bold;">www.iiicons.in</a></div> --}}
    </div>
  </div>
  <script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(".detail-add-to-cart").click(function(){

            var id = parseInt($(this).attr('id'));
            var gia = $(this).closest('.menu_item').find('.price_product_item span').text();
            var qty = $('.qty').val();
            var sum_cart = $('span.sum_cart').text()*1;
            // sum_cart++;
            // $('span.sum_cart').text(sum_cart);
            // id= $(".id").val();
            // console.log(qty);
            $.ajax({
                type:'POST',
                url:"{{ url('product-detail/addToCard')}}",
                data:{
                    id:id,
                    qty:qty,
                },
                success:function(data){
                    alert(data.success);
                    $('span.sum_cart').html(data.sum_cart);

                    // $('span.total').text(data.success.total);

                }
            // console.log(data.success);

            });
            return false;   
            // $('span.total').text(23);
        });
    });
</script>
  <script>
    $(document).ready(function(){
        // $("id_cmt").val(0);
        $('.add_cmt').click(function(){
            var id_cmt=$(this).closest('.right-content').find('.id_cmt').val();
            // alert(id_cmt);
            $(".id_cmt").val(id_cmt);
        });
        $('.comment').click(function(){
            var checkLogin = "{{Auth::check()}}";
            if(checkLogin==1){
                return true;
            }
            else {
                alert (" Vui long dang nhap!");
                return false;
            }
        });
    });
</script>
 <script type="text/javascript">
 $(document).ready(function() {
		    var slider = $("#slider");
		    var thumb = $("#thumb");
		    var slidesPerPage = 4; //globaly define number of elements per page
		    var syncedSecondary = true;
		    slider.owlCarousel({
		        items: 1,
		        slideSpeed: 2000,
		        nav: false,
		        autoplay: false,
		        dots: false,
		        loop: true,
		        responsiveRefreshRate: 200
		    }).on('changed.owl.carousel', syncPosition);
		    thumb
		        .on('initialized.owl.carousel', function() {
		            thumb.find(".owl-item").eq(0).addClass("current");
		        })
		        .owlCarousel({
		            items: slidesPerPage,
		            dots: false,
		            nav: true,
		            item: 4,
		            smartSpeed: 200,
		            slideSpeed: 500,
		            slideBy: slidesPerPage,
		        	navText: ['<svg width="18px" height="18px" viewBox="0 0 11 20"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M9.554,1.001l-8.607,8.607l8.607,8.606"/></svg>', '<svg width="25px" height="25px" viewBox="0 0 11 20" version="1.1"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M1.054,18.214l8.606,-8.606l-8.606,-8.607"/></svg>'],
		            responsiveRefreshRate: 100
		        }).on('changed.owl.carousel', syncPosition2);
		    function syncPosition(el) {
		        var count = el.item.count - 1;
		        var current = Math.round(el.item.index - (el.item.count / 2) - .5);
		        if (current < 0) {
		            current = count;
		        }
		        if (current > count) {
		            current = 0;
		        }
		        thumb
		            .find(".owl-item")
		            .removeClass("current")
		            .eq(current)
		            .addClass("current");
		        var onscreen = thumb.find('.owl-item.active').length - 1;
		        var start = thumb.find('.owl-item.active').first().index();
		        var end = thumb.find('.owl-item.active').last().index();
		        if (current > end) {
		            thumb.data('owl.carousel').to(current, 100, true);
		        }
		        if (current < start) {
		            thumb.data('owl.carousel').to(current - onscreen, 100, true);
		        }
		    }
		    function syncPosition2(el) {
		        if (syncedSecondary) {
		            var number = el.item.index;
		            slider.data('owl.carousel').to(number, 100, true);
		        }
		    }
		    thumb.on("click", ".owl-item", function(e) {
		        e.preventDefault();
		        var number = $(this).index();
		        slider.data('owl.carousel').to(number, 300, true);
		    });


            $(".qtyminus").on("click",function(){
                var now = $(".qty").val();
                if ($.isNumeric(now)){
                    if (parseInt(now) -1> 0)
                    { now--;}
                    $(".qty").val(now);
                }
            })
            $(".qtyplus").on("click",function(){
                var now = $(".qty").val();
                if ($.isNumeric(now)){
                    $(".qty").val(parseInt(now)+1);
                }
            });
		});
 </script>

 @endsection
