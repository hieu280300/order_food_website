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
    <form action="{{ route('admin.product.update', request()->route('id')) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group mb-5">
            <label for="">Product Name</label>
            <input type="text" name="name" placeholder="product name" value="{{ old('name', $product->name) }}"
                class="form-control">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-5">
            <label for="">Product Thumbnail</label>
            <img src="{{ asset($product->thumbnail) }}" alt="{{ $product->name }}" class="img-fluid" style="width:100px">
            <input type="file" name="thumbnail" placeholder="post thumbnail" class="form-control">
            @error('thumbnail')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-5">
            <label for="">Product Content</label>
            <textarea name="description" rows="10" class="form-control">{{ old('description', $product->description) }}</textarea>
        </div>
        <div class="form-group mb-5">
            <label for="">Category</label>
            <select name="category_id" class="form-control">

                <option value=""></option>
                @if (!empty($categories))
                    @foreach ($categories as $categoryId => $categoryName)
                        <option value="{{ $categoryId }}"
                            {{ old('category_id', $product->category_id) == $categoryId ? 'selected' : '' }}>
                            {{ $categoryName }}</option>
                    @endforeach
                @endif
            </select>
            @error('category_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-5" class="form-control">
            <label for="">Size </label>
            <select  class="js-example-basic-multiple"  multiple="multiple" name="size_id[]" >
                @if (!empty($sizes))
                    @foreach ($sizes as $sizeId =>$sizeName)  
                        <option class="color_id" value="{{ $sizeId }}"
                        {{ old('size_id',$sizeName) == $sizeId ? 'selected' : ' ' }}>
                            {{ $sizeName}}</option>    
                    @endforeach
                @endif
           
            </select>
        </div>
        <div class="form-group mb-5" class="form-control">
            <label for="">color</label>
            <select  class="js-example-basic-multiple"  multiple="multiple" name="color_id[]">
                @if (!empty($colors))
                @foreach ($colors as $colorId => $colorName)
                        <option  class="color_id" value="{{ $colorId }}" 
                        {{ old('color_id') }}  == $colorId ? 'selected' : ' ' }} > 
                            {{ $colorName }}</option>
                        
                    @endforeach
                @endif
            </select>
        </div>
        <div class="form-group mb-5">
            <label for="">Price</label>
            <input type="number" name="price" placeholder="price" value="{{ old('quantity',$product->latestPrice()->price) }}" class="form-control">
            @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-5">
            <label for="">Quantity</label>
            <input type="number" name="quantity" placeholder="quanntity" value="{{ old('quantity',$product->quantity) }}" class="form-control">
            @error('quantity')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <a href="{{ route('admin.product.index') }}" class="btn btn-secondary">List Product</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
@endsection
