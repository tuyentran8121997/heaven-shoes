@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb">
      <a href="{{ url('/admin/dashboard') }}" title="Go to Home" class="tip-bottom">
        <i class="icon-home"></i>Trang chủ
      </a>
      <a href="#">Danh mục</a>
      <a href="#" class="current">Thêm Danh mục</a>
    </div>
    <h1>Danh mục</h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Thêm Danh mục</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="{{ url('/admin/add-category') }}" name="add_category" id="add_category" novalidate="novalidate">@csrf
              <div class="control-group">
                <label class="control-label">Tên danh mục</label>
                <div class="controls">
                  <input type="text" name="category_name" id="category_name">
                </div>
              </div>
              
              <div class="control-group">
                <label class="control-label">Cấp độ danh mục</label>
                <div class="controls">
                  <select name="parent_id" style="width: 220px">
                    <option value="0">Danh mục chính</option>
                    @foreach($levels as $val)
                      <option value="{{ $val->id }}">{{ $val->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Mô tả</label>
                <div class="controls">
                  <textarea name="description" id="description"></textarea>
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Đường dẫn</label>
                <div class="controls">
                  <input type="text" name="url" id="url">
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Kích hoạt</label>
                <div class="controls">
                  <input type="checkbox" name="status" id="status" value="1">
                </div>
              </div>

              <div class="form-actions">
                <input type="submit" value="Thêm danh mục" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection