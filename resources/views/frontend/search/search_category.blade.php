@extends('frontend.layouts.master')
@section('title','Home')

@push('css')
@endpush
@section('content')
@include('frontend.layouts.search')
{{-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> --}}
{{-- <style>
  .mySlides {display:none;}
  </style> --}}



              <div class="w3-content w3-section" style="max-width:100%">
                <img class="mySlides" src="//theme.hstatic.net/1000306633/1000702687/14/slideshow_2.jpg?v=28" style="width:100%">
                <img class="mySlides" src="//theme.hstatic.net/1000306633/1000702687/14/slideshow_3.jpg?v=28" style="width:100%">
                <img class="mySlides" src="//theme.hstatic.net/1000306633/1000702687/14/slideshow_3.jpg?v=28" style="width:100%">
              </div>
 
    </div>
</section>
<div class="breadcumb_area" id="post">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="bread_box">
                    <ul class="breadcumb">
                        {{-- <li><a href="{{route('home')}}">home <span>|</span></a></li> --}}
                        <li><a href="{{route('shop')}}">Trang chủ <span>|</span></a></li>
                        <li class="active"><a href="category-2.html">Thể loại </a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
   
<section class="main_category_area">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-4 col-xs-12">
              <div class="main_category_left">
                <div class="panel-group" id="home-accordion" role="tablist" aria-multiselectable="true">
                  <form action="{{ route('shop') }}" method="GET">
                   <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                    <div class="panel panel-default">
                      <div class="panel-heading" role="tab" id="headingOne">
                        <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#home-accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                          CATEGORIES
                          <span class="floatright"><i class="fa fa-minus"></i></span>
                        </a>
                        </h4>
                      </div>
                      <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
                        <ul id="c_tab1">
                          @foreach ($categories as $categoryId => $categoryName)
                          <li><a href="{{route('search_category',['id'=>$categoryId])}}">{{$categoryName}}</a></li>
                         @endforeach
                        </ul>
                        </div>
                      </div>
                      </div>
                 
                   </form>
                  </div>
                
                  <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingThree">
                      <h4 class="panel-title">
                        <a class="collapsed" data-toggle="collapse" data-parent="#home-accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                          COLOURS
                          <span class="floatright"><i class="fa fa-plus"></i></span>
                        </a>
                      </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                      <div class="panel-body colors_cat">
                        <ul id="cat_color">
                          @foreach($colors as $keys=>$color)
                            <li><a class="col-{{$keys+1}}" href="{{route('search_color',['id'=>$color->id])}}"></a></li>
                        @endforeach
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingFour">
                      <h4 class="panel-title">
                        <a class="collapsed" data-toggle="collapse" data-parent="#home-accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                          size
                          <span class="floatright"><i class="fa fa-plus"></i></span>
                        </a>
                      </h4>
                    </div>
                    <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                      <div class="panel-body">
                        @foreach ($sizes as $size)
                        <ul id="cat_size">
                            <li><a href="{{route('search_size',['id'=>$size->id])}}">{{$size->size}}</a></li>
                            
                        </ul>
                        @endforeach
                      </div>
                    </div>
                  </div>
                      <div class="panel panel-default">
                       
                        <div id="collapseEight" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingEight">
                          <div class="panel-body">
                            
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-sm-8 col-xs-12">
              <h4 class=" ">Tìm thấy {{count($product_relateds)}} sản phẩm </h4>
              <br>
                <div class="main_category_right">
                    <div class="row">
                        @foreach ($product_relateds as $key => $product)
                      
                        <div class="col-md-4 col-sm-6 col-xs-12">
                          
                            <div class="main_cat_item">
                              <a href="{{route('shop_detail',['id'=>$product->id])}}">
                                <div class="item">
                                    <div class="item-img">
                                        <img src="{{$product->thumbnail}}" alt="{{$product->thumbnail}}" />

                                    </div>
                                    <div class="item-new">
                                        <p>New</p>
                                       
                                    </div>
                                    <div class="item-sub">
                                        <a href="" class="product-name" ><h5>{{$product->name}}</h5></a>
                                        @if (!empty($product->latestPrice()->price))
                                        <span class="price">{{ number_format($product->latestPrice()->price) }} VNĐ</span>
                                         @endif
                                        {{-- <p><span><del>{{$product->latestPrice()->price}} VNĐ</del></span></p> --}}
                                  
                                    </div>
                              </div>
                            </a>
                            </div>
                     
                            </div>
                            @endforeach
                      
                        </div>
                </div>
    
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="pagi_line"></div>
                            <div class="pagi_ul">
                                <ul id="pagination">
                                    <li><a href="">Previous</a></li>
                                 
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
 @endsection