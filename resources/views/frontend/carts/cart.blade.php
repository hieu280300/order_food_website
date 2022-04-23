@extends('frontend.layouts.master')
@section('title','Cart')

@push('css')
@endpush
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/order.css')}}">
<main>
    <div class="container">
        <form action="" method="post" >
            @csrf
            <div class="row">

                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="xacnhan-herder">
                        <p>1. Xác nhận thông tin đơn hàng</p>
                    </div>
                    <div class="xacnhan">
                        <form>
                            <div class="form-group">
                                <input type="text" class="form-control" id="formGroupExampleInput" name="diachi"  placeholder="Nhập địa chỉ giao hàng" value="{{ old('diachi') }}" required >
                                @error('diachi')
                                    <div class="alert-error alert-text-error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="formGroupExampleInput2" name="name" placeholder="Người nhận" value="{{ old('name') }}" required>
                                @error('name')
                                    <div class="alert-error alert-text-error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="formGroupExampleInput3" name="sdt" placeholder="Số điện thoại " value="{{ old('sdt') }}" required>
                                @error('sdt')
                                    <div class="alert-error alert-text-error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="formGroupExampleInput4" name="note" placeholder="Ghi chú" value="{{ old('note') }}" >
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

                    <button class="dathang" type="submit" name="submit">

                            ĐẶT HÀNG

                    </button>


                    <div class="thanhtoan" >
                        @if(!empty($product))
                            <table  id="ul-products">
                                <thead>
                                    <tr class="bang">
                                    </tr>
                                </thead>

                                @foreach ($shops as $shop)
                                    <tbody>

                                        <tr class="cart shop-cart" >
                                            <td colspan="6">
                                                <div class="shop-herder">
                                                    <p>{{$shop['name']}}</p>
                                                </div>
                                            </td>
                                        </tr>
                                        @php
                                            $dem = 0;
                                        @endphp
                                        @foreach ($product as $value)
                                            @if ($shop['id']==$value['shop_id'])
                                                @php
                                                    $dem =$dem+$value['qty'];
                                                @endphp
                                                <tr class="cart">

                                                    <td><span class='soluong'>{{$value['qty']}}</span>
                                                        <input class='id' id ="{{$value['id']}}" type = "text" hidden>
                                                        <input class="img" src="{{$value['thumbnail']}}" hidden>
                                                        <input class="shop_name" id="{{$shop['name']}}" hidden>
                                                        <input class="note" id="note{{$value['id']}}" value="{{$value['note']}}" hidden>
                                                        <input class="shop_id" value="{{$shop['id']}}" hidden>
                                                    </td>
                                                    <td class="show_product"> <span> <label  data-toggle="modal" data-target="#exampleModal" class='tenmon'>{{$value['name']}}</lable> </span> </td>
                                                        <td class='giamon' ><span class="gia">{{($value['money'])/1000}}</span><span class="vnd">,000₫</span></td>
                                                    <td style="text-align: end">
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
                                                    <td style="text-align: center"> <a class='delete cart_quantity_delete' href="" >Xóa</a></td>

                                                </tr>
                                            @endif
                                        @endforeach
                                        <tr class="cart ship-cart" >
                                            <td colspan="6">
                                                <div class="">

                                                    <input class="ship_shop" value="{{$dem}}" hidden>

                                                        <p class="text-ship ship_15k"
                                                            <?php
                                                                if ($dem<5) echo("style='display: block;'");
                                                                else echo("style='display: none;'")
                                                            ?>> Phí vận chuyển (Free trên 5 món) : 15,000 ₫ </p>

                                                        <p class="text-ship ship_0k"
                                                            <?php
                                                                if ($dem >=5) echo("style='display: block;'");
                                                                else echo("style='display: none;'")
                                                                ?>> Phí vận chuyển (Free trên 5 món) : 0 ₫ </p>

                                                </div>
                                            </td>
                                        </tr>

                                    </tbody>
                                @endforeach

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
                        @endif
                    </div>

                </div>

            </div>
        </form>
    </div>
</main>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document" >
        <div class="modal-content" >

            <div class="modal-header" style="display: block;" >

                <img class="img_modal" id="img" src="">
                <div class="bold">
                    <p id="modal_name"></p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <p id="size_text"></p>

                <p id="modal_topping_text"></p>
            </div>
            <div class="modal-body">
                <div class="form-group" style="margin: 0px;">
                    <input type="text" class="form-control show_note" id="formGroupExampleInput" placeholder="Thêm ghi chú món này" value="">
                </div>
            </div>
            <div class="footer_modal">
                <div style="float: left; width: 50%;">
                    {{-- <div data-v-6eb2f7d4="" class="card-product-quantity-config d-flex align-items-center">
                        <div data-v-6eb2f7d4="" aria-hidden="true" class="add-to-cart-dow minus card-product-decrease btn btn--orange-1 quantity-product  p-0 active" style="margin-top: 0px">
                            <svg class="bi bi-dash-circle" width="2em" height="2em" viewBox="0 0 16 16"fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M8 15A7 7 0 108 1a7 7 0 000 14zm0 1A8 8 0 108 0a8 8 0 000 16z" clip-rule="evenodd"/>
                                <path fill-rule="evenodd" d="M3.5 8a.5.5 0 01.5-.5h8a.5.5 0 010 1H4a.5.5 0 01-.5-.5z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <span data-v-6eb2f7d4="" class="card-product-quantity">2</span>
                        <div data-v-6eb2f7d4="" class="add-to-cart-up plus btn btn--orange-1 card-product-increase quantity-product active  p-0">
                            <svg class="bi bi-plus-circle" width="2em" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M8 3.5a.5.5 0 01.5.5v4a.5.5 0 01-.5.5H4a.5.5 0 010-1h3.5V4a.5.5 0 01.5-.5z" clip-rule="evenodd"/>
                                <path fill-rule="evenodd" d="M7.5 8a.5.5 0 01.5-.5h4a.5.5 0 010 1H8.5V12a.5.5 0 01-1 0V8z" clip-rule="evenodd"/>
                                <path fill-rule="evenodd" d="M8 15A7 7 0 108 1a7 7 0 000 14zm0 1A8 8 0 108 0a8 8 0 000 16z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                    </div> --}}

                    <div id="price_modal"></div>
                </div>
                <div style="float: right; width: 50%;">
                    <a class="modal_tien" href="" style="max-width: 300px; float: right; color:fff; cursor: pointer;" data-dismiss="modal"><span class="total_product"></span><span>,000₫</span></a>
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
            var getId = $(this).closest('tr').find('td input.id').attr('id')*1;
            var name = $(this).find('label.tenmon').text();
            var sl = $(this).closest('tr').find('td span.soluong').text()*1;
            var gia = $(this).closest('tr').find('td span.gia').text()*1;
            var shop_name = $(this).closest('tr').find('td input.shop_name').attr('id');
            var note = $(this).closest('tr').find('td input.note').val();

            var sum_gia = gia*sl;
            $('#modal_name').text(name);
            $('.total_product').text(sum_gia);
            $('span.card-product-quantity').text(sl);
            var getImg = $(this).closest('tr').find('td input.img').attr('src');
            $('.img_modal').attr("src",getImg);
            $('#modal_topping_text').text(shop_name);
            $('.show_note').val(note);
            $('.show_note').attr('id',getId);
        })

        $('.cart_quantity_down').click(function(){

			var getId = $(this).closest('tr').find('td input.id').attr('id')*1;
			var sl = $(this).closest('tr').find('td span.soluong').text()*1;
			var gia = $(this).closest('tr').find('td span.gia').text()*1;
            var shop_id = $(this).closest('tr').find('td input.shop_id').val()*1;
            var ship_shop = $(this).closest('tbody').find('input.ship_shop').val()*1;
            var total = $(this).closest('table').find('#price_total').text()*1;


            ship_shop = ship_shop - 1 ;
            var sum_cart = $('span.sum_cart').text()*1;
			var sum = sl*gia;
            if(ship_shop==4){
                total = total + 15;
                $(this).closest('tbody').find('p.ship_15k').css("display", "block");
                $(this).closest('tbody').find('p.ship_0k').css("display", "none");
            }

			if(sl>1){
				total  = total-gia;
				sl=sl-1;
				var sum = sl*gia;
                $(this).closest('tr').find('td span.soluong').text(sl);
                $(this).closest('table').find('#price_total').text(total);
                // $(this).closest('tbody').find('input.ship_shop').val();
                $(this).closest('tbody').find('input.ship_shop').val(ship_shop);

			}else {
                sl=sl-1;
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
                    qty:sl,
                },
                // success:function(data){
                //     alert(data.success);
                // }
            });
            if(sl==0){
                return true;
            }
            else{
                return false;
            }
            // return true;
		})

		$('.cart_quantity_up').click(function(){
			var getId = $(this).closest('tr').find('td input.id').attr('id')*1;
			var sl = $(this).closest('tr').find('td span.soluong').text()*1;
			var gia = $(this).closest('tr').find('td span.gia').text()*1;
			var shop_id = $(this).closest('tr').find('td input.shop_id').val()*1;
            var ship_shop = $(this).closest('tbody').find('input.ship_shop').val()*1;
            var total = $(this).closest('table').find('#price_total').text()*1;
			sl=sl+1;

            ship_shop = ship_shop + 1 ;
			var sum = sl*gia;
            if(ship_shop==5){
                total = total - 15;
                $(this).closest('tbody').find('p.ship_15k').css("display", "none");
                $(this).closest('tbody').find('p.ship_0k').css("display", "block");
            }
			total  = total+gia;
            $(this).closest('tr').find('td span.soluong').text(sl);
            $(this).closest('table').find('#price_total').text(total);
            // $(this).closest('tbody').find('input.ship_shop').val();
            $(this).closest('tbody').find('input.ship_shop').val(ship_shop);
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
        $('.cart_quantity_delete').click(function(){
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
            });
			return true;

		})
        $('.modal_tien').click(function(){

			var getId = $(this).closest('.modal-content').find('.show_note').attr('id')*1;
			var note = $(this).closest('.modal-content').find('.show_note').val();
            $('#note'+getId).val(note);
            $.ajax({
                type:'POST',
                url:"{{ url('edit_note.post')}}",
                data:{
                    id:getId,
                    note:note,
                },

            });
		})

    });
 </script>
@endsection
