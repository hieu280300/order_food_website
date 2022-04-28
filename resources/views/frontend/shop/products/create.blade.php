@extends('frontend.shop.master_shop')
@section('title', 'Login')
@section('content')
    <form action="{{ route('product.store') }}"  class="table table-bordered table-hover table-striped" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-5 px-5  mt-5">
            <h2 for="">Tạo sản phẩm</h2>
        </div>
        <div class="form-group px-5">
            <label for="">Tên sản phẩm</label>
            <input type="text" name="name" placeholder="Tên sản phẩm" value="{{ old('name') }}" class="form-control">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <br>
        <div class="form-group px-5">
            <label for="">Slug</label>
            <input type="text" name="slug" placeholder="Slug" value="{{ old('slug') }}" class="form-control">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <br>
        <div class="form-group px-5">
            <label for="">Mô tả</label>
            <textarea name="description" rows="10" class="form-control">{{ old('description') }}</textarea>
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

        </div>
        <br>
        <div class="form-group px-5">
                            <label for="">Giá</label>
                            <input type="number" name="money" class="form-control" placeholder="">
         </div>
        <div class="form-group mb-5 px-5">
            <label for="">Số lượng</label>
            <input type="number" name="quantity" placeholder="quanntity" value="{{ old('quantity') }}"
                class="form-control">
            @error('quantity')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group px-5" class="form-control">
            <label for="">Tên thể loại</label>
            <select name="category_id" class="form-control">
                <option value=""></option>
                @if (!empty($products))
                    @foreach ($products as $product)
                        <option value="{{ $product->category_id }}" {{ old('category_id') == $product->category_id? 'selected' : ' ' }}>
                            {{ $product->category_name }}</option>
                    @endforeach
                @endif
            </select>
            @error('category_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group px-5" class="form-control">
            <label for="">Tên cửa hàng</label>
            <select name="shop_id" class="form-control">
                @if (!empty($products))
                @foreach ($products as $product)
            <option value="{{ $product->shop_id }}" {{ old('shop_id') == $product->shop_id ? 'selected' : ' ' }}>
                {{ $product->shop_name }}</option>
                @endforeach
                @endif
        </select>
        @error('shop_id')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
        </div>
        <br>
        <div class="form-group px-5">
            <label for="">Ảnh</label>
            <input type="file" name="thumbnail" placeholder="Ảnh" class="form-control">
            @error('thumbnail')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group px-5">
            <a href="{{ route('admin.product.index') }}" class="btn btn-secondary ">Danh sách sản phẩm</a>
            <button class="btn btn-primary " type="submit">Tạo</button>
        </div>
    </form>
    </div>
@endsection
