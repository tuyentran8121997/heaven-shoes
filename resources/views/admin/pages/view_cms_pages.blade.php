@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb">
      <a href="index.html" title="Go to Home" class="tip-bottom">
        <i class="icon-home"></i>Trang chủ
      </a> <a href="{{ url('/admin/view-products') }}">Trang CMS</a>
      <a href="#" class="current">Xem trang CMS</a>
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
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Trang CMS</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Tên trang</th>
                  <th>Đường dẫn</th>
                  <th>Kích hoạt</th>
                  <th>Hành động</th>
                </tr>
              </thead>
              <tbody>

                @foreach($cmsPages as $page)
                <tr class="gradeX">
                  <td>{{ $page->id }}</td>
                  <td>{{ $page->title }}</td>
                  <td>{{ $page->url }}</td>
                  <td>@if($page->status ==1) Có @else Không @endif</td>
                  <td class="center">
                    <a href="#myModal{{ $page->id }}" data-toggle="modal" class="btn btn-success btn-mini" title="xem thông tin chi tiết sản phẩm">Chi tiết</a> 
                    <a href="{{ url('/admin/edit-cms-page/'.$page->id) }}" class="btn btn-primary btn-mini" title="Chỉnh sửa thông tin sản phẩm">Chỉnh sửa</a>
                    <a rel="{{ $page->id }}" rel1="delete-cms-page" href="javascript:" class="btn btn-danger btn-mini deleteRecord" title="Xóa trang cms">Xóa</a>          
                  </td>
                </tr>               
                  <div id="myModal{{ $page->id }}" class="modal hide">
                    <div class="modal-header">
                      <button data-dismiss="modal" class="close" type="button">×</button>
                      <h3>Thông tin đầy đủ trang: {{ $page->title }}</h3>
                    </div>
                    <div class="modal-body">
                      <p>ID: {{ $page->id }}</p>
                      <p>Tên trang: {{ $page->title }}</p>
                      <p>Đường dẫn: {{ $page->url }}</p>
                      <p>Kích hoạt: @if($page->status ==1) Có @else Không @endif</p>
                      <p>Mô tả: {{ $page->description }}</p>
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