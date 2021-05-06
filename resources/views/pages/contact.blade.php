@extends('layouts.frontLayout.front_design')
@section('content')

	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					@include('layouts.frontLayout.front_sidebar')
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
                        <h2 class="title text-center text-clipped">LIÊN HỆ</h2>
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
                        <div class="contact-form">
                            <div class="status alert alert-success" style="display: none"></div>
                            <form action="{{ url('/page/contact') }}" id="main-contact-form" class="contact-form row" name="contact-form" method="post">@csrf
                                <div class="form-group col-md-6">
                                    <input type="text" name="name" class="form-control" required placeholder="Tên">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="email" name="email" class="form-control" required placeholder="Email">
                                </div>
                                <div class="form-group col-md-12">
                                    <input type="text" name="subject" class="form-control" required placeholder="Tiêu đề">
                                </div>
                                <div class="form-group col-md-12">
                                    <textarea name="message" id="message" required class="form-control" rows="8" placeholder="Tin nhắn"></textarea>
                                </div>                        
                                <div class="form-group col-md-12">
                                    <input type="submit" name="submit" class="btn btn-primary pull-right" value="Gửi">
                                </div>
                            </form>
	    			    </div>	
					</div><!--features_items-->
				</div>
			</div>
		</div>
    </section>
	

@endsection