@extends('admin.layouts.app')
@section('title', 'Create Post')
    @push('css')
        <link rel="stylesheet" href="/css/categories/category-create.css">
    @endpush
@section('content')
<style type="text/css">
.color_id
{
    width: 500px;
}
</style>
    <h1>Create Shop</h1>
    <br>
    <form action="{{ route('admin.shop.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-5">
            <label for="">User Name</label>
            <input type="text" name="name" placeholder="User Name" value="{{ old('name') }}" class="form-control">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <br>
        <div class="form-group mb-5">
            <label for="">Email</label>
            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" class="form-control" required>
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <br>
        <div class="form-group mb-5">
            <label for="">Password</label>
            <input type="password" name="password" placeholder="Password" value="{{ old('password') }}" class="form-control">
            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <br>
        <div class="form-group mb-5">
            <label for="">Name Shop</label>
            <input type="text" name="name_shop" placeholder="Name Shop" value="{{ old('name_shop') }}" class="form-control">
            @error('name_shop')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <br>
        <div class="form-group mb-5">
            <label for="">Address Shop</label>
            <input type="text" name="address_shop" placeholder="Address Shop" value="{{ old('address_shop') }}" class="form-control">
            @error('address_shop')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <br>
        <div class="form-group mb-5">
            <label for="">Time Open Shop</label>
            <input type="time" name="time_open" placeholder="Time Open Shop" value="{{ old('address_shop') }}" class="form-control">
            @error('time_open')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <br>
        <div class="form-group mb-5">
            <label for="">Time Close Shop</label>
            <input type="time" name="time_close" placeholder="Time Close Shop" value="{{ old('address_shop') }}" class="form-control">
            @error('time_close')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <br>

        <div class="form-group mb-5">
            <label for="">Image Shop</label>
            <input type="file" name="image_shop" placeholder="image shop" class="form-control">
            @error('image_shop')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <br>


        <div class="form-group">
            <a href="{{ route('admin.shop.index') }}" class="btn btn-secondary">List Shops</a>
            <button class="btn btn-primary" type="submit">Tạo</button>
        </div>
    </form>
@endsection
