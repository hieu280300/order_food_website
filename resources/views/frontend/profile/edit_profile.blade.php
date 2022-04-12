@extends('frontend.layouts.master')
@section('title', 'Cart')
@push('css')
@endpush
@section('content')
    <style>
        /* body{margin-top:20px;}		 */

    </style>

    <div class="container bootstrap snippets bootdey">

        <h1 class="text-primary"><span class="glyphicon glyphicon-user"></span>Edit Profile</h1>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <h3 style="text-align: center">Personal info</h3>
                <form enctype="multipart/form-data" action="{{ route('updateProfile', ['id' => $user->id]) }}"
                    method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label class="col-lg-3 control-label"> Name:</label>
                        <div class="col-lg-12">
                            <input class="form-control" name="name" type="text" value="{{ Auth::user()->name }}">
                        </div>
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Phone:</label>
                        <div class="col-lg-12">
                            <input class="form-control" name="phone" type="text" value="{{ Auth::user()->phone }}">
                        </div>
                        @error('phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Address:</label>
                        <div class="col-lg-12">
                            <input class="form-control" name="address" type="text" value="{{ Auth::user()->address }}">
                        </div>
                        @error('address')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Birthday:</label>
                        <div class="col-lg-12">
                            <input class="form-control" name="birthday" type="date"
                                value="{{ Auth::user()->birthday }}">
                        </div>
                        @error('birthday')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Gender</label>
                        <div class="col-lg-12">
                            <input type="radio" name="gender" value="0" checked id="gender>
                    <label for=" price-status-0">Male</label>
                            <input type="radio" name="gender" value="1" id="gender">
                            <label for="price-status-1">Female</label>
                        </div>
                        @error('gender')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Email:</label>
                        <div class="col-lg-12">
                            <input class="form-control" name="email" type="text" value="{{ Auth::user()->email }}"
                                readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Avatar:</label>
                        <img src="{{ asset($user->avatar) }}" alt="{{$user->avatar }}" class="img-fluid" style="width:100px">
                            <input type="file" name="avatar" class="form-control">
                        @error('avatar')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button class="btn btn-primary" type="submit" style="margin-left:500px">Save</button>
                </form>
            </div>
        </div>
    </div>
    <hr>
@endsection
