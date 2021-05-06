@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb">
      <a href="index.html" title="Go to Home" class="tip-bottom">
        <i class="icon-home"></i>Trang chủ
      </a> <a href="{{ url('/admin/view-products') }}">Sản phẩm</a>
      <a href="#" class="current">Xem sản phẩm</a>
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
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>View Products</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Mã danh mục</th>
                  <th>Tên danh mục</th>
                  <th>Tên sản phẩm</th>
                  <th>Mã sản phẩm</th>
                  <th>Màu sắc</th>
                  <th>Giá</th>
                  <th>Hình ảnh</th>
                  <th>Hàng nổi bật</th>
                  <th>Hành động</th>
                </tr>
              </thead>
              <tbody>

                @foreach($products as $product)
                <tr class="gradeX">
                  <td>{{ $product->id }}</td>
                  <td>{{ $product->category_id }}</td>
                  <td>{{ $product->category_name }}</td>
                  <td>{{ $product->product_name }}</td>
                  <td>{{ $product->product_code }}</td>
                  <td>{{ $product->product_color }}</td>
                  <td>{{ number_format($product->price) }} VND</td>
                  <td>
                    @if(!empty($product->image))
                    <img src="{{ asset('/images/backend_images/products/small/'.$product->image) }}" style="width:60px;">
                    @endif
                  </td>
                  <td>@if($product->feature_item ==1) Có @else Không @endif</td>
                  <td class="center">
                    <a href="#myModal{{ $product->id }}" data-toggle="modal" class="btn btn-success btn-mini" title="xem thông tin chi tiết sản phẩm">Chi tiết</a> 
                    <a href="{{ url('/admin/edit-product/'.$product->id) }}" class="btn btn-primary btn-mini" title="Chỉnh sửa thông tin sản phẩm">Chỉnh sửa</a>
                    <a href="{{ url('/admin/add-attributes/'.$product->id) }}" class="btn btn-success btn-mini" title="Thêm kích thước">Kích thước</a>
                    <a href="{{ url('/admin/add-images/'.$product->id) }}" class="btn btn-info btn-mini" title="Thêm hình ảnh">Hình ảnh</a>  
                    <a rel="{{ $product->id }}" rel1="delete-product" href="javascript:" class="btn btn-danger btn-mini deleteRecord" title="Xóa sản phẩm">Xóa</a>          
                  </td>
                </tr>               
                  <div id="myModal{{ $product->id }}" class="modal hide">
                    <div class="modal-header">
                      <button data-dismiss="modal" class="close" type="button">×</button>
                      <h3>Thông tin đầy đủ: {{ $product->product_name }}</h3>
                    </div>
                    <div class="modal-body">
                      <p>ID: {{ $product->id }}</p>
                      <p>Mã danh mục: {{ $product->category_id }}</p>
                      <p>Mã sản phẩm: {{ $product->product_code }}</p>
                      <p>Màu sắc: {{ $product->product_color }}</p>
                      <p>Vật liệu: {{ $product->care }}</p>
                      <p>Giá: {{ $product->price }}</p>
                      <p>Mô tả: {{ $product->description }}</p>
                    </div>
                  </div>
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