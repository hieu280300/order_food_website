@extends('admin.layouts.app')
<!-- //import file css -->
@push('css')
    <link rel="stylesheet" href="/css/posts/post-list.css">
@endpush
@section('title', 'Detail User')
@section('content')
    <h1>Danh sách cửa hàng</h1>
    <form action="">
        <table id="post" class="table">
            <thead class="thead-dark">
                <tr>   
                    <th scope="col">Số thứ tự</th>
                    <th scope="col">Tên chủ cửa hàng</th>
                    <th scope="col">Tên cửa hàng</th>
                    <th scope="col">Địa chỉ cửa hàng</th>
                    <th scope="col">Ảnh cửa hàng</th>
                    <th scope="col" colspan="3">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($shops as $key => $shop)
                <tr>
                    <td scope="col">{{$key+1}}</td>
                    <td scope="col">{{$shop->user_name}}</td>
                    <td scope="col">{{ $shop->shop_name }} </td>
                    <td scope="col">{{ $shop->shop_address }}</td>
                    <td scope="col">   <img src="{{ asset($shop->shop_image)}}" alt="" class="img-flid" style="width:100px"></td>
                     <td>
                        <a href="{{ route('admin.category.show', $shop->shop_id) }}" name="submit" class="btn btn-info">Thể loại</a></td>
                    <td scope="col"><a href="{{ route('admin.product.show', $shop->shop_id) }}" name="submit" class="btn btn-info">Sản phẩm</a></td></td>
                    <td scope="col"><a href="{{ route('admin.order.index', $shop->shop_id) }}" name="submit" class="btn btn-info">Đơn đặt hàng</a> </td>
                    
                    @endforeach
                </tr>
            </tbody>
        </table>
    </form>

    {{$shops->links() }} 
    @endsection
