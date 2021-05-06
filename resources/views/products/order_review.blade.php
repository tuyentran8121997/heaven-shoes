@extends('layouts.frontLayout.front_design')
@section('content')

<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{ url('/') }}">Trang chủ</a></li>
				  <li class="active">Xem xét đơn hàng</li>
				</ol>
			</div><!--/breadcrums-->

			<div class="shopper-informations">
				<div class="row">					
				</div>
			</div>

			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form">
						<h2>Thanh toán</h2>
							<div class="form-group">
								{{ $userDetails->name }}
							</div>
							<div class="form-group">
								{{ $userDetails->address }}
							</div>
							<div class="form-group">	
								{{ $userDetails->city }}
							</div>
							<div class="form-group">
								{{ $userDetails->country }}
							</div>
							<div class="form-group">
								{{ $userDetails->pincode }}
							</div>
							<div class="form-group">
								{{ $userDetails->phone }}
							</div>
					</div>
				</div>
				<div class="col-sm-1">
					<h2></h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form">
						<h2>Vận chuyển</h2>
							<div class="form-group">
								{{ $shippingDetails->name }}
							</div>
							<div class="form-group">
								{{ $shippingDetails->address }}
							</div>
							<div class="form-group">	
								{{ $shippingDetails->city }}
							</div>
							<div class="form-group">
								{{ $shippingDetails->country }}
							</div>
							<div class="form-group">
								{{ $shippingDetails->pincode }}
							</div>
							<div class="form-group">
								{{ $shippingDetails->phone }}
							</div>
					</div>
				</div>
			</div>

			<div class="review-payment">
				<h2>Hóa đơn và hình thức thanh toán</h2>
			</div>

			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Sản phẩm</td>
							<td class="description">Mô tả</td>
							<td class="price">Giá</td>
							<td class="quantity">Số lượng</td>
							<td class="total">Thành tiền</td>
						</tr>
					</thead>
					<tbody>
						<?php $total_amount = 0; ?>
						@foreach($userCart as $cart)
						<tr>
							<td class="cart_product">
								<a href=""><img style="width:100px;" src="{{ asset('/images/backend_images/products/small/'.$cart->image) }}" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{ $cart->product_name }}</a></h4>
								<p>Mã sản phẩm: {{ $cart->product_code }}</p>
							</td>
							<td class="cart_price">
								<p>{{ number_format($cart->price) }} VND</p>
							</td>
							<td class="cart_quantity">
								<p>{{ $cart->quantity }}</p>		
							</td>
							<td class="cart_total">
								<p class="cart_total_price">{{ number_format($cart->price*$cart->quantity) }} VND</p>
							</td>
						</tr>
						<?php $total_amount = $total_amount + ($cart->price*$cart->quantity); ?>
						@endforeach
						<tr>
							<td colspan="4">&nbsp;</td>
							<td colspan="2">
								<table class="table table-condensed total-result">
									<tr>
										<td>Số tiền</td>
										<td>{{ number_format($total_amount) }} VND</td>
									</tr>
									<tr class="shipping-cost">
										<td>Chi phí vận chuyển (+)</td>
										<td>Miễn phí</td>										
									</tr>
									<tr class="shipping-cost">
										<td>Tiền chiết khấu (-)</td>
										<td>
											@if(!empty(Session::get('CouponAmount')))
												{{ number_format(Session::get('CouponAmount')) }} VND
											@else
												0 VND
											@endif
										</td>	
									</tr>
									<tr>
										<td>Tổng cộng</td>
										<td><span>{{ number_format($grand_total = $total_amount - Session::get('CouponAmount')) }} VND</span></td>
									</tr>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<form name="paymentForm" id="paymentForm" action="{{ url('/place-order') }}" method="post">{{ csrf_field() }}
				<input type="hidden" name="grand_total" value="{{ $grand_total }}">
				<div class="payment-options">
					<span>
						<label><strong>Hình thức thanh toán:</strong></label>
					</span>
					<span>
						<label><input type="radio" name="payment_method" id="COD" value="COD"> <strong>Thanh toán khi nhận hàng</strong></label>
					</span>
					<span>
						<label><input type="radio" name="payment_method" id="Paypal" value="Paypal"> <strong>Thảnh toán bằng thẻ</strong></label>
					</span>
					<span style="float:right;">
						<button type="submit" class="btn btn-default" onclick="return selectPaymentMethod();">Đặt hàng ngay</button>
					</span>
				</div>
			</form>
		</div>
	</section> <!--/#cart_items-->

@endsection