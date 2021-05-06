@extends('layouts.frontLayout.front_design')
@section('content')

<section id="slider"><!--slider-->
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div id="slider-carousel" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
						<li data-target="#slider-carousel" data-slide-to="1"></li>
						<li data-target="#slider-carousel" data-slide-to="2"></li>
					</ol>
						
					<div class="carousel-inner">
						<div class="item active">
							<a href="#">
								<img class="img-fluid d-none d-md-block" src="{{ url('images/frontend_images/carousel/carousel-img-1') }}.jpeg">
							</a>
						</div>
						<div class="item">
							<a href="#">
								<img class="img-fluid d-none d-md-block" src="{{ url('images/frontend_images/carousel/carousel-img-2.jpg') }}">
							</a>
						</div>
							
						<div class="item">
								<a href="#">
									<img class="img-fluid d-none d-md-block" src="{{ url('images/frontend_images/carousel/carousel-img-3') }}.jpeg">
								</a>
						</div>
							
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
                    <h2 class="title text-center text-clipped">
						@if(!empty($search_product))
							{{ $search_product }}
						@else
							{{ $categoryDetails->name }}
						@endif		
					</h2>
                    @foreach($productsAll as $product)
					<div class="col-sm-4">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="{{ asset('images/backend_images/products/small/'.$product->image) }}"alt="" />
									<h2>{{ number_format($product->price) }} VND</h2>
									<p>{{ $product->product_name }}</p>
									<a href="{{ url('product/'.$product->id) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Chi tiết sản phẩm</a>
								</div>
							</div>
						</div>
                    </div>
                    @endforeach		
				</div><!--features_items-->
				@if(empty($search_product))
						<div align="center">{{ $productsAll->links() }}</div>
					@endif		
			</div>
		</div>
	</div>
</section>

@endsection