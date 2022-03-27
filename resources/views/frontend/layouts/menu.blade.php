<section class="nav_area">
    <div class="container">
        <div class="nav_left floatleft">
            <a href="category-1.html">Thể loại<i class="fa fa-bars"></i></a>
            <div class="cat_mega_menu">
                <div class="cat_left">
                    <div class="cat_menu_line"></div>
                    <ul class="cat_nav">
                        @foreach ($category as $categories)
                            <li><a href="{{route('search_category',['id'=>$categories->id])}}">{{ $categories->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="nav_center">
            <nav class="mainmenu">
                <ul id="nav">
                    {{-- <li class="current-page-item"><a href="{{route('home')}}">Home</a> --}}
                    </li>
                    <li><a href="{{ route('shop') }}">Trang Chủ</a>

                    </li>
                    <li><a href="category-1.html">Nam</a>

                    </li>
                    <li><a href="#">Nữ</a>
                        <ul id="sub-menu5">

                        </ul>
                    </li>
                    <li><a href="blog.html">Blog</a></li>
                </ul>
            </nav>
        </div>
        <div class="nav_right floatright">
            <a href="{{ route('show_cart') }}"><img src="/images/frontend/bag.png" alt="Bag" />Giỏ hàng:
                {{ Cart::Count() }}</a>
        </div>


        <!-- MOBILE ONLY CONTENT -->
        <div class="only-for-mobile">
            <ul class="ofm">
                <li class="m_nav"><i class="fa fa-bars"></i> Thể loại</li>
            </ul>

            <!-- MOBILE MENU -->
            <div class="mobi-menu">
                <div id='cssmenu'>
                    <ul>
                        <li class='has-sub'>
                            <a href='index.html'><span>Home</span></a>
                            <ul class="sub-nav">
                                <li><a href="index.html"><span>Home 1</span></a></li>
                                <li><a href="index-2.html"><span>Home 2</span></a></li>
                            </ul>
                        </li>

                      
                                </li>
                                <li class="img-nav">
                                    <div class="container">
                                        <div class="clearfix"></div>
                                        <div class="space20"></div>
                                        <div class="clearfix"></div>
                                        <div class="row in1">
                                            <div class="col-md-6">
                                                <a href="#"><img src="/images/frontend/menu_cat.png"
                                                        class="img-responsive" alt="" /></a>
                                            </div>
                                            <div class="col-md-6">
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="space20"></div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="space20"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href='category-2.html'><span>shop</span></a>
                        </li>
                        <li class='has-sub'>
                            <a href='category-1.html'><span>accessories</span></a>
                            <ul class="sub-nav">
                                <li><a href="#"><span>check shirts</span></a></li>
                                <li><a href="#"><span>denim shirts</span></a></li>
                                <li><a href="#"><span>long sleeve shirts</span></a></li>
                                <li><a href="#"><span>plain shirts</span></a></li>
                                <li><a href="#"><span>printed shirts</span></a></li>
                                <li><a href="#"><span>short sleeve shirts</span></a></li>
                                <li><a href="#"><span>shortsleeve denim shirts</span></a></li>
                            </ul>
                        </li>
                        <li class='has-sub'>
                            <a href='#'><span>pages</span></a>
                            <ul id="sub-nav">
                                <li><a href="category-1.html">Category page</a></li>
                                <li><a href="category-2.html">Category page without filter</a></li>
                                <li><a href="checkout.html">Checkout page</a></li>
                                <li><a href="cart.html">Cart page</a></li>
                                <li><a href="product-detail.html">Product detail page</a></li>
                                <li><a href="blog.html">Blog</a></li>
                                <li><a href="single-blog.html">Blog single</a></li>
                                <li><a href="contact.html">Contact page</a></li>
                                <li><a href="404.html">404 page</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href='blog.html'><span>Blog</span></a>
                        </li>
                        <li>
                            <a href='cart.html'><span>cart</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
