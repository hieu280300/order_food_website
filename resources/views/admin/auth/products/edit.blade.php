@extends('admin.layouts.app')

@section('title', 'Create Post')

    {{-- import file css (private) --}}
    @push('css')
        <link rel="stylesheet" href="/css/posts/post-create.css">
    @endpush

@section('content')
<style type="text/css">
    .color_id
    {
        width: 500px;
    }
    </style>
    <h1>Create Product</h1>
    @if(!empty($products))
    @foreach ($products as $key => $product)
    <form action="{{ route('admin.product.update', $product->product_id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group mb-5">
            <label for="">product Name</label>
            <input type="text" name="name" placeholder="product name" value="{{$product->product_name}}"class="form-control">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <br>
        <div class="form-group mb-5">
            <label for="">product Slug</label>
            <input type="text" name="slug" placeholder="product slug" value="{{$product->product_slug}}" class="form-control">
            @error('slug')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <br>
        <div class="form-group mb-5">
            <label for="">product Code</label>
            <input type="text" name="code" placeholder="product code" value="{{$product->product_code}}" class="form-control">
            @error('code')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <br>

        <div class="form-group mb-5">
            <label for="">Post Content</label>
            <textarea name="content" rows="10" class="form-control">{{$product->product_description}}</textarea>
            @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

        </div>
        <br>

        <div class="form-group mb-5">
            <label for="">Post Description</label>
            <textarea name="description" rows="10" class="form-control">{{$product->product_content}}</textarea>
            @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

        </div>
        <br>
        <div class="form-group mb-5">
                            <label for="">Money</label>
                            <input type="number" name="money" class="form-control" value="{{$product->product_money}}" placeholder="">
         </div>
        <div class="form-group mb-5">
            <label for="">Quantity</label>
            <input type="number" name="quantity" placeholder="quanntity" value="{{$product->product_quantity}}"
                class="form-control">
            @error('quantity')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-5" class="form-control">
            <label for="">Category Name</label>
            <input type="text" name="category_id" value="{{ $product->category_name }} " class="form-control" disabled>
            @error('category_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-5">
            <label for="">Shop Name</label>
            <input type="text" name="shop_id" value="{{ $product->shop_name }} " class="form-control" disabled>
            @error('shop_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-5">
            <label for="">Product Thumbnail</label>
            <img src="{{ asset($product->thumbnail) }}" alt="{{ $product->product_name }}" class="img-fluid" style="width:100px">
            <input type="file" name="thumbnail" placeholder="post thumbnail" class="form-control">
            @error('thumbnail')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        @endforeach
        @endif
        <br>

        <div class="form-group">
            <a href="{{ route('admin.product.index') }}" class="btn btn-secondary">List Product</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
@endsection
