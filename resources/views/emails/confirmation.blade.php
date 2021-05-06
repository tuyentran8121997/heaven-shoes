<html>
	<head>
		<title>Email Đăng ký</title>
	</head>
	<body>
		<table>
			<tr><td>Gửi {{ $name }}!</td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td>Vui lòng nhấn vào liên kết dưới đây để kích hoạt tài khoản của bạn:</td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td><a href="{{ url('confirm/'.$code) }}">Kích hoạt tài khoản</a></td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td>Trân trọng và cảm ơn</td></tr>
			<tr><td>Heaven Shoes website</td></tr>
	</body>
</html>