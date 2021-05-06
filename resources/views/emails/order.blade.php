<html>
<body>
	<table width='700px'>
		<tr><td>&nbsp;</td></tr>
		<tr><td><img src="{{ asset('images/frontend_images/home/logo.png') }}"></td></tr>
		<tr><td>&nbsp;</td></tr>
		<tr><td>Xin chào, {{ $name }},</td></tr>
		<tr><td>&nbsp;</td></tr>
		<tr><td>Cảm ơn bạn đã đến với cửa hàng của chúng tôi. Dưới đây là chi tiết đơn đặt hàng của bạn:</td></tr>
		<tr><td>&nbsp;</td></tr>
		<tr><td>Mã đơn hàng: {{ $order_id }}</td></tr>
		<tr><td>&nbsp;</td></tr>
		<tr><td>
			<table width='95%' cellpadding="5" cellspacing="5" bgcolor="#f7f4f4">
				<tr bgcolor="#cccccc">
					<td>Tên sản phẩm</td>
					<td>Mã sản phẩm</td>
					<td>Size</td>
					<td>Màu sắc</td>
					<td>Số lượng</td>
					<td>Giá</td>
				</tr>
				@foreach($productDetails['orders'] as $product)
					<tr>
						<td>{{ $product['product_name'] }}</td>
						<td>{{ $product['product_code'] }}</td>
						<td>{{ $product['product_size'] }}</td>
						<td>{{ $product['product_color'] }}</td>
						<td>{{ $product['product_qty'] }}</td>
						<td>{{ number_format($product['product_price']) }} VND</td>
					</tr>
				@endforeach
				<tr>
					<td colspan="5" align="right">Phí vận chuyển</td><td>{{ number_format($productDetails['shipping_charges']) }} VND</td>
				</tr>
				<tr>
					<td colspan="5" align="right">Mã giảm giá</td><td>{{ number_format($productDetails['coupon_amount']) }} VND</td>
				</tr>
				<tr>
					<td colspan="5" align="right">Tổng cộng</td><td>{{ number_format($productDetails['grand_total']) }} VND</td>
				</tr>
			</table>
		</td></tr>
		<tr><td>
			<table width="100%">
				<tr>
					<td width="50%">
						<table>
							<tr>
								<td><strong>Thanh toán :</strong></td>
							</tr>
							<tr>
								<td>{{ $userDetails['name'] }}</td>
							</tr>
							<tr>
								<td>{{ $userDetails['address'] }}</td>
							</tr>
							<tr>
								<td>{{ $userDetails['city'] }}</td>
							</tr>
							<tr>
								<td>{{ $userDetails['country'] }}</td>
							</tr>
							<tr>
								<td>{{ $userDetails['pincode'] }}</td>
							</tr>
							<tr>
								<td>{{ $userDetails['phone'] }}</td>
							</tr>
						</table>
					</td>
					<td width="50%">
						<table>
							<tr>
								<td><strong>Vận chuyển :-</strong></td>
							</tr>
							<tr>
								<td>{{ $productDetails['name'] }}</td>
							</tr>
							<tr>
								<td>{{ $productDetails['address'] }}</td>
							</tr>
							<tr>
								<td>{{ $productDetails['city'] }}</td>
							</tr>
							<tr>
								<td>{{ $productDetails['country'] }}</td>
							</tr>
							<tr>
								<td>{{ $productDetails['pincode'] }}</td>
							</tr>
							<tr>
								<td>{{ $productDetails['phone'] }}</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</td></tr>
		<tr><td>&nbsp;</td></tr>
		<tr><td>Nếu có thắc mắc, bạn có thể liên hệ với chúng tôi <a href="mailto:tuyentran8121997@gmail.com">heavenshoes@website.com</a></td></tr>
		<tr><td>&nbsp;</td></tr>
		<tr><td>Chân trọng và cảm ơn<br> đội ngũ Heaven Shoes</td></tr>
		<tr><td>&nbsp;</td></tr>
	</table>
</body>
</html>