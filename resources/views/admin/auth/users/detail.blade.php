@extends('admin.layouts.app')
<!-- //import file css -->
@push('css')
    <link rel="stylesheet" href="/css/posts/post-list.css">
@endpush
@section('title', 'Detail User')
@section('content')
    <h1>Detail User</h1>
    <form action="">
        <table id="post" class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Tên</th>
                    <th scope="col">Email</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Giới tính</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Ngày sinh</th>
                    <th scope="col">Ảnh đại diện</th>
                    
                </tr>

                </tr>
            </thead>
            <tbody>

                <tr>

                    <td cope="col">{{$user->name}}</td>
                    <td cope="col">{{$user->email}}</td>
                    <td cope="col">{{$user->phone}}</td>
                    <td> @if ( $user->user_gender  == \App\Models\User::GENDER[0])
                        <div class="alert alert-secondary" role="alert">Nam</div>
                          @elseif ($user->user_gender == \App\Models\User::GENDER[1])
                        <div class="alert alert-primary" role="alert">Nữ</div>
                      @endif</td>
                    <td cope="col">{{$user->address}}</td>
                    <td cope="col">{{$user->birthday}}</td>

                    <td scope="col">   <img src="{{ asset($user->avatar)}}" alt="" class="img-flid" style="width:100px"></td>
                </tr>
            </tbody>
        </table>
    </form>
    <div class="form-group">
        <a href="{{ route('admin.user.index') }}" class="btn btn-secondary">Danh sách người dùng</a>
    </div>
    @endsection
