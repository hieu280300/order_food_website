@extends('admin.layouts.app')
<!-- //import file css -->
@push('css')
    <link rel="stylesheet" href="/css/posts/post-list.css">
@endpush
@section('title', 'List Post')
@section('content')
@include('admin.auth.products.search')
@if(session()->has('mess'))
<div class="alert alert-success">
    {{ session()->get('mess') }}
</div>
@endif
        {{-- <p><a href="{{ route('admin.product.create',$shop_id) }}" class="btn btn-secondary" >Tạo</a></p> --}}
    <br>
    <table id="post"  class="table table-bordered table-hover table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tên sản phẩm</th>
               <th scope="col">Slug</th>
                 {{-- <th scope="col">Code</th> --}}
                <th scope="col">Ảnh</th>
                <th scope="col">Giá</th>
                <th scope="col">Mô tả</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Tên thể loại</th>
                {{-- <th scope="col" colspan="3">Hành động</th> --}}
            </tr>
        </thead class="thead-light">
        <tbody>
            @if (!empty($products))
                @foreach ($products as $key => $product)
                    <tr>
                        <td scope="col">{{ $key+1 }}</td>
                        <td scope="col">{{ $product->product_name }}</td>
                        <td scope="col">{{ $product->product_slug }}</td>
                         {{-- <td scope="col">{{ $product->product_code}}</td> --}}
                        <td>
                            <img src="{{ asset($product->product_thumbnail) }}" alt="{{ $product->product_name }}" class="img-flid" style="width:100px">
                        </td>
                        <td scope="col">{{ number_format($product->product_money)}} VNĐ</td>
                        <td scope="col">{{ $product->product_description }}</td>
                        <td scope="col">{{ $product->product_quantity }}</td>
                        <td scope="col">{{ $product->category_name }}</td>
                        {{-- <td><a href="{{route('admin.product.edit',$product->product_id)}}"><i class="fa fa-pencil-square-o" style="padding:20px;font-size:20px;color:black" aria-hidden="true"></i></a></td>
                        <td>
                            <form action="{{ route('admin.product.destroy', $product->product_id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="border: none;background:none"  onclick="return confirm('Bạn muốn xóa thể loại này?')"><i class="fa fa-trash-o" aria-hidden="true" style="padding:20px;font-size:20px;color:black; "></i></button>

                            </form>
                        </td> --}}
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
{{$products->links()}}
@endsection
