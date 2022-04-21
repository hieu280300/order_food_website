@extends('frontend.shop.master_shop')
@section('title', 'Login')
@section('content')  
<div  class="table  table-striped">
    <table id="product-list" class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th>Số thứ tự</th>
                <th>Tên khách hàng</th>
                <th>Tổng số lượng</th>
                <th>Tổng tiền</th>
                <th>Trạng thái đơn hàng</th>
                <th>Ngày đặt hàng</th>
                <th colspan="3">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @if (!empty($orders))
                @foreach ($orders as $key => $order)
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
                        <td>{{ $order->user->name }}</td>
                        <td>
                            {{ $totalQuantity}}
                        </td>
                        <td>
                            {{ number_format($totalMoney) }}
                        </td>
                        <td>
                            @if (empty($order->status) || $order->status == \App\Models\Order::STATUS[0])
                                <div class="alert alert-primary" role="alert">chưa thanh toán</div>
                            @elseif ($order->status == \App\Models\Order::STATUS[1])
                                <div class="alert alert-secondary" role="alert">đã thanh toán online</div>
                            @elseif ($order->status == \App\Models\Order::STATUS[2])
                                <div class="alert alert-info" role="alert">shipper đang đi giao hàng</div>
                            @elseif ($order->status == \App\Models\Order::STATUS[3])
                                <div class="alert alert-danger" role="alert">cancel đơn hàng</div>
                            @else
                                <div class="alert alert-success" role="alert">hoàn thành</div>
                            @endif
                        </td>
                        <td>{{date_format(date_create($order->created_at), 'Y-m-d')}}</td>
                        <td><a href="{{ route('order.show', $order->id) }}"><i class="fa fa-info-circle"  style="padding:20px;font-size:20px;color:black" aria-hidden="true"></i></a></td>
                        <td><a href="{{ route('order.edit', $order->id) }}" ><i class="fa fa-pencil-square-o" style="padding:20px;font-size:20px;color:black" aria-hidden="true"></i></a> </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>
    {{-- {{ $orders->links() }} --}}
@endsection
