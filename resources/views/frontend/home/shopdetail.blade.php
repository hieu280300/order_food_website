@extends('frontend.layouts.master')
@section('title', 'Product Details')

@push('css')
    
@endpush
@push('js')
<script>
    var AJAX_PRODUCT_CHECK_QUANTITY_URL = "{{ route('ajax.product.check-quantity', request()->route('id')) }}";
</script>
    <script src="/js/frontend/check_quantity.js"></script>
  
@endpush
@section('content')


    <div class="breadcumb_area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="bread_box">
                        <ul class="breadcumb">
                            <li><a href="{{route('shop')}}">Trang chủ<span>|</span></a></li>
                            <li><a href="{{route('shop')}}">Sản phẩm<span>|</span></a></li>
                            <li class="active"><a href="category-1.html">Chi tiết sản phẩm</a></li>
                        
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="gray_tshirt_area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="gray_tshirt">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="single_product_image_tab">
                                    <div role="tabpanel">
        
                                      <!-- Nav tabs -->
                                      <ul class="nav nav-tabs product_detail_zoom_tab" role="tablist">
                                          @foreach($images as $image)
                                        <li role="presentation" class="active"><a href="{{$image->url}}" aria-controls="home" role="tab" data-toggle="tab">
                                            <div class="small_img">
                                                <img src="{{$image->url}}" alt="" style="height:75px;width:70px" />
                                            </div>
                                        </a></li>
                                        @endforeach
                                      </ul>
        
                                      <!-- Tab panes -->
                                      <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active" id="home">
                                            <div class="single_p_image">      
                                                <a href="{{url('')}}/{{$product->thumbnail}}" data-lightbox="image-1" data-title="My caption" ><img src="/images/frontend/product-plus.png" alt="" style="" /></a>
                                                <img id="zoom_02" src="{{url('')}}/{{$product->thumbnail}}" data-zoom-image="{{$product->thumbnail}}" alt="" style="height:450px;width:346px"/>
                                            </div>
                                        </div>
                                      
                                      </div>
        
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">

                                <div class="product_detail_heading">
                                    <div class="detail_heading_left">
                                        <h3>{{ $product->name }}</h3>
                                        <div>
                                            @if (!empty($product->latestPrice()->price))
                                            <p> {{  number_format($product->latestPrice()->price) }} VNĐ</p>
                                            @endif
                                        </div>
                                    </div>
                                  
                                </div>

                                    <div class="panel panel-default product_default">
                                        <div id="collapseTwoP" class="panel-collapse collapse" role="tabpanel"
                                            aria-labelledby="headingTwoP">
                                            <div class="panel-body fit">
                                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                                richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard
                                                dolor brunch.
                                            </div>
                                        </div>
                                    </div>
                                  

                                        <form action="{{ route('add_cart', $product->id) }}" method="post" id="frm-add-cart">
                                            @csrf
                                            <div class="">
                                                <div class="">
                                                    <div class="color_size">
                                                        <h5>Quantity</h5>
                                                        <input type="number" size="4" class="input-text qty text product-size"
                                                            value="1"  name="quantity" min="1" step="1"  id="product-quantity" required>
                                                    </div>
                                                    
                                                    <div class="">
                                                        <div class="color_size">
                                                        <h5>Size</h5>
                                                        <select name="product_size" id="product-size" class="product-size">
                                                            @foreach ($product->sizes as $size)
                                                                <option value="{{ $size->size }}">{{ $size->size }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    
                                                      <div class="color_size">
                                                        <h5 >Color</h5>
                                                        <select name="product_color" id="product-color" class="product-size">
                                                            @foreach ($product->colors as $color)
                                                                <option value="{{ $color->color }}">{{ $color->color }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    </div>
                                                    <br>
                                                 
                                            </div>
                                            
                                        </div>
                                        <div class="action">
                                            <input type="hidden" name="pro_id">
                                            <button class="add-to-cart btn btn-default" type="button" id="btn-shopping-cart"> <i class="fa fa-shopping-cart"> Thêm vào giỏ hàng</i></button>
                                        </div>
                                            {{-- <button type="submit" class="size_cart">
                                                Add to cart</i>
                                            </button> --}}
                                            
                                        </form>
                                    </div>


                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
    </section>

    

    <section class="main_category_area product_page_caro">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="main_category_right product-box">
                        <h3 class="product">RELATED PRODUCTS</h3>
                        <div class="multi_line"></div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div id="owl-example-single" class="owl-carousel">
                                    @foreach($products as $product)
                                    <a href="{{route('shop_detail',['id'=>$product->id])}}">
                                    <div class="item">
                                       
                                        <div class="item-img">
                                            <img src="{{$product->thumbnail }}" alt="" />
                                            {{-- <div class="tr-add-cart">
                                                <ul>
                                                    <li><a class="fa fa-shopping-cart tr_cart" href="#"></a></li>
                                                    <li><a class="tr_text" href="#">ADD TO CART</a></li>
                                                    <li><a class="fa fa-heart tr_heart" href="#"></a></li>
                                                    <li><a class="fa fa-search tr_search" href="product-detail.html"></a>
                                                    </li>
                                                </ul>
                                            </div> --}}
                                        </div>
                                        <div class="item-new">
                                            <p>New</p>
                                        </div>
                                        <div class="item-sub">
                                            <a href="product-detail.html">
                                                <h5>{{$product->name}}</h5>
                                            </a>
                                            @if (!empty($product->latestPrice()->price))
                                            <p> {{  number_format($product->latestPrice()->price) }} VNĐ</p>
                                            @endif
                                        </div>
                                      
                                    </div>
                                    </a>
                                    @endforeach
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
