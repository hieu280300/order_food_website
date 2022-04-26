@extends('frontend.layouts.master')
@section('title', 'Cart')
@push('css')
@endpush
@section('content')
<style>
    .order-detail {
        /* height: 80%; */
        padding-top:60px;
    }
</style>
@if (!empty($order_details))
    <div class="order-detail container">
        <br>
        <h1>Chi tiết đơn hàng</h1>
        <table class="table table-bordered table-striped">
            <thead class="bg-info">
                <tr>
                    <th>Số thứ tự</th>
                    <th>Tên sản phẩm</th>
                    <th>Ảnh sản phẩm</th>
                    <th>Gía</th>
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
                        $product_name=$orderDetail->product_name;
                        $date_order = $orderDetail->date_order;
                    @endphp
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{$product_name}}</td>
                        <td><img src="{{ asset($thumbnail) }}" alt="{{$thumbnail}}" class="img-fluid img-thumbnail" style="width:100px"></td>
                        <td>{{ number_format($quantity) }}</td>
                        <td>{{ number_format($price) }}</td>
                        <td>{{ number_format($money) }}</td>
                        <td>{{date_format(date_create($date_order), 'Y-m-d')}}</td>
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
                    <td colspan="2" class="text-bold"> {{ number_format($totalMoney) }}VNĐ</td>
                    </tr>
                </tfoot>
            </tbody>
        </table>
        <div class="mb-2">
            <a href="{{ route('manage_order') }}" class="btn btn-secondary">Quay lại</a>
        </div>
    </div>

 @endif
@endsection
