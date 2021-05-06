@extends('layouts.adminLayout.admin_design')
@section('content')

<!--main-container-part-->
<div id="content">
<div id="content-header">
    <div id="breadcrumb">
      <a href="index.html" title="Go to Home" class="tip-bottom">
        <i class="icon-home"></i>Trang chủ
      </a>
      <a href="{{ url('/admin/view-orders') }}">Đơn đặt hàng</a>
    </div>
    <h1>Đơn đặt hàng: {{ $orderDetails->id }}</h1>
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
      <div class="span6">
        <div class="widget-box">
          <div class="widget-title">
            <h5>Chi tiết</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-striped table-bordered">
              <tbody>
                <tr>
                  <td class="taskDesc">Ngày đặt</td>
                  <td class="taskStatus">{{ $orderDetails->created_at }}</td>
                </tr>
                <tr>
                  <td class="taskDesc">Trạng thái</td>
                  <td class="taskStatus">{{ $orderDetails->order_status }}</td>
                </tr>
                <tr>
                  <td class="taskDesc">Số tiền</td>
                  <td class="taskStatus">{{ number_format($orderDetails->grand_total) }} VND</td>
                </tr>
                <tr>
                  <td class="taskDesc">Phí vận chuyển</td>
                  <td class="taskStatus">{{ number_format($orderDetails->shipping_charges) }} VND</td>
                </tr>
                <tr>
                  <td class="taskDesc">Mã giảm giá</td>
                  <td class="taskStatus">{{ $orderDetails->coupon_code }}</td>
                </tr>
                <tr>
                  <td class="taskDesc">Số tiền giảm</td>
                  <td class="taskStatus">{{ number_format($orderDetails->coupon_amount) }} VND</td>
                </tr>
                <tr>
                  <td class="taskDesc">Hình thức thanh toán</td>
                  <td class="taskStatus">{{ $orderDetails->payment_method }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="accordion" id="collapse-group">
          <div class="accordion-group widget-box">
            <div class="accordion-heading">
              <div class="widget-title"> 
                <h5>Địa chỉ thanh toán</h5>
              </div>
            </div>
            <div class="collapse in accordion-body" id="collapseGOne">
              <div class="widget-content">
                {{ $userDetails->name }} <br>
                {{ $userDetails->address }} <br>
                {{ $userDetails->city }} <br>
                {{ $userDetails->country }} <br>
                {{ $userDetails->pincode }} <br>
                {{ $userDetails->phone }} <br>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="span6">
        <div class="widget-box">
          <div class="widget-title">
            <h5>Thông tin khách hàng</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-striped table-bordered">
              <tbody>
                <tr>
                  <td class="taskDesc">Tên khách hàng</td>
                  <td class="taskStatus">{{ $orderDetails->name }}</td>
                </tr>
                <tr>
                  <td class="taskDesc">Email</td>
                  <td class="taskStatus">{{ $orderDetails->user_email }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="accordion" id="collapse-group">
          <div class="accordion-group widget-box">
            <div class="accordion-heading">
              <div class="widget-title"> 
                <h5>Cập nhật trạng thái đơn hàng</h5>
              </div>
            </div>
            <div class="collapse in accordion-body" id="collapseGOne">
              <div class="widget-content"> 
                <form action="{{ url('admin/update-order-status') }}" method="post">{{ csrf_field() }}
                  <input type="hidden" name="order_id" value="{{ $orderDetails->id }}">
                  <table width="100%">
                    <tr>
                      <td>
                        <select name="order_status" id="order_status" class="control-label" required="">
                          <option value="New" @if($orderDetails->order_status == "New") selected @endif>New</option>
                          <option value="Pending" @if($orderDetails->order_status == "Pending") selected @endif>Pending</option>
                          <option value="Cancelled" @if($orderDetails->order_status == "Cancelled") selected @endif>Cancelled</option>
                          <option value="In Process" @if($orderDetails->order_status == "In Process") selected @endif>In Process</option>
                          <option value="Shipped" @if($orderDetails->order_status == "Shipped") selected @endif>Shipped</option>
                          <option value="Delivered" @if($orderDetails->order_status == "Delivered") selected @endif>Delivered</option>
                          <option value="Paid" @if($orderDetails->order_status == "Paid") selected @endif>Paid</option>
                        </select>
                      </td>
                      <td>
                        <input type="submit" value="Cập nhật">
                      </td>
                    </tr>
                  </table>
                </form>
              </div>
            </div>
          </div>
        </div>
       	<div class="accordion" id="collapse-group">
          <div class="accordion-group widget-box">
            <div class="accordion-heading">
              <div class="widget-title"> 
                <h5>Địa chỉ giao hàng</h5>
              </div>
            </div>
            <div class="collapse in accordion-body" id="collapseGOne">
              <div class="widget-content"> 
                {{ $orderDetails->name }} <br>
                {{ $orderDetails->address }} <br>
                {{ $orderDetails->city }} <br>
                {{ $orderDetails->country }} <br>
                {{ $orderDetails->pincode }} <br>
                {{ $orderDetails->phone }} <br></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row-fluid">
      <table id="example" class="table table-striped table-bordered" style="width:100%">
          <thead>
              <tr>
                  <th>Mã sản phẩm</th>
                  <th>Tên sản phẩm</th>
                  <th>Kích thước</th>
                  <th>Màu sắc</th>
                  <th>Giá</th>
                  <th>Số lượng</th>
              </tr>
          </thead>
          <tbody>
            @foreach($orderDetails->orders as $pro)
              <tr>
                  <td>{{ $pro->product_code }}</td>
                  <td>{{ $pro->product_name }}</td>
                  <td>{{ $pro->product_size }}</td>
                  <td>{{ $pro->product_color }}</td>
                  <td>{{ number_format($pro->product_price) }} VND</td>
                  <td>{{ $pro->product_qty }}</td>
              </tr>
              @endforeach
          </tbody>
      </table>
    </div>
  </div>
</div>
<!--main-container-part-->

@endsection