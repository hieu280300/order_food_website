@extends('frontend.layouts.master')
@section('title', 'Home')

@push('css')
@endpush
@section('content')

    <!-- ***** Header Area End ***** -->

    <!-- ***** Call to Action Start ***** -->
    <section class="section section-bg" id="call-to-action"
        style="background-image: url({{ asset('frontend/assets/images/banner-image-1-1920x500.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2>Our <em>Products</em></h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Call to Action End ***** -->

    <!-- ***** Fleet Starts ***** -->

    <div class="container" style="margin-top:40px">
        @if (session('login_success'))
            <div class="alert alert-success">
                <p>{{ session('login_success') }}</p>
            </div>
        @endif
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 ">
                <nav class="sticky" id="myScrollspy">
                    <ul class="nav nav-pills flex-column" id="bar_menu">
                        @if ($totalOrder)
                            <li class="nav-item"><a href="#section1" class="nav-link active"> MÓN NỔI BẬT </a></li>
                        @endif
                        @foreach ($categories as $categoryId => $categoryName)
                            <li class="nav-item"><a href="#sections{{$categoryId}}" class="nav-link">{{ $categoryName }} </a>
                            </li>
                        @endforeach
                    </ul>
                </nav>
            </div>
            <!-- <div id="menu" class="col-lg-9 col-md-9 col-sm-8 col-xs-12 border_right_before"></div> -->

            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 border_right_before">
                @if ($totalOrder)
                    <div id="section1">
                        <h2><span class="menuhome">MÓN NỔI BẬT </h2>
                        <div class="list_product_related flex_wrap display_flex menu_lists">
                            @foreach ($products as $product)
                                @foreach ($totalOrder as $item)
                                    @if ($product->id==$item->id)
                                    <a href="{{ route('product-detail', ['id' => $product->id]) }}">
                                        <div class="menu_item">
                                            <input class="shop_id" id = "{{$product->shop_id}}" hidden value="{{$shop[0]['name']}}">
                                            <div class="menu_item_image">
                                                <img src="{{asset($product->thumbnail)}}">
                                            </div>
                                            <div class="menu_item_info bg_white">
                                                <h3>
                                                    <a class="tenmon" href="{{ route('product-detail', ['id' => $product->id]) }}">{{ $product->name }}</a>
                                                </h3>
                                                <div class="price_product_item"><span class="gia">{{(($product->money))/1000}}</span><span class="vnd">,000₫</span></div>
                                            </a>
                                                <div class="">
                                                    <button id="products" class="button text">
                                                        <a id ="{{$product->id}}" class ="show_product" style="color:white" data-toggle="modal" data-target="#exampleModal" >MUA NGAY</a>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                @endif
                @foreach ($categories as $categoryId => $categoryName)
                <div id="sections{{$categoryId}}">
                    <h2><span class="menuhome">{{ $categoryName }} </h2>
                    <div class="list_product_related flex_wrap display_flex menu_lists">

                        @foreach ($products as $product)
                        @if ($product->category_id == $categoryId)
                            <a href="{{ route('product-detail', ['id' => $product->id]) }}">

                            <div class="menu_item">
                                <input class="shop_id" id = "{{$product->shop_id}}" hidden value="{{$shop[0]['name']}}">
                                <div class="menu_item_image">
                                    <img src="{{asset($product->thumbnail)}}">
                                </div>
                                <div class="menu_item_info bg_white">
                                    <h3>
                                        <a class="tenmon" href="{{ route('product-detail', ['id' => $product->id]) }}">{{ $product->name }}</a>
                                    </h3>
                                    <div class="price_product_item"><span class="gia">{{(($product->money))/1000}}</span><span class="vnd">,000₫</span></div>
                                </a>
                                    <div class="">
                                        <button id="products" class="button text">
                                            <a id ="{{$product->id}}" class ="show_product" style="color:white" data-toggle="modal" data-target="#exampleModal" >MUA NGAY</a>
                                          </button>
                                    </div>

                                </div>

                            </div>
                        @endif

                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <br>

    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document" style="margin: 6.75rem auto;">
            <div class="modal-content" >

                <div class="modal-header" style="display: block;" >

                    <img class="img_modal" id="img" src="">
                    <div class="bold">
                        <p id="modal_name"></p>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <p  id="size_text"></p>

                    <p id="modal_topping_text"></p>
                </div>
                <div class="modal-body">
                    {{-- <div>
                        <p> Loại</p>
                    </div>
                    <hr>
                    <p class="Size"></p>
                    <div class="form-check" style="float:left">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                        <label class="form-check-label" for="exampleRadios1">
                          Nhỏ
                        </label>
                    </div>
                    <div class="form-check" style="margin-left: 100px;">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                        <label class="form-check-label" for="exampleRadios2">
                            Vừa (+5.000 ₫)
                        </label>
                    </div> --}}
                    {{-- <div class="Topping"></div>
                    <hr> --}}
                    <div class="form-group" style="margin: 0px;">
                        <input  class="form-control note" id="formGroupExampleInput" placeholder="Thêm ghi chú món này" value="">
                    </div>
                </div>
                <div class="footer_modal">
                    <div style="float: left; width: 50%;">
                        <div data-v-6eb2f7d4="" class="card-product-quantity-config d-flex align-items-center">
                            <div data-v-6eb2f7d4="" aria-hidden="true" class="add-to-cart-dow minus card-product-decrease btn btn--orange-1 quantity-product  p-0 active" style="margin-top: 0px">
                                <svg class="bi bi-dash-circle" width="2em" height="2em" viewBox="0 0 16 16"fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 15A7 7 0 108 1a7 7 0 000 14zm0 1A8 8 0 108 0a8 8 0 000 16z" clip-rule="evenodd"/>
                                    <path fill-rule="evenodd" d="M3.5 8a.5.5 0 01.5-.5h8a.5.5 0 010 1H4a.5.5 0 01-.5-.5z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <span data-v-6eb2f7d4="" class="card-product-quantity " style="font-size: 24px; margin: auto 18px  12px  20px;">2</span>
                            <div data-v-6eb2f7d4="" class="add-to-cart-up plus btn btn--orange-1 card-product-increase quantity-product active  p-0">
                                <svg class="bi bi-plus-circle" width="2em" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 3.5a.5.5 0 01.5.5v4a.5.5 0 01-.5.5H4a.5.5 0 010-1h3.5V4a.5.5 0 01.5-.5z" clip-rule="evenodd"/>
                                    <path fill-rule="evenodd" d="M7.5 8a.5.5 0 01.5-.5h4a.5.5 0 010 1H8.5V12a.5.5 0 01-1 0V8z" clip-rule="evenodd"/>
                                    <path fill-rule="evenodd" d="M8 15A7 7 0 108 1a7 7 0 000 14zm0 1A8 8 0 108 0a8 8 0 000 16z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                        </div>

                        <div id="price_modal" ></div>
                    </div>
                    <div style="float: right; width: 50%;">
                        <button class="modal_tien add-to-cart" style="max-width: 300px; float: right; color:#fff" data-dismiss="modal"><span class="total_product "></span><span>,000đ</span></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.show_product').click(function(){
                var getId = parseInt($(this).attr('id'));
                var getShop_id = $(this).closest('.menu_item').find('input.shop_id').attr('id')*1;
                var getShop_name = $(this).closest('.menu_item').find('input.shop_id').val();
                // console.log(getShop_name);
                var name = $(this).closest('.menu_item').find('a.tenmon').text();
                var sl = 1;
                var gia = $(this).closest('.menu_item').find('span.gia').text()*1;
                var getImg = $(this).closest('.menu_item').find('img').attr('src');
                var sum_gia = gia*sl;
                $('#modal_name').text(name);
                $('#modal_topping_text').text(getShop_name);
                $('.total_product').text(sum_gia);
                $('span.card-product-quantity').text(sl);
                $('.img_modal').attr("src",getImg);
                $('button.add-to-cart').attr('id',getId);
                $('#formGroupExampleInput').val('');

            })
            $('.add-to-cart-up').click(function(){
                var sl = $(this).closest('.card-product-quantity-config').find('.card-product-quantity').text()*1;
                var gia = $(this).closest('.footer_modal').find('.total_product').text()*1;
                gia=gia/sl;
                sl=sl+1;
                var sum_gia = gia*sl;
                // console.log(gia);
                $('.total_product').text(sum_gia);
                $('span.card-product-quantity').text(sl);
            })
            $('.add-to-cart-dow').click(function(){
                var sl = $(this).closest('.card-product-quantity-config').find('.card-product-quantity').text()*1;
                var gia = $(this).closest('.footer_modal').find('.total_product').text()*1;

                gia=gia/sl;
                sl=sl-1;
                if (sl==0){
                    sl=1;
                }
                var sum_gia = gia*sl;
                // console.log(gia);
                $('.total_product').text(sum_gia);
                $('span.card-product-quantity').text(sl);
            })
            $(".add-to-cart").click(function(){
                var id = parseInt($(this).attr('id'));
                var sl = $(this).closest('.footer_modal').find('.card-product-quantity').text()*1;
                var gia = $(this).closest('.footer_modal').find('.total_product').text()*1;
                var getShop_id = $('input.shop_id').attr('id')*1;
                var note = $(this).closest('.modal-content').find('#formGroupExampleInput').val();
                $.ajax({
                    type:'POST',
                    url:"{{ url('addToCard')}}",
                    data:{
                        id:id,
                        qty:sl,
                        shop_id:getShop_id,
                        note:note,
                    },
                    success:function(data){
                        // alert(data.success);
                        $('span.sum_cart').html(data.sum_cart);
                    }

                });

            });
        });
    </script>
    </section>
@endsection
