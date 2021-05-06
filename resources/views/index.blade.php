@extends('layouts.frontLayout.front_design')
@section('content')

    <section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							@foreach($banners as $key => $banner)
								<li data-target="#slider-carousel"  data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
							@endforeach
						</ol>
						
						<div class="carousel-inner">
							@foreach($banners as $key => $banner)
								<div class="item @if($key==0) active @endif">
									<img src="images/frontend_images/banners/{{ $banner->image }}">
								</div>
							@endforeach	
						</div>
						
						<a href="#slider-carousel" class="left control-carousel carousel-control-prev" data-slide="prev">
							<i class="fa fa-angle-left text-clipped"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel carousel-control-next" data-slide="next">
							<i class="fa fa-angle-right text-clipped"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--slider -->
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					@include('layouts.frontLayout.front_sidebar')
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
                        <h2 class="title text-center text-clipped">SẢN PHẨM NỔI BẬT</h2>
                        @foreach($productsAll as $product)
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="{{ asset('images/backend_images/products/small/'.$product->image) }}" alt="" />
											<h2>{{ number_format($product->price) }} VND</h2>
											<p>{{ $product->product_name }}</p>
											<a href="{{ url('product/'.$product->id) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Chi tiết sản phẩm</a>
										</div>
								</div>
							</div>
                        </div>
                        @endforeach		
					</div><!--features_items-->
					<div align="center">{{ $productsAll->links() }}</div>
				</div>
			</div>
		</div>

    </section>

	<!-- service -->
	<section class="our-services">
			<div class="container">
				<div class="row text-center">
					<div class="col-12 col-sm-6 col-md-3">
						<div class="our-services-icon d-flex  mb-3 mx-auto">
							<i class=" fas fa-shipping-fast text-clipped m-auto"></i>
						</div>
						<div class="out-services-description">
							<h5 class="text-uppercase font-weight-bold">Miễn phí vận chuyển</h5>
							<p>Cho đơn hàng có giá trị trên 1 triệu đồng</p>
						</div>
					</div>
					<div class="col-12 col-sm-6 col-md-3 mb-5">
						<div class="our-services-icon d-flex  mb-3 mx-auto">
							<i class=" fas fa-sync text-clipped m-auto"></i>
						</div>
						<div class="out-services-description">
							<h5 class="text-uppercase font-weight-bold">Hoàn trả miễn phí</h5>
							<p>khi sản phẩm bị lỗi hoặc không hợp yêu cầu</p>
						</div>
					</div>
					<div class="col-12 col-sm-6 col-md-3 mb-5">
						<div class="our-services-icon d-flex  mb-3 mx-auto">
							<i class=" fas fa-headset text-clipped m-auto"></i>
						</div>
						<div class="out-services-description">
							<h5 class="text-uppercase font-weight-bold">Hỗ trợ tận tình</h5>
							<p>Tư vấn online 24/24 hoặc liên hệ qua điện thoại 0976 718 316</p>
						</div>
					</div>
					<div class="col-12 col-sm-6 col-md-3 mb-5">
						<div class="our-services-icon d-flex  mb-3 mx-auto">
							<i class=" far fa-credit-card text-clipped m-auto"></i>
						</div>
						<div class="out-services-description">
							<h5 class="text-uppercase font-weight-bold">Thanh toán</h5>
							<p>Thanh toán qua thẻ ngân hàng, visa hoặc trực tiếp khi nhận hàng</p>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- end service -->
	

@endsection