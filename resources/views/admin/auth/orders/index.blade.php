@extends('admin.layouts.app')
<!-- //import file css -->
@push('css')
    <link rel="stylesheet" href="/css/posts/post-list.css">
@endpush
@section('title', 'List Post')
@section('content')
@if(!empty($id))
<form action="{{ route('admin.order.search',$id) }}" method="POST" class="form-inline" role="form">
  
    @csrf
<div class="container">
    <div class="row">
        {{-- <div class="input-group-addon">đến</div> --}}
        <div class="col">

    <input type="date" name="date_first" class="form-control" >
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
@endif
<br>
    <br>
    <table id="post" class="table table-bordered table-hover table-striped mt-2">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Số thứ tự</th>
                <th scope="col">Tên khách hàng</th>
                <th scope="col">Tổng số lượng</th>
                <th scope="col">Thành tiền</th>
                <th scope="col">Trạng thái đơn hàng</th>
                <th scope="col">Ngày đặt hàng</th>
                <th scope="col" colspan="2">Hành động</th>
            </tr>
        </thead class="thead-light">
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
                        <td scope="col">{{ $key + 1 }}</td>
                        <td scope="col">{{ $order->user->name }}</td>
                        {{-- <td scope="col">{{ $product->product_slug }}</td>
                        <td scope="col">{{ $product->product_code}}</td> --}}
                        <td>
                           {{$totalQuantity}}
                        </td>
                        <td scope="col">{{ number_format($order->total) }} VNĐ</td>
                        <td scope="col">    @if (empty($order->status) || $order->status == \App\Models\Order::STATUS[0])
                            <div class="alert alert-primary" role="alert">Chưa thanh toán</div>
                        @elseif ($order->status == \App\Models\Order::STATUS[1])
                            <div class="alert alert-secondary" role="alert">Đã thanh toán online</div>
                        @elseif ($order->status == \App\Models\Order::STATUS[2])
                            <div class="alert alert-info" role="alert">Shipper đang đi giao hàng</div>
                        @elseif ($order->status == \App\Models\Order::STATUS[3])
                            <div class="alert alert-danger" role="alert">Đơn hàng đã bị hủy</div>
                        @else
                            <div class="alert alert-success" role="alert">Hoàn thành</div>
                        @endif</td>
                        <td scope="col">{{date_format(date_create($order->order_date), 'd-m-Y')}}</td>

                        <td>
                            <a href="{{route('admin.order.show',$order->id)}}"><input type="submit" name="submit" value="Chi tiết" class="btn btn-info"></a>
                        </td>
                        <td scope="col"><a href="{{ route('admin.order.edit', $order->id) }}"><input
                                    type="submit" name="submit" value="Cập nhật trạng thái" class="btn btn-success"></a> </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    {{ $orders->links() }}
@endsection
