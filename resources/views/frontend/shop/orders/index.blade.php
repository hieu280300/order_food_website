@extends('frontend.shop.master_shop')
@section('title', 'Login')
@section('content')
<div  class="table  table-striped" style="margin-bottom: 150px;min-height: 300px;">
    <br>
    @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
    <form action="{{route('order.search')}}" method="POST" class="form-inline" role="form">
        @csrf

    <div class="container">
        <div class="row">
            {{-- <div class="input-group-addon">đến</div> --}}
            <div class="col">

        <input type="date"  name="date_first" class="form-control" >
            </div>
            <div class="col text-center">
        <div class="input-group-addon">đến</div>
    </div>
    <div class="col">

        <input type="date" name="date_second" class="form-control" >
    </div>
    <div class="col">
       <button type="submit" class="btn btn-primary">
        <i class="fas fa-search"></i>
       </button>
    </div>
    </div>
    </div>
</form>
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
                            {{ number_format($order->total) }}
                        </td>
                        <td>
                            @if (empty($order->status) || $order->status == \App\Models\Order::STATUS[0])
                                <div class="alert alert-primary" role="alert">Chưa thanh toán</div>
                            @elseif ($order->status == \App\Models\Order::STATUS[1])
                                <div class="alert alert-secondary" role="alert">Đã thanh toán online</div>
                            @elseif ($order->status == \App\Models\Order::STATUS[2])
                                <div class="alert alert-info" role="alert">Shipper đang đi giao hàng</div>
                            @elseif ($order->status == \App\Models\Order::STATUS[3])
                                <div class="alert alert-danger" role="alert">Đơn hàng đã bị hủy</div>
                            @else
                                <div class="alert alert-success" role="alert">Hoàn thành</div>
                            @endif
                        </td>
                        <td>{{date_format(date_create($order->order_date), 'd-m-Y')}}</td>
                        <td><a href="{{ route('order.show', $order->id) }}"><i class="fa fa-info-circle"  style="padding:20px;font-size:20px;color:black" aria-hidden="true"></i></a></td>
                        <td><a href="{{ route('order.edit', $order->id) }}" ><i class="fa fa-pencil-square-o" style="padding:20px;font-size:20px;color:black" aria-hidden="true"></i></a> </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    <div>
    {{ $orders->links() }}
</div>
</div>

@endsection
