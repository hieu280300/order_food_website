@extends('frontend.layouts.master')
@section('title', 'Login')

    @push('css')
    @endpush
@section('content')
    <style>
        .emp-profile {
            padding: 3%;
            margin-top: 3%;
            margin-bottom: 3%;

            border-radius: 0.5rem;
            background: #818182;
        }

        .profile-img {
            text-align: center;
        }

        .profile-img img {
            width: 70%;
            height: 100%;
        }

        .profile-img .file {
            position: relative;
            overflow: hidden;
            margin-top: -20%;
            width: 70%;
            border: none;
            border-radius: 0;
            font-size: 15px;
            background: #212529b8;
        }

        .profile-img .file input {
            position: absolute;
            opacity: 0;
            right: 0;
            top: 0;
        }

        .profile-head h5 {
            color: #333;
        }
        .change-password-btn{
            border: none;
            border-radius: 1.5rem;
            width: auto;
            padding: 10%;
            font-weight: 600;
            color: black;
            cursor: pointer;
        }
        .profile-edit-btn {
            border: none;
            border-radius: 1.5rem;
            width: auto;
            padding: 10%;
     
            font-weight: 600;
            color: black;
            cursor: pointer;
        }

        .proile-rating {
            font-size: 12px;
            color: #818182;
            margin-top: 5%;
        }
        .info{
          font-size: 20px;
          color: #fff;
        }
        .bn{
            padding-top:20px;
            padding-left: 150px;
        }

    </style>
    <div class="container emp-profile">
        {{-- <form method="post"> --}}
        <div class="row">
            <div class="col-md-4">
                <div class="profile-img">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog"
                        alt="" />
                    <div class="file btn btn-lg btn-primary">
                        Change Photo
                        <input type="file" name="file" />
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                @if (!empty($info_users))
                    @foreach ($info_users as $info)
                        <div class="info">
                            <div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>User Id</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ $info->id }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Name</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ $info->name }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Email</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ $info->email }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Phone</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ $info->phone }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>address</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{$info->address}}</p>
                                    </div>
                                </div>
                   
            </div>

        </div>
        <div class="bn">
        <div class="col-md-2">
            <a href="{{route('edit_profile',$info->id)}}"><input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile" /></a>
        </div>
        <div class="col-md-2">
            <a href="{{route('show_change_password')}}"><input type="submit" class="change-password-btn" name="btnAddMore" value="Change Password" /></a>
        </div>
    </div>
        @endforeach
        @endif
    </div>
    </div>
    </div>
    </div>
    </div>
    </form>
    </div>
@endsection
