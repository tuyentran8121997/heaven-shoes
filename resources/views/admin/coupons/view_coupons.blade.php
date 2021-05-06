@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb">
      <a href="index.html" title="Go to Home" class="tip-bottom">
        <i class="icon-home"></i>Trang chủ
      </a> <a href="{{ url('/admin/view-coupon') }}">Mã giảm giá</a>
      <a href="#" class="current">Xem mã giảm giá</a>
    </div>
    <h1>Mã giảm giá</h1>
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
            <h5>Danh sách mã giảm giá</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Mã giảm</th>
                  <th>Số tiền</th>
                  <th>Kiểu giảm</th>
                  <th>Ngày hết hạn</th>                 
                  <th>Ngày tạo</th>
                  <th>Trạng thái</th>
                  <th>Hành động</th>
                </tr>
              </thead>
              <tbody>

                @foreach($coupons as $coupon)
                <tr class="gradeX">
                  <td>{{ $coupon->id }}</td>
                  <td>{{ $coupon->coupon_code }}</td>
                  <td>
                    {{ $coupon->amount }}
                    @if($coupon->amount_type=="Percentage") % @else VND @endif
                  </td>
                  <td>{{ $coupon->amount_type }}</td>
                  <td>{{ $coupon->expiry_date }}</td>
                  <td>{{ $coupon->created_at }}</td>
                  <td>
                    @if($coupon->status==1) hoạt động @else hết hoạt động @endif
                  </td>
                  <td class="center">
                    <a href="{{ url('/admin/edit-coupon/'.$coupon->id) }}" class="btn btn-primary btn-mini" title="Edi coupon">Chỉnh sửa</a>
                    <a rel="{{ $coupon->id }}" rel1="delete-coupon" href="javascript:" class="btn btn-danger btn-mini deleteRecord" title="Delete Coupon">Xóa</a>          
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