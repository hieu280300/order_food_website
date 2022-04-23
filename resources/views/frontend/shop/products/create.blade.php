@extends('frontend.shop.master_shop')
@section('title', 'Login')
@section('content')
    <form action="{{ route('product.store') }}"  class="table table-bordered table-hover table-striped" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-5 px-5  mt-5">
            <h2 for="">Create Product</h2>
        </div>
        <div class="form-group px-5">
            <label for="">product Name</label>
            <input type="text" name="name" placeholder="product name" value="{{ old('name') }}" class="form-control">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <br>
        <div class="form-group px-5">
            <label for="">product Slug</label>
            <input type="text" name="slug" placeholder="product slug" value="{{ old('slug') }}" class="form-control">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <br>
        <div class="form-group  px-5">
            <label for="">product Code</label>
            <input type="text" name="code" placeholder="product code" value="{{ old('code') }}" class="form-control">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <br>

        <div class="form-group px-5">
            <label for="">Post Content</label>
            <textarea name="content" rows="10" class="form-control">{{ old('description') }}</textarea>
            @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

        </div>
        <br>

        <div class="form-group px-5">
            <label for="">Post Description</label>
            <textarea name="description" rows="10" class="form-control">{{ old('description') }}</textarea>
            @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

        </div>
        <br>
        <div class="form-group px-5">
                            <label for="">Money</label>
                            <input type="number" name="money" class="form-control" placeholder="">
         </div>
        <div class="form-group mb-5 px-5">
            <label for="">Quantity</label>
            <input type="number" name="quantity" placeholder="quanntity" value="{{ old('quantity') }}"
                class="form-control">
            @error('quantity')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group px-5" class="form-control">
            <label for="">Category Name</label>
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
            <label for="">Shop Name</label>
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
            <label for="">Post Thumbnail</label>
            <input type="file" name="thumbnail" placeholder="post thumbnail" class="form-control">
            @error('thumbnail')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group px-5">
            <a href="{{ route('admin.product.index') }}" class="btn btn-secondary ">List Post</a>
            <button class="btn btn-primary " type="submit">create</button>
        </div>
    </form>
    </div>
@endsection
