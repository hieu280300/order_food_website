@extends('frontend.layouts.master')
@section('title','Cart')

@push('css')
@endpush
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/order.css')}}">
<main>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                <div class="xacnhan-herder">
                    <p>1. Xác nhận thông tin đơn hàng</p>
                </div>
                <div class="xacnhan">
                    <form>
                        <div class="form-group">
                          <input type="text" class="form-control" id="formGroupExampleInput"  placeholder="Nhập địa chỉ giao hàng">
                        </div>
                        <div class="form-group">
                          <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Người nhận">
                        </div>
                        <div class="form-group">
                          <input type="text" class="form-control" id="formGroupExampleInput3" placeholder="Số điện thoại ">
                        </div>
                        <div class="form-group">
                          <input type="text" class="form-control" id="formGroupExampleInput4" placeholder="Ghi chú">
                        </div>
                      </form>
                </div>
                <div class="xacnhan-herder">
                    <p>2. Hình thức thanh toán</p>
                </div>
                <div class="xacnhan">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                        <label class="form-check-label" for="exampleRadios1">
                            <img  src="{{asset('icon_cart/cash.png')}}" width="25px">
                          Thanh toán khi giao hàng
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                        <label class="form-check-label" for="exampleRadios2">
                            <img  src="{{asset('icon_cart/visa.png')}}" width="25px">
                            Visa/Master/JCB
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="option3">
                        <label class="form-check-label" for="exampleRadios3">
                            <img  src="{{asset('icon_cart/atm.png')}}" width="25px">
                            Thẻ ATM nội địa
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios4" value="option4">
                        <label class="form-check-label" for="exampleRadios4">
                            <img  src="{{asset('icon_cart/momo.png')}}" width="25px">
                          MoMo
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios5" value="option5">
                        <label class="form-check-label" for="exampleRadios5">
                            <img  src="{{asset('icon_cart/zalo.png')}}" width="25px">
                          ZaloPay
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios6" value="option6">
                        <label class="form-check-label" for="exampleRadios6">
                          <img  src="{{asset('icon_cart/airpay.png')}}" width="25px">
                          AirPay
                        </label>
                      </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                <div class="dathang">
                  <a id="button-clear"> ĐẶT HÀNG </a>
                </div>
                <div class="thanhtoan" >
                    <table  id="ul-products">
                        <thead>
                            <tr class="bang">
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td> <span class='soluong'>2</span></td>
                                <td> <span> <label  for='modal_input' class='tenmon'>fadsfsad</lable> </span> </td>
                                    <td class='giamon'><span>23<span>.000 đ</td>

                            </tr>
                        </tbody>
<!-- <div class="div_modal"></div> -->
                        <thead>
                            <tr>
                                <td colspan="2" class="tenmon">TỔNG CỘNG:</span>
                                <td class="giatongcong"><span id="price_total" ></span>.000đ</td>
                            </tr>
                        </thead>
                    </table>
                </div>

            </div>
        </div>
    </div>
</main>
<div class="div_modal">
    <input type="checkbox" hidden name="" class="nav_modal_input" id="modal_input">
    <div class="modal_overlay"></div>
    <label  for="modal_input" class="modal_overlay"></label>
    <div class="modal_body">
        <div class="modal_header">
            <img  class="img_modal" src="tra_cam_vang.png">
            <span>
                <p>Trà Cam Vàng</p>
                <p>Nhỏ</p>
            </span>
        </div>
        <div class="modal_main">
            <div>
                <p> Loại</p>
            </div>
            <hr>
            <p>Size</p>
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
              </div>
            <hr>
            <p>Topping -</p>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                    Trân châu trắng (+10.000 ₫)
                </label>
            </div>
            <hr>
            <div class="form-group">

                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Thêm ghi chú món này">
            </div>
        </div>
        <div class="footer_modal">
            <a href="#" class="minus" >
                <svg class="bi bi-dash-circle" width="2em" height="2em" viewBox="0 0 16 16"             fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8 15A7 7 0 108 1a7 7 0 000 14zm0 1A8 8 0 108 0a8 8 0 000 16z" clip-rule="evenodd"/>
                    <path fill-rule="evenodd" d="M3.5 8a.5.5 0 01.5-.5h8a.5.5 0 010 1H4a.5.5 0 01-.5-.5z" clip-rule="evenodd"/>
                  </svg>

                </a>
                <p style="float: left; font-size: 22px; padding-left: 30px;"> 1 </p>

            <a href="#" class="plus">
                <svg class="bi bi-plus-circle" width="2em" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8 3.5a.5.5 0 01.5.5v4a.5.5 0 01-.5.5H4a.5.5 0 010-1h3.5V4a.5.5 0 01.5-.5z" clip-rule="evenodd"/>
                    <path fill-rule="evenodd" d="M7.5 8a.5.5 0 01.5-.5h4a.5.5 0 010 1H8.5V12a.5.5 0 01-1 0V8z" clip-rule="evenodd"/>
                    <path fill-rule="evenodd" d="M8 15A7 7 0 108 1a7 7 0 000 14zm0 1A8 8 0 108 0a8 8 0 000 16z" clip-rule="evenodd"/>
                  </svg>
            </a>
            <button href="#" class="modal_tien">
                67.000 ₫
            </button>
        </div>
    </div>
</div>
@endsection
