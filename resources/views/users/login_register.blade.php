@extends('layouts.frontLayout.front_design')
@section('content')

<section id="form" style="margin-top:20px"><!--form-->
		<div class="container">
			<div class="row">
            @if(Session::has('flash_message_error'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>	
                <strong>{!! session('flash_message_error') !!}</strong>
                </div>
            @endif
            @if(Session::has('flash_message_success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>	
                    <strong>{!! session('flash_message_success') !!}</strong>
                </div>
            @endif
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Đăng nhập</h2>
						<form id="loginForm" name="loginForm" action="{{ url('/user-login') }}" method="post"> @csrf
							<strong>Email:</strong><input type="email" name="email" placeholder="Email" />
							<strong>Mật khẩu:</strong><input name="password" type="password" placeholder="Mật khẩu"/>
							<button type="submit" class="btn btn-default">Đăng nhập</button>
							<a href="#">Quên mật khẩu?</a>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">HOẶC</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>Tạo tài khoản mới</h2>
						<form id="registerForm" name="registerForm" action="{{ url('/login-register') }}" method="post">@csrf
							<strong>Tên người dùng:</strong><input id="name" name="name" type="text" placeholder="Tên của bạn..."/>
							<strong>Email:</strong> <input id="email" name="email" type="email" placeholder="Email.."/>
							<strong>Mật khẩu:</strong> <input id="myPassword" name="password" type="password" placeholder="Mật khẩu..."/>
							<button type="submit" class="btn btn-default">Đăng ký</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
</section><!--/form-->

@endsection