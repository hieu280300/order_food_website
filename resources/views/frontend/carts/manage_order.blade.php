@extends('frontend.layouts.master')
@section('title', 'Cart')
    @push('css')
    @endpush
@section('content')
    <br>
    <br>
    <h1>Đơn hàng của tôi</h1>
    <table id="product-list" class="table table-bordered table-hover table-striped">
        @if(sizeof($manage_orders)> 0 )    
        <thead>
            <tr>
                <th>#</th>
                <th>Tổng số lượng</th>
                <th>Tổng tiền</th>
                <th>Trạng thái</th>
                <th>Chi tiết</th>


            </tr>
        </thead>
        <tbody>
         
                @foreach ($manage_orders as $key => $order) 
                    @php
                        $totalQuantity = 0;
                        $totalMoney = 0;
                        if (!empty($order->orderDetails)) {
                            foreach ($order->orderDetails as $od) {
                                // get quantity
                                $totalQuantity += $od->quantity;
                                // get price
                                $productPrice = $od->price_id;
                                $totalMoney += $od->quantity * $productPrice;
                            }
                      
                        }
                    @endphp 
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>
                            {{ number_format($totalQuantity) }}
                        </td>
                        <td>
                            {{ number_format($totalMoney) }} VNĐ
                        </td>
                        <td>
                            @if (empty($order->status) || $order->status == \App\Models\Order::STATUS[0])
                                <div class="alert alert-primary" role="alert">chờ xác nhận đơn hàng</div>
                            @elseif ($order->status == \App\Models\Order::STATUS[1])
                                <div class="alert alert-secondary" role="alert">đã xác nhận đơn</div>
                            @elseif ($order->status == \App\Models\Order::STATUS[2])
                                <div class="alert alert-primary" role="alert">shipper đi giao hàng</div>
                            @elseif ($order->status == \App\Models\Order::STATUS[3])
                                <div class="alert alert-danger" role="alert">cancel đơn hàng</div>
                            @else
                                <div class="alert alert-success" role="alert">hoàn thành</div>
                            @endif
                        <td><a href="{{ route('order_detail', $order->id) }}"><button type="button"
                                    class="btn btn-primary">Chi tiết</button></a></td>

                @endforeach
              
        </tbody>
        @else
    <p>Không có lịch sử mua hàng</p>
@endif 
    </table>
  
    <br>
    <br>
    {{-- {{ $manage_orders->appends(request()->input())->links() }} --}}
@endsection
