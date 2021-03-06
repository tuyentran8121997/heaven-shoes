<?php
use App\Http\Controllers\Controller;
use App\Product;
$mainCategories = Controller::mainCategories();
$cartCount = Product::cartCount();
?>

<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> 0976 718 316</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> tuyentran8121997@gmail.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fab fa-facebook"></i></a></li>
								<li><a href="#"><i class="fab fa-twitter"></i></a></li>
								<li><a href="#"><i class="fab fa-instagram"></i></a></li>
								<li><a href="#"><i class="fab fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="class="text-clipped">
							<a href="{{ url('/') }}">
								<h2 style="font-weight:700" class="text-clipped">HEAVEN SHOES</h2>
							</a>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">								
								<li><a href="{{ url('/cart') }}"><i class="fa fa-shopping-cart"></i> Giỏ hàng ({{ $cartCount }})</a></li>
								@if(empty(Auth::check()))
									<li><a href="{{ url('/login-register') }}"><i class="fa fa-lock"></i> Đăng nhập</a></li>
								@else
									<li><a href="{{ url('/orders') }}"><i class="fa fa-crosshairs"></i> Đơn hàng của bạn</a></li>
									<li><a href="{{ url('/account') }}"><i class="fa fa-user"></i> Tài khoản</a></li>
									<li><a href="{{ url('/user-logout') }}"><i class="fa fa-sign-out"></i> Thoát ra</a></li>
								@endif
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="{{ url('/') }}" class="active">Trang chủ</a></li>
								<li class="dropdown"><a href="#">Danh sách<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
										@foreach($mainCategories as $cat)
											@if($cat->status=="1")
												<li><a href="{{ asset('products/'.$cat->url) }}">{{ $cat->name }}</a></li>
											@endif
										@endforeach
                                    </ul>
                                </li> 
								<li><a href="#">Bài viết</a>
                                </li> 
								<li><a href="{{ url('/page/about-us') }}">Giới thiệu</a></li>
								<li><a href="{{ url('/page/contact') }}">Liên hệ</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<form action="{{ url('/search-products') }}" method="post" class="search_box">@csrf
								<input type="text" placeholder="Tìm kiếm sản phẩm" name="product"/>
								<button type="submit" class="btn">Tìm kiếm</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->