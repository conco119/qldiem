<?php session_start(); ?>
<?php require 'layout/_header.php'; ?>
<?php require 'model/DBPDO.php'; ?>

	<div class="container">
		<div class="top">
			<h1 id="title" class="hidden"><span id="logo">Hệ thống quản lý điểm </span></h1>
		</div>
		<div class="login-box animated fadeInUp">
			<div class="box-header">
				<h2>Đăng nhập</h2>
			</div>
		<form method="post" action="model/lgcheck.php">
			<label for="username">Tên đăng nhập</label>
			<br/>
			<input type="text" id="username" name="username">
			<br/>
			<label for="password">Mật khẩu</label>
			<br/>
			<input type="password" id="password" name="password">
			<br/>
			<button type="submit" name="submit">Đăng nhập</button>
			<br>
			<br>
			<input type="radio" name="who" value="sv"> Sinh viên
			<input type="radio" name="who" value="gv"> Giảng viên

			<?php if(isset($_GET["wrong"]))

				echo "<p style='color:red'>Tài khoản hoặc mật khẩu không đúng </p>";
				if(isset($_GET["choose"]))

					echo "<p style='color:red'>Chọn giảng viên hoặc sinh viên</p>";
			 ?>

			<br/>
		</form>
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
	document.getElementById("bootstrap").href = "#";
</script>

</html>
