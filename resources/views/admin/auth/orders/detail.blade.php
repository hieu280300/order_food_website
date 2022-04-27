@extends('admin.layouts.app')
@section('title', 'detail Product')
    @push('css')
        <link rel="stylesheet" href="/css/categories/category-create.css">
    @endpush
@section('content')
    <h1>Chi tiết đơn hàng</h1>
    <form action="">
        <table id="product" class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Số thứ tự</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Hình ảnh sản phẩm</th>
                    <th scope="col">Gía</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Thành tiền</th>
                    <th scope="col">Ngày đặt hàng</th>
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
                    <td cope="col">{{++$key}}</td>
                    <td cope="col">{{ $product_name }}</td>
                    <td scope="col"><img src="{{ asset($thumbnail) }}" alt="{{ $product_name }}"
                        class="img-fluid img-thumbnail" style="width:100px"></td>
                    <td scope="col">{{ number_format($price) }}</td>

                    <td scope="col">{{ number_format($quantity) }}</td>
                    <td scope="col">
                        {{ number_format($money) }}
                    </td>
                    <td scope="col">
                        {{ date_format(date_create($date_order), 'd-m-Y') }}
                    </td>
            
                </tr>
                @endforeach
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
    </form>
    <div class="form-group">
        <a href="{{ route('admin.product.index') }}" class="btn btn-secondary">List Post</a>
    </div>
    @endsection
