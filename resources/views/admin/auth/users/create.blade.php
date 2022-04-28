@extends('admin.layouts.app')
<!-- //import file css -->
@push('css')
    <link rel="stylesheet" href="/css/posts/post-list.css">
@endpush
@section('title', 'Create user')
@section('content')
    <h1>Tạo khách hàng</h1>
    <br>
    
@if(session()->has('error'))
<div class="alert alert-success">
    {{ session()->get('error') }}
</div>
@endif
    <form action="{{ route('admin.user.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-5">
            <label for="">Tên</label>
            <input type="text" name="name" placeholder="user name" value="{{ old('name') }}" class="form-control">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <br>
        <div class="form-group mb-5">
            <label for="">Email</label>
            <input type="text" name="email" placeholder="email" value="{{old('email')}}" class="form-control">
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

        </div>
        <br>
        <div class="form-group mb-5" class="form-control">
            <label for="">Mật khẩu</label>
            <input type="password" name="password" placeholder="password" value="{{old('password')}}" class="form-control">
            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-5">
            <label for="">Giới tính</label>
            <div>
                <input type="radio" name="gender" value="0" checked id="gender>
                <label for="price-status-0">Nam</label>
                <input type="radio" name="gender" value="1" id="gender">
                <label for="price-status-1">Nữ</label>
            </div>
        </div>
        <div class="form-group mb-5">
            <label for="">Ảnh đại diện</label>
            <input type="file" name="avatar" placeholder="avatar" class="form-control">
            @error('avatar')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <a href="{{ route('admin.user.index') }}" class="btn btn-secondary">Danh sách khách hàng</a>
            <button class="btn btn-primary" type="submit">Tạo</button>
        </div>
    </form>
@endsection
