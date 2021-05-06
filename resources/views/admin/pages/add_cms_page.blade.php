@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb">
      <a href="{{ url('/admin/dashboard') }}" title="Go to Home" class="tip-bottom">
        <i class="icon-home"></i>Trang chủ
      </a>
      <a href="#">Trang CMS</a>
      <a href="#" class="current">Thêm trang CMS</a>
  </div>
    <h1>Trang CMS</h1>
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
            <h5>Thêm trang CMS</h5>
          </div>
          <div class="widget-content nopadding">
            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/admin/add-cms-page') }}" name="add_cms_page" id="add_cms_page" novalidate="novalidate">@csrf

              <div class="control-group">
                <label class="control-label">Tên trang</label>
                <div class="controls">
                  <input type="text" name="title" id="title">
                </div>
              </div>
              
              <div class="control-group">
                <label class="control-label">Đường dẫn</label>
                <div class="controls">
                  <input type="text" name="url" id="url">
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Mô tả</label>
                <div class="controls">
                  <textarea name="description" id="description"></textarea>
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