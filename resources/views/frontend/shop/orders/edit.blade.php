@extends('frontend.shop.master_shop')
@section('title', 'Login')
@section('content')
<form action="{{ route('order.update', request()->route('id')) }}" class="table table-bordered table-hover table-striped m-5 pl-5" method="post">
@csrf
@method('put')
@foreach ($orders as $order)
@php
$totalQuantity = 0;
$totalMoney = 0;
if (!empty($order->orderDetails)) {
    foreach ($order->orderDetails as $od) {
        $totalQuantity = $od->quantity;
        $totalMoney = $od->money;
    }
}
@endphp
<div class="mb-2">
    <label for="">Tên</label>
    <p>{{ $order->user->name }}</p>
</div>
<div class="mb-2">
    <label for="">Tổng số lượng</label>
    <p>{{number_format($totalQuantity)}}</p>
</div>
<div class="mb-2">
    <label for="">Tổng tiền</label>
    <p>{{number_format($totalMoney)}}</p>
</div>
<div class="mb-2">
    <label for="">Status</label>
    <ul>
        <li>
            <input type="radio" name="status" id="order-status-0" value="{{ \App\Models\Order::STATUS[0] }}" {{ $order->status == \App\Models\Order::STATUS[0] ? 'checked' : '' }}>
            <label for="order-status-0">Chưa thanh toán</label>
        </li>
        <li>
            <input type="radio" name="status" id="order-status-1" value="{{ \App\Models\Order::STATUS[1] }}" {{ $order->status == \App\Models\Order::STATUS[1] ? 'checked' : '' }}>
            <label for="order-status-1">Đã thanh toán online</label>
        </li>
        <li>
            <input type="radio" name="status" id="order-status-2" value="{{ \App\Models\Order::STATUS[2] }}" {{ $order->status == \App\Models\Order::STATUS[2] ? 'checked' : '' }}>
            <label for="order-status-2">Shipper đang đi giao hàng</label>
        </li>
        <li>
            <input type="radio" name="status" id="order-status-3" value="{{ \App\Models\Order::STATUS[3] }}" {{ $order->status == \App\Models\Order::STATUS[3] ? 'checked' : '' }}>
            <label for="order-status-3">Hủy đơn hàng</label>
        </li>
        <li>
            <input type="radio" name="status" id="order-status-4" value="{{ \App\Models\Order::STATUS[4] }}" {{ $order->status == \App\Models\Order::STATUS[4] ? 'checked' : '' }}>
            <label for="order-status-4">Hoàn thành</label>
        </li>
    </ul>
</div>
<div class="mb-2">
    <a href="{{ route('order.index') }}" class="btn btn-secondary">Trở về</a>
    <button type="submit" class="btn btn-primary">Cập nhật</button>
</div>
</form>
@endforeach
@endsection
