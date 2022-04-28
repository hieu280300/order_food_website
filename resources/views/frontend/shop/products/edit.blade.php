@extends('frontend.shop.master_shop')
@section('title', 'Login')
@section('content')
<style type="text/css">
    .color_id
    {
        width: 500px;
    }
    </style>
    @if(!empty($products))
    @foreach ($products as $key => $product)
    <form class="table table-bordered table-hover table-striped" action="{{ route('product.update', $product->product_id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group  px-5  mt-5">
            <label for="">Tên sản phẩm</label>
            <input type="text" name="name" placeholder="Tên sản phẩm" value="{{$product->product_name}}"class="form-control">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <br>
        <div class="form-group px-5">
            <label for="">Slug sản phẩm</label>
            <input type="text" name="slug" placeholder="Slug" value="{{$product->product_slug}}" class="form-control">
            @error('slug')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <br>
        <div class="form-group px-5">
            <label for="">Mô tả</label>
            <textarea name="description" rows="10" class="form-control">{{$product->product_description}}</textarea>
            @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

        </div>
        <br>
        <div class="form-group px-5">
                            <label for="">Giá</label>
                            <input type="number" name="money" class="form-control" value="{{$product->product_money}}" placeholder="">
         </div>
        <div class="form-group px-5">
            <label for="">Số lượng</label>
            <input type="number" name="quantity" placeholder="quanntity" value="{{$product->product_quantity}}"
                class="form-control">
            @error('quantity')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group px-5" class="form-control">
            <label for="">Thể loại</label>
            <input type="text" name="category_id" value="{{ $product->category_name }} " class="form-control" disabled>
            @error('category_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group px-5">
            <label for="">Tên cửa hàng</label>
            <input type="text" name="shop_id" value="{{ $product->shop_name }} " class="form-control" disabled>
            @error('shop_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group px-5">
            <label for="">Ảnh</label>
            <img src="{{ asset($product->thumbnail) }}" alt="{{ $product->product_name }}" class="img-fluid" style="width:100px">
            <input type="file" name="thumbnail" placeholder="Ảnh" class="form-control">
            @error('thumbnail')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        @endforeach
        @endif
        <br>

        <div class="form-group px-5">
            <a href="{{ route('product.index') }}" class="btn btn-secondary">Danh sách sản phẩm</a>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </div>
    </form>
@endsection
