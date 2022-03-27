@extends('frontend.layouts.master')
@section('title','Register')

@push('css')

@endpush
@section('content')

		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">
					<br>
					<br>
					<div class=" main-content-area">
						<div class="wrap-login-item ">						
							<div class="login-form form-item form-stl">
								<fieldset class="wrap-title" >
									<h2 class="text-muted" style="text-align: center">Tạo tài khoản</h2>		
									<h4 class="text-muted" style="text-align: center">Thông tin cá nhân</h4>								
								</fieldset>
								<form name="frm-login" method="POST" action="{{route('register')}}">
									@csrf
								
                                    <fieldset class="wrap-input">
										<label for="frm-login-uname">Tên:</label>
										<input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nhập tên của bạn" value="{{old('name')}}" required autofocus>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                 
									</fieldset>
									<br>
									<fieldset class="wrap-input">
										<label for="frm-login-uname">Email:</label>
										<input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="nhập email của bạn" value="{{old('email')}}" required autofocus>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
									</fieldset>
									<br>
									<fieldset class="wrap-input">
										<label for="frm-login-uname">Số điện thoại:</label>
										<input type="phone" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Nhập số điện thoại của bạn" value="{{old('phone')}}" required autofocus>
                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
									</fieldset>
									<br>
									<fieldset class="wrap-input">
										<label for="frm-login-pass">Mật khẩu *:</label>
										<input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" >
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </fieldset>
									<br>
									<fieldset class="wrap-input">
										<label for="frm-login-pass">Nhập lại mật khẩu *:</label>
										<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </fieldset>
									<br>
			
									<input type="submit" class="btn btn-primary" value="Đăng kí" name="register" style="margin-left:220px;width:100px;">	
								<br>	
								</div>
								</form>
								<br>
							</div>												
						</div>
					</div><!--end main products area-->		
				</div>
			</div><!--end row-->

		</div><!--end container-->

@endsection