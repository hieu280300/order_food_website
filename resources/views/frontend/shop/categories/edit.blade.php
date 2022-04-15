@extends('frontend.shop.master_shop')
@section('title', 'Login')
@section('content')  
    @if(!empty($categories))
    @foreach ($categories as $key => $category)
    <form class="table table-bordered table-hover table-striped" action="{{ route('category.update', $category->category_id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group px-5  mt-5">
            <label for="">Category Name</label>
            <input type="text" name="category_name" value="{{ $category->category_name }} {{old('name')}} " class="form-control">
            @error('category_name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>
        <div class="form-group  px-5">
            <br>
            <label for="">Category Slug</label>
            <input type="text" name="category_slug" value="{{ $category->category_slug }} {{old('slug')}}" class="form-control">
            @error('category_slug')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>
        <br>
        <div class="form-group  px-5">
            <label for="">Shop Name</label>
            <input type="text" name="shop_id" value="{{ $category->shop_name }} " class="form-control" disabled>
            @error('shop_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        @endforeach
        @endif
        <div class="form-group px-5">
            <a href="{{ route('category.index') }}" class="btn btn-secondary">List Category</a>
            <input type="submit" name="submit" value="Update" class="btn btn-primary">
        </div>
    </form>
@endsection
