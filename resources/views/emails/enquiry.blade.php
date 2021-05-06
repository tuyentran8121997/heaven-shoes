<html>
	<head>
		<title>Email xác nhận</title>
	</head>
	<body>
		<table>
			<tr><td>Xin chào, {{ $name }}!</td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td>Cảm ơn bạn đã liên hệ với chúng tôi!</td></tr>
			<tr><td>&nbsp;</td></tr>	
            <tr><td>Đây là nội dung liên hệ:</td></tr>
            <tr><td>&nbsp;</td></tr>
			<tr><td>Tên: {{ $name }}</td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td>Email: {{ $email }}</td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td>Tiêu đề: {{ $subject }} </td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>Tin nhắn: {{ $comment }} </td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td>Trân trọng và cảm ơn</td></tr>
			<tr><td>Heaven Shoes website</td></tr>
	</body>
</html>