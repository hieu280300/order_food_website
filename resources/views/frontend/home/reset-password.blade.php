@extends('frontend.layouts.master')
@section('title','Login')

@push('css')
@endpush
@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">
        {{-- <div class="col-md-12"> --}}
       
            <div class="card" style="text-align: center">
                <h2>Đặt lại mật khẩu</h2>
                 <br>
                     <div class="card-body">
                         <form method="POST" action="{{route('password.update')}}">
                          @csrf
                          <input type="hidden" name="token" value="{{ $token }}">
                            <div class="form-group row">
                           <label for="email" class="col-md-4 col-form-label text-md-right">Địa chỉ email</label>
                            <div class="col-md-6">
                               <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" autocomplete="email" autofocus>

                               @error('email')
                                   <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                   </span>
                               @enderror
                           </div>
                       </div>
   
                       <div class="form-group row">
                           <label for="password" class="col-md-4 col-form-label text-md-right">Mật khẩu</label>
                           <div class="col-md-6">
                               <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                               @error('password')
                                   <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                   </span>
                               @enderror
                           </div>

                       </div>

                     <div class="form-group row">
                           <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Nhập lại mật khẩu</label>
                           <div class="col-md-6">
                               <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                           </div>
                       </div>

                    <div class="form-group row ">
                          <div class="col-md-12 offset-md-4">
                               <button type="submit" class="btn btn-primary">
                                   Đặt lại mật khẩu
                               </button>
                           </div>
                       </div>
                       <br>
                   </form>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection

