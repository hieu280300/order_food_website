@extends('frontend.layouts.master')
@section('title','Cart')
@push('css')
@endpush
@section('content')
@if (!empty($order_details))
    <div class="order-detail">
        <br>
        <h1>Chi tiết đơn hàng</h1>
        <table class="table table-bordered table-striped">
            <thead class="bg-info">
                <tr>
                    <th>#</th>
                    <th>Tên sản phẩm</th>
                    <th>Ảnh sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                    <th>Size</th>
                    <th>Color</th>
                    <th>Tiền</th>
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

                        $money = $orderDetail->quantity * $orderDetail->price_id;
                        $totalMoney += $money;
                        $quantity = $orderDetail->quantity;
                        $totalQuantity += $quantity;
                        $price = $orderDetail->price_id;
                        $size = $orderDetail->size_id;
                        $color = $orderDetail->color_id;
                        $thumbnail = $orderDetail->thumbnail;
                        $product_name=$orderDetail->product_name;
                        $date_order = $orderDetail->date_order;
                    @endphp
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{$product_name}}</td>
                        <td><img src="{{ $thumbnail }}" alt="{{$thumbnail}}" class="img-fluid img-thumbnail" style="width:100px"></td>
                        <td>{{ number_format($quantity) }}</td>
                        <td>{{ number_format($price) }}</td>
                        <td>{{$size}}</td>
                        <td>{{$color}}</td>
                        <td>{{ number_format($money) }}</td>
                        <td>{{date_format(date_create($date_order), 'Y-m-d')}}</td>
                    </tr>
                @endforeach
                <br>

                <tfoot class="bg-secondary">
                    <tr>
                        <td colspan="2" class="text-right">Tổng số lượng</td>
                        <td colspan="2"  class="text-bold">{{ number_format($totalQuantity) }}</td>
                        <td colspan="2" class="text-right">Tổng tiền</td>
                        <td colspan="3" class="text-bold">{{ number_format($totalMoney) }}</td>
                    </tr>
                </tfoot>
            </tbody>
        </table>
    </div>

 @endif
@endsection
