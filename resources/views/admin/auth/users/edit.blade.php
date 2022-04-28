@extends('admin.layouts.app')

@section('title', 'Create Post')

{{-- import file css (private) --}}
@push('css')
    <link rel="stylesheet" href="/css/posts/post-create.css">
@endpush

@section('content')
    <style type="text/css">
        .color_id {
            width: 500px;
        }

    </style>
    <h1>Chỉnh sửa thông tin người dùng</h1>
    <form action="{{ route('admin.user.update', ['id' => $user->id])}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group mb-5">
            <label for="">Tên</label>
            <input type="text" name="name" placeholder="Tên" value="{{ $user->name }}" class="form-control">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <br>
        <div class="form-group mb-5">
            <label for="">Email</label>
            <input type="text" name="email" placeholder="Email" value="{{ $user->email }}" class="form-control" readonly>
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <br>
        <div class="form-group mb-5">
            <label for="">Số điện thoại</label>
            <input type="text" name="phone" placeholder="số điện thoại" value="{{ $user->phone }}" class="form-control">
            @error('phone')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <br>

        <div class="form-group mb-5">
            <label for="">Địa chỉ</label>
            <input type="text" name="address" placeholder="Địa chỉ" value="{{ $user->address }}" class="form-control">
            @error('address')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

        </div>
        <br>
        <div class="form-group ">
            <label class="col-lg-3 control-label">Birthday:</label>
            <div class="col-lg-">
                <input class="form-control" name="birthday" type="date" value="{{ $user->birthday }}">
            </div>
            @error('birthday')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <br>
        <div class="form-group">
            <label class="col-lg-3 control-label">Giới tính</label>
            <div class="col-lg-12">
                <input type="radio" name="gender" value="0" checked id="gender">
                <label for=" price-status-0">Nam</label>
                <input type="radio" name="gender" value="1" id="gender">
                <label for="price-status-1">Nữ</label>
            </div>
            <div class="form-group mb-5">
                <label class="col-lg-3 control-label">Ảnh đại diện:</label>
                <img src="{{ asset($user->avatar) }}" alt="{{ $user->avatar }}" class="img-fluid"
                    style="width:100px">
                <input type="file" name="avatar" class="form-control">
                @error('avatar')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <br>

            <div class="form-group">
                <a href="{{ route('admin.user.index') }}" class="btn btn-secondary">Danh sách người dùng</a>
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </div>
    </form>
@endsection
