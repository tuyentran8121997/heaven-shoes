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
					<div class="login-form">
                        <h2>Cập nhật tài khoản</h2>
                        <form id="accountForm" name="accountForm" action="{{ url('/account') }}" method="post">@csrf
                            <strong>Email:</strong><input value="{{ $userDetails->email }}" readonly="" />
                            <strong>Tên người dùng:</strong>:</strong><input value="{{ $userDetails->name }}" id="name" name="name" type="text" placeholder="Tên"/>
                            <strong>Địa chỉ:</strong><input value="{{ $userDetails->address }}" id="address" name="address" type="text" placeholder="Địa chỉ"/>
                            <strong>Tên tỉnh/thành:</strong><input value="{{ $userDetails->city }}" id="city" name="city" type="text" placeholder="Tỉnh/Thành phố"/>
                            <strong>Quốc gia:</strong>
                            <select style="margin-bottom:10px" id="country" name="country">
                                <option value="">Quốc gia</option>
                                @foreach($countries as $country)
                                    <option value="{{ $country->country_name }}" @if($country->country_name == $userDetails->country) selected @endif>{{ $country->country_name }}</option>
                                @endforeach
                            </select>
                            <strong>Mã pin:</strong><input value="{{ $userDetails->pincode }}" id="pincode" name="pincode" type="text" placeholder="Mã pin"/>
                            <strong>Số điện thoại:</strong><input value="{{ $userDetails->phone }}" id="phone" name="phone" type="text" placeholder="Số điện thoại"/>
                            <button type="submit" class="btn btn-default">Cập nhật</button>
						</form>
					</div>
				</div>
				<div class="col-sm-1">
					<h2 class="or">HOẶC</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form">
						<h2>Cập nhật mật khẩu</h2>
                            <form id="passwordForm" name="passwordForm" action="{{ url('/update-user-pwd') }}" method="POST">@csrf
                            <strong>Mật khẩu hiện tại:</strong><input type="password" name="current_pwd" id="current_pwd" placeholder="Mật khẩu hiện tại...">
                            <span id="chkPwd"></span>
                            <strong>Mật khẩu mới:</strong><input type="password" name="new_pwd" id="new_pwd" placeholder="Mật khẩu mới...">
                            <strong>Nhập lại mật khẩu:</strong><input type="password" name="confirm_pwd" id="confirm_pwd" placeholder="Nhập lại mật khẩu...">
                            <button type="submit" class="btn btn-default">Cập nhật</button>
					    </form>
					</div>
				</div>
			</div>
		</div>
</section><!--/form-->

@endsection