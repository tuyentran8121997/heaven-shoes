@extends('layouts.frontLayout.front_design')
@section('content')

<section id="cart_items">
	<div class="container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
			  <li><a href="{{ url('/') }}">Trang chủ</a></li>
			  <li class="active">Đơn đặt hàng</li>
			</ol>
		</div>
	</div>
</section>

<section id="do_action">
	<div class="container">
		<div class="heading text-center" align="center">
			<table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th class="text-center">Mã đơn hàng</th>
                        <th class="text-center">Mã Sản phẩm</th>
                        <th class="text-center">Hình thức thanh toán</th>
                        <th class="text-center">Thành tiền</th>
                        <th class="text-center">Ngày tạo</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>
                            @foreach($order->orders as $pro)
                                <a href="{{ url('/orders/'.$order->id) }}">{{ $pro->product_code }}</a><br>
                            @endforeach
                        </td>
                        <td>{{ $order->payment_method }}</td>
                        <td>{{ $order->grand_total }} VND</td>
                        <td>{{ $order->created_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
		</div>
	</div>
</section>

@endsection