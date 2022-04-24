@extends('frontend.shop.master_shop')
@section('title', 'Login')
@section('content')  
    <form action="{{ route('category.store') }}" method="post" class="table table-bordered table-hover table-striped">
        @csrf
        <div class="form-group px-5  mt-5">
            <label for="">Tên Thể Loại</label>
            <input type="text" name="category_name" placeholder="Tên Thể Loại   " class="form-control">
            @error('category_name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>
        <div class="form-group px-5">
            <br>
            <label for="">Category Slug</label>
            <input type="text" name="category_slug" placeholder="Category slug" class="form-control">
            @error('category_slug')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>
        <br>
        <div class="form-group px-5">
            <label for="">Tên Cửa Hàng</label>
            <select name="shop_id" class="form-control">
                @foreach ($shop as $shop)
                <option value="{{ $shop->id }}" {{ old('shop_id') == $shop->id ? 'selected' : ' ' }} >
                    {{$shop->name }}</option>
            </select>
            @endforeach
            @error('shop_id')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>
        <div class="form-group px-5 mt-5">
            <a href="{{ route('category.index') }}" class="btn btn-secondary">Danh sách thể loại</a>
            <button class="btn btn-primary" type="submit">Tạo thể loại</button>
        </div>
    </form>
@endsection
