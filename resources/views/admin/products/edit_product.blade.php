@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb">
      <a href="index.html" title="Go to Home" class="tip-bottom">
        <i class="icon-home"></i>Trang chủ
      </a> <a href="{{ url('/admin/view-products') }}">Sản phẩm</a>
      <a href="#" class="current">Chỉnh sửa</a>
    </div>
    <h1>Sản phẩm</h1>
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
            <h5>Chỉnh sửa</h5>
          </div>
          <div class="widget-content nopadding">
            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/admin/edit-product/'.$productDetails->id) }}" name="edit_product" id="edit_product" novalidate="novalidate">@csrf

                <div class="control-group">
                <label class="control-label">Theo danh mục</label>
                <div class="controls">
                  <select name="category_id" id="category_id" style="width: 220px">
                    <?php echo $categories_dropdown; ?>
                  </select>
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Tên sản phẩm</label>
                <div class="controls">
                  <input type="text" name="product_name" id="product_name" value="{{ $productDetails->product_name }}">
                </div>
              </div>
              
              <div class="control-group">
                <label class="control-label">Mã sản phẩm</label>
                <div class="controls">
                  <input type="text" name="product_code" id="product_code" value="{{ $productDetails->product_code }}">
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Màu sắc</label>
                <div class="controls">
                  <input type="text" name="product_color" id="product_color" value="{{ $productDetails->product_color }}">
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Mô tả</label>
                <div class="controls">
                  <textarea name="description" id="description">{{ $productDetails->description }}</textarea>
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Vật liệu và chăm sóc</label>
                <div class="controls">
                  <textarea name="care" id="care">{{ $productDetails->care }}</textarea>
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Giá</label>
                <div class="controls">
                  <input type="text" name="price" id="price" value="{{ $productDetails->price }}">
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Hình ảnh</label>
                <div class="controls">
                  <input type="file" name="image" id="image">
                  <input type="hidden" name="current_image" value="{{ $productDetails->image }}">
                  @if(!empty($productDetails->image))
                    <img style="width: 40px;" src="{{ asset('/images/backend_images/products/small/'.$productDetails->image) }}"> | <a href="{{ url('/admin/delete-product-image/'.$productDetails->id) }}">Xóa hình</a>
                  @endif  
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Sản phẩm nổi bật</label>
                <div class="controls">
                  <input type="checkbox" name="feature_item" id="feature_item" @if($productDetails->feature_item=="1") checked @endif value"1">
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Kích hoạt</label>
                <div class="controls">
                  <input type="checkbox" name="status" id="status" @if($productDetails->status=="1") checked @endif value"1">
                </div>
              </div>

              <div class="form-actions">
                <input type="submit" value="Chỉnh sửa" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection