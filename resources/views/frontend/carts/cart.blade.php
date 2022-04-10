@extends('frontend.layouts.master')
@section('title','Cart')

@push('css')
@endpush
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/order.css')}}">
<main>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
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

            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                <div class="dathang">
                  <a id="button-clear" class="dat_hang"> ĐẶT HÀNG </a>
                </div>
                <div class="thanhtoan" >
                    <table  id="ul-products">
                        <thead>
                            <tr class="bang">
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($product))
                                @php
                                // dd($product);
                                @endphp
                                @foreach ($product as $value)
                                    <tr class="cart">

                                        <td><span class='soluong'>{{$value['qty']}}</span>
                                            <input class='id' id ="{{$value['id']}}" type = "text" hidden>
                                        </td>

                                        {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                            Launch demo modal
                                          </button> --}}
                                        <td class="show_product"> <span> <label  data-toggle="modal" data-target="#exampleModal" class='tenmon'>{{$value['name']}}</lable> </span> </td>

                                        {{-- <td> <span> <label  for='modal_input' class='tenmon'>{{$value['name']}}</lable> </span> </td> --}}
                                        <td class='giamon' ><span class="gia">{{($value['money'])/1000}}</span><span class="vnd">,000₫</span></td>



                                                {{-- <div data-v-6eb2f7d4="" aria-hidden="true" class="minus card-product-decrease btn btn--orange-1 quantity-product add-to-cart p-0 active">
                                                    <svg class="bi bi-dash-circle" width="2em" height="2em" viewBox="0 0 16 16"fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" d="M8 15A7 7 0 108 1a7 7 0 000 14zm0 1A8 8 0 108 0a8 8 0 000 16z" clip-rule="evenodd"/>
                                                        <path fill-rule="evenodd" d="M3.5 8a.5.5 0 01.5-.5h8a.5.5 0 010 1H4a.5.5 0 01-.5-.5z" clip-rule="evenodd"/>
                                                    </svg>
                                                </div> --}}


                                        <td style="text-align: end">
                                            {{-- <div data-v-6eb2f7d4="" class=" plus btn btn--orange-1 card-product-increase quantity-product active add-to-cart p-0">
                                                <svg class="bi bi-plus-circle" width="2em" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M8 3.5a.5.5 0 01.5.5v4a.5.5 0 01-.5.5H4a.5.5 0 010-1h3.5V4a.5.5 0 01.5-.5z" clip-rule="evenodd"/>
                                                    <path fill-rule="evenodd" d="M7.5 8a.5.5 0 01.5-.5h4a.5.5 0 010 1H8.5V12a.5.5 0 01-1 0V8z" clip-rule="evenodd"/>
                                                    <path fill-rule="evenodd" d="M8 15A7 7 0 108 1a7 7 0 000 14zm0 1A8 8 0 108 0a8 8 0 000 16z" clip-rule="evenodd"/>
                                                </svg>
                                            </div> --}}

                                            <a href="" class='minus cart_quantity_down'>
                                                <svg class="bi bi-dash-circle" width="2em" height="2em" viewBox="0 0 16 16"fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M8 15A7 7 0 108 1a7 7 0 000 14zm0 1A8 8 0 108 0a8 8 0 000 16z" clip-rule="evenodd"/>
                                                    <path fill-rule="evenodd" d="M3.5 8a.5.5 0 01.5-.5h8a.5.5 0 010 1H4a.5.5 0 01-.5-.5z" clip-rule="evenodd"/>
                                                </svg></a>

                                        </td>
                                        <td style="text-align: center">
                                            <a href="" class='plus cart_quantity_up'><svg class="bi bi-plus-circle" width="2em" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M8 3.5a.5.5 0 01.5.5v4a.5.5 0 01-.5.5H4a.5.5 0 010-1h3.5V4a.5.5 0 01.5-.5z" clip-rule="evenodd"/>
                                                <path fill-rule="evenodd" d="M7.5 8a.5.5 0 01.5-.5h4a.5.5 0 010 1H8.5V12a.5.5 0 01-1 0V8z" clip-rule="evenodd"/>
                                                <path fill-rule="evenodd" d="M8 15A7 7 0 108 1a7 7 0 000 14zm0 1A8 8 0 108 0a8 8 0 000 16z" clip-rule="evenodd"/>
                                            </svg></a>
                                        </td>
                                        <td style="text-align: center"> <a class='delete cart_quantity_delete' href="cart/delete/{{$value['id']}}" >Xóa</a></td>

                                    </tr>
                                @endforeach

                            @endif
                        </tbody>
<!-- <div class="div_modal"></div> -->
                        <thead>
                            <tr>
                                @if (!empty($total))
                                <td colspan="3" class="tenmon">TỔNG CỘNG:
                                </td>
                                <td  colspan="3" class="giatongcong">
                                    <span id="price_total" >

                                        {{$total/1000}}

                                    </span>
                                    <span class="vnd">,000₫</
                                </td>
                                @else
                                <td colspan="6" class="tenmon">Không có sản phẩm nào!!
                                @endif
                            </tr>
                        </thead>
                    </table>
                </div>

            </div>
        </div>
    </div>
</main>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document" >
        <div class="modal-content" >

            <div class="modal-header" style="display: block;" >

                <img class="img_modal" id="img">
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
                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Thêm ghi chú món này">
                </div>
            </div>
            <div class="footer_modal">
                <div style="float: left; width: 50%;">
                    <div data-v-6eb2f7d4="" class="card-product-quantity-config d-flex align-items-center">
                        <div data-v-6eb2f7d4="" aria-hidden="true" class="minus card-product-decrease btn btn--orange-1 quantity-product add-to-cart p-0 active" style="margin-top: 0px">
                            <svg class="bi bi-dash-circle" width="2em" height="2em" viewBox="0 0 16 16"fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M8 15A7 7 0 108 1a7 7 0 000 14zm0 1A8 8 0 108 0a8 8 0 000 16z" clip-rule="evenodd"/>
                                <path fill-rule="evenodd" d="M3.5 8a.5.5 0 01.5-.5h8a.5.5 0 010 1H4a.5.5 0 01-.5-.5z" clip-rule="evenodd"/>
                            </svg>                        </div>
                        <span data-v-6eb2f7d4="" class="card-product-quantity">2</span>
                        <div data-v-6eb2f7d4="" class=" plus btn btn--orange-1 card-product-increase quantity-product active add-to-cart p-0">
                            <svg class="bi bi-plus-circle" width="2em" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M8 3.5a.5.5 0 01.5.5v4a.5.5 0 01-.5.5H4a.5.5 0 010-1h3.5V4a.5.5 0 01.5-.5z" clip-rule="evenodd"/>
                                <path fill-rule="evenodd" d="M7.5 8a.5.5 0 01.5-.5h4a.5.5 0 010 1H8.5V12a.5.5 0 01-1 0V8z" clip-rule="evenodd"/>
                                <path fill-rule="evenodd" d="M8 15A7 7 0 108 1a7 7 0 000 14zm0 1A8 8 0 108 0a8 8 0 000 16z" clip-rule="evenodd"/>
                            </svg>                        </div>
                    </div>

                    <div id="price_modal"></div>
                </div>
                <div style="float: right; width: 50%;">
                    <a onclick="add_to_cart()" class="modal_tien" style="max-width: 300px; float: right; color:fff" data-dismiss="modal"><span class="total_product"></span><span>,000đ</span></a>
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
        $('td.show_product').click(function(){
            var name = $(this).find('label.tenmon').text();
            $('#modal_name').text(name);
            var gia = $(this).closest('tr').find('td span.gia').text()*1;
            $('.total_product').text(gia);
            // alert(gia);

        })
        $('a.cart_quantity_down').click(function(){

			var getId = $(this).closest('tr').find('td input.id').attr('id')*1;
			var sl = $(this).closest('tr').find('td span.soluong').text()*1;
			var gia = $(this).closest('tr').find('td span.gia').text()*1;
			var total = $(this).closest('table').find('#price_total').text()*1;
            var sum_cart = $('span.sum_cart').text()*1;
			var sum = sl*gia;
			if(sl>1){
				total  = total-gia;
				sl=sl-1;
				var sum = sl*gia;
                $(this).closest('tr').find('td span.soluong').text(sl);
                $(this).closest('table').find('#price_total').text(total);

			}else {
				total  = total-sum;
                sum_cart--;
                $('span.sum_cart').text(sum_cart);
                if(total==0){
                    $(this).closest('table').find('thead tr td.tenmon').text('Không có sản phẩm nào!!');
                    $(this).closest('table').find('thead tr td.giatongcong').text(' ');
                    $(this).closest('tr').remove('tr');

                }
                else {
                    $(this).closest('table').find('#price_total').text(total);

				    $(this).closest('tr').remove('tr');
                }

			}

            $.ajax({
                type:'POST',
                url:"{{ url('cart_quantity_down.post')}}",
                data:{
                    id:getId,
                },
                // success:function(data){
                //     alert(data.success);
                // }
            });
			return false;
		})

		$('a.cart_quantity_up').click(function(){
			var getId = $(this).closest('tr').find('td input.id').attr('id')*1;
			var sl = $(this).closest('tr').find('td span.soluong').text()*1;
			var gia = $(this).closest('tr').find('td span.gia').text()*1;
			var total = $(this).closest('table').find('#price_total').text()*1;
			sl=sl+1;
			var sum = sl*gia;
			total  = total+gia;
            $(this).closest('tr').find('td span.soluong').text(sl);
            $(this).closest('table').find('#price_total').text(total);
            $.ajax({
                type:'POST',
                url:"{{ url('cart_quantity_up.post')}}",
                data:{
                    id:getId,
                },
                // success:function(data){
                //     alert(data.success);
                // }
            });
			return false;

		})
        $('a.cart_quantity_delete').click(function(){
			var getId = $(this).closest('tr').find('td input.id').attr('id')*1;
			var sl = $(this).closest('tr').find('td span.soluong').text()*1;
			var gia = $(this).closest('tr').find('td span.gia').text()*1;
			var total = $(this).closest('table').find('#price_total').text()*1;
            var sum_cart = $('span.sum_cart').text()*1;
			var sum = sl*gia;
            total  = total-sum;
            sum_cart--;
            $('span.sum_cart').text(sum_cart);
            if(total==0){
                $(this).closest('table').find('thead tr td.tenmon').text('Không có sản phẩm nào!!');
                $(this).closest('table').find('thead tr td.giatongcong').text(' ');
                $(this).closest('tr').remove('tr');
            }
            else {
                $(this).closest('table').find('#price_total').text(total);
                $(this).closest('tr').remove('tr');
            }

            $.ajax({
                type:'POST',
                url:"{{ url('cart_quantity_delete.post')}}",
                data:{
                    id:getId,
                },
                // success:function(data){
                //     alert(data.success);
                // }
            });
			return false;

		})
        $('.dathang').click(function(){
            alert("Đặt hàng thành công!!!");
        })

    });
 </script>
@endsection
