@extends('layouts.frontLayout.front_design')
@section('content')


<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{ url('/') }}">Trang chủ</a></li>
				  <li class="active">Giỏ hàng</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
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
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Sản phẩm</td>
							<td class="description">Mô tả</td>
							<td class="price">Giá</td>
							<td class="quantity">Số lượng</td>
							<td class="total">Thành tiền</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						<?php $total_amount = 0; ?>
                        @foreach($userCart as $cart)
						<tr>
							<td class="cart_product">
								<a href=""><img style="width:100px;margin-left:-20px;" src="{{ asset('/images/backend_images/products/small/'.$cart->image) }}" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{ $cart->product_name}}</a></h4>
                                <p>Code: {{ $cart->product_code}}</p>
                                <p>Size: {{ $cart->size}}</p>
							</td>
							<td class="cart_price">
								<p>{{ number_format($cart->price) }} VND</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									@if($cart->quantity>1)
										<a class="cart_quantity_down" href="{{ url('/cart/update-quantity/'.$cart->id.'/-1') }}"> - </a>
									@endif
									<input class="cart_quantity_input" type="text" name="quantity" value="{{ $cart->quantity }}" autocomplete="off" size="2">
									<a class="cart_quantity_up" href="{{ url('/cart/update-quantity/'.$cart->id.'/1') }}"> + </a>	
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">{{ number_format($cart->price*$cart->quantity) }} VND</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{ url('/cart/delete-product/'.$cart->id) }}	"><i class="fa fa-times"></i></a>
							</td>
                        </tr>
						<?php $total_amount = $total_amount + ($cart->price*$cart->quantity); ?>
                        @endforeach
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>MÃ GIẢM GIÁ</h3>
				<p>Nhập mã giảm giá vào ô bên dưới để nhận được ưu đãi.</p>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="chose_area">
						<ul class="user_option">
							<li>
								<form action="{{ url('cart/apply-coupon') }}" method="post">@csrf
									<label>Mã giảm giá: </label>
									<input class="my-input" type="text" name="coupon_code">
									<input type="submit" value="Nhập" class="btn btn-default">
								</form>	
							</li>
						</ul>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							@if(!empty(Session::get('CouponAmount')))
								<li>Thành tiền <span><?php echo number_format($total_amount); ?> VND</span></li>
								<li>Tiền giảm <span><?php echo number_format(Session::get('CouponAmount')); ?> VND</span></li>
								<li>Tổng <span><?php echo number_format($total_amount - Session::get('CouponAmount')); ?> VND</span></li>
							@else
								<li>Tổng <span><?php echo number_format($total_amount); ?> VND</span></li>
							@endif	
						</ul>
						<div class="text-center">
							<a class="btn btn-default check_out" href="{{ url('/checkout') }}">Thanh toán</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->

@endsection