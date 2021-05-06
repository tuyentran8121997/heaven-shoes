@extends('layouts.frontLayout.front_design')
@section('content')

<section id="cart_items">
	<div class="container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
			  <li><a href="{{ url('/') }}">Trang chủ</a></li>
              <li><a href="{{ url('orders') }}">Đơn đặt hàng</a></li>
			  <li class="active">{{ $orderDetails->id }}</li>
			</ol>
		</div>
	</div>
</section>

<section id="do_action">
	<div class="container">
		<div class="heading" align="center">
			<table id="example" class="table table-striped table-bordered text-center" style="width:100%">
                <thead>
                    <tr>
                        <th class="text-center">Mã sản phẩm</th>
                        <th class="text-center">Sản phẩm</th>
                        <th class="text-center">Size</th>
                        <th class="text-center">Màu sắc</th>
                        <th class="text-center">Giá</th>
                        <th class="text-center">Số lượng</th>
                    </tr>
                </thead>
                <tbody>
                	@foreach($orderDetails->orders as $pro)
                    <tr>
                        <td>{{ $pro->product_code }}</td>
                        <td>{{ $pro->product_name }}</td>
                        <td>{{ $pro->product_size }}</td>
                        <td>{{ $pro->product_color }}</td>
                        <td>{{ $pro->product_price }}</td>
                        <td>{{ $pro->product_qty }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
		</div>
	</div>
</section>

@endsection