@extends('frontend.layouts.master')
@section('title','Login')

@push('css')
@endpush
@section('content')

		<div class="container">
			<div class="row" style="justify-content: center;">
				<div class="col-lg-4 col-sm-8 col-md-6 col-xs-12 col-md-offset-3">
					<div class=" main-content-area">
						<br>
						<br>
                        {{-- @if (session('success'))
                            <div class="alert alert-success">
                                <p>{{ session('success') }}</p>
                            </div>
                        @endif --}}

						<div class="wrap-login-item ">
							{{-- @if(session()->has('message'))
							<div class="alert alert-success">
							  {{ session()->get('message') }}
							</div>
						  @endif --}}

							<div class="login-form form-item form-stl">
								<h2 class="text-muted" style="text-align: center">Login</h2>
								<form name="frm-login" method="POST" action="">
									@csrf

									<div class="form-group">
										<label for="email">Email:</label>
										<br>
										<input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Nhập email của bạn" :value="old('email')" required autofocus>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                   		 @enderror
									</div>
									<div class="form-group">
										<label for="pwd">Mật khẩu:</label>
										<br>
										<input type="password" id="frm-login-pass" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="**********" required autocomplete="current-password" >
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                   <div>
									<br>
									<div class="form-group form-check">
										<label class="form-check-label">
											<input class="frm-input left-position " name="remember_me" id="remember" value="forever" type="checkbox"><span style="padding-left: 5px;">Nhớ mật khẩu</span>
										</label>
										<label class="form-check-label" style="float:right">
										<a class="link-function right-position" href="{{route('password.email')}}" title="Forgotten password?">Quên mật khẩu ?</a>
									</div>
									<input type="submit" class="btn btn-primary" value="Đăng nhập" name="submit">

									</div>
								</form>
							</div>
                            @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">
                                <p>{{ $error }} </p>
                            </div>
                        @endforeach
						</div>
					</div><!--end main products area-->
				</div>
			</div><!--end row-->

		</div><!--end container-->

</div><!--end container-->
@endsection
