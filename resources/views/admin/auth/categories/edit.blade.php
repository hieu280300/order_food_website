@extends('admin.layouts.app')

@section('title', 'Edit Category')

    {{-- import file css (private) --}}
    @push('css')
        <link rel="stylesheet" href="/css/categories/category-edit.css">
    @endpush

@section('content')
    <h1>Edit Category</h1>
    @if(!empty($categories))
    @foreach ($categories as $key => $category)
    <form action="{{ route('admin.category.update', $category->category_id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group mb-5">
            <label for="">Tên thể loại</label>
            <input type="text" name="category_name" value="{{ $category->category_name }} {{old('name')}} " class="form-control">
            @error('category_name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>
        <div class="form-group mb-5">
            <br>
            <label for="">Slug</label>
            <input type="text" name="category_slug" value="{{ $category->category_slug }} {{old('slug')}}" class="form-control">
            @error('category_slug')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>
        <br>
        <div class="form-group mb-5">
            <label for="">Tên cửa hàng</label>
            <input type="text" name="shop_id" value="{{ $category->shop_name }} " class="form-control" disabled>
            @error('shop_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        </div>
        @endforeach
        @endif
        <div class="form-group">
            <a href="{{ route('admin.category.index') }}" class="btn btn-secondary">Danh sách thể loại</a>
            <input type="submit" name="submit" value="Update" class="btn btn-primary">
        </div>
    </form>
@endsection
