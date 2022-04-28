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
    <h1>Tạo cửa hàng</h1>
    <br>
    <form action="{{ route('admin.shop.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-5">
            <label for="">Tên chủ cửa hàng</label>
            <input type="text" name="name" placeholder="Tên chủ cửa hàng" value="{{ old('name') }}"  class="form-control">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <br>
        <div class="form-group mb-5">
            <label for="">Email</label>
            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}"  class="form-control" required>
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <br>
        <div class="form-group mb-5">
            <label for="">Mật khẩu</label>
            <input type="password" name="password" placeholder="Mật khẩu" value="{{ old('password') }}"  class="form-control">
            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <br>
        <div class="form-group mb-5">
            <label for="">Tên cửa hàng</label>
            <input type="text" name="name_shop" placeholder="Tên cửa hàng" value="{{ old('name_shop') }}"  class="form-control">
            @error('name_shop')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <br>
        <div class="form-group mb-5">
            <label for="">Địa chỉ cửa hàng</label>
            <input type="text" name="address_shop" placeholder="Địa chỉ cửa hàng" value="{{ old('address_shop') }}"  class="form-control">
            @error('address_shop')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <br>
        <div class="form-group mb-5">
            <label for="">Số điện thoại cửa hàng</label>
            <input type="text" name="phone_shop" placeholder="Số điện thoại cửa hàng" value="{{ old('phone_shop') }}"  class="form-control">
            @error('address_shop')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <br>
        <div class="form-group mb-5">
            <label for="">Thời gian mở cửa</label>
            <input type="time" name="time_open" placeholder="Thời gian mở cửa" value="{{ old('time_open') }}"  class="form-control">
            @error('time_open')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <br>
        <div class="form-group mb-5">
            <label for="">Thời gian đóng cửa</label>
            <input type="time" name="time_close" placeholder="Thời gian đóng cửa" value="{{ old('time_close') }}"  class="form-control">
            @error('time_close')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <br>

        <div class="form-group mb-5">
            <label for="">Ảnh đại diện cửa hàng</label>
            <input type="file" name="image_shop" placeholder="Ảnh đại diện cửa hàng" class="form-control">
            @error('image_shop')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <br>


        <div class="form-group">
            <a href="{{ route('admin.shop.index') }}" class="btn btn-secondary">Danh sách cửa hàng</a>
            <button class="btn btn-primary" type="submit">Tạo</button>
        </div>
    </form>
@endsection
