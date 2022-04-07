@extends('admin.layouts.app')
@section('title', 'Create category')
@push('css')
    <link rel="stylesheet" href="/css/categories/category-create.css">
@endpush
@section('content')

    <h1>Create Category</h1>
    <br>
    <form action="{{ route('admin.category.store') }}" method="post">
        @csrf
        <div class="form-group mb-5">
            <label for="">Category Name</label>
            <input type="text" name="category_name" placeholder="Category name" class="form-control">
            @error('category_name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>
        <div class="form-group mb-5">
            <br>
            <label for="">Category Slug</label>
            <input type="text" name="category_slug" placeholder="Category slug" class="form-control">
            @error('category_slug')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>
        <br>
        <div class="form-group mb-5">
            <label for="">Shop Name</label>
            <select name="shop_id" class="form-control">
                <option value=""></option>
                @if (!empty($shops))
                    @foreach ($shops as $shopId => $shopName)
                        <option value="{{ $shopId }}" {{ old('shop_id') == $shopId ? 'selected' : ' ' }}>
                            {{ $shopName }}</option>
                    @endforeach
                @endif
            </select>
            @error('shop_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <a href="{{ route('admin.category.index') }}" class="btn btn-secondary">List category</a>
            <button class="btn btn-primary" type="submit">create</button>
        </div>
    </form>
@endsection
