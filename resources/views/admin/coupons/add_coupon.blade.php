@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb">
      <a href="index.html" title="Go to Home" class="tip-bottom">
        <i class="icon-home"></i>Trang chủ
      </a> <a href="{{ url('/admin/view-coupon') }}">Mã giảm giá</a>
      <a href="#" class="current">Thêm mã giảm giá</a>
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
            <h5>Thêm mã giảm giá</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="{{ url('/admin/add-coupon') }}" name="add_coupon" id="add_coupon">@csrf

              <div class="control-group">
                <label class="control-label">Mã giảm</label>
                <div class="controls">
                  <input type="text" name="coupon_code" id="coupon_code" minlength="5" maxlength="15" required>
                </div>
              </div>
              
              <div class="control-group">
                <label class="control-label">lượng tiền</label>
                <div class="controls">
                  <input type="number" name="amount" id="amount" min="1" required>
                </div>
              </div>

              <div class="control-group">
                    <label class="control-label">Hình thức giảm</label>
                    <div class="controls">
                        <select name="amount_type" id="amount_type" style="width: 220px">
                            <option value="Percentage">Phần trăm</option>
                            <option value="Fixed">Cố định</option>
                        </select>
                    </div>
                </div>

              <div class="control-group">
                <label class="control-label">Ngày hết hạn</label>
                <div class="controls">
                  <input type="text" name="expiry_date" id="expiry_date" required>
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Kích hoạt</label>
                <div class="controls">
                  <input type="checkbox" name="status" id="status" value="1">
                </div>
              </div>

              <div class="form-actions">
                <input type="submit" value="Thêm" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection