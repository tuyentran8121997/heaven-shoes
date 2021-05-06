@extends('layouts.frontLayout.front_design')
@section('content')

<section>
	<div class="container">
			<div class="row">
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
				<div class="col-sm-3">
					@include('layouts.frontLayout.front_sidebar')
				</div>				
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
						<div class="view-product">
								<div class="easyzoom easyzoom--overlay easyzoom--with-thumbnails">
								<a id="mainImgLarge" href="{{ asset('/images/backend_images/products/large/'.$productDetails->image) }}">
									<img style="width:100%" id="mainImage" src="{{ asset('/images/backend_images/products/medium/'.$productDetails->image) }}" alt="" />
								</a>
								</div>
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								
								  <!-- Wrapper for slides -->
								  <div class="carousel-inner">
										
										<div class="item active thumbnails">
												@foreach($productAltImages as $altimage)
													<a href="{{ asset('images/backend_images/products/medium/'.$altimage->image) }}" data-standard="{{ asset('images/backend_images/products/small/'.$altimage->image) }}">
										  				<img class="changeImage" style="width:80px; cursor:pointer" src="{{ asset('images/backend_images/products/small/'.$altimage->image) }}" alt="">
													</a>
												@endforeach
										</div>
									
									</div>
							</div>

						</div>
						<div class="col-sm-7">
							<form name="addtocartForm" id="addtocartForm" action="{{ url('add-cart') }}" method="post">@csrf
								<input type="hidden" name="product_id" value="{{ $productDetails->id }}">
								<input type="hidden" name="product_name" value="{{ $productDetails->product_name }}">
								<input type="hidden" name="product_code" value="{{ $productDetails->product_code }}">
								<input type="hidden" name="product_color" value="{{ $productDetails->product_color }}">
								<input type="hidden" name="price" id="price" value="{{ $productDetails->price }}">
								<div class="product-information"><!--/product-information-->
									<h2>{{ $productDetails->product_name }}</h2>
									<p>Mã sản phẩm: {{ $productDetails->product_code }}</p>
									<p>Chọn kích thước:
										<select id="selSize" name="size" style="width:150px;" required>
											<option value="">Kích thước</option>
											@foreach($productDetails->attributes as $sizes)
											<option value="{{ $productDetails->id }}-{{ $sizes->size }}">{{ $sizes->size }}</option>
											@endforeach
										</select>	
									</p>
									<span>
										<span id="getPrice">{{ number_format($productDetails->price) }} VND</span>
										<label>Số lượng:</label>
										<input type="text" name="quantity" value="1" />	
									</span>
									<div>
										@if($total_stock>0)
											<button type="submit" class="btn btn-fefault cart" id="cartButton">
												<i class="fa fa-shopping-cart"></i>
												Thêm vào giỏ
											</button>
										@endif
									</div>	
									<p><b>Tình trạng: </b><span id="availability">@if($total_stock>0) <b style="color:green;">Còn hàng</b> @else <b style="color:red;">Hết hàng</b> @endif<span></p>
								</div><!--/product-information-->
							</form>
						</div>
					</div><!--/product-details-->
					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#description" data-toggle="tab">Mô tả sản phẩm</a></li>
								<li><a href="#care" data-toggle="tab">Vật liệu và chăm sóc</a></li>
								<li><a href="#delivery" data-toggle="tab">Video sản phẩm</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="description" >
								<div class="col-sm-12">
									<p>{{ $productDetails->description }}</p>
								</div>
							</div>
							
							<div class="tab-pane fade" id="care" >
								<div class="col-sm-12">
									<p>{{ $productDetails->care }}</p>
								</div>
							</div>
							
							<div class="tab-pane fade" id="delivery" >
								<div class="col-sm-12">
									<p>chưa làm...</p>
								</div>
							</div>
														
						</div>
					</div><!--/category-tab-->			
				</div>
			</div>
	</div>
</section>

@endsection