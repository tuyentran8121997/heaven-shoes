@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
<div id="content-header">
    <div id="breadcrumb">
      <a href="index.html" title="Go to Home" class="tip-bottom">
        <i class="icon-home"></i>Trang chủ
      </a> <a href="{{ url('/admin/view-products') }}">Sản phẩm</a>
      <a href="#" class="current">Thêm hình ảnh</a>
    </div>
    <h1>Hình ảnh phụ</h1>
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
            <h5>Thêm hình ảnh phụ</h5>
          </div>
          <div class="widget-content nopadding">
            <input type="hidden" name="product_id" value="{{ $productDetails->id }}">
            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/admin/add-images/'.$productDetails->id) }}" name="add_image" id="add_image">@csrf
              <div class="control-group">
                <label class="control-label">Tên sản phẩm</label>
                <label class="control-label"><strong>{{ $productDetails->product_name }}</strong></label>
              </div>

              <div class="control-group">
                <label class="control-label">Mã sản phẩm</label>
                <label class="control-label"><strong>{{ $productDetails->product_code }}</strong></label>
              </div>

              <div class="control-group">
                <label class="control-label">Thêm Hình</label>
                <div class="controls">
                  <input type="file" name="image[]" id="image" multiple="multiple">
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
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Danh sách hình</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>ID hình</th>
                  <th>ID sản phẩm</th>
                  <th>Hình ảnh</th>
                  <th>Hành động</th>
                </tr>
                @foreach($productImages as $image)
                <tr> 
                  <td>{{ $image->id }}</td>
                  <td>{{ $image->product_id }}</td>
                  <td><img style="width:100px" src="{{ asset('images/backend_images/products/small/'.$image->image) }}"></td>
                  <td class="center"><a id="delImage" rel="{{ $image->id }}" rel1="delete-alt-image" href="javascript:" class="btn btn-danger btn-mini deleteRecord">Xóa</a></td>
                </tr>
                @endforeach
              </thead>
              <tbody>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection