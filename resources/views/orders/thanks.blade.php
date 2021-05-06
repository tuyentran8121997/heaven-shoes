@extends('layouts.frontLayout.front_design')
@section('content')

<section id="cart_items">
	<div class="container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
			  <li><a href="{{ url('/') }}">Trang chủ</a></li>
			  <li class="active">Lời cảm ơn</li>
			</ol>
		</div>
	</div>
</section>

<section id="do_action">
	<div class="container">
		<div class="heading" align="center">
			<h3>Đơn hàng của bạn đã được đặt thành công!</h3>
			<p>ID đơn hàng của bạn là: {{ Session::get('order_id') }}</p>
			<p>Số tiền cần thanh toán là: {{ number_format(Session::get('grand_total')) }} VND</p>
		</div>
	</div>
</section>

@endsection

<?php
Session::forget('grand_total');
Session::forget('order_id');
?>