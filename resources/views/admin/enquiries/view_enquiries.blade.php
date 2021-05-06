@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb">
      <a href="{{ url('/admin/dashboard') }}" title="Go to Home" class="tip-bottom">
        <i class="icon-home"></i>Trang chủ
      </a>
      <a href="#">Phản hồi</a>
      <a href="#" class="current">Xem phản hồi</a> 
    </div>
    <h1>Phản hồi</h1>
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
            <h5>Xem phản hồi</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                <th>ID</th> 
                  <th>Tên người</th>
                  <th>Email</th>
                  <th>Tiêu đề</th>
                  <th>Nội dung</th>
                  <th>Ngày gửi</th>
                  <th>Hành động</th>
                </tr>
              </thead>
              <tbody>
                @foreach($enquiries as $enquiry)
                <tr class="gradeX">
                  <td>{{ $enquiry->id }}</td>
                  <td>{{ $enquiry->name }}</td>
                  <td>{{ $enquiry->email }}</td>
                  <td>{{ $enquiry->subject }}</td>
                  <td>{{ $enquiry->message }}</td>
                  <td>{{ $enquiry->created_at }}</td>
                  <td class="center"><a id="delEnq" href="{{ url('/admin/delete-enquiry/'.$enquiry->id) }}" class="btn btn-danger btn-mini">Xóa</a></td>
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