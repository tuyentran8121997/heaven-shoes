@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb">
      <a href="index.html" title="Go to Home" class="tip-bottom">
        <i class="icon-home"></i>Trang chủ
      </a> <a href="{{ url('/admin/view-coupon') }}">Mã giảm giá</a>
      <a href="#" class="current">Chỉnh sửa mã giảm giá</a>
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
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Chỉnh sửa mã</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="{{ url('/admin/edit-coupon/'.$couponDetails->id) }}" name="edit_coupon" id="edit_coupon">@csrf

              <div class="control-group">
                <label class="control-label">Mã giảm</label>
                <div class="controls">
                    <input type="text" value="{{ $couponDetails->coupon_code }}" name="coupon_code" id="coupon_code" minlength="5" maxlength="15" required>
                </div>
              </div>
              
              <div class="control-group">
                <label class="control-label">Lượng tiền</label>
                <div class="controls">
                  <input type="number" value="{{ $couponDetails->amount}}" name="amount" id="amount" min="1" required>
                </div>
              </div>

              <div class="control-group">
                    <label class="control-label">Kiểu giảm</label>
                    <div class="controls">
                        <select name="amount_type" id="amount_type" style="width: 220px">
                            <option @if($couponDetails->amount_type=="Percentage") selected @endif value="Percentage">Phần trăm</option>
                            <option @if($couponDetails->amount_type=="Fixed") selected @endif value="Fixed">Trực tiếp</option>
                        </select>
                    </div>
                </div>

              <div class="control-group">
                <label class="control-label">Ngày hết hạn</label>
                <div class="controls">
                  <input type="text" value="{{ $couponDetails->expiry_date }}" name="expiry_date" id="expiry_date" required>
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Kích hoạt</label>
                <div class="controls">
                  <input type="checkbox" name="status" id="status" value="1" @if($couponDetails->status=="1") checked @endif>
                </div>
              </div>

              <div class="form-actions">
                <input type="submit" value="Cập nhật" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection