@extends('frontend.layouts.master')
@section('title', 'Cart')
@push('css')
@endpush
@section('content')
    <style>
        .order_manader {
            padding: 100px;
            /* height:90%; */
            width:100%;
        }
    </style>
    <div class="container order_manader">
        <h1>Đơn hàng của tôi</h1>
        <table id="product-list" class="table table-bordered table-hover table-striped">
            @if (sizeof($manage_orders) > 0)
                <thead class="bg-info">
                    <tr>
                        <th>#</th>
                        <th>Tên cửa hàng</th>
                        <th>Ảnh sản phẩm</th>
                        <th>Tổng số lượng</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái đơn hàng</th>
                        <th>Chi tiết</th>
                        <th>Hủy đơn</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($manage_orders as $key => $order)
                        @php
                            $totalQuantity = 0;
                            $totalMoney = 0;
                            if (!empty($order->orderDetails)) {
                                foreach ($order->orderDetails as $od) {
                                    $totalQuantity += $od->quantity;
                                    $productPrice = $od->money;
                                    $totalMoney += $od->quantity * $productPrice;
                                }
                            }
                        @endphp
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{$order->shop->name}}</td>
                            <td>  <img src="{{ asset($order->shop->image) }}" alt="{{ $order->shop->name }}" class="img-flid" style="width:100px"></td>
                            <td>
                                {{ number_format($totalQuantity) }}
                            </td>
                            <td>
                                {{ number_format($order->total) }} VNĐ
                            </td>
                            <td>
                                @if (empty($order->status) || $order->status == \App\Models\Order::STATUS[0])
                                    <div class="btn btn-primary" role="alert">chờ xác nhận đơn hàng</div>
                                @elseif ($order->status == \App\Models\Order::STATUS[1])
                                    <div class="btn btn-info" role="alert">Đã xác nhận đơn</div>
                                @elseif ($order->status == \App\Models\Order::STATUS[2])
                                    <div class="btn btn-warning" role="alert">Shipper đi giao hàng</div>
                                @elseif ($order->status == \App\Models\Order::STATUS[3])
                                    <div class="btn btn-danger" role="alert">Đơn hàng đã hủy</div>
                                @else
                                    <div class="btn btn-success" role="alert">hoàn thành</div>
                                @endif
                                  <td><a href="{{ route('order_detail', $order->id) }}"><button type="button"
                                        class="btn btn-primary">Chi tiết</button></a></td>
                                       @if(empty($order->status) || $order->status ==0)
                                        <td>
                                            <form action="{{ route('destroy_order', $order->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" name="submit" value="Hủy đơn" class="btn btn-danger" onclick="return confirm('Bạn có muốn hủy đơn hàng')">
                                            </form>
                                        </td>
                                        @else
                                            <td> <div class="btn btn-success" role="alert">Không được hủy đơn</div></td>
                                        @endif 
                    @endforeach
                </tbody>
            @else
                <p>Không có lịch sử mua hàng</p>
            @endif
        </table>
    </div>
@endsection
