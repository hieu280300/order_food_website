@extends('frontend.shop.master_shop')
@section('title', 'Login')
@section('content')
<div  class="table  table-striped" style="margin-bottom: 150px; min-height: 300px;">
    <br>
    @if(session()->has('mess'))
    <div class="alert alert-success">
        {{ session()->get('mess') }}
    </div>
@endif
    <table id="post"  class="table table-bordered table-hover table-striped">
        <thead class="thead-dark">
            <tr class="center">
                <th scope="col">Số thứ tự</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Tên đường truyền</th>
                <th scope="col">Ảnh</th>
                <th scope="col">giá</th>
                <th scope="col">Mô tả</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Tên thể loại</th>
                <th scope="col" colspan="3">Hành động</th>
            </tr>
        </thead class="thead-light">
        <tbody>
            @if (!empty($products))
                @foreach ($products as $key => $product)
                    <tr>
                        <td scope="col">{{ $key+1 }}</td>
                        <td scope="col">{{ $product->product_name }}</td>
                        <td scope="col">{{ $product->product_slug }}</td>
                        <td>
                            <img src="{{ asset($product->product_thumbnail) }}" alt="{{ $product->product_name }}" class="img-flid" style="width:100px">
                        </td>
                        <td scope="col">{{ number_format($product->product_money)}} VNĐ</td>
                        <td scope="col">{{ $product->product_description }}</td>
                        <td scope="col">{{ $product->product_quantity }}</td>
                        <td scope="col">{{ $product->category_name }}</td>

                        {{-- <td scope="col">{{$posts->}}</td> --}}

                        <td scope="col"><a href="{{route('product.edit',$product->product_id)}}"><i class="fa fa-pencil-square-o" style="padding:20px;font-size:20px;color:black" aria-hidden="true"></i></a></td>
                        <td>
                            <form action="{{ route('product.destroy', $product->product_id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit"  style="border: none;background:none"  onclick="return confirm('Bạn muốn xóa sản phẩm này?')"><i class="fa fa-trash-o" aria-hidden="true" style="padding:20px;font-size:20px;color:black; "></i></button>

                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>

    </table>
    <div>
        {{$products->links()}}
    </div>
</div>
@endsection