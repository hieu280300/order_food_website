@extends('frontend.shop.master_shop')
@section('title', 'Login')
@section('content')  
<div class="container bootstrap snippets bootdey">

    <h1 class="text-primary text-center pt-3"><span class="glyphicon glyphicon-user"></span>Chỉnh sửa thông tin cửa hàng</h1>
    <hr>
    <div class="row ">
        <div class="col-md-12 ">
            @foreach ($infoShop as $info)
            <form  action="{{ route('update-profile-shop', ['id' => $info->shops->id]) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label class="col-lg-3 control-label"> Tên cửa hàng:</label>
                    <div class="col-lg-12">
                        <input class="form-control" name="name" type="text" value="{{$info->shops->name}}">
                    </div>
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Số điện thoại:</label>
                    <div class="col-lg-12">
                        <input class="form-control" name="phone" type="text"value="{{$info->shops->phone}}">
                    </div>
                    @error('phone')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Địa chỉ:</label>
                    <div class="col-lg-12">
                        <input class="form-control" name="address" type="text" value="{{$info->shops->address}}">
                    </div>
                    @error('address')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Giờ mở cửa:</label>
                    <div class="col-lg-12"><input type="time" class="form-control" name="time_open" placeholder="country" value="{{$info->shops->time_open}}"></div>
                    @error('time_open')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Giờ đóng cửa:</label>
                <div class="col-lg-12"><input type="time" class="form-control" name="time_close" value="{{$info->shops->time_close}}" placeholder="state"></div>
                @error('time_close')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror  
            </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Email:</label>
                    <div class="col-lg-12">
                        <input class="form-control" name="email" type="text" value="{{$info->email}}"
                            readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Ảnh cửa hàng:</label>
                    <img src="{{asset($info->shops->image)}}" alt="" class="img-fluid" style="width:100px">
                        <input type="file" name="image" class="form-control">
                </div>
                <button class="btn btn-primary  pb-3" type="submit" style="margin-left:500px">Cập nhật</button>
            </form>
            @endforeach
        </div>
          
            </div>
        </div>
@endsection
