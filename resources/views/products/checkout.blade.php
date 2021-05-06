@extends('layouts.frontLayout.front_design')
@section('content')

<section id="form" style="margin-top:20px;"><!--form-->
	<div class="container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
			  <li><a href="{{ url('/') }}">Trang chủ</a></li>
			  <li class="active">Thanh toán</li>
			</ol>
		</div>
		@if(Session::has('flash_message_error'))
            <div class="alert alert-error alert-block" style="background-color:#f4d2d2">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{!! session('flash_message_error') !!}</strong>
            </div>
		@endif
		<form action="{{ url('/checkout') }}" method="post">{{ csrf_field() }}
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Hóa đơn gửi đến</h2>
							<div class="form-group">
								<input name="billing_name" id="billing_name" @if(!empty($userDetails->name)) value="{{ $userDetails->name }}" @endif type="text" placeholder="Tên" class="form-control" />
							</div>
							<div class="form-group">
								<input name="billing_address" id="billing_address" @if(!empty($userDetails->address)) value="{{ $userDetails->address }}" @endif type="text" placeholder="Địa chỉ" class="form-control" />
							</div>
							<div class="form-group">	
								<input name="billing_city" id="billing_city" @if(!empty($userDetails->city)) value="{{ $userDetails->city }}" @endif type="text" placeholder="Thành phố" class="form-control" />
							</div>
							<div class="form-group">
								<select id="billing_country" name="billing_country" class="form-control">
									<option value="">Quốc gia</option>
									@foreach($countries as $country)
										<option value="{{ $country->country_name }}" @if(!empty($userDetails->country) && $country->country_name == $userDetails->country) selected @endif>{{ $country->country_name }}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<input name="billing_pincode" id="billing_pincode" @if(!empty($userDetails->name)) value="{{ $userDetails->pincode }}" @endif type="text" placeholder="Mã pin" class="form-control" />
							</div>
							<div class="form-group">
								<input name="billing_phone" id="billing_phone" @if(!empty($userDetails->phone)) value="{{ $userDetails->phone }}" @endif type="text" placeholder="Số điện thoại" class="form-control" />
							</div>
							<div class="form-check">
							    <input type="checkbox" class="form-check-input" id="copyAddress">
							    <label class="form-check-label" for="copyAddress">Địa chỉ vận chuyển tương tự địa chỉ trên hóa đơn</label>
							</div>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2></h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>Vận chuyển đến</h2>
							<div class="form-group">
								<input name="shipping_name" id="shipping_name" @if(!empty($shippingDetails->name)) value="{{ $shippingDetails->name }}" @endif type="text" placeholder="Tên" class="form-control" />
							</div>
							<div class="form-group">
								<input name="shipping_address" id="shipping_address" @if(!empty($shippingDetails->address)) value="{{ $shippingDetails->address }}" @endif type="text" placeholder="Địa chỉ giao hàng" class="form-control" />
							</div>
							<div class="form-group">	
								<input name="shipping_city" id="shipping_city" @if(!empty($shippingDetails->city)) value="{{ $shippingDetails->city }}" @endif type="text" placeholder="Thành phố" class="form-control" />
							</div>
							<div class="form-group">
								<select id="shipping_country" name="shipping_country" class="form-control">
									<option value="">Quốc gia</option>
									@foreach($countries as $country)
										<option value="{{ $country->country_name }}" @if(!empty($shippingDetails->country) && $country->country_name == $shippingDetails->country) selected @endif>{{ $country->country_name }}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<input name="shipping_pincode" id="shipping_pincode" @if(!empty($shippingDetails->pincode)) value="{{ $shippingDetails->pincode }}" @endif type="text" placeholder="Mã pin" class="form-control" />
							</div>
							<div class="form-group">
								<input name="shipping_phone" id="shipping_phone" @if(!empty($shippingDetails->phone)) value="{{ $shippingDetails->phone }}" @endif type="text" placeholder="Số điện thoại" class="form-control" />
							</div>
							<button type="submit" class="btn btn-default" style:"background: linear-gradient(to left, #23d5e3, #9149b9);">Thanh toán</button>
					</div><!--/sign up form-->
				</div>
			</div>
		</form>
	</div>
</section><!--/form-->

@endsection