@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb">
      <a href="index.html" title="Go to Home" class="tip-bottom">
        <i class="icon-home"></i>Trang chủ
      </a> <a href="{{ url('/admin/view-products') }}">Sản phẩm</a>
      <a href="#" class="current">Thêm thuộc tính</a>
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
            <h5>Thêm thuộc tính</h5>
          </div>
          <div class="widget-content nopadding">
            <input type="hidden" name="product_id" value="{{ $productDetails->id }}">
            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/admin/add-attributes/'.$productDetails->id) }}" name="add_attribute" id="add_attribute">@csrf
              <div class="control-group">
                <label class="control-label">Tên sản phẩm</label>
                <label class="control-label"><strong>{{ $productDetails->product_name }}</strong></label>
              </div>

              <div class="control-group">
                <label class="control-label">Mã sản phẩm</label>
                <label class="control-label"><strong>{{ $productDetails->product_code }}</strong></label>
              </div>

              <div class="control-group">
                <label class="control-label">Màu sắc</label>
                <label class="control-label"><strong>{{ $productDetails->product_color }}</strong></label>
              </div>

              <div class="control-group">
                <label class="control-label"></label>
                <div class="field_wrapper">
                  <div>
                      <input type="text" name="sku[]" id="sku" placeholder="SKU" style="width:120px;" required/>
                      <input type="text" name="size[]" id="size" placeholder="Kích thước" style="width:120px;" required/>
                      <input type="text" name="price[]" id="price" placeholder="Giá" style="width:120px;" required/>
                      <input type="text" name="stock[]" id="stock" placeholder="Hàng tồn kho" style="width:120px;" required/>
                      <a href="javascript:void(0);" class="add_button" title="Thêm kích thước">Thêm</a>
                  </div>
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
            <h5>Xem thuộc tính</h5>
          </div>
          <div class="widget-content nopadding">
            <form action="{{ url('admin/edit-attributes/'.$productDetails->id) }}" method="post">@csrf
              <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Mã thuộc tính</th>
                  <th>SKU</th>
                  <th>Kích thước</th>
                  <th>Giá</th>
                  <th>Hàng tồn kho</th>
                  <th>Hành động</th>
                </tr>
              </thead>
              <tbody>

                @foreach($productDetails['attributes'] as $attribute)
                <tr class="gradeX">
                  <td><input type="hidden" name="idAttr[]" value="{{ $attribute->id }}">{{ $attribute->id }}</td>
                  <td>{{ $attribute->sku }}</td>
                  <td>{{ $attribute->size }}</td>
                  <td><input type="text" name="price[]" value="{{ $attribute->price }}"></td>
                  <td><input type="text" name="stock[]" value="{{ $attribute->stock }}"></td>
                  <td class="center">
                    <input type="submit" value="Cập nhật" class="btn btn-primary btn-mini">
                    <a id="delAttribute" href="{{ url('/admin/delete-attribute/'.$attribute->id) }}" class="btn btn-danger btn-mini">Xóa</a>
                  </td>
                </tr>               
                @endforeach

              </tbody>
              </table>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection