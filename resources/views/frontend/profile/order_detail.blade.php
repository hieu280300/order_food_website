@extends('frontend.layouts.master')
@section('title', 'Login')
@section('content')
    {{-- @if (!empty($order->orderDetails)) --}}
    <style>
        .order_manader {
            padding: 100px;
            /* height:90%; */
            width:100%;
            min-width: 400px;
        }
    </style>
    <div class="order-detail px-5 order_manader ">
        <table class="table table-bordered table-hover table-striped " style="min-height: 400px;">
            <thead class="bg-info ">
                <tr class="center">
                    <th>Số thứ tự</th>
                    <th>Tên sản phẩm</th>
                    <th>Hình ảnh sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                    <th>Ngày đặt hàng</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $totalMoney = 0;
                    $totalQuantity = 0;
                @endphp
                @foreach ($order_details as $key => $orderDetail)
                    @php
                        $ship = "";
                        $money = $orderDetail->quantity * $orderDetail->money;
                        $totalMoney = $orderDetail->total;
                        $quantity = $orderDetail->quantity;
                        $totalQuantity += $quantity;
                        if($totalQuantity<4)
                        {
                            $ship = "15.000";
                        }
                        else {
                            $ship = "free ship";
                        }
                        $price = $orderDetail->money;
                        $thumbnail = $orderDetail->thumbnail;
                        $product_name = $orderDetail->product_name;
                        $date_order = $orderDetail->date_order;
                    @endphp
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $product_name }}</td>
                        <td><img src="{{ asset($thumbnail) }}" alt="{{ $product_name }}"
                                class="img-fluid img-thumbnail" style="width:100px"></td>
                        <td>{{ number_format($price) }}</td>
                        <td>{{ number_format($quantity) }}</td>
                        <td>{{ number_format($money) }}</td>
                        <td>{{ date_format(date_create($date_order), 'Y-m-d') }}</td>
                    </tr>
                @endforeach
                <br>

            <tfoot class="bg-secondary">
                <tr>
                    <td colspan="1" class="text-right">Tổng số lượng</td>
                    <td colspan="1" class="text-bold"> {{ number_format($totalQuantity) }}</td>
                    <td colspan="1" class="text-right">Phí ship</td>
                    <td colspan="1" class="text-bold"> {{ ($ship) }}</td>
                    <td colspan="1" class="text-right">Tổng tiền</td>
                    <td colspan="2" class="text-bold"> {{ number_format($totalMoney) }}</td>

                </tr>
            </tfoot>

            </tbody>
        </table>
        <div class="mb-2">

            <a href="{{ route('manage_order') }}" class="btn btn-secondary">Quay lại</a>

        </div>
    </div>


@endsection
