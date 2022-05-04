@extends('frontend.layouts.master')
@section('title', 'Login')

    @push('css')
    @endpush
@section('content')
@if(session()->has('hihi'))
<div class="alert alert-success">
    {{ session()->get('hihi') }}
</div>

@endif
@if(session()->has('error'))
<div class="alert alert-success">
{{ session()->get('error') }}
</div>

@endif
<section class="vh-100" style="background-color: #f4f5f7;">
    <div class="container">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-lg-8 mb-4 mb-lg-0">
          <div class="card mb-3" style="border-radius: .5rem;">
            <div class="row g-0">
                @if (!empty($infoUsers))
                @foreach ($infoUsers as $info)
              <div class="col-md-4 gradient-custom text-center text-white" style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
               @if ($info->avatar == null)
               <img
               src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp"
               alt="Avatar"
               class="img-fluid my-5"
               style="  clip-path: circle(50%);
                width: 150px; height: 150px""
             />
             @else
                <img
                src="{{$info->avatar}}"
                alt="Avatar"
                class="img-fluid my-5"
                style="  clip-path: circle(50%);
                width: 150px; height: 150px"
              />
              @endif
                <h5>{{ $info->name }}</h5>
          
              </div>
              <div class="col-md-8">
                <div class="card-body p-4">
                  <h6>Thông tin người dùng</h6>
                  <hr class="mt-0 mb-4">
                  <div class="row pt-1">
                    <div class="col-6 mb-3">
                      <h6>Email</h6>
                      <p class="text-muted">{{ $info->email }}</p>
                    </div>
                    <div class="col-6 mb-3">
                      <h6>Số điện thoại</h6>
                      <p class="text-muted">{{$info->phone }}</p>
                    </div>
                  </div>
                  <div class="row pt-1">
                    <div class="col-6 mb-3">
                      <h6>Giới tính</h6>
                      @if ( $info->gender  == \App\Models\User::GENDER[0])
                      <p class="text-muted">Nam</p>
                      @elseif ($info->gender == \App\Models\User::GENDER[1])
                      <p class="text-muted">Nữ</p>
                      @endif
                    </div>
                    <div class="col-6 mb-3">
                      <h6>Địa chỉ</h6>
                      <p class="text-muted">{{$info->address}}</p>
                    </div>
                  </div>
                  <div class="edit">
                  <div class="edit_profile">
                    <a href="{{ route('edit-profile',['id' => $info->id])}}"><input type="submit" class="btn btn-outline-secondary" name="btnAddMore" value="Sửa thông tin" /></a>
                  </div>
                  <div class="edit_profile">
                    <a href="{{route('manage_order')}}"><input type="submit" class="btn btn-outline-secondary" name="btnAddMore" value="Lịch sử đơn hàng" /></a>
                  </div>
            
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  @endforeach
  @endif
    {{-- <div class="container emp-profile">
         <form method="post">
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
                @if (!empty($infoUsers))
                    @foreach ($infoUsers as $info)
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
            <a href=""><input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile" /></a>
        </div>
        <div class="col-md-2">
            <a href=""><input type="submit" class="change-password-btn" name="btnAddMore" value="Change Password" /></a>
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
@endsection --}}
