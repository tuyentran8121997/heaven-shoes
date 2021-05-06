@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb">
      <a href="index.html" title="Go to Home" class="tip-bottom">
        <i class="icon-home"></i>Trang chủ
      </a> <a href="{{ url('/admin/view-coupon') }}">Ảnh bìa</a>
      <a href="#" class="current">Xem ảnh bìa</a>
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
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Danh sách</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Tiêu đề</th>
                  <th>Liên kết</th>
                  <th>Hình ảnh</th>
                  <th>Hành động</th>
                </tr>
              </thead>
              <tbody>

                @foreach($banners as $banner)
                <tr class="gradeX">
                  <td class="center">{{ $banner->id }}</td>
                  <td class="center">{{ $banner->title }}</td>
                  <td class="center">{{ $banner->link }}</td>
                  <td class="center">
                    @if(!empty($banner->image))
                    <img src="{{ asset('/images/frontend_images/banners/'.$banner->image) }}" style="width:200px;">
                    @endif
                  </td>
                  <td class="center">
                    <a href="{{ url('/admin/edit-banner/'.$banner->id) }}" class="btn btn-primary btn-mini" title="Edi banner">Chỉnh sửa</a>  
                    <a rel="{{ $banner->id }}" rel1="delete-banner" href="javascript:" class="btn btn-danger btn-mini deleteRecord">Xóa</a>          
                  </td>
                </tr>               
                  <div id="myModal{{ $banner->id }}" class="modal hide">
                    <div class="modal-header">
                      <button data-dismiss="modal" class="close" type="button">×</button>
                      <h3>{{ $banner->banner_name }} Full Details</h3>
                    </div>
                    <div class="modal-body">
                      <p>banner ID: {{ $banner->id }}</p>
                      <p>Category ID: {{ $banner->category_id }}</p>
                      <p>banner Code: {{ $banner->banner_code }}</p>
                      <p>banner Color: {{ $banner->banner_color }}</p>
                      <p>Price: {{ $banner->price }}</p>
                      <p>Fabric: </p>
                      <p>Material: </p>
                      <p>Description: {{ $banner->description }}</p>
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