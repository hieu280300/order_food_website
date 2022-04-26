@extends('admin.layouts.app')
@section('title', 'Create Post')
@push('css')
    <link rel="stylesheet" href="/css/categories/category-create.css">
@endpush
@section('content')
    <style type="text/css">
        .color_id {
            width: 500px;
        }
    </style>

    <h1>Tạo sản phẩm</h1>
    <br>
    <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-5">
            <label for="">Tên sản phẩm</label>
            <input type="text" name="name" placeholder="Tên sản phẩm" value="{{ old('name') }}" class="form-control">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <br>
        <div class="form-group mb-5">
            <label for="">Slug</label>
            <input type="text" name="slug" placeholder="Slug" value="{{ old('slug') }}" class="form-control">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <br>
        <div class="form-group mb-5">
            <label for="">Code</label>
            <input type="text" name="code" placeholder="Code" value="{{ old('code') }}" class="form-control">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <br>

        <div class="form-group mb-5">
            <label for="">Nội dung</label>
            <textarea name="content" rows="10" class="form-control">{{ old('description') }}</textarea>
            @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

        </div>
        <br>

        <div class="form-group mb-5">
            <label for="">Mô tả</label>
            <textarea name="description" rows="10" class="form-control">{{ old('description') }}</textarea>
            @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

        </div>
        <br>
        <div class="form-group mb-5">
                            <label for="">Giá</label>
                            <input type="number" name="money" class="form-control" placeholder="">
         </div>
        <div class="form-group mb-5">
            <label for="">Số lượng</label>
            <input type="number" name="quantity" placeholder="quanntity" value="{{ old('quantity') }}"
                class="form-control">
            @error('quantity')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-5" class="form-control">
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
        <div class="form-group mb-5" class="form-control">
            <label for="">Tên cửa hàng</label>
            <select name="shop_id" class="form-control">
            <option value="{{ $product->shop_id }}" {{ old('shop_id') == $product->shop_id ? 'selected' : ' ' }}>
                {{ $product->shop_name }}</option>
        </select>
        @error('shop_id')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
        </div>
        <br>
        <div class="form-group mb-5">
            <label for="">Ảnh</label>
            <input type="file" name="thumbnail" placeholder="Ảnh" class="form-control">
            @error('thumbnail')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <a href="{{ route('admin.product.index') }}" class="btn btn-secondary">Danh sách sản phẩm</a>
            <button class="btn btn-primary" type="submit">Tạo</button>
        </div>
    </form>


@endsection
