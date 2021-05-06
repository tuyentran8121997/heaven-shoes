@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb">
      <a href="index.html" title="Go to Home" class="tip-bottom">
        <i class="icon-home"></i>Trang chủ
      </a> <a href="{{ url('/admin/view-coupon') }}">Đơn đặt hàng</a>
      <a href="#" class="current">Danh sách đơn đặt hàng</a>
    </div>
    <h1>Đơn đặt hàng</h1>
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
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Danh sách</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Ngày đặt</th>
                  <th>Tên khách hàng</th>
                  <th>Email</th>
                  <th>Sản phẩm</th>
                  <th>Số tiền</th>
                  <th>Trạng thái</th>
                  <th>Hình thức thanh toán</th>
                  <th>Hành động</th>
                </tr>
              </thead>
              <tbody>
              	@foreach($orders as $order)
                <tr class="gradeX">
                  <td class="center">{{ $order->id }}</td>
                  <td class="center">{{ $order->created_at }}</td>
                  <td class="center">{{ $order->name }}</td>
                  <td class="center">{{ $order->user_email }}</td>
                  <td class="center">
                    @foreach($order->orders as $pro)
                    {{ $pro->product_code }}
                    ({{ $pro->product_qty }})
                    <br>
                    @endforeach
                  </td>
                  <td class="center">{{ number_format($order->grand_total) }} VND</td>
                  <td class="center">{{ $order->order_status }}</td>
                  <td class="center">{{ $order->payment_method }}</td>
                  <td class="center">
                    <a target="_blank" href="{{ url('admin/view-order/'.$order->id)}}" class="btn btn-success btn-mini">Chi tiết</a> 
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection