@extends('frontend.layouts.master')
@section('title', 'Cart')
    @push('css')
    @endpush
@section('content')
    <div class="container wrapper">
        <div class="row cart-head">
            <div class="container">

                <div class="breadcumb_area">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="bread_box">
                                    <ul class="breadcumb">
                                        <li><a href="{{route('shop')}}">Trang chủ<span>|</span></a></li>                                   
                                        <li class=""><a href="{{route('show_cart')}}">Giỏ hàng<span>|</span></a></li>
                                        <li class="active"><a href="">Thanh Toán</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <p></p>
                </div>
            </div>
        </div>
        <div class="row cart-body">
            <form class="form-horizontal" method="post" action="{{ route('checkout_complete') }}">
                @csrf
                @if(sizeof(Cart::content()) > 0)
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-push-6 col-sm-push-6">
                    <!--REVIEW ORDER-->
                    <div class="panel panel-info">
                        <div class="panel-heading">Địa chỉ</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <h4>Địa chỉ giao hàng</h4>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <strong>Họ và tên:</strong>
                                </div>
                                <div class="col-md-12">
                                    <input type="text" name="first_name"
                                        class="form-control @error('first_name') is-invalid @enderror"
                                        value="{{ Auth::user()->name }}" />
                                    @error('first_name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Địa chỉ:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="address"
                                        class="form-control @error('address') is-invalid @enderror"
                                        value="{{Auth::user()->address}}" />
                                    @error('address')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                         
                            <div class="form-group">
                                <div class="col-md-12"><strong>Số điện thoại:</strong></div>
                                <div class="col-md-12"><input type="text" name="phone_number" @error('phone_number')
                                        is-invalid @enderror" class="form-control" value="{{ Auth::user()->phone }}" />
                                    @error('phone_number')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Email Address:</strong></div>
                                <div class="col-md-12"><input type="text" name="email_address"
                                        class="form-control @error('email_address') is-invalid @enderror"
                                        value="{{ Auth::user()->email }}" />
                                    @error('email_address')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <button type="submit" class="btn btn-primary btn-submit-fix" data-bs-toggle="modal"
                                        data-bs-target="#modal-send-code" onclick="return confirm('Bạn có muốn đặt hàng?')" >Đặt hàng</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--REVIEW ORDER END-->
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-pull-6 col-sm-pull-6">
                    <!--SHIPPING METHOD-->
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Xem lại đơn hàng<div class="pull-right">
                            </div>
                        </div>
                        <div class="panel-body">
                        
                                @foreach (Cart::content() as $item)
                                    <div class="form-group">
                                        <div class="col-sm-3 col-xs-3">
                                            <img class="img-responsive" src="{{ $item->options->image }}" />
                                        </div>

                                        <div class="col-sm-6 col-xs-6">
                                            <div class="col-xs-12"><small>Tên sản phẩm:
                                                    <span>{{ $item->name }}</span></small></div>
                                            <div class="col-xs-12"><small>Số lượng:
                                                    <span>{{ $item->qty }}</span></small></div>
                                            <div class="col-xs-12"><small>Size:
                                                    <span>{{ $item->options->product_size }}</span></small></div>
                                            <div class="col-xs-12"><small>Màu:
                                                    <span>{{ $item->options->product_color }}</span></small></div>

                                        </div>

                                        <div class="col-sm-3 col-xs-3 text-right">
                                            <h6>
                                                <h6>Gía: </h6>{{ number_format($item->price) }} VNĐ
                                            </h6>
                                        </div>
                                    </div>
                                @endforeach


                                <div class="form-group">
                                    <hr />
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <strong>Tổng tiền</strong>
                                        <div class="pull-right"><span>{{ Cart::subTotal() }} VNĐ</span></div>
                                    </div>
                                </div>
                               
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="row cart-footer">
            @else
            <h1>Chưa có sản phẩm nên bạn không thanh toán được</h1>
            <br>
            <a href="{{route('shop')}}" class="btn btn-success"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/></svg>&nbsp;Tiếp tục mua hàng</a>
              </div>
              <br>
            @endif
           
        </div>
        <!--CREDIT CART PAYMENT END-->
    </div>

  
   
    
    </div>

@endsection
