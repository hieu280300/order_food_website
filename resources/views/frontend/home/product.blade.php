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
                        <p>Ut consectetur, metus sit amet aliquet placerat, enim est ultricies ligula</p>
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
                    <ul class="nav nav-pills flex-column " id="bar_menu">
                        <li class="nav-item"><a href="#section1" class="nav-link active"> MÓN NỔI BẬT </a></li>

                        @foreach ($categories as $categoryId => $categoryName)
                            <li class="nav-item"><a href="#{{$categoryId}}" class="nav-link">{{ $categoryName }} </a>
                            </li>
                        @endforeach
                    </ul>

                </nav>
            </div>
            <!-- <div id="menu" class="col-lg-9 col-md-9 col-sm-8 col-xs-12 border_right_before"></div> -->

            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 border_right_before">

                <div id="section1">
                    <h2><span class="menuhome">MÓN NỔI BẬT </h2>
                    <div class="list_product_related flex_wrap display_flex menu_lists">

                        @foreach ($products as $product)
                        <a href="{{ route('shop_detail', ['id' => $product->id]) }}">
                            <div class="menu_item">

                                <div class="menu_item_image">
                                    <img src="{{ $product->thumbnail }}">
                                </div>
                                <div class="menu_item_info bg_white">
                                    <h3>
                                        <a href="{{ route('shop_detail', ['id' => $product->id]) }}">{{ $product->name }}</a>
                                    </h3>
                                    <div class="price_product_item">{{ $product->money }} Đ</div>
                                </a>
                                    <div class="">
                                        <button id="products" data-name="TRÀ CAM VÀNG" data-price="55000"
                                            class="add-to-cart button text"><a style="color:white" href="{{route('addToCart', ['id' => $product->id]) }}">MUA NGAY</a>
                                          </button>
                                    </div>

                                </div>

                            </div>
                        @endforeach
                    </div>
                </div>
                @foreach ($categories as $categoryId => $categoryName)
                <div id="{{$categoryId}}">
                    <h2><span class="menuhome">{{ $categoryName }} </h2>
                    <div class="list_product_related flex_wrap display_flex menu_lists">

                        @foreach ($products as $product)
                        @if ($product->category_id == $categoryId)
                            <a href="{{ route('shop_detail', ['id' => $product->id]) }}">
                            <div class="menu_item">

                                <div class="menu_item_image">
                                    <img src="{{ $product->thumbnail }}">
                                </div>
                                <div class="menu_item_info bg_white">
                                    <h3>
                                        <a href="{{ route('shop_detail', ['id' => $product->id]) }}">{{ $product->name }}</a>
                                    </h3>
                                    <div class="price_product_item">{{ $product->money }} Đ</div>
                                </a>
                                    <div class="">
                                        <button id="products" data-name="TRÀ CAM VÀNG" data-price="55000"
                                            class="add-to-cart button text"><a style="color:white" href="{{route('addToCart', ['id' => $product->id]) }}">MUA NGAY</a>
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

    <nav>
        <ul class="pagination pagination-lg justify-content-center">
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
        </ul>
    </nav>

    </div>
    </section>
@endsection
