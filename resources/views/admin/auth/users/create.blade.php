@extends('admin.layouts.app')
<!-- //import file css -->
@push('css')
    <link rel="stylesheet" href="/css/posts/post-list.css">
@endpush
@section('title', 'Create user')
@section('content')
    <h1>Create User</h1>
    <br>
    <form action="{{ route('admin.user.store') }}" method="post">
        @csrf
        <div class="form-group mb-5">
            <label for="">User Name</label>
            <input type="text" name="name" placeholder="user name" value="{{ old('name') }}" class="form-control">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <br>
        <div class="form-group mb-5">
            <label for="">User email</label>
            <input type="text" name="email" placeholder="email" value="{{old('email')}}" class="form-control">
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

        </div>
        <br>
        <div class="form-group mb-5" class="form-control">
            <label for="">User password</label>
            <input type="password" name="password" placeholder="password" value="{{old('password')}}" class="form-control">
            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-5">
            <label for="">Gender</label>
            <div>
                <input type="radio" name="gender" value="0" checked id="gender>
                <label for="price-status-0">Male</label>
                <input type="radio" name="gender" value="1" id="gender">
                <label for="price-status-1">Female</label>
            </div>
        </div>
        <div class="form-group mb-5">
            <label for="">Avatar</label>
            <input type="file" name="avatar" placeholder="avatar" class="form-control">
            @error('avatar')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <a href="{{ route('admin.user.index') }}" class="btn btn-secondary">List User</a>
            <button class="btn btn-primary" type="submit">Tạo</button>
        </div>
    </form>
@endsection
