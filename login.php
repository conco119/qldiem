<?php require 'layout/_header.php'; ?>
	<div class="container">
		<div class="top">
			<h1 id="title" class="hidden"><span id="logo">Hệ thống quản lý điểm </span></h1>
		</div>
		<div class="login-box animated fadeInUp">
			<div class="box-header">
				<h2>Đăng nhập</h2>
			</div>
			<label for="username">Tên đăng nhập</label>
			<br/>
			<input type="text" id="username">
			<br/>
			<label for="password">Mật khẩu</label>
			<br/>
			<input type="password" id="password">
			<br/>
			<a href="admin/index.php"><button type="submit">Đăng nhập</button></a>
			<br/>
			<a href="#"><p class="small">Quên mật khẩu?</p></a>
		</div>
	</div>

</body>

<script>
	$(document).ready(function () {
    	$('#logo').addClass('animated fadeInDown');
    	$("input:text:visible:first").focus();
	});
	$('#username').focus(function() {
		$('label[for="username"]').addClass('selected');
	});
	$('#username').blur(function() {
		$('label[for="username"]').removeClass('selected');
	});
	$('#password').focus(function() {
		$('label[for="password"]').addClass('selected');
	});
	$('#password').blur(function() {
		$('label[for="password"]').removeClass('selected');
	});
</script>

</html>
