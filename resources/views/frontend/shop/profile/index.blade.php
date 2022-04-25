@extends('frontend.shop.master_shop')
@section('title', 'Login')
@section('content')
<div class="table  table-striped"  style="margin-bottom: 150px; min-height: 300px;">
      <div class="row mt-5 justify-content-center align-items-center">
        <div class="col col-lg-8 mb-4 mb-lg-0">
          <div class="card mb-3" style="border-radius: .5rem;">
            <div class="row g-0">
                @if (!empty($infoUsers))
                @foreach ($infoUsers as $info)
              <div class="col-md-4 gradient-custom text-center text-white" style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">

                <img
                src="{{$info->shops->image}}"
                alt="Avatar"
                class="img-fluid my-5"
                style="  clip-path: circle(50%);
                width: 150px; height: 150px"/>

                <h5>{{ $info->shops->name }}</h5>
                <p class="text-muted">{{$info->shops->address}}</p>
              </div>
              <div class="col-md-8">
                <div class="card-body p-4">
                  <h6>Thông tin cửa hàng</h6>
                  <hr class="mt-0 mb-4">
                  <div class="row pt-1">
                    <div class="col-6 mb-3">
                      <h6>Tên chủ cửa hàng</h6>
                      <p class="text-muted">{{ $info->name }}</p>
                    </div>
                    <div class="col-6 mb-3">
                      <h6>Số điện thoại</h6>
                      <p class="text-muted">{{$info->shops->phone }}</p>
                    </div>
                  </div>
                  <div class="row pt-1">
                    <div class="col-6 mb-3">
                      <h6>Giới tính</h6>
                      @if ( $info->gender  == \App\Models\User::GENDER[0])
                      <p class="text-muted">Nữ</p>
                      @elseif ($info->gender == \App\Models\User::GENDER[1])
                      <p class="text-muted">Nam</p>
                      @endif
                    </div>
                    <div class="col-6 mb-3">
                      <h6>Địa chỉ quán</h6>
                      <p class="text-muted">{{$info->shops->address}}</p>
                    </div>
                  </div>
                  <div class="row pt-1">
                    <div class="col-6 mb-3">
                      <h6>Thời gian mở cửa</h6>
                      <p class="text-muted">{{$info->shops->time_open}}</p>
                    </div>
                    <div class="col-6 mb-3">
                      <h6>Thời gian đóng cửa</h6>
                      <p class="text-muted">{{$info->shops->time_close}}</p>
                    </div>
                  </div>
                  <div class="row pt-1">
                    <div class="text-center">
                        <div class="edit_profile">
                            <a href="{{ route('edit-profile-shop',['id' => $info->id])}}"><input type="submit" class="btn btn-outline-secondary" name="btnAddMore" value="Sửa thông tin" /></a>
                          </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
      </div>
  @endforeach
  @endif
@endsection
