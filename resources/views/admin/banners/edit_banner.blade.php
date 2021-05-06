@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb">
      <a href="index.html" title="Go to Home" class="tip-bottom">
        <i class="icon-home"></i>Trang chủ
      </a> <a href="{{ url('/admin/view-coupon') }}">Ảnh bìa</a>
      <a href="#" class="current">Chỉnh sửa ảnh bìa</a>
    </div>
    <h1>Ảnh bìa</h1>
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
            <h5>Chỉnh sửa ảnh bìa</h5>
          </div>
          <div class="widget-content nopadding">
            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('admin/edit-banner/'.$bannerDetails->id) }}" name="edit_banner" id="edit_banner" novalidate="novalidate">{{ csrf_field() }}
              <div class="control-group">
                <label class="control-label">Hình ảnh</label>
                <div class="controls">
                  <div class="uploader" id="uniform-undefined"><input name="image" id="image" type="file" size="19" style="opacity: 0;"><span class="filename">Không có tệp</span><span class="action">Chọn tệp</span></div>
                  @if(!empty($bannerDetails->image))
                    <input type="hidden" name="current_image" value="{{ $bannerDetails->image }}"> 
                  @endif
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Tiêu đề</label>
                <div class="controls">
                  <input type="text" name="title" id="title" value="{{ $bannerDetails->title }}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Đường dẫn</label>
                <div class="controls">
                  <input type="text" name="link" id="link" value="{{ $bannerDetails->link }}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Kích hoạt</label>
                <div class="controls">
                  <input type="checkbox" name="status" id="status" value="1" @if($bannerDetails->status=="1") checked @endif>
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