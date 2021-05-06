@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb">
      <a href="{{ url('/admin/dashboard') }}" title="Go to Home" class="tip-bottom">
        <i class="icon-home"></i>Trang chủ
      </a>
      <a href="#">Danh mục</a>
      <a href="#" class="current">Xem danh mục</a> 
    </div>
    <h1>Danh mục</h1>
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
            <h5>Xem danh mục</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Mã danh mục</th>
                  <th>Tên danh mục</th>
                  <th>Cấp độ</th>
                  <th>Đường dẫn</th>
                  <th>Hành động</th>
                </tr>
              </thead>
              <tbody>

                @foreach($categories as $category)
                <tr class="gradeX">
                  <td>{{ $category->id }}</td>
                  <td>{{ $category->name }}</td>
                  <td>{{ $category->parent_id }}</td>
                  <td>{{ $category->url }}</td>
                  <td class="center"><a href="{{ url('/admin/edit-category/'.$category->id) }}" class="btn btn-primary btn-mini">Chỉnh sửa</a> <a id="delCat" href="{{ url('/admin/delete-category/'.$category->id) }}" class="btn btn-danger btn-mini">Xóa</a></td>
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